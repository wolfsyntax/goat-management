<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Auth_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();
		$this->load->model("User_model");

	}

	public function index(){
		
		$data["body"]	= "auth/index";
		$data["title"]	= "Dashboard";

		$this->session->set_flashdata('profile', '<div class="alert alert-warning alert-dismissible fade show p-2" role="alert">
          <strong>Pro Tip!</strong> If you want to update your profile details and password&emsp;<a class="btn btn-sm btn-success" href="<?= base_url()?>profile/settings"><span class="fa fa-pencil"></span>&nbsp;Edit Profile</a>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
        
		$this->load->view("layouts/application",$data);

	}

}

?>