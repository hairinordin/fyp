<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Remark_model extends MY_Model { 
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_remark_bak($rowno, $rowperpage, $search='', $state){
        
        $this->db->select('`submitted_emt`.id,emt_type, verification_type, emt_status, completed, declaration, submission_date,idpremis,namapremis,
bandar, negeri, parlimen, register_date, submission_type, `kpigsr_remark`.`id` AS `remark_id`, answers_id, idpremise,
officer_remark, suggestion, officer_date, officer_name, remark_to_premise, supervisor_remark, `kpigsr_remark`.action, supervisor_date,
supervisor_name, pelulus_remark, pelulus_action, pelulus_date, pelulus_name');
        $this->db->from('submitted_emt'); 
        
        if($state != 'W.P PUTRAJAYA'){           
            $this->db->where('negeri', $state);        
        }
        
        if($search != ''){
             $this->db->like('namapremis', $search);
             $this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }
         $this->db->join('kpigsr_remark', 'submitted_emt.id = kpigsr_remark.answers_id');  
         $this->db->limit($rowperpage, $rowno); 
         $query = $this->db->get();
         
         return $query->result();   
    }
    
    function get_remark($rowno, $rowperpage, $search='', $state){ //Untuk Pelulus & Penyelia
        
        $this->db->select('*');
        $this->db->from('submitted_emt');
        $this->db->where('completed !=', 1);
        
        if($state == 'W.P PUTRAJAYA' || $state == 'W.P KUALA LUMPUR'){           
            if($state == 'W.P KUALA LUMPUR'){
            $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
            }
        } else {
            $this->db->where('negeri', $state);
        }
        
        if($search != ''){
             $this->db->like('namapremis', $search);
             //$this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }
         
         $this->db->limit($rowperpage, $rowno); 
         $query = $this->db->get();
         
         return $query->result();   
    }
    
    function get_remark_ForPM($rowno, $rowperpage, $search='', $state){ //Untuk Pemeriksa
        
        $this->db->select('*');
        $this->db->from('submitted_emt'); 
                
        if($state == 'W.P PUTRAJAYA' || $state == 'W.P KUALA LUMPUR'){           
            if($state == 'W.P KUALA LUMPUR'){
            $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
            }
        } else {
            $this->db->where('negeri', $state);
        }
        
        if($search != ''){
             $this->db->like('namapremis', $search);
             //$this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }
         
         $this->db->limit($rowperpage, $rowno); 
         $query = $this->db->get();
         
         return $query->result();   
    }
    
    
    function getRemarkCount($search='', $state){
        $this->db->select('*');
        $this->db->from('submitted_emt'); 
        $this->db->where('completed !=', 1);
        
        if($state == 'W.P PUTRAJAYA' || $state == 'W.P KUALA LUMPUR'){           
            if($state == 'W.P KUALA LUMPUR'){
            $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
            }
        } else {
            $this->db->where('negeri', $state);
        }
        
        if($search != ''){
             $this->db->like('namapremis', $search);
             //$this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }
 
         $query = $this->db->get();
         
         return $query->num_rows();
    }
    
        function getRemarkCountForPM($search='', $state){
        $this->db->select('*');
        $this->db->from('submitted_emt'); 
        
       if($state == 'W.P PUTRAJAYA' || $state == 'W.P KUALA LUMPUR'){           
            if($state == 'W.P KUALA LUMPUR'){
            $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
            }
        } else {
            $this->db->where('negeri', $state);
        }
        
        if($search != ''){
             $this->db->like('namapremis', $search);
             //$this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }
 
         $query = $this->db->get();
         
         return $query->num_rows();
    }
    
    function get_tblAnswers_id($idpremise){
        $this->db->where('idpremise', $idpremise);
        //$this->db->where('completed', 0);
        
        return $this->db->get('kpigsr_answers')->row()->id;
    }
    
    function get_tblAnswers_id_not_completed($idpremise){
        $this->db->where('idpremise', $idpremise);
        $this->db->where('completed', 0);
        
        return $this->db->get('kpigsr_answers')->row()->id;
    }
    
    function insert_remark($data){
       $this->db->insert('kpigsr_chat', $data);
    }
    
    function insert_emtAchievement($id,$data){
        $query = $this->db->get_where('emt_achievement', array('answer_id' => $id));
        
        if($query->num_rows() > 0){
            $this->db->where('answer_id', $id);
            $this->db->update('emt_achievement', $data);
        } else {
            $this->db->insert('emt_achievement', $data);
        }
        
    }
    
    function insert_emtAchievement_pn($id,$data){
        $query = $this->db->get_where('emt_achievement_pn', array('answer_id' => $id));
        
        if($query->num_rows() > 0){
            $this->db->where('answer_id', $id);
            $this->db->update('emt_achievement_pn', $data);
        } else {
            $this->db->insert('emt_achievement_pn', $data);
        }    
    }
    
    function insert_comment_for_premise($data){
       $this->db->insert('kpigsr_comment_premise', $data);
    }
    
    function get_emt_status_with_comment($id){
        $this->db->where('emt_id', $id);
        $this->db->where('current_stat', 'complete');
        $query = $this->db->get('kpigsr_comment_premise');
        
        if($query->num_rows() > 0){ //Dah di comment dengan status emt complete
            return true;
        }
        
        return false;
    }
    
    function update_remark($id,$data){
       $this->db->where('answers_id', $id);
       $this->db->update('kpigsr_remark', $data);
    }
    
    function update_emt_status($id, $data){
       $this->db->where('id', $id);
       $this->db->update('kpigsr_answers', $data);
    }
    
    function get_officer_remark($id){
        $this->db->where('answers_id', $id);
        return $this->db->get('kpigsr_remark')->row();
    }
    
    public function get_officer_by_emt_id($id, $role){
        
        if($id){
            $this->db->select('*');
            $this->db->where('emt_id', $id);
            $this->db->where('sender_type', $role);
            $this->db->group_by('sender_id');
            $this->db->order_by('datetime', 'DESC');
            $this->db->limit(1);

            //return $this->db->get('kpigsr_chat')->row()->sender_id;
            $query = $this->db->get('kpigsr_chat');

            if ($query->num_rows() < 1) {
                return false;
            }

            return $query->row()->sender_id; 
        }
        
    }
    
    public function get_PL_decision($emt_id){
        
        $this->db->limit(1);
        $this->db->where('emt_id', $emt_id);
        $this->db->where('sender_type', 'PL');
        $this->db->order_by('datetime', 'DESC');
        
        $query = $this->db->get('kpigsr_chat');
        
        if ($query->num_rows() < 1) {
                return false;
            }

        return $query->row()->suggestion; 
        
    }
    
       public function get_Validate_Date($emt_id){
        
        $this->db->limit(1);
        $this->db->where('emt_id', $emt_id);
        $this->db->where('sender_type', 'PM');
        $this->db->order_by('datetime', 'DESC');
        
        $query = $this->db->get('kpigsr_chat');
        
        if ($query->num_rows() < 1) {
                return false;
            }

        return $query->row()->datetime; 
        
    }
    
    public function commentOnPremiseExists($id){
        $this->db->where('emt_id', $id); 
                
        $query = $this->db->get('kpigsr_comment_premise');
        
        if ($query->num_rows() < 1) {
                return false;
            }

        return true; 
    }
    
    
}