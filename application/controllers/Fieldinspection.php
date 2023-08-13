<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fieldinspection extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->theme = 'theme1'; // home_view
        $this->load->model('user_model');
        $this->load->model('Ref_model', 'ref');
        $this->load->model('FieldInspection_model'); 
        $this->load->model('state_model');
            
    }
    
    public function index($rowno=0){
        
         $search_text = '';
        
        if($this->input->post()){
            $search_text = $this->input->post('search_txt');
            $this->session->set_userdata(array('search'=>$search_text));
        } else {
            if($this->session->userdata('search') != NULL){
                $search_text = $this->session->userdata('search');
            }
        }
        
        $rowperpage = 4;
        
        // Count all records
        $allcount = $this->FieldInspection_model->getFiCount($search_text, $this->state_model->get_state_by_code($this->state));
        $data['premises'] = $this->FieldInspection_model->get_fi($rowno, $rowperpage, $search_text, $this->state_model->get_state_by_code($this->state));
        
        $this->load->library('pagination');
        $config['base_url'] = base_url('fieldinspection/index');
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);
        
        $data['row'] = $rowno;
        $data['search'] = $search_text;
        
        //$this->output->enable_profiler(true);
        $this->viewit('fieldinspection/list', $data);
    }
    
     public function reset(){
       $this->session->unset_userdata('search');
       
       redirect('fieldinspection');
   }
    
    public function view($idpremis) {
        
        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
        
        $paparan['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $paparan['rules'] = $this->db->get_where('kpigsr_rules_compliance',array('idpremise' => $idpremis))->row();
        $data['paparan_compliance'] = $this->load->view('compliance/view', $paparan, TRUE);
        
        $this->db->select('*');
        $this->db->from('kpigsr_field_inspection');
        $this->db->where('idpremis', $idpremis); 
        $data['lawatan'] = $this->db->get()->result_array();
        
        $data['idpremis'] = $idpremis;
        
        $this->viewit('fieldinspection/view_list', $data);
    }
    
    public function form($idpremis){
        $data['idpremis'] = $idpremis;
        
        $this->viewit('fieldinspection/form', $data);
    }
    
    public function hantar(){
        $data['keterangan'] = $this->input->post('comment');
        $data['tarikh_lawatan'] = $this->input->post('tarikh_lawatan');
        $data['idpremis'] = $this->input->post('idpremis');
        
        //print_r($data);  
        
        $this->db->insert('kpigsr_field_inspection',$data);
        
        redirect('/fieldinspection/view/' . $data['idpremis'], 'refresh');
        //$this->view($data['idpremis']);
    }
    
    public function delete_lawatan($idpremis,$id){

            $this->db->delete('kpigsr_field_inspection', array('id' => $id));
            $verify = $this->db->affected_rows();
            //$this->output->enable_profiler(true);
            //echo $verify;
            $this->view($idpremis);
           
        
    }
    
}