<div class="container-fluid mt-1">
	<div class="row pt-5">
		<div class="col">
			<h1 class="p-2 p-md-0" style="font-weight: 80%;">Goat Management</h1>
		</div>
	</div>
	<div class="row pl-3 pr-2 mr-0 mr-md-4 mt-2">
		<div class="col-12 col-md-3 offset-md-6">
			<!--a href="<?= base_url()?>goat/new" class="btn btn-danger w-100 mt-3 mt-md-0" title="Manage Goat Status" data-toggle="modal" data-target="#manage_stats">
				<span class="fa fa-pencil fa-lg"></span>&emsp;Manage
			</a-->&emsp;
		</div>
		<div class="col-12 col-md-3">
			<a href="<?= base_url()?>goat/new" class="btn btn-success w-100 mt-3 mt-md-0" title="Add Goat">
				<span class="fa fa-plus fa-lg"></span>&emsp;Add Goat
			</a>
		</div>
	</div>
	<div class="row mt-0">
		<input type="hidden" name="_status" value="" id="_status">
	</div>
	<div class="row mt-0">
		<div class="col">
			<div class="jumbotron bg-light">
				<table id="gs_record" class="table table-striped table-bordered" style="width:100% ">
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
				    <?php
				    if($goat_record){ 
				    	foreach($goat_record as $row) {?>
						<tr>
				        	<td><?= $row->eartag_id 			?></td>
				        	<td><?= ucfirst($row->eartag_color) ?></td>
				        	<td><?= ucfirst($row->body_color) 	?></td>
				        	<td><?= ucfirst($row->gender) 		?></td>
				        	<td><?= ucfirst($row->category) 	?></td>
				        	<td><?= ucfirst($row->status) 		?></td>
				        	<td>
					        	<div class="btn-group p-0">

					        		<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/edit"); ?>" class="btn btn-primary btn-sm btn-goat" title="Edit"><i class="fa fa-pencil"></i></a>
					        		<a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/view"); ?>" class="btn btn-info btn-sm btn-goat" title="View"><i class="fa fa-eye"></i></a>
					        		<?php 
					        			switch (ucfirst($row->status)) {
					        				case 'Deceased':
					        				case 'Lost':
					        				case 'Stolen':
					        		?>

					        			<a href="javascript::void(0);" role="button" class="btn btn-warning btn-sm btn-goat" title="Modify status" ><i class="fa fa-toggle-off"></i></a>

					        		<?php
					        					break;

					        				case 'Sold':
					        		?>
					        			<a href="javascript::void(0);" role="button" class="btn btn-warning btn-sm btn-goat disabled" title="Change Status" ><i class="fa fa-lock"></i></a>
					        		<?php
					        					break;

					        				default:
					        		?>

					        			<a href="<?= base_url("status/{$row->eartag_id}/edit");?>" class="btn btn-warning btn-sm btn-goat" title="Change Status"><i class="fa fa-toggle-on"></i></a>

					        		<?php
					        					break;
					        			}
					        		?>
					        		<!--a href="<?= base_url("manage/{$row->category}/{$row->ref_id}/view"); ?>" class="btn btn-danger btn-sm btn-goat" title="Change Status"><i class="fa fa-sliders"></i></a-->
					        	</div>
				        </td>
				      </tr>
				    <?php }
					}else{
				  		echo "No Goat records yet";

				  	}?>
				    </tbody>
				  </table>   
			</div>
		</div>
	</div>
</div>

<!--script type="text/javascript">
	
	
	
	
		function status_change(eartag_id, stats){

			$("#eartag_id_stat").val(eartag_id);
			
			if(stats == "active"){
				$("#cselect_active").show();
				$("#cselect_inactive").hide();

			}else{
				$("#cselect_active").hide();
				$("#cselect_inactive").show();				
			}

		}


</script-->