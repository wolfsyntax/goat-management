<div class = "container-fluid mt-2 mb-5">
	<div class="row mt-2 mb-5">
		<div class="col p-2 mb-5">
			<div class="card shadow-none rounded">
				<div class="card-header card-ubuntu">
					<h3>Add Goats</h3>
				</div>
				<div class="card-body p-2">
					
					<?= form_open(base_url()."", array("id" => "goat_form", "style" => "", "class" => "p-3 p-md-5","onload"=>'',)); ?>
						
						<?php $this->load->view('goats_management/_form'); ?>
						
						<div class="form-row mt-3">
							<input type="submit" class="btn btn-primary col col-md-3 offset-md-9" name="submit" value="Save" id="save_btn"/>
						</div>

					<?= form_close(); ?>
					
				</div>
			</div>
		</div>
	</div>
</div>