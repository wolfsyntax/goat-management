<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Auth_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();
		$this->load->model("User_model");

	}

	public function index(){
		
		$data["body"]	= "auth/index";
		$data["title"]	= "Dashboard";

		$this->load->view("layouts/application",$data);

	}

}

?>