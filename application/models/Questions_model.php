<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Questions_model extends MY_Model { 
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_tool_id($data){
        
        $this->db->select('id, id_tool'); 
        $this->db->where_in('id', $data);
        
        $query = $this->db->get('kpigsr_questions');
        
        return $query->result_array();
        
    }
//    public function insert_answer($data){
//        $this->db->insert('kpigsr_answers', $data);
//    }
//    
//    public function insert_tool($data){
//        $this->db->insert('kpigsr_tool', $data);
//    }
//    
//    public function insert_subject($data){
//        $this->db->insert('kpigsr_subject', $data);
//    }
//    
//    public function insert_attachment($data){
//        $this->db->insert('kpigsr_attachment', $data);
//    }
//    
//    public function insert_status($data){
//        $this->db->insert('kpigsr_status', $data);
//    }
//    
//    public function get()
    public function set_attachments($data) {
        $this->db->insert('kpigsr_attachment', $data);
        return true;
    }
    
    public function get_attachments($idpremis){
        $this->db->select('*');
        $this->db->where('idpremise', $idpremis); 
        
        $query = $this->db->get('kpigsr_attachment');
        
         if ($query->num_rows() < 1) {

            return false; 
        }

            return $query->result();
    }
    
    public function get_tool_status($idpremis){
        $this->db->select('*');
        $this->db->where('idpremise', $idpremis); 
        
        $query = $this->db->get('kpigsr_answers');
        
         if ($query->num_rows() < 1) {

            return false; 
        }

            return $query->result();
        
    }
    
    public function set_started_date($idpremis){
        
        $data = array(
            'premiseid' => $idpremis,
            'date_started' => date("Y/m/d"),
            'info' => 'Start EMT'
        );
        
        if($this->db->insert('kpigsr_audit_premise', $data)){
            return true;
        }
    }
    
    public function get_score($id){
        $this->db->select_sum('score');
        $this->db->where_in('id', $id);
      
        $query = $this->db->get('kpigsr_questions');
        
        $score = intval($query->row()->score);
       
        return $score;
    }

      public function get_answers_by_id($idpremise, $emt_id){
        $this->db->select('*');
        $this->db->from('view_answers');
        $this->db->where('emt_id', $emt_id);
        //$this->db->where('completed', 0);
        //$this->db->join('kpigsr_tool_answers', 'kpigsr_answers.idpremise = kpigsr_tool_answers.idpremise');
        $this->db->where('idpremise', $idpremise);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_answers_by_id_no_answers($idpremise, $emt_id){ //untuk case yang tidak ada jawapan diberikan pada emt
        $this->db->select('*');
        $this->db->from('view_answers');
        $this->db->where('idpremise', $idpremise);
        $query = $this->db->get();
        
        return $query->result();
    }

}
