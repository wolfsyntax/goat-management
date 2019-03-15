<?php $this->load->view('includes/header') ?>

<div class="container-fluid" style="">
	<div class="row">
		
		<div class="col-2 bg-danger px-0" id="sidebar-content">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 px-2 py-2" id="main-content">
		<div class="col-10 col-lg-10 px-2 py-2">		

			<?php $this->load->view('includes/breadcrumb') ?>	

			<?php if($this->session->userdata('goat_records') == FALSE) { ?>
			
				
				<div class="container-fluid pl-3">
					<div class="row mt-2">
						<div class="col">
									
							<div class="alert alert-danger" role="alert">
								<i class="fa fa-exclamation-circle"></i>&emsp;No goat records found! Click <a href="<?= base_url('goat/new') ?>" class="alert-link">here</a>&nbsp;to add new goat.
							</div>					
									
						</div>
					</div>					
				</div>

			
			<?php } else { ?>			
					
				<div class="container-fluid mt-5 px-md-5 px-1">
					<?= form_open("",array("style"=>"","class"=>"", "onsbumi" => "check_form(this); return confirm_request(this)")); ?>
						<?php $this->load->view("activities/_breeding_form") ?>
					<?= form_close(); ?>
				</div>

			<?php } ?>
			
		</div>
	</div>
</div>
