<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportQuarter extends MY_Controller {

    public $theme;
    
    public function __construct() {
        parent::__construct();
        $this->theme = 'theme1'; // home_view
    }

    // listing of quarterly report
    public function search($jenisLaporan='') {
        $year = [];
        $yr = date('Y') - 4;
        for ($i=1; $i<= 4; $i++) {
            $yr++;
            $year[$yr] = $yr;
        }
        
        $data = $this->input->post();
        
        if (isset($data['tahun'])) {
            $tahun = $data['tahun'];
        } else {
            $tahun = date('Y');
        }
        
        if (isset($data['sektor'])) {
            $sektor = $data['sektor'];
        } else {
            $sektor = 'pydtkks';
        }
        
        $month = date('m');
        
        if ($month <= 3) {
            $q = 1;
        } else if ($month > 3 && $month <= 6) {
            $q= 2;
        } else if ($month > 6 && $month <= 9) {
            $q= 2;
        } else {
            $q = 4;
        }
        
        $m = [1 => 'Jan - Mar', 2 => 'Apr - Jun', 3 => 'Jul - Sep', 4 => 'Oct - Dec'];
        
        if($jenisLaporan == 'desktop'){
            $this->viewit('report/qlist_desktop', ['q' => $q, 'm' => $m, 'tahun' => $tahun, 'year' => $year, 'sektor'=>$sektor]);
        } elseif($jenisLaporan == 'lapangan'){
            $this->viewit('report/qlist_lapangan', ['q' => $q, 'm' => $m, 'tahun' => $tahun, 'year' => $year, 'sektor'=>$sektor]);
        } else {
            echo 'report invalid, contact admin';
        }
        
    }
    
    // pydtkks - kelapa sawit, pybdti - ... industri
    public function test($tahun=2017, $suku=4, $sektor='pybdti') {
        $arr = [];
        if ($sektor === 'pybdti') {
            $this->load->model('Sic_model', 'sic');
            $data = $this->sic->all(['jenis' => 'I']);
            foreach ($data as $s) {
                $arr[] = $s->KETERANGAN_SIC;
            }
        } else if ($sektor === '5a') {
            $this->load->model('Sic_model', 'sic');
            $data = $this->sic->all(['jenis' => 'BI']);
            foreach ($data as $s) {
                $arr[] = $s->KETERANGAN_SIC;
            }
        } else if ($sektor === '5b') {
            
        } else  {
            $this->load->model('Ref_model', 'ref');
            $data = $this->ref->data('sektor');
            $arr[] = $data[$sektor];
        }
        
        $data['arr'] = $arr;
        $data['sasaran'] = $this->sasaran();
        $this->load->view('report/test', $data);
    }
    
    // kira jum sasaran
    // Jum. Premis yg akan diperiksa 2017 (2)
    public function sasaran() {
        // SELECT SUM(jum_sasaran) AS jum_sasaran FROM sasaran WHERE id_negeri='R' AND tahun=2017;
        $state = $this->session->userdata['state']; // state or hq
        $role  = $this->session->userdata['role'];
        $this->db->select_sum('jum_sasaran');
        
        if ($role !== 'ADM') {
           $this->db->where(['id_negeri' => $state, 'tahun' => 2017]);
        }
        
        $data = $this->db->get('sasaran')->row();
        //var_dump($data);
        return $data;
    }
}
