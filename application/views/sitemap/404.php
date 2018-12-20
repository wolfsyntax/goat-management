<div class="container-fluid">
	<main role="main">
		<div class="container">
			<div class="row mt-5">
				&emsp;
			</div>
			<div class="row mt-5">
				<div class="col-12">
					<div class="container">
						<div class="row">
							<div class="col-5 mx-auto">
								<h4>
									<strong>404.</strong>&nbsp;<span class="text-muted">That's an error.</span>
								</h4>

								<p>The page requested was not found on this server. <span class="text-muted">That’s all we know.</span></p>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>

		<nav class="navbar navbar-expand-lg fixed-bottom">
			<ul class="navbar-nav mr-auto">

				<li class="nav-item "><a class="nav-link text-dark" href="<?= base_url(); ?>">Home</a></li>

				<li class="nav-item "><a class="nav-link text-dark" href="<?= base_url(); ?>about">About Us</a></li>

				<li class="nav-item "><a class="nav-link text-dark" href="<?= base_url(); ?>">Help</a></li>
				
				<li class="nav-item"><a class="nav-link text-dark" href="<?= base_url(); ?>about">Contact Us</a></li>
				
				<li class="nav-item"><a class="nav-link text-dark" href="<?= base_url(); ?>about" data-toggle="modal" data-target="#donation">Donate</a></li>

			</ul>

			<ul class="navbar-nav ml-auto">
				
				<li class="nav-item"><a class="nav-link text-dark" href="https://"><span class="fa fa-facebook-square fa-lg"></span></a></li>
				
				<li class="nav-item"><a class="nav-link text-dark" href="https://www.github.com/wolfsyntax/goats"><span class="fa fa-github fa-lg"></span></a></li>

			</ul>

		</nav>

		<div class="modal fade" id="donation" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">

			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="row">
						<div class="card col-md-12 col-sm-8">

							<img class="card-img-top mt-3" src="https://blockchain.info/qr?data=bitcoin:3FW3ghHDMWSbhCMG1vQV1SqvXNTeQQWfPK?size=80&amount=0.00015000" alt="Bitcoin Address">
							
							<div class="card-body">

    							<h5 class="card-title">Donate</h5>
    							<p class="card-text">If you find this project helpful. You may donate any amount</p>
								
								
							</div>

						</div>

					</div>
					
				</div>

			</div>

		</div>

	</main>

</div>