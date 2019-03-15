<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scallable=0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome">
	<meta http-equiv="refresh" content="1800">
	<meta http-equiv="cache-controle" content="no-cache, no-store, must-revalidate">

	<link rel="stylesheet" type="text/css" href="<?= base_url('public/css/app.css')?>">

	<title>Error <?= $status_code . '&mdash;'. $heading ?></title>

</head>
<body>

	<div class="container" style="margin-top: 10% !important;">
		<div class="row">

			<div class="col">
				<h1 class="display-1 text-center"><?= $status_code ?></h1>
				<h5 class="text-center"><?= $heading ?></h5>
			</div>

			<div class="col">

				<section>
					<p<?= $message ?><span class="text-muted">That's all we know</span></p>
				</section>
				
				<section>
					<div class="row">

						<div class="col">
							<a href="<?= base_url('') ?>" title="Homepage" class="btn btn-outline-primary">
								<span class="fa fa-home"></span> Homepage
							</a>
						</div>

					</div>
				</section>

			</div>

		</div>
	</div>

</body>
</html>