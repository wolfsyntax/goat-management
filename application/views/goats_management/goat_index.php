<div class="container-fluid mt-1" style="margin-bottom: 210px;">
	<div class="row pt-5">
		<div class="col">
			<h1 class="p-2 p-md-0" style="font-weight: 80%;">Goat Management<?= ''//$total_loss ?></h1>
		</div>
	</div>
	<div class="row pl-3 pr-2 mr-0 mr-md-4 mt-2">
		<div class="col-12 col-md-3 offset-md-6">
			<!--a href="<?= base_url()?>goat/new" class="btn btn-danger w-100 mt-3 mt-md-0" title="Manage Goat Status" data-toggle="modal" data-target="#manage_stats">
				<span class="fa fa-pencil fa-lg"></span>&emsp;Manage
			</a-->&emsp;
		</div>
		<div class="col-12 col-md-3 py-2 mb-5 pr-0">
			<a href="<?= base_url()?>goat/new" class="btn btn-success w-100 mt-3 mt-md-0" title="Add Goat">
				<span class="fa fa-plus fa-lg"></span>&emsp;Add Goat
			</a>
		</div>
	</div>
	<div class="row mt-0">
		<input type="hidden" name="_status" value="" id="_status">
		<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
	</div>
	<div class="row mt-0">
		<div class="col">
			<div class="row table-responsive table-responsive-sm text-nowrap px-2 pr-3">

				<table id="gs_record" class="table table-striped table-bordered col-12 table-hover" style="width:100% ">
				    <thead class="bg-dark text-white text-center">
						<tr>				        
					      	<th>Eartag ID</th>
					        <th>Eartag Color</th>
					        <th>Nickname</th>
					        <th>Body Color</th>
					        <th>Gender</th>
					        <th>Age</th>
					        <th>Category</th>
					        <th>Status</th>
					        <th>Action</th>
						</tr>
				    </thead>

				    <tbody>
				    <?php foreach($goat_record as $row) {?>
						<tr>
				        	<td><?= $row->eartag_id 			?></td>
				        	<td><?= ucfirst($row->eartag_color) ?></td>
				        	<td><?= ucfirst($row->nickname) 	?></td>
				        	<td><?= ucfirst($row->body_color) 	?></td>
				        	<td><?= ucfirst($row->gender) 		?></td>
				        	<td><?= str_replace("ago", "old", Carbon\Carbon::parse($row->acquire_date)->diffForHumans()) ?></td>
				        	<td><?= ucfirst($row->category) 	?></td>
				        	<td title="<?= ucfirst($row->status) ?>"><?= ucfirst($row->status) == "Active" ? "Active" : (ucfirst($row->status) == "Sold" ? "Sold" : "Inactive") ?></td>
				        	<td>
					        	<div class="btn-group p-0">

					        		<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/view"); ?>" class="btn btn-info btn-sm btn-goat" title="View"><i class="fa fa-eye"></i></a>

					        		<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/edit"); ?>" class="btn btn-primary btn-sm btn-goat" title="Edit"><i class="fa fa-pencil"></i></a>
					        		
					        		<?php 
					        			switch (ucfirst($row->status)) {
					        				case 'Deceased':
					        				case 'Lost':
					        				case 'Stolen':
					        		?>

					        			<a href="javascript::void(0);" role="button" class="btn btn-warning btn-sm btn-goat" title="Restore/Modify status"  data-toggle="modal" data-target="#statusCheck" onclick="statusCheck_form(<?= $row->eartag_id ?>); "><i class="fa fa-toggle-off"></i></a>

					        		<?php
					        					break;

					        				case 'Sold':
					        		?>
					        			<a href="javascript::void(0);" role="button" class="btn btn-warning btn-sm btn-goat disabled" title="Change Status" ><i class="fa fa-lock"></i></a>
					        		<?php
					        					break;

					        				default:
					        		?>

					        			<a href="<?= base_url("status/{$row->eartag_id}/edit");?>" class="btn btn-warning btn-sm btn-goat" title="Change Status"><i class="fa fa-toggle-on"></i></a>

					        		<?php
					        					break;
					        			}
					        		?>
					        		<!--a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/view"); ?>" class="btn btn-danger btn-sm btn-goat" title="Change Status"><i class="fa fa-sliders"></i></a-->
					        	</div>
							</td>
						</tr>

					<?php }?>

				    </tbody>
				</table>   
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="statusCheck" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h5 class="modal-title font-weight-bolder" id="exampleModalLongTitle">Update Status</h5>
			
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			
					<span aria-hidden="true">&times;</span>
			
				</button>

			</div>
		
			<div class="modal-body">
				<!-- function statusCheck_form -->
				<?= form_open("", array(
	        		'class' 	=> 'form',
	        		'id'		=> 'statusCheckForm',
	        		'onsubmit'	=> 'check_form(this)',
		        	)
	    		)?>
	    			<div class="container-fluid">
	    				<div class="form-row p-1">
							<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Ear Tag ID <span class="text-danger">*</span></label>
							
							<div class="col">
								<input type="text" name="eartag_id" id="eartag_id_stat" value="" class="form-control" readonly>
							</div>
						</div>

						<div class="form-row p-1">
							<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Caused of Loss<span class="text-danger font-weight-bold">*</span></label>
					
							<div class="col">
								<select name="loss_caused" class="custom-select">

									<?php if(set_value("loss_caused") == "Deceased") {?>							
										<option value="">- Select a Cause -</option>
										<option value="Deceased" selected>Deceased</option>
										<option value="Lost">Lost</option>
										<option value="Stolen">Stolen</option>
										<option value="Active">Active</option>

									<?php } else if(set_value("loss_caused") == "Lost") {?>

										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost" selected>Lost</option>
										<option value="Stolen">Stolen</option>
										<option value="Active">Active</option>

									<?php } else if(set_value("") == "Stolen") {?>

										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost">Lost</option>
										<option value="Stolen" selected>Stolen</option>
										<option value="Active">Active</option>

									<?php } else if(set_value("") == "Active") {?>

										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost">Lost</option>
										<option value="Stolen" >Stolen</option>
										<option value="Active" selected>Active</option>

									<?php } else {?>

										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost">Lost</option>
										<option value="Stolen">Stolen</option>
										<option value="Active">Active</option>

									<?php } ?>
								</select>
								<?= (form_error('loss_caused')	!= "" ? form_error('loss_caused') : ''); ?>	
							</div>
						</div>	

						<div class="form-row p-1">
							<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Date of Loss <span class="text-danger">*</span></label>

							<div class="col">
								<input type="date" name="perform_date" value="<?= set_value('perform_date'); ?>" placeholder="Date of Loss" class="form-control">
								<?= (form_error('perform_date')	!= "" ? form_error('perform_date') : ''); ?>	
							</div>
						</div>

						<div class="form-row p-1">
							<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Notes</label>
							<div class="col">
								<input type="text" name="remarks" value="<?= set_value('remarks');?>" placeholder="" class="form-control">
								<?= (form_error('remarks')	!= "" ? form_error('remarks') : ''); ?>	
							</div>
						</div>


						<div class="form-row">
							<div class="clearfix">&emsp;</div>
						</div>

						<div class="form-row">
						
							<div class="col-12 col-sm-8 col-lg-4 offset-lg-8 offset-sm-4">
					
								<input type="submit" name="" value="Update" class="btn btn-primary w-100" id="update_btn">
					
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
<!--script type="text/javascript">
	
	
	
	
		function status_change(eartag_id, stats){

			$("#eartag_id_stat").val(eartag_id);
			
			if(stats == "active"){
				$("#cselect_active").show();
				$("#cselect_inactive").hide();

			}else{
				$("#cselect_active").hide();
				$("#cselect_inactive").show();				
			}

		}


</script-->