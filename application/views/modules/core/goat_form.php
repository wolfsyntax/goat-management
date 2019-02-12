<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		
		<div class="col-2 col-sm-1 col-lg-2 px-0">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		<div class="col-10 col-sm-11 col-lg-10 px-0 px-md-2 py-2">

			<?php $this->load->view('includes/breadcrumb') ?>			
			
			<div class = "container-fluid mt-2 mb-5">

				<div class="row mt-2 mb-5">
					<div class="col p-2 mb-5">
						<div class="card shadow-none rounded-0 border-0">
							<div class="card-header card-ubuntu border-0" style="background: transparent;">
								<h3>Add Goats</h3>
							</div>
							<div class="card-body p-2 border-0">
								
								<?= form_open("", array("id" => "goat_form", "style" => "", "class" => "p-3 p-md-5","onsubmit"=>"check_form(this);")); ?>
										
										<?php $this->load->view('modules/core/_form'); ?>
										
									

										<div class="form-row mt-3 pr-5">
											<input type="submit" class="btn btn-primary col col-md-3 offset-md-9" name="submit" value="Add" id="save_btn" disabled="" />
										</div>

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