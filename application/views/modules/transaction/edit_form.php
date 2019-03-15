<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="pl-3 pl-lg-4 pr-lg-5" id="content">
			<section>
				<?php $this->load->view('includes/breadcrumb') ?>
			</section>
			
			<section class="py-2 mt-2">
				<div class = "container pl-0 pl-lg-5 mt-2 mb-5">
				<?php if($this->session->userdata('goat_records') == FALSE) { ?>
							
			
					<div class="row mt-2">
						<div class="col">
									
							<div class="alert alert-danger" role="alert">
								<i class="fa fa-exclamation-circle"></i>&emsp;No goat records found! Click <a href="<?= base_url('goat/new') ?>" class="alert-link">here</a>&nbsp;to add new goat.
							</div>					
										
						</div>
					</div>					
					

			
			
				<?php } else { ?>
					<div class="row mt-2 mb-5">
						<div class="col p-0 p-lg-2 mb-5">
							<div class="card shadow-none rounded-0 border-0">
								<div class="card-header card-ubuntu border-0" style="background: transparent;">
									<h3 class="pl-5">Modify Transaction Record</h3>
								</div>
								<div class="card-body p-2 border-0">

									<?php foreach($goat_record->result() as $row) {?>
									<?= form_open(base_url()."sales/{$row->sales_id}/edit", array('class'=>'form p-5','style'=>'',"onsubmit"=>"check_form(this); return confirm_request(this)"));?>
							
									<div class="container-fluid px-3">

										<div class="form-row p-0 p-lg-1">
											<label class="col-form-label-sm col-12 col-md-6 col-lg-2">Tag ID</label>
											
											<div class="col">
												<input type="text" class="form-control" name="eartag_id" value="<?= set_value('eartag_id')? set_value('eartag_id'): $row->eartag_id ?>" readonly="">
							
												<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>			
											</div>

										</div>

										<div class="form-row p-0 p-lg-1">
											<label class="col-form-label-sm col-12 col-md-6 col-lg-2">Nickname</label>
											
											<div class="col">
												<input type="text" class="form-control" value="<?= $row->nickname ?>" readonly="">	
											</div>

										</div>
											
										<div class="form-row p-0 p-lg-1">
											
											<label class="col-form-label-sm col-12 col-md-6 col-lg-2">Date Sold <span class="text-danger">*</span></label>
						
											<div class="col">
											
												<input type="date" name="transact_date" value="<?= set_value('transact_date')? set_value("transact_date") : $row->transact_date;?>" placeholder="" class="form-control " required>
							
												<?= (form_error('transact_date')	!= "" ? form_error('transact_date') : ''); ?>

											</div>
										
										</div>

										<div class="form-row p-0 p-lg-1">
						
											<label class="col-form-label-sm col-12 col-md-6 col-lg-2">Sold Through <span class="text-danger">*</span></label>
						
											<div class="col">
							
												<select name="sold_to" id="client_select" class="form-control" placeholder="- Select Buyer -" value="<?= set_value('sold_to') ? set_value('sold_to') : $row->sold_to; ?>" required>

													<option value="MGM">MGM</option>           
												</select>
											
												<?= (form_error('sold_to')	!= "" ? form_error('sold_to') : ''); ?>

											</div>

										</div>

										<div class="form-row p-0 p-lg-1">
											<label class="col-form-label-sm col-12 col-md-6 col-lg-2">Total Weight <span class="text-danger">*</span></label>
											
											<div class="col">
												<input type="text" name="weight" value="<?= set_value('weight') ? set_value('weight') : $row->weight; ?>" placeholder="Enter weight in kilos" class="form-control " required>
												
												<?= (form_error('weight')	!= "" ? form_error('weight') : ''); ?>
											
											</div>
										</div>

										<div class="form-row p-0 p-lg-1">
											
											<label class="col-form-label-sm col-12 col-md-6 col-lg-2">Price per Kilo <span class="text-danger">*</span></label>
											
											<div class="col">
												
												<input type="text" name="price_per_kilo" value="<?= set_value('price_per_kilo') ? set_value('price_per_kilo') : $row->price_per_kilo; ?>" placeholder="Price per Kilo" class="form-control " required>
												
												<?= (form_error('price_per_kilo')	!= "" ? form_error('price_per_kilo') : ''); ?>
											
											</div>
										</div>

										<div class="form-row p-0 p-lg-1">
											<label class="col-form-label-sm col-12 col-md-6 col-lg-2">Description</label>
											
											<div class="col">
												<textarea name="remarks" placeholder="notes / additional information" class="form-control "><?= set_value('remarks') ? set_value('remarks') : $row->remarks ; ?></textarea>

												<?= (form_error('remarks')	!= "" ? form_error('remarks') : ''); ?>

											</div>
										</div>

										<div class="form-row p-0 p-lg-1 float-right w-100 mt-2">
											<!--a href="javascript:void(0);" class="btn btn-danger col col-md-3 offset-md-5" onclick="js_button();">Cancel</a-->
											<button type="submit" class="font-weight-bolder btn btn-primary col-md-3 offset-md-9" name="submit" id="update_btn">Save Changes</button>

											<!--input type="submit" class="btn btn-info col-3 offset-1" value="Modify" id="update_btn"-->							
										</div>

										<div class="form-row p-1 float-right w-100">
											&emsp;
										</div>																
									</div>
									<?= form_close(); ?>
									<?php }?>									
										
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</section>
		</div>
	</div>
</div>
				
