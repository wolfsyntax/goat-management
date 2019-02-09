<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-2 col-lg-2 px-0">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 col-lg-10 px-2 py-2">
			
			<?php $this->load->view('includes/breadcrumb') ?>	

			<div class = "container-fluid mt-2 mb-5">
				<div class="row mt-2 mb-5">
					<div class="col p-2 mb-5">
						<div class="card shadow-none rounded-0 border-0" style="background: transparent;">
							<div class="card-header card-ubuntu border-0">
								<h3><strong>Inventory Management</strong>&nbsp;(New Item)</h3>
							</div>
							<div class="card-body p-2">
								
								<?= form_open(base_url("inventory/new"), array("id" => "goat_form", "style" => "", "class" => "p-3 p-md-5","onload"=>'',"onsubmit"=> "return check_form(this);")); ?>
									<div class="form-row p-1">
										<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Item Name <span class="text-danger">*</span></label>
									
										<div class="col">
											<input type="text" class="form-control" name="item_name" value="<?= set_value('item_name') ?>" >
					
											<?= (form_error('item_name') != "" ? form_error('item_name') : ''); ?>			
										</div>

									</div>

									<div class="form-row">
										<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Item Type<span class="text-danger">*</span></label>
										
										<div class="col">
											<select name="item_type" class="form-control" placeholder="- Enter Item Type -" value="">
												<?php if(set_value('item_type') == "Vaccine") {?>

												<option value="">-- Please select --</option>
												<option value="Vaccine" selected>Vaccine</option>
												<option value="Supplement">Supplement</option>

												<?php } else if(set_value("item_type") == "Supplement") {?>

												<option value="">-- Please select --</option>
												<option value="Vaccine">Vaccine</option>
												<option value="Supplement" selected>Supplement</option>

												<?php } else {?>

												<option value="">-- Please select --</option>
												<option value="Vaccine">Vaccine</option>
												<option value="Supplement">Supplement</option>

												<?php } ?>
											</select>
											
											<?= (form_error('item_type')	!= "" ? form_error('item_type') : ''); ?>	
										</div>
								
									</div>						
									
									<div class="form-row p-1">
										<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Quantity (mL)&nbsp;<span class="text-danger">*</span></label>
									
										<!--div class="col">
											<input type="text" class="form-control" name="quantity" value="<?= set_value('quantity') ?>" >
					
											<?= (form_error('quantity') != "" ? form_error('quantity') : ''); ?>			
										</div-->
										<div class="col">
											<select name="quantity" id="goat_id_select" class="form-control" placeholder="- Enter Quantity -" value="<?= set_value('quantity') ?>">

												<option value=5">5.0</option>
												<option value="10">10.0</option>
												<option value="25">25.0</option>
												<option value="50">50.0</option>
												<option value="100">100.0</option>

											</select>
											
											<?= (form_error('quantity')	!= "" ? form_error('quantity') : ''); ?>	
										</div>
									</div>

									<div class="form-row mt-3">
										<input type="submit" class="btn btn-primary col col-md-3 offset-md-9" name="submit" value="Add Item" id="save_btn"/>
									</div>

								<?= form_close(); ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>