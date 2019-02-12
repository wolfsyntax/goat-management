<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-2 col-lg-2 px-0">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="col-10 col-lg-10 px-2 py-2">				

			<?php $this->load->view('includes/breadcrumb') ?>

			<div class="container-fluid mt-2">
				<div class="row pt-3">
					<div class="col-12 py-0">
						&emsp;
					</div>
					<div class="col">
						<h1>Goat Sales</h1>
					</div>
				</div>

				<div class="row pt-2 mr-4">
					<div class="col-12 col-md-3 py-2 offset-md-9 mb-5 pr-0">
						<a href="<?= base_url()?>goat/sales/new" class="btn btn-success w-100 mt-3 mt-md-0" title="Add New Sales">
							<span class="fa fa-plus fa-lg"></span>&emsp;New Transaction
						</a>
					</div>
				</div>
				<div class="row mt-0" style="padding-bottom: 180px">
					<div class="col">
						<div class="row table-responsive table-responsive-sm text-nowrap px-2 pr-3">
							<table id="gs_record"  class="table table-striped table-bordered" style="width:100% ">
							    <thead class="bg-dark text-white text-center">
							      <tr>
							        <th>Eartag ID</th>
							        <th>Transact Date</th>
							        <th>Vendor</th>
							        <th>Price/Kilo</th>
							        <th>Total Weight</th>
							        <th>Buyer</th>
							        <th>Action</th>
							      </tr>
							    </thead>

							    <tbody>
									<?php 
										if($goat_record){
										foreach($goat_record->result() as $row){?>
									<tr title="Sold <?= Carbon\Carbon::parse($row->transact_date)->diffForHumans() ." to ". $row->sold_to ?>">
							        	<td><?= $row->eartag_id; ?></td>
							        	<td><?= $row->transact_date; ?></td>
							       	 	<td><?= $row->username;?></td>
							        	<td><?= $row->price_per_kilo; ?></td>
							        	<td><?= $row->weight; ?></td>
							        	<td><?= ucfirst($row->sold_to); ?></td>
							        	<td>
							        		<div class="btn-group p-0">
							        			
							        			<a href="<?= base_url("sales/{$row->sales_id}/view"); ?>" class="btn btn-info btn-sm btn-goat" title="View"><i class="fa fa-eye"></i></a>

							        			<a href="<?= base_url("sales/{$row->sales_id}/edit"); ?>" class="btn btn-primary btn-sm btn-goat" title="Edit"><i class="fa fa-pencil"></i></a>

							        			<a href="<?= base_url("sales/{$row->sales_id}/remove"); ?>" class="btn btn-danger btn-sm btn-goat-rm" title="Delete"><i class="fa fa-trash"></i></a>				        			
								        	</div>
								        </td>
							      	</tr>
							  		<?php } 
							  			}else{
							  				echo "No sale transaction yet";

							  			}?>
							    </tbody>
							  </table>   
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>