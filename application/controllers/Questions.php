<?php

class Questions extends MY_Controller {

    public $table = 'kpigsr_tool_answers';

    function __construct() {
        // Call the Model constructor
        parent::__construct();

        $this->load->model('Questions_model');
        $this->load->model('user_model');
        $this->load->library('mylib');
    }

    public function index() {

        $premise_info = $this->mylib->get_company_profile($idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise_info, TRUE);

        // $this->viewit('dashboard/dashboard_premise', $data);
        $this->load->view('dashboard/dashboard_premise', $data);
    }

    //before submission declare what you enter
    public function declaration($premiseid = '1004B184131') {

        $data['premise_info'] = $this->user_model->get_premise_info($premiseid);
        $this->viewit('question/view/view_declaration', $data);
    }

    public function submit_edit_answer($tool_no) {
        //$this->output->enable_profiler(TRUE);
        //sanitize verification etc
        //$post_data = $this->input->post();

        $idpremis = $this->idpremis;

        if ($this->input->post('submit_btn')) {
            $status = 'submit';
            unset($_POST['submit_btn']);
        } elseif ($this->input->post('draft_btn')) {
            $status = 'draft';
            unset($_POST['draft_btn']);
        } else {
            $status = 'invalid';
        }
        //verification
        $tool_no = $this->input->post('tool_no');

        $self_assessment = $this->input->post('self_assessment');
        $date_implement = $this->input->post('date_implement');
        $answer_id = $this->input->post('answer_id');

        unset($_POST['tool_no']);
        unset($_POST['self_assessment']);
        unset($_POST['date_implement']);
        unset($_POST['answer_id']);

        foreach ($this->input->post() as $i => $answer) {

            echo '## $i is ' . $i . ' => $answer is ' . $answer . '<br>';
            //var_dump($answer);
            $data = array(
                'idpremise' => $idpremis,
                'id_question' => $i,
                'status' => $answer,
                'tool_id' => $tool_no
            );

            $this->db->where('id_question', $i);
            $this->db->where('idpremise', $idpremis);
            $this->db->update($this->table, $data);
        }

        $data2 = array(
            'idpremise' => $idpremis,
            //'emt_type' => $emt_type,
            'ans_self_assessment' => $self_assessment,
            'ans_date_implementation' => $date_implement,
            //'comment' => $this->input->post('comment'),
            'status' => $status,
            'id_tool' => $tool_no,
                //'created_on' => date("Y-m-d H:i:s")
        );

        $this->db->where('id', $answer_id);
        $this->db->update('kpigsr_answers', $data2);

        $files = $_FILES['uploaded_docs'];

        echo $_FILES['uploaded_docs']['type'][0];

        if (!$this->mylib->multiple_upload($tool_no, $idpremis, $files)) {
            echo 'tak berjaya';
        } else {
            echo ' berjaya';
        }
    }

