<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

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
		$data["goat_record"]	= $this->Goat_model->show_goat_record();
		
		$this->load->view("layouts/application",$data);

  	}


/** 
-------------------------------------------------------------------------------------------
Goat Specified Record View
-------------------------------------------------------------------------------------------
**/	

	public function manage_view($category, $eartag_id){
  	
		$data["body"] 			= "goats_management/manage_view";
		$data["title"]			= "Goat Record";
		$data["footer"]			= "2";
		$data["header"]			= "1";

		$data["category"]		= $category;
		$data["goat_record"]	= $this->Goat_model->get_goat_info($category, $eartag_id);

		$this->load->view("layouts/application",$data);

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
			'required' => "{field} is required",
			"check_date"	=> "{field} is set incorrectly"
			)
		);
		
		$this->form_validation->set_rules('sire_id','Sire ID',
		'required|xss_clean|trim|integer|is_sire_exist[goat_profile.eartag_id]|greater_than[0]',
		array(
			'required' => '{field} is required',
			'is_sire_exist' => '{field} do not exist',
			"integer" => "must contain only integer numbers.",	
			"greater_than"	=> "{field} must be greater than zero",
			)
		);

		$this->form_validation->set_rules('dam_id','Dam ID',
		'required|xss_clean|trim|integer|is_dam_exist[goat_profile.eartag_id]|greater_than[0]',
		array(
			'required' => '{field} is required',
			'is_dam_exist' => '{field} do not exist',
			"integer" => "must contain only integer numbers.",	
			"greater_than"	=> "{field} must be greater than zero",
			)
		);

	}

	public function validate_purchase_info(){
		
		$this->form_validation->set_rules('purchase_weight','Weight Purchase',
		'required|xss_clean|trim|numeric|greater_than[0]',
		array(
			'required' 		=> '{field} is required',
			"numeric" 		=> "{field} must contain only numbers.",	
			"greater_than"	=> "{field} must be greater than zero",
			)
		);

		$this->form_validation->set_rules('purchase_price','Purchased Price',
		'required|xss_clean|trim|numeric|greater_than[0]',
		array(
			'required' => '{field} is required',
			'is_dam_exist' => '{field} must be a digit',
			"numeric" => "must contain only numbers.",
			"greater_than"	=> "{field} must be greater than zero",
			)
		);


		$this->form_validation->set_rules('purchase_date','Purchased Date',
		'required|xss_clean|trim|check_date',
		array(
			'required' => '{field} is required',
			"check_date"	=> "{field} is set incorrectly"
			)
		);

		$this->form_validation->set_rules('purchase_from','Vendor','required|xss_clean|trim',array("required" => "{field} is required"));

	}


	public function view_goat_record($record_id, $eartag_id){
		//echo "<h1>{$category}</h1>";
		$data["body"] 	= "goats_management/edit_form";
		$data["title"]	= "Edit record";
		$data["footer"]	= "2";
		$data["header"]	= "1";

		$data["goat_record"] = $this->Goat_model->show_goat_record($record_id,$eartag_id);

		$this->load->view("layouts/application",$data);

		//self::validate_goat_info($category,"edit");

	}

	public function validate_goat_info($category,$action = "default"){
		#*
		//echo "<h1>{$category}</h1>";
		if($action == "edit"){

			$this->form_validation->set_rules('status','Goat Status',
				'required|xss_clean|trim|in_list[active,deceased,stolen,lost,sold]',
				array(
					'required' 	=> '{field} is required',
					'in_list'	=> "{field} invalid status",
				)
			
			);

		}

		$this->form_validation->set_rules('eartag_id','Tag ID',
		'required|integer|xss_clean|trim|is_unique[goat_profile.eartag_id]|greater_than[0]',
		array(
			'required' => '{field} is required',
			'integer' => '{field} must contain an integer',
			'is_unique' => '{field} is already existed',
			"greater_than"	=> "{field} must be greater than zero",			
			)
		);

		$this->form_validation->set_rules('eartag_color','Tag Color',
		'required|xss_clean|trim|alpha_spaces',
		array(
			'required' => '{field} is required',
			'alpha_spaces'=> '{field} may only contain alphabetical characters and spaces',
			)
		);

		$this->form_validation->set_rules('gender','Gender',
		'required|xss_clean|trim|alpha_spaces',
		array(
			'required' 	=> '{field} is required',
			'alpha_spaces'=> '{field} may only contain alphabetical characters and spaces',
			)
		);

		$this->form_validation->set_rules('body_color','Body Color',
		'required|xss_clean|trim|alpha_spaces',
		array(
			'required' => 'Body Color is required',
			'alpha_spaces'=> '{field} may only contain alphabetical characters and spaces',
			)
		);


		$this->form_validation->set_rules('category', 'Category', 'trim|required|min_length[5]|max_length[12]',array("required" => "{field} is required"));

		if($category === "birth"){
			
			self::validate_birth_info();

		}elseif ($category === "purchase") {

			self::validate_purchase_info();

		}


		$this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');

		if($this->form_validation->run() === FALSE){
			self::add_goats();
		}else{
			if($action == "default"){
				//echo "<h1>Create</h1>";
				if($this->Goat_model->add_goat($category) > 0){

					$this->session->set_flashdata('goat', '<div class="alert alert-success col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-check-circle"></span>
							<strong>Success</strong>&emsp;New goat added successfully. <a href="'.base_url().'manage/goat" class="nav-link">View Records</a></p>
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

			}else {

				if($this->Goat_model->edit_goat()){

					$this->session->set_flashdata('goat', '<div class="alert alert-success col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-check-circle"></span>
							<strong>Success</strong>&emsp;Goat Profile with Eartag ID of '.$id.' Updated successfully. <a href="'.base_url().'manage/goat" class="nav-link">View Records</a></p>
						</div>
					</div>');

				}else{

					$this->session->set_flashdata('goat', '<div class="alert alert-danger col-12" role="alert" style="height: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
												
						<div class="row">
							<p><span class="fa fa-exclamation-circle"></span>
							<strong>Failed</strong>&emsp;Error: Cannot Update Goat Profile.</p>
						</div>
					</div>');

				}
			}

			redirect(base_url(). "manage/goat");
			//self::add_goats();

		}

 	}

	public function add_goats(){

		$data["body"] 	= "goats_management/goat_form";
		$data["title"]	= "Add new record";
		$data["footer"]	= "2";
		$data["header"]	= "1";
		
		$data['dam_record'] = $this->Goat_model->show_record('Goat_Profile',"gender = 'female' AND status = 'active'");
		
		$data['sire_record'] = $this->Goat_model->show_record('Goat_Profile',"gender = 'male' AND status = 'active'");

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
  	
		$data["body"] 	= "financials/sales_index";
		$data["title"]	= "Sales Record";
		$data["footer"]	= "2";
		$data["header"]	= "1";
		$data["goat_record"] = $this->Goat_model->show_all_sales();

		$this->load->view("layouts/application",$data);

  	}

	public function sell_goats(){
		
		$data["body"] 	= "financials/goat_sales";
		$data["title"]	= "Add new Sales";
		$data["footer"]	= "2";
		$data["header"]	= "1";

		$data['goat_record'] = $this->Goat_model->show_record('goat_profile',"status = 'active'");

		$this->load->view("layouts/application",$data);

	}

	public function validate_transaction(){
		
		if($this->session->userdata("username") != ""){

			$this->form_validation->set_rules("eartag_id","Tag ID","required|numeric|xss_clean|trim|is_exist[goat_profile.eartag_id]|greater_than[0]|callback_validate_eartag",
				array(
					"required" => "{field} is required",
					"numeric" => "Not a valid {field} provided. Only digits are allowed",
					"is_exist" => "{field} is not existing",
					"greater_than"	=> "{field} is not valid",			
				)
			);

			$this->form_validation->set_rules("transact_date","Date sold","required|xss_clean|trim|check_date",
				array(
					"required" => "{field} is required",
					'check_date' => "Incorrect date settings",
				)
			);

			$this->form_validation->set_rules("sold_to","Buyer Name","required|xss_clean|trim",
				array(
					"required" => "{field} is required",
				)
			);

			$this->form_validation->set_rules("weight","Total Weight","required|xss_clean|trim|numeric",
				array(
					"required" 	=> "{field} is required",
					"numeric"	=> "{field} is invalid value",
				)
			);

			$this->form_validation->set_rules("price_per_kilo","Price per Kilo","required|xss_clean|trim|numeric",
				array(
					"required" => "{field} is required",
					"numeric"	=> "{field} is invalid value",
				)
			);


			$this->form_validation->set_rules("remarks","Notes","xss_clean|trim");			

			
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");


			if($this->form_validation->run() === FALSE){

				self::sell_goats();

			}else{

				if($this->Goat_model->goat_sales()){
					
					$this->session->set_flashdata("goat", "<div class='alert alert-success col-12' role='alert' style='height: 50px;'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
										
							<div class='row'>
								<p><span class='fa fa-check-circle'></span>
								<strong>Success</strong>&emsp;Sales record added.</p>
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

/** 
-------------------------------------------------------------------------------------------
Activity Module: Create
-------------------------------------------------------------------------------------------
**/

	public function activity_module($activity_type){

		$flag = FALSE;
		
		switch ($activity_type) {
	    	case "breed":

				$data["body"] 	= "activities/breed_new_activity";

				$data["title"] 	= "";		
				$data['breeding_attempt'] = $this->Goat_model->show_record('breeding_record');
				
				$data['dam_record'] = $this->Goat_model->show_record('Goat_Profile',"gender = 'female'");
				$data['sire_record'] = $this->Goat_model->show_record('goat_profile',"gender = 'male'");
				
	        	break;

	    	case "checkup":

				$data["body"] = "activities/breed_new_activity";
				$data["title"] = "";		

	        	break;

	    	case "loss":

				$data["body"] = "activities/breed_new_activity";
				$data["title"] = "";		

	        	break;

	    	default:
	    		$flag = TRUE;
	        	show_404();

		}

		if(!$flag){
			$this->load->view("layouts/application",$data);
		}
	}

	public function activity_edit_module($activity_type,$process_id){

		$flag = FALSE;
		
		switch ($activity_type) {
	    	case "breed":

				$data["body"] 	= "activities/breed_new_activity";
				
				$data["title"] 	= "";		
				$data['breeding_attempt'] = $this->Goat_model->show_record('breeding_record');
				
				$data['dam_record'] = $this->Goat_model->show_record('Goat_Profile',"gender = 'female'");
				$data['sire_record'] = $this->Goat_model->show_record('goat_profile',"gender = 'male'");
				
	        	break;

	    	case "checkup":

				$data["body"] = "activities/breed_new_activity";
				$data["title"] = "";		

	        	break;

	    	case "loss":

				$data["body"] = "activities/breed_new_activity";
				$data["title"] = "";		

	        	break;

	    	default:
	    		$flag = TRUE;
	        	show_404();

		}

		if(!$flag){
			$this->load->view("layouts/application",$data);
		}
	}

	//Breeding Module Validator
	public function breeding_validation(){

		$this->form_validation->set_rules('eartag_id','Dam ID','required|xss_clean|trim|numeric|is_dam_exist[goat_profile.eartag_id]',
			array(
				'required' => 'Dam ID is required',
				'is_dam_exist' => 'Do not exist as a {field}',
				"integer" => "must contain an integer.",	
			)
		);

		$this->form_validation->set_rules('partner_id','Sire ID','required|xss_clean|trim|numeric|is_sire_exist[goat_profile.eartag_id]',
			array(
				'required' => 'Sire ID is required',
				'is_sire_exist' => 'Sire do not exist',
				"integer" => "must contain an integer.",	
			)
		);

		$this->form_validation->set_rules('perform_date','Breed Date','required|xss_clean|trim|check_date',
			array(
				'required' => 'Breed Date is required',
				"check_date"	=> "{field} is set incorrectly",
 			)
		);

		$this->form_validation->set_rules('remarks','Remarks','xss_clean|trim');

		$this->form_validation->set_rules('is_pregnant','Is Pregnant','xss_clean|trim');

		$this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');


	}


	public function breeding_module($breeding_id = 0){
		
		self::breeding_validation();

		if($this->form_validation->run() === FALSE){

			self::activity_module("breed");

		} else {
			
			if($breeding_id > 0){
				
				echo "Breeding Validation";
			
			}else if($breeding_id == 0){

				$message = '';						
				$flag = 0;

				if($this->Goat_model->breeding_record()){

					$message = '<span class="fa fa-check-circle"></span>
						<strong>Success</strong>&emsp; Breeding record added';
					
					$flag = 1;

				}else{

					$message = '<span class="fa fa-exclamation-circle"></span>
						<strong>Failed</strong>&emsp; Breeding Record already existed';

				}

				

				$content = '<div class="alert '.($flag === 1 ? 'alert-success' : 'alert-danger').' col-12" role="alert" style="height: 50px;">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button><div class="row">
											<p>'. $message . '</p>
										</div>
									</div>';
				
				$this->session->set_flashdata('goat', $content);


			} else{

				show_404();

			}

		}
	}

}

?>