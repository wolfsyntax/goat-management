<div class="container-fluid">
	<div class="row pt-5 mr-4">
		<div class="col text-right">
			<a href="<?= base_url()?>goat/new" class="btn btn-success" title="Add Goat">
				<span class="fa fa-plus fa-lg"></span>&emsp;Add Goat
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
				        <th>Eartag Color</th>
				        <th>Birthdate</th>
				        <th>Body Color</th>
				        <th>Sire ID</th>
				        <th>Dam ID</th>
				        <th>Gender</th>
				        <th>Category</th>
				        <th>Status</th>
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
				        <td>7</td>
				        <td>8</td>
				        <td>9</td>
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