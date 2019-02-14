<!DOCTYPE html>
<html lang="en">
<head>
	
	<title ><?= $title ?> &mdash; G.O.A.T.S</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scallable=0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome">
	<meta http-equiv="refresh" content="1800">
	<meta http-equiv="cache-controle" content="no-cache, no-store, must-revalidate">

	<link rel="stylesheet" type="text/css" href="<?= base_url('public/css/app.css')?>">

</head>

<body>
	<?php if($this->config->item('base_timestamp') <= time()) {
		$this->load->view($body);
	} else { 
		$this->load->view('errors/html/error_403');
	} ?>
	
	<a href="" class="scrollup"><i class="fa fa-angle-up active"></i></a>	

	<!-- Starter Template -->
	<script src="<?= base_url('public/dist/js/jquery-3.3.1.slim.min.js'); ?>"></script>
	<script src="<?= base_url('public/dist/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('public/dist/js/bootstrap.bundle.min.js') ?>"></script>




    <script src="<?= base_url('public/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('public/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('public/js/jquery-editable-select.min.js'); ?>"></script>

	<!-- Developer Config-->
	
	<script type="text/javascript">
		$('.social-icon').tooltip();
		//$().dropdown('toggle');

 		$('#dropcolor').click(function(){
 			var flag = $(".dropdown-menu-dropcolor").attr("class");
 			
 			if("dropdown-menu-dropcolor show" == flag){
       			$('.dropdown-menu').toggleClass('hide');
       		}else {
       			$('.dropdown-menu-dropcolor').toggleClass('show');
       		}

		});

		$('#calendar-header').on('click', function () {
			var xyz = $("#angle-icon").attr("class");
			
			$("#angle-icon").removeClass();
				
			if("fa fa-angle-down" == xyz){
				$("#angle-icon").addClass("fa fa-angle-up");	
			}else{
				$("#angle-icon").addClass("fa fa-angle-down");
			}
		
		});  
		
		var cur_url = "";
		var base_url = <?php echo json_encode(base_url()); ?>;
		var x_agent 	= <?php echo json_encode($this->agent->referrer()); ?>;		

		
	 	$('[data-toggle="popover"]').popover({

  			placement: "right",
  			trigger: "focus",
  			template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-danger text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'

  		});


	</script>

	<script src="<?= base_url('public/js/app.js'); ?>"></script>
	<script src="<?= base_url('public/js/custom.js'); ?>"></script>

	<!-- Add-ons Template -->
	<script src="<?= base_url('public/js/animate.js'); ?>"></script>
	<!--script src="<?= base_url('public/js/jquery.easing.1.3.js'); ?>"></script-->


</body>
</html>