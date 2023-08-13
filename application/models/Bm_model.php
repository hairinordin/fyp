<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bm_model extends CI_Model {
    
    public function set_counter($idpremis, $emt_id){
                
        $data = array(
            'idpremis' => $idpremis,
            'emt_id' => $emt_id,
            'created_on' => date('Y-m-d')
        );
        
        if($this->db->insert('kpigsr_bm', $data)){
            return true;
            
        } return false;
    }
    
    public function bm_wujud($idpremis){
        
        $this->db->where('idpremis', $idpremis);
        $query = $this->db->get('kpigsr_bm');
    
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }    
}