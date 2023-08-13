<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class State_model extends MY_Model { 
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_state_by_code($state_code){
     
       $query = $this->db->get_where('negeri', array('KOD_NEGERI' => $state_code));
       
       return  $query->row()->NEGERI;
       
    }
    
    public function get_state_code($state_code){
     
       $query = $this->db->get_where('negeri', array('KOD_NEGERI' => $state_code));
       
       return  $query->row()->KOD_NEGERI;
       
    }
    
//    public function get_city_by_code($city_code){
//     
//       $query = $this->db->get_where('bandar', array('KOD_BANDAR' => $city_code));
//       
//       return  $query->row()->BANDAR;
//       
//    }
    
    public function get_parliament_by_code($parliament_code){
     
       $query = $this->db->get_where('parlimen', array('KOD_PAR' => $parliament_code));
       
       return  $query->row()->KAWASAN_PAR;
       
    }
}