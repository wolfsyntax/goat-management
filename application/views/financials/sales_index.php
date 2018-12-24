<div class="container-fluid mt-5">
	<div class="row pt-5">
		<div class="col">
			<h1>Goat Sales</h1>
		</div>
	</div>

	<div class="row pt-5 mr-4">
		<div class="col text-right">
			<a href="<?= base_url()?>goat/sales/new" class="btn btn-success" title="Add Goat">
				<span class="fa fa-plus fa-lg"></span>&emsp;New Transaction
			</a>
		</div>
	</div>
	<div class="row mt-0">
		<div class="col">
			<div class="jumbotron bg-light">
				<table id="goat_records"  class="table table-striped table-bordered" style="width:100% ">
				    <thead>
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
						<tr>
				        	<td><?= $row->eartag_id; ?></td>
				        	<td><?= $row->transact_date; ?></td>
				       	 	<td><?= $row->username;?></td>
				        	<td><?= $row->price_per_kilo; ?></td>
				        	<td><?= $row->weight; ?></td>
				        	<td><?= $row->sold_to; ?></td>
				        	<td>
				        		<div class="btn-group p-0">
				        			<a href="" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
				        			<a href="<?= base_url("sales/{$row->sales_id}/view"); ?>" class="btn btn-info btn-sm" title="View"><i class="fa fa-eye"></i></a>
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