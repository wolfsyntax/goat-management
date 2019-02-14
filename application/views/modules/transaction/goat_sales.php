<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="bg-info" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="pr-5" id="content">
			<section>
				<?php $this->load->view('includes/breadcrumb') ?>
			</section>

			<section class="py-2 mt-2">
				<div class = "container-fluid mt-2">

					<div class="row mt-2">
						<div class="col p-2">
							<div class="card shadow-none rounded-0 border-0">
								<div class="card-header card-ubuntu border-0" style="background: transparent;">
									<h3 class="pl-5">Goat Sales</h3>
								</div>
								<div class="card-body p-2 p-md-5">
								
								<?= form_open('', array('class'=>'form','style'=>''));?>
									<?php $this->load->view("modules/transaction/_sales_form");?>
								<?= form_close();?>
							
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>			
		</div>
	</div>
</div>
