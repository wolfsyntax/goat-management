<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-2 col-lg-2 px-0">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 col-lg-10 px-2 py-2">
			<?php $this->load->view('includes/breadcrumb') ?>
			<div class="container-fluid mt-5" style="margin-bottom: 250px;">
				<div class="row px-0">

					<div class="col-12 py-1">
						<?= ($this->session->flashdata('health_check') ? $this->session->flashdata('health_check') : ''); ?>
					</div>
					<div class="col-12 px-0">
						<div class="card shadow-none rounded-0 border-0">
							<div class="card-header border-0" style="background: transparent;">
								<h1 class="pt-2">
									Health Checkup
								</h1>
							</div>
							<div class="card-body">
								<div class="container-fluid px-1 px-md-1">
									<div class="row table-responsive table-responsive-sm text-nowrap px-0 ">

										<table class="col-12 mx-2 table table-striped table-hover " id="gp_record" >
											<thead class="bg-dark text-white text-center">
												<tr>
													<th>Eartag ID</th>
													<th>Eartag Color</th>
													<th>Gender</th>
													<th>Age</th>
													<th width="1%">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($health_records as $row) {?>
												<tr>
													<td><?= $row->eartag_id ?></td>
													<td><?= ucfirst($row->eartag_color) ?></td>
													<td><?= ucfirst($row->gender) ?></td>
													<td><?= str_replace('ago','old',Carbon\Carbon::parse($row->acquire_date)->diffForHumans()) ?></td>
													<td>
														<a href='<?= base_url("checkup/{$row->eartag_id}/new") ?>' class="btn btn-primary btn-sm btn-goat">
															<i class="fa fa-plus"></i>
														</a>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card-footer border-0">
								Footer
							</div>
						</div>
					</div>
				</div>
			</div> 


			<div class="modal fade" id="pregCheck" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h5 class="modal-title" id="exampleModalLongTitle">Pregnancy Check: <p id="breed_check_label"></p></h5>
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						
								<span aria-hidden="true">&times;</span>
						
							</button>

						</div>
					
						<div class="modal-body">
							
							<?= form_open("", array(
				        		'class' 	=> 'form',
				        		'id'		=> 'pregcheck_aform',
				        		'onsubmit'	=> 'check_form(this)',
					        	)
				    		)?>
				    		
				    		<div class="container-fluid">
				    			
				    			<div class="form-row p-1">
												
									<label class="col-form-label-sm col-6 col-sm-5 col-md-4 col-lg-3">Is pregnant ? <span class="text-danger">*</span></label>
											              
									<div class="col">
										
										<select class="form-control" name="preg_select">
										<?php if(set_value('preg_select') == "Yes") {?>
											<option value="" >-- Please select --</option>
											<option value="Yes" selected>&emsp;Positive (Yes)</option>
											<option value="No" >&emsp;Negative (No)</option>
										<?php } else if(set_value('preg_select') == "No") { ?>
											<option value="" >-- Please select --</option>
											<option value="Yes" selected>&emsp;Positive (Yes)</option>
											<option value="No" selected>&emsp;Negative (No)</option>
										<?php } else { ?>
											<option value="" >-- Please select --</option>
											<option value="Yes">&emsp;Positive (Yes)</option>
											<option value="No" >&emsp;Negative (No)</option>
										<?php } ?>				
										</select>							
							
									</div>

								</div>   
								<div class="form-row">
									<div class="clearfix">&emsp;</div>
								</div>

								<div class="form-row">
								
									<div class="col-12 col-sm-8 col-lg-4 offset-lg-8 offset-sm-4">
							
										<input type="submit" name="pregcheck_btn" value="Update" class="btn btn-primary w-100" id="update_btn">
							
									</div>
								
								</div>
					    	
					    	</div>

				    		<?= form_close() ?>
						</div>

				      <!--div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary">Save changes</button>
				      </div-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>