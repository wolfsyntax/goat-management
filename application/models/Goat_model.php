<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Goat_model extends CI_Model {

		public function __construct(){

			parent::__construct();
			//$this->load->dbforge();

			//if(!$this->session->userdata('user_id')) redirect(base_url());

			if(!$this->session->userdata('goat_records')){
				if(self::show_goat_record()){
					
					$array = array(
						'goat_records' => TRUE,
					);
					
				} else {

					$array = array(
						'goat_records' => FALSE,
					);

				}

				$this->session->set_userdata( $array );
			}
			
			self::count_pregnant();
			self::count_unhealthy();
			self::count_healthy();
			self::count_sold();
			self::count_available_goat();

		}

		public function get_child($eartag_id){

			$sql = "SELECT gp.eartag_id, gp.birth_date, gp.gender FROM birth_record as br, goat_profile as gp WHERE gp.eartag_id = br.eartag_id AND br.dam_id = {$eartag_id}";

			$query = $this->db->query($sql);


			if($query->num_rows() >= 1){
				
				return $query->result();	

			} else {

				return FALSE;
			}

		}

		public function get_unhealthy_goat(){  //*w

			$sql="SELECT * FROM goat_profile WHERE status='active' AND eartag_id NOT IN (SELECT act.eartag_id FROM activity AS act, health_record AS hr  WHERE hr.activity_id=act.activity_id)";

			$query = $this->db->query($sql);

			if($query->num_rows() > 0){
				
				return $query->result();	//return TRUE;			

			} else {

				return FALSE;

			}

		}

		public function recent_transactions(){

			$curr_date = Carbon\Carbon::now()->format('Y-m-d');
			$date_7Dbefore = Carbon\Carbon::parse($curr_date)->addDays(7)->format('Y-m-d');
			//echo "<script>alert('{$date_7Dbefore} {$curr_date}') </script>";
			//Fix this
			$sql = "SELECT gp.eartag_id, gp.eartag_color, gs.sold_to, users.username, gp.nickname, gs.transact_date, gs.price_per_kilo, gs.weight FROM goat_profile as gp, goat_sales as gs, user_account as users WHERE gp.eartag_id = gs.eartag_id AND users.user_id = gs.user_id AND gs.transact_date BETWEEN '{$curr_date}' AND '{$date_7Dbefore}'";

			$query = $this->db->query($sql);

			if($query->num_rows() > 0){
				
				return $query->result();	//return TRUE;			

			} else {

				return FALSE;

			}

		}

		public function recent_activity($activity_type = ""){

			$curr_date = Carbon\Carbon::now()->format('Y-m-d');
			$date_7Dbefore = Carbon\Carbon::parse($curr_date)->subDays(7)->format('Y-m-d');
			//echo "<script>alert('{$date_7Dbefore} {$curr_date}') </script>";
			//Fix this
			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.nickname, ga.date_perform, users.username, ga.activity_type FROM goat_profile as gp, activity as ga, user_account as users WHERE gp.eartag_id = ga.eartag_id AND users.user_id = ga.user_id AND ga.date_perform BETWEEN '{$date_7Dbefore}' AND '{$curr_date}'";

			if($activity_type != ""){
				$sql .= " AND activity_type = " . $activity_type;
			}

			//echo "<script>alert('{$curr_date} {$date_7Dbefore}')</script>";

			$query = $this->db->query($sql);

			if($query->num_rows() > 0){
				
				return $query->result();	//return TRUE;			

			} else {

				return FALSE;

			}

		}


		public function get_breeding_notification(){

			$curr_date = Carbon\Carbon::now()->format('Y-m-d');
			$date_7Dbefore = Carbon\Carbon::parse($curr_date)->addDays(7)->format('Y-m-d');
			//echo "<script>alert('{$date_7Dbefore} {$curr_date}') </script>";
			//Fix this
			$sql = "SELECT act.eartag_id, br.due_date, br.is_pregnant, gp.nickname FROM goat_profile as gp, activity as act, breeding_record as br WHERE gp.eartag_id = act.eartag_id AND br.activity_id = act.activity_id AND br.due_date BETWEEN '{$curr_date}' AND '{$date_7Dbefore}'";

			$query = $this->db->query($sql);

			if($query->num_rows() > 0){
				
				return $query->result();	//return TRUE;			

			} else {

				return FALSE;

			}

			//due_date >= DATE(NOW()) - INTERVAL 7 DAY

		}
		//save
		public function breeding_record(){

			$activity_id = self::activity_record("breeding");

			if(!empty($_POST)){
				
				$preg_eval = $this->input->post("is_pregnant", TRUE);

				$data = array(

					"sire_id"		=> $this->input->post("partner_id", TRUE),
					"is_pregnant" 	=> $preg_eval ? "yes" : "no",
					"activity_id"	=> $activity_id,

				);

				return self::add_record("breeding_record",$data);

			}

			return FALSE;

		}

		public function health_check($eartag_id){

			if(!empty($_POST)){
				$act_id = self::activity_record("Health Check");
				

				$data = array(

					"checkup_type" 		=> strtolower($this->input->post("checkup_type", TRUE)),
					"inventory_id"		=> $this->input->post("prescription", TRUE),
					"quantity"			=> $this->input->post("quantity", TRUE),
					"activity_id"		=> $act_id,

				);
				//echo "<h1>HEALTH CHECK MODEL MODULE {$act_id}</h1>";
				#print_r($data);
				$last_id = self::add_record("health_record",$data);
				$error = $this->db->error();

				$error_code = $error['code'];

				if($error_code == 1644){
					return FALSE;
				} else {
					return TRUE;
				}
				
			}
		}


		public function get_loss_record(){
			
			$sql = "SELECT act.eartag_id, act.date_perform, loss.cause, act.remarks, users.username FROM activity as act, loss_management as loss, user_account as users WHERE act.activity_id = loss.activity_id AND users.user_id = act.user_id";

			$query = $this->db->query($sql);
			
			if($query->num_rows() > 0){			

				return $query->result();

			} else {

				return FALSE;
			
			}

		}

		public function loss_record(){

			if(!empty($_POST)){

				$act_id = self::activity_record("Loss");
				$cause 	= strtolower($this->input->post("loss_caused", TRUE));

				$data = array(
					"cause"			=> $cause,
					"activity_id"	=> $act_id,
				);

				if(self::add_record("loss_management", $data)){
					$data = array(
						'status'	=> $cause,
					);

					return self::edit_record("goat_profile", $data, "eartag_id", $this->eartag_id);

				}

			}

		}

		public function activity_record($activity_type){
			
			$this->eartag_id = $this->input->post("eartag_id", TRUE);

			if(!empty($_POST)){

				$data = array(

					"user_id"		=> $this->session->userdata("user_id"),
					"date_perform"	=> $this->input->post("perform_date", TRUE),
					"activity_type"	=> strtolower($activity_type),
					"eartag_id"		=> $this->eartag_id,
					"remarks"		=> $this->input->post("remarks", TRUE),

				);


				$last_id = self::add_record("activity", $data);
				//echo "<h1>Activity ID: {$last_id}</h1>";

				return $last_id;

			}

		}

		public function update_breeding($activity_id){
			
			if(!empty($_POST)){

				$response = $this->input->post("preg_select", TRUE);

				$sql = "SELECT * FROM activity WHERE activity_id = {$activity_id}";

				$query = $this->db->query($sql);
			
				if($query->num_rows() > 0){			
					
					$dday = "";
					
					foreach($query->result() as $row){

						$dday = $row->date_perform;
					}
					
					//echo "<h1>The DAY {$dday}</h1>";


					//echo "<script>alert('wait')</script>";
					$data = array(
						"is_pregnant"	=> strtolower($response),
						"due_date"		=>  Carbon\Carbon::parse($dday)->addDays(150),
					);

					return self::edit_record("breeding_record", $data, "activity_id", $activity_id);	
 			
	 			} else {
						
						return FALSE;

				}

			}			

		}


		public function add_goat($category, $edit = FALSE){

			if(!empty($_POST)){

				$eartag_id 	= $this->input->post("eartag_id", TRUE);
				$gender 	= $this->input->post("gender", TRUE);

				$data = array(

					"eartag_id"		=> $eartag_id,
					"eartag_color"	=> strtolower($this->input->post("eartag_color", TRUE)),
					"nickname"		=> $this->input->post("nickname", TRUE),
					"gender"		=> strtolower($gender),
					"body_color"	=> strtolower($this->input->post("body_color", TRUE)),
					"is_castrated"	=> $gender === "female" ? "N/A" : ($this->input->post('is_castrated',TRUE) ? "Yes" : "No"),
					"category"		=> strtolower($category),
					"birth_date"	=> $this->input->post("birth_date", TRUE),
				);

				$table_name = "goat_profile";

				self::add_record($table_name,$data);	

				if($category == "birth"){
					
					echo "<h1>BIRTH</h1>";

					$data = array(

						"eartag_id"		=> $eartag_id,
						"sire_id"		=> $this->input->post("sire_id", TRUE),
						"dam_id"		=> $this->input->post("dam_id", TRUE)

					);
						
					$table_name = "birth_record";

				}else if($category == "purchase"){
					
					echo "<h1>PURCHASE</h1>";

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
					"remarks"			=> strtolower($remarks ? $remarks : "N/A"),
					"eartag_id"			=> $eartag_id,
					"status"			=> "Sold",

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


		public function is_breed($eartag_id){

			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.body_color, gp.is_castrated, gp.status, gp.category, gp.birth_date, gp.gender, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id,gp.nickname FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gbp.acquire_date <= DATE_SUB(curdate(), INTERVAL 10 MONTH) AND gp.eartag_id = '{$eartag_id}'";

			$query = $this->db->query($sql);

			if($query->num_rows() == 1){
				
				return TRUE;			

			} else {

				return FALSE;

			}
			//return $query->result();		

		}

		public function goat_breed($gender){

			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.body_color, gp.is_castrated, gp.status, gp.category, gp.gender, gp.birth_date, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id, gp.nickname FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gp.birth_date <= DATE_SUB(curdate(), INTERVAL 10 MONTH) AND gp.gender = '{$gender}' AND gp.status = 'active'";

			$query = $this->db->query($sql);
			
			if($query->num_rows() > 0){
				//echo "<h1>RECORDS FOUND!</h1>";
				return $query->result();		

			} else {
				//echo "<h1>RECORDS NOT FOUND!</h1>";
				return FALSE;

			}

		}

		public function show_breeding_record($breed_id){

			$sql = "SELECT ar.activity_id, ar.user_id, ar.eartag_id, ar.date_perform, ar.activity_type, ar.remarks, br.sire_id, br.is_pregnant, br.due_date FROM breeding_record as br, activity as ar WHERE br.activity_id = ar.activity_id  AND br.breed_id = {$breed_id}";
			
			$query = $this->db->query($sql);
			if($query->num_rows() > 0){			
				
				return $query->result();

			} else {

				return FALSE;

			}

		}

		public function get_breeding_records(){

			$sql = "SELECT ar.activity_id, ua.username, gpf.eartag_color as 'dam_color', gpm.eartag_color as 'sire_color', gpf.nickname as 'dam_name', gpm.nickname as 'sire_name', ar.eartag_id, ar.date_perform, ar.activity_type, ar.remarks, br.sire_id, br.is_pregnant, br.due_date FROM breeding_record as br, activity as ar, user_account as ua, goat_profile as gpm, goat_profile as gpf WHERE br.activity_id = ar.activity_id AND ar.user_id = ua.user_id AND br.sire_id = gpm.eartag_id AND ar.eartag_id = gpf.eartag_id";
			
			$query = $this->db->query($sql);	

			if($query->num_rows() > 0){		
				
				return $query->result();

			} else {

				return FALSE;

			}

		}
		
		public function get_health_records($eartag_id){

			$sql = "SELECT hr.checkup_type, act.date_perform, invr.item_name as prescription, hr.quantity, ua.username, act.remarks FROM activity as act, health_record as hr, inventory_record as invr, user_account as ua WHERE hr.activity_id = act.activity_id AND hr.inventory_id = invr.inventory_id AND act.user_id = ua.user_id AND act.eartag_id = {$eartag_id}";

			$query = $this->db->query($sql);

			if($query->num_rows() > 0){

				return $query->result();

			} else {

				return FALSE;

			}

		}


		public function get_all_health_records(){
			
			//$sql = "SELECT DISTINCT act.eartag_id, gp.eartag_color, gp.nickname, gp.gender, gp.birth_date, gbp.acquire_date, gp.birth_date FROM activity as act, goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gbp.eartag_id = gp.eartag_id AND act.eartag_id = gp.eartag_id AND act.activity_type = 'health check'";

			$sql = "SELECT DISTINCT act.eartag_id, gp.eartag_color, gp.nickname, gp.gender, gp.birth_date, gbp.acquire_date FROM activity as act, goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp, health_record as hr WHERE gbp.eartag_id = gp.eartag_id AND act.eartag_id = gp.eartag_id AND act.activity_type = 'health check' AND act.activity_id = hr.activity_id";

			$query = $this->db->query($sql);

			if($query->num_rows() > 0){

				return $query->result();

			} else {

				return FALSE;

			}

		}

		public function show_active_goats(){

			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.nickname, gp.body_color, gp.is_castrated, gp.status, gp.category, gp.gender, gp.birth_date, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id, gp.nickname FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gp.status = 'active'";
			
			$query = $this->db->query($sql);			
			
			if($query->num_rows() > 0){
			
				return $query->result();
			
			} else {

				return FALSE;
			
			}

		}

		public function goats_can_be_sold(){

			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.nickname, gp.body_color, gp.is_castrated, gp.status, gp.birth_date, gp.category, gp.gender, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id, gp.nickname FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gp.status = 'active'AND gbp.acquire_date <= DATE_SUB(CURDATE(), INTERVAL 12 MONTH )";
			
			$query = $this->db->query($sql);			
			
			if($query->num_rows() > 0){
			
				return $query->result();
			
			} else {

				return FALSE;
			
			}

		}
		
		public function show_goat_record(){

			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.body_color, gp.is_castrated, gp.status, gp.birth_date, gp.category, gp.gender, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id, gp.nickname FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id";
			
			$query = $this->db->query($sql);
			
			if($query->num_rows() > 0){
				
				return $query->result();

			} else {

				return FALSE;

			}				
			

		}

		public function available_goat(){

			$sql = "SELECT gp.eartag_id, gp.nickname, gp.birth_date FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gp.birth_date <= DATE_SUB(curdate(), INTERVAL 1 YEAR) AND gp.status = 'active'";

			$query = $this->db->query($sql);
			
			if($query->num_rows() > 0){			
			
				return $query->result();
			
			} else {
				
				return FALSE;

			}

		}

		public function is_available_goat($eartag_id){
			
		//	echo "<h1>Eartag ID: #{$eartag_id}</h1>";

			$sql = "SELECT gp.eartag_id FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gp.birth_date <= DATE_SUB(curdate(), INTERVAL 1 YEAR) AND gp.eartag_id = {$eartag_id} AND gp.status = 'active'";

			$query = $this->db->query($sql);
			
			if($query->num_rows() == 1){
				
				return TRUE;			

			} else {

				return FALSE;

			}			
			//return $query->result();

		}

		public function show_sales($sale_id){
			
			$query = $this->db->query("SELECT gs.sales_id, gs.eartag_id, gp.eartag_color, gp.nickname, gs.transact_date, ua.username, gs.price_per_kilo, gs.weight, gs.remarks, gs.sold_to, gs.status FROM goat_sales as gs, goat_profile as gp, user_account as ua WHERE gs.eartag_id = gp.eartag_id AND ua.user_id = gs.user_id AND gs.sales_id = {$sale_id}");

//			if($query->num_rows() > 0)
				return $query;
//			else return false;
		}




		public function show_all_sales(){
			
			$query = $this->db->query("SELECT gs.sales_id, gs.eartag_id, gs.status as sales_status, gp.eartag_color, gp.nickname, gs.transact_date, ua.username, gs.price_per_kilo, gs.weight, gs.remarks, gs.sold_to, gs.status FROM goat_sales as gs, goat_profile as gp, user_account as ua WHERE gs.eartag_id = gp.eartag_id AND ua.user_id = gs.user_id");

			if($query->num_rows() > 0)
				return $query->result();
			else return false;

		}
	
		public function get_goat_info($category = "birth", $ref_id){
			
	//		$sql = "";

	//		$sql = "";
//			echo "<h1>Get GOAT Info {$category}</h1>";

			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.body_color, gp.is_castrated, gp.status, gp.category, gp.gender, gp.birth_date, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id, gp.nickname FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gbp.record_id = {$ref_id} AND gp.category = '{$category}'";
			
			$query = $this->db->query($sql);
			
			if($query->num_rows() >= 1){						
				
				return $query->result();
			
			} else {
				
				return FALSE;

			}
			
		}

		public function edit_sales($sales_id){
			
			$where = "sales_id";
			
			$flag = FALSE;

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
					"status"			=> "sold",

				);

				if(self::edit_record("goat_sales", $data, $where, $sales_id)){
					$flag = TRUE;
				}
			}

			return $flag;	

		}
		
	/*
	*	C.R.U.D
	*/	

		public function remove_sales($sales_id){
			
			$sql = self::show_record("goat_sales", "sales_id = {$sales_id}", "eartag_id");
			
			if($sql){

				foreach($sql as $row){
					$eartag_id = $row->eartag_id;
				}	

			}

			$data = array(
				"status" => "returned",
			);

			if(self::edit_record("goat_sales", $data,"sales_id", $sales_id)){
				$data = array(
					"status" => "active",
				);

				return self::edit_record("goat_profile", $data, "eartag_id", $eartag_id);
					
			}else{
			
				return false;
			
			}

		}

		public function show_loss_records($eartag_id, $user_id){
			
			$sql = "SELECT a.activity_id, a.user_id, a.eartag_id, lm.cause, lm.loss_id, a.date_perform, a.activity_type, a.remarks FROM activity as a, loss_management as lm WHERE a.activity_id = lm.activity_id AND eartag_id = {$eartag_id} AND a.user_id = {$user_id} AND a.activity_type='loss' ";
			
			$query = $this->db->query($sql);
			
			if($query->num_rows() >= 1){			
			
				return $query->result();
			
			} else {

				return FALSE;
			
			}

		}

		//retrieve
		public function show_record($table_name, $where = "", $field = ""){

			if($field != '*') $this->db->select($field);
			
			if($where) $this->db->where($where);
			
			$query = $this->db->get($table_name);
			if($query->num_rows() >= 1){
//			if($query){
			
				return $query->result();
			
			} else {

				return false;
			
			}
			
		}



		public function edit_goat($ref_id) {

			$category 	= $this->input->post("category", TRUE);
			$eartag_id 	= $this->input->post("eartag_id", TRUE);
			$recent_category = $this->input->post("recent_category", TRUE);

			$table_name = $category . "_record";
			$where 		= $category."_id";
			//echo "<h1>{$recent_category}</h1>";
			if($recent_category != $category){
#				echo "<h1>CATEGORY CHANGE</h1>";
#				echo "<h1>{$recent_category} :: {$ref_id}</h1>";

				self::delete_record($recent_category."_record", $recent_category."_id = {$ref_id}");
			}

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
					"eartag_color" 		=> strtolower($this->input->post("eartag_color", TRUE)),
					"nickname"			=> $this->input->post("nickname", TRUE),
					"gender"			=> strtolower($gender),
					"is_castrated"		=> $gender === "female" ? "N/A" : ($this->input->post('is_castrated',TRUE) ? "Yes" : "No"),
					"body_color"		=> strtolower($this->input->post("body_color", TRUE)),

				);	

				if($recent_category == $category){
					
					if(self::edit_record("goat_profile", $data, "eartag_id", $eartag_id)){
					
						return TRUE;
					
					}else{

						return FALSE;
					
					}

				}else{

					return self::add_record($table_name,$data);
					
				}

			}
						
		}

		/**
		** Total counts of Sire
		**/
		public function count_sire(){

			return self::count_rows("goat_profile", array("gender"=>"male","status"=>"active",));

		}

		/**
		** Total counts of Dam
		**/
		public function count_dam(){

			return self::count_rows("goat_profile", array("gender"=>"female","status"=>"active",));

		}

		/**
		** Total counts of goats that are already sold
		**/
	//	public function count_sold(){

	//		return self::count_rows("goat_profile", array("status"=>"sold",));

	//	}

		/**
		** Total counts of goats that are loss
		**/
		public function count_loss(){

			return self::count_rows("goat_profile", "status != 'active' AND status != 'sold'");

		}

		public function count_pregnant(){
			
			$sql = "SELECT gpf.eartag_id as dam, br.is_pregnant, br.due_date, ac.date_perform, ac.remarks, gpf.eartag_color as dam_ecolor, gpm.eartag_color as partner_ecolor FROM breeding_record as br, activity as ac, goat_profile as gpm, goat_profile as gpf WHERE gpf.eartag_id = ac.eartag_id AND gpm.eartag_id = br.sire_id AND br.is_pregnant = 'yes' AND ac.activity_type = 'breeding'";
			
			$query = $this->db->query($sql);
			
			$data = array(
				"n_pregnant" 	=> $query->num_rows(),
				"d_pregnant"	=> $query->result(),
				"f_pregnant"	=> $query->num_rows() >= 1 ? TRUE : FALSE,
			);

			$this->session->unset_userdata('preg_count');
					$this->session->set_userdata('preg_count', $data['n_pregnant']);

			return $data;

		}

		public function count_unhealthy(){
			
			$sql = "SELECT * FROM goat_profile WHERE status='active' AND eartag_id NOT IN (SELECT act.eartag_id FROM activity AS act, health_record AS hr  WHERE hr.activity_id=act.activity_id)";
			
			$query = $this->db->query($sql);
			
			$data = array(
				"n_unhealthy" 	=> $query->num_rows(),
				"d_unhealthy"	=> $query->result(),
				"f_unhealthy"	=> $query->num_rows() >= 1 ? TRUE : FALSE,
			);

			$this->session->unset_userdata('unhealthy_count');
			$this->session->set_userdata('unhealthy_count',	$data['n_unhealthy']);
			return $data;

		}

		public function count_healthy(){
			
			$sql = "SELECT * FROM goat_profile WHERE status='active' AND eartag_id IN (SELECT act.eartag_id FROM activity AS act, health_record AS hr WHERE hr.activity_id=act.activity_id)";
			
			$query = $this->db->query($sql);
			
			$data = array(
				"n_healthy" => $query->num_rows(),
				"d_healthy"	=> $query->result(),
				"f_healthy"	=> $query->num_rows() >= 1 ? TRUE : FALSE,
			);

			$this->session->unset_userdata('healthy_count');
					$this->session->set_userdata('healthy_count', $data['n_healthy']);

			return $data;

		}

		public function count_sold(){
			
			$sql = "SELECT * FROM goat_profile WHERE status='sold'";
			
			$query = $this->db->query($sql);
			
			$data = array(
				"n_sold" => $query->num_rows(),
				"d_sold"	=> $query->result(),
				"f_sold"	=> $query->num_rows() >= 1 ? TRUE : FALSE,
			);

			$this->session->unset_userdata('sold_count');
			$this->session->set_userdata('sold_count', $data['n_sold']);

			return $data;

		}		

		public function count_available_goat(){
			
			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.body_color, gp.is_castrated, gp.status, gp.category, gp.gender, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id, gp.nickname FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gbp.acquire_date <= DATE_SUB(curdate(), INTERVAL 12 MONTH)";
			
			$query = $this->db->query($sql);
			
			$data = array(
				"n_asold" => $query->num_rows(),
				"d_asold"	=> $query->result(),
				"f_asold"	=> $query->num_rows() >= 1 ? TRUE : FALSE,
			);

			$this->session->unset_userdata('canBeSold_count');
			$this->session->set_userdata('canBeSold_count', $data['n_asold']);

			return $data;

		}

		//SELECT * FROM birth_record WHERE birth_date NOT BETWEEN DATE_SUB(curdate(), INTERVAL 10 MONTH) AND CURDATE() AND birth_date < curdate()
		
		/**
		** Goats that are 12 Months old and ready to be sold
		**/
		public function count_s(){

		#	$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.body_color, gp.is_castrated, gp.status, gp.category, gp.gender, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, birth_date as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gbp.acquire_date NOT BETWEEN DATE_SUB(curdate(), INTERVAL 10 MONTH) AND curdate() AND gbp.acquire_date < curdate()";

			$sql = "SELECT gp.eartag_id, gp.eartag_color, gp.body_color, gp.is_castrated, gp.status, gp.category, gp.gender, gbp.record_id as ref_id, gbp.purchase_weight, gbp.purchase_price, gbp.acquire_date, gbp.purchase_from, gbp.user_id, gbp.sire_id, gbp.dam_id, gp.nickname FROM goat_profile as gp, (SELECT birth_id as record_id, NULL as purchase_weight, NULL as purchase_price, NULL as acquire_date, NULL as purchase_from, eartag_id, NULL as user_id, sire_id, dam_id FROM birth_record UNION SELECT purchase_id as record_id, purchase_weight,purchase_price, purchase_date as acquire_date, purchase_from, eartag_id, user_id, NULL as sire_id, NULL as dam_id FROM purchase_record) as gbp WHERE gp.eartag_id = gbp.eartag_id AND gbp.acquire_date <= DATE_SUB(curdate(), INTERVAL 12 MONTH) ";

			$query = $this->db->query($sql);
						
//			return $query->result();

			if($query->num_rows() >= 1){
				
				return $query->result();	

			} else {

				return FALSE;
			}

			//return self::count_rows("goat_profile", array("gender"=>"male","status"=>"active",));

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
			
			$n_rows = $this->db->get($table_name)->num_rows();
			
			if($n_rows > 0) {

				return $n_rows;

			} else {

				return FALSE;

			}

		}

	}
?>
	