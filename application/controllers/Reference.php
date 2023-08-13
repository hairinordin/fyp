<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reference extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->theme = 'new_theme'; // home_view
        $this->load->model('user_model');
        $this->load->model('Ref_model', 'ref');
        $this->load->library('mylib');
    }

    public function index() {
 
        $this->viewit_iframe('reference/v_ref');

    }

}
