<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class LoginController extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model('User_model');
	}

	public function index(){

		$context = array(
			'body' 				=> 'auth/login',
			'title' 			=> 'Login',
		);

		$this->load->view('layouts/application',$context);

	}

	public function create(){

	}

	public function store(){

		$this->form_validation->set_rules(
			'username', 
			'Username', 
			'trim|required|min_length[8]|max_length[120]|xss_clean',
			array(
				"required"		=> "{field} is required",
				"min_length"	=> "{field} must be at least 8 characters in length.",
				"max_length"	=> "{field} cannot exceed 120 characters in length.",
			)
		);

		$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

		$this->form_validation->set_rules(
			'passwd', 
			'Password', 
			'trim|required|min_length[8]|xss_clean',
			array(
				"required"		=> "{field} is required.",
				"min_length"	=> "{field} must be at least 8 characters in length.",
			)
		);

		if ($this->form_validation->run() == true) {
			# code...

			if($this->session->userdata('username') == ''){
				
				if($this->User_model->validate_login()){
					echo "<h1>Validated!</h1>";
					if($this->session->userdata('user_type') == 'sysadmin'){
						
						redirect('admin','refresh');

					} else if($this->session->userdata('user_type')== 'tenant'){

						redirect('dashboard','refresh');

					} else if($this->session->userdata('user_type') == 'farm owner'){

						redirect('farm','refresh');

					} else {

						show_404();

					}

				} else {

					$this->session->set_flashdata("auth", "<div class='alert alert-danger' role='alert' style='height: 50px;''>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
									
									<div class='row px-2'>
										<p><span class='fa fa-exclamation-triangle'></span>
					<strong>Invalid</strong>&emsp;Username or Password</p>
									</div>
								</div>");

				}

			} else {

				if($this->session->userdata('user_type') == 'sysadmin'){
						
					redirect('admin','refresh');

				} else if($this->session->userdata('user_type')== 'tenant'){

					redirect('dashboard','refresh');

				} else if($this->session->userdata('user_type') == 'farm owner'){

					redirect('farm','refresh');

				} else {

					show_404();

				}				

			}
		}

		self::index();

	}

	public function show() {

	}

	public function edit() {

	}

	public function update() {

	}

	public function destroy() {
		
	}

	public function logout(){
		
		$this->session->sess_destroy();
			
		$context = array(
			'body' 				=> 'auth/login',
			'title' 			=> 'Login',
		);

		$this->load->view('layouts/application',$context);

	}

}

?>