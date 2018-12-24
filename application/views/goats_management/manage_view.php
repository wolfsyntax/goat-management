<div class="container">
	<div class="row mt-5 clearfix"></div>
	<div class="row mt-5">
		<div class="col">
			<?php foreach($goat_record as $row) {?>
				
				<h1 class="col-12 ">Eartag ID: <?= $row->eartag_id;?></h1>

				<p class="col-6">
					Eartag Color: <?= $row->eartag_color; ?>
				</p>

			<?php } ?>
		</div>
	</div>
	<div class="row mt-2">
		<a href="<?= $this->agent->referrer(); ?>">Go Back</a>
	</div>
</div>
