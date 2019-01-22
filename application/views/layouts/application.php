<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title ><?= $title; ?>&nbsp;&mdash;&nbsp;Goats Organize Application Tracking System</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scallable=0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome">
	<meta http-equiv="refresh" content="1800">
	<meta http-equiv="cache-controle" content="no-cache, no-store, must-revalidate">

	<link rel="stylesheet" href="<?= base_url()?>public/css/app.css" >

	<style>

		h1, h2, h3, h4, h5, h6, div, p{
			font-family: 'Ubuntu', sans-serif;
		}

	</style>
</head>
<body id="back2top" onload="startTime()">
	
	<?php if($this->config->item('base_timestamp') <= time()) { ?>
		<main role="main">
			<!--i class="fa fa-spinner fa-pulse"></i-->
			<a style="float: right" class="nav-link" id = "back2top-btn" onclick="scrollTops();"><i class="fa fa-angle-up fa-lg text-danger font-weight-bold"></i></a>

			<?php $this->load->view($body); ?>

		</main>
		
		<footer class="fixed-bottom p-0 bg-dark">
			<nav class="navbar-dark bg-dark">
  				<header class="container-fluid py-1">
    				<div class="row d-flex justify-content-between align-items-center">
      					<div class="col-6 d-flex justify-content-start align-items-center">
        					<a class="text-white nav-link px-1 p-md-3" href="#">Home</a>
        					<a class="text-white nav-link px-1 p-md-3" href="#">About</a>
        					<a class="text-white nav-link px-1 p-md-3" href="#">FAQ</a>
        					<a class="text-white nav-link px-1 p-md-3" href="#">Contact</a>
      					</div>
      				</div>
      			</header>
      		</nav>

		</footer>
	
	<?php //$this->load->view("include/footer"); ?>
	
	<?php } else { 

		//Display error if the date and time set incorrect
	?>	
		<div class="container-fluid pt-5 pt-md-2" style="height: 100vh;">
			<div class="row" style="margin-top: 15%;">
				<div class="col-5 mx-auto">
					<h4>
						<strong title="Error: Date and Time settings">EDTS.</strong>&nbsp;<span class="text-muted">That's an error.</span>
					</h4>

					<p>Please set your date and time correctly. <span class="text-muted">That’s all we know.</span></p>
					<p>Try:<br/>
						&emsp;&mdot;Set date and time in your settings via control panel<br/>
						&emsp;&mdot;Set date and time in BIOS manually.<br/>
						&emsp;&mdot;If you still facing the same issue, then it might be possible that your BIOS battery is dead and need to replace.<br/>

					</p>

				</div>
			</div>
		</div>


		<div class="container-fluid fixed-bottom">
			<div class="row">
				<div class="col-12 col-md-4">
					<div class="container-fluid">
						<div class="row mx-auto">
							<a class="nav-link col-12 col-md-3 p-1 text-center text-dark" href="<?= base_url(); ?>">Home</a>
							<a class="nav-link col-12 col-md-3 p-1 text-center text-dark" href="<?= base_url(); ?>">About</a>
							<a class="nav-link col-12 col-md-3 p-1 text-center text-dark" href="<?= base_url(); ?>">Contact Us</a>
							<a class="nav-link col-12 col-md-3 p-1 text-center text-dark" href="#" data-toggle="modal" data-target="#donation">Donate</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-1 offset-md-7 text-md-right text-center">
					<div class="row mr-auto">
						<a class="nav-link col-6 col-md-3 p-1 text-center" href="https://www.facebook.com/wolf.syntax"><span class="fa fa-facebook-square fa-lg"></span><span class="d-inline-block d-md-none text-dark">&emsp;Developer Profile</span></a>
						<a class="nav-link col-6 col-md-3 p-1 text-center text-dark" href="https://www.github.com/wolfsyntax"><span class="fa fa-github fa-lg"></span><span class="d-inline-block d-md-none text-dark">&emsp;@wolfsyntax</span></a>
					</div>			
				</div>
			</div>
		</div>

		<div class="modal fade" id="donation" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">

			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="row">
						<div class="card col-md-12 col-sm-8">

							<img class="card-img-top mt-3" src="https://blockchain.info/qr?data=bitcoin:3FW3ghHDMWSbhCMG1vQV1SqvXNTeQQWfPK?size=80&amount=0.00015000" alt="Bitcoin Address">
									
							<div class="card-body">

		    					<h5 class="card-title">Donate</h5>
		    					
		    					<p class="card-text">If you find this project helpful. You may donate any amount</p>
				
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	<?php } ?>

	<!--Starter Template-->

	<script src="<?= base_url()?>public/js/jquery-3.3.1.slim.min.js"></script>

    <script src="<?= base_url()?>public/js/popper.min.js"></script>    
    <script src="<?= base_url()?>public/js/bootstrap.min.js"></script>
   	<script src="<?= base_url(); ?>assets/js/jquery-editable-select.min.js"></script>
   	
   	<script src="<?= base_url(); ?>assets/js/color_lookup.js"></script>

    <script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>

	<script src="<?= base_url()?>public/js/jquery-slimscroll.js"></script>	
	<script src="<?= base_url() ?>public/js/textcounter.min.js"></script>

	<script type="text/javascript">


	/**
		Verification code: <code>
		Dear <first name>, use this code to complete your My Sun registration.

		Note: This verification code is valid for only 48 hours. If you did not sign-up for a My Sun account, or believe that you received this in error, please ignore this SMS. 
	**/	


	/**
 	* Back to Top
 	*/

	 	$("[data-dismiss='alert']").click(function(){ $(this).hide() });

		window.onscroll = function() {
		    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		        document.getElementById("back2top-btn").style.display = "block";
		    } else {
		        document.getElementById("back2top-btn").style.display = "none";
		    }
		};

		// When the user clicks on the button, scroll to the top of the document
		function scrollTops() {
		    document.body.scrollTop = 0;
		    document.documentElement.scrollTop = 0;
		}

		var cur_url = "";
		var base_url = <?php echo json_encode(base_url()); ?>;
		var x_agent 	= <?php echo json_encode($this->agent->referrer()); ?>;
	/**
 	* JQuery
 	*/
		
		$('#gender').on('change', function() {
			if($(this).val() == 'male'){

				$("#is_castrated").prop("disabled",false);
				$("#goat_form").attr("action",cur_url);

			}else{

				$("#is_castrated").prop("checked",false);
				$("#is_castrated").prop("disabled",true);

			}

		});

		$('[name="category"]').on('change', function() {
			
			var x = this.value;
			
  			if(x != "" ){
 
  				$("#btn-submit").attr("disabled",false);
  				cur_url = base_url + "goat/r/" + x;				
				
				if(x == "purchase"){
					
					$(".birth-elem").hide();
					$(".purchase-elem").show();

				}else if(x == "birth"){

					$(".purchase-elem").hide();
					$(".birth-elem").show();				

				}else {

					$(".purchase-elem").hide();
					$(".birth-elem").hide();

					cur_url = base_url+"goat/new";	

				}

				

  				$("#goat_form").attr("action",cur_url);

  			}else{
  				
  				$('.birth-elem').hide(); 
				$('.purchase-elem').hide();

  				$("#btn-submit").attr("disabled",true);
  			}

		});	 //#cat_info	


		//Disable submit button on load
