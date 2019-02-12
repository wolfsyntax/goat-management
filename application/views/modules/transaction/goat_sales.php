<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-2 col-lg-2 px-0">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 col-lg-10 px-2 py-2">
			<?php $this->load->view('includes/breadcrumb') ?>
			<div class="container-fluid" style="margin-top: 30px; margin-bottom: 180px;">
				<div class="row mb-5">
					<div class="col">
						<div class="card shadow-none rounded-0 border-0">
							<div class="card-header border-0" style="background: transparent;">
								<div class="row">
									<div class="col-12">
										<h3 class="" style="margin-top: 10px;">Add Goat Sales</h3>
									</div>
								</div>
							</div>
								
							<div class="card-body p-2 p-md-5">
								
								<?= form_open(base_url().'sales/validate', array('class'=>'form','style'=>''));?>
									<?php $this->load->view("modules/transaction/_sales_form");?>
								<?= form_close();?>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>