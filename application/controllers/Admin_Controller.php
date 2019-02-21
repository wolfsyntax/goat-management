<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Admin_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		
		$this->load->model('User_model');

		if(!$this->session->userdata('user_id')) redirect(base_url());
		if(!$this->session->userdata('user_type') === 'sysadmin') redirect(base_url());
	}

	public function index(){
					
		$context = array(
			'body' 				=> 'auth/login',
			'title' 			=> 'Login',
			'current'			=> '',
		);

			$this->load->view('layouts/application',$context);

	}

	public function template(){

		
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

}

?>