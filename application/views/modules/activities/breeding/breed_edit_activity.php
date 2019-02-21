<?php $this->load->view('includes/header') ?>

<div class="container-fluid" style="">
	<div class="row">
		
		<div class="col-2 bg-danger px-0" id="sidebar-content">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 px-2 py-2" id="main-content">

			<?php $this->load->view('includes/breadcrumb') ?>					
			<div class="container-fluid px-md-5 px-2 mt-5" style="margin-bottom: 120px;">
				<div class="row">
					<div class="col">
						<div class="card">
							<div class="card-header">
								<h1>Goat Breeding (Modify)</h1>
							</div>
							<div class="card-body">
								<?= form_open(base_url(), array("class" => "",)) ?>
								<div class="container-fluid">
									<div class="form-group row"> 
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

									<div class="form-group row"> 
										
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

									<div class="form-group row">
										
										<label for="" class="col-lg-2 col-form-label form-control-label">Breeding Date</label>
										
										<div class="col">

											<input class="form-control" type="date" value="<?= set_value('perform_date');?>" id="" placeholder="yyyy-mm-dd" name="perform_date">
											
											<?= (form_error('perform_date') != "" ? form_error('perform_date') : ''); ?>

										</div>
									</div>

									<div class="form-group row">

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

									<div class="form-row ">

										<div class="col col-sm-12 col-md-3 offset-md-6 px-1 py-2">
											<a href="<?= base_url('activity/breeding/view') ?>" class="btn btn-danger w-100" >Cancel</a>
										</div>
										<div class=" col-sm-12 col-md-3 py-2">
											<input type="submit" class="btn btn-success w-100" value="Add Breeding">
										</div>
									</div>

								</div>
								<?= form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>