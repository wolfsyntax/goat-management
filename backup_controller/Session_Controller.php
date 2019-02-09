<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Session_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();

	}

	public function index(){
		
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');

	}
  	
  	public function page_error(){

  		$data["body"] = "sitemap/404";
  		$data["title"] = "E404:&nbsp;Page not found";

  		$this->load->view("layouts/application",$data);

  	}
}

?>