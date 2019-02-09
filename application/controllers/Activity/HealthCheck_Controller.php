<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class HealthCheck_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();
		
		$this->load->model('Goat_model');
		
		if(!$this->session->userdata('user_id')) redirect(base_url());

	}

	public function index(){
					
		$context = array(
			'body' 				=> 'modules/activities/checkup/health_check_table',
			'title' 			=> 'Health Check',
			'health_records'	=> $this->Goat_model->show_active_goats(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
			),
			'breadcrumb'		=> 'Health Check',				
		);

			$this->load->view('layouts/application',$context);

	}

	public function template(){

		
		if($this->session->userdata('user_type') == 'sysadmin'){
			
			$context = array(
				'body' 				=> 'auth/login',
				'title' 			=> 'Login',
			);

			$this->load->view('layouts/application',$context);

		} else {

			show_404();

		}
				
	}

}

?>