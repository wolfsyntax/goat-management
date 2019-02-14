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
							<h1>Goat Management</h1>
						</div>
					</div>

					<div class="row">
						<div class="col offset-md-6 offset-lg-8">
							<a href="<?= base_url()?>goat/new" class="btn btn-success w-100 mt-3 mt-md-0" title="Add New Sales">
								<span class="fa fa-plus fa-lg"></span>&emsp;Add Goat
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

								<table id="gs_record" class="table table-striped table-bordered col-12 table-hover">
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
			</section>
		</div>
	</div>
</div>
				