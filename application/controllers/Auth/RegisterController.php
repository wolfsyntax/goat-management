<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class RegisterController extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model('User_model');
		
		/**
		** Farm Owner has the privileges to access this controller
		**/
		if($this->session->userdata('user_type') != "farm owner") show_error("Your client does not have permission to get requested page in the server", 403, "Forbidden"); //show_404();

	}

	public function index(){

		$context = array(
			'body' 				=> 'auth/login',
			'title' 			=> 'Login',
		);

		$this->load->view('layouts/application',$context);

	}

	public function create(){

		$context = array(
			'body' 				=> 'auth/register',
			'title' 			=> 'Sign Up',
		);

		$this->load->view('layouts/application',$context);

	}

	public function store(){

  		$this->form_validation->set_rules("username", "Username", "required|trim|is_unique[user_account.Username]|xss_clean|min_length[8]|max_length[255]",
			array(
				"required" => "{field} is required",
				"is_unique" => "{field} is already taken",
				"min_length" => "{field} must be at least 8 characters in length.",
				"max_length"	=> "{field} cannot exceed 255 characters in length.",
			)
		);

		$this->form_validation->set_rules("passwd", "Password", "required|min_length[8]|callback_password_check|trim|xss_clean",
			array(
				"required" => "{field} is required",
				"min_length" => "Your {field} must be more than 8 characters long.",
				"password_check" => "Your {field} must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
"
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

		if ($this->form_validation->run() == FALSE){

			self::create();

		}else{

			if($this->User_model->process_registration()){
/*
				$this->session->set_flashdata("item", "<div class='alert alert-success' role='alert' style='height: 50px;'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
									
									<div class='row'>
										<p><span class='fa fa-check-circle'></span>
					<strong>Success</strong>&emsp;Account created</p>
									</div>
								</div>");
*/
				$this->session->set_flashdata("item", '<div class="alert alert-success alert-dismissible fade show py-3" role="alert">
          				<strong class="fa fa-check-circle"></strong> Account successfully created</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            				<span aria-hidden="true">&times;</span>
          				</button>
        		</div>');
				redirect("login");

			}else{

				self::create();
		
			}

		}

	}

	public function show() {

	}

	public function edit() {

	}

	public function update() {

	}

	public function destroy() {
		
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