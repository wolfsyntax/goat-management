<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Sitemap extends CI_Controller {

	public function __construct() {
		parent::__construct ();
	}

	public function index(){
		if($this->session->userdata('username')){
			
			if($this->session->userdata('user_type') == 'tenant') redirect('dashboard', 'refresh');
			
		} else {


			$context = array(
				'body' 				=> 'sitemap/index',
				'title' 			=> 'Home',
			);

			$this->load->view('layouts/application',$context);

		}

	}

	public function store(){

  		$this->form_validation->set_rules("username", "Username", "required|trim|is_unique[user_account.Username]|xss_clean|min_length[5]|max_length[255]",
			array(
				"required" => "{field} is required",
				"is_unique" => "{field} is already taken",
				"min_length" => "{field} must be at least 5 characters in length.",
				"max_length"	=> "{field} cannot exceed 255 characters in length.."
			)
		);

		$this->form_validation->set_rules("passwd", "Password", "required|min_length[8]|callback_password_check|trim|xss_clean",
			array(
				"required" => "{field} is required",
				"min_length" => "{field} must be more than 8 characters long.",
				"password_check" => "{field} must be a strong password",
			)
		);

		$this->form_validation->set_rules("phone", "Mobile number", "required|trim|xss_clean|callback_phone_verify|max_length[13]",
			array(
				"required" => "{field} is required",
				"max_length"	=> "{field} cannot exceed 13 characters in length including '+'",
				"phone_verify" => "{field} is not a valid phone number",
			)
		);

		$this->form_validation->set_rules("last_name", "Last name", "required|max_length[255]|trim|xss_clean|name_check", array(
				"required"		=> "{field} is required.",
				"name_check"	=> "{field} is not a valid and must be at least 2 characters in length.",
				"max_length"	=> "{field} cannot exceed 255 characters in length."

			)
		);

		$this->form_validation->set_rules("first_name", "First name", "required|trim|xss_clean|name_check|max_length[255]", array(
				'required' => 'First name is required.',
				"name_check"	=> "{field} is not a valid and must be at least 2 characters in length.",
				"max_length"	=> "{field} cannot exceed 255 characters in length."
			)
		);

		$this->form_validation->set_rules(
			"conf_passwd", "Confirm Password", "required|matches[passwd]|min_length[8]|xss_clean", array(
				"required" => "{field} is required.",
				"matches['password']" => "{field} does not match.",
				"min_length[8]"	=> "{field} must contain atleast 8 characters long.",
			)
		);	

		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");


		if ($this->form_validation->run() == true) {
			# code...
		} else {
			# code...
			self::index();

		}
	}

	/**
	*
	*--------------------------------------------------------------------------------------------
	* 	Phone Verification
	*--------------------------------------------------------------------------------------------
	*
	*
	* @param string str (phone number)
	* @return boolean
	*
	**/
	
	public function phone_verify($str){

		if(preg_match ("/^(\+63|0)9[0-9]{9}$/" , $str)){

			return TRUE;

		} else {
			
			return FALSE;

		}

	}

	/**
	*
	*--------------------------------------------------------------------------------------------
	* 	Password Check
	*--------------------------------------------------------------------------------------------
	*
	*
	* @param string str (password)
	* @return boolean
	*
	**/

	public function password_check($str){

		if(preg_match ("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/" , $str)){

			return TRUE;

		} else {
			
			return FALSE;

		}

	}
}

?>