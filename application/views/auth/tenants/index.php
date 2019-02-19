<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="" id="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<section>
							
							<?php $this->load->view('includes/breadcrumb') ?>
							<div class="container-fluid d-flex justify-content-end">
								<i class="fa fa-clock-o pt-1"></i><span>&nbsp;<?= date('D | F d, Y') ?></span>
							</div>

						</section>
						
						<section>
							<div class="row pl-2">
								<div class="col">&emsp;</div>
							</div>
						</section>

						<section>
							<div class="row pl-2">
								<div class="col-12 col-lg-4 mt-2">
									<div class="card py-0 bg-success">
										<div class="card-body pt-3 pb-1">
											<div class="row p-0">
												A
											</div>
										</div>
										<div class="card-footer text-center text-white py-0 px-0" style="background: #23923d;">
											<a href="" class="nav-link font-weight-bolder text-white text-left">Add New Goat&emsp;<span class="fa fa-arrow-circle-right fa-lg"></span></a>
										</div>

									</div>
								</div>

								<div class="col-12 col-lg-4 mt-2">
									<div class="card py-0 bg-info">
										<div class="card-body pt-3 pb-1">
											<div class="row p-0">
												A
											</div>
										</div>
										<div class="card-footer text-center text-white py-0 px-0" style="background: #148ea1;">
											<a href="" class="nav-link font-weight-bolder text-white text-left">Add New Goat&emsp;<span class="fa fa-arrow-circle-right fa-lg"></span></a>
										</div>

									</div>
								</div>

								<div class="col-12 col-lg-4 mt-2">
									<div class="card py-0 bg-primary">
										<div class="card-body pt-3 pb-1">
											<div class="row p-0">
												A
											</div>
										</div>
										<div class="card-footer text-center text-white py-0 px-0" style="background: #006fe6;">
											<a href="" class="nav-link font-weight-bolder text-white text-left">Add New Goat&emsp;<span class="fa fa-arrow-circle-right fa-lg"></span></a>
										</div>

									</div>
								</div>					
							</div>
						</section>

					</div>
				</div>

				<div class="row mt-2">
					<div class="col-12 col-lg-8">

						<section class="pl-2">

							<div class="card mb-2">
								
								<div class="card-header"><span class="fa fa-clock"></span>&emsp;Recent Activities</div>
								
								<div class="card-body">
									<div class="row px-3 pt-2">
										<div class="table-responsive table-responsive-sm text-nowrap">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>A</th>
														<th>B</th>
														<th>C</th>
														<th>D</th>
														<th>E</th>
														<th class="text-center" width="100px;">Activity Type</th>
														<th>G</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td colspan="7" class="text-center" style="background: #d2d2d2;"><i>No records found.</i></td>
													</tr>
													<!-- tr>
														<td>1</td>
														<td>2</td>
														<td>3</td>
														<td>4</td>
														<td>5</td>
														<td>6</td>
														<td>7</td>

													</tr -->
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							
						</section>

						<section class="pl-2">
							
							<div class="card my-2 shadow-none border-0 rounded-0 ">
								<div class="card-header bg-light border-0"><span class="fa fa-clock"></span>&emsp;Recent Transaction</div>
								<div class="card-body">
									<div class="row px-3 pt-2">
										<div class="table-responsive table-responsive-sm text-nowrap">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>A</th>
														<th>B</th>
														<th>C</th>
														<th>D</th>
														<th>E</th>
														<th class="text-center" width="100px;">Activity Type</th>
														<th>G</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td colspan="7" class="text-center"><i>No transaction found.</i></td>
													</tr>
														<!-- tr>
															<td>1</td>
															<td>2</td>
															<td>3</td>
															<td>4</td>
															<td>5</td>
															<td>6</td>
															<td>7</td>

														</tr -->
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

						</section>

					</div>

					<div class="col-12 col-md-12 col-lg-4 bg-dark">
						
						<section class="px-4 px-lg-1">
							<div class="card mb-2">
								<div class="card-header"><span class="fa fa-clock"></span>&emsp;Notification</div>
								<div class="card-body text-center px-4 ml-1">
									<!--span class="text-muted">No notifications yet.</span-->
									<div class="row">
										<div class="col">
											<p class="text-truncate">The quick brown fox jumps over the lazy dog.</p>
										</div>
									</div>
								</div>
							</div>
						</section>						

					</div>
				</div>

				<div class="row px-2">
					<div class="col">

						

					</div>
				</div>
			</div>
		</div>

	</div>
</div>