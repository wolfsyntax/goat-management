<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Tenant_Controller extends CI_Controller {

	public function __construct() {

		parent::__construct ();
		if(!$this->session->userdata('user_id')) redirect(base_url());
		if(!$this->session->userdata('user_type') == 'tenant') show_404();

	}
	
	public function index(){

		$context = array(
			'body' 				=> 'auth/tenants/index',
			'title' 			=> 'Dashboard',
			'breadcrumbs'		=> array(),
			'breadcrumb'		=> 'Dashboard',
		);

		$this->load->view('layouts/application',$context);

	}

	public function template(){

		
		if($this->session->userdata('user_type') == 'tenant'){
			
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