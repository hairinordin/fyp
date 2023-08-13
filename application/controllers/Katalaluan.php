<?php

class Katalaluan extends CI_Controller {
    public function index() {
        $data['view'] = 'home/forgot';
        $this->load->view('theme2', $data);
    }
    
}

