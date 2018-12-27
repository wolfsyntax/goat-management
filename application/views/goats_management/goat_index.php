<div class="container-fluid mt-5">
	<div class="row pt-5">
		<div class="col">
			<h1>Goat Management</h1>
		</div>
	</div>
	<div class="row pt-5 mr-0 mr-md-4">
		<div class="col text-md-right">
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
				        <th>Body Color</th>
				        <th>Gender</th>
				        <th>Category</th>
				        <th>Status</th>
				        <th>Action</th>
				      </tr>
				    </thead>

				    <tbody>
				    <?php foreach($goat_record as $row) {?>
				      <tr>
				        <td><?= $row->eartag_id ?></td>
				        <td><?= $row->eartag_color ?></td>
				        <td><?= $row->body_color ?></td>
				        <td><?= $row->gender ?></td>
				        <td><?= $row->category ?></td>
				        <td><?= $row->status; ?></td>
				        <td>
				        	<div class="btn-group p-0">

				        		<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/edit"); ?>" class="btn btn-primary btn-sm btn-goat" title="Edit"><i class="fa fa-pencil"></i></a>
				        		<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/view"); ?>" class="btn btn-info btn-sm btn-goat" title="View"><i class="fa fa-eye"></i></a>

				        	</div>
				        </td>
				      </tr>
				    <?php } ?>
				    </tbody>
				  </table>   
			</div>
		</div>
	</div>
</div>