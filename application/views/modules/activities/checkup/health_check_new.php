<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="" id="sidebar">
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
			<?php if($this->session->userdata('goat_records') == FALSE) { ?>
			
				
				<div class="container">
					<div class="row mt-2">
						<div class="col">
									
							<div class="alert alert-danger" role="alert">
								<i class="fa fa-exclamation-circle"></i>&emsp;No goat records found! Click <a href="<?= base_url('goat/new') ?>" class="alert-link">here</a>&nbsp;to add new goat.
							</div>					
									
						</div>
					</div>					
				</div>
			
			<?php } else { ?>			
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
									<strong>Warning</strong>&emsp;No items in your inventory, click <a class="alert-link" href="<?= base_url('inventory/new') ?>">here</a> to continue</p>
								</div>
							</div>
						<?php } else { ?>
							<?= form_open('', array("class" => "","onsubmit"=>"check_form(this); return confirm_request(this);",)) ?>
								<div class="container-fluid">
									
									<div class="form-row p-1">
										<label class="col-form-label-sm col-4 col-sm-3 col-lg-2">Eartag ID&nbsp;</label>

										<div class="col pl-4">
											<input class="form-control" type="text" value="<?= str_pad($eartag, 6, "0", STR_PAD_LEFT) ?>" name="eartag_id" readonly>	
										</div>
									</div>

									<div class="form-row p-1">
										<label class="col-form-label-sm col-4 col-sm-3 col-lg-2">Nickname&nbsp;</label>

										<div class="col pl-4">
											<input class="form-control" type="text" value="<?= $nickname ?>" readonly>	
										</div>
									</div>

									<div class="form-row p-1">
										<label class="col-form-label-sm col-4 col-sm-3 col-lg-2">Check-Up Type&nbsp;<span class="text-danger">*</span></label>
												
										<div class="col pl-4">
											<select name="checkup_type" class="form-control" placeholder="-- Enter Check-Up Type --" value="" required="" id="hcheck_type" onchange="show_ctype(this)">
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

									<div class="form-row item_info d-none mt-2">
										<label class="col-form-label-sm col-4 col-sm-3 col-lg-2">Item Name&nbsp;<span class="text-danger">*</span></label>
										<div class="col pl-lg-4">
											<div class="container-fluid pl-lg-5">
												<div class="row pl-lg-4">
													<div class="col-12 col-md-8 col-lg-10">
														
														<input type="hidden" name="prescription" id="prescription" required="">	

														<select class="form-control med_vaccine" onchange="set_prescription(this); " >
																<option value="">-- Please select --</option>
															<?php foreach($vaccine as $row) {?>
																
																<option value="<?= $row->inventory_id ?>"><?= ucfirst($row->item_name)?>(<?= $row->quantity ?>)</option>

														<?php }?>

															</select>
														
															<select class="form-control med_supplement" onchange="set_prescription(this)" >
																<option value="">-- Please select --</option>
															<?php foreach($supplement as $row) {?>
																
																<option value="<?= $row->inventory_id ?>"><?= ucfirst($row->item_name)?>(<?= $row->quantity ?>)</option>
																
															<?php }?>

															</select>
													</div>

													<div class="col pt-3">
														<a href="" class="">
															<i class="fa fa-plus"></i>&nbsp;<span class="med_vaccine">Vaccine</span><span class="med_supplement">Supplement</span>
														</a>	
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-row p-1">
										<label class="col-form-label-sm col-4 col-sm-3 col-lg-2">Quantity (mL)&nbsp;<span class="text-danger">*</span></label>
												
											<!--div class="col">
												<input type="text" class="form-control" name="quantity" value="<?= set_value('quantity') ?>" >
								
												<?= (form_error('quantity') != "" ? form_error('quantity') : ''); ?>			
											</div-->
											
										<div class="col pl-4 ">
											
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
										<label  class="col-form-label-sm col-4 col-sm-3 col-lg-2">Perform Date&nbsp;<span class="text-danger">*</span></label>
													
										<div class="col pl-4">
											<input class="form-control" type="date" value="<?= set_value('perform_date');?>" id="" placeholder="yyyy-mm-dd" name="perform_date" required>
															
											<?= (form_error('perform_date') != "" ? form_error('perform_date') : ''); ?>

										</div>
									</div>

									<div class="form-row p-1">
										<label  class="col-form-label-sm col col-sm-5 col-lg-2">Remarks&nbsp;</label>
													
										<div class="col pl-4">
											<textarea name="remarks" class="form-control"></textarea>
															
											<?= (form_error('remarks') != "" ? form_error('remarks') : ''); ?>

										</div>
									</div>

									<div class="form-row ">
										
										<div class="col py-2">
											<button type="submit" class="font-weight-bolder btn btn-success col-md-3 offset-md-9" name="submit" id="save_btn">Add Record</button>
											<!--input type="submit" class="btn btn-success w-100" value="Save" id="save_btn"-->
										</div>
									</div>

								</div>
								
							<?= form_close() ?>
						<?php } ?>
						
						
					</div>
				</div>

				<div class="row mt-5 px-0">
					<div class="col">
						<div class="card bg-light border-0">
							<div class="card-header border-0 bg-light">
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
			<?php } ?>
		</div>
	</div>
</div>