/*		if($("[name='category']").val() == "birth" || $("[name='category']").val() == "purchase"){

			$("#btn-submit").attr("disabled",false);
			var x = $("#cat_info").val();

			cur_url = base_url + "goat/r/" + x;				
			

			if(x == "purchase"){
				//alert(":-"+x);		
				$(".birth-elem").hide();
				$(".purchase-elem").show();

			}else {
				//alert(":+"+x);
				$(".purchase-elem").hide();
				$(".birth-elem").show();				

			}
	

  			$("#goat_form").attr("action",cur_url);
  			//alert("Action: " + x);

		}else if($("[name='category']").val() != "birth" || $("[name='category']").val() != "purchase"){

			$("#btn-submit").attr("disabled",true);
			$('.birth-elem').hide(); 
			$('.purchase-elem').hide();

		}
*/

		//if()

		$('[name="category"]').on('change', function() {
			
			var x = this.value;

  			if(x != "" ){
 
  				$("#btn-submit").attr("disabled",false);
  				cur_url = base_url + "goat/r/" + x;				
				
				if(x == "purchase"){
					
					$(".mbirth-elem").hide();
					$(".mpurchase-elem").show();

				}else if(x == "birth"){

					$(".mpurchase-elem").hide();
					$(".mbirth-elem").show();				

				}else {

					$(".mpurchase-elem").hide();
					$(".mbirth-elem").hide();

					cur_url = base_url+"goat/new";	

				}

				

  				$("#goat_form").attr("action",cur_url);

  			}else{
  				
  				$('.birth-elem').hide(); 
				$('.purchase-elem').hide();

  				$("#btn-submit").attr("disabled",true);
  			}
  		});

		//Disable is_castrated on load

		if($("#gender").val() == ""){
			
			$("#is_castrated").prop("checked",false);
			$("#is_castrated").prop("disabled",true);

		}else if($("#gender").val() == "male"){

			$("#is_castrated").prop("disabled",false);	
					
		}

		function eartag_checker(){
			if($("#sire_id_select").val() == $("#eartag_id").val()){
				
				$("#btn-submit").attr("disabled",true);				

			} else if($("#dam_id_select").val() == $("#eartag_id").val()){

				$("#btn-submit").attr("disabled",true);				

			} else if($("#dam_id_select").val() == $("#sire_id_select").val()){

				$("#btn-submit").attr("disabled",true);				

			} else {

				$("#btn-submit").attr("disabled", false);				

			} 
		}

