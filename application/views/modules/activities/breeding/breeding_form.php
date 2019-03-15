<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="pr-5" id="content">
			<section>
				<?php $this->load->view('includes/breadcrumb') ?>
			</section>

			<?php if($this->session->userdata('goat_records') == FALSE) { ?>
			
			<section>
				
				<div class="container-fluid pl-3">
					<div class="row mt-2">
						<div class="col">
									
							<div class="alert alert-danger" role="alert">
								<i class="fa fa-exclamation-circle"></i>&emsp;No goat records found! Click <a href="<?= base_url('goat/new') ?>" class="alert-link">here</a>&nbsp;to add new goat.
							</div>					
									
						</div>
					</div>					
				</div>

			</section>
			
			<?php } else { ?>			

			<section class="py-2 mt-2">
				<div class = "container-fluid mt-2 mb-5">

					<div class="row mt-2 mb-5">
						<div class="col p-2 mb-5">

							<div class="card shadow-none rounded-0 border-0">

								<div class="card-header card-ubuntu border-0" style="background: transparent;">
									<h3 class="pl-2">Goat Breeding (New)</h3>
								</div>

								<div class="card-body">
								<?= form_open('', array("class" => "","onsubmit"=>"check_form(this); return confirm_request(this);",)) ?>
								
									<div class="container-fluid">
										<div class="form-row py-1"> 
											<label class="col-lg-2 col-form-label form-control-label">Sire ID</label>                                           
											<div class="col">

												<select name="partner_id" id="sire_id_select" class="form-control" placeholder="Enter or Choose Tag Number" required="" value="<?= set_value('partner_id');?>">
											
												<?php foreach($sire_record as $row) {?>
													<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
												<?php }?>
											
												</select>
												
												<?= (form_error('partner_id') != "" ? form_error('partner_id') : ''); ?>
											</div>
										</div>

										<div class="form-row py-1"> 
											
											<label class="col-lg-2 col-form-label form-control-label">Dam ID</label>                                           
											<div class="col">
										        
												<select name="eartag_id" id="dam_id_select" class="form-control" placeholder="Enter or Choose Tag Number" required="" value="<?= set_value('eartag_id');?>">
												
												<?php foreach($dam_record as $row) {?>
													<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
												<?php }?>
												
												</select>
												
												<?= (form_error('eartag_id') != "" ? form_error('eartag_id') : ''); ?>

											</div>

										</div>

										<div class="form-row py-1">
											
											<label for="" class="col-lg-2 col-form-label form-control-label">Breeding Date</label>
											
											<div class="col">

												<input class="form-control" type="date" value="<?= set_value('perform_date');?>" id="" placeholder="yyyy-mm-dd" name="perform_date">
												
												<?= (form_error('perform_date') != "" ? form_error('perform_date') : ''); ?>

											</div>
										</div>

										<div class="form-row py-1">

											<label for="" class="col-lg-2 col-form-label form-control-label">Description</label>
										    
											<div class="col">

												<textarea class="form-control" id="" placeholder="Description" name="remarks"><?= set_value('remarks'); ?></textarea>
												
												<?= (form_error('remarks') != "" ? form_error('remarks') : ''); ?>

											</div>

										</div>

										<div class="form-row p-1">
											
											<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Is pregnant ? <span class="text-danger">*</span></label>
										              
											<div class="col">
												<input type="checkbox" name="is_pregnant" value="" class="custom-checkbox mt-2" id="is_pregnant" disabled="">
												
												<?= (form_error('is_pregnant') != "" ? form_error('is_pregnant') : ''); ?>  
											
											</div>
										</div>            

										<div class="form-row py-1">

											<div class=" col-12 col-md-6 offset-md-6 offset-lg-9 col-lg-3 py-2">
												<button type="submit" class="font-weight-bolder btn btn-success col-12" name="submit" id="save_btn">
													Add Breeding
												</button>

												<!--input type="submit" class="btn btn-success w-100" value="Add Breeding"-->
											</div>
										</div>

									</div>
								<?= form_close() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php } ?>
		</div>
	</div>
</div>
