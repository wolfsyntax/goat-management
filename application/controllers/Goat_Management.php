<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

#use Carbon\Carbon;
use Carbon\Carbon;

class Goat_Management extends CI_Controller {

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


	public function __construct() {
		parent::__construct ();
		$this->load->model('Goat_model');
		if($this->session->userdata('username')== "") redirect(base_url('login'),'refresh');
	}

/** 
-------------------------------------------------------------------------------------------
Goat Records View
-------------------------------------------------------------------------------------------
**/
	public function index(){
  	
		$data["body"] 			= "goats_management/goat_index";
		$data["title"]			= "Manage Goat";
		$data["footer"]			= "2";
		$data["header"]			= "1";
		$data["total_sire"]		= $this->Goat_model->count_sire();	//Goat that are Sire and active
		$data["total_dam"]		= $this->Goat_model->count_dam();	//Goat that are Dam and active
		$data["total_sold"]		= $this->Goat_model->count_sold(); 	//Goat that are sold already
		$data["available_sold"]	= $this->Goat_model->count_s(); 	//Goat that are available to be sold
		$data["total_loss"]		= $this->Goat_model->count_loss();
		$data["goat_record"]	= $this->Goat_model->show_goat_record();
		
		$data["breadcrumbs"] 	= array();
		$data["breadcrumb"]		= "Goat Management";

		//$data["manage_goat"]	= $this->Goat_model->show_record("goat_profile","status != 'sold'");

		$this->load->view("layouts/application",$data);

  	}


/** 
-------------------------------------------------------------------------------------------
Goat Specified Record View
-------------------------------------------------------------------------------------------
**/	

	public function manage_view($category, $ref_id){
  	
		$data["body"] 			= "goats_management/manage_view";
		$data["title"]			= "Goat Record";
		$data["footer"]			= "2";
		$data["header"]			= "1";

		$data["category"]		= $category;
		$data["goat_record"]	= $this->Goat_model->get_goat_info($category, $ref_id);
		$data['flag']			= FALSE;

		$data["breadcrumbs"] 	= array();
		$data["breadcrumb"]		= "Goat Management";

		foreach ($data['goat_record'] as $row) {
			if($row->gender == "female"){
				$data["child"]	= $this->Goat_model->get_child($row->eartag_id); 
				$data['flag']	= TRUE;
			}
		}

		$this->load->view("layouts/application",$data);

  	}

/** 
-------------------------------------------------------------------------------------------
Modify Goat Profile (Status)
-------------------------------------------------------------------------------------------
**/
	public function manageStatus($eartag_id){

		$data = array(
			'body' 				=> 'goats_management/manage_status', 
			'title'				=> 'Manage Status',
			'eartag_id'			=> $eartag_id,
			'mrecord'			=> $this->Goat_model->show_loss_records($eartag_id, $this->session->userdata("user_id")),
			"breadcrumbs" 		=> array(),
			"breadcrumb"		=> "Goat Management",

		);

		$this->load->view("layouts/application",$data);

	}

	public function manage_status($eartag_id){

		$this->form_validation->set_rules('eartag_id', 'Eartag ID', 'required|xss_clean|trim|integer|is_sire_exist[goat_profile.eartag_id]|greater_than[0]|eartag_checker', 
			array(
				'eartag_checker'	=> "{field} is not a valid Eartag ID.",
				'required'			=> '{field} is required.',
				'integer'			=> '{field} must contain an integer.',
				'is_sire_exist'		=> '{field} is NOT a Sire or do not exist.',
				'greater_than'		=> '{field} cannot be less than or equal to zero.',
			)
		);

		$this->form_validation->set_rules('loss_caused', 'Cause', 'trim|required|min_length[4]|max_length[8]',array(
				'min_length'		=> '{field} must be at least 4 characters in length.',
				'max_length'		=> '{field} cannot exceed 8 characters in length.',
				'required'			=> '{field} is required.',
			)
		);

		$this->form_validation->set_rules('perform_date', 'Date of Loss', 'required|xss_clean|trim|check_date',
			array(
				'required' 			=> '{field} is required.',
				"check_date"		=> "{field} is set incorrectly.",
			)
		);

		$this->form_validation->set_rules("remarks","Notes","xss_clean|trim|max_length[255]",
			array(
				'max_length'		=> "{field} cannot exceed 255 characters in length.",
			)
		);

		if ($this->form_validation->run() == FALSE) {
			
			//View for Manage Status form
			self::manageStatus($eartag_id);

		} else {

			if($this->Goat_model->loss_record()){
				redirect(base_url('manage/goat'),'refresh');
			} else {
				self::manageStatus($eartag_id);
			}

		}

	}

	

/** 
-------------------------------------------------------------------------------------------
Modify Goat Profile
-------------------------------------------------------------------------------------------
**/
	
