<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">

		<div class="" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="" id="content">
			
			<div class="container mt-4">
				<div class="card mb-2">
					<div class="card-header d-block"><span class="d-inline-block mt-1">&emsp;Sales Reports</span><a href="<?= base_url('reports/sales');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report"><i class="fa fa-file-pdf-o"></i></a></div>
								
					<div class="card-body">
			       			<div class="row table-responsive">
			            		<div class="col">
			                		<table class="table table-striped table-hover">
			                    		<thead>
			                        		<tr>
			                            		<th>Eartag ID</th>
			                            		<th>Nickname</th>
			                            		<th>Transact Date</th>
			                            		<th>Sold By</th>
			                            		<th>Weight</th>
			                            		<th>Price per Kilo</th>
			                        		</tr>
			                        		
			                    		</thead>
										
										<tbody>
			                        		<?php if($sales_record != FALSE) {

			                                 	foreach($sales_record as $row) {?>
			                                <tr>
			                                    <td><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?></td>
			                                    <td><?= ucfirst($row->nickname) ?></td>
			                                    <td><?= ucfirst($row->transact_date) ?></td>
			                                    <td><?= ucfirst($row->username) ?></td>
			                                    <td><?= ucfirst($row->weight) ?></td>
			                                    <td><?= ucfirst($row->price_per_kilo) ?></td>
			                                </tr>

			                        	<?php } }?>
			                    	</tbody>
			                	</table>
			            	</div>
			        	</div>
			        </div>
			   	</div>
			    


				<div class="card mb-2">
					<div class="card-header d-block"><span class="d-inline-block mt-1">&emsp;Goat Profile</span><a href="<?= base_url('reports/profile');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report"><i class="fa fa-file-pdf-o"></i></a></div>
									
					<div class="card-body">
			        	<div class="row table-responsive mt-1">
			            	<div class="col">
			                	<table class="table table-striped table-hover">
			                    	<thead>
			                        	<tr>
			                            	<th>Eartag ID</th>
			                            	<th>Eatag Color</th>
			                            	<th>Gender</th>
			                            	<th>Nickname</th>
			                            	<th>Body Color</th>
			                            	<th>Category</th>
			                        	</tr>
			                        		
			                    	</thead>
			                   		
			                   		<tbody>
			                        <?php if($goat_active_record != FALSE) {

			                            foreach($goat_active_record as $row) {?>
			                            <tr>
			                               	<td><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?></td>
			                                <td><?= ucfirst($row->eartag_color) ?></td>
			                                <td><?= ucfirst($row->gender) ?></td>
			                                <td><?= ucfirst($row->nickname) ?></td>
			                                <td><?= ucfirst($row->body_color) ?></td>
			                                <td><?= ucfirst($row->category) ?></td>
			                            </tr>

			                      	<?php } }?>
			                    	</tbody>
			                	</table>
			            	</div>
			        	</div>
			        </div>
			    </div>



			    <div class="card mb-2">
					<div class="card-header d-block"><span class="d-inline-block mt-1">&emsp;Loss Reports</span><a href="<?= base_url('reports/loss');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report"><i class="fa fa-file-pdf-o"></i></a></div>
									
					<div class="card-body">
						<div class="row table-responsive mt-1">
					        <div class="col">
					        	<div class="col">
					                <table class="table table-striped table-hover mt-1">
					                    <thead>
					                       	<tr>
					                           	<th>Eartag ID</th>
					                           	<th>Date of Loss</th>
					                           	<th>Cause</th>
					                           	<th>Remarks</th>
					                           	<th>User</th>
					                       	</tr>
					                        		
					                    </thead>
					                   		
					                   	<tbody>
					                    <?php if($goat_loss_record != FALSE) {

					                        foreach($goat_loss_record as $row) {?>
					                       	<tr>
					                            <td><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?></td>
					                            <td><?= ucfirst($row->date_perform) ?></td>
					                            <td><?= ucfirst($row->cause) ?></td>
					                            <td><?= ucfirst($row->remarks) ?></td>
					                            <td><?= ucfirst($row->username) ?></td>           		 	
					                        </tr>

					                    <?php } }?>
					                    </tbody>
					                </table>
					            </div>
					       	</div>
					    </div>
				    </div>
				</div>
    		</div>
    	</div>

	</div>

</div>
