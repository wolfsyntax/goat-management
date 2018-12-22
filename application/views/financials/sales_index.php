<div class="container-fluid mt-5">
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
				      <tr>
				        <td>1</td>
				        <td>2</td>
				        <td>3</td>
				        <td>4</td>
				        <td>5</td>
				        <td>6</td>
				        <td>
				        	<div class="btn-group p-0">
				        		<a href="" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
				        		<a href="" class="btn btn-info btn-sm" title="View"><i class="fa fa-eye"></i></a>

				        	</div>
				        </td>
				      </tr>
				    </tbody>
				  </table>   
			</div>
		</div>
	</div>
</div>