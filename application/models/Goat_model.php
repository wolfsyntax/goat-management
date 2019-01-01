<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Goat_model extends CI_Model {

		public function __construct(){

			parent::__construct();
			//$this->load->dbforge();

			if(!$this->session->userdata('user_id')) redirect(base_url());
			
		}

		public function breeding_record(){

			$activity_id = self::activity_record("breeding");

			if(!empty($_POST)){
				
				$preg_eval = $this->input->post("is_pregnant", TRUE);

				$data = array(

					"sire_id"		=> $this->input->post("partner_id", TRUE),
					"is_pregnant" 	=> $preg_eval ? "Yes" : "No",
					"activity_id"	=> $activity_id,

				);

				return self::add_record("breeding_record",$data);

			}

			return FALSE;

		}

		public function health_check($checkup_type){

			if(!empty($_POST)){
				$act_id = self::activity_record("Health Check");
				
				$data = array(

					"checkup_type" 	=> $checkup_type,
					"prescription"	=> $this->input->post("prescription", TRUE),
					"quantity"		=> $this->input->post("quantity", TRUE),
					"activity_id"	=> $act_id,

				);

			}
		}

		public function loss_record(){

			if(!empty($_POST)){

				$act_id = self::activity_record("Loss");

				$data = array(
					"cause"			=> $this->input->post("cause", TRUE),
					"activity_id"	=> $act_id,
				);

				return self::add_record("loss_management", $data);

			}

		}

		public function activity_record($activity_type){
			
			$this->eartag_id = $this->input->post("eartag_id", TRUE);

			if(!empty($_POST)){

				$data = array(

					"user_id"		=> $this->session->userdata("user_id"),
					"date_perform"	=> $this->input->post("perform_date", TRUE),
					"activity_type"	=> $activity_type,
					"eartag_id"		=> $this->eartag_id,
					"remarks"		=> $this->input->post("remarks", TRUE),

				);

				self::add_record("activity", $data);

				return $this->db->insert_id();

			}

		}

		public function add_goat($category, $edit = FALSE){

			if(!empty($_POST)){

				$eartag_id 	= $this->input->post("eartag_id", TRUE);
				$gender 	= $this->input->post("gender", TRUE);

				$data = array(

					"eartag_id"		=> $eartag_id,
					"eartag_color"	=> $this->input->post("eartag_color", TRUE),
					"gender"		=> $gender,
					"body_color"	=> $this->input->post("body_color", TRUE),
					"is_castrated"	=> $gender === "female" ? "N/A" : ($this->input->post('is_castrated',TRUE) ? "Yes" : "No"),
					"category"		=> $category,
				);

				$table_name = "goat_profile";

				self::add_record($table_name,$data);	

				if($category == "birth"){
					
				//	echo "<h1>BIRTH</h1>";

					$data = array(

						"eartag_id"		=> $eartag_id,
						"birth_date"	=> $this->input->post("birth_date", TRUE),
						"sire_id"		=> $this->input->post("sire_id", TRUE),
						"dam_id"		=> $this->input->post("dam_id", TRUE)

					);
						
					$table_name = "birth_record";

				}else if($category == "purchase"){
					
					//echo "<h1>PURCHASE</h1>";

					$data = array(
							
						"eartag_id"			=> $eartag_id,
						"purchase_weight"	=> $this->input->post("purchase_weight", TRUE),
						"purchase_price"	=> $this->input->post("purchase_price", TRUE),
						"purchase_date"		=> $this->input->post("purchase_date", TRUE),
						"purchase_from"		=> $this->input->post("purchase_from", TRUE),
						"user_id"			=> $this->session->userdata("user_id"),

					);

					$table_name = "purchase_record";

				}else{

					return 0;

				}
						
				return self::add_record($table_name,$data);

			}

			return 0;

		}

		public function goat_sales(){
			
			if(!empty($_POST)){
				
				$eartag_id = $this->input->post("eartag_id", TRUE);

				$remarks = $this->input->post("remarks", TRUE);

				$data = array(

					"user_id"			=> $this->session->userdata("user_id"),
					"price_per_kilo"	=> $this->input->post("price_per_kilo", TRUE),
					"weight"			=> $this->input->post("weight", TRUE),
					"transact_date"		=> $this->input->post("transact_date", TRUE),
					"sold_to"			=> $this->input->post("sold_to", TRUE),
					"remarks"			=> $remarks ? $remarks : "N/A",
					"eartag_id"			=> $eartag_id,

				);

				//echo var_dump($data);
				if(self::add_record("goat_sales", $data) > 0){
					$data = array(
					'eartag_id' => $eartag_id,
					'status' 	=> "Sold",
					);

					//$this->db->where('eartag_id',$eartag_id);
					//return $this->db->update("goat_profile",$data);
					return self::edit_record("goat_profile", $data, "eartag_id", $eartag_id);	
				}

			} 

			return FALSE;

		}
		
		public function show_goat_record(){

			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.body_color, gp.is_castrated, gp.status, gp.category, gp.gender, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, birth_date as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id";
			
			$query = $this->db->query($sql);			
			return $query->result();

		}

		public function show_sales($sale_id){
			
			$query = $this->db->query("SELECT gs.sales_id, gs.eartag_id, gs.transact_date, ua.username, gs.price_per_kilo, gs.weight, gs.remarks, gs.sold_to FROM goat_sales as gs, goat_profile as gp, user_account as ua WHERE gs.eartag_id = gp.eartag_id AND ua.user_id = gs.user_id AND gs.sales_id = {$sale_id}");

//			if($query->num_rows() > 0)
				return $query;
//			else return false;
		}


		public function show_all_sales(){
			
			$query = $this->db->query("SELECT gs.sales_id, gs.eartag_id, gs.transact_date, ua.username, gs.price_per_kilo, gs.weight, gs.remarks, gs.sold_to FROM goat_sales as gs, goat_profile as gp, user_account as ua WHERE gs.eartag_id = gp.eartag_id AND ua.user_id = gs.user_id");

//			if($query->num_rows() > 0)
				return $query;
//			else return false;
		}
	
		public function get_goat_info($category = "birth", $ref_id){
			
	//		$sql = "";

	//		$sql = "";


			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.body_color, gp.is_castrated, gp.status, gp.category, gp.gender, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, birth_date as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gbp.record_id = {$ref_id} AND gp.category = '{$category}'";
			
			$query = $this->db->query($sql);
						
			return $query->result();

		}

	/*
	*	C.R.U.D
	*/	

		//retrieve
		public function show_record($table_name, $where = "", $field = ""){

			if($field != '*') $this->db->select($field);
			
			if($where) $this->db->where($where);
			
			$query = $this->db->get($table_name);
			
			if($query)
				return $query->result();
			else
				echo "<script>alert('test');</script>";
				return false;
			
		}

		public function edit_goat($ref_id) {

			$category 	= $this->input->post("category", TRUE);
			$eartag_id 	= $this->input->post("eartag_id", TRUE);
			
			$table_name = $category . "_record";
			$where 		= $category."_id";

			if($category === "birth"){
				
				$data = array(
					"birth_date"		=> $this->input->post("birth_date", TRUE),
					"dam_id"			=> $this->input->post("dam_id", TRUE),
					"sire_id"			=> $this->input->post("sire_id", TRUE),
				);

			}else{
				
				$data = array(
					"purchase_date"		=> $this->input->post("purchase_date", TRUE),
					"purchase_from"		=> $this->input->post("purchase_from", TRUE),
					"purchase_weight"	=> $this->input->post("purchase_weight", TRUE),
					"purchase_price"	=> $this->input->post("purchase_price", TRUE),
				);

			}

			if(self::edit_record($table_name, $data, $where, $ref_id)){
				//self::edit_record("goat_profile", $data, "eartag_id", $eartag_id)
				$gender = $this->input->post("gender", TRUE);

				$data = array(
					"eartag_id" 		=> $eartag_id,
					"eartag_color" 		=> $this->input->post("eartag_color", TRUE),
					"gender"			=> $gender,
					"is_castrated"		=> $gender === "female" ? "N/A" : ($this->input->post('is_castrated',TRUE) ? "Yes" : "No"),
					"body_color"		=> $this->input->post("body_color", TRUE),

				);	

				if(self::edit_record("goat_profile", $data, "eartag_id", $eartag_id)){
				
					return TRUE;
				
				}else{

					return FALSE;
				
				}

			}
			
/*			$data = array(
				"eartag_id" 		=> $eartag_id,
				"eartag_color" 		=> $this->input->post("eartag_color", TRUE),
				"gender"			=> $this->input->post("gender", TRUE),
				"body_color"		=> $this->input->post("body_color", TRUE),
			);

			if(self::edit_record("goat_profile", $data, "eartag_id", $eartag_id)){
				$table_name = $category . "_record";


				if($category == "birth"){

					$data = array('' => , );
			
				} else {



				}

			}
*/			
		}

		//create
		protected function add_record($table_name, $data){

			$this->db->insert($table_name,$data);
			return $this->db->insert_id();

		}

		//update
		protected function edit_record($table_name, $data, $id_name, $id){

			$this->db->where($id_name,$id);

			return $this->db->update($table_name,$data);

		}

		//delete
		protected function delete_record($table_name, $where){
			$this->db->where($where);
			return $this->db->delete($table_name);
		}

		//num_rows
		protected function count_rows($table_name, $where = "", $field = ""){
			
			if($field != '*') $this->db->select($field);
			
			if($where) $this->db->where($where);
			

			return $this->db->get($table_name)->num_rows();

		}

	}
?>
