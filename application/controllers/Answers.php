<?php

// jawapan premis
class Answers extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ref_model', 'ref');
        $this->load->model('user_model');
        $this->load->model('score_model');
        $this->load->model('answers_model');
        $this->load->library('mylib');
    }
    
    public function answersbaru($idpremis, $emt_id){
        //$premise = '';
        $premise_info = $this->mylib->get_company_profile($idpremis);   
        $premise['rules_applied'] = $this->mylib->questions_categories($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise_info, TRUE);
        $data['tool_weightage'] = $this->db->get('kpigsr_tool')->result();
        $data['no_of_rules'] = count($premise['rules_applied']);
        if ($emt_id) {
            $data['emt_id'] = $emt_id;
        }
                
        //paparan jawapan
        $data['idpremis'] = $idpremis;
        
        $data['tools'] = $this->db->get('kpigsr_tool')->result();

        $data['premise_info'] = $this->user_model->get_premise_info($idpremis);

        $information = array();
        $howto_info = array();
        $questions = array();
        $questions_title = array();

        foreach ($data['tools'] as $tool) {
            $information[$tool->tool_no] = $this->db->get_where('kpigsr_information', array('id_tool' => $tool->id))->row();
            $howto_info[$tool->tool_no] = $this->db->get_where('kpigsr_howto', array('tool_id' => $tool->id))->row();

            //get_question_subject&title
            $this->db->select('q.id, q.subject, q.id_question_title, q.id_tool, q.custom_question, q.score');
            $this->db->from('kpigsr_questions q');
            $this->db->join('kpigsr_questions_title qt', 'q.id_question_title = qt.id', 'left');
            $questions[$tool->tool_no] = $this->db->where('q.id_tool', $tool->tool_no)->get()->result();

            $questions_title[$tool->tool_no] = $this->db->get_where('kpigsr_questions_title', array('id_tool' => $tool->tool_no))->result();
            
            if($tool->tool_no == 7){
                $tool7_score = $this->score_model->get_score_by_tool($emt_id, $tool->tool_no);
                 
                if($tool7_score > 100){
                    $data['tool7_DOE_score_emt'. $emt_id] = 100;
                } else {
                    $data['tool7_DOE_score_emt'. $emt_id] = $tool7_score;
                }
            } else{
                   $data['tool' . $tool->tool_no . '_DOE_score_emt' . $emt_id] = $this->score_model->get_score_by_tool($emt_id, $tool->tool_no);
                   $data['answers2_emt' . $emt_id] = $this->db->get_where('kpigsr_answers', array('id' => $emt_id))->row(); //KENA LOOP  
            }    
            
            $data['tool'.$tool->tool_no.'_assessment_status'] = $this->answers_model->isAssessmentCompleteRevised($emt_id, $tool->tool_no);
            $data['tool'.$tool->tool_no.'_review'] = $this->db->get_where('kpigsr_tool_review', array('emt_id' => $emt_id, 'tool_id' => $tool->tool_no ))->row();
            
        }

        $data['howto_info'] = $howto_info;
        $data['information'] = $information;
        $data['questions'] = $questions;
        $data['questions_title'] = $questions_title;

        //lamaaaa

        $data['answers'] = $this->db->get_where('kpigsr_tool_answers', array('idpremise' => $idpremis, 'emt_id' => $emt_id))->result();
        //answers on date, assessment
        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row();

        $total_tool_implement = 0;
        if ($data['answers2']->tool1_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool2_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool3_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool4_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool5_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool6_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool7_implementation == 'true') {
            $total_tool_implement++;
        }



        if ($data['answers2']) {
            $data['done'] = true;
        }

        if ($data['answers2']->declaration == 'accept') {
            $data['declaration_accepted'] = true;
        }

        $fields = $this->db->list_fields('kpigsr_answers');

        foreach ($fields as $field) {
            $data['field_name'][] = $field;
        }
        if ($emt_id) {
            $data['emt_id'] = $emt_id;
        }
        $this->load->model('questions_model');
        $data['attachments'] = $this->questions_model->get_attachments($idpremis);


        $this->load->model('score_model');
        $this->load->library('mylib');

        $score1 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 1);
        $score2 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 2);
        $score3 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 3);
        $score4 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 4);
        $score5 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 5);
        $score6 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 6);
        $score7 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 7);
        
        $rules = $this->mylib->questions_categories($idpremis);
        $no_of_rules = count($rules);
        
        if ($no_of_rules > 0){
            $score4->score  = $score4->score / $no_of_rules;
            $score5->score  = $score5->score  / $no_of_rules;
            $score6->score  = $score6->score  / $no_of_rules;
        }
        
        
        $data['score1'] = $this->mylib->get_assessment_level($score1->score);
        $data['score2'] = $this->mylib->get_assessment_level($score2->score);
        $data['score3'] = $this->mylib->get_assessment_level($score3->score);
        $data['score4'] = $this->mylib->get_assessment_level($score4->score);
        $data['score5'] = $this->mylib->get_assessment_level($score5->score);
        $data['score6'] = $this->mylib->get_assessment_level($score6->score);
        $data['score7'] = $this->mylib->get_assessment_level($score7->score);

        $data['total_tool_implement'] = $total_tool_implement;
        
        $data['tool5_cp'] = $this->db->get_where('cp_courses', array('emt_id' =>$emt_id ))->row();
        
        if($data['answers2']->emt_status == '2'){ //belum submit
            $data['paparan_jawapan'] = $this->load->view('answers/v_answers', $data, TRUE);
        }else {
            $data['paparan_jawapan'] = $this->load->view('answers/v_answers_submitted', $data, TRUE); 
            
        }
        

        $this->viewit('answers/view_answered_by_premise_2', $data);
    }
    
    public function submitBaru($tool_no) {

        $post_data = $this->input->post();

        $question_id_array = array();
        $score_id_array = array();
        $status_id_array = array();

        $idpremis = $post_data['idpremise'];
        $tblanswers_id = $this->answers_model->get_answertbl_id($idpremis);


        foreach ($post_data as $key => $value) {
            if (strpos($key, 'q_id') === 0) {
                $question_id_array[$key] = $value;
            }
        }

        foreach ($question_id_array as $question_id) {
            if (array_key_exists('DoeAnswer' . $question_id, $post_data)) {
                $question_id_array[$question_id] = $post_data['DoeAnswer' . $question_id];

                $score = $post_data['scoreDOE' . $question_id];

                if (($question_id == 120) || ($question_id == 121) || ($question_id == 122)) {
                    $score = 70; //Score for all three questions
                }

                if ($post_data['DoeAnswer' . $question_id]['status'] == 'Yes') {
                    $answer[] = array(
                        'tool_id' => $this->db->get_where('kpigsr_questions', array('id' => $question_id))->row()->id_tool,
                        'emt_id' => $tblanswers_id,
                        'id_question' => $question_id,
                        'doe_score' => $score,
                        'doe_status' => 'Yes');
                } elseif ($post_data['DoeAnswer' . $question_id]['status'] == 'Not Applicable') {
                    $answer[] = array(
                        'tool_id' => $this->db->get_where('kpigsr_questions', array('id' => $question_id))->row()->id_tool,
                        'emt_id' => $tblanswers_id,
                        'id_question' => $question_id,
                        'doe_score' => $score,
                        'doe_status' => 'Not Applicable');
                } else {
                    $answer[] = array(
                        'tool_id' => $this->db->get_where('kpigsr_questions', array('id' => $question_id))->row()->id_tool,
                        'emt_id' => $tblanswers_id,
                        'id_question' => $question_id,
                        'doe_score' => 0,
                        'doe_status' => 'No');
                }
            }
        }


        $id = $post_data['data_id'];

        //$this->answers_model->set_emt_status($tblanswers_id, 3); //3 = Review

        if ($id) { //kalau ada save, update saja..
            //delete all record then insert balik
            $this->db->where('emt_id', $id);
            $this->db->where('tool_id', $tool_no);
            $this->db->delete('kpigsr_review_answers');

            foreach ($answer as $data) {
                $this->db->insert('kpigsr_review_answers', $data);
            }

            //Delete old, remark
            $this->db->where('emt_id', $id);
            $this->db->where('tool_id', $tool_no);
            $this->db->delete('kpigsr_tool_review');

            //Add new
            if ($this->input->post('comment')) {
                $this->db->insert('kpigsr_tool_review', array(
                    'emt_id' => $id,
                    'tool_id' => $tool_no,
                    'comment' => $this->input->post('comment'),
                    'officer' => $this->name
                        )
                );
            }
        } else { //kalau takda, insert..
            foreach ($answer as $data) {
                $this->db->insert('kpigsr_review_answers', $data);
            }

            if ($this->input->post('comment')) {
                $this->db->insert('kpigsr_tool_review', array(
                    'emt_id' => $id,
                    'tool_id' => $tool_no,
                    'comment' => $this->input->post('comment'),
                    'officer' => $this->user_id
                        )
                );
            }

            //$this->answers_model->set_emt_reviewed_by($tblanswers_id, $this->name);
        }
        //$this->output->enable_profiler(TRUE);
        redirect('answers/answersbaru/'. $idpremis .'/'. $id);
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

        $this->load->model('state_model');
        $allcount = $this->answers_model->getSubmissionCount($search_text, $this->state_model->get_state_by_code($this->state));
        $data['premis_berdaftar'] = $this->answers_model->get_submission($rowno, $rowperpage, $search_text, $this->state_model->get_state_by_code($this->state));

        //Assign current emt status to $emt object
        foreach ($data['premis_berdaftar'] as $emt) {
            $emt->assessmentComplete = $this->answers_model->isAssessmentComplete($emt->id);
        }

        $this->load->library('pagination');
        $config['base_url'] = base_url('answers/index');
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);
        
        $data['total_rows'] = $allcount;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->viewit('answers/list', $data);
        //$this->output->enable_profiler(TRUE);
    }

    public function reset() {
        $this->session->unset_userdata('search');

        redirect('answers');
    }

    public function start($idpremis) {
        $premise_info = $this->mylib->get_company_profile($idpremis);

        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise_info, TRUE);
        //print_r($data['maklumat_premis']);

        $this->viewit('answers/start_view', $data);
    }

