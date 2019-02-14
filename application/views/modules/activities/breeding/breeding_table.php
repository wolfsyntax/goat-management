<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="bg-info" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="pr-5" id="content">
			<section>
				<?php $this->load->view('includes/breadcrumb') ?>
			</section>
			
			<section class="py-2 mt-2">
				<div class="container-fluid ml-3">
					<div class="row">
						<div class="col">
							<h1>Breeding Records</h1>
						</div>
					</div>

					<div class="row">
						<div class="col offset-md-6 offset-lg-8">
							<a href="<?= base_url()?>breeding/new" class="btn btn-success w-100 mt-3 mt-md-0" title="Add Breeding Record">
								<span class="fa fa-plus fa-lg"></span>&emsp;New Breeding
							</a>
						</div>
					</div>

					<div class="row">
						<input type="hidden" name="_status" value="" id="_status">
						<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
					</div>

					<div class="row mt-0 pl-4">
						<div class="col py-5">
							<div class="row table-responsive table-responsive-sm text-nowrap">
								<table class="col-12 table table-striped table-hover " id="gp_record" >
											<thead class="bg-dark text-white text-center">
												<tr>
													<th>Dam ID</th>
													<th>Sire ID</th>
													<th>Breeding Date</th>
													<th>In Charge</th>
													
													<th>Result</th>
													<th width="1%">Action</th>
												</tr>
											</thead>
											<tbody>
												
												<?php foreach($breeding_record as $row) {?>
												<tr>
													<td><?= $row->eartag_id ?></td>
													<td><?= $row->sire_id ?></td>
													<td><?= $row->date_perform ?></td>
													<td><?= $row->username ?></td>
													<td><?= $row->is_pregnant == "yes" ? "Positive" : "Negative" ?></td>
													<td>
														<div class="btn-group">
															<?php if($row->is_pregnant == "no") { ?>
															<a href="#" class="btn btn-primary btn-sm btn-goat" title="Change result to 'Positive'" data-toggle="modal" data-target="#pregCheck" onclick="pregcheck_form(<?= $row->activity_id ?>); ">
																<i class="fa fa-stethoscope"></i>
															</a>
															<?php } else { ?>
															<a href="#" type="button" class="btn btn-info btn-sm disabled btn-goat" title="Pregnancy Confirmed" onclick="">
																<i class="fa fa-stethoscope"></i>
															</a>												
															<?php }?>
															<!--a href="" class="ml-1 btn btn-success btn-sm btn-goat" title="View Pregnancy Record" onclick="">
																<i class="fa fa-eye"></i>
															</a-->												
														</div>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
								
							</div>
						</div>
					</div>
				</div>
			</section>
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

		</div>
	</div>
</div>