<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ref_model extends MY_Model {
    public function data($cat) {
        $rows = $this->db->where('cat', $cat)->get('ref')->result();
        $arr = [];
        foreach ($rows as $row) {
            $arr[$row->code] = $row->descr;
        }
        return $arr;
    }
    
    public function return_state($state_code){
        $this->db->where('code', $state_code);
        $this->db->where('cat', 'state');
        return $this->db->get('ref')->row()->descr;
    }
    
    public function return_month($month_code){
        $this->db->where('code', $month_code);
        $this->db->where('cat', 'month');
        return $this->db->get('ref')->row()->descr;
    }
    
    public function return_emt_status($status_code){// for doe view
        $this->db->where('status_id', $status_code);     
        return $this->db->get('status_emt')->row()->definition_status;  
    }
    
    public function return_emt_status_premise($status_code){ // for premises view
        
        if($status_code == 4 || $status_code == 5 || $status_code == 6 || $status_code == 7 || $status_code == 8 || $status_code == 9 || $status_code == 12){
            return 'Being Review';
        } else {
            $this->db->where('status_id', $status_code);
            return $this->db->get('status_emt')->row()->definition_status;
        }
        
    }
}