//    public function calc_score(){
//        
//        
//        echo $data;
//        print_r($data);
//    }
    public function answers_by_premise($idpremis, $emt_id = '') {//by_answer or emt id
        $premise = '';
        $premise_info = $this->mylib->get_company_profile($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise_info, TRUE);

        //paparan jawapan
        $data['idpremis'] = $idpremis;

        //paparan compliance
        $paparan_compliance = 'compliance/form';


        if ($this->answers_model->get_compliance($idpremis)) {
            $premise['rules'] = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremis))->row();
            $paparan_compliance = 'compliance/view';
        }

        $data['paparan_pematuhan'] = $this->load->view($paparan_compliance, $premise, TRUE);

        $data['tools'] = $this->db->get('kpigsr_tool')->result();

        $data['premise_info'] = $this->user_model->get_premise_info($idpremis);

        $information = array();
        $howto_info = array();
        $questions = array();
        $questions_title = array();

        foreach ($data['tools'] as $tool) {
            $information[$tool->tool_no] = $this->db->get_where('kpigsr_information', array('id_tool' => $tool->id))->row();
            $howto_info[$tool->tool_no] = $this->db->get_where('kpigsr_howto', array('tool_id' => $tool->id))->row();

            //get_question_subject&title
            $this->db->select('q.id, q.subject, q.id_question_title, q.id_tool, q.custom_question, q.score');
            $this->db->from('kpigsr_questions q');
            $this->db->join('kpigsr_questions_title qt', 'q.id_question_title = qt.id', 'left');
            $questions[$tool->tool_no] = $this->db->where('q.id_tool', $tool->tool_no)->get()->result();

            $questions_title[$tool->tool_no] = $this->db->get_where('kpigsr_questions_title', array('id_tool' => $tool->tool_no))->result();
        }

        $data['howto_info'] = $howto_info;
        $data['information'] = $information;
        $data['questions'] = $questions;
        $data['questions_title'] = $questions_title;

        //lamaaaa

        $data['answers'] = $this->db->get_where('kpigsr_tool_answers', array('idpremise' => $idpremis, 'emt_id' => $emt_id))->result();
        //answers on date, assessment
        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row();

        $total_tool_implement = 0;
        if ($data['answers2']->tool1_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool2_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool3_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool4_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool5_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool6_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool7_implementation == 'true') {
            $total_tool_implement++;
        }



        if ($data['answers2']) {
            $data['done'] = true;
        }

        if ($data['answers2']->declaration == 'accept') {
            $data['declaration_accepted'] = true;
        }

        $fields = $this->db->list_fields('kpigsr_answers');

        foreach ($fields as $field) {
            $data['field_name'][] = $field;
        }
        if ($emt_id) {
            $data['emt_id'] = $emt_id;
        }
        $this->load->model('questions_model');
        $data['attachments'] = $this->questions_model->get_attachments($idpremis);


        $this->load->model('score_model');
        $this->load->library('mylib');

        $score1 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 1);
        $score2 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 2);
        $score3 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 3);
        $score4 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 4);
        $score5 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 5);
        $score6 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 6);
        $score7 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 7);
        
        $rules = $this->mylib->questions_categories($idpremis);
        $no_of_rules = count($rules);
        
        if ($no_of_rules > 0){
            $score4->score  = $score4->score / $no_of_rules;
            $score5->score  = $score5->score  / $no_of_rules;
            $score6->score  = $score6->score  / $no_of_rules;
        }
        
        
        $data['score1'] = $this->mylib->get_assessment_level($score1->score);
        $data['score2'] = $this->mylib->get_assessment_level($score2->score);
        $data['score3'] = $this->mylib->get_assessment_level($score3->score);
        $data['score4'] = $this->mylib->get_assessment_level($score4->score);
        $data['score5'] = $this->mylib->get_assessment_level($score5->score);
        $data['score6'] = $this->mylib->get_assessment_level($score6->score);
        $data['score7'] = $this->mylib->get_assessment_level($score7->score);

        $data['total_tool_implement'] = $total_tool_implement;
        
        $data['tool5_cp'] = $this->db->get_where('cp_courses', array('emt_id' =>$emt_id ))->row();

        //$data['paparan_jawapan'] = $this->load->view('answers/view_answers_awesomely_2', $data, TRUE);
        $data['paparan_jawapan'] = $this->load->view('answers/view_answers_awesomely_2_1', $data, TRUE);

        $this->viewit('answers/view_answered_by_premise_2', $data);
    }

    public function answers_by_doe($idpremis, $emt_id) {
        $premise = '';
        $premise_info = $this->mylib->get_company_profile($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise_info, TRUE);

        //paparan jawapan
        $data['idpremis'] = $idpremis;

        //paparan compliance
        $paparan_compliance = 'compliance/form';


        if ($this->answers_model->get_compliance($idpremis)) {
            $premise['rules'] = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremis))->row();
            $paparan_compliance = 'compliance/view';
        }

        $data['paparan_pematuhan'] = $this->load->view($paparan_compliance, $premise, TRUE);

        $data['tools'] = $this->db->get('kpigsr_tool')->result();

        $data['premise_info'] = $this->user_model->get_premise_info($idpremis);

        $information = array();
        $howto_info = array();
        $questions = array();
        $questions_title = array();

        foreach ($data['tools'] as $tool) {
            $information[$tool->tool_no] = $this->db->get_where('kpigsr_information', array('id_tool' => $tool->id))->row();
            $howto_info[$tool->tool_no] = $this->db->get_where('kpigsr_howto', array('tool_id' => $tool->id))->row();

            //get_question_subject&title
            $this->db->select('q.id, q.subject, q.id_question_title, q.id_tool, q.custom_question, q.score');
            $this->db->from('kpigsr_questions q');
            $this->db->join('kpigsr_questions_title qt', 'q.id_question_title = qt.id', 'left');
            $questions[$tool->tool_no] = $this->db->where('q.id_tool', $tool->tool_no)->get()->result();

            $questions_title[$tool->tool_no] = $this->db->get_where('kpigsr_questions_title', array('id_tool' => $tool->tool_no))->result();
        }

        $data['howto_info'] = $howto_info;
        $data['information'] = $information;
        $data['questions'] = $questions;
        $data['questions_title'] = $questions_title;

        $data['answers'] = $this->db->get_where('kpigsr_tool_answers', array('idpremise' => $idpremis, 'emt_id' => $emt_id))->result();
        //answers on date, assessment
        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id' => $emt_id))->row();

        $data['doe_answers'] = $this->db->get_where('kpigsr_review_answers', array('emt_id' => $emt_id))->result();

        $total_tool_implement = 0;
        if ($data['answers2']->tool1_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool2_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool3_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool4_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool5_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool6_implementation == 'true') {
            $total_tool_implement++;
        } if ($data['answers2']->tool7_implementation == 'true') {
            $total_tool_implement++;
        }

        if ($data['answers2']) {
            $data['done'] = true;
        }

        if ($data['answers2']->declaration == 'accept') {
            $data['declaration_accepted'] = true;
        }

        $fields = $this->db->list_fields('kpigsr_answers');

        foreach ($fields as $field) {
            $data['field_name'][] = $field;
        }
        if ($emt_id) {
            $data['emt_id'] = $emt_id;
        }
        $this->load->model('questions_model');
        $data['attachments'] = $this->questions_model->get_attachments($idpremis);

        $this->load->model('score_model');
        $this->load->library('mylib');

        //Begin Premise Score Calculation
        $score1 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 1);
        $score2 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 2);
        $score3 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 3);
        $score4 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 4);
        $score5 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 5);
        $score6 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 6);
        $score7 = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, 7);

        $data['score1'] = $this->mylib->get_assessment_level($score1->score);
        $data['score2'] = $this->mylib->get_assessment_level($score2->score);
        $data['score3'] = $this->mylib->get_assessment_level($score3->score);
        $data['score4'] = $this->mylib->get_assessment_level($score4->score);
        $data['score5'] = $this->mylib->get_assessment_level($score5->score);
        $data['score6'] = $this->mylib->get_assessment_level($score6->score);
        $data['score7'] = $this->mylib->get_assessment_level($score7->score);
        //End Premise Score Calculation

        $data['total_tool_implement'] = $total_tool_implement;
        $data['tool5_cp'] = $this->db->get_where('cp_courses', array('emt_id' =>$emt_id ))->row();

        $data['paparan_jawapan'] = $this->load->view('answers/view_doe_answers_awesomely_2_1', $data, TRUE);

        $this->viewit('answers/view_answered_by_premise_2', $data);
    }

