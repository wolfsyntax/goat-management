<div class="container">
	<div class="row mt-5 clearfix"></div>
	<div class="row mt-5">
		<div class="col">
			<?php 
				foreach($goat_record as $row){
			?>

					<div class="container-fluid">
						<div class="row">
							<div class="col-6 col-md-2">
								Eartag ID: 
							</div>
							<div class="col-6 col-md-4">
								<?= $row->eartag_id ?>
							</div>
							<div class="col-6 col-md-2">
								Eartag Color: 
							</div>
							<div class="col-6 col-md-4">
								<?= $row->eartag_color ?>
							</div>

						</div>
						<div class="row">
							<div class="col">
								<?= $row->category .": ". $row->ref_id ?>
							</div>
						</div>
					</div>

			<?php 
				
				}				

			?>
		</div>
	</div>
	<div class="row mt-2">
		<a href="<?= $this->agent->referrer(); ?>">Go Back</a>
	</div>
</div>
