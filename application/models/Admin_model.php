<?php
class Admin_model extends MY_Model {
    public $name;
    public $username;
    public $pwd;
    public $email;
    public $role;
    public $state;
    public $id;
    
    public function login_user($username, $password) {
        $this->db->where('username', $username);
        $rs = $this->db->get('admin');
        $row = $rs->row();
        
        if (! $row) {
            // tiada rekod ditemui
            return false;
        }
        
        $db_pwd = $rs->row()->pwd;

        if (password_verify($password, $db_pwd)) {
            return $row; // login ok
        } else {
            return FALSE; // login x ok
        }
    }
    
    public function get_kategori($idpremis){
        $sql = "SELECT kategori_premis, sic, subsic FROM premis_login where idpremis = ?";
        $query = $this->db->query($sql,array($idpremis) );
        return $query->row();
    }
    
    public function ifUserNotExists($username){
        
        $this->db->where('username', $username);
        $query = $this->db->get('admin');

        if ($query->num_rows() > 0) {
            
            return false;
        }
        
        return true;    
    }
    
    //DOE
    public function get_users($rowno, $rowperpage, $search=''){
        $this->db->select('*');
        $this->db->from('admin');

        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('name', $search);
        }

        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();

        return $query->result();   
    }
    //DOE
    public function getUsersCount($search=''){
        $this->db->select('*');
        $this->db->from('admin');
        
        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('name', $search);
        }
        
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    //Industry
    public function get_users_industry($rowno, $rowperpage, $search=''){
        $this->db->select('*');
        $this->db->from('premis_login');

        if($search != ''){
          $this->db->like('namapremis', $search);
          $this->db->or_like('username', $search);
        }

        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();

        return $query->result();   
    }
    //Industry
    public function getUsersIndustryCount($search=''){
        $this->db->select('*');
        $this->db->from('premis_login');
        
        if($search != ''){
          $this->db->like('namapremis', $search);
          $this->db->or_like('username', $search);
        }
        
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    public function get_industry_byId($id){
        $this->db->select('*');
        $this->db->from('premis_login');
        $this->db->where('id', $id);
        
        $query = $this->db->get();

        return $query->row();   
    }
    
    function update_user_email($id, $email, $byWho){
        $this->db->where('id', $id);
        $this->db->update('premis_login', array('email' => $email, 'updated_by' => $byWho, 'updated_on' => date('Y-m-d H:i:s'))); 
    }
    
    public function get_email_byId($id){
        $this->db->select('*');
        $this->db->from('premis_login');
        $this->db->where('id', $id);
        
        $query = $this->db->get();

        return $query->row()->email;   
    }
    
    function get_id_byUsername($uid){
        $this->db->where('username', $uid);
        $query = $this->db->get('admin');
        
        return $query->row()->id;
    }
    
    
}