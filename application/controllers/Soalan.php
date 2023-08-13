<?php
class Soalan extends MY_Controller {
    
    public function __construct() {
    parent::__construct();
        // Your own constructor code
        $this->load->model('Soalan_Model');
       
    }
    
    public function kat() {
        $this->viewit('soalan/kat');
    }
    
    public function listing($kat) {
        //$this->output->enable_profiler(TRUE);
        $data['set_soalan'] = $this->Soalan_Model->set_soalan($kat);
        $data['moduls'] = $this->Soalan_Model->get_modul($kat);
        $data['kat'] = $kat;
        
        
       //var_dump($data['set_soalan']);
        $this->viewit('soalan/list', $data);
    }
    
    public function create($kat){
        $data['moduls'] = $this->Soalan_Model->get_modul($kat);
        $data['kat'] = $kat;
        $this->viewit('soalan/form', $data);
    }
    
    public function modul() {
        $data['moduls'] = $this->db->get('soalan_modul')->result();
        //var_dump($data['moduls']);exit;
        $this->viewit('soalan/modul', $data);
    }
    
    // insert & update to table soalan dan soalan_pilihan
    public function save() {
        $kat = $this->input->post('hidden_kat');
       $data_tblSoalan = array (
           'soalan' => $this->input->post('soalan'),
           'id_modul' => $this->input->post('id_modul'), // 1,2,3,4,.....
           'jenis_jawapan' => $this->input->post('jenis_jawapan'),//Option : rb @ cb @ txt
           'ada_catatan' => $this->input->post('ada_ulasan') // Option : Y @ T
       );
       
        $id_soalan = $this->Soalan_Model->soalan_baru($data_tblSoalan);
       
        var_dump($id_soalan);
        //insert into soalan_pilihan
        $myInputs = $this->input->post('myInputs');
       foreach ($myInputs as $eachInput) {
            $data_tblsoalanPilihan = array (
                'id_soalan' => $id_soalan,
                'jawapan' => $eachInput
            );
            
             $this->Soalan_Model->pilihan_soalan_baru($data_tblsoalanPilihan);
        }
        
       $this->listing($kat);
      
    }
    
     public function delete($kat, $id_soalan) {
         $this->db->delete('soalan', array('id' => $id_soalan));
         
         $this->listing($kat);
     }
     
}