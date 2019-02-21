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
					<div class="row px-3">
						<div class="col">
							<h3>Goat Sales</h3>
						</div>
					</div>

					<div class="row px-3">
						<div class="col">
							<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
							<?= form_open('', array('class'=>'form','style'=>'',"onsubmit"=>"return check_form(this);",));?>
								<?php $this->load->view("modules/transaction/_sales_form");?>
							<?= form_close();?>
							
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

