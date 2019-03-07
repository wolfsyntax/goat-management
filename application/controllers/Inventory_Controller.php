<?php defined ( "BASEPATH" ) or exit ( "No direct script access allowed" );

class Inventory_Controller extends CI_Controller {

	public function __construct() {

		parent::__construct ();
		$this->load->model('Inventory_model');
		if(!$this->session->userdata('user_id')) redirect(base_url());
		if(!$this->session->userdata('user_type') === 'tenant') show_error("Your client does not have permission to get requested page in the server", 403, "Forbidden");
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

		$context = array(
			
			'body' 				=> 'modules/inventory/inventory_new',
			'title' 			=> 'Inventory',
		//	'record'			=> $this->Inventory_model->fetch_items(),
			'breadcrumbs'		=> array(
				'Dashboard'		=> 'dashboard',
				'Manage Asset'	=> 'inventory/view',
			),
			'breadcrumb'		=> 'New Asset',
			'current'			=> 'assets',

		);

		$this->load->view('layouts/application',$context);

	}
	
	public function store() {

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
			self::create();
		} else {
			# code...
			if($this->Inventory_model->new_item()){
				
				$this->session->set_flashdata("inventory", '<div class="alert alert-success alert-dismissible fade show p-2" role="alert">
          			<strong>Success</strong> Item successfully added.
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>');

			} else {

				$this->session->set_flashdata("inventory", '<div class="alert alert-success alert-dismissible fade show p-2" role="alert">
          			<strong>Success</strong> Item successfully added.
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>');

			}

			redirect(base_url('inventory/view'), 'refresh');

		}

	}

	public function update($inventory_id) {

		//echo "<script>alert('{$id}')</script>";
		$this->form_validation->set_rules('item_name', 'Item Name', 'trim|required|min_length[3]|max_length[255]',
				array(
					'required' 		=> '{field} is required.', 
					'min_length'	=> '{field} must be at least 5 characters in length.',
					'max_length'	=> '{field} cannot exceed 255 characters in length.',	
				)
			);

		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric',
			array(
				'required' 		=> '{field} is required.', 
				'numeric'		=> '{field} must contain only numbers.',
			)
		);
	

		if ($this->form_validation->run() == TRUE) {
			# code...
			//echo "<script>alert('Validated: {$id}')</script>";
			if($this->Inventory_model->update_items($inventory_id)){			

				$this->session->set_flashdata("inventory", '<div class="alert alert-success alert-dismissible fade show p-2 mt-2" role="alert">
          			<strong>Success</strong> Item successfully modified.
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>');				

			} else {

				$this->session->set_flashdata("inventory", '<div class="alert alert-danger alert-dismissible fade show p-2 mt-2" role="alert">
          			<strong>Failed</strong> Item failed to modify.
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>');				

			}
			
			//redirect(base_url('inventory/view'));

		}  else {

				$this->session->set_flashdata("inventory", '<div class="alert alert-danger alert-dismissible fade show p-2 mt-2" role="alert">
          			<strong>Failed</strong> Item failed to modify.
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
          			</button>
        		</div>');				

		}

		redirect(base_url('inventory/view'));


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