<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('includes/sidebar') ?>
		<div class="col px-2 py-2">					

			<?php $this->load->view('includes/breadcrumb') ?>

			<div class="container-fluid" style="margin-top: 30px; margin-bottom: 180px;">
				<div class="row mb-5">
					<div class="col">
						<div class="card shadow-none">
							<div class="card-header">
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