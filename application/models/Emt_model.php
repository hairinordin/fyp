<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class emt_model extends CI_Model {

    public function get_emt_answers($premiseid, $emt_no = "", $emt_type = "") {

        $tableName = 'emt';

        $this->db->where('premis_id', $premiseid);
        if(!empty($emt_no) && !empty($emt_type)){
        $this->db->where('emt_type', $emt_type);
        $this->db->where('emt_no', $emt_no);
        }
        $query = $this->db->get($tableName);

        if ($query->num_rows() < 1) {

            return false; //if no row return-meaning that premise id has not been registered before
        }

        //return $query->row(); before emt and emt_attachement restructured
        //return $query->row();
        return $query->result();
    }
    
    public function get_emt_status($premiseid, $emt_no="", $emt_type = ""){
        $tableName = 'emt';
        $this->db->select('emt_status');
        $this->db->where('premis_id', $premiseid);
        if(!empty($emt_no) && !empty($emt_type)){
        $this->db->where('emt_type', $emt_type);
        $this->db->where('emt_no', $emt_no);
        }
        
        $query = $this->db->get($tableName);
        
        $result = $query->row();
        
        if ($query->num_rows() < 1) {

            return false; 
        }
        
        return $result->emt_status;
    }

    ###############################################

    public function get_emt_attachments($premiseid, $emt_no="", $emt_type = "") {
        $tableName = 'emt_attachments';
        $this->db->where('premise_id', $premiseid);
        if(!empty($emt_no) && !empty($emt_type)){
        $this->db->where('emt_type', $emt_type);
        $this->db->where('emt_no', $emt_no);
        }
        $query = $this->db->get($tableName);

        return $query->result_array();
    }

    ##############################################

    public function set_emt_answers($data, $emt_id='') {
        if(!empty($emt_id)){
            $this->db->where('id', $emt_id);
            $insert_query = $this->db->update('emt', $data);
            
            $last_id = $emt_id;
            $description = 'EMT Updated';
        }else{
            $insert_query = $this->db->insert('emt', $data);
            
            $last_id = $this->db->insert_id();
            $description = 'EMT Submitted';
            
            
        }
        
        $data2 = array(
                   'emt_id' => $last_id,
                   'id_premis' => $data['premis_id'],
                   'description' => $description,
                   'changedate' => date("Y-m-d H:i:s"));
            $this->db->insert('transaksi', $data2);

        return $insert_query;
    }
    
    public function set_emt_attachments($data) {
        $insert_query = $this->db->insert('emt_attachments', $data);
        return true;
    }

}

?>