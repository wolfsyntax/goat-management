<div class="container-fluid">
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
  				
          <ol class="breadcrumb justify-content-start" style="background: transparent;">
  					<?php foreach($breadcrumbs as $key => $value) {?>
    				<li class="breadcrumb-item ">
    					<a href="<?= base_url($value) ?>" style="text-decoration: none;">
    						<?= $key ?>
    					</a>
    				</li>
    				<?php }?>
    				<li class="breadcrumb-item active" aria-current="page">
    					<a><?= $breadcrumb ?></>
    				</li>
  				</ol>
          
			</nav>
		</div>
	</div>
</div>