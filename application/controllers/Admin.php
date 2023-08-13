<?php

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Ref_model', 'ref');
        $this->load->library('Util');
    }

    public function delete($id) {
        $this->admin->delete($id);
        redirect('admin');
    }

    public function form() {
        $this->load->helper('form');
        $this->viewit('admin/form', ['admin' => $this->admin]);
    }
    
     public function email_update($id) {
        $this->load->helper('form');
        
        $data['admin'] = $this->admin->get_industry_byId($id);
        $this->viewit('admin/industry_form', $data);
    }
    
    public function save_email() {
        $in = $this->input->post();
        $id = $in['id'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Emel', 'required|valid_emails');

        if ($this->form_validation->run() == FALSE) {
            // tak lepas validation
            $this->admin->load($in);
            $this->viewit('admin/industry_form', ['admin' => $this->admin]);
            return;
        }

        if ($id === '') {
                $this->session->set_flashdata('addUser', array('message' => 'Invalid form', 'class' => 'alert alert-danger fade in'));
                redirect('admin/industry_form');
          } else {
            // update
            $uid = $this->admin->get_id_byUsername($this->user_id);
            $this->admin->update_user_email($id, $in['email'], $uid);
             
        }
        //$this->output->enable_profiler(TRUE);
        redirect('admin/email_update/' . $id);
    }
    
    public function reset_password($id){
        $this->load->model('user_model');
        $email = $this->admin->get_email_byId($id);
        $findemail = $this->user_model->ForgotPassword($email);
        if ($findemail) {
            $this->session->set_flashdata('addUser', array('message' => 'Reset Password Email Sent', 'class' => 'alert alert-success fade in'));
            $this->user_model->sendpassword($findemail);
        } else {
            $this->session->set_flashdata('addUser', array('message' => 'Something\'s wrong', 'class' => 'alert alert-danger fade in'));
        }
        redirect('admin/industry');
    }

    public function save() {
        $in = $this->input->post();
        $id = $in['id'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Emel', 'required|valid_emails');

        if ($this->form_validation->run() == FALSE) {
            // tak lepas validation
            $this->admin->load($in);
            $this->viewit('admin/form', ['admin' => $this->admin]);
            return;
        }

        if ($id === '') {
            // insert
            $in['pwd'] = password_hash($in['pwd'], PASSWORD_BCRYPT);

            $userExists = $this->admin->ifUserNotExists($in['username']);
            if ($userExists) {
                $this->admin->insert($in);
                $this->session->set_flashdata('addUser', array('message' => 'User added succesfully', 'class' => 'alert alert-success fade in'));
            } else {
                $this->session->set_flashdata('addUser', array('message' => 'Username already exists', 'class' => 'alert alert-danger fade in'));
                redirect('admin/form');
            }
        } else {
            // update
            if ($in['pwd'] === '9999') {
                // pwd x berubah
                unset($in['pwd']); //remove dr array
            } else {
                $in['pwd'] = password_hash($in['pwd'], PASSWORD_BCRYPT);
            }
            $this->admin->update($in, $id);
        }
        redirect('admin');
    }

    public function update($id) {
        $admin = $this->admin->find_one($id);
        $this->viewit('admin/form', ['admin' => $admin]);
    }

    public function reset() {
        $this->session->unset_userdata('search');

        redirect('admin');
    }
    
    public function reset_industry() {
        $this->session->unset_userdata('search');

        redirect('admin/industry');
    }

    public function index($rowno = 0) {
        $data['role'] = $this->ref->data('role');
        $data['state'] = $this->ref->data('state');

        $search_text = '';

        if ($this->input->post()) {
            $search_text = $this->input->post('search_txt');
            $this->session->set_userdata(array('search' => $search_text));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }

        $rowperpage = 10;

//        if($rowno != 0){
//            $rowno = ($rowno - 1) * $rowperpage;
//        }
        // Count all records
        $allcount = $this->admin->getUsersCount($search_text);

        //$data['list_user'] = $this->db->get('admin', 4, $pg)->result();
        $data['list_user'] = $this->admin->get_users($rowno, $rowperpage, $search_text);

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/index');
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);

        $data['row'] = $rowno;
        $data['search'] = $search_text;
        $this->viewit('admin/list', $data);
    }
    
    public function industry($rowno = 0){
        $data['role'] = $this->ref->data('role');
        $data['state'] = $this->ref->data('state');

        $search_text = '';

        if ($this->input->post()) {
            $search_text = $this->input->post('search_txt');
            $this->session->set_userdata(array('search' => $search_text));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }

        $rowperpage = 10;

//        if($rowno != 0){
//            $rowno = ($rowno - 1) * $rowperpage;
//        }
        // Count all records
        $allcount = $this->admin->getUsersIndustryCount($search_text);

        //$data['list_user'] = $this->db->get('admin', 4, $pg)->result();
        $data['list_user'] = $this->admin->get_users_industry($rowno, $rowperpage, $search_text);

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/industry');
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);

        $data['row'] = $rowno;
        $data['search'] = $search_text;
        $this->viewit('admin/industry_list', $data);
    }

    public function announcement() {

        // $query = $this->db->query("SELECT * FROM announcement;");
        // getting all data from table
        $query = $this->db->get('announcement');

        //get active announcement
        $this->db->select('*');
        $this->db->from('announcement');
        $this->db->where('status', 'Y');
        $getText = $this->db->get();
        //$getText = $this->db->query("SELECT * FROM announcement WHERE status='Y';");

        $data['query'] = $query->result_object();
        $data['getText'] = $getText->result_object();

        $this->viewit('admin/announcement', $data);
    }

    public function deleteAnnouncement($id) {
        //echo "$id";
        $this->db->query("DELETE FROM announcement WHERE id=" . $id . ";");
        //return $this->announcement();
        redirect('admin/announcement');
    }

    public function saveAnnouncement() {
        //echo "$id";
        //utk save, 
        //1. check ada pengumuman yang status ='Y'?
        //2. Kalau ada, tukar status ke 'N'
        //3. insert new data dan set status ke 'Y'

        $active = "Y";
        $inactive = 'N';
        $id = '';
        $newInput = array(
            'textinput' => $this->input->post('textinput'),
            'status' => $active,
        );

        //check active dulu
        $getActive = $this->getActive($id);
        if ($getActive != NULL) {
            //change active announcement to inactive 1st. 
            $data = ['status' => $inactive];
            $idAct = $getActive[0]->id;
            $this->db->where('id', $idAct);
            $this->db->update('announcement', $data);

            //change to active
            $this->db->insert('announcement', $newInput);
        } else {
            $this->db->insert('announcement', $newInput);
        }

        redirect('admin/announcement');
    }

    public function getActive($id) {
        $active = "Y";
        $this->db->select('*');
        $this->db->from('announcement');
        $this->db->where('status', $active);
        $getActive = $this->db->get()->result();
        return $getActive;
    }

    public function changeAnnouncement($id) {
        //echo "$id";
        //utk save, 
        //1. check ada pengumuman yang status ='Y'?
        //2. Kalau ada, tukar status ke 'N'
        //3. insert new data dan set status ke 'Y'
        $active = "Y";
        $inactive = 'N';

        //get current active 
//        $this->db->select('*');
//        $this->db->from('announcement');
//        $this->db->where('status', $active);
//        $getActive = $this->db->get()->result(); 
        $getActive = $this->getActive($id);

        if ($getActive != NULL) {
            //change active announcement to inactive 1st. 
            $data = ['status' => $inactive];
            $idAct = $getActive[0]->id;
            $this->db->where('id', $idAct);
            $this->db->update('announcement', $data);

            //change to active
            $data = ['status' => $active];
            $this->db->where('id', $id);
            $this->db->update('announcement', $data);
            redirect('admin/announcement');
        } else {
            $data = ['status' => $active];
            $this->db->where('id', $id);
            $this->db->update('announcement', $data);
            redirect('admin/announcement');
        }
    }

    public function profile() {

        $data['profile'] = $this->db->get_where('admin', array('username' => $this->session->userdata('user_id')))->row();
        $this->viewit('admin/admin_profile', $data);
    }

    public function update_pwd() {
        $this->load->model('user_model');
        $email = $this->input->post('username'); //change to username

        $option = ['cost' => 12];
        $encrypted_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $option);

        if ($this->user_model->get_officer_by_email($email)) {

            $data = array(
                'password' => $encrypted_password,
            );

            $this->db->set('pwd', $encrypted_password);
            $this->db->where('username', $email);
            $this->db->update('admin');

            $response_array['ajax_status'] = 'success';
        } else {
            $response_array['ajax_status'] = 'error';
        }
        //$this->output->enable_profiler(TRUE);
        echo json_encode($response_array);
    }

}
