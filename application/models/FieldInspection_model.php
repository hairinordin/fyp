<?php
class FieldInspection_Model extends MY_Model {
    public function get_fi($rowno, $rowperpage, $search='', $state){
        
        $this->db->select('*');
        $this->db->group_by('fi.idpremis'); 
        $this->db->from('kpigsr_field_inspection fi');
        $this->db->join('premis_login login', 'fi.idpremis = login.idpremis', 'left');
        
        if($state != 'W.P PUTRAJAYA'){           
            $this->db->where('login.negeri', $state);        
        }
        
        if($search != ''){
             $this->db->like('login.namapremis', $search);
             $this->db->or_like('login.alamat', $search);
           }

         $this->db->limit($rowperpage, $rowno); 
         $query = $this->db->get();
         
         return $query->result();   
       }

       public function getFiCount($search='', $state){
           $this->db->select('*');
        $this->db->group_by('fi.idpremis'); 
        $this->db->from('kpigsr_field_inspection fi');
        $this->db->join('premis_login login', 'fi.idpremis = login.idpremis', 'left');
        
        if($state != 'W.P PUTRAJAYA'){           
            $this->db->where('login.negeri', $state);        
        }
        
        if($search != ''){
             $this->db->like('login.namapremis', $search);
             $this->db->or_like('login.alamat', $search);
           }
           
      
        
         $query = $this->db->get();
           
         return $query->num_rows();
       }
}
