<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class EditProfileController extends CI_Controller {

	public function __construct() {
		parent::__construct ();

		if(!$this->session->userdata('username'))  show_error("We can't find the page you're looking for.", 404, "Page Not Found");

		$this->load->model('User_model');
	}

	public function index(){

		$user_type = $this->session->userdata('user_type');

		$context = array(
			'body' 				=> 'auth/edit_account',
			'title' 			=> 'Account Settings',
			'account'			=> $this->User_model->fetch_account(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> $user_type == 'tenant' ? 'dashboard' : 'farm',
				'Account Settings'	=> 'account/settings',
			),
			'breadcrumb'		=> 'Update Account',			
			'current'			=> 'dashboard',
		);

		$this->load->view('layouts/application',$context);

	}
	
	public function create(){

	}

	public function show() {

	}

	public function edit() {

	}

	public function update() {
		
		echo "<h1>Update Account</h1>";

		if(!empty($_POST)){

			$this->form_validation->set_rules("username", "Username", "required|trim|callback_usercheck|xss_clean|min_length[8]|max_length[255]",
				array(
					"required" => "{field} is required",
					"usercheck" => "{field} is already taken",
					"min_length" => "{field} must be at least 8 characters in length.",
					"max_length"	=> "{field} cannot exceed 255 characters in length.",
				)
			);

			$this->form_validation->set_rules("last_name", "Last name", "required|max_length[255]|trim|xss_clean|name_check", array(
					"required"		=> "{field} is required.",
					"name_check"	=> "{field} is not a valid and must be at least 2 characters in length.",
					"max_length"	=> "{field} cannot exceed 255 characters in length.",

				)
			);

			$this->form_validation->set_rules("first_name", "First name", "required|trim|xss_clean|name_check|max_length[255]", array(
					'required' => 'First name is required.',
					"name_check"	=> "{field} is not a valid and must be at least 2 characters in length.",
					"max_length"	=> "{field} cannot exceed 255 characters in length.",
				)
			);

			$this->form_validation->set_rules("phone", "Mobile number", "required|trim|xss_clean|callback_phone_verify|max_length[13]",
				array(
					"required" => "{field} is required",
					"max_length"	=> "{field} cannot exceed 13 characters in length including '+'",
					"phone_verify" => "{field} is not a valid phone number",
				)
			);

			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() == FALSE) {
				
				self::index();

			} else {
				# code...
				if($this->User_model->update_info()){

					$this->session->set_flashdata("auth_edit", '<div class="alert alert-success alert-dismissible fade show py-3" role="alert">
          				<strong class="fa fa-check-circle"></strong> Successfully updated the account</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            				<span aria-hidden="true">&times;</span>
          				</button>
        		</div>');

				} else {

					$this->session->set_flashdata("auth_edit", '<div class="alert alert-danger alert-dismissible fade show py-3" role="alert">
          				<strong class="fa fa-exclamation-circle"></strong> Account Information not updated</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            				<span aria-hidden="true">&times;</span>
          				</button>
        		</div>');

				}
				
			}

		} 
		
		redirect(base_url('account/settings/edit'));
		
	}

	public function destroy() {
		
	}

	/**
	*
	*--------------------------------------------------------------------------------------------
	* 	Username Checker
	*--------------------------------------------------------------------------------------------
	*
	*
	* @param string str (username)
	* @return boolean
	*
	**/

	public function usercheck($str) {
		return $this->User_model->check_username($str);
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

}

?>