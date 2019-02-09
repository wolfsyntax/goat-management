<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class VerificationController extends CI_Controller {

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

	public function show() {

	}

	public function edit() {

	}

	public function update() {

	}

	public function destroy() {
		
	}

}

?>