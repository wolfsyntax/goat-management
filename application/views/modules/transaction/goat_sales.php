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
			<?php if($this->session->userdata('goat_records') == FALSE) { ?>
			
			<section>
				
				<div class="container">
					<div class="row mt-2">
						<div class="col">
									
							<div class="alert alert-danger" role="alert">
								<i class="fa fa-exclamation-circle"></i>&emsp;No goat records found! Click <a href="<?= base_url('goat/new') ?>" class="alert-link">here</a>&nbsp;to add new goat.
							</div>					
									
						</div>
					</div>					
				</div>

			</section>
			
			<?php } else { ?>

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
							<?= form_open('', array('class'=>'form','style'=>'',"onsubmit"=>"check_form(this); return confirm_request(this);",));?>
								<?php $this->load->view("modules/transaction/_sales_form");?>
							<?= form_close();?>
							
						</div>
					</div>
				</div>
			</section>

			<?php } ?>
		</div>
	</div>
</div>

