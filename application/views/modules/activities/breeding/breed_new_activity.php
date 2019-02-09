<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-2 col-lg-2 px-0">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 col-lg-10 px-2 py-2">		

			<?php $this->load->view('includes/breadcrumb') ?>	
					
			<div class="container-fluid mt-5 px-md-5 px-1">
				<?= form_open("",array("style"=>"","class"=>"")); ?>
					<?php $this->load->view("activities/_breeding_form") ?>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