	public function manage_edit_view($category, $action_id){ //$purchase_id or $birth_id
		
  		if(preg_match("/[0-9]+/", $action_id) && intval($action_id) > 0){
		
			$data["body"] 			= "goats_management/edit_form";
			$data["title"]			= "Goat Record";
			$data["footer"]			= "2";
			$data["header"]			= "1";

			$data["goat_record"]	= $this->Goat_model->show_record("goat_profile","eartag_id = {$eartag_id}");
			$data["sire_id"]		= 0;

			$data["breadcrumbs"] 	= array();
			$data["breadcrumb"]		= "Goat Management";

			foreach ($data["goat_record"] as $row) {
				$data["sire_id"]	= $row->sire_id;
			}

			$data["url"]			= "";

			$this->load->view("layouts/application",$data);

		} else {

			show_404();
			
		}

  	}

/** 
-------------------------------------------------------------------------------------------
Add Goat Record
-------------------------------------------------------------------------------------------
**/

	public function validate_birth_info(){
		
		$this->form_validation->set_rules('birth_date','Birth Date',
		'required|xss_clean|trim|check_date',
		array(
			'required' => "{field} is required.",
			"check_date"	=> "{field} is set incorrectly.",
			)
		);
		
		$this->form_validation->set_rules('sire_id','Sire ID',
		'required|xss_clean|trim|integer|is_sire_exist[goat_profile.eartag_id]|greater_than[0]|callback_sire_eartag_check|callback_breed_check',
		array(
			'required' 			=> '{field} is required.',
			'is_sire_exist' 	=> '{field} is NOT a Sire ID or do not exist.',
			"integer" 			=> "{field} must contain only integer numbers.",	
			"greater_than"		=> "{field} must be greater than zero.",
			"sire_eartag_check"	=> "{field} must not be the same to Eartag and Dam ID.",
			'breed_check'		=> "{field} must be atleast 10 months old.",
			)
		);

		$this->form_validation->set_rules('dam_id','Dam ID',
		'required|xss_clean|trim|integer|is_dam_exist[goat_profile.eartag_id]|greater_than[0]|callback_dam_eartag_check|callback_breed_check',
		array(
			'required' 			=> '{field} is required.',
			'is_dam_exist' 		=> '{field} do not exist.',
			"integer" 			=> "{field} must contain only integer numbers.",	
			"greater_than"		=> "{field} must be greater than zero.",
			"dam_eartag_check"	=> "{field} must not be the same to Eartag and Sire ID.",
			"breed_check"		=> "{field} must be atleast 10 months old.",
			)
		);

	}

