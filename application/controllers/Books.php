<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends MY_Controller
{
public function __construct() {
        Parent::__construct();
        $this->load->model("books_model");
    }
    
     public function index()
     {
          $this->viewit("books_index.php", array());
     }
     
     public function books_page()
     {

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));
          
          $order = $this->input->get("order");
          
          $col = 0;
          $dir = "";
          if(!empty($order)) {
              foreach($order as $o) {
                  $col = $o['column'];
                  $dir= $o['dir'];
              }
          }

          if($dir != "asc" && $dir != "desc") {
              $dir = "asc";
          }

          $columns_valid = array(
              "premis.NAMAPREMIS", 
              "premis.NOFAILJAS", 
              "premis.IDPREMIS", 
              "premis.JNSINDUSTRI", 
              "premis.PALAMAT"
          );

          if(!isset($columns_valid[$col])) {
              $order = null;
          } else {
              $order = $columns_valid[$col];
          }

          
          $books = $this->books_model->get_books($start, $length, $order, $dir);
          $total_books = $this->books_model->get_total_books();
          
          $data = array();

          foreach($books->result() as $r) {

              $data[] = array(
            $r->ID,
            $r->NAMAPREMIS,
            $r->NOFAILJAS,
            $r->IDPREMIS,
            $r->JNSINDUSTRI,
            $r->PALAMAT,
            array(
            'db' => 'id',
            'dt' => 'DT_RowId',
            'formatter' => function( $d, $row ) {
            // Technically a DOM id cannot start with an integer, so we prefix
            // a string. This can also be useful if you have multiple tables
            // to ensure that the id is unique with a different prefix
            return 'row_'.$d;
            }
            ),
            );
        }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" =>  $total_books,
                 "recordsFiltered" =>  $total_books,
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }

}
?>