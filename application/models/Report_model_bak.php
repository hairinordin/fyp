<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class report_model extends CI_Model {
    
    public function get_premise(){
        $this->db->get('premis_login');
    }
    
    public function get_sic(){
        $this->db->order_by("SIC", "asc"); 
        $query = $this->db->get('sic');
        
        return $query->result();
    }
    
    public function get_kpi_monthly($kat, $negeri, $tahun='2018'){
        $this->db->where('negeri', $negeri);
        $this->db->where('tahun', $tahun);
        $this->db->where('kat_premise', $kat);
        $query = $this->db->get('kpigsr_monthly_rpt');
        
        return $query->result();
    }
    
    public function get_kpi_quarterly($kat, $negeri, $tahun='2018'){
     $this->db->where('negeri', $negeri);
     $this->db->where('tahun', $tahun);
     $this->db->where('kat_premise', $kat);
     $query = $this->db->get('kpigsr_quarterly_rpt');

     return $query->row();
    }
    
    public function get_kpi_quarterly_by_quarter($quarter, $kat, $negeri, $tahun='2018'){
     $this->db->where('negeri', $negeri);
     $this->db->where('tahun', $tahun);
     $this->db->where('kat_premise', $kat);
     $this->db->where('quarter', $quarter);
     $query = $this->db->get('kpigsr_quarterly_rpt');

     return $query->row();
    }
    
    public function get_inventory_by_state($kat,$negeri, $tahun='2018'){
        $this->db->where('state', $negeri);
        $this->db->where('year', $tahun);
        $this->db->where('kat', $kat);
        $query = $this->db->get('kpigsr_inventory');
        
        return $query->row();
    }
    
    public function get_inventory_by_stateEKAS($kat, $kodnegeri){
        $ekasdb = $this->load->database('ekas', TRUE);
        $ekasdb->where('PKODNEGERI', $kodnegeri);
        //$this->db->where('year', $tahun);
        $ekasdb->where('SIC', $kat);
        $ekasdb->where('STATUSPREMIS', 'operasi');
       
        $query = $ekasdb->get('premis');
        
        return $query->num_rows();
    }
    
    public function check_inventory_exists($kat, $negeri, $tahun='2018'){
        $this->db->where('state', $negeri);
        $this->db->where('year', $tahun);
        $this->db->where('kat', $kat);
        $query = $this->db->get('kpigsr_inventory');
        
        if($query->row() > 0){
            return true;
        }
        
        return false;
    }
    
    public function get_sasaran_bulan($state, $kat, $month, $year='2018'){
        $this->db->where('negeri', $state);
        $this->db->where('tahun', $year);
        $this->db->where('bulan', $month);
        $this->db->where('kat_premise', $kat);
        
        $query = $this->db->get('kpigsr_monthly_rpt');
        
         return $query->row();
    }
   
    //
    // Dapatkan Bilangan BM bulan dan tahun semasa by kategori
    //
    public function get_bm_byMonth($state=2, $kat=1, $month=6, $year=2018){
        $this->load->model('state_model');
        $state = $this->state_model->get_state_by_code($state);
        
        $this->db->where($month, 'MONTH(submission_date)' , FALSE);
        
        $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');
        
        $this->db->where('premis_login.negeri', $state);
        $this->db->where_in($year, 'YEAR(kpigsr_answers.submission_date'
                . ')', FALSE);
        $this->db->where('premis_login.sic', $kat);
        
        $query = $this->db->get('kpigsr_answers');
         
         return $query->num_rows();
    }
    //
    // Dapatkan Bilangan BM 7/7 bulan dan tahun semasa by kategori
    //
    public function get_bm_7per7($state=2, $kat=1, $month=6, $year=2018){
        $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');
        $this->db->where('kpigsr_answers.tool1_implementation', 'true');
        $this->db->where('kpigsr_answers.tool2_implementation', 'true');
        $this->db->where('kpigsr_answers.tool3_implementation', 'true');
        $this->db->where('kpigsr_answers.tool4_implementation', 'true');
        $this->db->where('kpigsr_answers.tool5_implementation', 'true');
        $this->db->where('kpigsr_answers.tool6_implementation', 'true');
        $this->db->where('kpigsr_answers.tool7_implementation', 'true');
        $this->db->where('kpigsr_answers.completed', '1');
        $this->db->where($month, 'MONTH(kpigsr_answers.completed_date)' , FALSE);
        
        $this->db->where('premis_login.sic', $kat);
        
        $query = $this->db->get('kpigsr_answers');
         
        return $query->num_rows();
        
    }
    
    public function get_type_of_verification($type,$state=2, $kat=1, $month=6, $year=2018){
        $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');
        $this->db->where('kpigsr_answers.completed', '1');
        $this->db->where('kpigsr_answers.verification_type', $type);
        $this->db->where($month, 'MONTH(kpigsr_answers.completed_date)' , FALSE);
        
        $this->db->where('premis_login.sic', $kat);
        
        $query = $this->db->get('kpigsr_answers');
         
        return $query->num_rows();
    }
    
     public function get_sasaran_sukuan($q=1, $state=2, $kat=1, $year='2018'){
        $this->db->where('negeri', $state);
        $this->db->where('tahun', $year);
        $this->db->where('kat_premise', $kat);
        $this->db->where('quarter', $q);
        
        $query = $this->db->get('kpigsr_quarterly_rpt');
        
         return $query->row();
    }
    
    public function get_sasaran_by_quarter($q, $state=2, $kat=1, $year='2018'){
        $months = array();
        if($q == 1){
            $months = array(1,2,3);
        } elseif($q == 2){
            $months = array(4,5,6);
        } elseif($q == 3){
            $months = array(7,8,9);
        } elseif($q == 4){
            $months = array(10,11,12);
        }
        
        $this->db->select_sum('sasaran_bulan');
        $this->db->where_in('bulan', $months);
        $this->db->where('negeri', $state);
        $this->db->where('tahun', $year);
        $this->db->where('kat_premise', $kat);
        
        $query = $this->db->get('kpigsr_monthly_rpt');
        
        return $query->row()->sasaran_bulan;
    }
    
    public function get_bp_byQuarter($q=2, $state, $kat=41, $year='2018'){
        $months = array();
        if($q == 1){
            $months = array(1,2,3);
        } elseif($q == 2){
            $months = array(4,5,6);
        } elseif($q == 3){
            $months = array(7,8,9);
        } elseif($q == 4){
            $months = array(10,11,12);
        }
        
        $this->load->model('state_model');
        $state = $this->state_model->get_state_by_code($state);
        
        $this->db->distinct();
        $this->db->select('kpigsr_field_inspection.idpremis');
        
        $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_field_inspection.idpremis', 'left');
        
        $this->db->where('premis_login.negeri', $state);
        $this->db->where_in($year, 'YEAR(kpigsr_field_inspection.tarikh_lawatan)', FALSE);
        $this->db->where('premis_login.sic', $kat);
        $this->db->or_where($months, 'MONTH(kpigsr_field_inspection.tarikh_lawatan)' , FALSE);
        
        $query = $this->db->get('kpigsr_field_inspection');
        
        return $query->num_rows();
    }
    
     public function get_bl_byQuarter($q=2, $state, $kat=41, $year='2018'){
        $months = array();
        if($q == 1){
            $months = array(1,2,3);
        } elseif($q == 2){
            $months = array(4,5,6);
        } elseif($q == 3){
            $months = array(7,8,9);
        } elseif($q == 4){
            $months = array(10,11,12);
        }
        
        $this->load->model('state_model');
        $state = $this->state_model->get_state_by_code($state);
//        $this->db->distinct();
//        $this->db->select('kpigsr_field_inspection.idpremis');
        
        $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_field_inspection.idpremis', 'left');
        
        $this->db->where('premis_login.negeri', $state);
        $this->db->where_in($year, 'YEAR(kpigsr_field_inspection.tarikh_lawatan)', FALSE);
        $this->db->where('premis_login.sic', $kat);
        $this->db->or_where($months, 'MONTH(kpigsr_field_inspection.tarikh_lawatan)' , FALSE);
        
        $query = $this->db->get('kpigsr_field_inspection');
        
        return $query->num_rows();
    }
    
    public function get_bpd_byQuarter($q, $state, $kat, $year){
        $months = array();
        if($q == 1){
            $months = array(1,2,3);
        } elseif($q == 2){
            $months = array(4,5,6);
        } elseif($q == 3){
            $months = array(7,8,9);
        } elseif($q == 4){
            $months = array(10,11,12);
        }
        
        $this->load->model('state_model');
        $state = $this->state_model->get_state_by_code($state);
        
        $this->db->distinct();
        $this->db->select('kpigsr_bd_bm_counter.idpremis');
        
        $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_bd_bm_counter.idpremis', 'left');
        
        $this->db->where('premis_login.negeri', $state);
        $this->db->where_in($year, 'YEAR(kpigsr_bd_bm_counter.date)', FALSE);
        $this->db->where('premis_login.sic', $kat);
        $this->db->or_where($months, 'MONTH(kpigsr_bd_bm_counter.date)' , FALSE);
        
        $query = $this->db->get('kpigsr_bd_bm_counter');
        
        return $query->num_rows();
        
    }
    
    public function get_bd_byQuarter($q, $state, $kat, $year){
        $months = array();
        if($q == 1){
            $months = array(1,2,3);
        } elseif($q == 2){
            $months = array(4,5,6);
        } elseif($q == 3){
            $months = array(7,8,9);
        } elseif($q == 4){
            $months = array(10,11,12);
        }
        
        $this->load->model('state_model');
        $state = $this->state_model->get_state_by_code($state);
        
        //$this->db->distinct();
        //$this->db->select('kpigsr_field_inspection.idpremis');
        
        $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_bd_bm_counter.idpremis', 'left');
        
        $this->db->where('premis_login.negeri', $state);
        $this->db->where_in($year, 'YEAR(kpigsr_bd_bm_counter.date)', FALSE);
        $this->db->where('premis_login.sic', $kat);
        $this->db->or_where($months, 'MONTH(kpigsr_bd_bm_counter.date)' , FALSE);
        
        $query = $this->db->get('kpigsr_bd_bm_counter');
        
        return $query->num_rows();
        
    }
    
    public function get_rpt_year(){
        $this->db->distinct();
        $this->db->select('tahun');
        $query = $this->db->get('kpigsr_monthly_rpt');
                
        return $query->result();
    }
    
    public function get_rpt_month(){
        $this->db->distinct();
        $this->db->select('bulan');
        $query = $this->db->get('kpigsr_monthly_rpt');
                
        return $query->result();
    }
    
    public function count_premise_tool($tool, $implementation, $state, $kat){ //Bil Premis yang ada tool tersebut
        $this->load->model('state_model');
        $state = $this->state_model->get_state_by_code($state);
        
        $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');
        switch($tool){
            case 1 : $this->db->where('kpigsr_answers.tool1_implementation', $implementation); break;
            case 2 : $this->db->where('kpigsr_answers.tool2_implementation', $implementation); break;
            case 3 : $this->db->where('kpigsr_answers.tool3_implementation', $implementation); break;
            case 4 : $this->db->where('kpigsr_answers.tool4_implementation', $implementation); break;
            case 5 : $this->db->where('kpigsr_answers.tool5_implementation', $implementation); break;
            case 6 : $this->db->where('kpigsr_answers.tool6_implementation', $implementation); break;
            case 7 : $this->db->where('kpigsr_answers.tool7_implementation', $implementation); break;
        }
        
        $this->db->where('premis_login.sic', $kat);
        
        $this->db->where('premis_login.negeri', $state);
        
        $query = $this->db->get('kpigsr_answers');
        
        return $query->num_rows();
  
    }
}
