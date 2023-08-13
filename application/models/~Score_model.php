<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Score_model extends MY_Model { 
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_score_by_tool($idpremise , $tool_id){
        $this->db->select('*');
        $this->db->from('kpigsr_score');
        $this->db->where('idpremise', $idpremise);
        $this->db->where('tool_id', $tool_id);
        $query = $this->db->get();
        
        if ($query->num_rows() < 1) {

            return false;
        }

        return $query->result();    
    }
    
    public function get_all_score($idpremise){
        $this->db->select('*');
        $this->db->from('kpigsr_score');
        $this->db->where('idpremise', $idpremise);
        $query = $this->db->get();
        
        if ($query->num_rows() < 1) {

            return false;
        }

        return $query->result();
   }
    
    public function get_answered_premises(){

        $this->db->select('*');
        $this->db->from('kpigsr_answers ans');
        $this->db->join('premis_login login', 'ans.idpremise = login.idpremis', 'left');
        $query = $this->db->get();
        
        if ($query->num_rows() < 1) {

            return false; //if no row return-meaning that premise id has not been registered before
        }

        return $query->result();     
    }
    
    public function get_answered_tool($premiseid){
        $this->db->distinct();
        $this->db->select('tool_id');
        $this->db->from('kpigsr_tool_answers');
        $this->db->where('idpremise', $premiseid);
        $query = $this->db->get();
        
        if ($query->num_rows() < 1) {

            return false; //if no row return-meaning that premise has not answered any tools yet
        }

        return $query->result();
        
    }
    public function calculate_DOE_score($idpremise, $tool_no){
        $this->db->select_sum('doe_score');
        $this->db->where('idpremise', $idpremise);
        $this->db->where('tool_id', $tool_no);
        return $this->db->get('kpigsr_tool_answers')->row();
    }
}
