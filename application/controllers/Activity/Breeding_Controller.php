<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Breeding_Controller extends CI_Controller {

	public function __construct() {
		
		parent::__construct ();
		
		$this->load->model('Goat_model');

		if(!$this->session->userdata('user_id')) redirect(base_url());

	}

	public function index(){
					
		$context = array(
			'body' 				=> 'modules/activities/breeding/breeding_table',
			'title' 			=> 'Breeding Record',
			'breeding_record'	=>  $this->Goat_model->get_breeding_records(),
		);

			$this->load->view('layouts/application',$context);

	}

	public function template(){

		
		if($this->session->userdata('user_type') == 'sysadmin'){
			
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