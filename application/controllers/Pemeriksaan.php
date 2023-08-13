<?php

// Pemeriksa
class Pemeriksaan extends MY_Controller {

    public function index($idpremis = "") {
        $this->load->model('user_model');
        $this->load->model('Soalan_Model');
        $this->load->model('emt_model');

        $maklumat_premis = $this->user_model->get_premise_info($idpremis);
       
        $data['tajuk_modul'] = $this->Soalan_Model->get_modul($maklumat_premis->kod_kategori);
        $data['pilihan_jawapan'] = $this->db->get('soalan_pilihan')->result();
        $data['idpremis'] = $maklumat_premis->idpremis;
        
        $data['set_soalan'] = $this->Soalan_Model->set_soalan($maklumat_premis->kod_kategori);
        
        //Maklumat dan jwpan 
        $jawapan['maklumat_premis'] = $this->user_model->get_premise_info($idpremis);
        $jawapan['jawapan_emt'] = $this->emt_model->get_emt_answers($idpremis);
        $jawapan['lampiran_emt'] = $this->emt_model->get_emt_attachments($idpremis);
        
        
        $this->db->select('*');
        $this->db->from('emt');
        $this->db->where('id_premis', $idpremis);
        $this->db->join('transaksi', 'emt.id = transaksi.emt_id');
        $data['transaksi'] = $this->db->get()->result_array();
        
        
        $this->db->select('*');
        $this->db->from('lawatan');
        $this->db->where('idpremis', $idpremis); 
        $data['lawatan'] = $this->db->get()->result_array();
        
        $data['paparan_emt'] = $this->load->view('jawapan/list', $jawapan, TRUE);
   
        //$this->output->enable_profiler(TRUE);
        //var_dump($data['idpremis']);
        $this->viewit('pemeriksaan/index', $data);
    }

    public function hantar($idpremis) {
      
        //$this->output->enable_profiler(TRUE);
        //$idpremis = $this->input->post('idpremis');
        //unset($_POST['idpremis']); //remove element 

        $postdata = $this->input->post(); // assign jawapan tanpa element idpremis
        //var_dump($postdata);
        if (!empty($postdata)) {
            //Loop semua soalan
            foreach ($postdata as $field => $value) {
                //echo '<br>';
                //echo '<br>';
                $value = array_filter($value);
                //print_r($value);


                if (!empty($value)) {
                    $id_soalan = $field;

                    //echo '<br>#' . $id_soalan . '#<br>';
                    $catatan = '';

                        if (!empty($value['catatan'])) {
                            $catatan = $value['catatan'];
                            
                            $id_jawapan = 'ulasan';
                        }

                    //pecahkan form id dgn jawapan
                    foreach ($value as $val => $jawapan) {
                        //echo gettype($jawapan);
                        
                        if (is_array($jawapan)) { //untuk jawapan dari checkbox, implode ke string
                            //$jawapan = implode(',', $jawapan);
                            //print_r($jawapan);
                            
                            foreach ($jawapan as $i){
                               $data = [
                                'id_soalan' => $id_soalan,
                                'id_jawapan' => $i,
                                'id_premis' => $idpremis,
                                'jawapan_ulasan' => $catatan,
                                'diperiksa_oleh' => $_SESSION['user_id'],
                                'created_on' => date("Y-m-d H:i:s")
                            ]; 
                               
                               $this->db->insert('soalan_jawapan', $data);

                        }}
                           // unset($jawapan[$i]);
                           else{
                               $data = [
                            'id_soalan' => $id_soalan,
                            'id_jawapan' => $jawapan,
                            'id_premis' => $idpremis,
                            'jawapan_ulasan' => $catatan,
                            'diperiksa_oleh' => $_SESSION['user_id'],
                            'created_on' => date("Y-m-d H:i:s")
                        ];

                        //print_r($data);

                        $this->db->insert('soalan_jawapan', $data);
                           }
                        
                        //echo '<br>'. $val . ' = ' . $jawapan . '<br>';


                            
                                

//is_numeric($jawapan) ? $jawapan : ''
                        
                        
                            
                        
                    }
                }
            }
            
            
        } else {
            echo 'Nothing in POST';
            // user hasen't submitted anything yet!
        }
        $this->paparan_verifikasi($idpremis);
    }
    
    
    //SOALAN LAMA
    public function verifikasi($idpremis="") {
        $this->load->model('user_model');
        $this->load->model('Soalan_Model');
        
        $maklumat_premis = $this->user_model->get_premise_info($idpremis);
        $data['tajuk_modul'] = $this->Soalan_Model->get_modul($maklumat_premis->kod_kategori);
        $data['pilihan_jawapan'] = $this->db->get('soalan_pilihan')->result();
        
        $data['set_soalan'] = $this->Soalan_Model->set_soalan($maklumat_premis->kod_kategori);
        $data['idpremis'] = $idpremis;
        //print_r($maklumat_premis);
           
        //$this->output->enable_profiler(TRUE);
        //var_dump($data['set_soalan']);
        $this->viewit('pemeriksaan/verifikasi', $data);
    }
    
