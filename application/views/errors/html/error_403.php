<!DOCTYPE html>
<html lang="en">
<head>
	
	<title><?= $title ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/css/app.css')?>">

</head>

<body>
	
	<div class="container-fluid">
		Forbidden Access
	</div>
	
	<a href="" class="scrollup" style="float: right"><i class="fa fa-angle-up active"></i></a>	

	<!-- Starter Template -->
	<script src="<?= base_url('public/dist/js/jquery-3.3.1.slim.min.js'); ?>"></script>
	<script src="<?= base_url('public/dist/js/bootstrap.bundle.min.js'); ?>"></script>
	<!--script src="<?= base_url('public/dist/js/bootstrap.min.js'); ?>"></script-->
	<!--script src="<?= base_url('public/dist/js/popper.min.js'); ?>"></script-->

	<!-- Add-ons Template -->
	<script src="<?= base_url('public/js/animate.js'); ?>"></script>
	<script src="<?= base_url('public/js/jquery.easing.1.3.js'); ?>"></script>
	
	<!-- Developer Config-->
	
	<script src="<?= base_url('public/js/app.js'); ?>"></script>
	<script src="<?= base_url('public/js/custom.js'); ?>"></script>
	<script type="text/javascript">
		$('a').tooltip();
	 	$('[data-toggle="popover"]').popover({

  			placement: "right",
  			trigger: "focus",
  			template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-danger text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'

  		});
	</script>
</body>
</html>