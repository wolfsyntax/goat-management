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
		$this->load->model('Inventory_model');

	}

	public function index()
	{
		
		$data = array(
			"body"		=> "inventory/inventory_table",
			"title"		=> "Inventory Management",
			"record"	=> $this->Inventory_model->fetch_items(),
		);

		$this->load->view("layouts/application",$data);

	}

	public function add_item(){
		
		$data = array(
			"body"		=> "inventory/inventory_new",
			"title"		=> "Inventory New",
		);

		$this->load->view("layouts/application",$data);

	}

	public function validate_request(){

		$this->form_validation->set_rules('item_name', 'Item Name', 'trim|required|min_length[3]|max_length[255]|is_unique[inventory_record.item_name]',
			array(
				'required' 		=> '{field} is required.', 
				'min_length'	=> '{field} must be at least 5 characters in length.',
				'max_length'	=> '{field} cannot exceed 255 characters in length.',	
				'is_unique'		=> '{field} is already existed.',
			)
		);

		$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required|min_length[5]|max_length[255]|in_list[Vaccine,Supplement]',
			array(
				'required' 		=> '{field} is required.', 
				'min_length'	=> '{field} must be at least 5 characters in length.',
				'max_length'	=> '{field} cannot exceed 255 characters in length.',	
				'numeric'		=> '{field} must contain only numbers.',
				'in_list'		=> '{field} must be Vaccine or Supplement.',
			)
		);

		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric',
			array(
				'required' 		=> '{field} is required.', 
				'numeric'		=> '{field} must contain only numbers.',
			)
		);

		if ($this->form_validation->run() == FALSE) {
			self::add_item();
		} else {
			
			if($this->Inventory_model->new_item()){
			
				$this->session->set_flashdata("inventory", '<div class="alert alert-success alert-dismissible fade show p-2" role="alert">
          			<strong>Success</strong> Item successfully added.
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>');				
			
			}else {

				$this->session->set_flashdata("inventory", '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
          			<strong>Failed</strong> Item failed to added.
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>');				

			}

			redirect(base_url('inventory/view'));
		}

	}

	public function mod_request($inventory_id){
		//echo "<h1>Modify</h1>";
		if($this->input->post('item_hname', TRUE) != $this->input->post('item_name', TRUE)){
			$this->form_validation->set_rules('item_name', 'Item Name', 'trim|required|min_length[3]|max_length[255]|is_unique[inventory_record.item_name]',
				array(
					'required' 		=> '{field} is required.', 
					'min_length'	=> '{field} must be at least 5 characters in length.',
					'max_length'	=> '{field} cannot exceed 255 characters in length.',	
					'is_unique'		=> '{field} is already existed.',
				)
			);
		} else {
		//	echo "<h1>Default</h1>";
			$this->form_validation->set_rules('item_name', 'Item Name', 'trim|required|min_length[3]|max_length[255]',
				array(
					'required' 		=> '{field} is required.', 
					'min_length'	=> '{field} must be at least 5 characters in length.',
					'max_length'	=> '{field} cannot exceed 255 characters in length.',	
				)
			);

		}

		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric',
			array(
				'required' 		=> '{field} is required.', 
				'numeric'		=> '{field} must contain only numbers.',
			)
		);

		if ($this->form_validation->run() == TRUE) {
			echo "<h1>{$inventory_id}</h1>";
			if($this->Inventory_model->update_items($inventory_id)){
				
				$this->session->set_flashdata("inventory", '<div class="alert alert-success alert-dismissible fade show p-2" role="alert">
          			<strong>Success</strong> Item successfully modified.
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>');				
			
			}else {

				$this->session->set_flashdata("inventory", '<div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
          			<strong>Failed</strong> Item failed to modify.
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>');				

			}

			
		}

		redirect(base_url('inventory/view'));

	}	

}

