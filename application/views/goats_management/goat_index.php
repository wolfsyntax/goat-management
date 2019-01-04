<div class="container-fluid mt-1">
	<div class="row pt-5">
		<div class="col">
			<h1 class="p-2 p-md-0" style="font-weight: 80%;">Goat Management</h1>
		</div>
	</div>
	
	<div class="row pl-3 pr-2 mr-0 mr-md-4 mt-2">
		<div class="col-12 col-md-3 offset-md-6">
			<a href="<?= base_url()?>goat/new" class="btn btn-danger w-100 mt-3 mt-md-0" title="Add Goat" data-toggle="modal" data-target="#manage_stats">
				<span class="fa fa-pencil fa-lg"></span>&emsp;Manage
			</a>
		</div>
		<div class="col-12 col-md-3">
			<a href="<?= base_url()?>goat/new" class="btn btn-success w-100 mt-3 mt-md-0" title="Add Goat">
				<span class="fa fa-plus fa-lg"></span>&emsp;Add Goat
			</a>
		</div>
	</div>

	<div class="row mt-0">
		<div class="col">
			<div class="jumbotron bg-light">
				<table id="gs_record" class="table table-striped table-bordered" style="width:100% ">
				    <thead>
						<tr>				        
					      	<th>Eartag ID</th>
					        <th>Eartag Color</th>
					        <th>Body Color</th>
					        <th>Gender</th>
					        <th>Category</th>
					        <th>Status</th>
					        <th>Action</th>
						</tr>
				    </thead>

				    <tbody>
				    <?php
				    if($goat_record){ 
				    	foreach($goat_record as $row) {?>
						<tr>
				        	<td><?= $row->eartag_id 			?></td>
				        	<td><?= ucfirst($row->eartag_color) ?></td>
				        	<td><?= ucfirst($row->body_color) 	?></td>
				        	<td><?= ucfirst($row->gender) 		?></td>
				        	<td><?= ucfirst($row->category) 	?></td>
				        	<td><?= ucfirst($row->status) 		?></td>
				        	<td>
					        	<div class="btn-group p-0">

					        		<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/edit"); ?>" class="btn btn-primary btn-sm btn-goat" title="Edit"><i class="fa fa-pencil"></i></a>
					        		<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/view"); ?>" class="btn btn-info btn-sm btn-goat" title="View"><i class="fa fa-eye"></i></a>
					        		<!--a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/view"); ?>" class="btn btn-danger btn-sm btn-goat" title="Change Status"><i class="fa fa-sliders"></i></a-->
					        	</div>
				        </td>
				      </tr>
				    <?php }
					}else{
				  		echo "No Goat records yet";

				  	}?>
				    </tbody>
				  </table>   
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="manage_stats" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" style="margin-top: 10px;">

	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="row">
				<div class="card col-md-12 col-sm-8">

					<div class="card-header" style="margin-left: -15px; width: calc(100% + 30px);">
						<h1>Manage Status</h1>
					</div>

					<div class="card-body">

    					<h5 class="card-title">Change goat status</h5>
    					
						<?= form_open(base_url(""),array("class"=>"")); ?>
							<div class="form-row p-1">
								<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Ear Tag ID <span class="text-danger">*</span></label>
								<div class="col">
									<select name="eartag_id" id="goat_id_select" class="form-control" placeholder="- Enter Ear Tag ID -" value="<?= set_value('eartag_id'); ?>">

                                    	<?php foreach($manage_goat as $row) {?>           
                                    		<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
                                    	<?php } ?>
                        			</select>
                        			<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>	
								</div>

							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Caused of Loss<span class="text-danger font-weight-bold">*</span></label>
								<div class="col">
									<select name="loss_caused" class="custom-select">
										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost">Lost</option>
										<option value="Stolen">Stolen</option>
									</select>
									<?= (form_error('loss_caused')	!= "" ? form_error('loss_caused') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Date of Loss <span class="text-danger">*</span></label>
								<div class="col">
									<input type="date" name="loss_date" value="<?= set_value('loss_date'); ?>" placeholder="Date of Loss" class="form-control">
									<?= (form_error('loss_date')	!= "" ? form_error('loss_date') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Notes</label>
								<div class="col">
									<input type="text" name="description" value="<?= set_value('description');?>" placeholder="" class="form-control">
									<?= (form_error('description')	!= "" ? form_error('description') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1 float-right w-100">
								<span class="col clearfix"></span>
								<input type="submit" class="btn btn-success col-3" value="Submit Loss">

							</div>								

						<?= form_close(); ?>		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


