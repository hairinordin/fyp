<?php

class Books_Model extends CI_Model
{

     public function get_books($start, $length, $order, $dir)
     {
         if($order != NULL){
             $this->db->order_by($order, $dir);
         }
         
         $length = 1000; //There's a problem when querying total no of premis table from EKAS
          return $this->db->limit($length, $start)->get("premis");
     }
     
     public function get_total_books()
    {
            $query = $this->db->select("COUNT(*) as num")->get("premis");
            $result = $query->row();
            if(isset($result)) return $result->num;
            return 0;
    }
}

?>