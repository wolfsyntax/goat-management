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
			
			<section class="py-2 mb-5">
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-12">
							<?= form_open(base_url().'register', array('class'=>'px-5','style'=>'',"onsubmit"=>"return check_form(this);")); ?>
							<div class="row mt-md-py-2">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="col-form-label-sm mb-0">First Name: <span class="text-danger font-weight-bold">*</span></label>
										<input type="text" class="form-control" name = "first_name" id="" aria-describedby="" placeholder="First name" value="<?= set_value('first_name');?>" required>
										
										
										<?= (form_error('first_name')	!= "" ? form_error('first_name') : ''); ?>			
									

									</div>					
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="col-form-label-sm mb-0">Last Name: <span class="text-danger font-weight-bold">*</span></label>							
										<input type="text" class="form-control" name = "last_name" id="" aria-describedby="" placeholder="Last name" value="<?=set_value('last_name');?>" required>

										
										<?= (form_error('last_name')	!= "" ? form_error('last_name') : ''); ?>							
										

									</div>					
								</div>

								<div class="col-12 col-md-12">
									<div class="form-group">
										<label class="col-form-label-sm mb-0">Username: <span class="text-danger font-weight-bold">*</span></label>							
										<input type="text" class="form-control" name = "username" id="" aria-describedby="" placeholder="Username" value="<?= set_value('username');?>" required>

										
										<?= (form_error('username')	!= "" ? form_error('username') : ""); ?>			
									

									</div>					
								</div>

								

								<div class="col-12">
									<div class="form-group">
										<label class="col-form-label-sm mb-0">Mobile number: <span class="text-danger font-weight-bold">*</span></label>							
										<input type="text" class="form-control" name = "phone" id="" aria-describedby="" placeholder="Mobile number" value="<?= set_value('phone');?>" required>
										

										<?= (form_error('phone')	!= "" ? form_error('phone') : "<span class='form-text text-muted'><small>Must be a valid phone number in the Philippines.</small></span>"); ?>							

									</div>					
								</div>

								<div class="col-12">
									<div class="row">
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label class="col-form-label-sm mb-0 pt-0">Password: <span class="text-danger font-weight-bold">*</span></label>							
												<input type="password" class="form-control" name = "passwd" id="" aria-describedby="" placeholder="New Password" value="<?= set_value('passwd');?>" required>

												
												<?= (form_error('passwd')	!= "" ? form_error('passwd') : ''); ?>		
											

											</div>					
										</div>

										<div class="col-12 col-md-6">
											<div class="form-group text-dark">
												<label class="col-form-label-sm mb-0 pt-0">Confirm Password: <span class="text-danger font-weight-bold">*</span></label>							
												<input type="password" class="form-control" name = "conf_passwd" id="" aria-describedby="" placeholder="Re-Type New Password" value="<?= set_value('conf_passwd');?>" required>

											
												<?= (form_error('conf_passwd')	!= "" ? form_error('conf_passwd') : ''); ?>		
														

											</div>					
										</div>

									</div>

									<div class="row">
										<div class="col py-2">
											<div class="alert alert-primary" role="alert">
												<span class="fa fa-info-circle "></span>&emsp;Use 8 or more characters with a mix of letters, numbers & symbols
											</div>
											
										</div>
									</div>								
								</div>					

							</div>

							<div class="row">
								<div class="col-12 pt-3">
							    	<button type="submit" class="font-weight-bolder btn btn-success col-12" name="submit" id="reg_submit">
							    		Create Account
									</button>

									<!--input type="submit" class="btn btn-success col-12 font-weight-bold btn-js" name="submit" value="Sign Up" id="reg_submit"-->
								</div>
							</div>

						
						<?= form_close(); ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
