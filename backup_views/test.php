<div class="container-fluid">
	<div class="row my-2">
		<div class="col">
			
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<?php foreach($breadcrumbs as $key => $val) {?>
						<li class="breadcrumb-item" ><a href="<?= base_url($val) ?>" style="text-decoration: none;"><?= ucfirst($key) ?></a></li>
					<?php }?>
					<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;"><?= $breadcrumb?></a></li>
				</ol>
			</nav>

		</div>
	</div>
	<div class="row">
		<div class="col text-center p-1">
			<div class="container-fluid bg-warning">
				A
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-9 text-center p-1">
			<div class="container-fluid bg-danger">
				B
			</div>
		</div>
		<div class="col-12 col-md-3 text-center p-1">
			<div class="container-fluid bg-primary">
				C
			</div>
		</div>
	</div>
</div>