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
				<div class="container-fluid ml-3">
					
					<div class="row">
						<div class="col">
							<h1 class="pt-2">
								Health Checkup
							</h1>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<?= ($this->session->flashdata('health_check') ? $this->session->flashdata('health_check') : ''); ?>
						</div>
					</div>

					<div class="row mt-0 pl-4">
						<div class="col py-5">
							<div class="row table-responsive table-responsive-sm text-nowrap">
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