	public function validate_purchase_info(){
		
		$this->form_validation->set_rules('purchase_weight','Weight Purchase',
		'required|xss_clean|trim|numeric|greater_than[0]',
		array(
			'required' 			=> '{field} is required.',
			"numeric" 			=> "{field} must contain only numbers.",	
			"greater_than"		=> "{field} must be greater than zero",
			)
		);

		$this->form_validation->set_rules('purchase_price','Purchased Price',
		'required|xss_clean|trim|numeric|greater_than[0]',
		array(
			'required' 			=> '{field} is required.',
			'is_dam_exist' 		=> '{field} must be a digit.',
			"numeric" 			=> "{field} must contain only numbers.",
			"greater_than"		=> "{field} must be greater than zero.",
			)
		);


		$this->form_validation->set_rules('purchase_date','Purchased Date',
		'required|xss_clean|trim|check_date',
		array(
			'required' 			=> '{field} is required.',
			"check_date"		=> "{field} is set incorrectly.",
			)
		);

		$this->form_validation->set_rules('purchase_from','Vendor','required|xss_clean|trim',
		array(
			"required" 			=> "{field} is required.",
			)
		);

	}


	public function view_goat_record($category,$record_id){
		//echo "<h1>{$category}</h1>";

		$data["body"] 			= "goats_management/edit_form";
		$data["title"]			= "Edit record";
		$data["footer"]			= "2";
		$data["header"]			= "1";

		$data["breadcrumbs"] 	= array();
		$data["breadcrumb"]		= "Goat Management";
		
//		$this->Goat_model->get_goat_info($category, $ref_id);
		
		$data['dam_record'] 	= $this->Goat_model->goat_breed('female');
		
		$data['sire_record'] 	= $this->Goat_model->goat_breed('male');

//		$data['dam_record'] 	= $this->Goat_model->show_record('Goat_Profile',"gender = 'female' AND status = 'active' AND eartag_id != {$record_id}");
		
//		$data['sire_record'] 	= $this->Goat_model->show_record('Goat_Profile',"gender = 'male' AND status = 'active' AND eartag_id != {$record_id}");

		#*
		//get_goat_info($category = "birth", $eartag_id)

		$data["goat_record"] 	= $this->Goat_model->get_goat_info($category, $record_id);
		
		$data['sire_id']		= 0;
		
		foreach ($data['goat_record'] as $row) {
			$data['sire_id'] 	= $row->sire_id;
		}

		$this->load->view("layouts/application",$data);

		//self::validate_goat_info($category,"edit");

	}

