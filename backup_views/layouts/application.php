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
			<a style="float: right" class="nav-link" id = "back2top-btn"><i class="fa fa-angle-up fa-lg text-danger font-weight-bold"></i></a>

			<?php if(isset($breadcrumbs) && $this->session->userdata('username')){ ?>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<?php foreach($breadcrumbs as $key => $val) {?>
							<li class="breadcrumb-item" ><a href="<?= base_url($val) ?>" style="text-decoration: none;"><?= ucfirst(str_replace("_"," ",$key)) ?></a></li>
						<?php }?>
						<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;"><?= $breadcrumb?></a></li>
					</ol>
				</nav>
				
			<?php } 
				$this->load->view($body); 
			?>

		</main>
		
		<!--footer class="fixed-bottom p-0 bg-dark">
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

		</footer-->
	
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

	<script src="<?= base_url()?>public/js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>

    <script src="<?= base_url()?>public/js/popper.min.js"></script>    

    <script src="<?= base_url()?>public/js/bootstrap.min.js"></script>

   	<script src="<?= base_url(); ?>assets/js/jquery-editable-select.min.js"></script>
   	
   	<script src="<?= base_url(); ?>assets/js/color_lookup.js"></script>


    <!--script type="text/javascript" src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js">alert('test');</script-->

    <script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>


	<script src="<?= base_url()?>public/js/jquery-slimscroll.js"></script>
	<script src="<?= base_url()?>assets/js/bootstrap-tagsinput.js" crossorigin="anonymous"></script>		
	<script src="<?= base_url() ?>public/js/textcounter.min.js"></script>

	<script src="<?= base_url('public/js/app.js') ?>">

	/**
		Verification code: <code>
		Dear <first name>, use this code to complete your My Sun registration.

		Note: This verification code is valid for only 48 hours. If you did not sign-up for a My Sun account, or believe that you received this in error, please ignore this SMS. 
	**/

	</script>

	<script type="text/javascript">


		var cur_url = "";
		var base_url = <?php echo json_encode(base_url()); ?>;
		var x_agent 	= <?php echo json_encode($this->agent->referrer()); ?>;

		$('[name="category"]').on('change', function() {
			
			var x = this.value;
		
  			if(x != "" ){
// 				alert('category change to '+x);	
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

		});	 

		$('[name="category"]').on('change', function() {
			
			var x = this.value;
	
			$("#save_btn").attr("disabled",false);
  	
  			if(x != "" ){

				$("#save_submit").attr("disabled",false);
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
					$("#save_btn").attr("disabled",true);
	
					cur_url = base_url+"goat/new";	

				}

				$("#goat_form").attr("action",cur_url);

  			} else {
  				
  				$('.birth-elem').hide(); 
				$('.purchase-elem').hide();

  				$("#btn-submit").attr("disabled",true);
  			}
	  	});

		if($("#rcategory").val() == "birth" || $("#rcategory").val() == "birth"){

			$('.birth-elem').show(); 
			$('.purchase-elem').hide();

		}else if($("#rcategory").val() == "purchase" || $("#rcategory").val() == "purchase" ){

			$('.birth-elem').hide(); 
			$('.purchase-elem').show();
				
		}else {

			$('.birth-elem').hide(); 
			$('.purchase-elem').hide();

		}
		
	</script>

	<script src="<?= base_url('public/js/cstyles.js') ?>">

	</script>

</body>
</html>
