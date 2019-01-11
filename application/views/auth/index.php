<?php use Carbon\Carbon; ?>
<div class="container-fluid p-0">
	<div class="row" >
		<div class="col-12 p-3">
			<?= $this->session->flashdata('profile') ? $this->session->flashdata('profile') : '' ?>
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
							No recent reminder.
						</div>
					</div>
				</div>
		</div>
		
	</div>
</div>