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

			<?php if($this->session->userdata('goat_records') == FALSE) { ?>
			
			<section>
				
				<div class="container-fluid pl-5">
					<div class="row mt-2">
						<div class="col">
									
							<div class="alert alert-danger" role="alert">
								<i class="fa fa-exclamation-circle"></i>&emsp;No goat records found! Click <a href="<?= base_url('goat/new') ?>" class="alert-link">here</a>&nbsp;to add new goat.
							</div>					
									
						</div>
					</div>					
				</div>

			</section>
			
			<?php } else { ?>
			<section class="py-2 mt-2">
				<div class="container-fluid ml-3">
					
					<div class="row">
						<div class="col">
							<h1 class="pt-2">
								Health Checkup
							</h1>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-12 col-md-6 col-lg-4 offset-md-6 offset-lg-8">
							<a href="" class="btn btn-success w-100 text-white"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;New Checkup</a>
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

									<?php 
									if($health_records != FALSE) {
										foreach($health_records as $row) {?>
										<tr>
											<td><?= $row->eartag_id ?> (<?= $row->nickname ?>)</td>
											<td><?= ucfirst($row->eartag_color) ?></td>
											<td><?= ucfirst($row->gender) ?></td>
											<td><?= str_replace('ago','old',Carbon\Carbon::parse($row->acquire_date)->diffForHumans()) ?></td>
											<td>
												<a href='<?= base_url("checkup/{$row->eartag_id}/new") ?>' class="btn btn-primary btn-sm btn-goat">
													<i class="fa fa-plus"></i>
												</a>
											</td>
										</tr>
									<?php } 

									}?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</section>
		<?php } ?>
		</div>
	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<select class="form-control" onchange="proceed_healthCheck(this);">
					<option value="">-- Please Select --</option>
				<?php foreach($goat_records as $row) {?>
					<option value="<?= $row->eartag_id?>"><?= $row->eartag_id?>(<?= $row->nickname ?>)</option>
				<?php }?>
				</select>
			</div>
			
			<div class="modal-footer">
				<!--button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button-->
				<a href="<?= base_url() ?>" id="redir_checkup" class="btn btn-primary disabled">Proceed</a>
			</div>
		</div>
	</div>
</div>