    public function laporan_pemeriksaan($idpremis=""){
        $this->load->model('user_model');
        $this->load->model('Soalan_Model');
        $this->load->model('emt_model');

        $maklumat_premis = $this->user_model->get_premise_info($idpremis);
       
        $data['tajuk_modul'] = $this->Soalan_Model->get_modul($maklumat_premis->kod_kategori);
        $data['pilihan_jawapan'] = $this->db->get('soalan_pilihan')->result();
        $data['idpremis'] = $maklumat_premis->idpremis;
        
        $data['set_soalan'] = $this->Soalan_Model->set_soalan($maklumat_premis->kod_kategori);
        
        //Maklumat dan jwpan 
        $jawapan['maklumat_premis'] = $this->user_model->get_premise_info($idpremis);
        $jawapan['jawapan_emt'] = $this->emt_model->get_emt_answers($idpremis);
        $jawapan['lampiran_emt'] = $this->emt_model->get_emt_attachments($idpremis);
        
        
        $this->db->select('*');
        $this->db->from('emt');
        $this->db->where('id_premis', $idpremis);
        $this->db->join('transaksi', 'emt.id = transaksi.emt_id');
        $data['transaksi'] = $this->db->get()->result_array();
        
        
        $this->db->select('*');
        $this->db->from('lawatan');
        $this->db->where('idpremis', $idpremis); 
        $data['lawatan'] = $this->db->get()->result_array();
        
        $data['paparan_emt'] = $this->load->view('jawapan/list', $jawapan, TRUE);
   
        //$this->output->enable_profiler(TRUE);
        //var_dump($data['idpremis']);
        $this->viewit('pemeriksaan/laporan_pemeriksaan', $data);
    }
    
    public function paparan_verifikasi($idpremis){
        //$this->output->enable_profiler(TRUE);
        $this->load->model('user_model');
        $this->load->model('Soalan_Model');
        $this->load->model('emt_model');
        
        $this->db->select('*');
        $this->db->from('soalan_jawapan');
        $this->db->join('soalan_pilihan', 'soalan_pilihan.id = soalan_jawapan.id_jawapan');
        $this->db->where('id_premis', $idpremis);
        //$this->db->group_by('soalan_jawapan.id_jawapan'); 
        $data['jawapan'] = $this->db->get()->result();
        //
        
        $maklumat_premis = $this->user_model->get_premise_info($idpremis);
       
        $data['tajuk_modul'] = $this->Soalan_Model->get_modul($maklumat_premis->kod_kategori);
        $data['pilihan_jawapan'] = $this->db->get('soalan_pilihan')->result();
        $data['idpremis'] = $maklumat_premis->idpremis;
        
       $data['set_soalan'] = $this->Soalan_Model->set_soalan($maklumat_premis->kod_kategori);
        
        $this->viewit('pemeriksaan/paparan_verifikasi', $data);
        
    }


    public function php(){
        
        phpinfo();
    }

}
