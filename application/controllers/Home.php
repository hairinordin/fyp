<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->model('user_model');
                date_default_timezone_set("Asia/Kuala_Lumpur");

        }

	public function index()
	{

		/*if($this->session->userdata('logged_in')){

			$user_id = $this->session->userdata('user_id');


			$data['tasks'] = $this->task_model->get_all_tasks($user_id);

			$data['projects'] = $this->project_model->get_all_projects($user_id);


		}
		*/
        //$data['sidebar_view'] = 'users/login_view';
        $data['main_view'] = 'users/industry_home_view';
        $date = $this->user_model->expiry_date($_SESSION['user_id']);
        
       // $date = new DateTimeZone('Asia/Kuala_Lumpur');
        $date = DateTime::createFromFormat('Y-m-d G:i:s', $date['register_date']);
        $register_date = date_timestamp_get($date);
        
        $expired_date = $date->modify('+6 months');
        
        $expired_date = date_timestamp_get($expired_date);
        
        $data['register_date'] = gmdate('d-M-Y',$register_date);
        $data['expired_date'] = gmdate('d-M-Y', $expired_date);
        
        // Get percentage
        $today = time();
        
        $dateDiff = $expired_date - $register_date;
        $dateDiffForToday = $today - $register_date;
        
        $percentage = $dateDiffForToday / $dateDiff * 100;
        $percentageRounded = round($percentage);
        
        $data['dateRemainingInPercentage'] = $percentageRounded;
        //echo 'hello ' . $register_date . ' ##' . $date['register_date'];
        
        //$data['expired_date'] = $expired_date->format('d-M-Y');
        
        #######################################################################
//        $today = time();
//        
//        $date1 = date_timestamp_get($register_date);
//        $date2 = date_timestamp_get($expired_date);
//        $dateDiff = $data['expired_date'] - $data['register_date'];
//        $dateDiffForToday = $today - $data['register_date'];
//        
//        $percentage = $dateDiffForToday / $dateDiff * 100;
//        $percentageRounded = round($percentage);
//        
//        echo '<br>Today ' . $today;
//        echo '<br>datadiff ' . $dateDiff;
//        echo '<br>date1 ' . $date1;
//        echo '<br>date2 ' . $date2;
//        
//        echo '<br>date1 ' . gmdate('Y-m-d G:i:s', $date1 );
        //$data['register_date'] = date('Y-m-d',strtotime($date['register_date']));
        
        //$data['expired_date'] = date_modify(new DateTime($data['register_date']), '+6 months');
//new DateTime($row['date'])
        //print_r($date);
        //print_r($data['expiry_date']);
        $this->load->view('home_view', $data);
	}
        
        public function contact_us(){
            $this->load->view('hubungi_kami.php');
        }      
}

