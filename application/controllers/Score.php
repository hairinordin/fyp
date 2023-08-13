<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('answers_model');
        $this->load->library('mylib');
        $this->load->model('score_model');
        $this->load->model('user_model');
        
    }
    
    public function index($idpremis="1401F0163248", $emt_id=39){
        //$premise = '';
        $premise_info = $this->mylib->get_company_profile($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise_info, TRUE);
        $data['tool_weightage'] = $this->db->get('kpigsr_tool')->result();
        
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
        
        $this->viewit('score/index', $data);
    }
    
//     public function add_score($idpremis = '0901R0543238', $tool_no=1){
//        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
//        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
//        //print_r($data['maklumat_premis']);
//        
//        //paparan jawapan
//        $data['idpremis'] = $idpremis;
//        
//        $data['tool'] = $this->db->get_where('kpigsr_tool', array('tool_no' => $tool_no))->row();
//        $jawapan['tool'] = $this->db->get_where('kpigsr_tool', array('tool_no' => $tool_no))->row();
//        //get_question_subject&title
//        $this->db->select('q.id, q.subject, q.id_question_title, q.id_tool, q.custom_question');
//        $this->db->from('kpigsr_questions q');
//        $this->db->join('kpigsr_questions_title qt', 'q.id_question_title = qt.id', 'left' );
//        $jawapan['questions'] = $this->db->where('q.id_tool', $tool_no)->get()->result();
//        $jawapan['questions_title'] = $this->db->get_where('kpigsr_questions_title', array('id_tool' => $tool_no))->result();
//        $jawapan['information'] = $this->db->get_where('kpigsr_information' , array('id_tool' => $data['tool']->id))->row();
//        $jawapan['howto_info'] = $this->db->get_where('kpigsr_howto' , array('tool_id' => $data['tool']->id))->row();
//        $jawapan['answers'] = $this->db->get_where('kpigsr_tool_answers', array('idpremise' => $idpremis, 'tool_id' => $data['tool']->id))->result();
//        //answers on date, assessment
//        $jawapan['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis))->row();
//        
//        $jawapan['attachments'] = $this->db->get_where('kpigsr_attachment', array('idpremise' => $idpremis, 'id_tool' =>$tool_no))->result();
//        $data['paparan_jawapan'] = $this->load->view('question/view/view_answers_awesomely', $jawapan, TRUE);
//        
//        //paparan field inspection
//        $this->db->select('*');
//        $this->db->from('kpigsr_field_inspection');
//        $this->db->where('idpremis', $idpremis); 
//        $data['field_inspection'] = $this->db->get()->result_array();
//        
//       
//        $this->viewit('score/view_answered_by_premise', $data);
//    }
    
}