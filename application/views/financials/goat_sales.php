<div class="container-fluid" style="margin-top: 80px;">
	<div class="row">
		<div class="col">
			<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-11">
								<h3 class="" style="margin-top: 10px;">Add Goat Sales</h3>
							</div>
							<div class="col text-center">
								<a href="<?= base_url()?>goat/sales" class="nav-link text-dark" title="View Sales Record"><span class="fa fa-list-alt fa-lg d-inline-block"></span>
								</a>
							</div>
						</div>
					</div>
					
					<div class="card-body p-2">
						<?= form_open(base_url().'sales/validate', array('class'=>'form p-5','style'=>''));?>
							<?php $this->load->view("financials/_sales_form");?>
						<?= form_close();?>
				
		</div>
	</div>
</div>