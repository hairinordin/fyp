<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borang extends CI_Controller{
    
    public $theme;
    public function __construct() {
        parent::__construct();        
        $this->theme = 'theme1';
        
    }
        
     public function listing()
     {
         $data['main_view'] = 'borang/list';
         $this->load->view($this->theme, $data);
     }
    
    
    
}

