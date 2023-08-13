<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

    public $theme;
    
    public function __construct() {
        parent::__construct();
        $this->theme = 'theme1'; // home_view
        $this->load->model('Ref_model', 'ref');
    }
    
    public function index() {
        $this->viewit('report/index');
    }
    
    
    // listing all reports
    public function listing() {
        $year = date('Y');
        $data['year'] = $year;
        $data['main_view'] = 'report/list';
        $data['nama'] = 'azman';
        $this->viewit('report/list', $data);
    }

    // listing of quarterly report
    public function quarter() {
        $this->viewit('report/qlist');
    }
    
//    public function quarter_details($tahun, $suku, $sektor) {
//               
//        $post_data['negeri'] = $this->state;
//        $post_data['tahun'] = $tahun;
//        $post_data['suku_tahun'] = $suku; //1,2,3,4
//        $post_data['sektor'] = $sektor; //pydtkg, pydtkks
//        
//        
//        $this->viewit('report/quarter', $post_data);
//    }
    // listing of monthly report
    public function month($jenisLaporan) {
        $data['jenis_laporan'] = $jenisLaporan;
        $data['month'] = $this->ref->data('month');
        $data['month'] = $this->ref->data('year');
        //print_r($data);
        $this->viewit('report/mlist', $data);
    }
    
    //view monthly report
    public function monthly($bulan, $tahun, $jenisLaporan){
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['jenisLaporan'] = $jenisLaporan;
        
        $data['sektor'] = $this->ref->data('sektor');
        
        
        $this->viewit('report/monthly_report', $data);
    }
    

    // download quarterly report as excel
    public function qdesktop($tahun='2017', $suku='1', $sektor='pydtkks') {
        $post_data['negeri'] = $this->state;
        $post_data['tahun'] = $tahun;
        $post_data['suku_tahun'] = $suku; //1,2,3,4
        $post_data['sektor'] = $this->ref->data('sektor'); //pydtkg, pydtkks
        
        //print_r($post_data['sektor']);
        
        $this->viewit('report/quarter_desktop', $post_data);
    }
    
    public function qlapangan($tahun='2017', $suku='1', $sektor='pydtkks') {
        $post_data['negeri'] = $this->state;
        $post_data['tahun'] = $tahun;
        $post_data['suku_tahun'] = $suku; //1,2,3,4
        $post_data['sektor'] = $this->ref->data('sektor'); //pydtkg, pydtkks
        
        //print_r($post_data['sektor']);
        
        $this->viewit('report/quarter_lapangan', $post_data);
    }

    // download monthly report as excel
    public function mdownload() {
      
//        $this->load->helper('download');
//        $html = $this->load->view('report/quarter', [], true);
//        ob_clean();
//        $name = 'quarterly_report.xlsx';
//        force_download($name, $html);
//        $this->load->helper('download');
//        $html = $this->load->view('report/month',[], true);
//        ob_clean();
//        $name = 'monthly_report.xlsx';
//        force_download($name, $html);
    }
    
    public function excel() {

        //load our new PHPExcel library
        $this->load->library('excel');
//activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
//name the worksheet
        $this->excel->getActiveSheet()->setTitle('test worksheet');
//set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
//change the font size
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
//make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $filename = 'just_some_random_name.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

}
