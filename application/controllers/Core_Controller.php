<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Core_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model('Goat_model');

		if(!$this->session->userdata('user_id')) redirect(base_url());

		if(!$this->session->userdata('user_type') === 'sysadmin') show_404();
		
	}

	public function index() {
					
		$context = array(
			'body' 				=> 'modules/core/goat_index',
			'title' 			=> 'Goat Management',
			'goat_record'		=>  $this->Goat_model->show_goat_record(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
			),
			'breadcrumb'		=> 'Manage Goat',			
		);

			$this->load->view('layouts/application',$context);

	}


	public function create() {
					
		$context = array(
			'body' 				=> 'modules/core/goat_form',
			'title' 			=> 'Goat Management : New',
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
				'Manage Goat'	=> 'manage/goat',
			),
			'breadcrumb'		=> 'Dashboard',			
		);

		$this->load->view('layouts/application',$context);

	}

	public function sales() {
					
		$context = array(
			'body' 				=> 'modules/transaction/sales_index',
			'title' 			=> 'Goat Sales',
			'goat_record'		=> $this->Goat_model->show_all_sales(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
			),
			'breadcrumb'		=> 'Manage Finances',			
		);

		$this->load->view('layouts/application',$context);


	}

	public function create_sales() {
					
		$context = array(
			'body' 					=> 'modules/transaction/goat_sales',
			'title' 				=> 'Goat Sales : New',
			'breadcrumbs'			=> array(
				'Dashboard'			=> 'dashboard',
				'Manage Finances'	=> 'goat/sales',
			),
			'breadcrumb'			=> 'New Sales',		
		);

		$this->load->view('layouts/application',$context);

	}

	public function template() {

		
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