//    public function setDraft() {
//        $emt_id = $this->input->post('emt_id');
//
//        $this->db->where('id', $emt_id);
//        $this->db->update('emt', array('emt_status' => 1));
//        $verify = $this->db->affected_rows();
//
//
//        $idpremis = $this->db->select('premis_id')
//                        ->get_where('emt', array('id' => $emt_id))
//                        ->row()
//                ->premis_id;
//
//        $data2 = array(
//            'emt_id' => $emt_id,
//            'id_premis' => $idpremis,
//            'description' => 'Revert to sender',
//            'changedate' => date("Y-m-d H:i:s"));
//        $this->db->insert('transaksi', $data2);
//
//        echo $verify;
//    }
    
    public function setAssmntComplete($id) {
        //$emt_id = $this->input->post('emt_id');

        $this->db->where('id', $id);
        $this->db->update('kpigsr_answers', array('emt_status' => 3));
        //$verify = $this->db->affected_rows();


        $idpremis = $this->db->select('idpremise')
                        ->get_where('kpigsr_answers', array('id' => $id))
                        ->row()
                ->idpremise;

        //$this->output->enable_profiler(TRUE);
        redirect('remark/pemeriksa_form/' . $idpremis . '/' . $id);
    }

    public function testing($state_code) {

        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $order = $this->input->get("order");

        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

        $premises = $this->answers_model->get_view($start, $length, $order, $dir, $state_code);
        $total_premises = $this->answers_model->get_total_view($state_code);

        $data = array();

        foreach ($premises->result() as $r) {
            
            $emt_status = $this->ref->return_emt_status($r->emt_status);
            if ($r->completed == 1) {
                $emtComplete = 'Complete<br><h6>' . $emt_status . '</h6>';
            } else {
                $emtComplete = 'Not complete<br><h6>' . $emt_status . '</h6>';
            }
            $data[] = array(
                $r->id,
                $r->namapremis,
                $r->bandar,
                $r->idpremis,
                $r->negeri,
                //$r->poskod,
                $r->emt_type,
                $emtComplete,
                $r->cawangan_jas,
                //$r->bandar,
                array(
                    'db' => 'id',
                    'dt' => 'DT_RowId',
                    'formatter' => function( $d, $row ) {
                        // Technically a DOM id cannot start with an integer, so we prefix
                        // a string. This can also be useful if you have multiple tables
                        // to ensure that the id is unique with a different prefix
                        return 'row_' . $d;
                    }
                ),
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_premises,
            "recordsFiltered" => $total_premises,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function completed($state_code) {

        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $order = $this->input->get("order");

        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

        $premises = $this->answers_model->get_completed_view($start, $length, $order, $dir, $state_code);
        $total_premises = $this->answers_model->get_completed_total_view($state_code);

        $data = array();

        foreach ($premises->result() as $r) {
            
            $emt_status = $this->ref->return_emt_status($r->emt_status);
            
            if ($r->completed == 1) {
                $emtComplete = 'Complete<br><h6>' . $emt_status . '</h6>';
            } else {
                $emtComplete = 'Not complete<br><h6>' . $emt_status . '</h6>';
            }
            $data[] = array(
                $r->id,
                $r->namapremis,
                $r->bandar,
                $r->idpremis,
                $r->negeri,
                //$r->poskod,
                $r->emt_type,
                $emtComplete,
                $r->cawangan_jas,
                array(
                    'db' => 'id',
                    'dt' => 'DT_RowId',
                    'formatter' => function( $d, $row ) {
                        // Technically a DOM id cannot start with an integer, so we prefix
                        // a string. This can also be useful if you have multiple tables
                        // to ensure that the id is unique with a different prefix
                        return 'row_' . $d;
                    }
                ),
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_premises,
            "recordsFiltered" => $total_premises,
            "data" => $data
        );
        echo json_encode($output);
        //$this->output->enable_profiler(TRUE);

        exit();
    }

    public function premises_feedback() {

        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $order = $this->input->get("order");

        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

//          $columns_valid = array(
//              "premis_login.NAMAPREMIS", 
//              "premis_login.NOFAILJAS", 
//              "premis_login.IDPREMIS", 
//              "premis_login.JNSINDUSTRI", 
//              "premis_login.PALAMAT"
//          );
//
//          if(!isset($columns_valid[$col])) {
//              $order = null;
//          } else {
//              $order = $columns_valid[$col];
//          }


        $premises = $this->answers_model->get_premises($start, $length, $order, $dir);
        $total_premises = $this->answers_model->get_total_premises();

        $data = array();

        foreach ($premises->result() as $r) {

            $data[] = array(
                $r->id,
                $r->namapremis,
                $r->idpremis,
                $r->poskod,
                $r->bandar,
                $r->negeri,
                $r->telefon,
                $r->faks,
                $r->kod_kategori,
                $r->sic,
                $r->subsic,
                $r->register_date,
                $r->alamat,
                array(
                    'db' => 'id',
                    'dt' => 'DT_RowId',
                    'formatter' => function( $d, $row ) {
                        // Technically a DOM id cannot start with an integer, so we prefix
                        // a string. This can also be useful if you have multiple tables
                        // to ensure that the id is unique with a different prefix
                        return 'row_' . $d;
                    }
                ),
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_premises,
            "recordsFiltered" => $total_premises,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function premises_notifications($state_code) {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $order = $this->input->get("order");

        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

        $premises = $this->answers_model->get_premises2($start, $length, $order, $dir, $state_code);
        $total_premises = $this->answers_model->get_total_premises($state_code);
//          echo '<pre>';
//          print_r($premises->result());
//          echo '</pre>';
        $data = array();

        foreach ($premises->result() as $r) {

            $data[] = array(
                //$r->id,    
                $r->namapremis,
                $r->bandar,
                $r->negeri,
                $r->submission_type,
                $r->submission_date,
                $r->submission_due_date,
                date("Y-m-d", strtotime("$r->register_date +6 months")),
                $r->idpremis,
                $r->poskod,
                $r->telefon,
                $r->faks,
                $r->kod_kategori,
                $r->sic,
                $r->subsic,
                $r->register_date,
                $r->alamat,
                array(
                    'db' => 'id',
                    'dt' => 'DT_RowId',
                    'formatter' => function( $d, $row ) {
                        // Technically a DOM id cannot start with an integer, so we prefix
                        // a string. This can also be useful if you have multiple tables
                        // to ensure that the id is unique with a different prefix
                        return 'row_' . $d;
                    }
                ),
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_premises,
            "recordsFiltered" => $total_premises,
            "data" => $data
        );

        echo json_encode($output);
        exit();
    }

    public function premises_registered($state_code) {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $order = $this->input->get("order");

        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

        $premises = $this->answers_model->get_premises($start, $length, $order, $dir, $state_code);
        $total_premises = $this->answers_model->get_total_premises($state_code);

        $data = array();

        foreach ($premises->result() as $r) {

            $data[] = array(
                //$r->id,
                $r->namapremis,
                $r->bandar,
                $r->negeri,
                $r->submission_type,
                $r->idpremis,
                $r->poskod,
                $r->telefon,
                $r->faks,
                $r->kod_kategori,
                $r->sic,
                $r->subsic,
                date("d/m/Y", strtotime("$r->register_date")),
                $r->alamat,
                $r->cawangan_jas,
//                array(
//                    'db' => 'id',
//                    'dt' => 'DT_RowId',
//                    'formatter' => function( $d, $row ) {
//                        // Technically a DOM id cannot start with an integer, so we prefix
//                        // a string. This can also be useful if you have multiple tables
//                        // to ensure that the id is unique with a different prefix
//                        return 'row_' . $d;
//                    }
//                ),
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_premises,
            "recordsFiltered" => $total_premises,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function submit_review() {
         if($this->input->post(NULL,TRUE)) $hasPOST = true;
        else $hasPOST = false;

        if($hasPOST){
        $post_data = $this->input->post();

        $question_id_array = array();
        $score_id_array = array();
        $status_id_array = array();

        $idpremis = $post_data['idpremise'];
        $tblanswers_id = $this->answers_model->get_answertbl_id($idpremis);


        foreach ($post_data as $key => $value) {
            if (strpos($key, 'q_id') === 0) {
                $question_id_array[$key] = $value;
            }
        }

        foreach ($question_id_array as $question_id) {
            if (array_key_exists('DoeAnswer' . $question_id, $post_data)) {
                $question_id_array[$question_id] = $post_data['DoeAnswer' . $question_id];

                $score = $post_data['scoreDOE' . $question_id];
                
//                $score7 = 0;
//            if (in_array(120, $qidtool_7) || in_array(121, $qidtool_7) || in_array(122, $qidtool_7)) { //$qidtool7 = All Tool 7 answers with YES 
//                $score7 = 70; //Score for all three questions
//              }
//           
//              if(in_array(123, $qidtool_7)){
//                $score7 += $this->Questions_model->get_score(123);
//              }
                if(($question_id == 120) || ($question_id == 121) || ($question_id == 122)){
                    $score = 70; //Score for all three questions
                }
                
//                if($question_id == 123){
//                    $score = 
//                }
                //print_r($this->db->get_where('kpigsr_questions', array('id', $question_id))->row()->id_tool);
                //$answer_id = $post_data['tool_answers_id' . $question_id];
                if ($post_data['DoeAnswer' . $question_id]['status'] == 'Yes') {
                    $answer[] = array(
                        'tool_id' => $this->db->get_where('kpigsr_questions', array('id' => $question_id))->row()->id_tool,
                        'emt_id' => $tblanswers_id,
                        'id_question' => $question_id,
                        'doe_score' => $score,
                        'doe_status' => 'Yes');
                } elseif ($post_data['DoeAnswer' . $question_id]['status'] == 'Not Applicable') {
                    $answer[] = array(
                        'tool_id' => $this->db->get_where('kpigsr_questions', array('id' => $question_id))->row()->id_tool,
                        'emt_id' => $tblanswers_id,
                        'id_question' => $question_id,
                        'doe_score' => $score,
                        'doe_status' => 'Not Applicable');
                } else {
                    $answer[] = array(
                        'tool_id' => $this->db->get_where('kpigsr_questions', array('id' => $question_id))->row()->id_tool,
                        'emt_id' => $tblanswers_id,
                        'id_question' => $question_id,
                        'doe_score' => 0,
                        'doe_status' => 'No');
                }



                //$this->answers_model->set_doe_answers($answer_id, $answer);
            }
        }

        $id = $post_data['data_id'];

        $this->answers_model->set_emt_status($tblanswers_id, 3); //3 = Review

        if ($id) { //kalau ada save, update saja..
            //delete all record then insert balik
            $this->db->where('emt_id', $id);
            $this->db->delete('kpigsr_review_answers');

            foreach ($answer as $data) {
                $this->db->insert('kpigsr_review_answers', $data);
            }
        } else { //kalau takda, insert..
            foreach ($answer as $data) {
                $this->db->insert('kpigsr_review_answers', $data);
            }
        }
        
        $this->answers_model->set_emt_reviewed_by($tblanswers_id, $this->name);
        }
    }

    public function test() {
        $com = $this->answers_model->isAssessmentCompleteRevised(39,4);



        if (!$com) {
            echo 'x complete';
        }
    }
    

    public function view_review($idpremis) { // kena LOOP through all EMT and assign Answers dan SCORE 
        $this->load->library('mylib');
        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $premise['rules_applied'] = $this->mylib->questions_categories($idpremis);
        $data['no_of_rules'] = count($premise['rules_applied']);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);

        //$data['all_remark'] = $this->db->get_where('kpigsr_chat', array('idpremise' => $idpremis))->result();
        
        //$data['answers'] = $this->db->get_where('kpigsr_tool_answers', array('idpremise' => $idpremis))->result(); //KENA LOOP
        //answers on date, assessment
        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis))->row(); //KENA LOOP

        $data['list_of_emt'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis))->result();

        $data['tool_weightage'] = $this->db->get('kpigsr_tool')->result();
        
        
        $this->load->model('score_model');

        //print_r($data['list_of_emt']);
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
            }
            
            $data['all_remark'] = $this->db->order_by('datetime', 'DESC')->get_where('kpigsr_chat', array('emt_id' => $value->id))->result();
            $data['ulasan'] = $this->db->order_by('datetime', 'DESC')->get_where('kpigsr_chat', array('emt_id' => $value->id))->result();
        }
        $data['paparan_remark'] = $this->load->view('ulasan/chat_view', $data, TRUE);
        $this->viewit('answers/review', $data);
        //$this->output->enable_profiler(TRUE);
    }

    public function checkVerification($idpremise) {
        $emt_id = $this->answers_model->get_answertbl_id($idpremise);
        $data = $this->answers_model->get_emt_verification_type($emt_id);
        if ($data) {
            echo $data;
        } else {
            return false;
        }
    }

    public function setVerificationType($idpremise) {
        $type = $this->input->post('verify_type');

//        if ($type == 'FI' || $type == 'Desktop') {
            $emt_id = $this->answers_model->get_answertbl_id($idpremise);
            $this->answers_model->set_emt_verification_type($emt_id, 'FI');
//        } else {
//            echo $type;
//        }
    }

    public function get_reviewed_question_status($emt_id) {

        $data = $this->answers_model->get_review_by_id($emt_id);

        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function print_answers($idpremis, $emt_id) {

        $this->load->model('Questions_model');

        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $premise['rules_applied'] = $this->mylib->questions_categories($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
        //print_r($data['maklumat_premis']);
        //paparan jawapan
        $data['no_of_rules'] = count($premise['rules_applied']);
        $data['idpremis'] = $idpremis;

        //paparan compliance
        $premise['rules'] = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremis))->row();
        $data['paparan_pematuhan'] = $this->load->view('compliance/view', $premise, TRUE);
        $data['tool_weightage'] = $this->db->get('kpigsr_tool')->result();
        $data['tools'] = $this->db->get('kpigsr_tool')->result();

        $data['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $data['ulasan'] = $this->db->order_by('datetime', 'DESC')->get_where('kpigsr_chat', array('emt_id' => $emt_id))->result();
        $data['paparan_remark'] = $this->load->view('ulasan/chat_view', $data, TRUE);
        
        $information = array();
        $howto_info = array();
        $questions = array();
        $questions_title = array();

        foreach ($data['tools'] as $tool) {
            $information[$tool->tool_no] = $this->db->get_where('kpigsr_information', array('id_tool' => $tool->id))->row();
            $howto_info[$tool->tool_no] = $this->db->get_where('kpigsr_howto', array('tool_id' => $tool->id))->row();

            //get_question_subject&title
            $this->db->select('q.id, q.subject, q.id_question_title, q.id_tool, q.custom_question, q.score');
            $this->db->from('kpigsr_questions q');
            $this->db->join('kpigsr_questions_title qt', 'q.id_question_title = qt.id', 'left');

            $questions[$tool->tool_no] = $this->db->where('q.id_tool', $tool->tool_no)->get()->result();

            $questions_title[$tool->tool_no] = $this->db->get_where('kpigsr_questions_title', array('id_tool' => $tool->tool_no))->result();
        }
//        echo '<pre>';
//        print_r($questions);
//        echo '</pre>';

        $this->load->model('score_model');

        foreach ($data['tools'] as $tool) {
            $tool->tool_implementation = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row('tool' . $tool->tool_no . '_implementation');
            $tool->tool_justification = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row('tool' . $tool->tool_no . '_justification');
            $tool->date_implement = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row('tool' . $tool->tool_no . '_date_implement');

            $score = $this->score_model->get_premise_score_by_tool($idpremis, $emt_id, $tool->tool_no);

            $tool->assessLvl = $this->mylib->get_assessment_level($score->score);

            foreach ($questions as $question) {
                foreach ($question as $q) {
                    $q->status_answers = $this->db->get_where('kpigsr_tool_answers', array('emt_id' => $emt_id, 'id_question' => $q->id))->row('status');
                    $q->justification = $this->db->get_where('kpigsr_tool_answers', array('emt_id' => $emt_id, 'id_question' => $q->id))->row('justification');

                    //Status dan Score dari DOE
                    $q->doe_status_answer = $this->db->get_where('kpigsr_review_answers', array('emt_id' => $emt_id, 'id_question' => $q->id))->row('doe_status');
                    $q->doe_score =$this->db->get_where('kpigsr_review_answers', array('emt_id' => $emt_id, 'id_question' => $q->id))->row('doe_score');    
                }
            }
        }
        
         for ($i = 1; $i <= 7; $i++) {
             
             if($i == 7){
                 $tool7_score = $this->score_model->get_score_by_tool( $emt_id, $i);
                 
                 if($tool7_score > 100){
                     $data['tool7_DOE_score_emt'] = 100;
                 } else {
                     $data['tool7_DOE_score_emt'] = $tool7_score;
                 }
             } else{
                 $data['tool' . $i . '_DOE_score_emt'] = $this->score_model->get_score_by_tool( $emt_id, $i);
             }
                
                $data['answers2_emt'] = $this->db->get_where('kpigsr_answers', array('id' => $emt_id))->row(); //KENA LOOP
            }

        $data['attachments'] = $this->Questions_model->get_attachments($idpremis);
        $data['howto_info'] = $howto_info;
        $data['information'] = $information;

        $data['questions'] = $questions;
        $data['questions_title'] = $questions_title;

        $data['emt_id'] = $emt_id;
        $data['answers'] = $this->db->get_where('kpigsr_tool_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->result();
        //answers on date, assessment
        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row();

        if ($data['answers2']) {
            $data['done'] = true;
        }

        if ($data['answers2']->declaration == 'accept') {
            $data['declaration_accepted'] = true;
        }
        
        $data['tool5_cp'] = $this->db->get_where('cp_courses', array('emt_id' =>$emt_id ))->row();
        
        $this->viewit('answers/print_answers_awesomely_2', $data);
    }
}
