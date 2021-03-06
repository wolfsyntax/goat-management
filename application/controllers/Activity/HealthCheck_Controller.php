<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class HealthCheck_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();
		
		$this->load->model('Goat_model');
		
		if(!$this->session->userdata('user_id')) redirect(base_url());

		/**
		** Only the tenant has the privileges of this controller
		**/
		//if($this->session->userdata('user_type') != 'tenant') show_404();		

		if(!$this->session->userdata('user_type') === 'tenant' || !$this->session->userdata('user_type') === 'farm owner') show_error("Your client does not have permission to get requested page in the server", 403, "Forbidden");

	}

	public function index(){
					
		$context = array(
			
			'body' 				=> 'modules/activities/checkup/health_check_table',
			'title' 			=> 'Health Check',
			'health_records'	=> $this->Goat_model->get_all_health_records(),
			'goat_records'		=> $this->Goat_model->show_active_goats(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> $this->session->userdata('user_type') == 'tenant' ? 'dashboard' : 'farm',
			),
			'breadcrumb'		=> 'Health Check',
			'current'			=> 'checkup',

		);

		$this->load->view('layouts/application',$context);

	}

	public function create($eartag_id){

		$nickname = "";
		
		if($this->session->userdata('goat_records') == FALSE) {
			
			show_error("We can't find the page you're looking for.", 404, "Page Not Found");
			
		} else { 
		
			foreach($this->Goat_model->show_record("goat_profile", "eartag_id = {$eartag_id}", "nickname") as $row) {
				$nickname = $row->nickname;
			}

			$context = array(
				
				'body' 				=> 'modules/activities/checkup/health_check_new',
				'title' 			=> 'Health Check: New',
				'health_records'	=> $this->Goat_model->get_health_records($eartag_id),
				'breadcrumbs'		=> array(
					'Dashboard'		=> $this->session->userdata('user_type') == 'tenant' ? 'dashboard' : 'farm',
					'Health Check'	=> 'health/view',
				),
				'breadcrumb'		=> 'Health Record for ID#'. $eartag_id,
				'vaccine'			=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Vaccine'"),
				'supplement'		=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Supplement'"),
				'eartag'			=> $eartag_id,
				'nickname'			=> $nickname,
				'current'			=> 'checkup',

			);

			$this->load->view('layouts/application',$context);

		}

	}

	public function store($id) {


		$this->form_validation->set_rules('checkup_type', 'CheckUp Type', 'xss_clean|trim|required|min_length[7]|max_length[255]',
			array(
				"required" 		=> "{field} is required.",
				"min_length" 	=> "{field} must be at least 7 characters in length.",
				"max_length"	=> "{field} cannot exceed 255 characters in length.",
#				"in_list" 		=> "{field} is not a valid option",
				"xss_clean"		=> "{field} input is tampered.",
			)
		);

		$this->form_validation->set_rules('prescription', 'Prescription', 'xss_clean|trim|required|integer', 
			array(
				"integer" 		=> "{field} must contain an integer.",
				"required" 		=> "{field} is required.", 
				"xss_clean"		=> "{field} input is tampered.",
			)
		);

		//$str, $field, $id
		$inventory_id = $this->input->post('prescription', TRUE);
		//echo "<h1>[{$inventory_id}]</h1>";
		$this->form_validation->set_rules('quantity', 'Quantity (Qty).', "xss_clean|trim|required|numeric|inventory_check[{$inventory_id}]",
			array(
				"numeric"			=> "{field} must contain only numbers.",
				"required"			=> "{field} is required.",
				"xss_clean"			=> "{field} input is tampered.",
				"inventory_check"	=> "{field} exceed the quantity limit. Please add or update your inventory"
			)
		);

		$this->form_validation->set_rules('perform_date', 'Perform Date', 'xss_clean|trim|required|check_date',
			array(
				"required" => "{field} is required.",
				"check_date" => "Incorrect date settings",
				"xss_clean"		=> "{field} input is tampered.",
			)
		);

		$this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');

		if ($this->form_validation->run() == FALSE) {
			
			self::create($id);

		} else {

			if($this->Goat_model->health_check($id)){

				$this->session->set_flashdata("health_check", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Success</strong>&emsp;New health record added</p>
							</div>
						</div>");

				redirect(base_url('health/view'),'refresh');

			} else {

				$rx = $this->input->post('checkup_type', TRUE);
				
				if($rx == 'vaccination'){ $rx = 'vaccines'; }else {	$rx = 'supplements'; }

				$this->session->set_flashdata("health_check", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p><span class='fa fa-exclamation-circle'></span>
								<strong>Failed</strong>&emsp;Insufficient amount of {$rx} to perform the action</p>
							</div>
						</div>");

				self::create($id);


			}

		}

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