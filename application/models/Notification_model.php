<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Notification_model extends MY_Model { 
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_distinct_send_mail(){
        return $this->db->query('SELECT DISTINCT idpremis FROM `kpigsr_email_sent`')->result();
         
    }
    function get_premises($rowno, $rowperpage, $search='', $state){
 
        $this->db->select('*');
        $this->db->from('premis_login');
        $this->db->join('kpigsr_answers', 'kpigsr_answers.idpremise = premis_login.idpremis', 'left outer');
        
        if ($state != 'W.P PUTRAJAYA') {
            $this->db->where('negeri', $state);
        }
        
        $where_username = "username is  NOT NULL";
        $this->db->where($where_username);
        $where_emt_status = "(kpigsr_answers.completed != 1 OR kpigsr_answers.completed IS NULL)";
        $this->db->where($where_emt_status);

        if($search != ''){
             $this->db->like('namapremis', $search);
             $this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }

         $this->db->limit($rowperpage, $rowno); 
         $query = $this->db->get();
         
         return $query->result();   
    }
    
    function get_notifications($rowno, $rowperpage, $search='', $state){
 
        $this->db->select('*');
        $this->db->from('kpigsr_email_sent');
        $this->db->join('premis_login', 'kpigsr_email_sent.idpremis = premis_login.idpremis', 'left');
        
        if ($state != 'W.P PUTRAJAYA') {
            $this->db->where('premis_login.negeri', $state);
        }
        
//        $where_username = "username is  NOT NULL";
//        $this->db->where($where_username);
//        $where_emt_status = "(kpigsr_answers.completed != 1 OR kpigsr_answers.completed IS NULL)";
//        $this->db->where($where_emt_status);

        if($search != ''){
             $this->db->like('namapremis', $search);
             $this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }

         $this->db->limit($rowperpage, $rowno); 
         $query = $this->db->get();
         
         return $query->result();   
    }
    
    function getNotificationByListCount($search='', $state){
        $this->db->select('*');
        $this->db->from('kpigsr_email_sent');
        $this->db->join('premis_login', 'kpigsr_email_sent.idpremis = premis_login.idpremis', 'left');
        
        if ($state != 'W.P PUTRAJAYA') {
            $this->db->where('premis_login.negeri', $state);
        }

        if($search != ''){
             $this->db->like('namapremis', $search);
             $this->db->or_like('alamat', $search);
             $this->db->or_like('bandar', $search);
           }

         $query = $this->db->get();
         
         return $query->num_rows();
    }
    
    function getNotificationCount($search='', $state){
        $this->db->select('*');
        $this->db->from('premis_login'); 
        $this->db->join('kpigsr_answers', 'kpigsr_answers.idpremise = premis_login.idpremis', 'left outer');

        $where_username = "username is  NOT NULL";
        $this->db->where($where_username);
        $where_emt_status = "(kpigsr_answers.completed != 1 OR kpigsr_answers.completed IS NULL)";
        $this->db->where($where_emt_status);
        
         if($state != 'W.P PUTRAJAYA'){           
            $this->db->where('negeri', $state);        
        }
        
        if($search != ''){
             $this->db->like('namapremis', $search);
             $this->db->or_like('alamat', $search);
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
    function insert_remark($data){
       $this->db->insert('kpigsr_remark', $data);
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
}