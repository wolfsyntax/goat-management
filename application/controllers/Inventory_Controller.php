<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Inventory_Controller extends CI_Controller {

	public function __construct() {

		parent::__construct ();
		$this->load->model('Inventory_model');
		if(!$this->session->userdata('user_id')) redirect(base_url());

	}
	
	public function index(){

		$context = array(
			'body' 				=> 'modules/inventory/inventory_table',
			'title' 			=> 'Inventory',
			'record'			=> $this->Inventory_model->fetch_items(),
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