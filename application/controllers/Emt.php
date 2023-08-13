<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emt extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->theme = 'theme1';
        $this->load->model('emt_model');
        $this->load->library('mylib');
    }

    public function listEMT() {

        //hadoiiiii
        $data['ep'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '1', 'ep');
        $data['eb'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '2', 'eb');
        $data['epmc'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '3', 'epmc');
        $data['ercmc'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '3', 'ercmc');
        $data['bmps'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '4', 'bmps');
        $data['iets'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '4', 'iets');
        $data['apcs'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '4', 'apcs');
        $data['swmi'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '4', 'swmi');
        $data['labf'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '4', 'labf');
        $data['pmi'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '4', 'pmi');
        $data['others4'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '4', 'others4');

        $data['csec'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '5', 'csec');
        $data['cepietsobp'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '5', 'cepietsobp');
        $data['cepietsopcp'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '5', 'cepietsopcp');
        $data['cepswam'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '5', 'cepswam');
        $data['cepso'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '5', 'cepso');
        $data['cebfo'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '5', 'cebfo');
        $data['ceppome'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '5', 'ceppome');
        $data['cepstpo'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '5', 'cepstpo');

        $data['cc'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '6', 'cc');
        $data['da'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '6', 'da');
        $data['ir'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '6', 'ir');
        $data['others6'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '6', 'others6');

        $data['esr'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '7', 'esr');
        $data['ws'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '7', 'ws');
        $data['bb'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '7', 'bb');
        $data['fl'] = $this->emt_model->get_emt_status($_SESSION['user_id'], '7', 'fl');

        $this->viewit('emt/list_emt', $data);
    }

    public function index($emt_type = '') {
        $data = $this->mylib->typeofEMT($emt_type);
        if (!isset($_SESSION['user_id'])) {
            $this->load->view('users/login_view');
        } else {
            if ($this->emt_model->get_emt_answers($_SESSION['user_id'], $data['emt_no'], $emt_type)) {
                $data['status'] = $this->emt_model->get_emt_status($_SESSION['user_id'], $data['emt_no'], $emt_type);
                $this->view($data);
            } else { //belum hantar emt
                //$this->output->enable_profiler(TRUE);
                $this->viewit('emt/emt_view', $data);
            }
        }
    }

    public function view($data) {

        $premiseid = $_SESSION['user_id'];
        $data['emt_answers'] = $this->emt_model->get_emt_answers($premiseid, $data['emt_no'], $data['emt_type']);
        $data['emt_attachments'] = $this->emt_model->get_emt_attachments($premiseid, $data['emt_no'], $data['emt_type']);

        //$this->output->enable_profiler(TRUE);
        //var_dump($data['emt_answers']);

        $this->viewit('emt/emt_answered_view', $data);
    }

    public function edit($emt_type, $id) {
        $data = $this->mylib->typeofEMT($emt_type);
        $premiseid = $_SESSION['user_id'];
        $data['emt_answers'] = $this->emt_model->get_emt_answers($premiseid, $data['emt_no'], $data['emt_type']);
        $data['emt_attachments'] = $this->emt_model->get_emt_attachments($premiseid, $data['emt_no'], $data['emt_type']);

        //var_dump($data['emt_answers']);
        $this->viewit('emt/emt_edit_view', $data);
    }

    public function submit($emt_type) {

        $premiseid = $_SESSION['user_id'];

        //$this->output->enable_profiler(TRUE);
        $this->form_validation->set_rules('self_assessment', 'Self assessment ', 'required');
        $this->form_validation->set_rules('date_implement', 'Date of implementation', 'required');
        //$this->form_validation->set_rules('user_file', 'attachment', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data = $this->mylib->typeofEMT($emt_type);

            $this->viewit('emt/emt_view', $data);
        } else {

            if ($this->input->post('submit_btn')) {
                $emt_status = 'submit';
            } elseif ($this->input->post('save_btn')) {
                $emt_status = 'draft';
            }

            $data = array(
                'premis_id' => $premiseid,
                'emt_type' => $emt_type,
                'self_assessment' => $this->input->post('self_assessment'),
                'date_implement' => $this->input->post('date_implement'),
                'comment' => $this->input->post('comment'),
                'emt_status' => $emt_status,
                'emt_no' => $this->input->post('emt_no'),
                'created_on' => date("Y-m-d H:i:s")
            );

            $files = $_FILES;
            $emt_no = $this->input->post('emt_no');

            if (!$this->mylib->multiple_upload($emt_no, $emt_type, $premiseid, $files)) { //Upload file successfully?
                $error = array('error' => $this->mylib->upload->display_errors());

                $this->session->set_flashdata('upload_fail', $error['error']);

                //redirect('emt1');
                
            } else {

                if ($this->emt_model->set_emt_answers($data)) {

                    $this->session->set_flashdata('emt_created', 'EMT telah dihantar');
                    $this->listEMT();
                    
                    
                } else {
                    $this->session->set_flashdata('emt_failed', 'EMT tidak berjaya dihantar');
                    $this->listEMT();
                }
            }
        }
    }

    public function edit_submit($emt_type, $emt_id) {

        $premiseid = $_SESSION['user_id'];

        //$this->output->enable_profiler(TRUE);
        $this->form_validation->set_rules('self_assessment', 'Self assessment ', 'required');
        $this->form_validation->set_rules('date_implement', 'Date of implementation', 'required');
        //$this->form_validation->set_rules('user_file', 'attachment', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data = $this->mylib->typeofEMT($emt_type);

            $this->viewit('emt/emt_edit_view', $data);
        } else {

            if ($this->input->post('submit_btn')) {
                $emt_status = 'submit';
            } elseif ($this->input->post('save_btn')) {
                $emt_status = 'draft';
            }

            $data = array(
                'premis_id' => $premiseid,
                'emt_type' => $emt_type,
                'self_assessment' => $this->input->post('self_assessment'),
                'date_implement' => $this->input->post('date_implement'),
                'comment' => $this->input->post('comment'),
                'emt_status' => $emt_status,
                'emt_no' => $this->input->post('emt_no')
                    //'updated_on' => date("Y-m-d H:i:s")
            );

            $files = $_FILES;
            $emt_no = $this->input->post('emt_no');

            if (!$this->mylib->multiple_upload($emt_no, $emt_type, $premiseid, $files)) { //Upload file successfully?
                $error = array('error' => $this->mylib->upload->display_errors());

                $this->session->set_flashdata('upload_fail', $error['error']);

                //redirect('emt1');
            } else {

                if ($this->emt_model->set_emt_answers($data, $emt_id)) {

                    $this->session->set_flashdata('emt_created', 'EMT telah dihantar');
                    //redirect('emt1');
                    $this->listEMT();
                } else {
                    $this->session->set_flashdata('emt_failed', 'EMT tidak berjaya dihantar');
                    //redirect('emt1');
                    $this->listEMT();
                }
            }
        }
    }

    public function deleteimage() {
        $deleteid = $this->input->post('image_id');
        $this->db->delete('emt_attachments', array('id' => $deleteid));
        $verify = $this->db->affected_rows();
        echo $verify;
    }
    
    public function phpinfo(){
        echo phpinfo();
    }

    public function send_mail() {
        $this->load->library('email');

        $subject = 'This is a importanatata';
        $message = '<p>This message has been sent for testing purposes.</p>';

// Get full html:
        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
    <title>' . html_escape($subject) . '</title>
    <style type="text/css">
        body {
            font-family: Arial, Verdana, Helvetica, sans-serif;
            font-size: 16px;
        }
    </style>
</head>
<body>
' . $message . '
</body>
</html>';
// Also, for getting full html you may use the following internal method:
//$body = $this->email->full_html($subject, $message);

        $result = $this->email
                //->from('emains@localhost')
                //->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
                ->to('hairi.nordin@gmail.com')
                ->subject($subject)
                ->message($body)
                ->send();

        //var_dump($result);
        echo '<pre>';
        echo $this->email->print_debugger();
        echo '</pre>';
        exit;
    }

}

?>