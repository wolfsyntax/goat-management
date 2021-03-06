<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Tenant_Controller extends CI_Controller {

	public function __construct() {

		parent::__construct ();
		if(!$this->session->userdata('user_id')) redirect(base_url());

		date_default_timezone_set("Asia/Manila");

		//Calendar Preference
		$prefs = array(
			'start_day'    				=> 'sunday',
			'month_type'   				=> 'long',
			'day_type'					=> 'abr',
		);

		$prefs['template'] = array(

			'cal_cell_start_today'		=> '<td class="" style="background: #3b5998">',
			'cal_cell_no_content_today'	=> '<div class="text-white" style="font-weight: lighter; font-size: 11px;">{day}</div>',
			'table_open'				=> '<table class="table table-bordered">',
			'cal_cell_content'			=> '<a href="{content}" class="text-primary">{day}</a>',
			'cal_cell_content_today'	=> '<div class=""><a href="{content}" class="text-white font-weight-bold" title="Today\'s Task" style="font-weight: bolder; font-size: 14px;">{day}</a></div>',
		);

		$this->load->library('calendar',$prefs);

		if(!($this->session->userdata('user_type') == 'tenant')) { 
			show_error("Your client does not have permission to get requested page in the server", 403, "Forbidden"); //show_404();		
		} 
		$this->load->model("Goat_model");

	}
	
	public function index(){

		$context = array(

			
			'body' 				=> 'auth/tenants/index',
			'title' 			=> 'Dashboard',
			'recent_transaction' => $this->Goat_model->recent_transactions(),
			'recent_activity'	=> $this->Goat_model->recent_activity(),
			'breadcrumbs'		=> array(),
			'breadcrumb'		=> 'Dashboard',
			'current'			=> 'dashboard',

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