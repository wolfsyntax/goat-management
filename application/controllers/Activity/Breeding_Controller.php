<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Breeding_Controller extends CI_Controller {

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

	public function index() {
					
		$context = array(
			'body' 				=> 'modules/activities/breeding/breeding_table',
			'title' 			=> 'Breeding Record',
			'breeding_record'	=>  $this->Goat_model->get_breeding_records(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
			),
			'breadcrumb'		=> 'Manage Breeding',
			'current'			=> 'breed',				
		);

			$this->load->view('layouts/application',$context);

	}

	public function create() {

		$context = array(
			'body' 					=> 'modules/activities/breeding/breeding_form',
			'title' 				=> 'Breeding Record',
			'breeding_record'		=>  $this->Goat_model->get_breeding_records(),
			'breadcrumbs'			=> array(
				'Dashboard'			=> 'dashboard',
				'Manage Breeding'	=> 'breeding/view',
			),
			'breadcrumb'			=> 'Breeding Activity',
			'current'				=> 'breed',				
			'sire_record'			=> $this->Goat_model->goat_breed('male'),
			'dam_record'			=> $this->Goat_model->goat_breed('female'),
		);

			$this->load->view('layouts/application',$context);

	}


	public function store() {
		
		self::validate_breeding();

		if ($this->form_validation->run() == TRUE or FALSE) {
			# code...
			self::create();

		} else {
			# code...

			if($this->Goat_model->breeding_record()){

				$this->session->set_flashdata("goat", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Success</strong>&emsp;Breeding Record successfully added.</p>
							</div>
						</div>");

			} else {

				$this->session->set_flashdata("goat", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p><span class='fa fa-times-circle'></span>
								<strong>Failed</strong>&emsp;Breeding Record not added.</p>
							</div>
						</div>");

			}	

			redirect(base_url('breeding/view'),'refresh');

		}

	}

	public function edit($id){

	}

	public function update($id){

		self::validate_form();

		if ($this->form_validation->run() == FALSE) {
			# code...
			self::edit($id);
		} else {
			
			if($this->Goat_model->breeding_record()){

				$this->session->set_flashdata('goat', '<div class="alert alert-success col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-check-circle"></span>
							<strong>Success</strong>&emsp;Breeding record added successfully.</p>
						</div>
					</div>');

			} else {
				
				$this->session->set_flashdata('goat', '<div class="alert alert-danger col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-exclamation-circle"></span>
							<strong>Failed</strong>&emsp;Breeding Record not added.</p>
						</div>
					</div>');

			}

			redirect(base_url('breeding/view'),'refresh');

		}

	}	

	public function validate_form(){

		$this->form_validation->set_rules('eartag_id', 'Dam ID', 'required|xss_clean|trim|integer|is_dam_exist[goat_profile.eartag_id]|greater_than[0]|is_active[goat_profile.eartag_id]|callback_breed_check|eartag_checker', 
			array(
				'required'			=> '{field} is required.',
				'integer'			=> '{field} must contain an integer.',
				'is_dam_exist'		=> '{field} is NOT a Sire or do not exist.',
				'is_active'			=> '{field} is NOT active. Please select another dam.',
				'greater_than'		=> '{field} cannot be less than or equal to zero.',
				'breed_check'		=> '{field} must be at least 10 months old',
				'eartag_checker'	=> '{field} is not a valid Eartag ID.',
			)
		);

		$this->form_validation->set_rules('partner_id', 'Sire ID', 'trim|required|is_sire_exist[goat_profile.eartag_id]|is_active[goat_profile.eartag_id]|eartag_checker|callback_breed_check',array(
				'required' 			=> '{field} is required.',
				'is_sire_exist'		=> '{field} is NOT existing.',
				'is_active'			=> '{field} is NOT active. Please select another sire.',
				'breed_check'		=> '{field} must be at least 10 months old',
				'eartag_checker'	=> '{field} is not a valid Eartag ID.',
			)
		);

		$this->form_validation->set_rules('perform_date', 'Breeding Date', 'required|xss_clean|trim|check_date',
			array(
				'required' 		=> '{field} is required.',
				"check_date"	=> "{field} is set incorrectly.",
			)
		);

		$this->form_validation->set_rules("remarks","Notes","xss_clean|trim|max_length[255]",
			array(
				'max_length'	=> "{field} cannot exceed 255 characters in length.",
			)
		);

		$this->form_validation->set_rules('is_pregnant', 'Is pregnant', 'trim|xss_clean');
	

	}

	public function validate_breeding(){

		$this->form_validation->set_rules('eartag_id', 'Dam ID', 'required|xss_clean|trim|integer|is_dam_exist[goat_profile.eartag_id]|greater_than[0]|is_active[goat_profile.eartag_id]|callback_breed_check|eartag_checker', 
			array(
				'required'			=> '{field} is required.',
				'integer'			=> '{field} must contain an integer.',
				'is_dam_exist'		=> '{field} is NOT a Sire or do not exist.',
				'is_active'			=> '{field} is NOT active. Please select another dam.',
				'greater_than'		=> '{field} cannot be less than or equal to zero.',
				'breed_check'		=> '{field} must be at least 10 months old',
				'eartag_checker'	=> '{field} is not a valid Eartag ID.',
			)
		);

		$this->form_validation->set_rules('partner_id', 'Sire ID', 'trim|required|is_sire_exist[goat_profile.eartag_id]|is_active[goat_profile.eartag_id]|eartag_checker|callback_breed_check',array(
				'required' 			=> '{field} is required.',
				'is_sire_exist'		=> '{field} is NOT existing.',
				'is_active'			=> '{field} is NOT active. Please select another sire.',
				'breed_check'		=> '{field} must be at least 10 months old',
				'eartag_checker'	=> '{field} is not a valid Eartag ID.',
			)
		);

		$this->form_validation->set_rules('perform_date', 'Breeding Date', 'required|xss_clean|trim|check_date',
			array(
				'required' 		=> '{field} is required.',
				"check_date"	=> "{field} is set incorrectly.",
			)
		);

		$this->form_validation->set_rules("remarks","Notes","xss_clean|trim|max_length[255]",
			array(
				'max_length'	=> "{field} cannot exceed 255 characters in length.",
			)
		);

		$this->form_validation->set_rules('is_pregnant', 'Is pregnant', 'trim|xss_clean');

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

	public function validate_pregcheck($activity_id){

		$this->form_validation->set_rules('preg_select', 'Pregnancy Status', 'trim|required|min_length[2]|max_length[3]|in_list[Yes,No]',
			array(
				"required"		=> "<strong>{field}</strong> is required.",
				"min_length"	=> "<strong>{field}</strong> must be at least 2 characters in length.",
				"max_length"	=> "<strong>{field}</strong> cannot exceed 3 characters in length.",
				"in_list"		=> "<strong>{field}</strong> must be <strong>'Positive'</strong> or <strong>'Negative'</strong> only.",
			)
		);
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata("breeding", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Failed</strong>&emsp;Please try again</p>
							</div>
						</div>");

			//echo "<script>$('#pregcheck_form').modal('show');</script>";

		} else {

			if($this->Goat_model->update_breeding($activity_id)){
				$status = $this->input->post("preg_select", TRUE);

				if($status == 'Yes'){
					$this->session->set_flashdata("breeding", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
													
									<div class='row'>
										<p><span class='fa fa-check-circle'></span>
										<strong>Success</strong>&emsp;Breeding Record successfully updated.</p>
									</div>
								</div>");

				} else {

					$this->session->set_flashdata("breeding", "<div class='alert alert-info col-12' role='alert' style='height: 50px;'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
													
									<div class='row'>
										<p><span class='fa fa-exclamation-circle-circle'></span>
										<strong>Info: </strong>&emsp;Breeding Record successfully save without changes.</p>
									</div>
								</div>");					
				}

			} else {

				$this->session->set_flashdata("breeding", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
												
								<div class='row'>
									<p><span class='fa fa-times-circle'></span>
									<strong>Failed</strong>&emsp;Breeding Record not updated.</p>
								</div>
							</div>");

			}

		}
		
		redirect(base_url('breeding/view'),'refresh');

	}
	

}

?>