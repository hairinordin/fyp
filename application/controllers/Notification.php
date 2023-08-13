<?php

class Notification extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ref_model', 'ref');
        $this->load->model('user_model');
        $this->load->model('answers_model');
        $this->load->model('notification_model');
        $this->load->model('state_model');
    }
    
    public function by_list($rowno = 0) {
        $config = array();
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

        $allcount = $this->notification_model->getNotificationByListCount($search_text, $this->state_model->get_state_by_code($this->state));
        $data['premis_berdaftar'] = $this->notification_model->get_notifications($rowno, $rowperpage, $search_text, $this->state_model->get_state_by_code($this->state));

        $data['notifications'] = $this->notification_model->get_distinct_send_mail();

        $this->load->library('pagination');
        $config['base_url'] = base_url('notification/by_list');
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);
        
        $data['total_rows'] = $allcount;
        $data['row'] = $rowno;
        $data['search'] = $search_text;
        
        //$this->output->enable_profiler(true);

        $this->viewit('notification/noti_list', $data);
    }

    public function index($rowno = 0) {
        $config = array();
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

        $allcount = $this->notification_model->getNotificationCount($search_text, $this->state_model->get_state_by_code($this->state));
        $data['premis_berdaftar'] = $this->notification_model->get_premises($rowno, $rowperpage, $search_text, $this->state_model->get_state_by_code($this->state));

        $data['notifications'] = $this->notification_model->get_distinct_send_mail();

        $this->load->library('pagination');
        $config['base_url'] = base_url('notification/index');
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);
        
        $data['total_rows'] = $allcount;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        //$this->output->enable_profiler(true);

        $this->viewit('notification/list', $data);
    }
    
    public function details($idpremis){
 
        $data['idpremis'] = $idpremis;
        //$data['emt_id'] = $emt_id;
        $data['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $data['officer_remark'] = '';

        //$data['ulasan'] = $this->db->get_where('kpigsr_remark', array('idpremise' => $idpremis, 'answers_id' => $emt_id))->result();

        $this->load->library('mylib');
        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $premise['rules_applied'] = $this->mylib->questions_categories($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);

        $paparan['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $paparan['rules'] = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremis))->row();
        $data['paparan_compliance'] = $this->load->view('compliance/view', $paparan, TRUE);
        
        $data['notifications'] = $this->db->order_by('sent_date', 'DESC')->get_where('kpigsr_email_sent', array('idpremis' => $idpremis))->result();        


        $this->viewit('notification/details', $data);

        //print_r($data['ulasan']);
        //$this->output->enable_profiler(TRUE);
    
    }
    
    public function reset() {
        $this->session->unset_userdata('search');

        redirect('notification');
    }
    
    public function by_list_reset() {
        $this->session->unset_userdata('search');

        redirect('notification/by_list');
    }
    
    
    
}
