<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Premise extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->theme = 'theme1'; // home_view
    }
    
    public function index(){
         $data['main_view'] = 'managePremise/managePremise';
        $this->load->view($this->theme, $data);
    }
    
    public function listPremisebyState()
    {
        $data['main_view'] = 'managePremise/listPremise';
        $this->load->view($this->theme, $data);
    }
    
    public function setKPI()
    {
        $data['main_view'] = 'managePremise/setKPI';
        $this->load->view($this->theme, $data);
    }
    
    public function manage($idpremis){
        $this->load->model('user_model');
        $premise['premise_info'] = $this->user_model->get_premise_info($idpremis);
        
        $data['paparan_maklumat_syarikat'] = $this->load->view('users/company_info_view', $premise, TRUE);
        
        $this->viewit('premis/doe_manage_premise', $data);
    }
    
    public function sync($idpremis){

            $this->load->model('state_model');
            $this->load->model('user_model');

            // $ekasdb = $this->load->database('ekas', TRUE);
            // $ekasdb->where('IDPREMIS', $idpremis);

            // $query = $ekasdb->get('premis');

            // $ekasinfo = $query->row();

            

            $premise = $this->user_model->get_premise_info($idpremis);
            
            $fromEKAS = $this->user_model->find_user($premise->namapremis, $premise->nofaildoe);
           
            //EKAS4 - PEMATUHAN
            $landfill = 'N';
            $efluen = 'N';
            $tertakluk_eff = 'NULL';
            $kumbahan = 'N';
            $tertakluk_kumbahan = 'NULL';
            $pub = 'N';
            $tertakluk_pub = 'NULL';
            $kg = 'N';
            $kks = 'N';
            $pydt_bt = 'N';
            $landfill = 'N';
            $tidak_kaitan = 'N';
            $bt = 'N';
//            echo '<pre>';
//            print_r($premise->nofaildoe);
//            echo '</pre>';
            
            if(isset($fromEKAS[0]->KATEGORI_PEMATUHAN_DESC->PEMATUHAN)){
                foreach($fromEKAS[0]->KATEGORI_PEMATUHAN_DESC->PEMATUHAN as $patuh){
                
                    if(isset($patuh->landfill) && $patuh->landfill == 1){
                        $landfill = 'Y';
                    }

                    if(isset($patuh->efluen) && $patuh->efluen == 1){
                        $efluen = 'Y';

                        if(isset($patuh->Tertakluk) && $patuh->Tertakluk == 1){
                            $tertakluk_eff = 'T';
                        }
                    }

                    if(isset($patuh->kumbahan) && $patuh->kumbahan == 1){
                        $kumbahan = 'Y';

                        if(isset($patuh->Tertakluk) && $patuh->Tertakluk == 1){
                            $tertakluk_kumbahan = 'T';
                        }
                    }
                    
                    if(isset($patuh->bt) && $patuh->bt == 1){
                        $bt = 'Y';
                    }

                    if(isset($patuh->pub) && $patuh->pub == 1){
                        $pub = 'Y';

                        if(isset($patuh->Tertakluk) && $patuh->Tertakluk == 1){
                            $tertakluk_pub = 'T';
                        }
                    }

                    if(isset($patuh->kg) && $patuh->kg == 1){
                        $kg = 'Y';
                    }

                    if(isset($patuh->kks) && $patuh->kks == 1){
                        $kks = 'Y';
                    }

                    if(isset($patuh->pydt_bt) && $patuh->pydt_bt == 1){
                        $pydt_bt = 'Y';
                    }

                    if(isset($patuh->tidak_kaitan) && $patuh->tidak_kaitan == 1){
                        $tidak_kaitan = 'Y';
                    }
                }
            }

            $data = array (
              'nofaildoe' => $fromEKAS[0]->NO_FAIL_JAS,
              'namapremis' => $fromEKAS[0]->PREMIS,
              'no_roc' => $fromEKAS[0]->NO_SSM,
              'alamat' => $fromEKAS[0]->ALAMAT_PREMIS_1,
              'poskod' => $fromEKAS[0]->POSKOD_PREMIS,
              'bandar' => $fromEKAS[0]->BANDAR_PREMIS_DESC,
              'negeri' => $this->state_model->get_state_by_code($fromEKAS[0]->NEGERI_PREMIS_KOD),
              'parlimen' => $fromEKAS[0]->PARLIMEN_PREMIS_DESC,
              'telefon' => $fromEKAS[0]->NO_TEL_PREMIS,
              'faks' =>$fromEKAS[0]->NO_FAKS_PREMIS,
              'sic' => isset($fromEKAS[0]->SIC)? $fromEKAS[0]->SIC : 'NULL',
              'subsic' => isset($fromEKAS[0]->SUB_SIC)? $fromEKAS[0]->SUB_SIC : 'NULL',
              'msicseksyen' => $fromEKAS[0]->MSIC_SEKSYEN,
                'msicbahagian' => $fromEKAS[0]->MSIC_BAHAGIAN ,
                'msickumpulan' => $fromEKAS[0]->MSIC_KUMPULAN ,
                'msickelas' =>  $fromEKAS[0]->MSIC_KELAS,
                'msicperkara' =>  $fromEKAS[0]->MSIC_PERKARA,
              'effluent' => $efluen,
              'tertakluk_eff' => $tertakluk_eff,
              'pub' => $pub,
              'tertakluk_pub' => $tertakluk_pub,
              'sewage' => $kumbahan,
              'tertakluk_kum' => $tertakluk_kumbahan,
              'bt' => $bt,
              'sisa_pepejal' => $landfill,
              'kg' => $kg,
              'kks' => $kks,
              'pydt_bt' => $pydt_bt,
              'landfill' => $landfill,
              'tidak_kaitan' => $tidak_kaitan,
              'cawangan_jas' => isset($fromEKAS[0]->cawangan_jas_id)? $this->user_model->find_cawangan($fromEKAS[0]->cawangan_jas_id)->NAMA_CAWANGAN : 'NULL',   
            );

            if($this->user_model->update_premise($data, $idpremis)){
                echo json_encode(array('ajax_status' => 'success'));
            } else {
                echo json_encode(array('ajax_status' => 'failed'));
            }
    }
    
    
    
}