//		$("#s_id_select").bind('keyup', function(e){
//			alert("SireID: " + e);
//		});
		
/*		function check_eartag(){
			if(($("#eartag_id").val() == $("#dam_id_select").val() || $("#dam_id_select").val() == $("#sire_id_select").val() || $("#eartag_id").val() == $("#sire_id_select").val()) && ($("#dam_id_select").val() != "" || $("#sire_id_select").val() != "")) {
				alert("Eartag ID, Dam ID and Sire ID must not be the same");
				$("#btn-submit").attr("disabled",true);				

			} else {
				alert("Category: " + $("[name='category']").val() );
				if($("[name='category']").val() == ""){
					$("#btn-submit").attr("disabled",true);
				}else{
					$("#btn-submit").attr("disabled",false);
				}
			}

		}

*/
		function inventory_management(){
			var x = Number($("#prod_quantity").val()) + 1;
			document.getElementById("prod_quantity").value = x;
			//alert(x);
			//alert(document.getElementById("prod_quantity").value);
		}

		function choose_color(color){
			document.getElementById("eartag_palette").innerHTML = '<i class="fas fa-palette fa-lg" style="color: '+color+';"></i>&emsp;' + color;

			document.getElementById("eartag_colorx").value = color;
		}

		$(document).ready(function(){



			$("body").on("contextmenu",function(e){
				return false;
			});

			$("div").on("contextmenu",function(e){
				return false;
			});
			
			$("#gp_record").DataTable();

			$("#gs_record").DataTable();
			

/*Category (Disable button) */			

			if($("#rcategory").val() == "birth"){

	  			$('.birth-elem').show(); 
				$('.purchase-elem').hide();

			}else if($("#rcategory").val() == "purchase"){

	  			$('.birth-elem').hide(); 
				$('.purchase-elem').show();
			
			}else {
	  		
	  			$('.birth-elem').hide(); 
				$('.purchase-elem').hide();
				$("#btn-submit").attr("disabled",true);
			
			}
/*End of Category (Disable button)*/

	  		$("#dam_id_select").editableSelect();

	  		$("#sire_id_select").editableSelect();
	  		$("#s_id_select").editableSelect();

			$('#body_color_select').editableSelect();

			$('#tag_color_select').editableSelect();

			$('#goat_id_select').editableSelect();

			$('#client_select').editableSelect();		
			
			//$("#sidebar > li a.nav-link.u-page").on("click", function(){
				
			//	this.attr("href","javascript:void(0);");
			//	$("#ui_view").prop('src',this.href);

			//});

// Sidebar Menu

			$("#sidebar > li a.nav-link.sb-menu").each(function(){
				
	  			var self = $(this);
	  			var href = self.attr("href");

	  			self.attr("href","javascript:void(0);");

	  			self.click(function(){
	  				$("#ui_view").prop('src',href);
	  			});
			});

// Table Link

			$("a.btn-goat").each(function(){
				
	  			var self = $(this);
	  			var href = self.attr("href");

	  			self.attr("href","javascript:void(0);");

	  			self.click(function(){
	  				window.location.assign(href);
	  			});
			});
	
/*
	  		$("#sidebar > li div.collapse a.nav-link").each(function(){
	  			var self = $(this);
	  			var href = self.attr("href");

	  			self.attr("href","javascript:void(0);");

	  			self.click(function(){
	  				//alert(href);
	  				$("#ui_view").prop('src',href);
	  			});
	  		}); //end .each
*/
		  	$('[data-target="#assetManagement"]').popover({

		  		placement: "right",
		  		trigger: "focus",
		  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-danger text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
		  	});
			
			$('[data-toggle="popover dashboard"]').popover({

		  		placement: "right",
		  		trigger: "focus",
		  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-light text-dark"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
		  	});

			$('[data-toggle="popover transaction"]').popover({

		  		placement: "right",
		  		trigger: "focus",
		  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-info text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
		  	});

			$('[data-toggle="popover manage"]').popover({

		  		placement: "right",
		  		trigger: "focus",
		  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-dark text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
		  	});

		  	$("[name='remember']").on("click",function(){
		  	//	alert("Tick");
		  	});

  		});

		function set_index(){
			
			var href = "";

			$("#sb_dashboard").attr("href","javascript:void(0);");

			$("#sb_dashboard").click(function(){ $("#ui_view").prop('src',href) });

  		}

  		function check_form(e){

  			var elem_tag = "#" + e.submit.id;
  			var btn_text = "Please wait...";

  			if(e.submit.id == "login_btn"){

  				btn_text = "Signing in...";

  			} else if(e.submit.id == "update_btn") {
  				
  				btn_text = "Updating...";

  			} else if(e.submit.id == "save_btn") {

  				btn_text = "Saving...";

  			}

  			$(elem_tag).attr("disabled","disabled");
  			$(elem_tag).val(btn_text);

  		}

  		function js_button(){

  			//laert(x_agent+"::");

  			window.location.assign(x_agent);
  			//$("#ui_view").prop("src",x_agent);

  		}
  

		$("a.btn-goat-rm").each(function(){
				
	  		var self = $(this);
	  		var href = self.attr("href");

	  		self.attr("href","javascript:void(0);");

	  		self.click(function(){

	  			if(confirm("Are you sure you want to delete this transaction?")){

	  				window.location.assign(href);
	  			
	  			}else{
	  			
	  				return false;
	  			
	  			}

	  		});
		});
