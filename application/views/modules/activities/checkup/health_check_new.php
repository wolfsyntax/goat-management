<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-2 col-lg-2 px-0">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 col-lg-10 px-2 py-2">
			<?php $this->load->view('includes/breadcrumb') ?>
			<div class="container-fluid px-md-5 px-2 mt-5" style="margin-bottom: 180px;">
				<div class="row">
					<div class="col">
						<div class="card">
							<div class="card-header">
								<h1 class="font-weight-bolder">Health Checkup (New) : <span title="Eartag ID # <?= $eartag ?>"><?= $eartag ?></span></h1>
							</div>
							<div class="card-body">
								<?= form_open('', array("class" => "",)) ?>
								<div class="container-fluid">
									<div class="form-row p-1">
										<?= ($this->session->flashdata('health_check') ? $this->session->flashdata('health_check') : ''); ?>
									</div>
									
									<div class="form-row p-1">
										<input class="form-control" type="hidden" value="<?= $eartag ?>" name="eartag_id">	
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

									<div class="form-row">
										<label class="col-form-label-sm col-4 col-sm-4 col-md-3 col-lg-2">Item Name&nbsp;<span class="text-danger">*</span></label>
										<input type="hidden" name="prescription" id="prescription" required="">	

										<div class="col" id="med_vaccine">

											<?php if($vaccine != NULL) {?>
											<select class="form-control" onchange="set_prescription(this)" >
												<option value="">-- Please select --</option>
												<?php foreach($vaccine as $row) {?>
													<option value="<?= $row->inventory_id ?>">
														<?= ucfirst($row->item_name)?>
														(<?= $row->quantity ?>)
													</option>
												<?php }?>

											</select>
											
											<?= (form_error('prescription') != "" ? form_error('prescription') : ''); ?>

											<?php } else {?>

												<a href="<?= base_url('inventory/new') ?>" class="nav-link">Add Vaccine</a>

											<?php } ?>

										</div>

										<div class="col" id="med_supplement">
											<?php if($supplement != NULL) {?>
											<select class="form-control" onchange="set_prescription(this)" >
												<option value="">-- Please select --</option>
												<?php foreach($supplement as $row) {?>
													<option value="<?= $row->inventory_id ?>">
														<?= ucfirst($row->item_name)?>
														(<?= $row->quantity ?>)
													</option>
												<?php }?>

											</select>

											<?= (form_error('prescription') != "" ? form_error('prescription') : ''); ?>
											<?php } else {?>

												<a href="<?= base_url('inventory/new') ?>" class="nav-link">Add Supplement</a>

											<?php } ?>
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

										<div class="col col-sm-12 col-md-3 offset-md-6 px-1 py-2">
											<a href="<?= base_url('activity/checkup/view') ?>" class="btn btn-danger w-100" >Cancel</a>
										</div>
										<div class=" col-sm-12 col-md-3 py-2">
											<input type="submit" class="btn btn-success w-100" value="Save" id="save_btn">
										</div>
									</div>

								</div>
								<?= form_close() ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-5 p-0">
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