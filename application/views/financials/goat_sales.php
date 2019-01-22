<div class="container-fluid" style="margin-top: 30px; margin-bottom: 180px;">
	<div class="row mb-5">
		<div class="col">
			<div class="card shadow-none">
				<div class="card-header">
					<div class="row">
						<div class="col-8 col-sm-8 col-lg-11">
							<h3 class="" style="margin-top: 10px;">Add Goat Sales</h3>
						</div>
						<div class="col text-center">
							<a href="<?= base_url()?>goat/sales" class="nav-link text-dark" title="View Sales Record"><span class="fa fa-list-alt fa-lg d-inline-block"></span>
							</a>
						</div>
					</div>
				</div>
					
				<div class="card-body p-2 p-md-5">
					
					<?= form_open(base_url().'sales/validate', array('class'=>'form','style'=>''));?>
						<?php $this->load->view("financials/_sales_form");?>
					<?= form_close();?>
				
				</div>
			</div>
		</div>
	</div>
</div>