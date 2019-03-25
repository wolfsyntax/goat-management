<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">
		
		<div class="pl-0" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		<div class="px-2" id="content">
			<section>
				<?php $this->load->view('includes/breadcrumb') ?>
			</section>
			<section>
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<div class="container">
								<h3>Add New Item</h3>
							</div>
						</div>
					</div>

					<div class="row px-3">
						<div class="col">
							<div class="container-fluid">
								<?php $this->load->view('modules/inventory/inventory_form') ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
