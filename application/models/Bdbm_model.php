<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class bdbm_model extends CI_Model {
    
    public function set_counter($type, $idpremis, $id_answer){
        
        if($type == 'BD'){
            $type = 'BD';
        }elseif($type == 'BM'){
            $type = 'BM';
        }else{
            return false;
        }
        
        $data = array(
            'idpremis' => $idpremis,
            'id_answer' => $id_answer,
            'type' => $type,
            'date' => date('Y-m-d')
        );
        
        if($this->db->insert('kpigsr_bd_bm_counter', $data)){
            return true;
            
        } return false;
    }
    
    public function bm_wujud($idpremis, $id_answer){
        $this->db->where('idpremis', $idpremis);
        $this->db->where('id_answer', $id_answer);
        $this->db->where('type', 'BM');
        
        $query = $this->db->get('kpigsr_bd_bm_counter');
    
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }    
}