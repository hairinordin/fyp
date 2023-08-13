<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->theme = 'new_theme'; // home_view
        $this->load->model('user_model');
        $this->load->model('Ref_model', 'ref');
        $this->load->library('mylib');
    }

    public function index() {

        $data['month'] = $this->ref->data('month');
        $data['year'] = $this->ref->data('year');
        $this->viewit('dashboard/dashboard_index', $data);
    }

    public function company() {
        $premise['premise_info'] = $this->user_model->get_premise_info($this->idpremis);

        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);

        $data['date_started'] = $this->db->get_where('kpigsr_audit_premise', array('premiseid' => $this->idpremis))->row();
        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $this->idpremis))->result();
        $tool_weightage = $this->db->get('kpigsr_tool')->result();

        foreach ($data['answers2'] as $emt) {

            // dapatkan jumlah emt ?/7
            if ($emt) {
                $x = 0;


//                ($emt->tool1_implementation == true) ? $x++ : $emt->tool1_score_premise = 100;
//                ($emt->tool2_implementation == true) ? $x++ : $emt->tool2_score_premise = 100;
//                ($emt->tool3_implementation == true) ? $x++ : $emt->tool3_score_premise = 100;
//                ($emt->tool4_implementation == true) ? $x++ : $emt->tool4_score_premise = 100;
//                ($emt->tool5_implementation == true) ? $x++ : $emt->tool5_score_premise = 100;
//                ($emt->tool6_implementation == true) ? $x++ : $emt->tool6_score_premise = 100;
//                ($emt->tool7_implementation == true) ? $x++ : $emt->tool7_score_premise = 100;
                ($emt->tool1_implementation == 'true') ? $x++ : '';
                ($emt->tool2_implementation == 'true') ? $x++ : '';
                ($emt->tool3_implementation == 'true') ? $x++ : '';
                ($emt->tool4_implementation == 'true') ? $x++ : '';
                ($emt->tool5_implementation == 'true') ? $x++ : '';
                ($emt->tool6_implementation == 'true') ? $x++ : '';
                ($emt->tool7_implementation == 'true') ? $x++ : '';

                $emt->total_emt = $x;

                $score = 0;
                // dapatkan jumlah score premise
                $score += ($emt->tool1_score_premise / 100) * $tool_weightage[0]->tool_full_score;
                $score += ($emt->tool2_score_premise / 100) * $tool_weightage[1]->tool_full_score;
                $score += ($emt->tool3_score_premise / 100) * $tool_weightage[2]->tool_full_score;
                $score += ($emt->tool4_score_premise / 100) * $tool_weightage[3]->tool_full_score;
                $score += ($emt->tool5_score_premise / 100) * $tool_weightage[4]->tool_full_score;
                $score += ($emt->tool6_score_premise / 100) * $tool_weightage[5]->tool_full_score;
                $score += ($emt->tool7_score_premise / 100) * $tool_weightage[6]->tool_full_score;

                $emt->score = $score;
                //Calculate markah premise by tool

                $this->load->model('score_model');
                $scoreDOETool1 = ($this->score_model->get_score_by_tool($emt->id, '1') * $tool_weightage[0]->tool_full_score) / 100;
                $scoreDOETool2 = ($this->score_model->get_score_by_tool($emt->id, '2') * $tool_weightage[1]->tool_full_score) / 100;
                $scoreDOETool3 = ($this->score_model->get_score_by_tool($emt->id, '3') * $tool_weightage[2]->tool_full_score) / 100;
                $scoreDOETool4 = ($this->score_model->get_score_by_tool($emt->id, '4') * $tool_weightage[3]->tool_full_score) / 100;
                $scoreDOETool5 = ($this->score_model->get_score_by_tool($emt->id, '5') * $tool_weightage[4]->tool_full_score) / 100;
                $scoreDOETool6 = ($this->score_model->get_score_by_tool($emt->id, '6') * $tool_weightage[5]->tool_full_score) / 100;
                $scoreDOETool7 = ($this->score_model->get_score_by_tool($emt->id, '7') * $tool_weightage[6]->tool_full_score) / 100;

                $doetotalscore = $scoreDOETool1 + $scoreDOETool2 + $scoreDOETool3 + $scoreDOETool4 + $scoreDOETool5 + $scoreDOETool6 + $scoreDOETool7;
                //$emt->scoreDOE = $this->mylib->get_assessment_level($doetotalscore);
                $emt->scoreDOE = $this->mylib->get_assessment_level(round($doetotalscore));

                //get remark from DOE officer, if any
                $emt->ulasan = $this->db->get_where('kpigsr_comment_premise', array('emt_id' => $emt->id))->result();

                //Total EMT by DOE
                $result = $this->db->get_where('emt_achievement', array('answer_id' => $emt->id));

                if ($result->num_rows() < 1) {
                    $emt->no_tool_completed_DOE = 0;
                } else {
                    $emt->no_tool_completed_DOE = $this->db->get_where('emt_achievement', array('answer_id' => $emt->id))->row()->total;
                }
            }
        }

        //get rules compliant
        $this->load->model('answers_model');
        $data['rules'] = $this->answers_model->get_compliance($this->idpremis);
