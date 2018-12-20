<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title ><?= $title; ?>&nbsp;&mdash;&nbsp;Goats Organize Application Tracking System</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome">

	<link rel="stylesheet" href="<?= base_url()?>public/css/app.css" >
	<style>
		h1, h2, h3, h4, h5, h6, div, p{
			font-family: 'Ubuntu', sans-serif;
		}

	</style>
</head>
<body id="back2top" >
	<?php if($this->config->item('base_timestamp') <= time()) { ?>
		<main role="main">
			<!--i class="fa fa-spinner fa-pulse"></i-->
			<a style="float: right" class="nav-link" id = "back2top-btn" onclick="scrollTops();"><i class="fa fa-angle-up fa-lg text-danger font-weight-bold"></i></a>

			<?php $this->load->view($body); ?>
		</main>

	<?php } else { 

		//Display error if the date and time set incorrect
		show_404("sitemap/404.php"); 

	} ?>

	<!--Starter Template-->
	<script src="<?= base_url()?>public/js/jquery-3.3.1.slim.min.js"></script>

    <script src="<?= base_url()?>public/js/popper.min.js"></script>    
    <script src="<?= base_url()?>public/js/bootstrap.min.js"></script>
   	<script src="<?= base_url(); ?>assets/js/jquery-editable-select.min.js"></script>
   	
   	<script src="<?= base_url(); ?>assets/js/color_lookup.js"></script>

    <script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">

		
	/**
 	* Back to Top
 	*/

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

		$('#cat_info').on('change', function() {
			
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

		if($("#cat_info").val() == "birth" || $("#cat_info").val() == "purchase"){

			$("#btn-submit").attr("disabled",false);
			var x = $("#cat_info").val();

			cur_url = base_url + "goat/r/" + x;				
			

			if(x == "purchase"){
				alert(":-"+x);		
				$(".birth-elem").hide();
				$(".purchase-elem").show();

			}else {
				alert(":+"+x);
				$(".purchase-elem").hide();
				$(".birth-elem").show();				

			}
	

  			$("#goat_form").attr("action",cur_url);

		}else{

			$("#btn-submit").attr("disabled",true);
			$('.birth-elem').hide(); 
			$('.purchase-elem').hide();

		}

		//Disable is_castrated on load
		if($("#gender").val() == ""){
			
			$("#is_castrated").prop("checked",false);
			$("#is_castrated").prop("disabled",true);

		}
		$(document).ready(function(){

			$('#goat_records').DataTable();

	  		$('#dam_id_select').editableSelect();

	  		$('#sire_id_select').editableSelect();

			$('#body_color_select').editableSelect();

			$('#tag_color_select').editableSelect();

			$('#goat_id_select').editableSelect();

			$('#client_select').editableSelect();		
			
			//$("#sidebar > li a.nav-link.u-page").on("click", function(){
				
			//	this.attr("href","javascript:void(0);");
			//	$("#ui_view").prop('src',this.href);

			//});
			
			$("#sidebar > li a.nav-link.sb-menu").each(function(){
	  			var self = $(this);
	  			var href = self.attr("href");

	  			self.attr("href","javascript:void(0);");

	  			self.click(function(){
	  				$("#ui_view").prop('src',href);
	  			});
			});

	  		$("#sidebar > li div.collapse a.nav-link").each(function(){
	  			var self = $(this);
	  			var href = self.attr("href");

	  			self.attr("href","javascript:void(0);");

	  			self.click(function(){
	  				//alert(href);
	  				$("#ui_view").prop('src',href);
	  			});
	  		}); //end .each

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

  		});

		function set_index(){
			
			var href = "";

			$("#sb_dashboard").attr("href","javascript:void(0);");

			$("#sb_dashboard").click(function(){ $("#ui_view").prop('src',href) });

  		}

	</script>

</body>
</html>
