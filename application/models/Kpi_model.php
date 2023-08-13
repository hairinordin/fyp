<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kpi_model extends CI_Model {

    public function get_all_user() { //dapatkan semua user yang tercalon :: TABLE premis_login
        $query = $this->db->get('premis_login');

        return $query->result();
    }

    public function get_user($premisid) {
        $ekasdb = $this->load->database('ekas', TRUE);
        $ekasdb->where('IDPREMIS', $premisid);

        $result = $ekasdb->get('premis');

        return $result->row();
    }

    function premiseHasRegistered($idpremis) {
        $this->db->where('idpremis', $idpremis);
        
        $query = $this->db->get('premis_login');
        if($query->num_rows() > 0 ){
           return true; 
        }
       
        return false; 
    }
    
    function premiseIsCompulsary($idpremis) {
        $this->db->where('idpremis', $idpremis);
        $this->db->where('submission_type', 'Compulsory');
        
        $query = $this->db->get('premis_login');
        if($query->num_rows() > 0 ){
           return true; 
        }
       
        return false;
    }

    function get_list_pencalonan($rowno, $rowperpage, $search = '', $reg = '', $state, $type ='Compulsory') {

        $this->db->select('*');
        $this->db->from('premis_login');
        $this->db->where('submission_type', $type);

        if ($state != 'W.P PUTRAJAYA') {
            $this->db->where('negeri', $state);
        }

        if ($reg == 'yes') {
            $this->db->where('username IS NOT NULL', null, false);
            if ($search != '') {
                $this->db->like('namapremis', $search);
                //$this->db->or_like('alamat', $search);
                //$this->db->or_like('bandar', $search);
            }
        } else if ($reg == 'no') {
            $this->db->where('username IS NULL', null, false);
            if ($search != '') {
                $this->db->like('namapremis', $search);
                //$this->db->or_like('alamat', $search);
                //$this->db->or_like('bandar', $search);
            }
        } else {
             if ($search != '') {
                $this->db->like('namapremis', $search);
                //$this->db->or_like('alamat', $search);
                //$this->db->or_like('bandar', $search);
            }
        }
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result();
    }

    function getPencalonanCount($search = '', $reg = '', $state, $type='Compulsory') {
        $this->db->select('*');
        $this->db->from('premis_login');
        $this->db->where('submission_type', $type);

        if ($state != 'W.P PUTRAJAYA') {
            $this->db->where('negeri', $state);
        }

        if ($search != '' || $reg != '') {
            $this->db->like('namapremis', $search);
            //$this->db->or_like('alamat', $search);
            //$this->db->or_like('bandar', $search);

            if ($reg == 'yes') {
                $this->db->where('username IS NOT NULL', null, false);
            } else if ($reg == 'no') {
                $this->db->where('username IS NULL', null, false);
            }
        }



        $query = $this->db->get();

        return $query->num_rows();
    }
   

    public function add_premise($premisid, $letter_date, $ref_no) {

        $premise_info = $this->get_user($premisid);

        if (!$premise_info) {
            return false;
        }

        var_dump($premise_info);
        $this->load->library('mylib');

        $kod_kategori = $this->mylib->kategoriPremis($premise_info->msicseksyen, $premise_info->msicperkara, $premise_info->sic, $premise_info->kategori_premis);

        $this->load->model('state_model');
        $state = $this->state_model->get_state_by_code($premise_info->PKODNEGERI);
        $city = $premise_info->PKODBANDAR;
        $parliament = $this->state_model->get_parliament_by_code($premise_info->PARLIMEN);

        $data = array(
            'idpremis' => $premise_info->IDPREMIS,
            'nofaildoe' => $premise_info->NOFAILJAS,
            'namapremis' => $premise_info->NAMAPREMIS,
            'no_roc' => $premise_info->NAMAPREMIS,
            'alamat' => $premise_info->PALAMAT,
            'poskod' => $premise_info->PPOSKOD,
            'parlimen' => $parliament,
            'negeri' => $state,
            'bandar' => $city,
            'telefon' => $premise_info->PNOTELEFON,
            'faks' => $premise_info->PNOFAKS,
            'kod_kategori' => $kod_kategori,
            'kategori_premis' => $premise_info->KATEGORIPREMIS,
            'sic' => $premise_info->SIC,
            'subsic' => $premise_info->SUB_SIC,
            'sisa_pepejal' => $premise_info->SISA_PEPEJAL,
            'effluent' => $premise_info->EFFLUENT,
            'tertakluk_eff' => $premise_info->TERTAKLUK_EFF,
            'sewage' => $premise_info->SEWAGE,
            'tertakluk_kum' => $premise_info->TERTAKLUK_KUM,
            'pub' => $premise_info->PUB,
            'tertakluk_pub' => $premise_info->TERTAKLUK_PUB,
            'bt' => $premise_info->BT,
            'kg' => $premise_info->KG,
            'kks' => $premise_info->KKS,
            'pydt_bt' => $premise_info->PYDT_BT,
            'tidak_kaitan' => $premise_info->TIDAK_KAITAN,
            'submission_type' => 'Compulsory',
            'submission_due_date' => date("Y-m-d", strtotime("+1 months", strtotime($letter_date))),
            'letter_date' => $letter_date,
            'letter_ref_no' => $ref_no
        );

        $this->db->insert('premis_login', $data);

        return true;
    }
    
    public function update_premise($premisid, $letter_date, $ref_no) {

        $data = array(
            'submission_type' => 'Compulsory',
            'submission_due_date' => date("Y-m-d", strtotime("+1 months", strtotime($letter_date))),
            'letter_date' => $letter_date,
            'letter_ref_no' => $ref_no
        );
        
        $this->db->where('idpremis', $premisid);
        
        if($this->db->update('premis_login', $data)){
            return true;
        } 
    }
    
    public function get_rating_view($start, $length, $order, $dir, $state_code) { //List of premise dah completed
        if ($order != NULL) {
            $this->db->order_by($order, $dir);
        }
         if($state_code != '16'){ 
            $this->load->model('ref_model');
            $state_descr = $this->ref_model->return_state($state_code);
        
            $this->db->where('negeri', $state_descr);
        }
        //$length = 1000; //There's a problem when querying total no of premis table from EKAS
        return $this->db->limit($length, $start)->get("completed_emt");
    }
    
    public function get_rating_total_view($state_code) {
         if($state_code != '16'){ 
            $this->load->model('ref_model');
            $state_descr = $this->ref_model->return_state($state_code);
        
            $this->db->where('negeri', $state_descr);
        }
        $query = $this->db->select("COUNT(*) as num")->get("completed_emt");
        $result = $query->row();
        if (isset($result)) {
            return $result->num;
        }
        return 0;
    }
    
    function verify_kpi($state){
        $data = array(
            'verify' => 1,
            'state_code' => $state,
            'year' => date('Y')
        );
        
        $this->db->where('state_code', $state);
        $this->db->where('year', date('Y'));
        $this->db->where('verify', 1);
        
        $query = $this->db->get('monthly_kpi_status');
        
        if($query->num_rows() > 0 ){ //KPI dah ada dan verify = true
           return false;
        }
        
        $this->db->insert('monthly_kpi_status', $data); 
           
        return true; 
    }
      
    function isKpiVerify($state){
        $this->db->where('state_code', $state);
        $this->db->where('year', date('Y'));
        $this->db->where('verify', 1);
        
        $query = $this->db->get('monthly_kpi_status');
        
        if($query->num_rows() > 0 ){ //KPI dah ada dan verify = true
           return true;
        }
        
        return false;
    }
    

}
