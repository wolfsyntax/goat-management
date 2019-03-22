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
							<br>
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
										<div class="card-body pt-0 pb-0">
											<div class="row p-0 pl-2">
												<div style="font-size: 100px;">
  													 <i class="fa fa-shopping-cart fa-10x" style="color:white"></i>
												</div>
											</div>
										</div>
										<div class="card-footer text-center text-white py-0 px-0" style="background: #23923d;">
											<a href="<?= base_url('goat/sales/new') ?>" class="nav-link font-weight-bolder text-white text-left">Sell a Goat&emsp;<span class="fa fa-arrow-circle-right fa-lg"></span></a>
										</div>

									</div>
								</div>

								<div class="col-12 col-lg-4 mt-2">
									<div class="card py-0 bg-info">
										<div class="card-body pt-0 pb-0">
											<div class="row p-0 pl-2">
												<div style="font-size: 100px;">
  													<i class="fa fa-transgender" style="color:white"></i>
												</div>
											</div>
										</div>
										<div class="card-footer text-center text-white py-0 px-0" style="background: #148ea1;">
											<a href="<?= base_url('breeding/new') ?>" class="nav-link font-weight-bolder text-white text-left">Perform Breeding&emsp;<span class="fa fa-arrow-circle-right fa-lg"></span></a>
										</div>

									</div>
								</div>

								<div class="col-12 col-lg-4 mt-2">
									<div class="card py-0 bg-danger">
										<div class="card-body pt-0 pb-0">
											<div class="row p-0 pl-2">
												<div style="font-size: 100px;">
  													<i class="fa fa-heartbeat" style="color:white"></i>
												</div>
											</div>
										</div>
										<div class="card-footer text-center text-white py-0 px-0" style="background: #e60000">
											<a href="<?= base_url('health/view') ?>" class="nav-link font-weight-bolder text-white text-left">Perform Health Check&emsp;<span class="fa fa-arrow-circle-right fa-lg"></span></a>
										</div>

									</div>
								</div>					
							</div>
						</section>

					</div>
				</div>

				<div class="row mt-4">
					<div class="col-12 col-lg-8">

						<section class="pl-2">

							<div class="card mb-2">
								
								<div class="card-header"><span class="fa fa-clock"></span>&emsp;Recent Activities</div>
								
								<div class="card-body">
									<div class="row px-3 pt-2">
										<div class="table-responsive table-responsive-sm text-nowrap">
											<table class="table table-bordered">
												<thead class="bg-dark text-white">
													<tr>
														<th>Eartag ID</th>
														<th>Date</th>
														<th>User</th>
														<th>Activity Type</th>
													</tr>
												</thead>
												<tbody>
													<?php
														if($recent_activity != FALSE) {
															foreach($recent_activity as $row) { ?>
														<tr>
															<td>
																<?= $row->eartag_id ?> (<?= $row->nickname ?>)		
															</td>
															<td><?= $row->date_perform ?></td>
															<td><?= $row->username?></td>
															<td><?= $row->activity_type?></td>
															
														</tr>
													<?php } 
														} else {
													 ?>
													 	<tr><td colspan="7" class="text-center"><i>No transaction found.</i></td></tr>
													 <?php
														}
													?>
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
												<thead class="bg-dark text-white">
													<tr>
														<th>Eartag ID</th>
														<th>Buyer</th>
														<th>Username</th>
														<th>Date</th>
														<th>Total</th>

												
													</tr>
												</thead>
												<tbody>
													<?php
														if($recent_transaction != FALSE) {
															foreach($recent_transaction as $row) { ?>
														<tr>
															<td>
																<?= $row->eartag_id ?> (<?= $row->nickname ?>)		
															</td>
															<td><?= $row->sold_to ?></td>
															<td><?= $row->username?></td>
															<td><?= $row->transact_date?></td>
															<td><?= floatval($row->weight) * floatval($row->price_per_kilo) ?></td>
														</tr>
													<?php } 
														} else {
													 ?>
													 	<tr><td colspan="7" class="text-center"><i>No transaction found.</i></td></tr>
													 <?php
														}
													?>
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

					<div class="col-12 col-md-12 col-lg-4">
						
						
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