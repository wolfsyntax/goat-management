<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-4">
			<table class="table table-borderless">
				<tr>
					<th colspan="3"><a class="nav-link" href="<?= base_url('admin/auth') ?>">Authorization</a></th>
				</tr>
				<tr class="row pl-4">
					<th scope="row" class="col-6">
						<a class="nav-link" href="<?= base_url('admin/auth/admin') ?>">Admin</a>
					</th>
					<td class="col-3">
						<a class="nav-link" href="<?= base_url('admin/auth/admin/add') ?>"><i class="fa fa-plus text-success"></i>&emsp;Add</a>
					</td>
					<td class="col-3">
						<a class="nav-link" href="<?= base_url('admin/auth/admin/edit') ?>"><i class="fa fa-pencil text-warning"></i>&emsp;Edit</a>
					</td>					
				</tr>

				<tr class="row pl-4">
					<th scope="row" class="col-6">
						<a class="nav-link" href="<?= base_url('admin/auth/admin') ?>">Staff</a>
					</th>
					<td class="col-3">
						<a class="nav-link" href="<?= base_url('admin/auth/admin/add') ?>"><i class="fa fa-plus text-success"></i>&emsp;Add</a>
					</td>
					<td class="col-3">
						<a class="nav-link" href="<?= base_url('admin/auth/admin/edit') ?>"><i class="fa fa-pencil text-warning"></i>&emsp;Edit</a>
					</td>					
				</tr>

			</table>
		</div>

		<div class="col">
			<div class="container-fluid">
				<div class="row mt-5">
					<div class="col">
						<table class="table table-hover table-borderless mt-5">
							<thead class="bg-dark text-white">
								<tr>
									<th class="text-center">USERNAME</th>
									<th class="text-center">PHONE NUMBER</th>
									<th class="text-center">FIRST NAME</th>
									<th class="text-center">LAST NAME</th>
									<th class="text-center">STATUS</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($staffs as $staff) {?>
								<tr>
									<td class="text-center">
										<?= $staff->username ?>
									</td>
									
									<td class="text-center">
										<?= $staff->phone_number ?>
									</td>
									
									<td class="text-center">
										<?= ucfirst($staff->first_name) ?>
									</td>
									
									<td class="text-center">
										<?= ucfirst($staff->last_name) ?>
									</td>
									
									<td class="text-center">
										<?php 
											if($staff->active == 'yes') {

												echo '<i class="fa fa-check-circle fa-lg text-success"></i>';	

											} else {

												echo '<i class="fa fa-times-circle text-danger fa-lg"></i>';	

											}
										?>
									</td>

								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
