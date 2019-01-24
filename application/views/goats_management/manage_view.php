<div class="container-fluid" style="margin-bottom: 250px;">
	<?php 
		foreach($goat_record as $row){
	?>

	<div class="row mt-5 clearfix"></div>
	<div class="row mt-5">
		<div class="col">

			<div class="container-fluid">
				<div class="row">

					<div class="col-12 col-md-6">
						<fieldset class="p-0">
							<legend>
								Goat Profile
							</legend>
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
						</fieldset>
					</div>

					<div class="col-12 col-md-6">
						<fieldset class="p-0">
							<legend>
								Goat <?= ucfirst($row->category) ?> Record
							</legend>
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
						</fieldset>
					</div>

				</div>
			</div>
			
		</div>
	</div>
	<div class="row mt-2">
		<div class="col">
			<a href="<?= $this->agent->referrer(); ?>" class="nav-link"><span class="font-weight-bolder fa fa-angle-left fa-lg"></span>&emsp;Go Back</a>
		</div>
		<div class="col">
			<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/edit"); ?>"  class="nav-link font-weight-bolder text-right text-sm-center">Edit</a> 
		</div>
	</div>
	<?php }	
		if($flag){
	?>
		<div class="row mt-2">
			<div class="col">
				<h1>Offspring</h1>
			</div>
		</div>
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
	<?php
		}
	?>



</div>
