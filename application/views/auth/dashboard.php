<?php if($this->session->userdata("username") !== ""){ ?>

<div class="container-fluid bg-light col-12 col-sm-12 col-md-12 px-0" style="position: fixed;">
	<div class="row p-0">
    <?php $this->load->view('include/user_header'); ?>
    <?php $this->load->view('include/user_sidebar'); ?>

    
    <main class="col-12 col-md-11 col-lg-10 mt-5" role="main" style="position: fixed; padding-left: 16.333333%; min-width: 83.333333%; max-width: 100%;">
		<section class="col-12">
			&emsp;
		</section>

		<section class="col-12 p-0">
			<?= ($this->session->flashdata('item')) ? $this->session->flashdata('item') : ''; ?>
			<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
		</section>
		<section class="p-0 col-12 text-dark" id="body-content" style="height: 100vh; ">
        
			<iframe class="p-0 w-100 mh-100 h-100 bg-light" style="margin-top: 100px;" src="<?php echo base_url("activity");?>" id="ui_view" frameborder="0" scrolling="yes"></iframe>        

		</section>
    </main>

</div>

<?php } else { redirect(base_url()."login"); } ?>
