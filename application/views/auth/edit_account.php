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
			
			<section class="py-2 mt-2">
				<div class="container-fluid">
					<div class="row mt-5 px-5">
						
						<div class="col-12">
							<?= form_open("") ?>
							<?php foreach($account as $row) {?>
								<div class="row mt-2">
									<div class="col">
										<?= ($this->session->flashdata('auth_edit') ? $this->session->flashdata('auth_edit') : ''); ?>
									</div>
								</div>
								<div class="row mt-md-5">
									<div class="col-12 col-md-6 ">
										<div class="form-group">
											<label class="col-form-label-sm mb-0">First Name: <span class="text-danger font-weight-bold">*</span></label>
											<input type="text" class="form-control" name = "first_name" id="" aria-describedby="" placeholder="First name" value="<?= set_value('first_name', ucwords($row->first_name)) ?>" required>
											
											
											<?= (form_error('first_name')	!= "" ? form_error('first_name') : ''); ?>			
										

										</div>					
									</div>

									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="col-form-label-sm mb-0">Last Name: <span class="text-danger font-weight-bold">*</span></label>							
											<input type="text" class="form-control" name = "last_name" id="" aria-describedby="" placeholder="Last name" value="<?=set_value('last_name', ucwords($row->last_name)) ?>" required>

											
											<?= (form_error('last_name')	!= "" ? form_error('last_name') : ''); ?>							
											

										</div>					
									</div>

									<div class="col-12 col-md-12">
										<div class="form-group">
											<label class="col-form-label-sm mb-0">Username: <span class="text-danger font-weight-bold">*</span></label>							
											<input type="text" class="form-control" name = "username" id="" aria-describedby="" placeholder="Username" value="<?= set_value('username', $row->username) ?>" required>

											
											<?= (form_error('username')	!= "" ? form_error('username') : ""); ?>			
										

										</div>					
									</div>

							

									<div class="col-12">
										<div class="form-group">
											<label class="col-form-label-sm mb-0">Mobile number: <span class="text-danger font-weight-bold">*</span></label>							
											<input type="text" class="form-control" name = "phone" id="" aria-describedby="" placeholder="Mobile number" value="<?= set_value('phone', $row->phone_number) ?>" required>
											

											<?= (form_error('phone')	!= "" ? form_error('phone') : "<span class='form-text text-muted'><small>Must be a valid phone number in the Philippines.</small></span>"); ?>							

										</div>					
									</div>
								</div>

								<div class="row">
									<div class="col-12 pt-3">
								    	<button type="submit" class="font-weight-bolder btn btn-success col-12" name="submit" id="update_btn">
								    		Update Account
										</button>

										<!--input type="submit" class="btn btn-success col-12 font-weight-bold btn-js" name="submit" value="Sign Up" id="reg_submit"-->
									</div>
								</div>

							<?php }?>
							<?= form_close()?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>