<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="bg-info" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="" id="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<?php $this->load->view('includes/breadcrumb') ?>
					</div>
				</div>				
			</div>

			<div class="container">
				

				<div class="row px-4">
					<div class="col">
						<h3>Health Check Record</h3>
					</div>
				</div>
				
				<div class="row px-4">
					<?= ($this->session->flashdata('health_check') ? $this->session->flashdata('health_check') : ''); ?>
				</div>

				<div class="row px-2">
					<div class="col">
						<?php if($vaccine == NULL && $supplement == NULL) {?>
							<div class="alert alert-danger col-12" role="alert" style="height: 50px;">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
														
								<div class="row">
									<p><span class="fa fa-exclamation-circle"></span>
									<strong>Warning</strong>&emsp;No items in your inventory, <a class="text-primary" href="<?= base_url('inventory/new') ?>">click here</a> to continue</p>
								</div>
							</div>
						<?php } else { ?>
							<?= form_open('', array("class" => "",)) ?>
								<div class="container-fluid">
									<div class="form-row">
										<div class="form-row p-1">
											<input class="form-control" type="text" value="<?= $eartag ?>" name="eartag_id" readonly>	

										</div>

										<div class="form-row p-1">
											<label class="col-form-label-sm col-4 col-sm-4 col-md-3 col-lg-2">Check-Up Type&nbsp;<span class="text-danger">*</span></label>
												
											<div class="col">
												<select name="checkup_type" class="form-control" placeholder="-- Enter Check-Up Type --" value="" required="">
												<?php if(set_value('checkup_type') == "vaccination") {?>

													<option value="">-- Please select --</option>
													<option value="vaccination" selected>Vaccination</option>
													<option value="supplementation">Supplementation</option>

												<?php } else if(set_value("checkup_type") == "supplementation") {?>

													<option value="">-- Please select --</option>
													<option value="vaccination">Vaccination</option>
													<option value="supplementation" selected>Supplementation</option>

												<?php } else {?>

													<option value="">-- Please select --</option>
													<option value="vaccination">Vaccination</option>
													<option value="supplementation">Supplementation</option>

												<?php } ?>
												</select>
											
												<?= (form_error('checkup_type')	!= "" ? form_error('checkup_type') : ''); ?>	
				
											</div>

										</div>

										<div class="form-row bg-dark">
											<label class="col-form-label-sm col-4 col-sm-4 col-lg-5">Item Name&nbsp;<span class="text-danger">*</span></label>
											<input type="hidden" name="prescription" id="prescription" required="">	

											<div class="col" id="med_vaccine">

											
												<select class="form-control" onchange="set_prescription(this)" >
													<option value="">-- Please select --</option>
												<?php foreach($vaccine as $row) {?>
												
													<option value="<?= $row->inventory_id ?>"><?= ucfirst($row->item_name)?>(<?= $row->quantity ?>)</option>

												<?php }?>

												</select>
														
												<?= (form_error('prescription') != "" ? form_error('prescription') : ''); ?>

											
											</div>

											<div class="col" id="med_supplement">
											
												<select class="form-control" onchange="set_prescription(this)" >
													<option value="">-- Please select --</option>
												<?php foreach($supplement as $row) {?>
												
													<option value="<?= $row->inventory_id ?>"><?= ucfirst($row->item_name)?>(<?= $row->quantity ?>)</option>
												
												<?php }?>

												</select>

											</div>							
										</div>

										<div class="form-row p-1">
											<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Quantity (mL)&nbsp;<span class="text-danger">*</span></label>
												
											<!--div class="col">
												<input type="text" class="form-control" name="quantity" value="<?= set_value('quantity') ?>" >
								
												<?= (form_error('quantity') != "" ? form_error('quantity') : ''); ?>			
											</div-->
											
											<div class="col">
											
												<select name="quantity" id="goat_id_select" class="form-control" placeholder="- Enter Quantity -" value="<?= set_value('quantity') ?>" required>

													<option value=5">5.0</option>
													<option value="10">10.0</option>
													<option value="25">25.0</option>
													<option value="50">50.0</option>
													<option value="100">100.0</option>

												</select>
														
												<?= (form_error('quantity')	!= "" ? form_error('quantity') : ''); ?>	
											</div>
										</div>	

										<div class="form-row p-1">
											<label  class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Perform Date&nbsp;<span class="text-danger">*</span></label>
													
											<div class="col">
												<input class="form-control" type="date" value="<?= set_value('perform_date');?>" id="" placeholder="yyyy-mm-dd" name="perform_date" required>
															
												<?= (form_error('perform_date') != "" ? form_error('perform_date') : ''); ?>

											</div>
										</div>

										<div class="form-row p-1">
											<label  class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Remarks&nbsp;</label>
													
											<div class="col">
												<textarea name="remarks" class="form-control"></textarea>
															
												<?= (form_error('remarks') != "" ? form_error('remarks') : ''); ?>

											</div>
										</div>

										<div class="form-row ">
										
											<div class="col-sm-12 col-md-3 offset-md-9 py-2">
												<input type="submit" class="btn btn-success w-100" value="Save" id="save_btn">
											</div>
										</div>

									</div>
								</div>
							<?= form_close() ?>
						<?php } ?>
						
						
					</div>
				</div>

				<div class="row mt-5 px-0">
					<div class="col">
						<div class="card">
							<div class="card-header">
								<h3>Health Record</h3>
							</div>
							
							<div class="card-body">
								<div class="table-responsive table-responsive-sm text-nowrap pl-4">
									<table class="table table-striped table-hover" id="gp_record">
										<thead>
											<tr>
												<th>
													Check-Up Type
												</th>
												<th>Date Perform</th>
												<th>
													Prescription
												</th>
												<th>
													Quantity
												</th>
												<th>
													Perfom By
												</th>
												<th>
													Remarks
												</th>
											</tr>
										</thead>
										<tbody>
											<?php if($health_records){
												foreach($health_records as $row) {
											?>
											<tr>
												<td>
													<?= $row->checkup_type ?>
												</td>
												<td>
													<?= $row->date_perform ?>
												</td>
												<td>
													<?= $row->prescription ?>
												</td>
												<td>
													<?= $row->quantity ?>
												</td>
												<td>
													<?= $row->username ?>
												</td>
												<td>
													<?= $row->remarks ?>
												</td>
											</tr>
											<?php 
													} 
												}
											?>
										</tbody>

									</table>	
								</div>						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
