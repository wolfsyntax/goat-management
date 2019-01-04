<div class="container-fluid">
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
									<td class="col text-right p-2"><?= ucfirst($row->status) ?></td>
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
			<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/edit"); ?>"  class="nav-link font-weight-bolder
	</div>

	<?php }	?>

</div>
