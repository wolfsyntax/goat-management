<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Reports_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model('Goat_model');

//		if(!($this->session->userdata('user_type') === 'farm owner')) show_error("Your client does not have permission to get requested page in the server", 403, "Forbidden");


		if(!($this->session->userdata('user_type') === 'farm owner')) show_error("Your client does not have permission to get requested page in the server", 403, "Forbidden");


	}

	public function index(){
		
		$context = array(
			
			'body' 					=> 'modules/reports/index_report',
			'title' 				=> 'Reports',
			'sales_record'			=> $this->Goat_model->show_all_sales(),
			'goat_active_record'	=> $this->Goat_model->show_record("goat_profile", "status = 'active' "),
			'goat_loss_record'		=> $this->Goat_model->get_loss_record(),
			'breadcrumbs'			=> array(
				'Dashboard'			=> $this->session->userdata('user_type') == 'tenant' ? 'dashboard' : 'farm',
			),
			'breadcrumb'			=> 'Reports',
			'current'				=> 'report',

		);

		$this->load->view('layouts/application',$context);

	}

	public function profile(){

		$data = array(
			'goat_active_record'	=> $this->Goat_model->show_record("goat_profile", "status = 'active' "),
			
		);
		/*$context = array(
			'body' 				=> 'auth/login',
			'title' 			=> 'Login',
			'current'			=> '',
			'sales_record'		=> $this->Goat_model->show_all_sales(),
		);*/

			//$this->load->view('layouts/application',$context);

		$this->load->library('Pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "livestock_report_".time().".pdf";
		$this->pdf->load_view('/modules/reports/goatrecord_reports', $data);
		redirect(base_url());
		//$this->
//		$this->pdf->load_view('welcome');

	}

	public function sales(){

		$data = array(
		"sales_record"=> $this->Goat_model->show_all_sales(),
			
		);
		/*$context = array(
			'body' 				=> 'auth/login',
			'title' 			=> 'Login',
			'current'			=> '',
			'sales_record'		=> $this->Goat_model->show_all_sales(),
		);*/

			//$this->load->view('layouts/application',$context);

		$this->load->library('Pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "sales_reports_".time().".pdf";
		$this->pdf->load_view('/modules/reports/sales_reports', $data);
		redirect(base_url());
	}

	public function loss(){

		$data = array(
			'goat_loss_record'		=> $this->Goat_model->get_loss_record(),
		);
		/*$context = array(
			'body' 				=> 'auth/login',
			'title' 			=> 'Login',
			'current'			=> '',
			'sales_record'		=> $this->Goat_model->show_all_sales(),
		);*/

			//$this->load->view('layouts/application',$context);

		$this->load->library('Pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "loss_reports_".time().".pdf";
		$this->pdf->load_view('/modules/reports/loss_reports', $data);
		redirect(base_url());
	}

}