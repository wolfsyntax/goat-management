<div class="container-fluid">
	
	<main role="main">
		
		<section>
			<div class="container">
				<div class="row mt-5">
					<div class="col-md-3">&emsp;</div>

					<div class="col-12 col-md-6">
						<div class="card mt-5">
							<div class="card-body">
								
								<h5 class="card-title">Reset Password</h5>
								<div class="dropdown-divider"></div>
								<div class="row">
									<div class="col-12"><span class="text-muted">Please enter your new password. We'll notify you regarding your new password</span></div>
								</div>
								<?= form_open(base_url().'forgot/reset',array('class' => 'mt-2',"onsubmit"=>"return check_form(this);")) ?>
									<div class="row">

										<div class="col-6">
											<div class="form-group">
												<input class="form-control" type="password" value="" name="passwd" value="" placeholder="New Password" />
												
												<?= (form_error('passwd')	!= "" ? form_error('passwd') : ''); ?>	
												
											</div>
										</div>

										<div class="col-6">
											<div class="form-group">
												<input class="form-control" type="password" value="" name="conf_passwd" value="" placeholder="Re-Type New Password" />
												
												<?= (form_error('conf_passwd')	!= "" ? form_error('conf_passwd') : ''); ?>	
												
											</div>
										</div>

									</div>
									<div class="row pull-right">
										<div class="d-inline-block">
											<input type="submit" class="btn btn-sm btn-success col-12 float-right d-inline-block" name="submit" value="Reset" id="forgot_conf">
										</div>
										<div class="col-2">
											<a href="<?= base_url(); ?>cancel" class="btn btn-dark btn-sm">Cancel</a>
										</div>
									</div>
								<?= form_close(); ?>
							</div>
						</div>
					</div>

					<div class="col-md-3">&emsp;</div>
				</div>
			</div>
		</section>

	</main>

</div>