    public function view_answer_dynamically($idpremis, $tool_no) {

        //$this->output->enable_profiler(TRUE);
        $data['idpremis'] = $idpremis;

        $data['tool'] = $this->db->get_where('kpigsr_tool', array('tool_no' => $tool_no))->row();

        //get_question_subject&title
        $this->db->select('q.id, q.subject, q.id_question_title, q.id_tool, q.custom_question');
        $this->db->from('kpigsr_questions q');
        $this->db->join('kpigsr_questions_title qt', 'q.id_question_title = qt.id', 'left');
        $data['questions'] = $this->db->where('q.id_tool', $tool_no)->get()->result();
        $data['questions_title'] = $this->db->get_where('kpigsr_questions_title', array('id_tool' => $tool_no))->result();
        $data['information'] = $this->db->get_where('kpigsr_information', array('id_tool' => $data['tool']->id))->row();
        $data['howto_info'] = $this->db->get_where('kpigsr_howto', array('tool_id' => $data['tool']->id))->row();
        $data['answers'] = $this->db->get_where('kpigsr_tool_answers', array('idpremise' => $idpremis, 'tool_id' => $data['tool']->id))->result();
        //answers on date, assessment
        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $idpremis, 'id_tool' => $tool_no))->row();

        $data['attachments'] = $this->db->get_where('kpigsr_attachment', array('idpremise' => $idpremis, 'id_tool' => $tool_no))->result();

        $this->viewit('question/view/view_answers_awesomely', $data);
    }

    public function view_question($idpremis = '', $emt_id = '') {
        $data['done'] = false;
        $data['declaration_accepted'] = false;
        $data['answers2'] = '';
        $data['emt_id'] = '';
        //get_tool_no

        $data['tools'] = $this->db->get('kpigsr_tool')->result();

        $data['premise_info'] = $this->user_model->get_premise_info($this->idpremis);

        $data['rules_applied'] = $this->mylib->questions_categories($this->idpremis);


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


//         echo '<pre>';
//          print_r($data['rules_applied']);
//        echo '</pre>';
        $data['howto_info'] = $howto_info;
        $data['information'] = $information;

        $data['questions'] = $questions;
        $data['questions_title'] = $questions_title;
        
        if($emt_id){
          $data['emt_id'] = $emt_id;
        }

       $this->viewit('question/view/view_question_awesomely_2', $data);

        //$this->output->enable_profiler(TRUE);
    }
    
    public function print_answers($idpremis, $emt_id) {
        
        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $premise['rules_applied'] = $this->mylib->questions_categories($this->idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
        //print_r($data['maklumat_premis']);
        //paparan jawapan
        $data['idpremis'] = $idpremis;

        //paparan compliance
        $premise['rules'] = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremis))->row();
        $data['paparan_pematuhan'] = $this->load->view('compliance/view', $premise, TRUE);

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
        
            $tool->tool_implementation = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row('tool'.$tool->tool_no .'_implementation');
            $tool->tool_justification = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row('tool'.$tool->tool_no .'_justification');
            $tool->date_implement = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row('tool'.$tool->tool_no .'_date_implement');      
            
            foreach($questions as $question){
                foreach($question as $q){
                    $q->status_answers = $this->db->get_where('kpigsr_tool_answers', array('emt_id' => $emt_id, 'id_question' => $q->id))->row('status');
                    $q->justification = $this->db->get_where('kpigsr_tool_answers', array('emt_id' => $emt_id, 'id_question' => $q->id))->row('justification');
                }       
            }
        }
//        echo '<pre>';
//        print_r($questions);
//        echo '</pre>';
//        foreach ($data['tools'] as $tool) {
//            $tool->tool_implementation = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row('tool'.$tool->tool_no .'_implementation');
//            $tool->tool_justification = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row('tool'.$tool->tool_no .'_justification');
//            $tool->date_implement = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row('tool'.$tool->tool_no .'_date_implement');      
//            
//            foreach($questions as $question){
//                foreach($question as $q){
//                    $q->status_answers = $this->db->get_where('kpigsr_tool_answers', array('emt_id' => $emt_id, 'id_question' => $q->id))->row('status');
//                    $q->justification = $this->db->get_where('kpigsr_tool_answers', array('emt_id' => $emt_id, 'id_question' => $q->id))->row('justification');
//                }
//                
//            }
        
