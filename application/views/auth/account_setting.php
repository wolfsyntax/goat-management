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
					<div class="row mt-5">
						
						<div class="col-12">
							<?= ($this->session->flashdata('auth') ? $this->session->flashdata('auth') : ''); ?>
						</div>

						<div class="col-12 col-md-7">
							<div class="container-fluid">
								<div class="row">
									<div class="col">
										<?php foreach($account as $row ) {?>
										<table class="table-hover table-borderless table" border="0">
											<tr class="border-0">
												<td>
													Username:
												</td>
												<td class="text-right">
													<?= $row->username ?>
												</td>
											</tr>
											<tr class="border-0">
												<td>Account Type</td>
												<td class="text-right">
													<?= ucwords($row->account_type) ?>
												</td>
											</tr>
											<tr>
												<td>
													First Name
												</td>
												<td class="text-right">
													<?= ucwords($row->first_name) ?>
												</td>
											</tr>

											<tr>
												<td>
													Last Name
												</td>
												<td class="text-right">
													<?= ucwords($row->last_name) ?>
												</td>
											</tr>

											<tr>
												<td>
													Phone Number
												</td>
												<td class="text-right">
													<?= $row->phone_number ?>
												</td>
											</tr>
										</table>	
										<?php } ?>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<?= form_open('',array()) ?>
								<div class="container-fluid">
									<div class="form-row">
										<label class="col-label col">Current Password <span class="text-danger font-weight-bolder">*</span></label>
										<div class="form-group col">
											<input type="password" name="old_pass" placeholder="Current Password" class="form-control" value="" required="">

											<?= (form_error('old_pass')	!= "" ? form_error('old_pass') : ''); ?>	

										</div>	
									</div>

									<div class="form-row">
										<label class="col-label col">New Password <span class="text-danger font-weight-bolder">*</span></label>
										<div class="form-group col">
											<input type="password" name="new_pass" placeholder="New Password" class="form-control" value="">

											<?= (form_error('new_pass')	!= "" ? form_error('new_pass') : ''); ?>
										</div>	
									</div>					

									<div class="form-row">
										<label class="col-label col">Confirm Password <span class="text-danger font-weight-bolder">*</span></label>
										<div class="form-group col">
											<input type="password" name="conf_pass" placeholder="Confirm Password" class="form-control">

											<?= (form_error('conf_pass') != "" ? form_error('conf_pass') : ''); ?>

										</div>	
									</div>					


									<div class="form-row">
										<input type="submit" name="submit" class="btn btn-primary col" value="Change Password">
									</div>					

								</div>
							<?= form_close() ?>
						</div>

					</div>
				</div>
			</section>
		</div>
	</div>
</div>