<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct ();

		if(!$this->session->userdata('user_type') === 'farm owner') show_error("Your client does not have permission to get requested page in the server", 403, "Forbidden");

	}

	public function index(){
		
	$this->load->library('Pdf');
	$this->load->view('makepdf');

		

	}

}