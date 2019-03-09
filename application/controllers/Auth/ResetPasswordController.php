<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class ResetPasswordController extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model('User_model');

		if(!$this->session->userdata('user_id')) redirect(base_url(),'refresh');

	}

	public function index(){
		
		$user_type = $this->session->userdata('user_type');
		
		$context = array(
			'body' 				=> 'auth/account_setting',
			'title' 			=> 'Setting',
			'account'			=> $this->User_model->fetch_account(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> $user_type == 'tenant' ? 'dashboard' : 'farm',
			),
			'breadcrumb'		=> 'Account Settings',			
			'current'			=> 'dashboard',			
		);

		$this->load->view('layouts/application',$context);

	}
	
	public function change_password(){
		
		$this->form_validation->set_rules('old_pass', 'Current Password', 'trim|required|min_length[8]|callback_validate_pass|callback_password_check', array(
			"required"			=> "{field} is required.",
			"min_length"		=> "{field} ",
			"validate_pass"		=> "{field} must be your current password",
			"password_check" 	=> "Your {field} must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character."

		));

		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|min_length[8]|callback_password_check', array(
			"required"			=> "{field} is required.",
			"min_length"		=> "{field}",
			"password_check" => "Your {field} must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character."
		));

		$this->form_validation->set_rules('conf_pass', 'Confirm Password', 'trim|required|min_length[8]|matches[new_pass]', array(
			"required"			=> "{field} is required.",
			"min_length"		=> "{field}",
			"matches[new_pass]"	=> "{field}",			
		));

		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

		if ($this->form_validation->run() == false) {
			# code...
			self::index();
		} else {
			# code...
			if($this->User_model->update_pass()){

				$this->session->set_flashdata("auth", '<div class="alert alert-success alert-dismissible fade show py-3" role="alert">
          				<strong class="fa fa-check-circle"></strong> Account successfully updated.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            				<span aria-hidden="true">&times;</span>
          				</button>
        		</div>');
				
			} else {

				$this->session->set_flashdata("auth", "<div class='alert alert-danger' role='alert' style='height: 50px;''>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
									
									<div class='row px-2'>
										<p><span class='fa fa-exclamation-triangle'></span>
					<strong>Failed</strong>&emsp;Account not updated.</p>
									</div>
								</div>");
				
			}

			redirect(base_url('account/settings'),'refresh');
		}
	}

	public function create() {



	}

	public function show() {

	}

	public function edit() {

	}

	public function update() {

	}

	public function destroy() {
		
	}

	public function validate_pass($str){

		return $this->User_model->check_password($this->input->post('old_pass',TRUE));

	}

	public function password_check($str){

		if(preg_match ("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/" , $str)){

			return TRUE;

		} else {
			
			return FALSE;

		}

	}	
}

?>