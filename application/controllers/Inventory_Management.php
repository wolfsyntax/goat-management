<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

#use Carbon\Carbon;
use Carbon\Carbon;

class Inventory_Management extends CI_Controller {

	/**

		must be at least _ characters in length.								- min_length
		cannot exceed _ characters in length.									- max_length
		must contain only numbers.												- numeric
		must contain a decimal number.											- decimal
		must contain an integer.												- integer
		is required.															- required
		must be exactly _ characters in length.									- exact_length
		must contain a number less than _.										- less_than
		must contain a number less than or equal to _.							- less_than_equal_to
		must contain a number greater than or equal to _.						- greater_than_equal_to
		must contain a number greater than _.									- greater_than
		must be one of: _,_,_.													- inlist[_,_,_]
		may only contain alphabetical characters.								- alpha
		may only contain alpha-numeric characters.								- alpha_numeric
		may only contain alpha-numeric characters and spaces.					- alpha_numeric_spaces
		may only contain alpha-numeric characters, underscores, and dashes.		- alpha_dash
		must contain a valid IP.												- valid_ip
		must contain a valid email address.										- valid_email
		must contain all valid email addresses.									- valid_emails

	**/


	public function __construct()
	{
		parent::__construct ();
		$this->load->model('Goat_model');

	}

	public function index()
	{
		
		$data = array(
			"body"		=> "",
			"title"		=> "",
		);

		$this->load->view("layouts/application",$data);

	}
}