//$this->output->enable_profiler(TRUE);
        $this->viewit('dashboard/dashboard_premise', $data);
    }

    public function data() {
        $this->load->model('Data_model', 'data');
        $data = $this->data->get_data();

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'PYDT';

        $series2 = array();
        $series2['name'] = 'PYBDT';

        $series3 = array();
        $series3['name'] = 'Loji';

        foreach ($data as $row) {
            $category['data'][] = $row->month;
            $series1['data'][] = $row->wordpress;
            $series2['data'][] = $row->codeigniter;
            $series3['data'][] = $row->highcharts;
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function get_premise_registered_chart() {
        $this->load->model('Data_model', 'data');

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'No of premises registered';
        $series2['name'] = 'No of premises submitted';

        for ($i = 1; $i < 17; $i++) {
            $category['data'][] = $this->data->get_premise_state($i);
            $series1['data'][] = $this->data->premise_registered($i);
            $series2['data'][] = $this->data->premise_submitted($i);
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function get_premise_submitted_chart() {
        $this->load->model('Data_model', 'data');

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'PYDT-KKS';

        $series2 = array();
        $series2['name'] = 'PYDT-KG';

        $series3 = array();
        $series3['name'] = 'PYDT-BT';

        $series4 = array();
        $series4['name'] = 'PYBDT-Industri';

        $series5 = array();
        $series5['name'] = 'PYBDT-Bukan Industri';

        $series6 = array();
        $series6['name'] = 'Loji';

        for ($i = 1; $i < 17; $i++) {
            $category['data'][] = $this->data->get_premise_state($i);
            $series1['data'][] = $this->data->premise_submitted_by_cat($i, 'pydtkks');
            $series2['data'][] = $this->data->premise_submitted_by_cat($i, 'pydtkg');
            $series3['data'][] = $this->data->premise_submitted_by_cat($i, 'pydtbt');
            $series4['data'][] = $this->data->premise_submitted_by_cat($i, 'pybdti');
            $series5['data'][] = $this->data->premise_submitted_by_cat($i, 'pybdtbi');
            $series6['data'][] = $this->data->premise_submitted_by_cat($i, 'loji');
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);
        array_push($result, $series4);
        array_push($result, $series5);
        array_push($result, $series6);



        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function get_compulsory_by_industry_chart() { // yang dah dapat surat arahan
        $this->load->model('Data_model', 'data');

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'PYDT-KKS';

        $series2 = array();
        $series2['name'] = 'PYDT-KG';

        $series3 = array();
        $series3['name'] = 'PYDT-BT';

        $series4 = array();
        $series4['name'] = 'PYBDT-Industri';

        $series5 = array();
        $series5['name'] = 'PYBDT-Bukan Industri';

        $series6 = array();
        $series6['name'] = 'Loji';

        for ($i = 1; $i < 17; $i++) {
            $category['data'][] = $this->data->get_premise_state($i);
            $series1['data'][] = $this->data->get_compulsory_by_cat($i, 'pydtkks');
            $series2['data'][] = $this->data->get_compulsory_by_cat($i, 'pydtkg');
            $series3['data'][] = $this->data->get_compulsory_by_cat($i, 'pydtbt');
            $series4['data'][] = $this->data->get_compulsory_by_cat($i, 'pybdti');
            $series5['data'][] = $this->data->get_compulsory_by_cat($i, 'pybdtbi');
            $series6['data'][] = $this->data->get_compulsory_by_cat($i, 'loji');
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);
        array_push($result, $series4);
        array_push($result, $series5);
        array_push($result, $series6);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function get_compulsory_vs_registered_chart() { // yang dah dapat surat arahan
        $this->load->model('Data_model', 'data');

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'Compulsory';

        $series2 = array();
        $series2['name'] = 'Voluntarily';

        $series3 = array();
        $series3['name'] = 'Total Registered';


        for ($i = 1; $i < 17; $i++) {
            $category['data'][] = $this->data->get_premise_state($i);
            $series1['data'][] = $this->data->get_compulsory($i);
            $series2['data'][] = $this->data->get_voluntarily($i);
            $series3['data'][] = $this->data->premise_registered($i);
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function get_Desktop_vs_Inventory_chart() {
        $this->load->model('Data_model', 'data');

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'PYDT-KKS';

        $series2 = array();
        $series2['name'] = 'PYDT-KG';

        $series3 = array();
        $series3['name'] = 'PYDT-BT';

        $series4 = array();
        $series4['name'] = 'PYBDT-Industri';

        $series5 = array();
        $series5['name'] = 'PYBDT-Bukan Industri';

        $series6 = array();
        $series6['name'] = 'Loji';

        $series7 = array();
        $series7['name'] = 'Inventory';

        for ($i = 1; $i < 17; $i++) {
            $category['data'][] = $this->data->get_premise_state($i);
            $series1['data'][] = $this->data->get_desktop_by_cat($i, 'pydtkks');
            $series2['data'][] = $this->data->get_desktop_by_cat($i, 'pydtkg');
            $series3['data'][] = $this->data->get_desktop_by_cat($i, 'pydtbt');
            $series4['data'][] = $this->data->get_desktop_by_cat($i, 'pybdti');
            $series5['data'][] = $this->data->get_desktop_by_cat($i, 'pybdtbi');
            $series6['data'][] = $this->data->get_desktop_by_cat($i, 'loji');
            $series7['data'][] = $this->data->get_inventory_by_state($i);
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);
        array_push($result, $series4);
        array_push($result, $series5);
        array_push($result, $series6);
        array_push($result, $series7);
        print json_encode($result, JSON_NUMERIC_CHECK);

        //$this->output->enable_profiler(TRUE);
    }

    public function get_FI_vs_Inventory_chart() {
        $this->load->model('Data_model', 'data');

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'PYDT-KKS';

        $series2 = array();
        $series2['name'] = 'PYDT-KG';

        $series3 = array();
        $series3['name'] = 'PYDT-BT';

        $series4 = array();
        $series4['name'] = 'PYBDT-Industri';

        $series5 = array();
        $series5['name'] = 'PYBDT-Bukan Industri';

        $series6 = array();
        $series6['name'] = 'Loji';

        $series7 = array();
        $series7['name'] = 'Inventory';

        for ($i = 1; $i < 17; $i++) {
            $category['data'][] = $this->data->get_premise_state($i);
            $series1['data'][] = $this->data->get_fi_by_cat($i, 'pydtkks');
            $series2['data'][] = $this->data->get_fi_by_cat($i, 'pydtkg');
            $series3['data'][] = $this->data->get_fi_by_cat($i, 'pydtbt');
            $series4['data'][] = $this->data->get_fi_by_cat($i, 'pybdti');
            $series5['data'][] = $this->data->get_fi_by_cat($i, 'pybdtbi');
            $series6['data'][] = $this->data->get_fi_by_cat($i, 'loji');
            $series7['data'][] = $this->data->get_inventory_by_state($i);
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);
        array_push($result, $series4);
        array_push($result, $series5);
        array_push($result, $series6);
        array_push($result, $series7);
        print json_encode($result, JSON_NUMERIC_CHECK);

        //$this->output->enable_profiler(TRUE);
    }

    public function get_7per7_vs_Inventory_chart() {
        $this->load->model('Data_model', 'data');

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'PYDT-KKS';

        $series2 = array();
        $series2['name'] = 'PYDT-KG';

        $series3 = array();
        $series3['name'] = 'PYDT-BT';

        $series4 = array();
        $series4['name'] = 'PYBDT-Industri';

        $series5 = array();
        $series5['name'] = 'PYBDT-Bukan Industri';

        $series6 = array();
        $series6['name'] = 'Loji';

        $series7 = array();
        $series7['name'] = 'Inventory';

        for ($i = 1; $i < 17; $i++) {
            $category['data'][] = $this->data->get_premise_state($i);
            $series1['data'][] = $this->data->get_7per7($i, 'pydtkks');
            $series2['data'][] = $this->data->get_7per7($i, 'pydtkg');
            $series3['data'][] = $this->data->get_7per7($i, 'pydtbt');
            $series4['data'][] = $this->data->get_7per7($i, 'pybdti');
            $series5['data'][] = $this->data->get_7per7($i, 'pybdtbi');
            $series6['data'][] = $this->data->get_7per7($i, 'loji');
            $series7['data'][] = $this->data->get_inventory_by_state($i);
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);
        array_push($result, $series4);
        array_push($result, $series5);
        array_push($result, $series6);
        array_push($result, $series7);
        print json_encode($result, JSON_NUMERIC_CHECK);

        //$this->output->enable_profiler(TRUE);
    }

    public function get_emt_by_Month_chart() {
        $this->load->model('Data_model', 'data');

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'Jan';

        $series2 = array();
        $series2['name'] = 'Feb';

        $series3 = array();
        $series3['name'] = 'Mar';

        $series4 = array();
        $series4['name'] = 'Apr';

        $series5 = array();
        $series5['name'] = 'May';

        $series6 = array();
        $series6['name'] = 'June';

        $series7 = array();
        $series7['name'] = 'July';

        $series8 = array();
        $series8['name'] = 'Aug';

        $series9 = array();
        $series9['name'] = 'Sept';

        $series10 = array();
        $series10['name'] = 'Oct';

        $series11 = array();
        $series11['name'] = 'Nov';

        $series12 = array();
        $series12['name'] = 'Dec';

        for ($i = 1; $i < 17; $i++) {
            $category['data'][] = $this->data->get_premise_state($i);
            $series1['data'][] = $this->data->get_emtFeedback($i, 1);
            $series2['data'][] = $this->data->get_emtFeedback($i, 2);
            $series3['data'][] = $this->data->get_emtFeedback($i, 3);
            $series4['data'][] = $this->data->get_emtFeedback($i, 4);
            $series5['data'][] = $this->data->get_emtFeedback($i, 5);
            $series6['data'][] = $this->data->get_emtFeedback($i, 6);
            $series7['data'][] = $this->data->get_emtFeedback($i, 7);
            $series8['data'][] = $this->data->get_emtFeedback($i, 8);
            $series9['data'][] = $this->data->get_emtFeedback($i, 9);
            $series10['data'][] = $this->data->get_emtFeedback($i, 10);
            $series11['data'][] = $this->data->get_emtFeedback($i, 11);
            $series12['data'][] = $this->data->get_emtFeedback($i, 12);
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);
        array_push($result, $series4);
        array_push($result, $series5);
        array_push($result, $series6);
        array_push($result, $series7);
        array_push($result, $series8);
        array_push($result, $series9);
        array_push($result, $series10);
        array_push($result, $series11);
        array_push($result, $series12);

        print json_encode($result, JSON_NUMERIC_CHECK);

        //$this->output->enable_profiler(TRUE);
    }

    public function get_premiseFromEKAS() {
        $idpremis = $_GET['q'];

        $this->db->where('IDPREMIS', $idpremis);

        $result = $this->db->get('premis');

        if ($result->num_rows() > 0) {
            echo json_encode(array($result->row()->NAMAPREMIS, $result->row()->IDPREMIS));

            // print json_encode();  
        } else {
            echo '';
        }
    }

    public function get_notification_type() {
        $idpremis = $_GET['q'];

        $this->db->where('idpremis', $idpremis);

        $result = $this->db->get('premis_login');

        if ($result->num_rows() > 0) {
            echo json_encode(array($result->row()->namapremis, $result->row()->idpremis, $result->row()->submission_type));

            // print json_encode();  
        } else {
            echo '';
        }
    }

    public function set_notifications() {

        //Including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //Validating Name Field
        $this->form_validation->set_rules('no_fail_jas', 'Username', 'required|min_length[5]|max_length[15]');

        //Validating Email Field
        //$this->form_validation->set_rules('demail', 'Email', 'required|valid_email');
        //Validating Mobile no. Field
        $this->form_validation->set_rules('ref_no', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');

        //Validating Address Field
        //$this->form_validation->set_rules('issued_date', 'Address', 'required|min_length[10]|max_length[50]');
        $idpremis = $this->input->post('idpremis');
        //$nofailjas = $this->input->post('no_fail_jas');
        $namapremis = $this->input->post('nama_premis');
        $ref_no = $this->input->post('ref_no');
        $issued_date = $this->input->post('issued_date');

        //$fromEKAS = $this->user_model->find_user($namapremis,$nofailjas);
//        
//        $data = array (
//            'idpremise' => $idpremis,
//            'ref_no' => $ref_no,
//            'issued_date' => $issued_date,
//        );
//        if($this->db->insert('kpigsr_notifications', $data)){

        $query = $this->db->get_where('premis_login', array('idpremis' => $idpremis));

        if ($query->num_rows() > 0) {

            $data = array(
                'submission_type' => 'Compulsory',
                'submission_due_date' => date("Y-m-d", strtotime("$issued_date +1 months")),
                'letter_ref_no' => $ref_no,
                'letter_date' => $issued_date
            );
            $this->db->update('premis_login', $data, array('idpremis' => $idpremis));
        }
//        } else {
//            
//            //throw error
//            echo 'error inserting to db';
//        }
    }

}
