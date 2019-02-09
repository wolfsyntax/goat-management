<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-2 col-lg-2 px-0">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 col-lg-10 px-2 py-2">
			<div class="container">
				<div class="row" style="margin-top: 120px;">
					<div class="col">
						<div class="row">
							<?php foreach($sale_record->result() as $row) {?>
							<div class="col-12 col-md-6">
								<fieldset class="p-3">
									<legend>Transaction Record</legend>

									<table class="container-fluid mt-3 table table-striped">
										<tr class="row">
											<td class="col-3 p-2">
												Transact Date
											</td>
											<td class="col text-right p-2">
												<?= $row->transact_date . "&nbsp;(". Carbon\Carbon::parse($row->transact_date)->diffForHumans() . ")"; ?>
											</td>
										</tr>

										<tr class="row">
											<td class="col-3 p-2">
												Eartag ID
											</td>
											<td class="col text-right p-2">
												<?= $row->eartag_id ?>
											</td>
										</tr>

										<tr class="row">
											<td class="col-3 p-2">
												Vendor
											</td>
											<td class="col text-right p-2">
												<?= $row->username ?>
											</td>
										</tr>

										<tr class="row">
											<td class="col-3 p-2">
												Buyer
											</td>
											<td class="col text-right p-2">
												<?= ucfirst($row->sold_to) ?>
											</td>
										</tr>

									</table>

								</fieldset>
							</div>
							<div class="col-12 col-md-6">
								<fieldset class="mt-3">
									<legend>Invoice Details</legend>
									
									<table class="container-fluid mt-3 table table-striped">
										<tr class="row">
											<td class="col-3 p-2">
												Price/Kilo
											</td>
											<td class="col text-right p-2">
												<?= $row->price_per_kilo ?>
											</td>
										</tr>							

										<tr class="row">
											<td class="col-3 p-2">
												Weight
											</td>
											<td class="col text-right p-2">
												<?= $row->weight ?>
											</td>
										</tr>							

										<tr class="row" style="background-color: #d4d4d4 !important;">
											<td class="col-3 p-2">
												Total Price
											</td>
											<td class="col text-right p-2">
												P <?= number_format((floatval($row->price_per_kilo) * floatval($row->weight)), 2, '.',""); ?>
											</td>
										</tr>							

									</table>
								</fieldset>					
							</div>
						</div>

						<div class="row mt-5">
							<p class="col-12 p-3 text-dark" style="background-color: #d4d4d4 !important; border-radius: 10px;">
								<strong>Remarks:</strong><br/>
								<span class="form-text text-muted"><?= $row->remarks; ?></span>
							</p>
							<?php }?>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-6 p-0">
						<a href="<?= $this->agent->referrer(); ?>" class="nav-link font-weight-bolder"><span class="font-weight-bolder fa fa-angle-left fa-lg"></span>&emsp;Go Back</a>
					</div>
					<div class="col-6 p-0 text-right">
						<a href="<?= $this->agent->referrer(); ?>" class="nav-link font-weight-bolder">Edit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>