//        }
//        echo '<pre>';
//        print_r($data['tools']);
//        echo '</pre>';
        $data['attachments']= $this->Questions_model->get_attachments($idpremis);
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
        //$data['paparan_jawapan'] = $this->load->view('question/view/view_answers_awesomely_2', $data, TRUE);

        $this->viewit('question/view/print_answers_awesomely_2', $data);
        //$this->output->enable_profiler(TRUE);
    }
    
        public function view_answers($idpremis, $emt_id) {

        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        $premise['rules_applied'] = $this->mylib->questions_categories($this->idpremis);
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
        //print_r($data['maklumat_premis']);
        //paparan jawapan
        $data['idpremis'] = $idpremis;

        //paparan compliance
        $premise['rules'] = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremis))->row();
        $data['paparan_pematuhan'] = $this->load->view('compliance/view', $premise, TRUE);

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
        
        $data['emt_id'] = $emt_id;
        $data['answers'] = $this->db->get_where('kpigsr_tool_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->result();
        //answers on date, assessment
        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('id' => $emt_id, 'idpremise' => $idpremis))->row();
        //$data['tool5_cp'] = $this->db->get_where('cp_courses', array('emt_id' =>$emt_id ))->row();

        if ($data['answers2']) {
            $data['done'] = true;
        }

        if ($data['answers2']->declaration == 'accept') {
            $data['declaration_accepted'] = true;
        }

        $data['paparan_jawapan'] = $this->load->view('question/view/view_answers_awesomely_2', $data, TRUE);

        $this->viewit('question/view/view_answered_by_premise_2', $data);
    }

    public function submit_answer2() {
        
        $answeredData = array();
        $update_id = array();
        $answeredToolData = array();
        $score_id = array();
        //sanitize verification etc
        $post_data = $this->input->post();

//        $files = $_FILES;
//        echo '<pre>';
//        print_r($files);
//        echo '</pre>';
        $idpremis = $this->idpremis;

        //extract date implementation 
        for ($i = 1; $i < 8; $i++) {
            if (isset($post_data['date_implement#' . $i])) {
                $date_implement[$i] = $post_data['date_implement#' . $i];
                unset($post_data['date_implement#' . $i]);
            } else {
                //date implement tiada
                $date_implement[$i] = '';
            }
        }
        //extract question enable
        for ($i = 1; $i < 8; $i++) {
            if (isset($post_data['question_enable_tool' . $i])) {
                $enable_tool[$i] = $post_data['question_enable_tool' . $i];
                unset($post_data['question_enable_tool' . $i]);
            }
        }
        //extract tool justification
        for ($i = 1; $i < 8; $i++) {
            if (isset($post_data['tool_justification' . $i])) {
                $tool_justification[$i] = $post_data['tool_justification' . $i];
            }
        }

        //extract step 8 - Declaration
        if(isset($post_data['declaration'])){
           $declaration = $post_data['declaration'];
           $declaration_date = $post_data['declaration_date']; 
        } else{
            $declaration = '';
            $declaration_date = '';
        }
        
        
        unset($post_data['declaration']);
        unset($post_data['declaration_date']);

        //DEBUGGING DATE IMPLEMENT
        //echo '<pre>';
        //print_r($post_data);
        //echo '</pre><br>####################<br>';
        //extract question_id
        $question_id_array = array();
        foreach ($post_data as $key => $value) {
            if (strpos($key, 'question_id_') === 0) {
                $question_id_array[$key] = $value;
            }
        }

        foreach ($question_id_array as $key => $value) {
            if ("question_id_" == substr($key, 0, 12)) {
                $number = substr($key, strrpos($key, '_'));
                $question_id[] = str_replace('_', '', $number);
            }
        }

        $combinedArray = array_combine($question_id, $question_id_array);
        $results = $this->Questions_model->get_tool_id($question_id);

        foreach ($results as $result) {

            foreach ($combinedArray as $question_id => $answer) {
                if ($question_id == $result['id']) {
                    $answer['tool_id'] = $result['id_tool'];
                    $answer['question_id'] = $result['id'];


                    if (array_key_exists('status', $answer)) {

                        //print_r($question_id);
                        if ($answer['status'] == 'Yes') {

                            $status = 'Yes';
                            $justification = '';

                            $score_id[] = array($answer['tool_id'] => $answer['question_id']);
                        } elseif ($answer['status'] == 'No') {

                            $status = 'No';
                            $justification = $answer['justification'];
                        } elseif ($answer['status'] == 'Not applicable') {

                            $status = 'Not applicable';
                            $justification = '';
                            $score_id[] = array($answer['tool_id'] => $answer['question_id']);
                            
                        }
//                         elseif ($answer['status'] == 'Not available') {
//
//                            $status = 'Not available';
//                            $justification = '';
//                            $score_id[] = array($answer['tool_id'] => $answer['question_id']);
//                        }

                        $answeredData[] = array(
                            'idpremise' => $idpremis,
                            'id_question' => $answer['question_id'],
                            'status' => $status,
                            'justification' => $justification,
                            'tool_id' => $answer['tool_id']
                        );

                        $update_id[] = array(
                            'id_question' => $answer['question_id'],
                            'id' => $post_data['tool_answers_id' . $answer['question_id']]
                        );
                    } else {
                        //maksudnya soalan tak jawab
                        //echo "<br>Key does not exist!<br>";
                        //print_r($question_id);
                    }

//                    
                }
            }
        }

        //CALCULATE SCORE warning:notice sebab salah gunakan key sebagai tool_id ...on purpose..hehehe
        $qidtool_1 = array();
        $qidtool_2 = array();
        $qidtool_3 = array();
        $qidtool_4 = array();
        $qidtool_5 = array();
        $qidtool_6 = array();
        $qidtool_7 = array();

        foreach ($score_id as $key) {

            $qidtool_1[] = !isset($key[1]) ? null : $key[1];
            $qidtool_2[] = !isset($key[2]) ? null : $key[2];
            $qidtool_3[] = !isset($key[3]) ? null : $key[3];
            $qidtool_4[] = !isset($key[4]) ? null : $key[4];
            $qidtool_5[] = !isset($key[5]) ? null : $key[5];
            $qidtool_6[] = !isset($key[6]) ? null : $key[6];
            $qidtool_7[] = !isset($key[7]) ? null : $key[7];
            } 
        
        if (!empty($qidtool_1)) {
            $score1 = $this->Questions_model->get_score($qidtool_1);
        }
        if (!empty($qidtool_2)) {
            $score2 = $this->Questions_model->get_score($qidtool_2);
        }
        if (!empty($qidtool_3)) {
            $score3 = $this->Questions_model->get_score($qidtool_3);
        }
        if (!empty($qidtool_4)) {
            $score4 = $this->Questions_model->get_score($qidtool_4);
        }
        if (!empty($qidtool_5)) {
            $score5 = $this->Questions_model->get_score($qidtool_5);
        }
        if (!empty($qidtool_6)) {
            $score6 = $this->Questions_model->get_score($qidtool_6);
        }
        if (!empty($qidtool_7)) { //Question ID For tool 7 //Rquire bbecause of an unique way of score given..qid 120,121,122, if any of those question answers as YES, Full Marks is given
            //print_r($qidtool_7);
            $score7 = 0;
            if (in_array(120, $qidtool_7) || in_array(121, $qidtool_7) || in_array(122, $qidtool_7)) { //$qidtool7 = All Tool 7 answers with YES 
                $score7 = 70; //Score for all three questions
              }
           
              if(in_array(123, $qidtool_7)){
                $score7 += $this->Questions_model->get_score(123);
              }
          
            //echo $score7;
        }
        
        $rules = $this->mylib->questions_categories($this->idpremis);
        $no_of_rules = count($rules);

        $emt_status = 2; // Kalau submit btn 
        $date_submit = date("Y/m/d");

        if ($post_data['method'] == 'save') {
            $emt_status = 1;
            $date_submit = ''; //belum nak submit
        }

        $insert_data = array(
            'idpremise' => $idpremis,
            'emt_type' => $this->user_model->get_premise_emt_type($idpremis),
            'emt_status' => $emt_status,
            'completed' => '0',
            'declaration' => $declaration,
            'submission_date' => $date_submit, //$declaration_date,
            'tool1_date_implement' => $date_implement[1],
            'tool2_date_implement' => $date_implement[2],
            'tool3_date_implement' => $date_implement[3],
            'tool4_date_implement' => $date_implement[4],
            'tool5_date_implement' => $date_implement[5],
            'tool6_date_implement' => $date_implement[6],
            'tool7_date_implement' => $date_implement[7],
            'tool1_implementation' => !empty($enable_tool[1]) ? $enable_tool[1] : 'NULL',
            'tool2_implementation' => !empty($enable_tool[2]) ? $enable_tool[2] : 'NULL',
            'tool3_implementation' => !empty($enable_tool[3]) ? $enable_tool[3] : 'NULL',
            'tool4_implementation' => !empty($enable_tool[4]) ? $enable_tool[4] : 'NULL',
            'tool5_implementation' => !empty($enable_tool[5]) ? $enable_tool[5] : 'NULL',
            'tool6_implementation' => !empty($enable_tool[6]) ? $enable_tool[6] : 'NULL',
            'tool7_implementation' => !empty($enable_tool[7]) ? $enable_tool[7] : 'NULL',
            'tool1_score_premise' => !empty($score1) ? $score1 : '',
            'tool2_score_premise' => !empty($score2) ? $score2 : '',
            'tool3_score_premise' => !empty($score3) ? $score3 : '',
            'tool4_score_premise' => !empty($score4) ? $score4 / $no_of_rules : '',
            'tool5_score_premise' => !empty($score5) ? $score5 / $no_of_rules : '',
            'tool6_score_premise' => !empty($score6) ? $score6 / $no_of_rules : '',
            'tool7_score_premise' => !empty($score7) ? $score7 : '',
            'tool1_assessment' => $this->assessment_strength(!empty($score1) ? $score1 : 0),
            'tool2_assessment' => $this->assessment_strength(!empty($score2) ? $score2 : 0),
            'tool3_assessment' => $this->assessment_strength(!empty($score3) ? $score3 : 0),
            'tool4_assessment' => $this->assessment_strength(!empty($score4) ? $score4 / $no_of_rules : 0),
            'tool5_assessment' => $this->assessment_strength(!empty($score5) ? $score5 / $no_of_rules : 0),
            'tool6_assessment' => $this->assessment_strength(!empty($score6) ? $score6 / $no_of_rules : 0),
            'tool7_assessment' => $this->assessment_strength(!empty($score7) ? $score7 : 0),
            'tool1_justification' => !empty($tool_justification[1]) ? $tool_justification[1] : '',
            'tool2_justification' => !empty($tool_justification[2]) ? $tool_justification[2] : '',
            'tool3_justification' => !empty($tool_justification[3]) ? $tool_justification[3] : '',
            'tool4_justification' => !empty($tool_justification[4]) ? $tool_justification[4] : '',
            'tool5_justification' => !empty($tool_justification[5]) ? $tool_justification[5] : '',
            'tool6_justification' => !empty($tool_justification[6]) ? $tool_justification[6] : '',
            'tool7_justification' => !empty($tool_justification[7]) ? $tool_justification[7] : '',
        );
               //extract tool 5 - Competent Person
                $tool5 = array(
                    'ceppome' => isset($post_data['ceppomeChk']) ? 1 : 0,
                    'cepstpo' => isset($post_data['cepstpoChk']) ? 1 : 0,
                    'cepltpo' => isset($post_data['cepltpoChk']) ? 1 : 0,
                    'cepietso' => isset($post_data['cepietsoChk']) ? 1 : 0,
                    'csec' => isset($post_data['csecChk']) ? 1 : 0,
                    'cebfo' => isset($post_data['cebfoChk']) ? 1 : 0,
                    'cepso' => isset($post_data['cepsoChk']) ? 1 : 0,
                    'cepswam' => isset($post_data['cepswamChk']) ? 1 : 0,
                );
                
        if ($post_data['method'] == 'submit') {

            $id = $post_data['data_id'];

            if ($id) { //kalau ada save, update saja..
                //Hairi-12/9/2018
                $insert_id = $id;
                $this->db->where('id', $id);
                $this->db->update('kpigsr_answers', $insert_data);

                //delete all record then insert balik..delete berdasarkan delete where...
                $this->db->where('idpremise', $idpremis);
                $this->db->where('emt_id', $id);
                $this->db->delete('kpigsr_tool_answers');
                
                foreach ($answeredData as $data) {
                    $data['emt_id'] = $id;
                    $this->db->insert('kpigsr_tool_answers', $data);
                }
            
                $tool5['emt_id'] = $id;
             
                $this->db->where('emt_id', $id);
                $this->db->delete('cp_courses');
                
                $this->db->insert('cp_courses', $tool5);
                
                

//                
//                if($this->bdbm_model->bm_wujud($idpremis, $id)){
//                   $this->bdbm_model->set_counter('BD', $idpremis, $id);
//                }else{
//                    $this->bdbm_model->set_counter('BM', $idpremis, $id);
//                }
                    
            } else { // kalau takda save jawapan sebelum ini
                $this->db->insert('kpigsr_answers', $insert_data);
                
                $insert_id = $this->db->insert_id();
                
                foreach ($answeredData as $data) {
                    $data['emt_id'] = $insert_id;
                    $this->db->insert('kpigsr_tool_answers', $data);
                }
                
                $tool5['emt_id'] = $insert_id;
                          
                $this->db->insert('cp_courses', $tool5);
                
                //SET BM
                /*
                 *  Kalau BM belum wujud dalam table kpigsr_bm, wujudkan.
                 *  Jika dah ada, abaikan.
                */
                $this->load->model('bm_model');
                
                if($this->bm_model->bm_wujud($idpremis)){
                    //do nothing
                } else {
                    $this->bm_model->set_counter($idpremis, $id);
                }
 
            }
            $email = $this->user_model->get_premise_info($idpremis)->email;
            
            $this->load->library('mylib');
            $this->mylib->send_email_notification('EMT Submission', 'Your form has been received and is being processed. Thank you.', $email);
            
            echo 'submit';
            
        } elseif ($post_data['method'] == 'save') {

            $id = $post_data['data_id'];
            $insert_id = $id;
            
            if ($id) { //kalau ada jawapan yang dah draft sebelum ini
               $this->db->where('id', $id);
               $this->db->update('kpigsr_answers', $insert_data);

                //delete all record then insert balik..delete berdasarkan delete where...
               $this->db->where('idpremise', $idpremis);
               $this->db->where('emt_id', $id);
               $this->db->where('doe_status'); //generated doe_status is NULL
               $this->db->delete('kpigsr_tool_answers');

                foreach ($answeredData as $data) {
                    $data['emt_id'] = $id;
                    $this->db->insert('kpigsr_tool_answers', $data);
                }
                
                $tool5['emt_id'] = $insert_id;
                
                $this->db->where('emt_id', $insert_id);
                $this->db->delete('cp_courses');
                
                $this->db->insert('cp_courses', $tool5);
                 

//                foreach ($answeredData as $data) {
//                    print_r($update_id);
//                    foreach ($update_id as $key) {
//                        if ($data['id_question'] == $key['id_question']) {
//                            $this->db->where('id', $key['id']);
//                            $this->db->update('kpigsr_tool_answers', $data);
//                        } else{ /// ada problem, kalau data blom jawab, bila save atau submit, data tak rekod...SHITTTTTTTTTTTT
//                            //$this->db->insert('kpigsr_tool_answers', $data);
//                            
//                           
//                        }
//                    }
//                }
            } else {//kalau save btn, dan takda jawapan sebelum ini
                $this->db->insert('kpigsr_answers', $insert_data);
                $insert_id = $this->db->insert_id();
                foreach ($answeredData as $data) {
                    $data['emt_id'] = $insert_id;
                    $this->db->insert('kpigsr_tool_answers', $data);
                }
                
                $tool5['emt_id'] = $insert_id;
                $this->db->insert('cp_courses', $tool5);
            }
            
            //SET BM
                /*
                 *  Kalau BM belum wujud dalam table kpigsr_bm, wujudkan.
                 *  Jika dah ada, abaikan.
                */
            //COMMENT OUT - sebab salah tempat 13/7/22    
//            $this->load->model('bm_model');
//                
//                if($this->bm_model->bm_wujud($idpremis)){
//                    //do nothing
//                } else {
//                    $this->bm_model->set_counter($idpremis, $id);
//                }
                
                
                
            if($insert_id){
                echo $insert_id;
            } 
            
        }  else {
            echo 'error submitting form';
        }
        //$this->output->enable_profiler(TRUE);
    }
  
    public function get_tool_submission_status($idpremis, $emt_id) {
        
        if($this->Questions_model->get_answers_by_id($idpremis,$emt_id)){
            $data = $this->Questions_model->get_answers_by_id($idpremis,$emt_id);
            
        } else {
            $data = $this->Questions_model->get_answers_by_id_no_answers($idpremis,$emt_id);
        }
        
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
    
    public function get_tool5_cp($emt_id){
        $data = $this->db->get_where('cp_courses', array('emt_id' =>$emt_id ))->row();
        
        echo json_encode($data, JSON_PRETTY_PRINT);
        
    }
    
    public function get_rules_applied($idpremis) {

        $data = $this->mylib->questions_categories($this->idpremis);
        
        if($data){
            echo json_encode($data, JSON_PRETTY_PRINT);
        }else {
            return false;
        }
    }

    public function start_date() {
        $idpremis = $this->input->post('idpremis');

        if ($this->Questions_model->set_started_date($idpremis)) {
            header('Content-type: application/json');
            echo json_encode(array("status" => TRUE));
        } else {
            header('Content-type: application/json');
            echo json_encode(array("status" => FALSE));
        }
    }

    public function assessment_strength($score = 0) {

        if ($score > 0 && $score < 20) {
            return 'Poor';
        } elseif ($score > 19 && $score < 40) {
            return 'Fair';
        } elseif ($score > 39 && $score < 60) {
            return 'Average';
        } elseif ($score > 59 && $score < 80) {
            return 'Good';
        } elseif ($score > 79 && $score < 101) {
            return 'Excellent';
        } else {
            return 'Not available';
        }
    }

    public function deletefile() {

        $deleteid = $this->input->post('image_id');
        $file = $this->get_file_path($deleteid);

        $this->db->delete('kpigsr_attachment', array('id' => $deleteid));
        $verify = $this->db->affected_rows();
        if ($verify == 1) {

            if (is_readable($file) && unlink($file)) {
                echo "deleted";
            } else {
                echo "The file was not found or not readable and could not be deleted";
            }
        }
    }

    public function get_file_path($id) {
        $this->db->where('id', $id);
        return $this->db->get('kpigsr_attachment')->row()->path;
    }
    
}
