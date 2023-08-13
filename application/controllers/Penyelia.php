<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyelia extends CI_Controller {
    public $theme;
    public function __construct() {
        parent::__construct();
        $this->theme = 'theme1'; // home_view
    }

    public function listing() {
        $data['main_view'] = 'report/azhar';
        $this->load->view($this->theme, $data);
    }
    
    public function quarter() {
        $data['main_view'] = 'report/quarter';
        $this->load->view($this->theme, $data);
    }
}

