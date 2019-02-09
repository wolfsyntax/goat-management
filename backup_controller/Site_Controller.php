<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Site_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();

	}

	public function index(){
		
		$data["body"] 	= "sitemap/index";
		$data["title"]	= "Home";
		$data["footer"]	= "2";
		$data["header"]	= "1";
		
		$this->load->view("layouts/application",$data);

	}
  
}

?>