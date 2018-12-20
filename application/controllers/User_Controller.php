<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class User_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();
		$this->load->model("User_model");
/**
		$config = array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'mail.goats@gmail.com',
		    'smtp_pass' => '09365621593',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8',
		);
		
		$this->load->library("email");

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		//Email content
		$htmlContent = '<h1>Sending email via SMTP server</h1>';
		$htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

		$this->email->to('jaysonalpe@gmaile.com');
		$this->email->from('noreply.newrom@example.com','Admin');
		$this->email->subject('How to send email via SMTP server in CodeIgniter');
		$this->email->message($htmlContent);

		//Send email
		$this->email->send() OR exit("No internet connection");
**/
	}

	public function index(){

	}

  	public function login(){
  		
  		if($this->session->userdata("username") == ""){

			$data["body"] 	= "users/login";
			$data["title"]	= "Sign in";
			$data["footer"]	= "2";
			$data["header"]	= "1";
		
			$this->load->view("layouts/application",$data);

		} else {

			redirect("dashboard");

		}

  	}

  	public function verify_access(){

		$this->form_validation->set_rules("username", "Username", "trim|required|xss_clean|min_length[8]", array(
			'required' => '{field} is required',
			'xss_clean' => '{field} is not valid',
			"min_length[8]"	=> "{field} must contain atleast 8 characters",
		));

		$this->form_validation->set_rules("passwd", "Password", "trim|required|xss_clean", array(
			"required" => "{field} is required",
			"xss_clean" => "{field} is not valid",
		));

		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

		$data["title"] = "Login";
		$data["body"] = "users/login";
		
		if ($this->form_validation->run() == FALSE){

			$this->load->view("layouts/application", $data);

		} else {

			if($this->User_model->validate_login()){

				$this->session->set_flashdata("item", '<div class="alert alert-warning alert-dismissible fade show p-2" role="alert">
          <strong>Pro Tip!</strong> If you want to update your profile details and password&emsp;<a class="btn btn-sm btn-success" href="<?= base_url()?>profile/settings"><span class="fa fa-pencil"></span>&nbsp;Edit Profile</a>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
				
				redirect('dashboard');

			} else {

				$this->session->set_flashdata("item", "<div class='alert alert-danger' role='alert' style='height: 50px;''>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
									
									<div class='row'>
										<p><span class='fa fa-exclamation-triangle'></span>
					<strong>Invalid</strong>&emsp;Username or Password</p>
									</div>
								</div>");

				self::login();
				//$this->load->view('layouts/application',$data);

			}
			


		}

  	}

  	public function register(){

  		if($this->session->userdata("username") == ""){

			$data["body"] 	= "users/register";
			$data["title"]	= "Sign up";
			$data["footer"]	= "";
			$data["header"]	= "";
		
			$this->load->view("layouts/application",$data);

		} else {

			redirect("dashboard");
			
		}


  	}

  	public function validate_registration(){

  		$this->form_validation->set_rules("username", "Username", "required|trim|is_unique[user_account.Username]|xss_clean|min_length[8]|max_length[255]|regex_match[/[a-zA-Z0-9 ]/]",
			array(
				"required" => "{field} is required",
				"is_unique" => "{field} is already taken",
				"min_length" => "{field} must be at least 8 characters in length.",
				"max_length"	=> "{field} cannot exceed 255 characters in length.."
			)
		);

		$this->form_validation->set_rules("passwd", "Password", "required|min_length[8]|trim|xss_clean",
			array(
				"required" => "{field} is required",
				"min_length" => "{field} must be at least 8 characters in length.",
			)
		);

		$this->form_validation->set_rules("phone", "Mobile number", "required|trim|xss_clean|callback_phone_check|max_length[13]",
			array(
				"required" => "{field} is required",
				"phone_check"	=> "{field} is not a valid phone number in the Philippines",
				"max_length"	=> "{field} cannot exceed 13 characters in length including '+'"

			)
		);

		$this->form_validation->set_rules("last_name", "Last name", "required|max_length[255]|trim|xss_clean|name_check", array(
				"required"		=> "{field} is required",
				"name_check"	=> "{field} is not a valid and must be at least 2 characters in length.",
				"max_length"	=> "{field} cannot exceed 255 characters in length."

			)
		);

		$this->form_validation->set_rules("first_name", "First name", "required|trim|xss_clean|name_check|max_length[255]", array(
				'required' => 'First name is required',
				"name_check"	=> "{field} is not a valid and must be at least 2 characters in length.",
				"max_length"	=> "{field} cannot exceed 255 characters in length."
			)
		);

		$this->form_validation->set_rules(
			"conf_passwd", "Confirm Password", "required|matches[passwd]|min_length[8]|xss_clean", array(
				"required" => "{field} is required",
				"matches['password']" => "{field} does not match",
				"min_length[8]"	=> "{field} must contain atleast 8 characters",
			)
		);	

		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

		if ($this->form_validation->run() == FALSE){

			self::register();

		}else{

			if($this->User_model->process_registration()){

				$this->session->set_flashdata("item", "<div class='alert alert-success' role='alert' style='height: 50px;'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
									
									<div class='row'>
										<p><span class='fa fa-check-circle'></span>
					<strong>Success</strong>&emsp;Account created</p>
									</div>
								</div>");

				redirect("login");

			}else{

				self::register();
		
			}

		}


  	}

  	public function dashboard(){

  		if($this->session->userdata("username")){

  			$data["body"] 	= "auth/dashboard";
			$data["title"]	= "Dashboard";
			$data["footer"]	= "";
			$data["header"]	= "";
		
			$this->load->view("layouts/application",$data);

		} else {

			redirect(base_url(),'refresh');
		}
  	}

}	

?>