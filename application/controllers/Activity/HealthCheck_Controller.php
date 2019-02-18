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
			'current'			=> 'checkup',

		);

		$this->load->view('layouts/application',$context);

	}

	public function create($eartag_id){

		$context = array(
			
			'body' 				=> 'modules/activities/checkup/health_check_new',
			'title' 			=> 'Health Check: New',
			'health_records'	=> $this->Goat_model->get_health_records($eartag_id),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
				'Health Check'	=> 'health/view',
			),
			'breadcrumb'		=> 'Health Record for ID#'. $eartag_id,
			'vaccine'			=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Vaccine'"),
			'supplement'		=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Supplement'"),
			'eartag'			=> $eartag_id,
			'current'			=> 'checkup',

		);

		$this->load->view('layouts/application',$context);

	}

	public function store($id) {

	}

	public function edit($id) {

	}

	public function update($id) {

	}

	public function destroy($id) {

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