<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kpi extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->theme = 'theme1'; // home_view
        $this->load->model('user_model');
        $this->load->model('Ref_model', 'ref');
        $this->load->model('Report_model', 'report');

        $this->load->model('state_model');
        $this->load->library('mylib');
        $this->load->model('kpi_model');
    }

    public function index() {
        $this->pencalonan();
    }

    public function monthly_kpi($year = null, $state = null) {

        $year = $this->input->post('year');
        $state = $this->input->post('state');
        if (!isset($year)) {
            $year = date('Y');
        }


        if (!isset($state)) {
            $state = $this->state;
            $showTable = FALSE;
        } else {
            $showTable = TRUE;
            $data['stateTitle'] = $this->state_model->get_state_by_code($state);
        }

        //Get KPI Status for all state
        $status = array();
        for ($i = 1; $i <= 16; $i++) {
            $status[$i]['status'] = $this->kpi_model->isKpiVerify($i);
            $status[$i]['negeri'] = $this->state_model->get_state_by_code($i);
            $status[$i]['kod_negeri'] = $this->state_model->get_state_code($i);
        }

        $data['state_kpi_status'] = $status;

        $data['state_code'] = $state;
        $data['negeri'] = $this->state_model->get_state_by_code($state);
        $data['list_of_sic'] = $this->report->get_sic();

        $month = 1;
        for ($i = 0; $i < 12; $i++) {

            $data['monthly_kpi_kks'][$i] = $this->report->get_kpi_monthly_for_total($month, '41', $state, $year);
            $data['monthly_kpi_kg'][$i] = $this->report->get_kpi_monthly_for_total($month, '40', $state, $year);
            $data['monthly_kpi_bt'][$i] = $this->report->get_kpi_monthly_for_total($month, '42', $state, $year);
            $month++;
        }
        //$data['monthly_kpi_kks'] = $this->report->get_kpi_monthly('41', $this->state);
        //$data['monthly_kpi_kg'] = $this->report->get_kpi_monthly('40', $this->state);
        //$data['monthly_kpi_bt'] = $this->report->get_kpi_monthly('42', $this->state);

        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('41', $state);
        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('40', $state);
        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('42', $state);


        //GET ALL OFFICER BY STATE
        $officers = $this->user_model->get_all_officer_by_state($state);
        //$data['kpi_bt'] = $kpi = $this->report->get_kpi_monthly('42', $this->state);
        unset($data['list_of_sic'][39], $data['list_of_sic'][40], $data['list_of_sic'][41]); //remove SIC 40, 41, 42 key

        foreach ($officers as $off => $value) {
            $value->kks = $this->report->get_kpi_monthly_by_officer($value->id, '41', $state, $year);
            $value->total_kks = $this->report->get_totalkpi_monthly_by_officer($value->id, '41', $state, $year);
            $value->kks_submitted = $this->report->get_kpi_date('submitted', $value->id, '41', $state, $year);
            $value->kks_updated = $this->report->get_kpi_date('updated', $value->id, '41', $state, $year);

            $value->kg = $this->report->get_kpi_monthly_by_officer($value->id, '40', $state, $year);
            $value->total_kg = $this->report->get_totalkpi_monthly_by_officer($value->id, '40', $state, $year);
            $value->kg_submitted = $this->report->get_kpi_date('submitted', $value->id, '40', $state, $year);
            $value->kg_updated = $this->report->get_kpi_date('updated', $value->id, '40', $state, $year);

            $value->bt = $this->report->get_kpi_monthly_by_officer($value->id, '42', $state, $year);
            $value->total_bt = $this->report->get_totalkpi_monthly_by_officer($value->id, '42', $state, $year);
            $value->bt_submitted = $this->report->get_kpi_date('submitted', $value->id, '42', $state, $year);
            $value->bt_updated = $this->report->get_kpi_date('updated', $value->id, '42', $state, $year);

            foreach ($data['list_of_sic'] as $sic) {
                $code = $sic->SIC;
                $value->$code = $this->report->get_kpi_monthly_by_officer($value->id, $sic->SIC, $state, $year);
                $value->{'total_' . $code} = $this->report->get_totalkpi_monthly_by_officer($value->id, $sic->SIC, $state, $year);
                $value->{$code . '_submitted'} = $this->report->get_kpi_date('submitted', $value->id, $sic->SIC, $state, $year);
                $value->{$code . '_updated'} = $this->report->get_kpi_date('updated', $value->id, $sic->SIC, $state, $year);
            }
        }



        foreach ($data['list_of_sic'] as $sic) {

            if ($sic->SIC == 40 || $sic->SIC == 41 || $sic->SIC == 42) {
                // Do nothing
            } else {

                $month = 1;
                for ($i = 0; $i < 12; $i++) {

                    $data['monthly_kpi_' . $sic->SIC][$i] = $this->report->get_kpi_monthly_for_total($month, $sic->SIC, $state, $year);
                    $month++;
                }
                $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $state);
            }
        }

//        $this->load->model('Sasaran_model');
//        $year = date('Y');
//        $month = date('n');
//        $data['set_sasaran'] = $this->Sasaran_model->db
//                        ->where('id_negeri', $this->state)
//                        ->where('year', $year)
//                        ->get('sasaran')->result(); //papar
        $data['year'] = $year;
        $data['month'] = $month;
        $data['officers'] = $officers;
        $data['kpi_status'] = $this->kpi_model->isKpiVerify($state);
        $data['showTable'] = $showTable;
        //$this->output->enable_profiler(true);

        if ($this->role != 'ADM') {
            $this->viewit('kpi/monthly_kpi', $data);
        } else {
            $this->viewit('kpi/monthly_kpi_hq', $data);
        }
    }

    public function edit_monthly($off_id, $sic) {

        $current_year = date('Y');
        $data['off_name'] = $this->db->get_where('admin', array('id' => $off_id))->row()->name;
        $data['kpi'] = $this->db->get_where('kpigsr_monthly_rpt', array('kat_premise' => $sic, 'user_id' => $off_id, 'tahun' => $current_year))->result();
        $data['sic_name'] = $this->db->get_where('sic', array('sic' => $sic))->row()->KETERANGAN_SIC;
        $data['sic'] = $sic;
        $data['off_id'] = $off_id;
        //$this->output->enable_profiler(true);
        $this->viewit('kpi/edit_monthly', $data);
    }

    public function save_monthly() {

        $post_data = $this->input->post();
        $sic = $post_data['sic'];
        $off_id = $post_data['off_id'];

        unset($post_data['sic']);
        unset($post_data['off_id']);

        foreach ($post_data as $post) {
            $data = [
                'kat_premise' => $sic,
                'user_id' => $off_id,
                'tahun' => date('Y'),
                'sasaran_bulan' => $post['value'],
                'bulan' => $post['bulan'],
                'negeri' => $this->state
            ];

            if (isset($post['upd_id'])) {

                $this->db->where('id', $post['upd_id']);
                $this->db->update('kpigsr_monthly_rpt', $data);
            } else {
                $this->db->insert('kpigsr_monthly_rpt', $data);
            }
            //$this->output->enable_profiler(true);
        }

        redirect('kpi/monthly_kpi');
    }

    public function monthly_kpi_edit() {
        $year = date('Y');
        $data['negeri'] = $this->state_model->get_state_by_code($this->state);
        $data['list_of_sic'] = $this->report->get_sic();

        $user = $this->user_model->get_officer_id($this->user_id);
        $data['monthly_kpi_kks'] = $this->report->get_kpi_monthly_by_officer($user, '41', $this->state, $year);
        $data['monthly_kpi_kg'] = $this->report->get_kpi_monthly_by_officer($user, '40', $this->state, $year);
        $data['monthly_kpi_bt'] = $this->report->get_kpi_monthly_by_officer($user, '42', $this->state, $year);

        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('41', $this->state);
        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('40', $this->state);
        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('42', $this->state);

        unset($data['list_of_sic'][39], $data['list_of_sic'][40], $data['list_of_sic'][41]); //remove SIC 40, 41, 42 key

        foreach ($data['list_of_sic'] as $sic) {

            if ($sic->SIC == 40 || $sic->SIC == 41 || $sic->SIC == 42) {
                // Do nothing
            } else {
                $data['monthly_kpi_' . $sic->SIC] = $this->report->get_kpi_monthly_by_officer($user, $sic->SIC, $this->state, $year);
                $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $this->state);
            }
        }

        $this->load->model('Sasaran_model');

        $month = date('n');
        $data['set_sasaran'] = $this->Sasaran_model->db
                        ->where('id_negeri', $this->state)
                        ->where('year', $year)
                        ->get('sasaran')->result(); //papar
        $data['year'] = $year;
        $data['month'] = $month;

        if ($this->kpi_model->isKpiVerify($this->state)) {
            $this->viewit('kpi/monthly_kpi_view', $data);
        } else {
            $this->viewit('kpi/monthly_kpi_edit', $data);
        }
        //$this->output->enable_profiler(true);
    }

    public function quarterly_kpi($year = '2018') {
        $data['negeri'] = $this->state_model->get_state_by_code($this->state);
        $data['list_of_sic'] = $this->report->get_sic();

        for ($i = 1; $i < 5; $i++) {
            $data['q' . $i . '_kpi_kks'] = $this->report->get_kpi_quarterly_by_quarter($i, 'kks', $this->state, $year);
            $data['q' . $i . '_kpi_kg'] = $this->report->get_kpi_quarterly_by_quarter($i, 'kg', $this->state, $year);
            $data['q' . $i . '_kpi_bt'] = $this->report->get_kpi_quarterly_by_quarter($i, 'bt', $this->state, $year);

            //PYBDT
            foreach ($data['list_of_sic'] as $sic) {
                $data['q' . $i . '_kpi_' . $sic->SIC] = $this->report->get_kpi_quarterly_by_quarter($i, $sic->SIC, $this->state);
                //$data['inventory_'.$sic->SIC] = $this->report->get_kpi_quarterly_by_quarter($i, $sic->SIC, $this->state);
                // get_sasaran_by_quarter(quarter, state, kat, year)
                $data['sasaran_q1_' . $sic->SIC] = $this->report->get_sasaran_by_quarter(1, $this->state, $sic->SIC, $year); //QUARTER 1, QUARTER 2, Q3, Q4
                $data['sasaran_q2_' . $sic->SIC] = $this->report->get_sasaran_by_quarter(2, $this->state, $sic->SIC, $year);
                $data['sasaran_q3_' . $sic->SIC] = $this->report->get_sasaran_by_quarter(3, $this->state, $sic->SIC, $year);
                $data['sasaran_q4_' . $sic->SIC] = $this->report->get_sasaran_by_quarter(4, $this->state, $sic->SIC, $year);
            }
        }

        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('kks', $this->state);
        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('kg', $this->state);
        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('bt', $this->state);

        foreach ($data['list_of_sic'] as $sic) {
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $this->state);
        }

        // get_sasaran_by_quarter(quarter, state, kat, year)
        $data['sasaran_q1_kks'] = $this->report->get_sasaran_by_quarter(1, $this->state, 'kks', $year); //QUARTER 1, QUARTER 2, Q3, Q4
        $data['sasaran_q2_kks'] = $this->report->get_sasaran_by_quarter(2, $this->state, 'kks', $year);
        $data['sasaran_q3_kks'] = $this->report->get_sasaran_by_quarter(3, $this->state, 'kks', $year);
        $data['sasaran_q4_kks'] = $this->report->get_sasaran_by_quarter(4, $this->state, 'kks', $year);

        $data['sasaran_q1_kg'] = $this->report->get_sasaran_by_quarter(1, $this->state, 'kg', $year); //QUARTER 1, QUARTER 2, Q3, Q4
        $data['sasaran_q2_kg'] = $this->report->get_sasaran_by_quarter(2, $this->state, 'kg', $year);
        $data['sasaran_q3_kg'] = $this->report->get_sasaran_by_quarter(3, $this->state, 'kg', $year);
        $data['sasaran_q4_kg'] = $this->report->get_sasaran_by_quarter(4, $this->state, 'kg', $year);

        $data['sasaran_q1_bt'] = $this->report->get_sasaran_by_quarter(1, $this->state, 'bt', $year); //QUARTER 1, QUARTER 2, Q3, Q4
        $data['sasaran_q2_bt'] = $this->report->get_sasaran_by_quarter(2, $this->state, 'bt', $year);
        $data['sasaran_q3_bt'] = $this->report->get_sasaran_by_quarter(3, $this->state, 'bt', $year);
        $data['sasaran_q4_bt'] = $this->report->get_sasaran_by_quarter(4, $this->state, 'bt', $year);


        //$this->output->enable_profiler(true);


        $this->load->model('Sasaran_model');
        $year = date('Y');
        $month = date('n');
        $data['set_sasaran'] = $this->Sasaran_model->db
                        ->where('id_negeri', $this->state)
                        ->where('year', $year)
                        ->get('sasaran')->result(); //papar
        $data['year'] = $year;
        $data['month'] = $month;

        $this->viewit('kpi/quarterly_kpi', $data);
    }

    public function set_monthly() {
        $post_data = $this->input->post();
        $year = date('Y');

        //print_r($post_data);
        $kat = $post_data['kat'];
        $user = $this->user_model->get_officer_id($post_data['email']);

        for ($i = 1; $i < 13; $i++) {
            $data = [
                'kat_premise' => $kat,
                'user_id' => $user,
                'tahun' => $year,
                'sasaran_bulan' => $post_data[$kat . '_' . $i],
                'bulan' => $i,
                'negeri' => $this->state
            ];

            $update_id = $this->input->post('update_id_' . $i);

            if ($update_id) {
                $this->db->where('id', $update_id);
                $this->db->update('kpigsr_monthly_rpt', $data);
            } else {
                $this->db->insert('kpigsr_monthly_rpt', $data);
            }
        }


        //if(!$this->report->check_inventory_exists($kat, $this->state)){
        // $this->db->insert('kpigsr_inventory', array('inventory' => $post_data['inventory_'.$kat], 'state' => $this->state , 'year' => 2018, 'kat' => $kat));
        //}
        //$this->output->enable_profiler(true);
        //print_r($post_data);

        redirect('kpi/monthly_kpi_edit');
        //$this->monthly_kpi();
    }

    public function set_quarterly() {
        $post_data = $this->input->post();

        $kat = $post_data['kat'];


        $data = [
            'kat_premise' => $kat,
            'quarter' => $post_data['quarter'],
            'spd' => $post_data['spd_' . $kat],
            'sp' => $post_data['sp_' . $kat],
            'sd' => $post_data['sd_' . $kat],
            'sl' => $post_data['sl_' . $kat],
            'tahun' => 2018,
            'negeri' => $this->state
        ];

        $this->db->insert('kpigsr_quarterly_rpt', $data);


        //checking kalau inventori masih kosong...comment sebab tak require...
//        if(!$this->report->check_inventory_exists($kat, $this->state)){
//            $this->db->insert('kpigsr_inventory', array('inventory' => $post_data['inventory_'.$kat], 'state' => $this->state , 'year' => 2018, 'kat' => $kat));
//        }
//        
//        
        //print_r($post_data);

        redirect('kpi/quarterly_kpi');
    }

    public function set_fi($target_quarter) {
        $post_data = $this->input->post();

        $kat = $this->input->post('kat');
        $id = $this->input->post('tbl_id');
        $fi = $this->input->post('fi');

        $this->db->where('id', $id);
        $this->db->update('kpigsr_quarterly_rpt', array('fi' => $fi));

        redirect('kpi/view_quarterly_achievement/' . $target_quarter . '#fi');
    }

    public function set_bpdsp($target_quarter) {
        $post_data = $this->input->post();

        $kat = $this->input->post('kat');
        $id = $this->input->post('tbl_id');
        $bpdsp = $this->input->post('bpdsp');

        $this->db->where('id', $id);
        $this->db->update('kpigsr_quarterly_rpt', array('bpdsp' => $bpdsp));

        redirect('kpi/view_quarterly_achievement/' . $target_quarter . '#desktop');
    }

    public function delete_monthly($kat, $year) { //dynamic kan year
        $this->db->delete('kpigsr_monthly_rpt', array('kat_premise' => $kat, 'negeri' => $this->state, 'tahun' => '2018'));
        //$this->db->delete('kpigsr_inventory', array('kat' => $kat, 'state'=> $this->state, 'year' => '2018' ));
        $verify = $this->db->affected_rows();
        //$this->output->enable_profiler(true);
        //echo $verify;
        //$this->pencalonan();
        redirect('kpi/monthly_kpi');
    }

    public function monthly_list() {

        $data['year_available'] = $this->report->get_rpt_year();
        $data['month_available'] = $this->report->get_rpt_month();
        $this->viewit('kpi/monthly_rpt_list', $data);
    }

