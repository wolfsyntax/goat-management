<div class="container">
	<div class="row" style="margin-top: 120px;">
		<div class="col">
			<div class="row">
				<?php foreach($sale_record->result() as $row) {?>
				<h1 class="col-12 ">Sale ID: <?= $row->sales_id;?></h1>
				<div class="col-6 px-3">
					<div class="row mb-1 p-1">
						<div class="col">
							<div class="row">
								<div class="col-3">
									Transact Date: 
								</div>
								<div class="col text-right">
									<?= $row->transact_date . "&nbsp;(". Carbon\Carbon::parse($row->transact_date)->diffForHumans() . ")"; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-1 p-1">
						<div class="col-12">
							<div class="row">
								<div class="col-3">
									Vendor: 
								</div>
								<div class="col text-right">
									<?= $row->username; ?>
								</div>
							</div>	
						</div>
					</div>

					<div class="row mb-1 p-1">
						<div class="col">
							<div class="row">
								<div class="col-3">
									Eartag ID: 
								</div>
								<div class="col text-right">
									<?= $row->eartag_id; ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb-1 p-1">
						<div class="col">
							<div class="row">
								<div class="col-3">
									Sold to: 
								</div>
								<div class="col text-right">
									<?= $row->sold_to; ?>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="col-6 p-1">
					<div class="row mb-1 p-1">
						<div class="col">
							<div class="row">
								<div class="col-3 font-weight-bold">
									Price/Kilo: 
								</div>
								<div class="col text-right">
									<?= $row->price_per_kilo ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb-1 p-1">
						<div class="col">
							<div class="row">
								<div class="col-3 font-weight-bold">
									Weight:
								</div>
								<div class="col text-right"> 
									<?= $row->weight; ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<hr style="height:1px;border:none;color:#333;background-color:#333;" />
						</div>
					</div>
					
					<div class="row mb-1 p-1">
						<div class="col">
							<div class="row">
								<div class="col-3 font-weight-bold">
									Total Price:
								</div>
								<div class="col text-right">
									P <?= number_format((floatval($row->price_per_kilo) * floatval($row->weight)), 2, '.',""); ?>		
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
			<div class="row mt-5">
				<p class="col-12 p-3 text-dark" style="background-color: #f4f6f9 !important; border-radius: 10px;">
					<strong>Remarks:</strong><br/>
					<span class="form-text text-muted"><?= $row->remarks; ?></span>
				</p>
				<?php }?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col p-0">
			<a href="<?= $this->agent->referrer(); ?>" class="nav-link">Go Back</a>
		</div>
		<div class="col p-0">
			<a href="<?= $this->agent->referrer(); ?>" class="nav-link">Edit</a>
		</div>
	</div>
</div>