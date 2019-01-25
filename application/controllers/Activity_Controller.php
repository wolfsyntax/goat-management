<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

#use Carbon\Carbon;
use Carbon\Carbon;

class Activity_Controller extends CI_Controller {

	/**

		must be at least _ characters in length.								- min_length
		cannot exceed _ characters in length.									- max_length
		must contain only numbers.												- numeric
		must contain a decimal number.											- decimal
		must contain an integer.												- integer
		is required.															- required
		must be exactly _ characters in length.									- exact_length
		must contain a number less than _.										- less_than
		must contain a number less than or equal to _.							- less_than_equal_to
		must contain a number greater than or equal to _.						- greater_than_equal_to
		must contain a number greater than _.									- greater_than
		must be one of: _,_,_.													- inlist[_,_,_]
		may only contain alphabetical characters.								- alpha
		may only contain alpha-numeric characters.								- alpha_numeric
		may only contain alpha-numeric characters and spaces.					- alpha_numeric_spaces
		may only contain alpha-numeric characters, underscores, and dashes.		- alpha_dash
		must contain a valid IP.												- valid_ip
		must contain a valid email address.										- valid_email
		must contain all valid email addresses.									- valid_emails

	**/


	public function __construct()
	{
		parent::__construct ();
		$this->load->model('Goat_model');
		$this->load->model('Inventory_model');

	}

	public function index()
	{
		
		$data = array(
			"body"			=> "test",
			"title"			=> "Sample",
			"breadcrumbs" 	=> array(
				"dashboard" => "dashboard",
			),
			"breadcrumb"	=> "Goat Management",
		);

		$this->load->view("layouts/application",$data);

	}


/*-------------------------------------------------------------------------------------------
						Activity Module
-------------------------------------------------------------------------------------------*/

	public function activity_view($activity){
		
		if($this->session->userdata('username')){

			$flag = FALSE;

			switch ($activity) {
				case 'breeding':
					$data = array(
					
						'body' 				=> "activities/breeding_table", 
						'title' 			=> "Breeding", 
						'breeding_record' 	=> $this->Goat_model->get_breeding_records(),
						"breadcrumbs" 		=> array(),
						"breadcrumb"		=> "Breeding Management",						
					
					);
					# code...
					break;
				
				case 'checkup':
					$data = array(
					
						'body' 				=> "activities/health_check_table", 
						'title' 			=> "Health Check", 
						'health_records' 	=> $this->Goat_model->show_active_goats(),
						"breadcrumbs"	 	=> array(),
						"breadcrumb"		=> "Health Management",						
					
					);
					# code...
					break;
				
				default:
					$flag = TRUE;		
					break;
			}

			if($flag){

				show_404();

			}else{

				$this->load->view("layouts/application",$data);

			}

		} else {

			redirect(base_url('login'),'refresh');

		}

	}

	public function activity_new($activity){

		if($this->session->userdata('username')){
			$flag = FALSE;

			switch ($activity) {
				case 'breeding':
					$data = array(
			
						'body' 					=> "activities/breeding_form", 
						'title' 				=> "Breeding", 
						'sire_record'			=> $this->Goat_model->goat_breed('male'),
						'dam_record'			=> $this->Goat_model->goat_breed('female'),
						"breadcrumbs" 			=> array(
							"breeding_records" 	=> "activity/breeding/view",
						),
						"breadcrumb"			=> "Add Breeding Record",					
			
					);
					# code...
					break;
				
				case 'checkup':

					$data = array(
						'body' 					=> "activities/health_check_new", 
						'title' 				=> "Health Checkup", 
						'goat_record'			=> $this->Goat_model->show_record('Goat_Profile',"status = 'active'"),
						'vaccine'				=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Vaccine'"),
						'supplement'			=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Supplement'"),						
						
						"breadcrumbs" 			=> array(
							"health_management" => "activity/checkup/view",
						),
						"breadcrumb"			=> "Health Management",						
					
					);
					# code...
					break;
								
				
				default:

					$flag = TRUE;		
					break;
			}

			if($flag){

				show_404();

			}else{
				//echo "<h1>NEW ACTIVITY</h1>";
				$this->load->view("layouts/application",$data);

			}

		} else {

			redirect(base_url('login'),'refresh');

		}

	}

