<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Reports_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct ();

		if(!$this->session->userdata('user_type') === 'farm owner') show_error("Your client does not have permission to get requested page in the server", 403, "Forbidden");

	}

	public function index(){
		
		$context = array(
			'body' 				=> 'sitemap/index',
			'title' 			=> 'Home',
		);

		$this->load->view('layouts/application',$context);

	}

}