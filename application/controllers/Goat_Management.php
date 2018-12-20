<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Goat_Management extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model('Goat_model');
	}

	public function index(){
  	
		$data["body"] 	= "goats_management/goat_index";
		$data["title"]	= "Manage Goat";
		$data["footer"]	= "2";
		$data["header"]	= "1";
		
		$this->load->view("layouts/application",$data);

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
		'required|xss_clean|trim|integer|is_sire_exist[goat_profile.eartag_id]',
		array(
			'required' => '{field} is required',
			'is_sire_exist' => '{field} do not exist',
			"numeric" => "must contain only numbers.",	
			)
		);

		$this->form_validation->set_rules('dam_id','Dam ID',
		'required|xss_clean|trim|integer|is_dam_exist[goat_profile.eartag_id]',
		array(
			'required' => '{field} is required',
			'is_dam_exist' => '{field} do not exist',
			"*"
			)
		);

	}

	public function validate_purchase_info(){
		
		$this->form_validation->set_rules('purchase_weight','Weight Purchase',
		'required|xss_clean|trim|numeric',
		array(
			'required' 	=> '{field} is required',
			"numeric" => "{field} must contain only numbers.",	
			)
		);

		$this->form_validation->set_rules('purchase_price','Purchased Price',
		'required|xss_clean|trim|numeric',
		array(
			'required' => '{field} is required',
			'is_dam_exist' => '{field} must be a digit',
			"numeric" => "must contain only numbers.",
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

	public function validate_goat_info($category){

		$this->form_validation->set_rules('eartag_id','Tag ID',
		'required|integer|xss_clean|trim|is_unique[goat_profile.eartag_id]',
		array(
			'required' => '{field} is required',
			'integer' => '{field} must contain an integer',
			'is_unique' => '{field} is already existed',
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

		}

 	}

	public function add_goats(){

		$data["body"] 	= "goats_management/goat_form";
		$data["title"]	= "Add new record";
		$data["footer"]	= "2";
		$data["header"]	= "1";
		
		$this->load->view("layouts/application",$data);

	}

/** 
-------------------------------------------------------------------------------------------
Goat Sales
-------------------------------------------------------------------------------------------
**/

	public function sell_goats(){
		
		//echo "<h1>SELL</h1>";

		$data["body"] 	= "financials/goat_sales";
		$data["title"]	= "Add new Sales";
		$data["footer"]	= "2";
		$data["header"]	= "1";
		
		$this->load->view("layouts/application",$data);


	}
}

?>