	public function validate_mod_info(){

		$this->form_validation->set_rules('eartag_id','Tag ID',
			'required|integer|xss_clean|trim|greater_than[0]|eartag_checker',
			array(
				'required' 			=> '{field} is required.',
				'integer' 			=> '{field} must contain an integer.',
				"greater_than"		=> "{field} must be greater than zero.",
				"eartag_checker"	=> "{field} is not a valid Eartag ID.",			
			)
		);
		
		$this->form_validation->set_rules("nickname", "Nickname", "required|trim|xss_clean|name_check|max_length[255]", array(
				'required'			=> '{field} is required.',
				"name_check"		=> "{field} is not a valid and must be at least 2 characters in length.",
				"max_length"		=> "{field} cannot exceed 255 characters in length."
			)
		);

		$this->form_validation->set_rules('eartag_color','Tag Color',
		'required|xss_clean|trim|alpha_spaces',
		array(
			'required' 			=> '{field} is required.',
			'alpha_spaces'		=> '{field} may only contain alphabetical characters and spaces',
			)
		);

		$this->form_validation->set_rules('gender','Gender',
		'required|xss_clean|trim|alpha_spaces|in_list[male,female]',
			array(
				'required' 			=> '{field} is required.',
				'alpha_spaces'		=> '{field} may only contain alphabetical characters and spaces.',
				'in_list'			=> '{field} is not a valid gender',
			)
		);

		$this->form_validation->set_rules('body_color','Body Color',
		'required|xss_clean|trim|alpha_spaces',
		array(
			'required' 			=> '{field} is required.',
			'alpha_spaces'		=> '{field} may only contain alphabetical characters and spaces.',
			)
		);


		$this->form_validation->set_rules('category', 'Category', 'trim|required', array("required" => "{field} is required."));

		$category = $this->input->post("category", TRUE);
		$ref_id = $this->input->post("ref_id", TRUE);		

		if($category === "birth"){
			
			self::validate_birth_info();

		}elseif ($category === "purchase") {

			self::validate_purchase_info();

		}


		$this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');


		if($this->form_validation->run() == FALSE){

			
			self::view_goat_record($category,$ref_id);

		} else {

			if($this->Goat_model->edit_goat($ref_id)){

				$this->session->set_flashdata('goat', '<div class="alert alert-success col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-check-circle"></span>
							<strong>Successfully</strong>&emsp; Modifying Goat Profile.</p>
						</div>
					</div>');
				

			} else {

				$this->session->set_flashdata('goat', '<div class="alert alert-danger col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-exclamation-circle"></span>
							<strong>Failed</strong>&emsp;Error: Cannot Update Goat Profile.</p>
						</div>
					</div>');

			}

			redirect(base_url(). "manage/goat");

		}

	}

	public function validate_goat_info($category, $action = "default") {
		#*
		//echo "<h1>{$category}</h1>";
		
		$this->form_validation->set_rules('eartag_id','Tag ID',
			'required|integer|xss_clean|trim|is_unique[goat_profile.eartag_id]|greater_than[0]|eartag_checker',
			array(
				'required' 			=> '{field} is required.',
				'integer' 			=> '{field} must contain an integer.',
				'is_unique' 		=> '{field} is already existed.',
				"greater_than"		=> "{field} must be greater than zero.",			
				'eartag_checker'	=> "{field} is not a valid Eartag ID.",
			)
		);
		
		$this->form_validation->set_rules("nickname", "Nickname", "required|trim|xss_clean|name_check|max_length[255]", array(
				'required'			=> '{field} is required.',
				"name_check"		=> "{field} is not a valid and must be at least 2 characters in length.",
				"max_length"		=> "{field} cannot exceed 255 characters in length."
			)
		);

		$this->form_validation->set_rules('eartag_color','Tag Color',
		'required|xss_clean|trim|alpha_spaces',
		array(
			'required'				=> '{field} is required.',
			'alpha_spaces'			=> '{field} may only contain alphabetical characters and spaces.',
			)
		);

		$this->form_validation->set_rules('gender','Gender',
		'required|xss_clean|trim|alpha_spaces',
		array(
			'required'				=> '{field} is required.',
			'alpha_spaces'			=> '{field} may only contain alphabetical characters and spaces.',
			)
		);

		$this->form_validation->set_rules('body_color','Body Color',
		'required|xss_clean|trim|alpha_spaces',
		array(
			'required' 				=> 'Body Color is required.',
			'alpha_spaces'			=> '{field} may only contain alphabetical characters and spaces.',
			)
		);


		$this->form_validation->set_rules('category', 'Category', 'trim|required|min_length[5]|max_length[12]',array("required" => "{field} is required."));

		if($category === "birth"){
			
			self::validate_birth_info();

		}elseif ($category === "purchase") {

			self::validate_purchase_info();

		}


		$this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');

		if($this->form_validation->run() == FALSE){
			
			self::add_goats();
			
		}else{
;
			if($this->Goat_model->add_goat($category) > 0){

				$this->session->set_flashdata('goat', '<div class="alert alert-success col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-check-circle"></span>
							<strong>Success</strong>&emsp;New goat added successfully.</p>
						</div>
					</div>');

			}else{

				$this->session->set_flashdata('goat', '<div class="alert alert-danger col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-exclamation-circle"></span>
							<strong>Failed</strong>&emsp;Error: Cannot Add Goat.</p>
						</div>
					</div>');

			}

			redirect(base_url(). "manage/goat");
			//self::add_goats();

		}

 	}

	public function add_goats(){

		$data["body"] 			= "goats_management/goat_form";
		$data["title"]			= "Add new record";
		$data["footer"]			= "2";
		$data["header"]			= "1";

		$data['dam_record'] 	= $this->Goat_model->goat_breed('female');
		
		$data['sire_record'] 	= $this->Goat_model->goat_breed('male');

		$data["breadcrumbs"] 	= array(
			"goat_management"	=> "manage/goat",
		);
		$data["breadcrumb"]		= "Add New Goat";
		
//		$data['dam_record'] 	= $this->Goat_model->show_record('Goat_Profile',"gender = 'female' AND status = 'active'");
		
//		$data['sire_record'] 	= $this->Goat_model->show_record('Goat_Profile',"gender = 'male' AND status = 'active'");

		$this->load->view("layouts/application",$data);

	}

/** 
-------------------------------------------------------------------------------------------
Goat Sales
-------------------------------------------------------------------------------------------
|	sales_index 	= table
|	goat_sales 		= form

**/
	
	public function sell_index(){

		$data["breadcrumbs"] 	= array();
		$data["breadcrumb"]		= "Goat Sales";
  	
		$data["body"] 			= "financials/sales_index";
		$data["title"]			= "Sales Record";
		$data["footer"]			= "2";
		$data["header"]			= "1";
		$data["goat_record"] 	= $this->Goat_model->show_all_sales();

		$this->load->view("layouts/application",$data);

  	}

	public function sell_goats(){

		$data["breadcrumbs"] 	= array(
			'goat_sales'		=> 'goat/sales',
		);
		$data["breadcrumb"]		= "Add Sales";
		
		$data["body"] 			= "financials/goat_sales";
		$data["title"]			= "Add new Sales";
		$data["footer"]			= "2";
		$data["header"]			= "1";

		$data['goat_record'] 	= $this->Goat_model->available_goat(); //$this->Goat_model->show_record('goat_profile',"status = 'active' AND ");

		$this->load->view("layouts/application",$data);

	}

	public function modify_sales_info($sales_id){
		
		$data["body"] 			= "financials/edit_form";
		$data["title"]			= "Modify Sales Record";
		$data["footer"]			= "2";
		$data["header"]			= "1";

		$data["breadcrumbs"] 	= array();
		$data["breadcrumb"]		= "Goat Management";
		
		if($sales_id >= 1){
			
			$data['goat_record'] = $this->Goat_model->show_sales($sales_id);

			$this->load->view("layouts/application",$data);

		}else {
			show_404();
		}

	}


	public function transaction_validation(){
		
		if($this->session->userdata("username") != ""){

			/**
			**	Todo: add new validation rules for checking if it is not already sold
			**/
			$this->form_validation->set_rules('eartag_id', 'Eartag ID', 'trim|required|callback_livestock_check|is_active[goat_profile.eartag_id]|is_exist[goat_profile.eartag_id]',
				array(
					'is_active'			=> '{field} is Inactive. You cannot sell it.',
					'is_exist'			=> '{field} do not exist in your Goat Records.',
					'required'			=> '{field} is required.',	
					'livestock_check'	=> '{field} is NOT available or inactive. It must be atleast 12 months old.+'
				)
			);

			$this->form_validation->set_rules("transact_date","Date sold","required|xss_clean|trim|check_date",
				array(
					"required" 		=> "{field} is required.",
					'check_date' 	=> "Incorrect date settings.",
				)
			);

			$this->form_validation->set_rules("sold_to","Buyer Name","required|xss_clean|trim",
				array(
					"required" 		=> "{field} is required",
				)
			);

			$this->form_validation->set_rules("weight","Total Weight","required|xss_clean|trim|numeric",
				array(
					"required" 		=> "{field} is required.",
					"numeric"		=> "{field} is invalid value.",
				)
			);

			$this->form_validation->set_rules("price_per_kilo","Price per Kilo","required|xss_clean|trim|numeric",
				array(
					"required" 		=> "{field} is required.",
					"numeric"		=> "{field} is invalid value.",
				)
			);


			$this->form_validation->set_rules("remarks","Notes","xss_clean|trim");						
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

		} else {

			show_404();

		}

	}


	public function validate_modify_transaction($sales_id){

		$this->form_validation->set_rules("eartag_id","Tag ID","required|numeric|xss_clean|trim|is_exist[goat_profile.eartag_id]|greater_than[0]|callback_livestock_check|eartag_checker",
			array(
				"required" 			=> "{field} is required.",
				"numeric" 			=> "Not a valid {field} provided. Only digits are allowed",
				"is_exist" 			=> "{field} is not existing.",
				"greater_than"		=> "{field} must be greater than zero.",			
				"livestock_check"	=> "{field} must be atleast 12 months old",
				"eartag_checker"	=> "{field} is not a valid Eartag ID.",
			)
		);

		self::transaction_validation();

		if($this->form_validation->run() === TRUE){

			if($this->Goat_model->edit_sales($sales_id)){

				$this->session->set_flashdata("goat", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
						<div class='row p-2'>
							<p>&emsp;<span class='fa fa-check-circle'></span>
							<strong>Success</strong>&emsp;Modifying Sales record.&nbsp;<a href='".base_url()."goat/sales'>View Sales</a></p>
						</div>
					</div>");

			} else {

				$this->session->set_flashdata("goat", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p>&emsp;<span class='fa fa-exclamation-circle-circle'></span>
								<strong>Failed</strong>&emsp;Modifying Sales Record.</p>
							</div>
						</div>");

			}
			
	
		} 

		self::modify_sales_info($sales_id);
				
	}

	public function validate_transaction(){

		$this->form_validation->set_rules("eartag_id","Tag ID","required|numeric|xss_clean|trim|is_exist[goat_profile.eartag_id]|greater_than[0]|is_active[goat_profile.eartag_id]|callback_livestock_check|eartag_checker",
			array(
				"required" 			=> "{field} is required.",
				"numeric" 			=> "Not a valid {field} provided. Only digits are allowed",
				"is_exist" 			=> "{field} is not existing.",
				"greater_than"		=> "{field} is not valid.",
				"is_active"			=> "{field} is not available to be sold.",
				"livestock_check"	=> "{field} is not available to be sold. It must be atleast 12 months old ",
				"eartag_checker"	=> "{field} is not a valid Eartag ID.",
			)
		);
		
		self::transaction_validation();

		if($this->form_validation->run() === FALSE){

			self::sell_goats();

		}else{

			if($this->Goat_model->goat_sales()){
						
				$this->session->set_flashdata("goat", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
						<div class='row p-2'>
							<p><span class='fa fa-check-circle'></span>
							<strong>Success</strong>&emsp;Sales record added.&nbsp;<a href='".base_url()."goat/sales'>View Sales</a></p>
						</div>
					</div>");

			}else{

				$this->session->set_flashdata("goat", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Failed</strong>&emsp;Sales Record not added.</p>
							</div>
						</div>");
			}

			self::sell_goats();

		}

	}

/** 
-------------------------------------------------------------------------------------------
Goat Sales Specified Record view
-------------------------------------------------------------------------------------------
**/

	public function transaction_record($sale_id){
		//preg_match ("/^(\+63|0)9[0-9]{9}$/" , $str)
		if(preg_match("/[0-9]+/", $sale_id) && intval($sale_id) > 0){

			$data["body"] 	= "financials/sale_view";
			$data["title"] 	= "Sale Record: {$sale_id}";

			$data["sale_record"] = $this->Goat_model->show_sales($sale_id);

			$data["breadcrumbs"] 	= array();
			$data["breadcrumb"]		= "Goat Management";

			$this->load->view("layouts/application", $data);

		}else{

			show_404();

		}


	}

/** 
-------------------------------------------------------------------------------------------
Add Goat Record
-------------------------------------------------------------------------------------------


	public function validate_eartag($str){

		if($this->Goat_model->show_record('goat_profile',"status = 'active'")){
			return true;
		}

		return false;

	}
**/


	public function remove_sales($sales_id){
		
		if($this->Goat_model->remove_sales($sales_id)){
			redirect(base_url("goat/sales"));
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

	public function livestock_check($id){
		
		return $this->Goat_model->is_available_goat($id);

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

?>