	public function activity_edit($activity, $ref_id){

		if($this->session->userdata('username')) {

			$flag = FALSE;

			switch ($activity) {
				case 'breeding':
					$data = array(
					
						'body' 				=> "activities/breed_edit_activity", 
						'title' 			=> "Breeding", 
						'breeding_record' 	=> $this->Goat_model->show_breeding_record($ref_id),

						"breadcrumbs" 		=> array(),
						"breadcrumb"		=> "Modify Breeding",						
					
					);
					# code...
					break;
				
				case 'checkup':
					$data = array(
					
						'body' 					=> "activities/breeding_form", 
						'title' 				=> "Breeding", 
						'sire_record'			=> $this->Goat_model->show_record('Goat_Profile',"gender = 'male' AND status = 'active'"),
						'dam_record'			=> $this->Goat_model->dam_breed(),

						'vaccine'				=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Vaccine'"),
						'supplement'			=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Supplement'"),												
						"breadcrumbs" 			=> array(
							"dashboard" 		=> "dashboard",
						),
						"breadcrumb"			=> "Goat Management",				
					
					);
					# code...
					break;
								
				default:
					$flag = TRUE;		
					break;
			}

			if($flag){

				show_404();

			} else {

				$this->load->view("layouts/application",$data);

			}

		}else{

			redirect(base_url('login'),'refresh');

		}

	}
	
	public function health_view($eartag_id){

		$data = array(

			"body"						=> "activities/health_check_new",
			"title"						=> "",
			"health_records"			=> $this->Goat_model->get_health_records($eartag_id),
//			"inventory"			=> $this->Inventory_model->fetch_items(),
			'vaccine'					=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Vaccine'"),
			'supplement'				=> $this->Goat_model->show_record('Inventory_Record',"item_type = 'Supplement'"),						

			"breadcrumbs" 				=> array(
							"dashboard" => "dashboard",
						),
			"breadcrumb"				=> "Goat Management",			
	
		);

		$this->load->view("layouts/application",$data);

	}

	public function validate_breeding_form(){
		
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

			echo "<script>$('#pregcheck_form').modal('show');</script>";

		} else {

			if($this->Goat_model->update_breeding($activity_id)){

				$this->session->set_flashdata("breeding", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
												
								<div class='row'>
									<p><span class='fa fa-check-circle'></span>
									<strong>Success</strong>&emsp;Breeding Record successfully updated.</p>
								</div>
							</div>");

			} else {

				$this->session->set_flashdata("breeding", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
												
								<div class='row'>
									<p><span class='fa fa-check-circle'></span>
									<strong>Failed</strong>&emsp;Breeding Record not updated.</p>
								</div>
							</div>");

			}

		}
		
		redirect(base_url('activity/breeding/view'),'refresh');

	}

	public function validate_breeding() {

		self::validate_breeding_form();

		if ($this->form_validation->run() == FALSE) {
			
			self::activity_new("breeding");

		} else {

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
								<p><span class='fa fa-check-circle'></span>
								<strong>Failed</strong>&emsp;Breeding Record not added.</p>
							</div>
						</div>");

			}

			redirect(base_url('activity/breeding/view'),'refresh');

		}

	}

	public function validate_activity($activity){

		switch ($activity) {
			case 'breeding':
				//echo "<h1>Activity Type: {$activity}</h1>";
				self::validate_breeding();
				break;

			default:
				show_404();
				break;
		}

	}


/**
**		Form Validation (Add-ons)
**/

	public function dam_eartag_check($dam_id){
		
	#	echo "<h1>Dam Eartag Check</h1>";

		$sire_id 	= $this->input->post("sire_id", TRUE);
		$eartag_id 	= $this->input->post("eartag_id", TRUE);

		if($dam_id == $sire_id || $dam_id == $eartag_id){

			return FALSE;

		} else {
			
			return TRUE;

		}

	}

	public function breed_check($id){
		
		return $this->Goat_model->is_breed($id);

	}

	public function sire_eartag_check($sire_id){
		
	#	echo "<h1>Sire Eartag Check</h1>";

		$dam_id 	= $this->input->post("dam_id", TRUE);
		$eartag_id 	= $this->input->post("eartag_id", TRUE);

		if($sire_id == $dam_id || $sire_id == $eartag_id){

			return FALSE;

		} else {
			
			return TRUE;

		}

	}

	public function eartag_check($eartag_id){
		
	#	echo "<h1>Eartag Check</h1>";

		$dam_id 	= $this->input->post("dam_id", TRUE);
		$sire_id 	= $this->input->post("sire_id", TRUE);

		if($sire_id == $eartag_id || $dam_id == $eartag_id){

			return FALSE;

		} else {
			
			return TRUE;

		}

	}
/*
	public function eartag_checker($str)
	{
		
		if(preg_match("/[0-9]{6}+/", $str) && intval($str) > 0){
			return TRUE;
		}

		return FALSE;

	}
*/
}

/**
** Free Tutorial (Lynda, Coursera, Udemy, etc.)
** http://s10.bitdownload.ir/Learning.2/
**/