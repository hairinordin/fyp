<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Desktop extends CI_Controller {
	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
			* 		http://example.com/index.php/welcome
		*	- or -
			* 		http://example.com/index.php/welcome/index
		*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/
	public function __construct(){
		parent::__construct();
		// Your own constructor code
		$this->load->model('desktop_model');
		$this->load->model('user_model');
		$this->load->model('emt_model');
	}


	public function index(){
		
		$data['emt_answers'] = $this->desktop_model->get_emt_answers();

		$data['main_view'] = 'desktop/desktop_view';

		$this->load->view('layouts/main', $data);
	}

	public function assessment($premiseid){

		//$this->output->enable_profiler(TRUE);

		$data['premise_info'] = $this->user_model->get_premise_info($premiseid);

		$data['emt_1'] = $this->emt_model->get_emt1_answers($premiseid);
		$data['emt_1_attachments'] = $this->emt_model->get_emt_attachments($premiseid);

		$data['emt_2'] = $this->emt_model->get_emt2_answers($premiseid);
		$data['emt_2_attachments'] = $this->emt_model->get_emt_attachments($premiseid); // fix this later

		$data['desktop_header'] = 'desktop/desktop_header_view';
		
		$data['main_view'] = 'desktop/desktop_assessment_view';

		//$data['desktop_view'] = 'desktop/emt1_tool_view';

		$data['desktop_footer'] = 'desktop/desktop_footer_view';

		$this->load->view('layouts/desktop_main', $data);
	}

}
?>