//    public function quarterly_list() {
//
//        $data['year_available'] = $this->report->get_rpt_year();
//        $data['month_available'] = $this->report->get_rpt_month();
//        $this->viewit('kpi/quarterly_rpt_list', $data);
//    }

    public function view_monthly($month, $year, $state, $rpt) {

        $this->load->library('mylib');

        $data['target_month'] = $this->mylib->return_month($month);
        $data['target_year'] = $year;
        $data['target_monthcode'] = $month;
        $data['target_state'] = $state;
        $data['list_of_sic'] = $this->report->get_sic();

        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('41', $state);
        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('40', $state);
        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('42', $state);

        $data['sasaran_bulan_kks'] = $this->report->get_sasaran_bulan($state, '41', $month, $year);
        $data['sasaran_bulan_kg'] = $this->report->get_sasaran_bulan($state, '40', $month, $year);
        $data['sasaran_bulan_bt'] = $this->report->get_sasaran_bulan($state, '42', $month, $year);

        $data['total_bm_kks'] = $this->report->get_bm_byMonth($state, '41', $month, $year);
        $data['total_bm_kg'] = $this->report->get_bm_byMonth($state, '40', $month, $year);
        $data['total_bm_bt'] = $this->report->get_bm_byMonth($state, '42', $month, $year);

        $data['total_bm_7per7_kks'] = $this->report->get_bm_7per7($state, '41', $month, $year);
        $data['total_bm_7per7_kg'] = $this->report->get_bm_7per7($state, '40', $month, $year);
        $data['total_bm_7per7_bt'] = $this->report->get_bm_7per7($state, '42', $month, $year);

        $data['total_bd_kks'] = $this->report->get_type_of_verification('Desktop', $state, 41, $month, $year);
        $data['total_fi_kks'] = $this->report->get_type_of_verification('FI', $state, 41, $month, $year);

        $data['total_bd_kg'] = $this->report->get_type_of_verification('Desktop', $state, 40, $month, $year);
        $data['total_fi_kg'] = $this->report->get_type_of_verification('FI', $state, 40, $month, $year);

        $data['total_bd_bt'] = $this->report->get_type_of_verification('Desktop', $state, 42, $month, $year);
        $data['total_fi_bt'] = $this->report->get_type_of_verification('FI', $state, 42, $month, $year);

        //unset($data['list_of_sic'][39], $data['list_of_sic'][40], $data['list_of_sic'][41]); //remove SIC 40, 41, 42 key

        foreach ($data['list_of_sic'] as $sic) {
            //$data['quarterly_kpi_'.$sic->SIC] = $this->report->get_kpi_quarterly($sic->SIC, $this->state); 
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $state);
            $data['sasaran_bulan_' . $sic->SIC] = $this->report->get_sasaran_bulan($state, $sic->SIC, $month, $year);
            $data['total_bm_' . $sic->SIC] = $this->report->get_bm_byMonth($state, $sic->SIC, $month, $year);
            $data['total_bm_7per7_' . $sic->SIC] = $this->report->get_bm_7per7($state, $sic->SIC, $month, $year);

            $data['total_bd_' . $sic->SIC] = $this->report->get_type_of_verification('Desktop', $state, $sic->SIC, $month, $year);
            $data['total_fi_' . $sic->SIC] = $this->report->get_type_of_verification('FI', $state, $sic->SIC, $month, $year);

            if (isset($data['sasaran_bulan_' . $sic->SIC])) {
                $sasaranNotSet[] = 'true';
            } else {
                $sasaranNotSet[] = 'false';
            }
        }

        //Data reporting tools
        foreach ($data['list_of_sic'] as $sic) {
            $data['total_tool1_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('1', $month, 'true', $state, $sic->SIC);
            $data['total_tool2_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('2', $month, 'true', $state, $sic->SIC);
            $data['total_tool3_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('3', $month, 'true', $state, $sic->SIC);
            $data['total_tool4_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('4', $month, 'true', $state, $sic->SIC);
            $data['total_tool5_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('5', $month, 'true', $state, $sic->SIC);
            $data['total_tool6_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('6', $month, 'true', $state, $sic->SIC);
            $data['total_tool7_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('7', $month, 'true', $state, $sic->SIC);

            $data['total_tool1_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('1', $month, 'false', $state, $sic->SIC);
            $data['total_tool2_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('2', $month, 'false', $state, $sic->SIC);
            $data['total_tool3_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('3', $month, 'false', $state, $sic->SIC);
            $data['total_tool4_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('4', $month, 'false', $state, $sic->SIC);
            $data['total_tool5_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('5', $month, 'false', $state, $sic->SIC);
            $data['total_tool6_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('6', $month, 'false', $state, $sic->SIC);
            $data['total_tool7_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('7', $month, 'false', $state, $sic->SIC);

            if ($sic->SIC == 41) {
                //KKS
                $data['total_tool1_implementation_true_kks'] = $this->report->count_premise_tool('1', $month, 'true', $state, $sic->SIC);
                $data['total_tool2_implementation_true_kks'] = $this->report->count_premise_tool('2', $month, 'true', $state, $sic->SIC);
                $data['total_tool3_implementation_true_kks'] = $this->report->count_premise_tool('3', $month, 'true', $state, $sic->SIC);
                $data['total_tool4_implementation_true_kks'] = $this->report->count_premise_tool('4', $month, 'true', $state, $sic->SIC);
                $data['total_tool5_implementation_true_kks'] = $this->report->count_premise_tool('5', $month, 'true', $state, $sic->SIC);
                $data['total_tool6_implementation_true_kks'] = $this->report->count_premise_tool('6', $month, 'true', $state, $sic->SIC);
                $data['total_tool7_implementation_true_kks'] = $this->report->count_premise_tool('7', $month, 'true', $state, $sic->SIC);

                $data['total_tool1_implementation_false_kks'] = $this->report->count_premise_tool('1', $month, 'false', $state, $sic->SIC);
                $data['total_tool2_implementation_false_kks'] = $this->report->count_premise_tool('2', $month, 'false', $state, $sic->SIC);
                $data['total_tool3_implementation_false_kks'] = $this->report->count_premise_tool('3', $month, 'false', $state, $sic->SIC);
                $data['total_tool4_implementation_false_kks'] = $this->report->count_premise_tool('4', $month, 'false', $state, $sic->SIC);
                $data['total_tool5_implementation_false_kks'] = $this->report->count_premise_tool('5', $month, 'false', $state, $sic->SIC);
                $data['total_tool6_implementation_false_kks'] = $this->report->count_premise_tool('6', $month, 'false', $state, $sic->SIC);
                $data['total_tool7_implementation_false_kks'] = $this->report->count_premise_tool('7', $month, 'false', $state, $sic->SIC);
            } elseif ($sic->SIC == 40) {
                //KG
                $data['total_tool1_implementation_true_kg'] = $this->report->count_premise_tool('1', $month, 'true', $state, $sic->SIC);
                $data['total_tool2_implementation_true_kg'] = $this->report->count_premise_tool('2', $month, 'true', $state, $sic->SIC);
                $data['total_tool3_implementation_true_kg'] = $this->report->count_premise_tool('3', $month, 'true', $state, $sic->SIC);
                $data['total_tool4_implementation_true_kg'] = $this->report->count_premise_tool('4', $month, 'true', $state, $sic->SIC);
                $data['total_tool5_implementation_true_kg'] = $this->report->count_premise_tool('5', $month, 'true', $state, $sic->SIC);
                $data['total_tool6_implementation_true_kg'] = $this->report->count_premise_tool('6', $month, 'true', $state, $sic->SIC);
                $data['total_tool7_implementation_true_kg'] = $this->report->count_premise_tool('7', $month, 'true', $state, $sic->SIC);

                $data['total_tool1_implementation_false_kg'] = $this->report->count_premise_tool('1', $month, 'false', $state, $sic->SIC);
                $data['total_tool2_implementation_false_kg'] = $this->report->count_premise_tool('2', $month, 'false', $state, $sic->SIC);
                $data['total_tool3_implementation_false_kg'] = $this->report->count_premise_tool('3', $month, 'false', $state, $sic->SIC);
                $data['total_tool4_implementation_false_kg'] = $this->report->count_premise_tool('4', $month, 'false', $state, $sic->SIC);
                $data['total_tool5_implementation_false_kg'] = $this->report->count_premise_tool('5', $month, 'false', $state, $sic->SIC);
                $data['total_tool6_implementation_false_kg'] = $this->report->count_premise_tool('6', $month, 'false', $state, $sic->SIC);
                $data['total_tool7_implementation_false_kg'] = $this->report->count_premise_tool('7', $month, 'false', $state, $sic->SIC);
            } elseif ($sic->SIC == 42) {
                //BT
                $data['total_tool1_implementation_true_bt'] = $this->report->count_premise_tool('1', $month, 'true', $state, $sic->SIC);
                $data['total_tool2_implementation_true_bt'] = $this->report->count_premise_tool('2', $month, 'true', $state, $sic->SIC);
                $data['total_tool3_implementation_true_bt'] = $this->report->count_premise_tool('3', $month, 'true', $state, $sic->SIC);
                $data['total_tool4_implementation_true_bt'] = $this->report->count_premise_tool('4', $month, 'true', $state, $sic->SIC);
                $data['total_tool5_implementation_true_bt'] = $this->report->count_premise_tool('5', $month, 'true', $state, $sic->SIC);
                $data['total_tool6_implementation_true_bt'] = $this->report->count_premise_tool('6', $month, 'true', $state, $sic->SIC);
                $data['total_tool7_implementation_true_bt'] = $this->report->count_premise_tool('7', $month, 'true', $state, $sic->SIC);

                $data['total_tool1_implementation_false_bt'] = $this->report->count_premise_tool('1', $month, 'false', $state, $sic->SIC);
                $data['total_tool2_implementation_false_bt'] = $this->report->count_premise_tool('2', $month, 'false', $state, $sic->SIC);
                $data['total_tool3_implementation_false_bt'] = $this->report->count_premise_tool('3', $month, 'false', $state, $sic->SIC);
                $data['total_tool4_implementation_false_bt'] = $this->report->count_premise_tool('4', $month, 'false', $state, $sic->SIC);
                $data['total_tool5_implementation_false_bt'] = $this->report->count_premise_tool('5', $month, 'false', $state, $sic->SIC);
                $data['total_tool6_implementation_false_bt'] = $this->report->count_premise_tool('6', $month, 'false', $state, $sic->SIC);
                $data['total_tool7_implementation_false_bt'] = $this->report->count_premise_tool('7', $month, 'false', $state, $sic->SIC);
            }
        }
        //$this->output->enable_profiler(true);
        if ($rpt == 'tools') {
            $this->viewit('kpi/monthly_report_tools', $data);
        } elseif ($rpt == 'bm') {
            $this->viewit('kpi/monthly_report_bm', $data);
        }
    }

    public function monthly_view_range() {

        $data['from'] = $from = $this->input->post('from'); //to pass date from & to to view
        $data['to'] = $to = $this->input->post('to');
        $rpt = $this->input->post('rpt');
        
        $this->load->model('state_model');
        if(!$this->input->post('state')){
            $state = $this->state;
        } else {
            $state = $this->input->post('state');
        }

        //FROM DATE EXTRACTION
        $from = explode('-', $from);
        $f_month = $from[1];
//        $f_day = $from[2];
        $f_year = $from[0];
//
        $from_date = $f_month . '-' . $f_year;
        $r_fdate = $f_year . '-' . $f_month . '-01'; 
//
        //TO DATE EXTRACTION
        $to = explode('-', $to);
        $t_month = $to[1];
//        $t_day = $to[2];
        $t_year = $to[0];

        $to_date = $t_month . '-' . $t_year;
        $r_tdate = $t_year . '-' . $t_month . '-01'; 
        
        $data['list_of_sic'] = $this->report->get_sic();

        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('41', $state); //OK
        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('40', $state); //OK
        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('42', $state); //OK
        //Kena Loop untuk SUM Bulan
        $data['sasaran_bulan_kks'] = $this->report->get_sasaran_bulan_byRange($state, '41', $from_date, $to_date);
        $data['sasaran_bulan_kg'] = $this->report->get_sasaran_bulan_byRange($state, '40', $from_date, $to_date);
        $data['sasaran_bulan_bt'] = $this->report->get_sasaran_bulan_byRange($state, '42', $from_date, $to_date);

        $data['total_bm_kks'] = $this->report->get_bm_byRange($state, '41', $r_fdate, $r_tdate);
        $data['total_bm_kg'] = $this->report->get_bm_byRange($state, '40', $r_fdate, $r_tdate);
        $data['total_bm_bt'] = $this->report->get_bm_byRange($state, '42', $r_fdate, $r_tdate);

        $data['total_bm_7per7_kks'] = $this->report->get_bm_7per7_byRange($state, '41', $r_fdate, $r_tdate);
        $data['total_bm_7per7_kg'] = $this->report->get_bm_7per7_byRange($state, '40', $r_fdate, $r_tdate);
        $data['total_bm_7per7_bt'] = $this->report->get_bm_7per7_byRange($state, '42', $r_fdate, $r_tdate);

        $data['total_bd_kks'] = $this->report->get_type_of_verification_byRange('Desktop', $state, 41, $r_fdate, $r_tdate);
        $data['total_fi_kks'] = $this->report->get_type_of_verification_byRange('FI', $state, 41, $r_fdate, $r_tdate);

        foreach ($data['list_of_sic'] as $sic) {
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $state);
            $data['sasaran_bulan_' . $sic->SIC] = $this->report->get_sasaran_bulan_byRange($state, $sic->SIC, $from_date, $to_date);
            $data['total_bm_' . $sic->SIC] = $this->report->get_bm_byRange($state, $sic->SIC, $r_fdate, $r_tdate);
            $data['total_bm_7per7_' . $sic->SIC] = $this->report->get_bm_7per7_byRange($state, $sic->SIC, $r_fdate, $r_tdate);

            $data['total_bd_' . $sic->SIC] = $this->report->get_type_of_verification_byRange('Desktop', $state, $sic->SIC, $r_fdate, $r_tdate);
            $data['total_fi_' . $sic->SIC] = $this->report->get_type_of_verification_byRange('FI', $state, $sic->SIC, $r_fdate, $r_tdate);

            if (isset($data['sasaran_bulan_' . $sic->SIC])) {
                $sasaranNotSet[] = 'true';
            } else {
                $sasaranNotSet[] = 'false';
            }
        }

        //Data reporting tools
        foreach ($data['list_of_sic'] as $sic) {
            $data['total_tool1_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool_byRange('1', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
            $data['total_tool2_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool_byRange('2', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
            $data['total_tool3_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool_byRange('3', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
            $data['total_tool4_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool_byRange('4', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
            $data['total_tool5_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool_byRange('5', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
            $data['total_tool6_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool_byRange('6', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
            $data['total_tool7_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool_byRange('7', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);

            $data['total_tool1_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool_byRange('1', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
            $data['total_tool2_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool_byRange('2', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
            $data['total_tool3_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool_byRange('3', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
            $data['total_tool4_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool_byRange('4', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
            $data['total_tool5_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool_byRange('5', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
            $data['total_tool6_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool_byRange('6', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
            $data['total_tool7_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool_byRange('7', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);

            if ($sic->SIC == 41) {
                //KKS
                $data['total_tool1_implementation_true_kks'] = $this->report->count_premise_tool_byRange('1', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool2_implementation_true_kks'] = $this->report->count_premise_tool_byRange('2', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool3_implementation_true_kks'] = $this->report->count_premise_tool_byRange('3', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool4_implementation_true_kks'] = $this->report->count_premise_tool_byRange('4', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool5_implementation_true_kks'] = $this->report->count_premise_tool_byRange('5', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool6_implementation_true_kks'] = $this->report->count_premise_tool_byRange('6', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool7_implementation_true_kks'] = $this->report->count_premise_tool_byRange('7', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);

                $data['total_tool1_implementation_false_kks'] = $this->report->count_premise_tool_byRange('1', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool2_implementation_false_kks'] = $this->report->count_premise_tool_byRange('2', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool3_implementation_false_kks'] = $this->report->count_premise_tool_byRange('3', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool4_implementation_false_kks'] = $this->report->count_premise_tool_byRange('4', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool5_implementation_false_kks'] = $this->report->count_premise_tool_byRange('5', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool6_implementation_false_kks'] = $this->report->count_premise_tool_byRange('6', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool7_implementation_false_kks'] = $this->report->count_premise_tool_byRange('7', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
            } elseif ($sic->SIC == 40) {
                //KG
                $data['total_tool1_implementation_true_kg'] = $this->report->count_premise_tool_byRange('1', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool2_implementation_true_kg'] = $this->report->count_premise_tool_byRange('2', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool3_implementation_true_kg'] = $this->report->count_premise_tool_byRange('3', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool4_implementation_true_kg'] = $this->report->count_premise_tool_byRange('4', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool5_implementation_true_kg'] = $this->report->count_premise_tool_byRange('5', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool6_implementation_true_kg'] = $this->report->count_premise_tool_byRange('6', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool7_implementation_true_kg'] = $this->report->count_premise_tool_byRange('7', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);

                $data['total_tool1_implementation_false_kg'] = $this->report->count_premise_tool_byRange('1', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool2_implementation_false_kg'] = $this->report->count_premise_tool_byRange('2', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool3_implementation_false_kg'] = $this->report->count_premise_tool_byRange('3', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool4_implementation_false_kg'] = $this->report->count_premise_tool_byRange('4', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool5_implementation_false_kg'] = $this->report->count_premise_tool_byRange('5', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool6_implementation_false_kg'] = $this->report->count_premise_tool_byRange('6', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool7_implementation_false_kg'] = $this->report->count_premise_tool_byRange('7', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
            } elseif ($sic->SIC == 42) {
                //BT
                $data['total_tool1_implementation_true_bt'] = $this->report->count_premise_tool_byRange('1', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool2_implementation_true_bt'] = $this->report->count_premise_tool_byRange('2', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool3_implementation_true_bt'] = $this->report->count_premise_tool_byRange('3', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool4_implementation_true_bt'] = $this->report->count_premise_tool_byRange('4', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool5_implementation_true_bt'] = $this->report->count_premise_tool_byRange('5', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool6_implementation_true_bt'] = $this->report->count_premise_tool_byRange('6', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);
                $data['total_tool7_implementation_true_bt'] = $this->report->count_premise_tool_byRange('7', $r_fdate, $r_tdate, 'true', $state, $sic->SIC);

                $data['total_tool1_implementation_false_bt'] = $this->report->count_premise_tool_byRange('1', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool2_implementation_false_bt'] = $this->report->count_premise_tool_byRange('2', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool3_implementation_false_bt'] = $this->report->count_premise_tool_byRange('3', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool4_implementation_false_bt'] = $this->report->count_premise_tool_byRange('4', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool5_implementation_false_bt'] = $this->report->count_premise_tool_byRange('5', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool6_implementation_false_bt'] = $this->report->count_premise_tool_byRange('6', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
                $data['total_tool7_implementation_false_bt'] = $this->report->count_premise_tool_byRange('7', $r_fdate, $r_tdate, 'false', $state, $sic->SIC);
            }
        }
        
        $data['from_month'] = $this->ref->return_month($f_month);
        $data['from_year'] = $f_year;
        $data['to_month'] = $this->ref->return_month($t_month);
        $data['to_year'] = $t_year;
        $data['state_code'] = $state;
        
        //$this->output->enable_profiler(true);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        if ($rpt == 'tools') { //REPORT : PENCAPAIAN EMT BULANAN MENGIKUT TOOLS
            $this->viewit('kpi/monthly_report_tools_byRange', $data);
        } elseif ($rpt == 'bm') { // REPORT : LAPORAN PENCAPAIAN 7/7
            $this->viewit('kpi/monthly_report_bm_byRange', $data);
        } elseif ($rpt == 'rating'){ // REPORT : RATING
            $this->view_rating_byRange($state, $this->input->post('from'), $this->input->post('to'));
        }
    }

     public function view_rating_byRange($state, $from, $to) {

        $this->load->library('mylib');
                
        //FROM DATE EXTRACTION
        $from = explode('-', $from);
        $f_month = $from[1];
//        $f_day = $from[2];
        $f_year = $from[0];
//
        $from_date = $f_year . '-' . $f_month;
//
        //TO DATE EXTRACTION
        $to = explode('-', $to);
        $t_month = $to[1];
//        $t_day = $to[2];
        $t_year = $to[0];

        $to_date = $t_year . '-' . $t_month;

        $data['list_of_sic'] = $this->report->get_sic();

        //$data['target_month'] = $this->mylib->return_month($month);
        //$data['target_year'] = $year;
        //$data['target_monthcode'] = $month;
        $data['state_code'] = $state;

        $data['target_state'] = $this->state_model->get_state_by_code($state);

        //$data['list_of_sic'] = $this->report->get_sic();

        $premise = $this->db->get_where('premis_login', array('negeri' => $data['target_state']))->result();

        $idpremise = Array();
        foreach ($premise as $p) {
            $idpremise[] = $p->idpremis;
        }
//        echo '<pre>';
//        print_r($idpremise);
//        echo '</pre>';
        //$data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $this->idpremis))->result();


        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('completed' => 0))->result();
        $tool_weightage = $this->db->get('kpigsr_tool')->result();

        //INVENTORY
        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('41', $state);
        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('40', $state);
        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('42', $state);

        //TOTAL SUBMISSION ANSWERS BY STATE DAN SIC
        //TOTAL RATING FOR EACH ANSWERS BY STATE DAN SIC

        foreach ($data['list_of_sic'] as $sic) {
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $state);
            $emt_by_sic[$sic->SIC] = $this->report->get_answers_by_sic_range($from_date, $to_date, $sic->SIC, $idpremise);
        }

        foreach ($emt_by_sic as $key => $value) {
            // dapatkan EMT tu sic apa
            //print_r($e);
            // dapatkan jumlah emt ?/7
            if (!empty($value)) {

                foreach ($value as $v) {

                    //print_r($v);
                    $x = 0;

                    ($v->tool1_implementation == 'true') ? $x++ : $v->tool1_score_premise = 100;
                    ($v->tool2_implementation == 'true') ? $x++ : $v->tool2_score_premise = 100;
                    ($v->tool3_implementation == 'true') ? $x++ : $v->tool3_score_premise = 100;
                    ($v->tool4_implementation == 'true') ? $x++ : $v->tool4_score_premise = 100;
                    ($v->tool5_implementation == 'true') ? $x++ : $v->tool5_score_premise = 100;
                    ($v->tool6_implementation == 'true') ? $x++ : $v->tool6_score_premise = 100;
                    ($v->tool7_implementation == 'true') ? $x++ : $v->tool7_score_premise = 100;

                    $v->total_emt = $x;

                    $score = 0;
                    // dapatkan jumlah score premise
                    $score += ($v->tool1_score_premise / 100) * $tool_weightage[0]->tool_full_score;
                    $score += ($v->tool2_score_premise / 100) * $tool_weightage[1]->tool_full_score;
                    $score += ($v->tool3_score_premise / 100) * $tool_weightage[2]->tool_full_score;
                    $score += ($v->tool4_score_premise / 100) * $tool_weightage[3]->tool_full_score;
                    $score += ($v->tool5_score_premise / 100) * $tool_weightage[4]->tool_full_score;
                    $score += ($v->tool6_score_premise / 100) * $tool_weightage[5]->tool_full_score;
                    $score += ($v->tool7_score_premise / 100) * $tool_weightage[6]->tool_full_score;

                    $v->score = $score;
                    //Calculate markah premise by tool

                    $this->load->model('score_model');
                    $scoreDOETool1 = ($this->score_model->get_score_by_tool($v->id, '1') * $tool_weightage[0]->tool_full_score) / 100;
                    $scoreDOETool2 = ($this->score_model->get_score_by_tool($v->id, '2') * $tool_weightage[1]->tool_full_score) / 100;
                    $scoreDOETool3 = ($this->score_model->get_score_by_tool($v->id, '3') * $tool_weightage[2]->tool_full_score) / 100;
                    $scoreDOETool4 = ($this->score_model->get_score_by_tool($v->id, '4') * $tool_weightage[3]->tool_full_score) / 100;
                    $scoreDOETool5 = ($this->score_model->get_score_by_tool($v->id, '5') * $tool_weightage[4]->tool_full_score) / 100;
                    $scoreDOETool6 = ($this->score_model->get_score_by_tool($v->id, '6') * $tool_weightage[5]->tool_full_score) / 100;
                    $scoreDOETool7 = ($this->score_model->get_score_by_tool($v->id, '7') * $tool_weightage[6]->tool_full_score) / 100;

                    $doetotalscore = $scoreDOETool1 + $scoreDOETool2 + $scoreDOETool3 + $scoreDOETool4 + $scoreDOETool5 + $scoreDOETool6 + $scoreDOETool7;
                    //$v->scoreDOE2 = $this->score_model->get_score_by_tool($v->id, '1');
                    $v->scoreDOE = $this->mylib->get_assessment_level(round($doetotalscore));

                    //get remark from DOE officer, if any
                    //$emt->ulasan = $this->db->get_where('kpigsr_comment_premise', array('emt_id' => $emt->id))->result();
                }
            }
        }

        //print_r($emt_by_sic);
        $data['from_month'] = $this->ref->return_month($f_month);
        $data['from_year'] = $f_year;
        $data['to_month'] = $this->ref->return_month($t_month);
        $data['to_year'] = $t_year;
        $data['state_code'] = $state;
        $data['emt_by_sic'] = $emt_by_sic;
        //$this->output->enable_profiler(true);
        $this->viewit('kpi/rating_byRange', $data);
    }
    
    public function view_rating($month = 01, $year = 2018, $state = 14) {

        $this->load->library('mylib');

        $data['target_month'] = $this->mylib->return_month($month);
        $data['target_year'] = $year;
        $data['target_monthcode'] = $month;
        $data['state_code'] = $state;

        $data['target_state'] = $this->state_model->get_state_by_code($state);

        $data['list_of_sic'] = $this->report->get_sic();

        $premise = $this->db->get_where('premis_login', array('negeri' => $data['target_state']))->result();

        $idpremise = Array();
        foreach ($premise as $p) {
            $idpremise[] = $p->idpremis;
        }
//        echo '<pre>';
//        print_r($idpremise);
//        echo '</pre>';
        //$data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $this->idpremis))->result();


        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('completed' => 0))->result();
        $tool_weightage = $this->db->get('kpigsr_tool')->result();

        //INVENTORY
        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('41', $state);
        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('40', $state);
        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('42', $state);

        //TOTAL SUBMISSION ANSWERS BY STATE DAN SIC
        //TOTAL RATING FOR EACH ANSWERS BY STATE DAN SIC

        foreach ($data['list_of_sic'] as $sic) {
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $state);
            $emt_by_sic[$sic->SIC] = $this->report->get_answers_by_sic($month, $year, $data['target_state'], $sic->SIC, $idpremise);
        }

        foreach ($emt_by_sic as $key => $value) {
            // dapatkan EMT tu sic apa
            //print_r($e);
            // dapatkan jumlah emt ?/7
            if (!empty($value)) {

                foreach ($value as $v) {

                    //print_r($v);
                    $x = 0;

                    ($v->tool1_implementation == 'true') ? $x++ : $v->tool1_score_premise = 100;
                    ($v->tool2_implementation == 'true') ? $x++ : $v->tool2_score_premise = 100;
                    ($v->tool3_implementation == 'true') ? $x++ : $v->tool3_score_premise = 100;
                    ($v->tool4_implementation == 'true') ? $x++ : $v->tool4_score_premise = 100;
                    ($v->tool5_implementation == 'true') ? $x++ : $v->tool5_score_premise = 100;
                    ($v->tool6_implementation == 'true') ? $x++ : $v->tool6_score_premise = 100;
                    ($v->tool7_implementation == 'true') ? $x++ : $v->tool7_score_premise = 100;

                    $v->total_emt = $x;

                    $score = 0;
                    // dapatkan jumlah score premise
                    $score += ($v->tool1_score_premise / 100) * $tool_weightage[0]->tool_full_score;
                    $score += ($v->tool2_score_premise / 100) * $tool_weightage[1]->tool_full_score;
                    $score += ($v->tool3_score_premise / 100) * $tool_weightage[2]->tool_full_score;
                    $score += ($v->tool4_score_premise / 100) * $tool_weightage[3]->tool_full_score;
                    $score += ($v->tool5_score_premise / 100) * $tool_weightage[4]->tool_full_score;
                    $score += ($v->tool6_score_premise / 100) * $tool_weightage[5]->tool_full_score;
                    $score += ($v->tool7_score_premise / 100) * $tool_weightage[6]->tool_full_score;

                    $v->score = $score;
                    //Calculate markah premise by tool

                    $this->load->model('score_model');
                    $scoreDOETool1 = ($this->score_model->get_score_by_tool($v->id, '1') * $tool_weightage[0]->tool_full_score) / 100;
                    $scoreDOETool2 = ($this->score_model->get_score_by_tool($v->id, '2') * $tool_weightage[1]->tool_full_score) / 100;
                    $scoreDOETool3 = ($this->score_model->get_score_by_tool($v->id, '3') * $tool_weightage[2]->tool_full_score) / 100;
                    $scoreDOETool4 = ($this->score_model->get_score_by_tool($v->id, '4') * $tool_weightage[3]->tool_full_score) / 100;
                    $scoreDOETool5 = ($this->score_model->get_score_by_tool($v->id, '5') * $tool_weightage[4]->tool_full_score) / 100;
                    $scoreDOETool6 = ($this->score_model->get_score_by_tool($v->id, '6') * $tool_weightage[5]->tool_full_score) / 100;
                    $scoreDOETool7 = ($this->score_model->get_score_by_tool($v->id, '7') * $tool_weightage[6]->tool_full_score) / 100;

                    $doetotalscore = $scoreDOETool1 + $scoreDOETool2 + $scoreDOETool3 + $scoreDOETool4 + $scoreDOETool5 + $scoreDOETool6 + $scoreDOETool7;
                    //$v->scoreDOE2 = $this->score_model->get_score_by_tool($v->id, '1');
                    $v->scoreDOE = $this->mylib->get_assessment_level(round($doetotalscore));

                    //get remark from DOE officer, if any
                    //$emt->ulasan = $this->db->get_where('kpigsr_comment_premise', array('emt_id' => $emt->id))->result();
                }
            }
        }

        //print_r($emt_by_sic);
        $data['emt_by_sic'] = $emt_by_sic;
        //$this->output->enable_profiler(true);
        $this->viewit('kpi/rating', $data);
    }

    public function view_rating_xls($month = 01, $year = 2018, $state = 14) {

        $this->load->library('mylib');

        $data['target_month'] = $this->mylib->return_month($month);
        $data['target_year'] = $year;
        $data['target_monthcode'] = $month;
        //$data['target_state'] = $state;

        $data['target_state'] = $this->state_model->get_state_by_code($state);

        $data['list_of_sic'] = $this->report->get_sic();

        $premise = $this->db->get_where('premis_login', array('negeri' => $data['target_state']))->result();

        $idpremise = Array();
        foreach ($premise as $p) {
            $idpremise[] = $p->idpremis;
        }
//        echo '<pre>';
//        print_r($idpremise);
//        echo '</pre>';
        //$data['answers2'] = $this->db->get_where('kpigsr_answers', array('idpremise' => $this->idpremis))->result();


        $data['answers2'] = $this->db->get_where('kpigsr_answers', array('completed' => 0))->result();
        $tool_weightage = $this->db->get('kpigsr_tool')->result();

        //INVENTORY
        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('41', $state);
        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('40', $state);
        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('42', $state);

        //TOTAL SUBMISSION ANSWERS BY STATE DAN SIC
        //TOTAL RATING FOR EACH ANSWERS BY STATE DAN SIC

        foreach ($data['list_of_sic'] as $sic) {
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $state);
            $emt_by_sic[$sic->SIC] = $this->report->get_answers_by_sic($month, $year, $data['target_state'], $sic->SIC, $idpremise);
        }

        foreach ($emt_by_sic as $key => $value) {
            // dapatkan EMT tu sic apa
            //print_r($e);
            // dapatkan jumlah emt ?/7
            if (!empty($value)) {

                foreach ($value as $v) {

                    //print_r($v->tool1_implementation);
                    $x = 0;

                    ($v->tool1_implementation == 'true') ? $x++ : $v->tool1_score_premise = 100;
                    ($v->tool2_implementation == 'true') ? $x++ : $v->tool2_score_premise = 100;
                    ($v->tool3_implementation == 'true') ? $x++ : $v->tool3_score_premise = 100;
                    ($v->tool4_implementation == 'true') ? $x++ : $v->tool4_score_premise = 100;
                    ($v->tool5_implementation == 'true') ? $x++ : $v->tool5_score_premise = 100;
                    ($v->tool6_implementation == 'true') ? $x++ : $v->tool6_score_premise = 100;
                    ($v->tool7_implementation == 'true') ? $x++ : $v->tool7_score_premise = 100;

                    $v->total_emt = $x;

                    $score = 0;
                    // dapatkan jumlah score premise
                    $score += ($v->tool1_score_premise / 100) * $tool_weightage[0]->tool_full_score;
                    $score += ($v->tool2_score_premise / 100) * $tool_weightage[1]->tool_full_score;
                    $score += ($v->tool3_score_premise / 100) * $tool_weightage[2]->tool_full_score;
                    $score += ($v->tool4_score_premise / 100) * $tool_weightage[3]->tool_full_score;
                    $score += ($v->tool5_score_premise / 100) * $tool_weightage[4]->tool_full_score;
                    $score += ($v->tool6_score_premise / 100) * $tool_weightage[5]->tool_full_score;
                    $score += ($v->tool7_score_premise / 100) * $tool_weightage[6]->tool_full_score;

                    $v->score = $score;
                    //Calculate markah premise by tool

                    $this->load->model('score_model');
                    $scoreDOETool1 = ($this->score_model->get_score_by_tool($v->id, '1') * $tool_weightage[0]->tool_full_score) / 100;
                    $scoreDOETool2 = ($this->score_model->get_score_by_tool($v->id, '2') * $tool_weightage[1]->tool_full_score) / 100;
                    $scoreDOETool3 = ($this->score_model->get_score_by_tool($v->id, '3') * $tool_weightage[2]->tool_full_score) / 100;
                    $scoreDOETool4 = ($this->score_model->get_score_by_tool($v->id, '4') * $tool_weightage[3]->tool_full_score) / 100;
                    $scoreDOETool5 = ($this->score_model->get_score_by_tool($v->id, '5') * $tool_weightage[4]->tool_full_score) / 100;
                    $scoreDOETool6 = ($this->score_model->get_score_by_tool($v->id, '6') * $tool_weightage[5]->tool_full_score) / 100;
                    $scoreDOETool7 = ($this->score_model->get_score_by_tool($v->id, '7') * $tool_weightage[6]->tool_full_score) / 100;

                    $doetotalscore = $scoreDOETool1 + $scoreDOETool2 + $scoreDOETool3 + $scoreDOETool4 + $scoreDOETool5 + $scoreDOETool6 + $scoreDOETool7;
                    //$emt->scoreDOE = $this->mylib->get_assessment_level($doetotalscore);
                    $v->scoreDOE = $this->mylib->get_assessment_level(round($doetotalscore));

                    //get remark from DOE officer, if any
                    //$emt->ulasan = $this->db->get_where('kpigsr_comment_premise', array('emt_id' => $emt->id))->result();
                }
            }
        }
        $data['emt_by_sic'] = $emt_by_sic;
        //$this->output->enable_profiler(true);
        $this->load->view('kpi/rating_xls', $data);
    }

    public function get_premise_registered_chart() {
        $this->load->model('Data_model', 'data');

        $category = array();
        $category['name'] = 'Rating';

        $series1 = array();
        $series1['name'] = 'Poor';
        $series2['name'] = 'Fair';
        $series3['name'] = 'Average';
        $series4['name'] = 'Good';
        $series5['name'] = 'Excellent';

        //get premise submitted  = 
        // loop all returned premise =
        // Get Rating
        for ($i = 1; $i < 17; $i++) {
            $category['data'][] = $this->data->get_premise_state($i);
            $series1['data'][] = $this->data->get_emtid_by_state($i, 'Poor');
            ; //poor
            $series2['data'][] = $this->data->get_emtid_by_state($i, 'Fair'); //fair
            $series3['data'][] = $this->data->get_emtid_by_state($i, 'Average'); //avg
            $series4['data'][] = $this->data->get_emtid_by_state($i, 'Good'); //good
            $series5['data'][] = $this->data->get_emtid_by_state($i, 'Excellent'); //excellent

            $test[] = $this->data->get_emtid_by_state($i, 'Excellent');
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);
        array_push($result, $series4);
        array_push($result, $series5);
        print json_encode($result, JSON_NUMERIC_CHECK);

//        echo '<pre>';
//        print_r($test);
//        echo '</pre>';
//        $this->output->enable_profiler(true);
    }

    public function rating_list($state_code) {

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

//        $premises = $this->answers_model->get_completed_view($start, $length, $order, $dir, $state_code);
//        $total_premises = $this->answers_model->get_completed_total_view($state_code);

        $premises = $this->kpi_model->get_rating_view($start, $length, $order, $dir, $state_code);
        $total_premises = $this->kpi_model->get_rating_total_view($state_code);

        $data = array();

        foreach ($premises->result() as $r) {

            $data[] = array(
                $r->id,
                $r->namapremis,
                $r->bandar,
                $r->idpremis,
                $r->negeri,
                //$r->poskod,
                $r->emt_type,
                $r->rating_by_doe,
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
        //$this->output->enable_profiler(true);
        exit();
    }

//     public function view_monthly($frommonth, $fromyear, $tomonth, $toyear, $state, $rpt) {
//
//        $this->load->library('mylib');
//
//        $data['target_month'] = $this->mylib->return_month($frommonth);
//        $data['target_year'] = $fromyear;
//        $data['target_monthcode'] = $frommonth;
//        
//        $data['target_state'] = $state;
//        $data['list_of_sic'] = $this->report->get_sic();
//
//        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('41', $state);
//        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('40', $state);
//        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('42', $state);
//
//        $data['sasaran_bulan_kks'] = $this->report->get_sasaran_bulan($state, '41', $month, $year);
//        $data['sasaran_bulan_kg'] = $this->report->get_sasaran_bulan($state, '40', $month, $year);
//        $data['sasaran_bulan_bt'] = $this->report->get_sasaran_bulan($state, '42', $month, $year);
//
//        $data['total_bm_kks'] = $this->report->get_bm_byMonth($state, '41', $month, $year);
//        $data['total_bm_kg'] = $this->report->get_bm_byMonth($state, '40', $month, $year);
//        $data['total_bm_bt'] = $this->report->get_bm_byMonth($state, '42', $month, $year);
//        
//        $data['total_bm_7per7_kks'] = $this->report->get_bm_7per7($state, '41', $month, $year);
//        $data['total_bm_7per7_kg'] = $this->report->get_bm_7per7($state, '40', $month, $year);
//        $data['total_bm_7per7_bt'] = $this->report->get_bm_7per7($state, '42', $month, $year);
//        
//        $data['total_bd_kks'] = $this->report->get_type_of_verification('Desktop',$state, 41, $month, $year);
//        $data['total_fi_kks'] = $this->report->get_type_of_verification('FI',$state, 41, $month, $year);
//        
//        $data['total_bd_kg'] = $this->report->get_type_of_verification('Desktop',$state, 40, $month, $year);
//        $data['total_fi_kg'] = $this->report->get_type_of_verification('FI',$state, 40, $month, $year);
//        
//        $data['total_bd_bt'] = $this->report->get_type_of_verification('Desktop',$state, 42, $month, $year);
//        $data['total_fi_bt'] = $this->report->get_type_of_verification('FI',$state, 42, $month, $year);
//        
//        //unset($data['list_of_sic'][39], $data['list_of_sic'][40], $data['list_of_sic'][41]); //remove SIC 40, 41, 42 key
//        
//        foreach ($data['list_of_sic'] as $sic) {
//            //$data['quarterly_kpi_'.$sic->SIC] = $this->report->get_kpi_quarterly($sic->SIC, $this->state); 
//            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $state);
//            $data['sasaran_bulan_' . $sic->SIC] = $this->report->get_sasaran_bulan($state, $sic->SIC, $month, $year);
//            $data['total_bm_' . $sic->SIC] = $this->report->get_bm_byMonth($state, $sic->SIC, $month, $year);
//            $data['total_bm_7per7_' . $sic->SIC] = $this->report->get_bm_7per7($state, $sic->SIC, $month, $year);
//            
//            $data['total_bd_'. $sic->SIC] = $this->report->get_type_of_verification('Desktop',$state, $sic->SIC, $month, $year);
//            $data['total_fi_'. $sic->SIC] = $this->report->get_type_of_verification('FI',$state, $sic->SIC, $month, $year);
//        
//            if (isset($data['sasaran_bulan_' . $sic->SIC])) {
//                $sasaranNotSet[] = 'true';
//            } else {
//                $sasaranNotSet[] = 'false';
//            }
//        }
//        
//        //Data reporting tools
//        //month tak add lagi
//        foreach($data['list_of_sic'] as $sic){
//        $data['total_tool1_implementation_true_'. $sic->SIC] = $this->report->count_premise_tool('1', 'true', $state, $sic->SIC);
//        $data['total_tool2_implementation_true_'. $sic->SIC] = $this->report->count_premise_tool('2', 'true', $state, $sic->SIC);
//        $data['total_tool3_implementation_true_'. $sic->SIC] = $this->report->count_premise_tool('3', 'true', $state, $sic->SIC);
//        $data['total_tool4_implementation_true_'. $sic->SIC] = $this->report->count_premise_tool('4', 'true', $state, $sic->SIC);
//        $data['total_tool5_implementation_true_'. $sic->SIC] = $this->report->count_premise_tool('5', 'true', $state, $sic->SIC);
//        $data['total_tool6_implementation_true_'. $sic->SIC] = $this->report->count_premise_tool('6', 'true', $state, $sic->SIC);
//        $data['total_tool7_implementation_true_'. $sic->SIC] = $this->report->count_premise_tool('7', 'true', $state, $sic->SIC); 
//        
//        $data['total_tool1_implementation_false_'. $sic->SIC] = $this->report->count_premise_tool('1', 'false', $state, $sic->SIC);
//        $data['total_tool2_implementation_false_'. $sic->SIC] = $this->report->count_premise_tool('2', 'false', $state, $sic->SIC);
//        $data['total_tool3_implementation_false_'. $sic->SIC] = $this->report->count_premise_tool('3', 'false', $state, $sic->SIC);
//        $data['total_tool4_implementation_false_'. $sic->SIC] = $this->report->count_premise_tool('4', 'false', $state, $sic->SIC);
//        $data['total_tool5_implementation_false_'. $sic->SIC] = $this->report->count_premise_tool('5', 'false', $state, $sic->SIC);
//        $data['total_tool6_implementation_false_'. $sic->SIC] = $this->report->count_premise_tool('6', 'false', $state, $sic->SIC);
//        $data['total_tool7_implementation_false_'. $sic->SIC] = $this->report->count_premise_tool('7', 'false', $state, $sic->SIC); 
//        
//        if($sic->SIC == 41){
//            //KKS
//            $data['total_tool1_implementation_true_kks'] = $this->report->count_premise_tool('1', 'true', $state, $sic->SIC);
//            $data['total_tool2_implementation_true_kks'] = $this->report->count_premise_tool('2', 'true', $state, $sic->SIC);
//            $data['total_tool3_implementation_true_kks'] = $this->report->count_premise_tool('3', 'true', $state, $sic->SIC);
//            $data['total_tool4_implementation_true_kks'] = $this->report->count_premise_tool('4', 'true', $state, $sic->SIC);
//            $data['total_tool5_implementation_true_kks'] = $this->report->count_premise_tool('5', 'true', $state, $sic->SIC);
//            $data['total_tool6_implementation_true_kks'] = $this->report->count_premise_tool('6', 'true', $state, $sic->SIC);
//            $data['total_tool7_implementation_true_kks'] = $this->report->count_premise_tool('7', 'true', $state, $sic->SIC);
//
//            $data['total_tool1_implementation_false_kks'] = $this->report->count_premise_tool('1', 'false', $state, $sic->SIC);
//            $data['total_tool2_implementation_false_kks'] = $this->report->count_premise_tool('2', 'false', $state, $sic->SIC);
//            $data['total_tool3_implementation_false_kks'] = $this->report->count_premise_tool('3', 'false', $state, $sic->SIC);
//            $data['total_tool4_implementation_false_kks'] = $this->report->count_premise_tool('4', 'false', $state, $sic->SIC);
//            $data['total_tool5_implementation_false_kks'] = $this->report->count_premise_tool('5', 'false', $state, $sic->SIC);
//            $data['total_tool6_implementation_false_kks'] = $this->report->count_premise_tool('6', 'false', $state, $sic->SIC);
//            $data['total_tool7_implementation_false_kks'] = $this->report->count_premise_tool('7', 'false', $state, $sic->SIC);
//        } elseif($sic->SIC == 40){
//            //KG
//            $data['total_tool1_implementation_true_kg'] = $this->report->count_premise_tool('1', 'true', $state, $sic->SIC);
//            $data['total_tool2_implementation_true_kg'] = $this->report->count_premise_tool('2', 'true', $state, $sic->SIC);
//            $data['total_tool3_implementation_true_kg'] = $this->report->count_premise_tool('3', 'true', $state, $sic->SIC);
//            $data['total_tool4_implementation_true_kg'] = $this->report->count_premise_tool('4', 'true', $state, $sic->SIC);
//            $data['total_tool5_implementation_true_kg'] = $this->report->count_premise_tool('5', 'true', $state, $sic->SIC);
//            $data['total_tool6_implementation_true_kg'] = $this->report->count_premise_tool('6', 'true', $state, $sic->SIC);
//            $data['total_tool7_implementation_true_kg'] = $this->report->count_premise_tool('7', 'true', $state, $sic->SIC);
//
//            $data['total_tool1_implementation_false_kg'] = $this->report->count_premise_tool('1', 'false', $state, $sic->SIC);
//            $data['total_tool2_implementation_false_kg'] = $this->report->count_premise_tool('2', 'false', $state, $sic->SIC);
//            $data['total_tool3_implementation_false_kg'] = $this->report->count_premise_tool('3', 'false', $state, $sic->SIC);
//            $data['total_tool4_implementation_false_kg'] = $this->report->count_premise_tool('4', 'false', $state, $sic->SIC);
//            $data['total_tool5_implementation_false_kg'] = $this->report->count_premise_tool('5', 'false', $state, $sic->SIC);
//            $data['total_tool6_implementation_false_kg'] = $this->report->count_premise_tool('6', 'false', $state, $sic->SIC);
//            $data['total_tool7_implementation_false_kg'] = $this->report->count_premise_tool('7', 'false', $state, $sic->SIC);
//        } elseif($sic->SIC == 42){
//            //BT
//            $data['total_tool1_implementation_true_bt'] = $this->report->count_premise_tool('1', 'true', $state, $sic->SIC);
//            $data['total_tool2_implementation_true_bt'] = $this->report->count_premise_tool('2', 'true', $state, $sic->SIC);
//            $data['total_tool3_implementation_true_bt'] = $this->report->count_premise_tool('3', 'true', $state, $sic->SIC);
//            $data['total_tool4_implementation_true_bt'] = $this->report->count_premise_tool('4', 'true', $state, $sic->SIC);
//            $data['total_tool5_implementation_true_bt'] = $this->report->count_premise_tool('5', 'true', $state, $sic->SIC);
//            $data['total_tool6_implementation_true_bt'] = $this->report->count_premise_tool('6', 'true', $state, $sic->SIC);
//            $data['total_tool7_implementation_true_bt'] = $this->report->count_premise_tool('7', 'true', $state, $sic->SIC);
//
//            $data['total_tool1_implementation_false_bt'] = $this->report->count_premise_tool('1', 'false', $state, $sic->SIC);
//            $data['total_tool2_implementation_false_bt'] = $this->report->count_premise_tool('2', 'false', $state, $sic->SIC);
//            $data['total_tool3_implementation_false_bt'] = $this->report->count_premise_tool('3', 'false', $state, $sic->SIC);
//            $data['total_tool4_implementation_false_bt'] = $this->report->count_premise_tool('4', 'false', $state, $sic->SIC);
//            $data['total_tool5_implementation_false_bt'] = $this->report->count_premise_tool('5', 'false', $state, $sic->SIC);
//            $data['total_tool6_implementation_false_bt'] = $this->report->count_premise_tool('6', 'false', $state, $sic->SIC);
//            $data['total_tool7_implementation_false_bt'] = $this->report->count_premise_tool('7', 'false', $state, $sic->SIC);
//        }
//        }
//   
//        if ($rpt == 'tools') {
//            $this->viewit('kpi/monthly_report_tools', $data);
//        } elseif ($rpt == 'bm') {
//            $this->viewit('kpi/monthly_report_bm', $data);
//        } else {
//            
//        }
//    }

    public function view_monthly_xls($month, $year, $state, $rpt) {

        $this->load->library('mylib');

        $data['target_month'] = $this->mylib->return_month($month);
        $data['target_year'] = $year;
        $data['target_monthcode'] = $month;
        $data['target_state'] = $state;
        $data['list_of_sic'] = $this->report->get_sic();

        $data['inventory_kks'] = $this->report->get_inventory_by_stateEKAS('41', $state);
        $data['inventory_kg'] = $this->report->get_inventory_by_stateEKAS('40', $state);
        $data['inventory_bt'] = $this->report->get_inventory_by_stateEKAS('42', $state);

        $data['sasaran_bulan_kks'] = $this->report->get_sasaran_bulan($state, '41', $month, $year);
        $data['sasaran_bulan_kg'] = $this->report->get_sasaran_bulan($state, '40', $month, $year);
        $data['sasaran_bulan_bt'] = $this->report->get_sasaran_bulan($state, '42', $month, $year);

        $data['total_bm_kks'] = $this->report->get_bm_byMonth($state, '41', $month, $year);
        $data['total_bm_kg'] = $this->report->get_bm_byMonth($state, '40', $month, $year);
        $data['total_bm_bt'] = $this->report->get_bm_byMonth($state, '42', $month, $year);
        $data['total_bm_7per7_kks'] = $this->report->get_bm_7per7($state, '41', $month, $year);
        $data['total_bm_7per7_kg'] = $this->report->get_bm_7per7($state, '40', $month, $year);
        $data['total_bm_7per7_bt'] = $this->report->get_bm_7per7($state, '42', $month, $year);

        $data['total_bd_kks'] = $this->report->get_type_of_verification('Desktop', $state, 41, $month, $year);
        $data['total_fi_kks'] = $this->report->get_type_of_verification('FI', $state, 41, $month, $year);

        $data['total_bd_kg'] = $this->report->get_type_of_verification('Desktop', $state, 40, $month, $year);
        $data['total_fi_kg'] = $this->report->get_type_of_verification('FI', $state, 40, $month, $year);

        $data['total_bd_bt'] = $this->report->get_type_of_verification('Desktop', $state, 42, $month, $year);
        $data['total_fi_bt'] = $this->report->get_type_of_verification('FI', $state, 42, $month, $year);

        //unset($data['list_of_sic'][39], $data['list_of_sic'][40], $data['list_of_sic'][41]); //remove SIC 40, 41, 42 key

        foreach ($data['list_of_sic'] as $sic) {
            //$data['quarterly_kpi_'.$sic->SIC] = $this->report->get_kpi_quarterly($sic->SIC, $this->state); 
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_stateEKAS($sic->SIC, $state);
            $data['sasaran_bulan_' . $sic->SIC] = $this->report->get_sasaran_bulan($state, $sic->SIC, $month, $year);
            $data['total_bm_' . $sic->SIC] = $this->report->get_bm_byMonth($state, $sic->SIC, $month, $year);
            $data['total_bm_7per7_' . $sic->SIC] = $this->report->get_bm_7per7($state, $sic->SIC, $month, $year);

            $data['total_bd_' . $sic->SIC] = $this->report->get_type_of_verification('Desktop', $state, $sic->SIC, $month, $year);
            $data['total_fi_' . $sic->SIC] = $this->report->get_type_of_verification('FI', $state, $sic->SIC, $month, $year);

            if (isset($data['sasaran_bulan_' . $sic->SIC])) {
                $sasaranNotSet[] = 'true';
            } else {
                $sasaranNotSet[] = 'false';
            }
        }

        //Data reporting tools
        //month tak add lagi
        foreach ($data['list_of_sic'] as $sic) {
            $data['total_tool1_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('1', $month, 'true', $state, $sic->SIC);
            $data['total_tool2_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('2', $month, 'true', $state, $sic->SIC);
            $data['total_tool3_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('3', $month, 'true', $state, $sic->SIC);
            $data['total_tool4_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('4', $month, 'true', $state, $sic->SIC);
            $data['total_tool5_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('5', $month, 'true', $state, $sic->SIC);
            $data['total_tool6_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('6', $month, 'true', $state, $sic->SIC);
            $data['total_tool7_implementation_true_' . $sic->SIC] = $this->report->count_premise_tool('7', $month, 'true', $state, $sic->SIC);

            $data['total_tool1_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('1', $month, 'false', $state, $sic->SIC);
            $data['total_tool2_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('2', $month, 'false', $state, $sic->SIC);
            $data['total_tool3_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('3', $month, 'false', $state, $sic->SIC);
            $data['total_tool4_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('4', $month, 'false', $state, $sic->SIC);
            $data['total_tool5_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('5', $month, 'false', $state, $sic->SIC);
            $data['total_tool6_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('6', $month, 'false', $state, $sic->SIC);
            $data['total_tool7_implementation_false_' . $sic->SIC] = $this->report->count_premise_tool('7', $month, 'false', $state, $sic->SIC);

            if ($sic->SIC == 41) {
                //KKS
                $data['total_tool1_implementation_true_kks'] = $this->report->count_premise_tool('1', $month, 'true', $state, $sic->SIC);
                $data['total_tool2_implementation_true_kks'] = $this->report->count_premise_tool('2', $month, 'true', $state, $sic->SIC);
                $data['total_tool3_implementation_true_kks'] = $this->report->count_premise_tool('3', $month, 'true', $state, $sic->SIC);
                $data['total_tool4_implementation_true_kks'] = $this->report->count_premise_tool('4', $month, 'true', $state, $sic->SIC);
                $data['total_tool5_implementation_true_kks'] = $this->report->count_premise_tool('5', $month, 'true', $state, $sic->SIC);
                $data['total_tool6_implementation_true_kks'] = $this->report->count_premise_tool('6', $month, 'true', $state, $sic->SIC);
                $data['total_tool7_implementation_true_kks'] = $this->report->count_premise_tool('7', $month, 'true', $state, $sic->SIC);

                $data['total_tool1_implementation_false_kks'] = $this->report->count_premise_tool('1', $month, 'false', $state, $sic->SIC);
                $data['total_tool2_implementation_false_kks'] = $this->report->count_premise_tool('2', $month, 'false', $state, $sic->SIC);
                $data['total_tool3_implementation_false_kks'] = $this->report->count_premise_tool('3', $month, 'false', $state, $sic->SIC);
                $data['total_tool4_implementation_false_kks'] = $this->report->count_premise_tool('4', $month, 'false', $state, $sic->SIC);
                $data['total_tool5_implementation_false_kks'] = $this->report->count_premise_tool('5', $month, 'false', $state, $sic->SIC);
                $data['total_tool6_implementation_false_kks'] = $this->report->count_premise_tool('6', $month, 'false', $state, $sic->SIC);
                $data['total_tool7_implementation_false_kks'] = $this->report->count_premise_tool('7', $month, 'false', $state, $sic->SIC);
            } elseif ($sic->SIC == 40) {
                //KG
                $data['total_tool1_implementation_true_kg'] = $this->report->count_premise_tool('1', $month, 'true', $state, $sic->SIC);
                $data['total_tool2_implementation_true_kg'] = $this->report->count_premise_tool('2', $month, 'true', $state, $sic->SIC);
                $data['total_tool3_implementation_true_kg'] = $this->report->count_premise_tool('3', $month, 'true', $state, $sic->SIC);
                $data['total_tool4_implementation_true_kg'] = $this->report->count_premise_tool('4', $month, 'true', $state, $sic->SIC);
                $data['total_tool5_implementation_true_kg'] = $this->report->count_premise_tool('5', $month, 'true', $state, $sic->SIC);
                $data['total_tool6_implementation_true_kg'] = $this->report->count_premise_tool('6', $month, 'true', $state, $sic->SIC);
                $data['total_tool7_implementation_true_kg'] = $this->report->count_premise_tool('7', $month, 'true', $state, $sic->SIC);

                $data['total_tool1_implementation_false_kg'] = $this->report->count_premise_tool('1', $month, 'false', $state, $sic->SIC);
                $data['total_tool2_implementation_false_kg'] = $this->report->count_premise_tool('2', $month, 'false', $state, $sic->SIC);
                $data['total_tool3_implementation_false_kg'] = $this->report->count_premise_tool('3', $month, 'false', $state, $sic->SIC);
                $data['total_tool4_implementation_false_kg'] = $this->report->count_premise_tool('4', $month, 'false', $state, $sic->SIC);
                $data['total_tool5_implementation_false_kg'] = $this->report->count_premise_tool('5', $month, 'false', $state, $sic->SIC);
                $data['total_tool6_implementation_false_kg'] = $this->report->count_premise_tool('6', $month, 'false', $state, $sic->SIC);
                $data['total_tool7_implementation_false_kg'] = $this->report->count_premise_tool('7', $month, 'false', $state, $sic->SIC);
            } elseif ($sic->SIC == 42) {
                //BT
                $data['total_tool1_implementation_true_bt'] = $this->report->count_premise_tool('1', $month, 'true', $state, $sic->SIC);
                $data['total_tool2_implementation_true_bt'] = $this->report->count_premise_tool('2', $month, 'true', $state, $sic->SIC);
                $data['total_tool3_implementation_true_bt'] = $this->report->count_premise_tool('3', $month, 'true', $state, $sic->SIC);
                $data['total_tool4_implementation_true_bt'] = $this->report->count_premise_tool('4', $month, 'true', $state, $sic->SIC);
                $data['total_tool5_implementation_true_bt'] = $this->report->count_premise_tool('5', $month, 'true', $state, $sic->SIC);
                $data['total_tool6_implementation_true_bt'] = $this->report->count_premise_tool('6', $month, 'true', $state, $sic->SIC);
                $data['total_tool7_implementation_true_bt'] = $this->report->count_premise_tool('7', $month, 'true', $state, $sic->SIC);

                $data['total_tool1_implementation_false_bt'] = $this->report->count_premise_tool('1', $month, 'false', $state, $sic->SIC);
                $data['total_tool2_implementation_false_bt'] = $this->report->count_premise_tool('2', $month, 'false', $state, $sic->SIC);
                $data['total_tool3_implementation_false_bt'] = $this->report->count_premise_tool('3', $month, 'false', $state, $sic->SIC);
                $data['total_tool4_implementation_false_bt'] = $this->report->count_premise_tool('4', $month, 'false', $state, $sic->SIC);
                $data['total_tool5_implementation_false_bt'] = $this->report->count_premise_tool('5', $month, 'false', $state, $sic->SIC);
                $data['total_tool6_implementation_false_bt'] = $this->report->count_premise_tool('6', $month, 'false', $state, $sic->SIC);
                $data['total_tool7_implementation_false_bt'] = $this->report->count_premise_tool('7', $month, 'false', $state, $sic->SIC);
            }
        }

        if ($rpt == 'tools') {
            $this->load->view('kpi/monthly_report_tools_xls', $data);
        } elseif ($rpt == 'bm') {
            $this->load->view('kpi/monthly_report_bm_xls', $data);
        } else {
            
        }
    }

    public function view_quarterly($quarter = 1, $year = 2018, $state = 2) {
        $data['target_quarter'] = $quarter;
        $data['target_year'] = $year;
        $data['list_of_sic'] = $this->report->get_sic();
        $data['inventory_kks'] = $this->report->get_inventory_by_state('kks', $this->state);
        $data['inventory_kg'] = $this->report->get_inventory_by_state('kg', $this->state);
        $data['inventory_bt'] = $this->report->get_inventory_by_state('bt', $this->state);


//        $data['kpi_quarterly'] = $this->report->get_sasaran_sukuan(); //Q1 + Q2 + Q3 + Q4

        $data['quarterly_kpi_kks'] = $this->report->get_kpi_quarterly_by_quarter($quarter, 'kks', $this->state, $year);
        $data['quarterly_kpi_kg'] = $this->report->get_kpi_quarterly_by_quarter($quarter, 'kg', $this->state, $year);
        $data['quarterly_kpi_bt'] = $this->report->get_kpi_quarterly_by_quarter($quarter, 'bt', $this->state, $year);

//        $data['sasaran_tahunan_kks'] = $this->report->get_sasaran_tahunan();
//        $data['sasaran_tahunan_kg'] = $this->report->get_sasaran_tahunan();
//        $data['sasaran_tahunan_bt'] = $this->report->get_sasaran_tahunan();

        $data['sasaran_q1'] = $this->report->get_sasaran_by_quarter(1); //QUARTER 1, QUARTER 2, Q3, Q4
        $data['sasaran_q2'] = $this->report->get_sasaran_by_quarter(2);
        $data['sasaran_q3'] = $this->report->get_sasaran_by_quarter(3);
        $data['sasaran_q4'] = $this->report->get_sasaran_by_quarter(4);

//        $data['sasaran_bulan_kks'] = $this->report->get_sasaran_bulan(2, 'kks', $month, $year='2018');
//        $data['sasaran_bulan_kg'] = $this->report->get_sasaran_bulan(2, 'kg', $month, $year='2018');
//        $data['sasaran_bulan_bt'] = $this->report->get_sasaran_bulan(2, 'bt', $month, $year='2018');

        foreach ($data['list_of_sic'] as $sic) {
            $data['quarterly_kpi_' . $sic->SIC] = $this->report->get_kpi_quarterly_by_quarter($quarter, $sic->SIC, $this->state);
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_state($sic->SIC, $this->state);
            //Pencapaian FI
            $data['bp_' . $sic->SIC] = $this->report->get_bp_byQuarter($quarter, $this->state, $sic->SIC, $year);
            $data['bl_' . $sic->SIC] = $this->report->get_bl_byQuarter($quarter, $this->state, $sic->SIC, $year);

            //Pencapaian Desktop
            $data['bpd_' . $sic->SIC] = $this->report->get_bpd_byQuarter($quarter, $this->state, $sic->SIC, $year);
            $data['bd_' . $sic->SIC] = $this->report->get_bd_byQuarter($quarter, $this->state, $sic->SIC, $year);
            $data['sasaran_quarter_' . $sic->SIC] = $this->report->get_kpi_quarterly_by_quarter($quarter, $sic->SIC, $this->state, $year);

            if (isset($data['sasaran_quarter_' . $sic->SIC])) {
                $sasaranNotSet[] = 'true';
            } else {
                $sasaranNotSet[] = 'false';
            }
        }

        //pencapaian FI
        $data['bp_kks'] = $this->report->get_bp_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bl_kks'] = $this->report->get_bl_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bp_kg'] = $this->report->get_bp_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bl_kg'] = $this->report->get_bl_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bp_bt'] = $this->report->get_bp_byQuarter($quarter, $this->state, $kat = 42, $year);
        $data['bl_bt'] = $this->report->get_bl_byQuarter($quarter, $this->state, $kat = 42, $year);
        //Pencapaian Desktop
        $data['bpd_kks'] = $this->report->get_bpd_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bd_kks'] = $this->report->get_bd_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bpd_kg'] = $this->report->get_bpd_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bd_kg'] = $this->report->get_bd_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bpd_bt'] = $this->report->get_bpd_byQuarter($quarter, $this->state, $kat = 42, $year);
        $data['bd_bt'] = $this->report->get_bd_byQuarter($quarter, $this->state, $kat = 42, $year);

        //$this->output->enable_profiler(true);
        //$this->viewit('kpi/quarterly_report_kpi', $data);
        if ($data['quarterly_kpi_kks'] && $data['quarterly_kpi_kg'] && $data['quarterly_kpi_bt']) { //&& !in_array('false', $sasaranNotSet)
            $this->viewit('kpi/quarterly_report_kpi', $data);
//            echo '<pre>';
//            print_r($sasaranNotSet);
//            echo '</pre>';
        } else {
            $data['rpt_not_available'] = true;
            $this->viewit('kpi/quarterly_rpt_list', $data);
        }
    }

    public function view_quarterly_xls($quarter = 1, $year = 2018, $state = 2) {
        $data['target_quarter'] = $quarter;
        $data['list_of_sic'] = $this->report->get_sic();
        $data['inventory_kks'] = $this->report->get_inventory_by_state('kks', $this->state);
        $data['inventory_kg'] = $this->report->get_inventory_by_state('kg', $this->state);
        $data['inventory_bt'] = $this->report->get_inventory_by_state('bt', $this->state);


//        $data['kpi_quarterly'] = $this->report->get_sasaran_sukuan(); //Q1 + Q2 + Q3 + Q4

        $data['quarterly_kpi_kks'] = $this->report->get_kpi_quarterly_by_quarter($quarter, 'kks', $this->state, $year);
        $data['quarterly_kpi_kg'] = $this->report->get_kpi_quarterly_by_quarter($quarter, 'kg', $this->state, $year);
        $data['quarterly_kpi_bt'] = $this->report->get_kpi_quarterly_by_quarter($quarter, 'bt', $this->state, $year);

//        $data['sasaran_tahunan_kks'] = $this->report->get_sasaran_tahunan();
//        $data['sasaran_tahunan_kg'] = $this->report->get_sasaran_tahunan();
//        $data['sasaran_tahunan_bt'] = $this->report->get_sasaran_tahunan();

        $data['sasaran_q1'] = $this->report->get_sasaran_by_quarter(1); //QUARTER 1, QUARTER 2, Q3, Q4
        $data['sasaran_q2'] = $this->report->get_sasaran_by_quarter(2);
        $data['sasaran_q3'] = $this->report->get_sasaran_by_quarter(3);
        $data['sasaran_q4'] = $this->report->get_sasaran_by_quarter(4);

//        $data['sasaran_bulan_kks'] = $this->report->get_sasaran_bulan(2, 'kks', $month, $year='2018');
//        $data['sasaran_bulan_kg'] = $this->report->get_sasaran_bulan(2, 'kg', $month, $year='2018');
//        $data['sasaran_bulan_bt'] = $this->report->get_sasaran_bulan(2, 'bt', $month, $year='2018');

        foreach ($data['list_of_sic'] as $sic) {
            $data['quarterly_kpi_' . $sic->SIC] = $this->report->get_kpi_quarterly_by_quarter($quarter, $sic->SIC, $this->state);
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_state($sic->SIC, $this->state);
            //Pencapaian FI
            $data['bp_' . $sic->SIC] = $this->report->get_bp_byQuarter($quarter, $this->state, $sic->SIC, $year);
            $data['bl_' . $sic->SIC] = $this->report->get_bl_byQuarter($quarter, $this->state, $sic->SIC, $year);

            //Pencapaian Desktop
            $data['bpd_' . $sic->SIC] = $this->report->get_bpd_byQuarter($quarter, $this->state, $sic->SIC, $year);
            $data['bd_' . $sic->SIC] = $this->report->get_bd_byQuarter($quarter, $this->state, $sic->SIC, $year);
            $data['sasaran_quarter_' . $sic->SIC] = $this->report->get_kpi_quarterly_by_quarter($quarter, $sic->SIC, $this->state, $year);
        }

        //pencapaian FI
        $data['bp_kks'] = $this->report->get_bp_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bl_kks'] = $this->report->get_bl_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bp_kg'] = $this->report->get_bp_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bl_kg'] = $this->report->get_bl_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bp_bt'] = $this->report->get_bp_byQuarter($quarter, $this->state, $kat = 42, $year);
        $data['bl_bt'] = $this->report->get_bl_byQuarter($quarter, $this->state, $kat = 42, $year);
        //Pencapaian Desktop
        $data['bpd_kks'] = $this->report->get_bpd_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bd_kks'] = $this->report->get_bd_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bpd_kg'] = $this->report->get_bpd_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bd_kg'] = $this->report->get_bd_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bpd_bt'] = $this->report->get_bpd_byQuarter($quarter, $this->state, $kat = 42, $year);
        $data['bd_bt'] = $this->report->get_bd_byQuarter($quarter, $this->state, $kat = 42, $year);

        //$this->output->enable_profiler(true);
        $this->load->view('kpi/quarterly_report_kpi_xls', $data);
    }

    public function view_quarterly_achievement($quarter, $year = '2018') {
        $data['negeri'] = $this->state_model->get_state_by_code($this->state);
        $data['target_quarter'] = $quarter;
        $data['list_of_sic'] = $this->report->get_sic();
        $data['inventory_kks'] = $this->report->get_inventory_by_state('kks', $this->state);
        $data['inventory_kg'] = $this->report->get_inventory_by_state('kg', $this->state);
        $data['inventory_bt'] = $this->report->get_inventory_by_state('bt', $this->state);


//        $data['kpi_quarterly'] = $this->report->get_sasaran_sukuan(); //Q1 + Q2 + Q3 + Q4

        $data['quarterly_kpi_kks'] = $this->report->get_kpi_quarterly_by_quarter($quarter, 'kks', $this->state, $year);
        $data['quarterly_kpi_kg'] = $this->report->get_kpi_quarterly_by_quarter($quarter, 'kg', $this->state, $year);
        $data['quarterly_kpi_bt'] = $this->report->get_kpi_quarterly_by_quarter($quarter, 'bt', $this->state, $year);

//        $data['sasaran_tahunan_kks'] = $this->report->get_sasaran_tahunan();
//        $data['sasaran_tahunan_kg'] = $this->report->get_sasaran_tahunan();
//        $data['sasaran_tahunan_bt'] = $this->report->get_sasaran_tahunan();

        $data['sasaran_q1'] = $this->report->get_sasaran_by_quarter(1); //QUARTER 1, QUARTER 2, Q3, Q4
        $data['sasaran_q2'] = $this->report->get_sasaran_by_quarter(2);
        $data['sasaran_q3'] = $this->report->get_sasaran_by_quarter(3);
        $data['sasaran_q4'] = $this->report->get_sasaran_by_quarter(4);

//        $data['sasaran_bulan_kks'] = $this->report->get_sasaran_bulan(2, 'kks', $month, $year='2018');
//        $data['sasaran_bulan_kg'] = $this->report->get_sasaran_bulan(2, 'kg', $month, $year='2018');
//        $data['sasaran_bulan_bt'] = $this->report->get_sasaran_bulan(2, 'bt', $month, $year='2018');

        foreach ($data['list_of_sic'] as $sic) {
            $data['quarterly_kpi_' . $sic->SIC] = $this->report->get_kpi_quarterly_by_quarter($quarter, $sic->SIC, $this->state);
            $data['inventory_' . $sic->SIC] = $this->report->get_inventory_by_state($sic->SIC, $this->state);
            //Pencapaian FI
            $data['bp_' . $sic->SIC] = $this->report->get_bp_byQuarter($quarter, $this->state, $sic->SIC, $year);
            $data['bl_' . $sic->SIC] = $this->report->get_bl_byQuarter($quarter, $this->state, $sic->SIC, $year);

            //Pencapaian Desktop
            $data['bpd_' . $sic->SIC] = $this->report->get_bpd_byQuarter($quarter, $this->state, $sic->SIC, $year);
            $data['bd_' . $sic->SIC] = $this->report->get_bd_byQuarter($quarter, $this->state, $sic->SIC, $year);
            $data['sasaran_quarter_' . $sic->SIC] = $this->report->get_kpi_quarterly_by_quarter($quarter, $sic->SIC, $this->state, $year);
        }

        //pencapaian FI
        $data['bp_kks'] = $this->report->get_bp_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bl_kks'] = $this->report->get_bl_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bp_kg'] = $this->report->get_bp_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bl_kg'] = $this->report->get_bl_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bp_bt'] = $this->report->get_bp_byQuarter($quarter, $this->state, $kat = 42, $year);
        $data['bl_bt'] = $this->report->get_bl_byQuarter($quarter, $this->state, $kat = 42, $year);
        //Pencapaian Desktop
        $data['bpd_kks'] = $this->report->get_bpd_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bd_kks'] = $this->report->get_bd_byQuarter($quarter, $this->state, $kat = 41, $year);
        $data['bpd_kg'] = $this->report->get_bpd_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bd_kg'] = $this->report->get_bd_byQuarter($quarter, $this->state, $kat = 40, $year);
        $data['bpd_bt'] = $this->report->get_bpd_byQuarter($quarter, $this->state, $kat = 42, $year);
        $data['bd_bt'] = $this->report->get_bd_byQuarter($quarter, $this->state, $kat = 42, $year);

        //$this->output->enable_profiler(true);
        $this->viewit('kpi/quarterly_achievement_kpi', $data);
    }

    public function sasaranbaru() {
        $this->load->model('Sasaran_model');
        $id = $this->input->post('id');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $data = $this->input->post(); //submit
        $data['id_negeri'] = $this->state;

        if ($id === '') {
            // insert
            if ($this->Sasaran_model->sasaran_already_exist($month, $year, $this->state)) {
                $this->Sasaran_model->insert($data); //save to database
                $this->session->set_flashdata('item', array('message' => 'Record created successfully', 'class' => 'success'));
            } else {
                $this->session->set_flashdata('item', array('message' => 'Record already exists', 'class' => 'danger'));
            }
        } else {
            // update

            if ($this->Sasaran_model->update($data, $id)) {
                $this->session->set_flashdata('item', array('message' => 'Record updated successfully', 'class' => 'success'));
            }
        }

        redirect('kpi/sasaran');
    }

    public function sasaran_form() {
        $this->load->model('Sasaran_model');

        $data['year'] = date('Y');
        $data['month'] = date('n');

        $data['row'] = $this->Sasaran_model;
        $this->viewit('kpi/sasaranbaru', $data);
    }

    public function sasaranupdate($id) {
        $data['row'] = $this->db
                ->get_where('sasaran', "id = $id")
                ->row();

        $data['year'] = $data['row']->year;
        $data['month'] = $data['row']->month;

        print_r($data['row']->month);

        $this->viewit('kpi/sasaranupdate', $data);
    }

    public function sasarandelete($id) {
        $this->db->delete('sasaran', "id = $id");
        redirect('/kpi/sasaran', $data);
    }

    public function pencalonan($rowno = 0) {

        $search_text = '';
        $search_registered = '';

        if ($this->input->post()) {
            $search_text = $this->input->post('search_txt');
            $search_registered = $this->input->post('reg_chk');
            $this->session->set_userdata(array('search' => $search_text));
            $this->session->set_userdata(array('search_reg' => $search_registered));
        } else {
            if ($this->session->userdata('search') != NULL || $this->session->userdata('search_reg')) {
                $search_text = $this->session->userdata('search');
                $search_registered = $this->session->userdata('search_reg');
            }
        }

        $rowperpage = 10;

        $allcount = $this->kpi_model->getPencalonanCount($search_text, $search_registered, $this->state_model->get_state_by_code($this->state), 'Compulsory');
        $data['premis_berdaftar'] = $this->kpi_model->get_list_pencalonan($rowno, $rowperpage, $search_text, $search_registered, $this->state_model->get_state_by_code($this->state), 'Compulsory');

        $this->load->library('pagination');
        $config['base_url'] = base_url('kpi/pencalonan');
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);

        $data['row'] = $rowno;
        $data['search'] = $search_text;

        //$this->output->enable_profiler(true);

        $data['state'] = $this->ref->data('state');
        $this->viewit('kpi/pencalonan', $data);
    }

    public function reset() {
        $this->session->unset_userdata('search');
        $this->session->unset_userdata('search_reg');
        redirect('kpi/pencalonan');
    }

    public function reset_voluntarily() {
        $this->session->unset_userdata('search');
        $this->session->unset_userdata('search_reg');
        redirect('kpi/pencalonan_voluntarily');
    }

    public function cari_premis() {
        $this->session->unset_userdata('success_search');
        $this->session->unset_userdata('err_search');
        //$this->output->enable_profiler(TRUE);
        $namapremis = $this->input->post('namapremis');
        $nofailjas = $this->input->post('nofailjas');
        $negeri = $this->input->post('state');
        $data['premise_info'] = $this->user_model->find_user_by_state($namapremis, $nofailjas, $negeri); ///__betulkan model find_user()

        if ($data['premise_info']) {
            $this->session->set_flashdata('success_search', 'Premise found');
        } else {
            $this->session->set_flashdata('err_search', 'Not found, wrong file no or incorrect premise name');
        }
        $this->viewit('kpi/premis', $data);
    }

    public function pencalonan_voluntarily($rowno = 0) {
        $this->load->model('kpi_model');
        $search_text = '';
        $search_registered = '';

        if ($this->input->post()) {
            $search_text = $this->input->post('search_txt');
            //$search_registered = $this->input->post('reg_chk');
            $this->session->set_userdata(array('search' => $search_text));
            //$this->session->set_userdata(array('search_reg'=>$search_registered));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
                //$search_registered = $this->session->userdata('search_reg');
            }
        }

        $rowperpage = 10;

        $allcount = $this->kpi_model->getPencalonanCount($search_text, $search_registered, $this->state_model->get_state_by_code($this->state), 'Voluntarily');
        $data['premis_berdaftar'] = $this->kpi_model->get_list_pencalonan($rowno, $rowperpage, $search_text, $search_registered, $this->state_model->get_state_by_code($this->state), 'Voluntarily');

        $this->load->library('pagination');
        $config['base_url'] = base_url('kpi/pencalonan_voluntarily');
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $this->pagination->initialize($config);

        $data['row'] = $rowno;
        $data['search'] = $search_text;

        //$this->output->enable_profiler(true);

        $data['state'] = $this->ref->data('state');
        $this->viewit('kpi/pencalonan_voluntarily', $data);
    }

    public function tambah_pencalonan($premisid) {
        $this->load->model('kpi_model');

        $date = $this->input->post('letter_date');
        $ref_no = $this->input->post('letter_ref_no');
        //print_r($this->kpi_model->get_user($premisid));
        //var_dump($this->kpi_model->premiseHasRegistered($premisid));
        //var_dump($this->kpi_model->premiseIsCompulsary($premisid));
        if ($this->kpi_model->premiseHasRegistered($premisid) == false) {

            //if else kalau blum ada dalam table
            $this->kpi_model->add_premise($premisid, $date, $ref_no);
            //$this->output->enable_profiler(TRUE);
            $this->session->set_flashdata('success', 'Compulsory premise added');

            redirect('kpi');
        } else {
            if ($this->kpi_model->premiseIsCompulsary($premisid) == false) {
                $this->kpi_model->update_premise($premisid, $date, $ref_no);
                $this->session->set_flashdata('success', 'Premise status changed to Compulsory');

                $email = $this->user_model->get_premise_info($premisid)->email;
                $this->mylib->send_email_notification('Account Status changed', 'Your account status has been changed to Compulsory. Kindly login to the EMAINS system. Thank you.', $email);
                //echo 'update';
                //redirect('kpi');
            } else {
                $this->session->set_flashdata('err', 'Failed to add, premise already added');
                //echo 'failed';
            }
            redirect('kpi');
        }
        //$this->output->enable_profiler(TRUE);
    }

    public function premis() {
        $this->viewit('kpi/premis');
    }

    public function delete_pencalonan($premisid) {
        //$deleteid = $this->input->post('premisid');
//        if($this->db->get_where('emt', array("premis_id = $premisid"))){
//            echo '<script language="javascript">';
//            echo 'alert("Unable to delete premise. Please contact admin")';
//            echo '</script>';
//        }
//        else{
        $this->db->where('idpremis', $premisid);
        $this->db->update('premis_login', array('submission_type' => 'Voluntarily', 'letter_date' => NULL, 'letter_ref_no' => NULL));
        $verify = $this->db->affected_rows();
        //$this->output->enable_profiler(true);
        //echo $verify;
        $this->pencalonan();

//        }
    }

    public function view_summary() {

        $this->viewit('kpi/summary_list');
    }

    public function summaryByState($state, $year) {
        
    }

    public function pdf() {
        $this->load->library('pdf');
        $this->pdf->load_view('kpi/summary_list');
        $this->pdf->render();
        $this->pdf->stream("report.pdf");
    }

    public function verify() {
        $data['year'] = date('Y');
        $data['state'] = $this->state;

        if ($this->kpi_model->verify_kpi($this->state)) {
            $this->session->set_flashdata('status', array('message' => 'Success! KPI submission for verification.', 'class' => 'alert alert-success fade in'));
        } else {
            $this->session->set_flashdata('status', array('message' => 'Failed! KPI has been verified.', 'class' => 'alert alert-danger fade in'));
        }

        $this->viewit('kpi/kpi_form_verify', $data);
    }

    public function allow_edit($state) {
        if ($this->role == 'ADM') {

            $this->db->delete('monthly_kpi_status', array('state_code' => $state, 'year' => date('Y'), 'verify' => 1));
            redirect('kpi/monthly_kpi');
        } else {
            $this->viewit('NotAuthorized');
        }
    }
    
    public function list_premises_bm()
    {
        $data['from'] = $from = $this->input->post('from'); //to pass date from & to to view
        $data['to'] = $to = $this->input->post('to');
        $data['from_month'] = $this->input->post('from_month');
        $data['to_month'] = $this->input->post('to_month');
        $data['from_year'] = $this->input->post('from_year');
        $data['to_year'] = $this->input->post('to_year');
        $data['state_code'] = $this->input->post('state_code');
        
        $this->viewit('kpi/monthly_list_premises_bm', $data);
        
    }

    public function json_bm_list($state_code, $from, $to)
    {
        $from = $from . '-01';
        $to =  date("Y-m-t", strtotime($to));
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

        $premises = $this->report->get_bm_view($start, $length, $order, $dir, $state_code, $from, $to);
        $total_premises = $this->report->get_bm_total_view($state_code, $from, $to);

        $data = array();

        foreach ($premises->result() as $r) {
            
            if($r->emt_status){
                $emt_status = $this->ref->return_emt_status($r->emt_status);
            } else {
               $emt_status = 'NULL';  
            }
            
            
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

    //TODO :  Modify to enable printing 11/03/2021
    public function list_premises_77()
    {
        $data['from'] = $from = $this->input->post('from'); //to pass date from & to to view
        $data['to'] = $to = $this->input->post('to');
        $data['from_month'] = $this->input->post('from_month');
        $data['to_month'] = $this->input->post('to_month');
        $data['from_year'] = $this->input->post('from_year');
        $data['to_year'] = $this->input->post('to_year');
        $data['state_code'] = $this->input->post('state_code');

        $this->viewit('kpi/monthly_list_premises_bm', $data);

    }
    //TODO :  Modify to enable printing 11/03/2021
    public function json_77_list($state_code, $from, $to)
    {
        $from = $from . '-01';
        $to =  date("Y-m-t", strtotime($to));
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

        $premises = $this->report->get_bm_view($start, $length, $order, $dir, $state_code, $from, $to);
        $total_premises = $this->report->get_bm_total_view($state_code, $from, $to);

        $data = array();

        foreach ($premises->result() as $r) {

            if($r->emt_status){
                $emt_status = $this->ref->return_emt_status($r->emt_status);
            } else {
                $emt_status = 'NULL';
            }


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
}
