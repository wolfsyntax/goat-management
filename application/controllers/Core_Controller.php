<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Core_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model('Goat_model');

		if(!$this->session->userdata('user_id')) redirect(base_url());

		if(!$this->session->userdata('user_type') === 'tenant' || !$this->session->userdata('user_type') === 'farm owner') show_error("Your client does not have permission to get requested page in the server", 403, "Forbidden");


		/**
		** Only the tenant has the privileges of this controller
		**/
		if($this->session->userdata('user_type') != 'tenant') show_404();

		date_default_timezone_set("Asia/Manila");

		//Calendar Preference
		$prefs = array(
			'start_day'    				=> 'sunday',
			'month_type'   				=> 'long',
			'day_type'					=> 'abr',
		);

		$prefs['template'] = array(

			'cal_cell_start_today'		=> '<td class="" style="background: #3b5998">',
			'cal_cell_no_content_today'	=> '<div class="text-white" style="font-weight: lighter; font-size: 11px;">{day}</div>',
			'table_open'				=> '<table class="table table-bordered">',
			'cal_cell_content'			=> '<a href="{content}" class="text-primary">{day}</a>',
			'cal_cell_content_today'	=> '<div class=""><a href="{content}" class="text-white font-weight-bold" title="Today\'s Task" style="font-weight: bolder; font-size: 14px;">{day}</a></div>',
		);

		$this->load->library('calendar',$prefs);
				
	}

	public function index() {
					
		$context = array(
			
			'body' 				=> 'modules/core/goat_index',
			'title' 			=> 'Goat Management',
			'goat_record'		=>  $this->Goat_model->show_goat_record(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
			),
			'breadcrumb'		=> 'Manage Goat',
			'current'			=> 'management',	

		);

		$this->load->view('layouts/application',$context);

	}


	public function create() {
					
		$context = array(
			
			'body' 				=> 'modules/core/goat_form',
			'title' 			=> 'Goat Management : New',
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
				'Manage Goat'	=> 'manage/goat',
			),
			'breadcrumb'		=> 'New Goat',			
			'dam_record'	 	=> $this->Goat_model->goat_breed('female'),
			'sire_record'		=> $this->Goat_model->goat_breed('male'),
			'current'			=> 'management',	

		);

		$this->load->view('layouts/application',$context);

	}

	public function sales() {
					
		$context = array(
			
			'body' 				=> 'modules/transaction/sales_index',
			'title' 			=> 'Goat Sales',
			'goat_record'		=> $this->Goat_model->show_all_sales(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
			),
			'breadcrumb'		=> 'Manage Finances',	
			'current'			=> 'finance',		

		);

		$this->load->view('layouts/application',$context);


	}

	public function create_sales() {
					
		$context = array(
			
			'body' 					=> 'modules/transaction/goat_sales',
			'title' 				=> 'Goat Sales : New',
			'breadcrumbs'			=> array(
				'Dashboard'			=> 'dashboard',
				'Manage Finances'	=> 'goat/sales',
			),
			'breadcrumb'			=> 'New Sales',		
			'goat_record'		=> $this->Goat_model->available_goat(),
			'current'			=> 'finance',		

		);

		$this->load->view('layouts/application',$context);

	}

	public function template() {

		
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

/**
**			Goat Management
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
		'required|xss_clean|trim|integer|greater_than[0]|callback_breed_check|is_sire_exist[goat_profile.eartag_id]',
		array(
			'required' 			=> '{field} is required.',
			'is_sire_exist' 	=> '{field} is NOT a Sire or do not exist.',
			"integer" 			=> "{field} must contain only integer numbers.",	
			"greater_than"		=> "{field} must be greater than zero.",
			#"validate_sire"		=> "{field} must not be the same to Eartag and Dam ID.",
			'breed_check'		=> "{field} must be an existing sire and atleast 10 months old.",
			)
		);

		$this->form_validation->set_rules('dam_id','Dam ID',
		'required|xss_clean|trim|integer|greater_than[0]|callback_breed_check|is_dam_exist[goat_profile.eartag_id]',
		array(
			'required' 			=> '{field} is required.',
			'is_dam_exist' 		=> '{field} is NOT a Dam or do not exist.',
			"integer" 			=> "{field} must contain only integer numbers.",	
			"greater_than"		=> "{field} must be greater than zero.",
			#"validate_dam"		=> "{field} must not be the same to Eartag and Sire ID.",
			"breed_check"		=> "{field} must be an existing dam and atleast 10 months old.",
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

	public function validate_goat_info($category, $action = "default") {
		#*
		#echo "<h1>{$category}</h1>";
		
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
		'required|xss_clean|trim',
		array(
			'required'				=> '{field} is required.',
#			'alpha_spaces'			=> '{field} may only contain alphabetical characters and spaces.',
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
			
			self::create();
			
		}else{

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

	public function validate_mod_info($category, $ref_id){

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

/**
**			Goat Transaction
**/

	public function modify_sales_info($sales_id){ 
		
		$context = array(
			
			'body' 					=> 'modules/transaction/edit_form',
			'title' 				=> 'Modify Sales Record',
			'goat_record'			=> $this->Goat_model->show_sales($sales_id),
			'breadcrumbs'			=> array(
				'Dashboard'			=> 'dashboard',
				'Manage Finances'	=> 'goat/sales',
			),
			'breadcrumb'			=> 'Update Sales',
			'current'				=> 'finance',

		);


		if($sales_id >= 1){
			

			$this->load->view('layouts/application',$context);


		}else {
			show_404();
		}

	}


	public function transaction_validation($flag = TRUE){
		
		

		/**
		**	Todo: add new validation rules for checking if it is not already sold
		**/
		if($flag){		

			$this->form_validation->set_rules('eartag_id', 'Eartag ID', 'trim|required|callback_livestock_check|is_active[goat_profile.eartag_id]|is_exist[goat_profile.eartag_id]',
				array(
					'is_active'			=> '{field} is Inactive. You cannot sell it.',
					'is_exist'			=> '{field} do not exist in your Goat Records.',
					'required'			=> '{field} is required.',	
					'livestock_check'	=> '{field} is NOT available or inactive. It must be atleast 12 months old.'
				)
			);

		} else {

			$this->form_validation->set_rules('eartag_id', 'Eartag ID', 'trim|required|is_exist[goat_profile.eartag_id]',
				array(
					'is_exist'			=> '{field} do not exist in your Goat Records.',
					'required'			=> '{field} is required.',	
				)
			);

		}

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

		

	}


	public function update_sales($sales_id){

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

		self::transaction_validation(FALSE);

		if($this->form_validation->run() === TRUE){

			if($this->Goat_model->edit_sales($sales_id)){

				$this->session->set_flashdata("goat", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
						<div class='row p-2'>
							<p>&emsp;<span class='fa fa-check-circle'></span>
							<strong>Success</strong>&emsp;Modifying Sales record.</p>
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

		redirect(base_url('goat/sales'), 'refresh');

		//self::modify_sales_info($sales_id);
				
	}

	public function store_sales(){

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

			self::create_sales();

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

			self::create_sales();

		}

	}

	public function show_sales($sale_id){

		//preg_match ("/^(\+63|0)9[0-9]{9}$/" , $str)
		if(preg_match("/[0-9]+/", $sale_id) && intval($sale_id) > 0){

			$context = array(
				
				'body' 					=> 'modules/transaction/sale_view',
				'title' 				=> 'Goat Sales',
				'sale_record'			=>  $this->Goat_model->show_sales($sale_id),
				'breadcrumbs'			=> array(
					'Dashboard'			=> 'dashboard',
					'Manage Finances' 	=> 'goat/sales',
				),
				'breadcrumb'		=> 'Sales Record',
				'current'			=> 'finance',	

			);

			$this->load->view('layouts/application',$context);

		}else{

			show_404();

		}


	}

	public function remove_sales($sales_id){
		
		//*
		if(intval($sales_id) > 0){
			if($this->Goat_model->remove_sales($sales_id)) {
		
				$this->session->set_flashdata("goat", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Success</strong>&emsp;Sales Record not remove <a href='".base_url('manage/goat')."' class='nav-link d-inline-block'>View Goat Record</a>.</p>
							</div>
						</div>");

			} else {
				$this->session->set_flashdata("goat", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p><span class='fa fa-exclamation-circle'></span>
								<strong>Failed</strong>&emsp;Sales Record not remove.</p>
							</div>
						</div>");

			}
		}

		redirect(base_url('goat/sales'), 'refresh');

	}

	public function manage_view($category, $ref_id){
		
		$goat_record = $this->Goat_model->get_goat_info($category, $ref_id);
		$eartag_id = "";

		foreach ($goat_record as $key) {
			# code...
			$eartag_id = $key->eartag_id;
		}

		$health_record = $this->Goat_model->get_health_records($eartag_id);


		$context = array(
			
			'body' 				=> 'modules/core/manage_view',
			'title' 			=> 'Goat Management',
			'goat_record'		=>  $goat_record,
			'health_records'	=> 	$health_record,

			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
				'Manage Goat'	=> 'manage/goat',
			),
			'breadcrumb'		=> 'Goat record',
			'current'			=> 'management',	
			'flag'				=> FALSE,
		);
				
		foreach ($context['goat_record'] as $row) {

			if($row->gender == "female"){
				
				$context["child"]	= $this->Goat_model->get_child($row->eartag_id); 
				$context['flag']	= TRUE;

			}

		}

		$this->load->view('layouts/application',$context);

	}

	public function view_goat_record($category, $record_id){

		$context = array(
			
			'body' 				=> 'modules/core/edit_form',
			'title' 			=> 'Goat Record',
			'goat_record'		=>  $this->Goat_model->get_goat_info($category, $record_id),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
				'Manage Goat'	=> 'manage/goat',
			),
			'breadcrumb'		=> 'Update record',
			'current'			=> 'management',	

			'dam_record'		=> $this->Goat_model->goat_breed('female'),
			'sire_record'		=> $this->Goat_model->goat_breed('male'),
		);


		foreach ($context['goat_record'] as $row) {
			$context['sire_id'] = $row->sire_id;
		}

		$this->load->view('layouts/application',$context);

	}

	public function manageStatus($eartag_id){

		$data = array(
			'body' 				=> 'modules/core/manage_status', 
			'title'				=> 'Manage Status',
			'eartag_id'			=> $eartag_id,
			'mrecord'			=> $this->Goat_model->show_loss_records($eartag_id, $this->session->userdata("user_id")),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
				'Manage Goat'	=> 'manage/goat',
			),
			'breadcrumb'		=> 'Update Status',
			"current"			=> "management",
		);

		$this->load->view("layouts/application",$data);

	}

	public function manage_revert_status(){

		$this->form_validation->set_rules('eartag_id', 'Eartag ID', 'required|xss_clean|trim|integer|is_exist[goat_profile.eartag_id]|greater_than[0]|eartag_checker', 
			array(
				'eartag_checker'	=> "{field} is not a valid Eartag ID.",
				'required'			=> '{field} is required.',
				'integer'			=> '{field} must contain an integer.',
				'is_exist'			=> '{field} do not exist.',
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

		$this->form_validation->set_rules("remarks","Notes","xss_clean|trim|max_length[255]|required",
			array(
				'max_length'		=> "{field} cannot exceed 255 characters in length.",
			)
		);

		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

		if ($this->form_validation->run() == TRUE) {

			if($this->Goat_model->loss_record()){
				
				$this->session->set_flashdata('goat', '<div class="alert alert-success col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-check-circle"></span>
							<strong>Successfully</strong>&emsp; Modifying Goat Status.</p>
						</div>
					</div>');

			} else {

				$this->session->set_flashdata("goat", "<div class='alert alert-danger col-12' role='alert' style='height: 50px;'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
											
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Failed</strong>&emsp;Modifying Status.</p>
							</div>
						</div>");

				//

			}	

		} 

		self::index();
		

	}

	public function manage_status($eartag_id){

		$this->form_validation->set_rules('eartag_id', 'Eartag ID', 'required|xss_clean|trim|integer|is_exist[goat_profile.eartag_id]|greater_than[0]|eartag_checker', 
			array(
				'eartag_checker'	=> "{field} is not a valid Eartag ID.",
				'required'			=> '{field} is required.',
				'integer'			=> '{field} must contain an integer.',
				'is_exist'			=> '{field} do not exist.',
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

		$this->form_validation->set_rules("remarks","Notes","xss_clean|trim|max_length[255]|required",
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
** Custom Validation
**/	

	public function livestock_check($id){
		$id = explode('(', $id)[0];
		return $this->Goat_model->is_available_goat($id);

	}

	public function validate_dam($id){

		$sire_id = $this->input->post('sire_id', TRUE);
		
		if($id != $sire_id && $sire_id != ""){
			return TRUE;
		}
		
		return FALSE;

		//echo "<h1>Sire ID: [{$id}]</h1>";

	}

	public function validate_sire($id){
		
		$dam_id = $this->input->post('dam_id', TRUE);
		
		if($id != $dam_id && $dam_id != ""){
			return TRUE;
		}
		
		return FALSE;

		//echo "<h1>Sire ID: [{$id}]</h1>";

	}

	public function breed_check($id){
		//echo "<h1>Sire ID: [{$id}]</h1>";		
		return $this->Goat_model->is_breed($id);

	}

	public function sire_breed_check($id){
		//echo "<h1>Sire ID: [{$id}]</h1>";		
		return $this->Goat_model->is_breed($id,"male");

	}

	public function dam_breed_check($id){
//		echo "<h1>Sire ID: [{$id}]</h1>";		
		return $this->Goat_model->is_breed($id,"female");

	}

}

?>