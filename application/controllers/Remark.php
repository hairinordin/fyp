<?php

class Remark extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('answers_model');
        $this->load->model('remark_model');
        $this->load->model('state_model');
        
        $this->load->library('mylib');
    }

    public function index($rowno = 0) {
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

        
        
        if($this->role == 'PM'){
            $data['premis_berdaftar'] = $this->remark_model->get_remark_ForPM($rowno, $rowperpage, $search_text, $this->state_model->get_state_by_code($this->state));
            $allcount = $this->remark_model->getRemarkCountForPM($search_text, $this->state_model->get_state_by_code($this->state));
            
        } else  {
            $data['premis_berdaftar'] = $this->remark_model->get_remark($rowno, $rowperpage, $search_text, $this->state_model->get_state_by_code($this->state));
            $allcount = $this->remark_model->getRemarkCount($search_text, $this->state_model->get_state_by_code($this->state));
            
        }
        
        
        foreach($data['premis_berdaftar'] as $emt){
            $emt->pm = $this->remark_model->get_officer_by_emt_id($emt->id, 'PM');
            $emt->pn = $this->remark_model->get_officer_by_emt_id($emt->id, 'PN');
            $emt->pl = $this->remark_model->get_officer_by_emt_id($emt->id, 'PL');
            $emt->date_validate = $this->remark_model->get_Validate_Date($emt->id);
            $emt->commentOnPremise = $this->remark_model->commentOnPremiseExists($emt->id);
        }
 
        $this->load->library('pagination');
        $config['base_url'] = base_url('remark/index');
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);
        
        $data['total_rows'] = $allcount;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        //$this->output->enable_profiler(true);

        $this->viewit('ulasan/list', $data);
    }

    public function reset() {
        $this->session->unset_userdata('search');

        redirect('remark');
    }

    public function pemeriksa_form($idpremis, $emt_id) {

        $data['idpremis'] = $idpremis;
        $data['emt_id'] = $emt_id;
        $data['premise_info'] = $this->user_model->get_premise_info($idpremis);

        $data['ulasan'] = $this->db->order_by('datetime', 'DESC')->get_where('kpigsr_chat', array('emt_id' => $emt_id))->result();
        $data['status_emt'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row()->emt_status;
        $data['completeOrNot'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row()->completed;
        $data['notify'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row()->notify_score;
        $data['suggestPL'] = $this->remark_model->get_PL_decision($emt_id);
        $data['completeWithComment'] = $this->remark_model->get_emt_status_with_comment($emt_id);
        
        
        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $premise['rules_applied'] = $this->mylib->questions_categories($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
        $data['paparan_remark'] = $this->load->view('ulasan/chat_view', $data, TRUE);

        $paparan['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $paparan['rules'] = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremis))->row();
        $data['paparan_compliance'] = $this->load->view('compliance/view', $paparan, TRUE);
        
        //SCORE OVERVIEW - BEGIN
        $this->load->model('score_model');
        $data['list_of_emt'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis))->result();
         foreach ($data['list_of_emt'] as $key => $value) {
            //echo $value->id;
            for ($i = 1; $i <= 7; $i++) {
                
                if($i == 7){
                    $tool7_score = $this->score_model->get_score_by_tool( $value->id, $i);
                 
                 if($tool7_score > 100){
                     $data['tool7_DOE_score_emt'. $value->id] = 100;
                 } else {
                     $data['tool7_DOE_score_emt'. $value->id] = $tool7_score;
                 }
                } else{
                   $data['tool' . $i . '_DOE_score_emt' . $value->id] = $this->score_model->get_score_by_tool($value->id, $i);
                   $data['answers2_emt' . $value->id] = $this->db->get_where('kpigsr_answers', array('id' => $value->id))->row(); //KENA LOOP  
                }  
                
                $data['tool'.$i.'_review'] = $this->db->get_where('kpigsr_tool_review', array('emt_id' => $value->id, 'tool_id' => $i ))->row();
            }
            
            $data['all_remark'] = $this->db->order_by('datetime', 'DESC')->get_where('kpigsr_chat', array('emt_id' => $value->id))->result();
         }
         $data['tool_weightage'] = $this->db->get('kpigsr_tool')->result();
         $data['no_of_rules'] = count($premise['rules_applied']);
         $data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row();
         //SCORE OVERVIEW - ENDED
        
        $data['emtStat_PN'] = $this->db->get_where('emt_achievement_pn', array('answer_id' => $emt_id))->row();
        $data['emtStat_PL'] = $this->db->get_where('emt_achievement', array('answer_id' => $emt_id))->row();
        $data['paparan_score'] = $this->load->view('score/index', $data, TRUE);
        $this->viewit('ulasan/pemeriksa_form', $data);

        //print_r($data['ulasan']);
        //$this->output->enable_profiler(TRUE);
    }
    
public function penyelia_form($idpremis, $emt_id) {

        $data['idpremis'] = $idpremis;
        $data['emt_id'] = $emt_id;
        $data['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $data['officer_remark'] = '';

         $data['ulasan'] = $this->db->order_by('datetime', 'DESC')->get_where('kpigsr_chat', array('emt_id' => $emt_id))->result();
        $data['status_emt'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row()->emt_status;
        
        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $premise['rules_applied'] = $this->mylib->questions_categories($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
        $data['paparan_remark'] = $this->load->view('ulasan/chat_view', $data, TRUE);
        
        
        //$paparan['premise_info'] = $this->user_model->get_premise_info($idpremis);
        //$paparan['rules'] = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremis))->row();
        //$data['paparan_compliance'] = $this->load->view('compliance/view', $paparan, TRUE);

        //get officer remark
        if ($this->remark_model->get_tblAnswers_id($idpremis)) {
            $answers_row_id = $this->remark_model->get_tblAnswers_id($idpremis);
            $data['officer_remark'] = $this->remark_model->get_officer_remark($answers_row_id);
        }
        
        //SCORE OVERVIEW - BEGIN
        $this->load->model('score_model');
        $data['list_of_emt'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis))->result();
         foreach ($data['list_of_emt'] as $key => $value) {
            //echo $value->id;
            for ($i = 1; $i <= 7; $i++) {
                
                if($i == 7){
                    $tool7_score = $this->score_model->get_score_by_tool( $value->id, $i);
                 
                 if($tool7_score > 100){
                     $data['tool7_DOE_score_emt'. $value->id] = 100;
                 } else {
                     $data['tool7_DOE_score_emt'. $value->id] = $tool7_score;
                 }
                } else{
                   $data['tool' . $i . '_DOE_score_emt' . $value->id] = $this->score_model->get_score_by_tool($value->id, $i);
                    $data['answers2_emt' . $value->id] = $this->db->get_where('kpigsr_answers', array('id' => $value->id))->row(); //KENA LOOP  
                }    
                $data['tool'.$i.'_review'] = $this->db->get_where('kpigsr_tool_review', array('emt_id' => $value->id, 'tool_id' => $i ))->row();
            }
            
            $data['all_remark'] = $this->db->order_by('datetime', 'DESC')->get_where('kpigsr_chat', array('emt_id' => $value->id))->result();
         }
         
         $data['tool_weightage'] = $this->db->get('kpigsr_tool')->result();
         $data['no_of_rules'] = count($premise['rules_applied']);
         $data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row();
         //SCORE OVERVIEW - ENDED
         
        $data['emtStat_PN'] = $this->db->get_where('emt_achievement_pn', array('answer_id' => $emt_id))->row();
        $data['emtStat_PL'] = $this->db->get_where('emt_achievement', array('answer_id' => $emt_id))->row();
        $data['paparan_score'] = $this->load->view('score/index', $data, TRUE);
        $this->viewit('ulasan/penyelia_form', $data);

        //print_r($data['ulasan']);
        //$this->output->enable_profiler(TRUE);
    }

    public function set_draft() {
        $emt_id = $this->input->post('emt_id');
        $idpremis = $this->input->post('idpremis');
        $commentForPremise = $this->input->post('comment');
        
        $data = [
            'current_stat' => 'draft',
            'emt_id' =>  $emt_id,
            'comment' => $commentForPremise,
            'datetime' => date("Y-m-d h:i:s a"),
            'sender' => $this->name,
        ];
        
        $this->remark_model->insert_comment_for_premise($data);
        
        $this->remark_model->update_emt_status($emt_id, array('emt_status' => 1));
        
        $premiseEmail = $this->user_model->get_premise_info($idpremis)->email;
        $this->send_completeRejected_notification('revert', $premiseEmail);
        //$this->output->enable_profiler(TRUE);
        redirect('/remark/', 'refresh');
    }
    
    public function set_complete() {
        
        $emt_id = $this->input->post('emt_id');
        $idpremise = $this->input->post('idpremis');
//        if ($this->input->post('ketetapan') == 'approve') {
//            //$emt_status = 10; //Completed
//
//        } elseif ($this->input->post('ketetapan') == 'reject') {
//            //$emt_status = 11; //Rejected
//
//        }
        
//        if(!$this->input->post('notify')){
//          $notify_score = $this->input->post('notify');  
//        }
        
         

        $commentForPremise = $this->input->post('comment');
        
        $data = [
            'current_stat' => 'complete',
            'emt_id' =>  $emt_id,
            'comment' => $commentForPremise,
            'datetime' => date("Y-m-d h:i:s a"),
            'sender' => $this->name,
        ];
        
        
        
        //$this->remark_model->update_emt_status($emt_id, $data_answers);
        
        $this->remark_model->insert_comment_for_premise($data);
        
        $premiseEmail = $this->user_model->get_premise_info($idpremise)->email;
        $this->send_completeRejected_notification('complete', $premiseEmail);
        
        redirect('/remark/', 'refresh');
        //$this->output->enable_profiler(TRUE);
    }
    
     public function pelulus_form($idpremis, $emt_id) {
         
        //Total EMT by DOE
        $result = $this->db->get_where('emt_achievement', array('answer_id' => $emt_id));

        if ($result->num_rows() < 1) {
            $data['no_tool_completed_DOE'] = 0;
        } else {
            $data['no_tool_completed_DOE'] = $this->db->get_where('emt_achievement', array('answer_id' => $emt_id))->row()->total;
        } 

        $data['idpremis'] = $idpremis;
        $data['emt_id'] = $emt_id;
        $data['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $data['officer_remark'] = '';

        $data['ulasan'] = $this->db->order_by('datetime', 'DESC')->get_where('kpigsr_chat', array('emt_id' => $emt_id))->result();
        $data['status_emt'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row()->emt_status;

        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $premise['rules_applied'] = $this->mylib->questions_categories($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
        $data['paparan_remark'] = $this->load->view('ulasan/chat_view', $data, TRUE);
        
        $paparan['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $paparan['rules'] = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremis))->row();
        $data['paparan_compliance'] = $this->load->view('compliance/view', $paparan, TRUE);

        //get officer remark
        if ($this->remark_model->get_tblAnswers_id($idpremis)) {
            $answers_row_id = $this->remark_model->get_tblAnswers_id($idpremis);
            $data['officer_remark'] = $this->remark_model->get_officer_remark($answers_row_id);
        }

        //SCORE OVERVIEW - BEGIN
        $this->load->model('score_model');
        $data['list_of_emt'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis))->result();
         foreach ($data['list_of_emt'] as $key => $value) {
            //echo $value->id;
            for ($i = 1; $i <= 7; $i++) {
                
                if($i == 7){
                    $tool7_score = $this->score_model->get_score_by_tool( $value->id, $i);
                 
                 if($tool7_score > 100){
                     $data['tool7_DOE_score_emt'. $value->id] = 100;
                 } else {
                     $data['tool7_DOE_score_emt'. $value->id] = $tool7_score;
                 }
                } else{
                   $data['tool' . $i . '_DOE_score_emt' . $value->id] = $this->score_model->get_score_by_tool($value->id, $i);
                    $data['answers2_emt' . $value->id] = $this->db->get_where('kpigsr_answers', array('id' => $value->id))->row(); //KENA LOOP  
                }    
                $data['tool'.$i.'_review'] = $this->db->get_where('kpigsr_tool_review', array('emt_id' => $value->id, 'tool_id' => $i ))->row();
            }
            
            $data['all_remark'] = $this->db->order_by('datetime', 'DESC')->get_where('kpigsr_chat', array('emt_id' => $value->id))->result();
         }
         $data['tool_weightage'] = $this->db->get('kpigsr_tool')->result();
         $data['no_of_rules'] = count($premise['rules_applied']);
         $data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row();
         //SCORE OVERVIEW - ENDED
         
        $data['emtStat_PN'] = $this->db->get_where('emt_achievement_pn', array('answer_id' => $emt_id))->row();
        $data['emtStat_PL'] = $this->db->get_where('emt_achievement', array('answer_id' => $emt_id))->row();
        $data['paparan_score'] = $this->load->view('score/index', $data, TRUE);
         
        $this->viewit('ulasan/pelulus_form', $data);

        //print_r($data['ulasan']);
        //$this->output->enable_profiler(TRUE);
    }
    public function pelulus_submit() {
        
        $emt_status = '';
        $completed = '';
        
        $emt_id = $this->input->post('emt_id');
        $idpremise = $this->input->post('idpremis');

        if ($this->input->post('ketetapan') == 'approve') {
            $emt_status = 10; //Completed
            $completed = '1';
        } elseif ($this->input->post('ketetapan') == 'reject') {
            $emt_status = 11; //Rejected
            $completed = '1';
        }
        elseif ($this->input->post('ketetapan') == 'revert') {
            $emt_status = 12; //Revert to Pegawai Penyelia
            $completed = '0';
        }
//         else {
//            $emt_status = 'Invalid';
//            $completed = '0';
//        }

        $answers_row_id = $this->remark_model->get_tblAnswers_id_not_completed($idpremise);

        $data_answers = [
            'completed' => $completed,
            'completed_date' => date("Y/m/d"),
            'emt_status' => $emt_status,
            'notify_score' => ($this->input->post('notify')) ? 1 : '',
        ];

        $this->remark_model->update_emt_status($answers_row_id, $data_answers);

        $data_remark = [
            'emt_id' => $emt_id,
            'message' => $this->input->post('commentDOE'),
            'sender_id' => $this->user_id, 
            'sender_type' => $this->role,
            'suggestion' => $this->input->post('ketetapan'),
            'datetime' => date("Y-m-d h:i:s a"),
        ];
        
        $data_emt = [
            'answer_id' => $emt_id,
            'tool1' => $this->input->post('toolComplete1'),
            'tool2' => $this->input->post('toolComplete2'),
            'tool3' => $this->input->post('toolComplete3'),
            'tool4' => $this->input->post('toolComplete4'),
            'tool5' => $this->input->post('toolComplete5'),
            'tool6' => $this->input->post('toolComplete6'),
            'tool7' => $this->input->post('toolComplete7'),
            'total' => $this->input->post('totalComplete'),
            'officer_id' => $this->user_id,
        ];
        
        //Set Rating On DB
        $tool_weightage = $this->db->get('kpigsr_tool')->result();
        $this->load->model('score_model');
        $scoreDOETool1 = ($this->score_model->get_score_by_tool($emt_id, '1') * $tool_weightage[0]->tool_full_score) / 100;
        $scoreDOETool2 = ($this->score_model->get_score_by_tool($emt_id, '2') * $tool_weightage[1]->tool_full_score) / 100;
        $scoreDOETool3 = ($this->score_model->get_score_by_tool($emt_id, '3') * $tool_weightage[2]->tool_full_score) / 100;
        $scoreDOETool4 = ($this->score_model->get_score_by_tool($emt_id, '4') * $tool_weightage[3]->tool_full_score) / 100;
        $scoreDOETool5 = ($this->score_model->get_score_by_tool($emt_id, '5') * $tool_weightage[4]->tool_full_score) / 100;
        $scoreDOETool6 = ($this->score_model->get_score_by_tool($emt_id, '6') * $tool_weightage[5]->tool_full_score) / 100;
        $scoreDOETool7 = ($this->score_model->get_score_by_tool($emt_id, '7') * $tool_weightage[6]->tool_full_score) / 100;  

        $doetotalscore = $scoreDOETool1 + $scoreDOETool2 + $scoreDOETool3 + $scoreDOETool4 + $scoreDOETool5 + $scoreDOETool6 + $scoreDOETool7;
      
        $ratingByDoe = $this->mylib->get_assessment_level(round($doetotalscore));
        
        $this->db->where('id', $emt_id);
        $this->db->update('kpigsr_answers', array('rating_by_doe' => $ratingByDoe));

        //$this->remark_model->update_remark($answers_row_id, $data_remark);
        $this->remark_model->insert_remark($data_remark);
        
        $this->remark_model->insert_emtAchievement($emt_id,$data_emt);
        //Ini untuk kalau form submit
        $premiseName = $this->user_model->get_premise_info($idpremise)->namapremis;
        if($this->input->post('ketetapan') == 'revert'){
            
            $emailsPN = $this->user_model->getEmailByRoleState($this->state, 'PN');
            foreach($emailsPN as $emailPN){
               $this->send_internal_notification($premiseName, 'revert', $emailPN); 
            }
             
            //$this->mylib->send_email_notification('EMT has been reverted', 'Your form has been reverted for your perusal. Kindly login to the EMAINS system. Thank you.', $emailsPM);
        
        }else {
            $emailsPL = $this->user_model->getEmailByRoleState($this->state, 'PL');
            
            foreach($emailsPL as $emailPL){
                $this->send_internal_notification($premiseName, 'approval', $emailPL); 
                //$this->mylib->send_email_notification('EMT form to be approve', 'Please be informed that you have a new EMT form to be approve. Kindly login to the EMAINS System.', $emailPL['email']);
            }
        }
//        if($this->input->post('ketetapan') == 'revert'){ //ketetapan ambil dari kpigsr_answers or remark
//            
//            $emailsPN = $this->user_model->getEmailByRoleState($this->state, 'PN');
//            $this->mylib->send_email_notification('EMT has been reverted', 'Your form has been reverted for your perusal. Kindly login to the EMAINS system. Thank you.', $emailsPN);
//        
//        }else {
//            $emailsPM = $this->user_model->getEmailByRoleState($this->state, 'PM');
//            foreach($emailsPM as $emailPM){
//                $this->mylib->send_email_notification('EMT has been '. $this->input->post('ketetapan') .' by Pegawai Pelulus', 'Please be informed that you have a new EMT form to be completed. Kindly login to the EMAINS System.', $emailPM['email']);
//            }
//        }
//        
        $this->session->set_flashdata('comp', 1);
        redirect('/remark/pelulus_form/' . $idpremise.'/'.$emt_id, 'refresh');
        //$this->output->enable_profiler(TRUE);
    }
    
    public function penyelia_submit() {
        //$this->output->enable_profiler(TRUE);
        $emt_status = '';
        //$completed = '';
        
        $emt_id = $this->input->post('emt_id');
        $idpremise = $this->input->post('idpremis');

        if ($this->input->post('ketetapan') == 'approve') {
            $emt_status = 7; //Completed for approval
            //$completed = '0';
        } elseif ($this->input->post('ketetapan') == 'reject') {
            $emt_status = 8; //Rejected for approval
            //$completed = '0';
        } elseif ($this->input->post('ketetapan') == 'revert') {
            $emt_status = 9; //revert to PM
            //$completed = '0';
        } 
        //else {
//            $emt_status = 'Invalid';
//            $completed = '0';
//        }

        $answers_row_id = $this->remark_model->get_tblAnswers_id_not_completed($idpremise);

        $data_answers = [
            //'completed' => $completed,
            //'completed_date' => date("Y/m/d"),
            'emt_status' => $emt_status
        ];

        $this->remark_model->update_emt_status($answers_row_id, $data_answers);

        $data_remark = [
            'emt_id' => $emt_id,
            'message' => $this->input->post('commentDOE'),
            'sender_id' =>  $this->user_id, 
            'sender_type' => $this->role,
            'suggestion' => $this->input->post('ketetapan'),
            'datetime' => date("Y-m-d h:i:s a"),
        ];

        //$this->remark_model->update_remark($answers_row_id, $data_remark);
        $this->remark_model->insert_remark($data_remark);
        
        $data_emt = [
            'answer_id' => $emt_id,
            'tool1_PN' => $this->input->post('toolComplete1'),
            'tool2_PN' => $this->input->post('toolComplete2'),
            'tool3_PN' => $this->input->post('toolComplete3'),
            'tool4_PN' => $this->input->post('toolComplete4'),
            'tool5_PN' => $this->input->post('toolComplete5'),
            'tool6_PN' => $this->input->post('toolComplete6'),
            'tool7_PN' => $this->input->post('toolComplete7'),
            'total_PN' => $this->input->post('totalComplete'),
            'pn_id' => $this->user_id,
        ];
        
        $this->remark_model->insert_emtAchievement_pn($emt_id, $data_emt);
       //Ini untuk kalau form submit
        $premiseName = $this->user_model->get_premise_info($idpremise)->namapremis;
        
        if($this->input->post('ketetapan') == 'revert'){
            
            $emailsPM = $this->user_model->getEmailByRoleState($this->state, 'PM');
            
            foreach($emailsPM as $emailPM){
               $this->send_internal_notification($premiseName, 'revert', $emailPM);  
            }
        }else {
            $emailsPL = $this->user_model->getEmailByRoleState($this->state, 'PL');
            
            foreach($emailsPL as $emailPL){
                $this->send_internal_notification($premiseName, 'approval', $emailPL); 
            }
        }
        //$this->output->enable_profiler(TRUE);
        redirect('/remark/penyelia_form/' . $idpremise.'/'.$emt_id, 'refresh');
    }

    public function pemeriksa_submit() {
        //$this->output->enable_profiler(TRUE);
        $emt_status = '';
        //$completed = '';

        $idpremise = $this->input->post('idpremis');
        $emt_id = $this->input->post('emt_id');

        if ($this->input->post('ketetapan') == 'approve') {
            $emt_status = 4; //Completed(For Approval) //Completed for verification
            //$completed = '0';
        } elseif ($this->input->post('ketetapan') == 'reject') {
            $emt_status = 5; //'Rejected(For Approval)' //Rejected for verification
            //$completed = '0';
        } 
        
//        elseif ($this->input->post('ketetapan') == 'revert') {
//            $emt_status = 6; //Draft //revert to premise
//            $completed = '0';
//        } else {
//            $emt_status = 'Invalid';
//            $completed = '0';
//        }

        $data_answers = [
            //'completed' => $completed,
            'emt_status' => $emt_status
        ];

        $this->remark_model->update_emt_status($emt_id, $data_answers);

        $data_remark = [
            'emt_id' => $emt_id,
            'message' => $this->input->post('commentDOE'),
            'sender_id' =>  $this->user_id, 
            'sender_type' => $this->role,
            'suggestion' => $this->input->post('ketetapan'),
            'datetime' => date("Y-m-d h:i:s a"),
//            'remark_to_premise' =>$this->input->post('commentPremise')
        ];

        $this->remark_model->insert_remark($data_remark);

        //Ini untuk kalau form submit
//        if($this->input->post('ketetapan') == 'revert'){ //ketetapan ambil dari kpigsr_answers or remark
//            
//            $email = $this->user_model->get_premise_info($idpremise)->email;
//            $this->mylib->send_email_notification('EMT has been reverted', 'Your form has been reverted for your perusal. Kindly login to the EMAINS system. Thank you.', $email);
//        
//        }else {
            $emailsPN = $this->user_model->getEmailByRoleState($this->state, 'PN');
            $premiseName = $this->user_model->get_premise_info($idpremise)->namapremis;
            foreach($emailsPN as $emailPN){
                $this->send_internal_notification($premiseName, 'validation', $emailPN); 
                //$this->mylib->send_email_notification('EMT form to be verified', 'Please be informed that you have a new EMT form to be verified. Kindly login to the EMAINS System.', $emailPN['email']);
            }
//        }

        //if(emt status completed (approval or rejected)) send email to notified process is done
        
        redirect('/remark/pemeriksa_form/' .  $idpremise .'/'.$emt_id, 'refresh');
    }
    
    
    
    public function delete_remark($idpremise, $id){
        $this->db->where('id', $id);
        $emt_id = $this->db->get('kpigsr_remark')->row()->answers_id;
        $this->db->where('idpremise', $idpremise);
        $this->db->where('id', $id);
        $this->db->delete('kpigsr_remark');
        
        redirect('/remark/pemeriksa_form/' . $idpremise .'/'.$emt_id, 'refresh');
    }
    
        public function send_internal_notification($premiseName, $noti_type, $email) {

        if ($noti_type == 'assessment') {
            $subject = 'Action Required : Incoming EMT for assessment from ' . $premiseName;
            $message = '<p>Please be informed that the you have incoming EMT for assessment. You can submit the assessment by login at EMAINS System.</p>
                        <p>Thank you.</p>';
        } else if ($noti_type == 'validation') {
            $subject = 'Action Required : Incoming EMT for validation from ' . $premiseName;
            $message = '<p>Please be informed that the you have incoming EMT for validation. You can submit the validation by login at EMAINS System.</p>
                        <p>Thank you.</p>';
        } else if ($noti_type == 'approval') {
            $subject = 'Action Required : Incoming EMT for approval from ' . $premiseName;
            $message = '<p>Please be informed that the you have incoming EMT for approval. You can submit the approval by login at EMAINS System.</p>
                        <p>Thank you.</p>';
        } else if ($noti_type == 'revert') {
            $subject = 'Action Required : Incoming EMT to be reverted for ' . $premiseName;
            $message = '<p>Please be informed that your form has been reverted for your perusal. Kindly login to the EMAINS system.</p>
                        <p>Thank you.</p>';
        }

        $this->mylib->send_email_notification($subject, $message, $email);
    }

    public function send_completeRejected_notification($noti_type, $email) {

        if ($noti_type == 'complete') {
            $subject = 'Action Required : EMT assessment has been completed';
            $message = '<p>Please be informed that your EMT assessment has been completed. Kindly login to the EMAINS system.</p>
                        <p>Thank you.</p>';
        } else if ($noti_type == 'revert') {
            $subject = 'Action Required : EMT has been returned for correction';
            $message = '<p>Please be informed that your EMT has been returned for correction. Kindly login to the EMAINS system.</p>
                        <p>Thank you.</p>';
        }
        
        $this->mylib->send_email_notification($subject, $message, $email);

    }

}
