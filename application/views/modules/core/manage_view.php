<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="" id="content">
			<section>
				<?php $this->load->view('includes/breadcrumb') ?>
			</section>
			
			<div class="container-fluid">
				<?php foreach($goat_record as $row) {?>
				<div class="row px-3">
					<div class="col-12 col-md-6">
						<section class="py-2">
							<h4>Goat Profile</h4>
						</section>

						<section>
							<table class="container-fluid mt-3 table table-striped">
								
								<tr class="">
									<td class="col-3 p-2">Eartag ID</td>
									<td class="col text-right"><?= $row->eartag_id ?></td>
								</tr>

								<tr>
									<td class="col-3 p-2">Eartag Color</td>
									<td class="col text-right p-2"><?= ucfirst($row->eartag_color) ?></td>
								</tr>
								
								<tr>
									<td class="col-3 p-2">Nickname</td>
									<td class="col text-right p-2"><h5><span class="badge badge-primary"><?= ucfirst($row->nickname) ?></span></h5></td>
								</tr>

								<tr>
									<td class="col-3 p-2">Gender</td>
									<td class="col text-right p-2"><?= ucfirst($row->gender) ?></td>
								</tr>

								<tr>
									<td class="col-3 p-2">Body Color</td>
									<td class="col text-right p-2"><?= ucfirst($row->body_color) ?></td>
								</tr>
								<?php if($row->gender === "male") {?>
								<tr>
									<td class="col-3 p-2">Is Castrated</td>
									<td class="col text-right p-2"><?= ucfirst($row->is_castrated) ?></td>
								</tr>
								<?php } ?>
								<tr>
									<td class="col-3 p-2">Status</td>
									<td class="col text-right p-2"><h5><span class="badge badge-danger "><?= ucfirst($row->status) ?></span></h5></td>
								</tr>
								
							</table>
						</section>
					</div>

					<div class="col-12 col-md-6">
						<section class="py-2">
							<h4>Goat <?= ucfirst($row->category) ?> Record</h4>
						</section>
						<section>
						<?php if($row->category === "birth") {?>
							<table class="container-fluid mt-3 table table-striped">
								<tr class="row">
									<td class="col-3 p-2">
										Date of Birth
									</td>
									<td class="col text-right p-2">
										(<?= Carbon\Carbon::parse($row->acquire_date)->diffForHumans() ?>)&nbsp;<?= $row->acquire_date ?>
									</td>
								</tr>
								<tr class="row">
									<td class="col-3 p-2">
										Dam ID
									</td>
									<td class="col text-right p-2">
										<?= $row->dam_id ?>
									</td>
								</tr>

								<tr class="row">
									<td class="col-3 p-2">
										Sire ID
									</td>
									<td class="col text-right p-2">
										<?= $row->sire_id ?>
									</td>
								</tr>

							</table>
						<?php } else {?>
							<table class="container-fluid mt-3 table table-striped">
								<tr class="row">
									<td class="col-3 p-2">
										Date of Purchase
									</td>
									<td class="col text-right p-2">
										(<?= Carbon\Carbon::parse($row->acquire_date)->diffForHumans() ?>)&nbsp;<?= $row->acquire_date ?>
									</td>
								</tr>
								<tr class="row">
									<td class="col-3 p-2">
										Purchase Weight
									</td>
									<td class="col text-right p-2">
										<?= $row->purchase_weight ?>
									</td>
								</tr>
								<tr class="row">
									<td class="col-3 p-2">Purchase Price</td>
									<td class="col text-right p-2"><?= $row->purchase_price ?></td>
								</tr>
								<tr class="row">
									<td class="col-3 p-2">Purchase From</td>
									<td class="col text-right p-2">
										<?= $row->purchase_from ?>
									</td>
								</tr>

							</table>
						<?php } ?>

						</section>
					</div>

				</div>

				<div class="row px-2">
					<div class="col">
						<div class="row mt-2">
							<div class="col">
								<a href="<?= $this->agent->referrer(); ?>" class="nav-link"><span class="font-weight-bolder fa fa-angle-left fa-lg"></span>&emsp;Go Back</a>
							</div>

							<div class="col">
								<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/edit"); ?>"  class="nav-link font-weight-bolder text-right text-sm-center">Edit</a> 
							</div>
						</div>						
					</div>
				</div>
				<?php } if($flag){ ?>

				<div class="row px-4 mt-4">
					<div class="col">
						<section>
							<h4>Offspring</h4>
						</section>
						<section>

							<div class="row table-responsive table-responsive-sm text-nowrap px-2 pr-3 mt-5">
								<table id="gp_record" class="table">
									<thead>
										<tr>
											<th>Eartag ID</th>
											<th>Birth Date</th>
											<th>Gender</th>
											<th>Age</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($child as $row) {?>
											<tr>
												<td>
													<?= $row->eartag_id ?>
												</td>
												<td>
													<?= $row->birth_date?>
												</td>
												<td>
													<?= ucfirst($row->gender) ?>
												</td>
												<td>
													<?= str_replace("ago", "old", Carbon\Carbon::parse($row->birth_date)->diffForHumans()) ?>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

						</section>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</div>
</div>