<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Auth_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();
		$this->load->model("User_model");
		if($this->session->userdata('username')== "") redirect(base_url('login'),'refresh');
	}

	public function index(){
		


		if($this->session->userdata('is_activated') === 'yes'){

			$data["body"]			= "auth/index";
			$data["title"]			= "Dashboard";

			if($this->session->userdata("Lflag") == "0"){
				
				$this->session->unset_userdata("Lflag"); $this->session->set_userdata("Lflag","1");

				$this->session->set_flashdata('profile', '<div class="alert alert-warning alert-dismissible fade show p-2" role="alert">
		          <strong>Pro Tip!</strong> If you want to update your profile details and password&emsp;<a class="btn btn-sm btn-success" href="<?= base_url()?>profile/settings"><span class="fa fa-pencil"></span>&nbsp;Edit Profile</a>
		          	<button type="button" class="close" data-dismiss="alert" aria-label="Close" class="mt-2">
		            <span aria-hidden="true">&times;</span>
		          </button>
		        </div>');
			} 

			$this->load->view("layouts/application",$data);

		} else if($this->session->userdata('is_activated') === 'no') {

			echo "<h1>Account NOT activated</h1>";

		} else {

			show_404();

		}

	}

}

?>