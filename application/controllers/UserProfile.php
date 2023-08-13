<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprofile extends CI_Controller{
    
    public $theme;
    public function __construct() {
        parent::__construct();        
        $this->theme = 'theme1';
        
    }
        
     public function listing()
     {
         $data['main_view'] = 'userprofile/list';
         $this->load->view($this->theme, $data);
     }
    
    
    
}
