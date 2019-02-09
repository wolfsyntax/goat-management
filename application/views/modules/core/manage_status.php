<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		<?php $this->load->view('includes/sidebar') ?>
		<div class="col px-5 py-2">					

			<?php $this->load->view('includes/breadcrumb') ?>				
			<div class="container-fluid">
				<div class="row p-3">
					<div class="card col-md-12 col-sm-8 shadow-none">

						<div class="card-header" style="margin-left: -15px; width: calc(100% + 30px);">
							<h1>Manage Status</h1>
						</div>

						<div class="card-body">
			    					
							<?= form_open(base_url("status/{$eartag_id}/edit"),array("class"=>"")); ?>
							<div class="form-row p-1">
								<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Ear Tag ID <span class="text-danger">*</span></label>
								
								<div class="col">
									<input type="text" name="eartag_id" id="eartag_id_stat" value="<?= $eartag_id ?>" class="form-control" readonly>
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

										<?php } else if(set_value("loss_caused") == "Lost") {?>

										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost" selected>Lost</option>
										<option value="Stolen">Stolen</option>

										<?php } else if(set_value("") == "Stolen") {?>

										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost">Lost</option>
										<option value="Stolen" selected="">Stolen</option>

										<?php } else {?>

										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost">Lost</option>
										<option value="Stolen">Stolen</option>

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

							<div class="form-row p-1 float-right w-100">
								<span class="col clearfix"></span>
								<input type="submit" class="btn btn-success col-3" value="Submit Loss" id="update_btn">
							</div>								

							<?= form_close(); ?>		
						</div>
					</div>
				</div>	
			</div>
			<div class="container-fluid mt-5" style="margin-bottom: 180px;">
				<div class="row p-3 ">
					<div class="col">
						<table class="table table-stiped table-hover" id="gp_record">
							<thead class="thead-dark">
								<tr>
									<th scope="col" class="th-lg text-center">Eartag ID</th>
									<th scope="col" class="text-center">Reason</th>
									<th scope="col" class="text-center">Perform Date</th>
									<th scope="col" class="text-center">Remarks</th>
									<th scope="col" class="text-center pr-2">Action</th>
								</tr>
							</thead>
														
							<tbody>
								<?php foreach($mrecord as $row) {?>
								<tr>
									<th scope="row" class="text-center"><?= $row->eartag_id ?></th>
									<td class="text-center"><?= ucfirst($row->cause) ?></td>
									<td class="text-center"><?= $row->date_perform ?></td>
									<td class="text-center"><?= ucfirst($row->remarks) ?></td>
									<td class="text-center">
										<div class="btn-group">
											<a href="" class="btn btn-sm btn-success">
												<i class="fa fa-pencil-alt"></i>
											</a>
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
	</div>
</div>