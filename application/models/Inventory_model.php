<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Inventory_model extends CI_Model {

		public function __construct(){

			parent::__construct();
			//$this->load->dbforge();

			if(!$this->session->userdata('user_id')) redirect(base_url());
			
		}
		public function new_item(){
			
			$data = array(
			
				"item_name"	=> $this->input->post("item_name", TRUE),
				"item_type"	=> $this->input->post("item_type", TRUE),
				"quantity"	=> $this->input->post("quantity", TRUE),
			
			);
			
			return self::add_record("inventory_record",$data);

		}
		public function fetch_items(){

			$sql = "SELECT * FROM inventory_record";

			$query = $this->db->query($sql);

			return $query->result();	
			
		}

		public function update_items($inventory_id){

			$data = array(
			
				"item_name"	=> $this->input->post("item_name", TRUE),
				"quantity"	=> $this->input->post("quantity", TRUE),

			);

			return self::edit_record("inventory_record", $data, "inventory_id", $inventory_id);

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