<?php


defined('BASEPATH') OR exit('No direct script access allowed');
class Premis extends MY_Controller {

    public $theme;

    public function __construct() {
        parent::__construct();
        $this->theme = 'theme1'; // home_view
        $this->load->model('user_model');
    }
     
    
    public function Update(){
        
         $data['premise_info'] = $this->user_model->get_premise_info($_SESSION['user_id']);
         
         $this->viewit('premis/premis_info', $data);
        //$data['main_view'] = 'premis/premis_info';
        //$this->load->view($this->theme, $data);
 
    }
    
    
   
}