/*
		$("#pregCheck").on('click', function(){

			alert("Modal");

		});
*/
		function pregcheck_form(act_id) {
			//$('.modal').modal('show');
			
//			alert(act_id);
			//breeding/(:num)/update
			var cur_url = base_url + "breeding/" + act_id + "/update";
			//alert("Current URL: " + cur_url);
			$("#pregcheck_aform").attr("action",cur_url);
			e.preventDefault();
		}

		function statusCheck_form(eartag_id) {
			//$('.modal').modal('show');
			
//			alert(act_id);
			//status/{$eartag_id}/edit

			var cur_url = base_url + "status/" + eartag_id + "/edit";
			//alert("Current URL: " + cur_url);
			$("#statusCheckForm").attr("action",cur_url);
			$("#eartag_id_stat").val(eartag_id); 
			e.preventDefault();
		}

	</script>

	<script type="text/javascript">
		
		$("#ui_view").height(
			$(window).height() - ($("body").height() - '20px';

		);

		$(function () {

		//	debugger;
			$('#ui_view').slimscroll({
				//width: '300px',
				width : 'auto',
				height: '526px',
				opacity: 0.4,
				size: '1px',
				railOpacity: 0.1,
		            //height: '516px',
				railVisible: true,
				allowPageScroll: false,
			});
		});


		</script>
</body>
</html>
