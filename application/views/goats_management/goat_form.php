<div class = "container-fluid mt-5">
	<div class="row mt-2 mt-md-5">
		<div class="col p-2 p-md-5">
			<div class="card ">
				<div class="card-header card-ubuntu">
					<h3>Add Goats</h3>
				</div>
				<div class="card-body p-2">

					<?= form_open(base_url()."", array("id" => "goat_form", "style" => "", "class" => "p-3 p-md-5","onload"=>"form_validator_js();")); ?>
						
						<?php $this->load->view('goats_management/_form'); ?>

					<?= form_close(); ?>
					
				</div>
			</div>
		</div>
	</div>
</div>