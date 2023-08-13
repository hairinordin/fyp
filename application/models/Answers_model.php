<?php

class Answers_Model extends MY_Model {
    
    function get_submission_bak($rowno, $rowperpage, $search='', $state){
        
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
         //$this->db-where('submitted_emt.completed', '0');
         $this->db->limit($rowperpage, $rowno); 
         $query = $this->db->get();
         
         return $query->result();   
    }
    
        function get_submission($rowno, $rowperpage, $search='', $state){
        
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
             $this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }
         //$this->db->join('kpigsr_remark', 'submitted_emt.id = kpigsr_remark.answers_id');  
         $this->db->where('submitted_emt.completed', '0');
         $this->db->limit($rowperpage, $rowno); 
         $query = $this->db->get();
         
         return $query->result();   
    }
    
    function getSubmissionCount($search='', $state){
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
             $this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }
           
         $this->db->where('submitted_emt.completed', '0');
         $query = $this->db->get();
         
         return $query->num_rows();
    }
    //List of premise dah register
    public function get_premises($start, $length, $order, $dir, $state_code) {
        $this->load->model('ref_model');
        $state_descr = $this->ref_model->return_state($state_code);
        
        if ($order != NULL) {
            $this->db->order_by($order, $dir);
        }
         if($state_code == '16' || $state_code == '14' ){ 
             
             if($state_code == '14'){
            $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
             }
            
        } else {
            $this->db->where('negeri', $state_descr);
        }
        
        //$length = 1000; //There's a problem when querying total no of premis table from EKAS
        $this->db->where('username is NOT NULL', NULL, FALSE);
        return $this->db->limit($length, $start)->get("premis_login");
    }

    public function get_premises2($start, $length, $order, $dir,$state_code) {
        if ($order != NULL) {
            $this->db->order_by($order, $dir);
        }   
         if($state_code != '16'){ 
            $this->load->model('ref_model');
            $state_descr = $this->ref_model->return_state($state_code);
        
            $this->db->where('negeri', $state_descr);
        }
       
        $where = "(kpigsr_answers.completed != 1 OR kpigsr_answers.completed  IS NULL) ";
        $this->db->where($where);
        $this->db->select('*');
        $this->db->from('premis_login');
        $this->db->join('kpigsr_answers', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left outer ');

        return $this->db->limit($length, $start)->get();
    }

    public function get_total_premises($state_code) {
        $this->load->model('ref_model');
        $state_descr = $this->ref_model->return_state($state_code);
        
         if($state_code == '16' || $state_code == '14' ){
             
             if($state_code == '14'){
              $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
             }
        } else {
            $this->db->where('negeri', $state_descr);
        }
        
        $this->db->where('username is NOT NULL', NULL, FALSE);
        
        $query = $this->db->select("COUNT(*) as num")->get("premis_login");
        $result = $query->row();
        if (isset($result)) {
            return $result->num;
        }
        return 0;
    }

    //TESTING TABLE
    public function get_view($start, $length, $order, $dir, $state_code) { //List of premise dah beri feedback
        
        $this->load->model('ref_model');
        $state_descr = $this->ref_model->return_state($state_code);
        
        if ($order != NULL) {
            $this->db->order_by($order, $dir);
        }
         if($state_code == '16' || $state_code == '14' ){ 
             if($state_code == '14'){
              $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
             }
            
        } else {
            $this->db->where('negeri', $state_descr);
        }
        //$length = 1000; //There's a problem when querying total no of premis table from EKAS
        return $this->db->limit($length, $start)->get("submitted_emt");
    }

    public function get_total_view($state_code) {
         $this->load->model('ref_model');
        $state_descr = $this->ref_model->return_state($state_code);
        
         if($state_code == '16' || $state_code == '14' ){ 
              if($state_code == '14'){
            $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
              }
        } else {
            $this->db->where('negeri', $state_descr);
            
        }
        $query = $this->db->select("COUNT(*) as num")->get("submitted_emt");
        $result = $query->row();
        if (isset($result)) {
            return $result->num;
        }
        return 0;
    }
    
     //COMPLETED TABLE
    public function get_completed_view($start, $length, $order, $dir, $state_code) { //List of premise dah completed
         $this->load->model('ref_model');
        $state_descr = $this->ref_model->return_state($state_code);
        
        if ($order != NULL) {
            $this->db->order_by($order, $dir);
        }
         if($state_code == '16' || $state_code == '14' ){ 
             if($state_code == '14'){
              $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
             }            
        } else {
            $this->db->where('negeri', $state_descr);
        }
        //$length = 1000; //There's a problem when querying total no of premis table from EKAS
        return $this->db->limit($length, $start)->get("completed_emt");
    }

    public function get_completed_total_view($state_code) {
         $this->load->model('ref_model');
        $state_descr = $this->ref_model->return_state($state_code);
        
         if($state_code == '16' || $state_code == '14' ){ 
              if($state_code == '14'){
            $this->db->where('negeri', 'W.P PUTRAJAYA'); 
            $this->db->or_where('negeri', 'W.P KUALA LUMPUR');
              }
        } else {
            $this->db->where('negeri', $state_descr);
        }
        $query = $this->db->select("COUNT(*) as num")->get("completed_emt");
        $result = $query->row();
        if (isset($result)) {
            return $result->num;
        }
        return 0;
    }
    
    public function set_doe_answers($answers_id, $data){  
        $this->db->where('id', $answers_id);
        $this->db->update('kpigsr_tool_answers', $data); 
        
    }
    
    public function set_emt_status($id, $action){
        $this->db->where('id', $id);
        $this->db->update('kpigsr_answers', array('emt_status' => $action)); 
    }
    
     public function set_emt_reviewed_by($id, $user){ //officer name
        $this->db->where('id', $id);
        $this->db->update('kpigsr_answers', array('reviewed_by' => $user)); 
    }
    
    public function get_answertbl_id($idpremise){
        $this->db->where('idpremise', $idpremise);
        $this->db->where('completed', 0);
        return  $this->db->get('kpigsr_answers')->row()->id;
    }
    
    public function get_compliance($idpremise){
        $this->db->where('idpremise', $idpremise);
        return  $this->db->get('kpigsr_rules_compliance')->row();
    }
    
    public function get_emt_verification_type($emt_id){
        $this->db->where('id', $emt_id);
        
        return $this->db->get('kpigsr_answers')->row()->verification_type;
    }
    
    public function set_emt_verification_type($emt_id, $type){
        $this->db->where('id', $emt_id);
        $this->db->update('kpigsr_answers', array('verification_type' => $type)); 
    }
    
    public function get_review_by_id($emt_id){
        $this->db->select('*');
        $this->db->from('kpigsr_review_answers');
        $this->db->where('emt_id', $emt_id);
 
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function isAssessmentComplete($emt_id){
        /*
         * Compare table review_answers dengan last question id...
         * kalau ada, maksudnya dah bagi markah sampai akhir,
         * dan disable continue validate tu...
         */
        
        $this->db->where('emt_id', $emt_id);
        $this->db->where('id_question', 123); //Last question id = 123
        
        $query = $this->db->get('kpigsr_review_answers');
        
        if($query->num_rows() < 1){
            return false;
        }
         
        return true;   
        
    }
    
        public function isAssessmentCompleteRevised($emt_id, $tool_no){
        /*
         * Compare table review_answers dengan setiap tool...
         * kalau ada, maksudnya dah bagi assess tool tu,
         * (setiap tool kalau tak complete tak boleh submit)
         */
        
        $this->db->where('emt_id', $emt_id);
        $this->db->where('tool_id', $tool_no);
        
        $query = $this->db->get('kpigsr_review_answers');
        
        if($query->num_rows() < 1){
            return false;
        }
         
        return true;       
    }

}
