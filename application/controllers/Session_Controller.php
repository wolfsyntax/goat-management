<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Session_Controller extends CI_Controller {

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

	public function logout(){
		
		$this->session->sess_destroy();
			
		$context = array(
			'body' 				=> 'auth/login',
			'title' 			=> 'Login',
		);

		$this->load->view('layouts/application',$context);

	}

	public function error404(){
					
		$context = array(
			'body' 				=> 'sitemap/errors404',
			'title' 			=> 'Page Not Found',
		);

		$this->load->view('layouts/application',$context);

	}

	public function error403(){
					
		$context = array(
			'body' 				=> 'sitemap/errors403',
			'title' 			=> 'Forbidden Access',
		);

		$this->load->view('layouts/application',$context);

	}



}

?>