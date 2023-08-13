<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->theme = 'theme1';
        $this->load->model('user_model');
        $this->load->model('state_model');
    }

    public function index() {

        /* $data['main_view'] = 'home_view';

          $this->load->view('layouts/main', $data); */

        $this->load->view('users/login_view');
    }

//    public function find() {
//        $this->output->enable_profiler(TRUE);
//        $this->form_validation->set_rules('no_fail_jas', 'DOE File No', 'required|min_length[3]');
//        $this->form_validation->set_rules('nama_premis', 'Nama Syarikat', 'required|min_length[3]');
//        /* $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
//          $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
//          $this->form_validation->set_rules('password', 'Password ', 'trim|required|min_length[3]');
//          $this->form_validation->set_rules('confirm_password', 'Confirm Password ', 'trim|required|min_length[3]|matches[password]'); */
//
//
//        if ($this->form_validation->run() == FALSE) {
//
//            $data = array(
//                'errors' => validation_errors()
//            );
//
//            $this->session->set_flashdata($data);
//
//            $this->load->view('theme2', ['view' => 'users/find_view']);
//        } else {
//            $nofailjas = $this->input->post('no_fail_jas');
//            $namapremis = $this->input->post('nama_premis');
//            
//            if ($this->user_model->find_user_KPIGSR($namapremis,$nofailjas)) {
//
//                
//
//                    //$this->session->set_flashdata('user_registered', 'Premise found' );
//
//
//                    $data['premise_info'] = $this->user_model->find_user_KPIGSR($namapremis,$nofailjas);
//                    $data['maklumat_wujud'] = 'wujud';
//                    $data['view'] = 'users/find_view';
//                    var_dump($data['maklumat_wujud']);
//                    $this->load->view('theme2', $data);
//              
//            } else {
//
//                //$this->session->set_flashdata('user_registered', 'user has been registered');
//                echo "error";
//                $this->load->view('theme2', ['view' => 'users/find_view']);
//            }
//        }
//    }
    
    public function update_pwd(){
        $username = $this->input->post('username');
        $namapremis = $this->input->post('namapremis');
        $nofaildoe = $this->input->post('nofaildoe');
        $idpremis = $this->input->post('idpremis');
       
        $option = ['cost' => 12];
        $encrypted_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $option);
            
        if ($this->user_model->find_user($namapremis,$nofaildoe)) {

             $data = array(
                'password' => $encrypted_password,
            );
            $this->user_model->update_password($data, $idpremis);                   
            
            $response_array['ajax_status'] = 'success';            

        } else {
            $response_array['ajax_status'] = 'error';
        }
        
        echo json_encode($response_array);
  
    }
    
     public function update_pic(){
        
        $idpremis = $this->input->post('idpremis');
        $namapremis = $this->input->post('namapremis');
        $nofaildoe = $this->input->post('nofaildoe');
        
        if ($this->user_model->find_user($namapremis,$nofaildoe)) {
            
            $data = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('picname'),
                'ic_no' => $this->input->post('icno'),
                'position' => $this->input->post('pos') 
            );
            $this->user_model->update_pic($data, $idpremis);                   
            
            $response_array['ajax_status'] = 'success';            

        } else {
            $response_array['ajax_status'] = 'error';
        }
        
        //print_r($this->input->post());
        echo json_encode($response_array);
  
    }
    
    public function register($premiseid) {
        //$this->output->enable_profiler(TRUE);
        $this->form_validation->set_rules('no_fail_jas', 'DOE File No', 'required|min_length[3]');
        $this->form_validation->set_rules('nama_premis', 'Premise Name', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password ', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password ', 'trim|required|min_length[3]|matches[password]');


        if ($this->form_validation->run() == FALSE) {

            $data['premise_info'] = $this->user_model->get_premise_infoEKAS($premiseid);
            $data['view'] = 'users/find_view';
            //$data['main_view'] = 'users/register_view';
            $this->load->view('theme2', ['view' => 'users/find_view']);
            $this->load->view('users/register_view', $data);
        } else {

            if ($this->user_model->create_user($premiseid)) {

                $this->session->set_flashdata('user_registered', 'Premise registration successfully');
                echo "found";

                //$data['premise_info'] = $this->user_model->create_user();

                //$data['sidebar_view'] = 'emt/emt7_info_view';
                //$data['main_view'] = 'home_view';

                //$this->load->view('users', $data);
                redirect('auth');
            } else {

                $this->session->set_flashdata('user_registered', 'user registration failed');

                //$data['sidebar_view'] = 'emt/emt7_info_view';
                //$data['main_view'] = 'home_view';
                redirect('auth');
                //$this->load->view('users/register_view', $data);
            }
        }
    }

    public function user_info() {

        if ($_SESSION['logged_in']) {

            echo 'entered';

            $data['expiry_date'] = $this->user_model->expiry_date($_SESSION['user_id']);
            $data['premise_info'] = $this->user_model->get_premise_info($_SESSION['user_id']);

            //$data['sidebar_view'] = 'emt/emt7_info_view';
            $data['main_view'] = 'users/premis_info';

            //$this->load->view('users/register_view');
            $this->load->view('home_view', $data);
        } else {
            $this->session->set_flashdata('login_failed', 'Sorry you are not authorized');

            //$this->output->enable_profiler(TRUE);

            redirect('home/index');
        }
    }

    public function login() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password ', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'errors' => validation_errors()
            );

            $this->session->set_flashdata($data);

            redirect('users');
        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user_id = $this->user_model->login_user($username, $password);

            if ($user_id) {

                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('login_success', 'you are now logged in');

                redirect('home/index');

                //$data['main_view'] = 'home_view';
                //$this->load->view('layouts/main', $data);
            } else {
                $this->session->set_flashdata('login_failed', 'Sorry you are not authorized');

                //$this->output->enable_profiler(TRUE);

                redirect('users/');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('users/');
    }

    public function view_profile($premiseid) {
        $premise['premise_info'] = $this->user_model->get_premise_info($this->idpremis);
        
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
        
        //$data['premise_info'] = $this->user_model->get_premise_info($premiseid);

        $this->viewit('users/profile_view', $data);
    }
}
