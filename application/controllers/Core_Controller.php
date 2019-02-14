<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Core_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model('Goat_model');

		if(!$this->session->userdata('user_id')) redirect(base_url());

		if(!$this->session->userdata('user_type') === 'sysadmin') show_404();

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

/**
**			Goat Transaction
**/

	public function modify_sales_info($sales_id){
		
		$data["body"] 			= "financials/edit_form";
		$data["title"]			= "Modify Sales Record";
		$data["footer"]			= "2";
		$data["header"]			= "1";

		$data["breadcrumbs"] 	= array();
		$data["breadcrumb"]		= "Goat Management";
		$data['current']		= 'finance';

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

			$data["body"] 	= "financials/sale_view";
			$data["title"] 	= "Sale Record: {$sale_id}";

			$data["sale_record"] = $this->Goat_model->show_sales($sale_id);

			$data["breadcrumbs"] 	= array();
			$data["breadcrumb"]		= "Goat Management";
			$data['current']		= 'finance';
			
			$this->load->view("layouts/application", $data);

		}else{

			show_404();

		}


	}

	public function manage_view($category, $ref_id){

		$context = array(
			
			'body' 				=> 'modules/core/manage_view',
			'title' 			=> 'Goat Management',
			'goat_record'		=>  $this->Goat_model->get_goat_info($category, $ref_id),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
			),
			'breadcrumb'		=> 'Manage Goat',
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
			),
			'breadcrumb'		=> 'Manage Goat',
			'current'			=> 'management',	

			'dam_record'		=> $this->Goat_model->goat_breed('female'),
			'sire_record'		=> $this->Goat_model->goat_breed('male'),
		);


		foreach ($context['goat_record'] as $row) {
			$context['sire_id'] = $row->sire_id;
		}

		$this->load->view('layouts/application',$context);

	}	
}

?>