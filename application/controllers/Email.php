<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('desktop_model');
        $this->load->model('user_model');
        $this->load->model('emt_model');
        $this->load->library('mylib');
    }

    public function send_notification($noti_type, $email, $due_date) {
        if ($noti_type == 'C30') {
            $subject = 'Action Required : EMT Submission';
            $message = '<p>Please be informed that the compulsory EMT report submission for your premise is due <strong>today</strong>. You can submit the EMT report by login at EMAINS System.</p>
<p>Your cooperation in this matter is highly appreciated.<br />Thank you.</p>';
        } else if ($noti_type == 'C31') {
            $subject = 'Action Required : Overdue EMT submission';
            $message = '<p>Please be informed that your premise is required to submit the EMT report before/on <strong>' . $due_date . '</strong>.</p>
                <p>However, you still can submit the EMT report.</p>
                <p>Your cooperation in this matter is highly appreciated.</p>
                <p>Thank you.</p>';
        } else if ($noti_type == 'C15') {
            $subject = 'Action Required : EMT Submission';
            $message = '<p>Please be informed that the compulsory EMT report submission for your premise will be due in <strong>15 days</strong>. You can submit the EMT report by login at EMAINS System.</p>
<p>Your cooperation in this matter is highly appreciated.<br />Thank you.</p>';
        } else if ($noti_type == 'V30') {
            $subject = 'Action Required : EMT Submission';
            $message = '<p>Please be informed that your premise is required to submit the voluntarily EMT report before/on <strong>' . $due_date . '</strong>.
<p>Your cooperation in this matter is highly appreciated.<br />Thank you.</p>';
        }

        $this->mylib->send_email_notification($subject, $message, $email);
    }

    public function send_internal_notification($premiseName, $noti_type, $email) {

        if ($noti_type == 'assessment') {
            $subject = 'Action Required : Incoming EMT for assessment from ' . $premiseName;
            $message = '<p>Please be informed that the you have incoming EMT for assessment. You can submit the assessment by login at EMAINS System.</p>
                        <p>Thank you.</p>';
        } else if ($noti_type == 'validation') {
            $subject = 'Action Required : Incoming EMT for validation from ' . $premiseName;
            $message = '<p>Please be informed that the you have incoming EMT for validation. You can submit the validation by login at EMAINS System.</p>
                        <p>Thank you.</p>';
        } else if ($noti_type == 'approval') {
            $subject = 'Action Required : Incoming EMT for approval from ' . $premiseName;
            $message = '<p>Please be informed that the you have incoming EMT for approval. You can submit the approval by login at EMAINS System.</p>
                        <p>Thank you.</p>';
        } else if ($noti_type == 'revert') {
            $subject = 'Action Required : Incoming EMT to be reverted for ' . $premiseName;
            $message = '<p>Please be informed that your form has been reverted for your perusal. Kindly login to the EMAINS system.</p>
                        <p>Thank you.</p>';
        }

        $this->mylib->send_email_notification($subject, $message, $email);
    }

    public function send_completeRejected_notification($noti_type, $email) {

        if ($noti_type == 'complete') {
            $subject = 'Action Required : EMT assessment has been completed';
            $message = '<p>Please be informed that your EMT assessment has been completed. Kindly login to the EMAINS system.</p>
                        <p>Thank you.</p>';
        } else if ($noti_type == 'revert') {
            $subject = 'Action Required : EMT has been returned for correction';
            $message = '<p>Please be informed that your EMT has been returned for correction. Kindly login to the EMAINS system.</p>
                        <p>Thank you.</p>';
        }
        
        $this->mylib->send_email_notification($subject, $message, $email);

    }

    public function get_email_today() {
        $email_send = array();
        $today = strtotime(date("Y-m-d"));

        $data = $this->db->get('premis_login')->result();

        echo 'Date today - ' . date("Y-m-d") . '<br>';
        foreach ($data as $premis) {
            $c15 = strtotime('-15 days', strtotime($premis->submission_due_date));
            $due_date = strtotime($premis->submission_due_date);

            if ($premis->submission_type == 'Compulsory') {
                if ($c15 == $today) { //Submission will end in 15 days
                    echo $premis->namapremis . '- Due lagi 15 hari<br>';
                    if ($premis->email) {
                        $email_send[] = array('idpremis' => $premis->idpremis, 'email' => $premis->email, 'noti_type' => 'C15', 'due_date' => date("Y-m-d", $due_date));
                    }
                } else if ($today == $due_date) {//Submission due date is today
                    echo $premis->namapremis . '- Todays due<br>';
                    if ($premis->email) {
                        $email_send[] = array('idpremis' => $premis->idpremis, 'email' => $premis->email, 'noti_type' => 'C30', 'due_date' => date("Y-m-d", $due_date));
                    }
                } else if ($today > $due_date) { // masuk dalam report atau list perlu beri perhatian

                    echo $premis->namapremis . '- Terlebih due date<br>';
                    if ($premis->email) {
                        $email_send[] = array('idpremis' => $premis->idpremis, 'email' => $premis->email, 'noti_type' => 'C31', 'due_date' => date("Y-m-d", $due_date));
                    }
                } else {
                    echo $premis->namapremis . '- Mandatory - Tak perlu send<br>';
                }
            } else if ($premis->submission_type == 'Voluntarily') {
                $due_minus_one_month = strtotime('-1 months', strtotime($premis->submission_due_date));
                $due_minus_two_month = strtotime('-2 months', strtotime($premis->submission_due_date));
                $due_minus_three_month = strtotime('-3 months', strtotime($premis->submission_due_date));
                $due_minus_four_month = strtotime('-4 months', strtotime($premis->submission_due_date));
                $due_minus_five_month = strtotime('-5 months', strtotime($premis->submission_due_date));

                if ($today == $due_minus_one_month || $today == $due_minus_two_month || $today == $due_minus_three_month || $today == $due_minus_four_month || $today == $due_minus_five_month) {
                    $email_send[] = array('idpremis' => $premis->idpremis, 'email' => $premis->email, 'noti_type' => 'V30', 'due_date' => date("Y-m-d", $due_date));
                } else {
                    echo $premis->namapremis . '- Voluntarily - Tak perlu send<br>';
                }
            }
        }

        $this->cron($email_send);
        echo '<pre>';
        print_r($email_send);
        echo '</pre>';
    }

    public function cron($email) {

        foreach ($email as $key => $value) {

            $data = array(
                'idpremis' => $value['idpremis'],
                'email' => $value['email'],
                'noti_type' => $value['noti_type'],
                'sent_date' => date("Y-m-d")
            );
            $this->db->insert('kpigsr_email_sent', $data);

            $this->send_notification($value['noti_type'], $value['email'], $value['due_date']);
        }
    }

}
