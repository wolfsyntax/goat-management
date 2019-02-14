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
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
			),
			'breadcrumb'		=> 'Manage Asset',
			'current'			=> 'assets',

		);

		$this->load->view('layouts/application',$context);

	}

	public function create() {

	}
	
	public function store() {

	}

	public function update($id) {

	}

	public function template(){

		
		if($this->session->userdata('user_type') == 'tenant'){
			
			$context = array(
				
				'body' 				=> 'auth/login',
				'title' 			=> 'Login',
				'current'			=> 'assets',


			);

			$this->load->view('layouts/application',$context);

		} else {

			show_404();

		}
				
	}


}

?>