<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class User_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();

		if(!$this->session->userdata('user_id')) redirect(base_url());
		if(!$this->session->userdata('user_type') == 'farm owner') show_404();

	}
	
	public function index(){

		$context = array(
			'body' 				=> 'sitemap/index',
			'title' 			=> 'Home',
			'breadcrumbs'		=> array(),
			'breadcrumb'		=> 'Dashboard',			
		);

		$this->load->view('layouts/application',$context);

	}

	public function dashboard(){

		if($this->session->userdata('user_type') == 'farm owner'){
		
			$context = array(
				'body' 				=> 'sitemap/index',
				'title' 			=> 'Home',
			);

			$this->load->view('layouts/application',$context);
		
		} else {

			show_404();

		}

	}

	public function template(){

		
		if($this->session->userdata('user_type') == 'farm owner'){
			
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