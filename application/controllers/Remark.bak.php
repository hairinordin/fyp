<?php

class Remark extends MY_Controller {
    
    public $table = 'kpigsr_tool_answers';
     
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->model('Remark_model');
        $this->load->library('mylib');
        
    }
    
     public function index() {
         
        //$data['tools'] = $this->db->get('kpigsr_tool')->result();
   
        $this->viewit('remark/form');
        
    }
    
    public function submit(){
        
        echo 'Hantar!';
    }
    
}