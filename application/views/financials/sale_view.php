<div class="container">
	<div class="row" style="margin-top: 120px;">
		<div class="col">
			<div class="row">
				<?php foreach($sale_record->result() as $row) {?>
				<h1 class="col-12 ">Sale ID: <?= $row->sales_id;?></h1>
				<p class="col-6">
					Transact Date: <?= $row->transact_date; ?>
				</p>

				<p class="col-6">
					Total Price / Weight: <?= $row->price_per_kilo . " / " . $row->weight; ?>
				</p>

				<p class="col-12">
					Vendor: <?= $row->username; ?>
				</p>

				<p class="col">
					Eartag ID: <?= $row->eartag_id; ?>
				</p>

				<p class="col">
					Sold to: <?= $row->sold_to; ?>
				</p>
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