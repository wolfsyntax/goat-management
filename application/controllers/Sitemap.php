<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Sitemap extends CI_Controller {

	public function __construct() {
		parent::__construct ();

		if($this->session->userdata('user_type') == 'tenant') { redirect('dashboard', 'refresh'); }
		else if($this->session->userdata('user_type') == 'farm owner') { redirect('farm', 'refresh'); }

	}

	public function index(){

		$context = array(
			'body' 				=> 'sitemap/index',
			'title' 			=> 'Home',
		);

		$this->load->view('layouts/application',$context);

	}

	public function about(){

		$context = array(
			'body' 				=> 'sitemap/about',
			'title' 			=> 'About',
		);

		$this->load->view('layouts/application',$context);

	}

	public function contact(){

		$context = array(
			'body' 				=> 'sitemap/contact',
			'title' 			=> 'Contact Us',
		);

		$this->load->view('layouts/application',$context);

	}


	public function faq(){

		$context = array(
			'body' 				=> 'sitemap/faq',
			'title' 			=> 'FAQ - Frequently Asked Question',
		);

		$this->load->view('layouts/application',$context);


	}

}

?>