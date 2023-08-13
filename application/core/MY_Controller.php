<?php

class MY_Controller extends CI_Controller {
    // single pintu ke dalam sistem
    function __construct() {
        parent::__construct();
        $role = $this->session->userdata('role');
        if (! $role){
            redirect(base_url() . 'auth');
        } else {
            // utk mudah rujukan role user
            $this->role = $this->session->userdata('role');
            $this->state = $this->session->userdata('state');
            $this->idpremis = $this->session->userdata('user_id');
            $this->user_id = $this->session->userdata('user_id'); //same thing, internal uses
            $this->name = $this->session->userdata('name');
        }
    }

    public function viewit($view, $data = []) {
        $data['main_view'] = $view;
        $this->load->view('new_theme', $data);
    }
    
     public function viewit_iframe($view, $data = []) {
        $data['main_view'] = $view;
        $this->load->view('new_theme_iframe', $data);
    }

}
