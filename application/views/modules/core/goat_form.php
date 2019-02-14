<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="bg-info" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="pr-5" id="content">
			<section>
				<?php $this->load->view('includes/breadcrumb') ?>
			</section>
			
			<section class="py-2 mt-2">
				<div class = "container-fluid mt-2 mb-5">

					<div class="row mt-2 mb-5">
						<div class="col p-2 mb-5">
							<div class="card shadow-none rounded-0 border-0">
								<div class="card-header card-ubuntu border-0" style="background: transparent;">
									<h3 class="pl-5">Add Goats</h3>
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
			</section>
		</div>
	</div>
</div>
				
