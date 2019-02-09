<?php use Carbon\Carbon; ?>
<div class="container-fluid p-0">
	<div class="row" >
		<div class="col-12 p-3">
			<?= $this->session->flashdata('profile')  ?>
		</div>
	</div>

	<div class="row px-3">
		<div class="col-12 col-md-6 col-lg-4 mb-2">
			<div class="card p-0 bg-success">
				<div class="card-body pt-3 pb-1 ">
					<div class="row p-0">
						<div class="col-4">
							<i class="fa fa-paw fa-5x" style="opacity: 0.5; z-index: 1; position: absolute;"></i>
						</div>
	
						<div class="col px-0 ml-0 ml-md-5 ml-lg-1" id="item-counter" style="z-index: 100;">

							<div class="row">
								<div class="col">
									<h3 class="mt-2 text-white text-truncate" style="font-size: 20px; width: 180px;">2,000.00</h3>
								</div>
							</div>

							<div class="row">
								<div class="col">
									<h5 class="font-weight-bolder text-white" style="font-size: 25px;">Goat</h5>
								</div>
							</div>
											
						</div>
					</div>
				</div>

				<div class="card-footer text-center text-white py-0" style="background: #229000">
					<a href="" class="nav-link font-weight-bolder">Add New Goat&emsp;<span class="fa fa-arrow-circle-right fa-lg"></span></a>
				</div>

			</div>
		</div>

		<div class="col-12 col-md-6 col-lg-4 mb-2">
			<div class="card p-0 bg-info">
				<div class="card-body pt-3 pb-1">
					<div class="row p-0">
						<div class="col-4">
							<i class="fa fa-dollar-sign fa-5x text-white" style="opacity: 0.5; z-index: 1; position: absolute;"></i>
						</div>
		
						<div class="col px-0 ml-0 ml-md-5 ml-lg-1">
							<div class="row">
								<div class="col" id="item-counter">
									<h3 class="mt-2 text-white text-truncate" style="font-size: 20px; width: 180px;">2,000.00</h3>
								</div>
							</div>
		
							<div class="row">
								<div class="col">
									<h5 class="font-weight-bolder text-white" style="font-size: 25px;">Goat Sales</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			
				<div class="card-footer text-center text-white py-0" style="background: #820098;">
					<a href="" class="nav-link">Add New Sales&emsp;<span class="fa fa-arrow-circle-right fa-lg"></span></a>
				</div>

			</div>
		</div>
		
		<div class="col-12 col-lg-4 mb-2">
			<div class="card p-0 bg-primary">
				<div class="card-body pt-3 pb-1">
					<div class="row p-0">
						<div class="col-4">
							<i class="fa fa-shopping-cart fa-5x text-white" style="opacity: 0.5; z-index: 1; position: absolute;"></i>
						</div>
			
						<div class="col px-0 ml-0 ml-lg-1">
							<div class="row">
								<div class="col" id="item-counter">
									<h3 class="mt-2 text-white text-truncate" style="font-size: 20px; width: 180px;">2</h3>
								</div>
							</div>
				
							<div class="row">
								<div class="col">
									<h5 class="font-weight-bolder text-white" style="font-size: 25px;">Goat Sales</h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer text-center text-white py-0" style="background: #0065b6;">
					<a href="" class="nav-link">Add New Supplies&emsp;<span class="fa fa-arrow-circle-right fa-lg"></span></a>
				</div>

			</div>

		</div>

	</div>

	<div class="row">
		<div class="col text-right p-2 mr-4 font-weight-bold">
			<?php $dt = Carbon::now();
				echo Carbon::parse($dt)->format("F d,Y | l");
				//echo Carbon::createFromFormat('d/mmmm/Y', $dt);
			 ?>
		</div>
	</div>

	<div class="row" >
		<div class="col-12 col-sm-12 col-md-8 p-2">
			<section class="p-2 ml-2">

				<div class="card">
					<div class="card-header">
						<span class="fa fa-tags"></span>&nbsp;Recent Activity
					</div>

					<div class="card-body mb-1">
						<div class="form-control bg-light">
							No recent activity.
						</div>
					</div>

				</div>

			</section>

			<section class="p-2 ml-2">
				<div class="card">

					<div class="card-header">
						<span class="fa fa-area-chart"></span>&nbsp;Recent Transactions
					</div>

					<div class="card-body mb-1">
						<div class="form-control bg-light">
							No recent transactions.
						</div>
					</div>

				</div>
			</section>			
		</div>

		<div class="col-12 col-sm-12 col-md-4 ml-2 mt-md-2 ml-md-0 p-2">
			<div class="card mt-2 mr-2">
				<div class="card-header">
					<span class="fa fa-bell"></span>&nbsp;Notification Panel
				</div>
				<div class="card-body mb-1">
					<div class="form-control bg-light">
						No recent reminders
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>