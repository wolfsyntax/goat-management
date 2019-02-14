<?php $this->load->view('includes/header') ?>

<div class="container-fluid" style="">
	<div class="row">
		
		<div class="col-2 bg-danger px-0" id="sidebar-content">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 px-2 py-2" id="main-content">

			<?php $this->load->view('includes/breadcrumb') ?>	
						
			<div class = "container-fluid mt-5" style="margin-bottom: 180px;">

				<div class="row mt-2 mt-md-5">

					<div class="col p-2 p-md-5">

						<div class="card shadow-none rounded-0 border-0">
							
							<div class="card-header card-ubuntu border-0" style="background: transparent;">
								<h3>Modify Transaction Record</h3>
							</div>
							
							<?php foreach($goat_record->result() as $row) {?>
							<?= form_open(base_url()."sales/{$row->sales_id}/edit", array('class'=>'form p-5','style'=>''));?>
							
							<div class="px-3">
								<div class="form-row p-1">
									<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
								</div>

								<div class="form-row p-1">
									<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Tag ID <span class="text-danger">*</span></label>
									
									<div class="col">
										<input type="text" class="form-control" name="eartag_id" value="<?= set_value('eartag_id')? set_value('eartag_id'): $row->eartag_id ?>" readonly>
					
										<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>			
									</div>

								</div>
											
								<div class="form-row p-1">
									
									<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Date Sold <span class="text-danger">*</span></label>
				
									<div class="col">
									
										<input type="date" name="transact_date" value="<?= set_value('transact_date')? set_value("transact_date") : $row->transact_date;?>" placeholder="" class="form-control " required>
					
										<?= (form_error('transact_date')	!= "" ? form_error('transact_date') : ''); ?>

									</div>
								
								</div>

								<div class="form-row p-1">
				
									<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Sold Through <span class="text-danger">*</span></label>
				
									<div class="col">
					
										<select name="sold_to" id="client_select" class="form-control" placeholder="- Select Buyer -" value="<?= set_value('sold_to') ? set_value('sold_to') : $row->sold_to; ?>" required>

											<option value="MGM">MGM</option>           
										</select>
									
										<?= (form_error('sold_to')	!= "" ? form_error('sold_to') : ''); ?>

									</div>

								</div>

								<div class="form-row p-1">
									<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Total Weight <span class="text-danger">*</span></label>
									
									<div class="col">
										<input type="text" name="weight" value="<?= set_value('weight') ? set_value('weight') : $row->weight; ?>" placeholder="Enter weight in kilos" class="form-control " required>
										
										<?= (form_error('weight')	!= "" ? form_error('weight') : ''); ?>
									
									</div>
								</div>

								<div class="form-row p-1">
									
									<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Price per Kilo <span class="text-danger">*</span></label>
									
									<div class="col">
										
										<input type="text" name="price_per_kilo" value="<?= set_value('price_per_kilo') ? set_value('price_per_kilo') : $row->price_per_kilo; ?>" placeholder="Price per Kilo" class="form-control " required>
										
										<?= (form_error('price_per_kilo')	!= "" ? form_error('price_per_kilo') : ''); ?>
									
									</div>
								</div>

								<div class="form-row p-1">
									<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Description</label>
									
									<div class="col">
										<textarea name="remarks" placeholder="notes / additional information" class="form-control "><?= set_value('remarks') ? set_value('remarks') : $row->remarks ; ?></textarea>

										<?= (form_error('remarks')	!= "" ? form_error('remarks') : ''); ?>

									</div>
								</div>

								<div class="form-row p-1 float-right w-100 mt-2">
									<a href="javascript:void(0);" class="btn btn-danger col col-md-3 offset-md-5" onclick="js_button();">Cancel</a>
									
									<input type="submit" class="btn btn-info col-3 offset-1" value="Modify" id="update_btn">							
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
		</div>
	</div>
</div>