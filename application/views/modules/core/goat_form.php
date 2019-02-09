<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		
		<?php $this->load->view('includes/sidebar') ?>

		<div class="col px-5 py-2">	

			<?php $this->load->view('includes/breadcrumb') ?>			
			
			<div class = "container-fluid mt-2 mb-5">

				<div class="row mt-2 mb-5">
					<div class="col p-2 mb-5">
						<div class="card shadow-none rounded">
							<div class="card-header card-ubuntu">
								<h3>Add Goats</h3>
							</div>
							<div class="card-body p-2">
								
								<?= form_open("", array("id" => "goat_form", "style" => "", "class" => "p-3 p-md-5","onsubmit"=>"check_form(this);")); ?>
									
									<?php $this->load->view('modules/core/_form'); ?>
									
									<div class="form-row mt-3">
										<input type="submit" class="btn btn-primary col col-md-3 offset-md-9" name="submit" value="Add" id="save_btn" disabled="" />
									</div>

								<?= form_close(); ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>