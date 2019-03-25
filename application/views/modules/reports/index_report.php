<?php $this->load->view('includes/header') ?>

<div class="container-fluid">
	<div class="row">

		<div class="" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="" id="content">
			
			<div class="container mt-4">
				<div class="card mb-2">
					<div class="card-header d-block">
						<section>
							<div class="row">
								<div class="col-9 align-self-center">
									<span>
										<strong>Sales Reports</strong>
									</span>
								</div>

								<div class="col-3">
									<span class="float-right">
										
										<a href="<?= base_url('reports/sales');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report">
											<i class="fa fa-file-pdf-o"></i>
										</a>

									</span>
								</div>
							</div>
						</section>

					</div>
								
					<div class="card-body">
			       			<div class="row table-responsive pl-4">
			            		<div class="col">
			                		<table class="table table-striped table-hover" id="gs_record">
			                    		<thead class="bg-primary text-white">
			                        		<tr>
			                            		<th>Eartag ID</th>
			                            		<th>Transact Date</th>
			                            		<th>Sold By</th>
			                            		<th>Weight</th>
			                            		<th>Price per Kilo</th>
			                            		<th>Status</th>
			                        		</tr>
			                        		
			                    		</thead>
										
										<tbody>
			                        		<?php if($sales_record != FALSE) {

			                                 	foreach($sales_record as $row) {?>
			                                <tr>
			                                    <td><span class="badge text-white <?php 
																switch ($row->eartag_color) {
																	case 'green' :
																		echo 'bg-success';
																		break;
																	case 'blue' :
																		echo 'bg-primary';
																		break;
																	case 'yellow' :
																		echo 'bg-warning';
																		break;
																	default:	
																		echo 'bg-orange';
																		break;
																}
															?>"><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?></span> (<?= ucfirst($row->nickname) 	?>)</td>
			                                    <!--td><?= ucfirst($row->nickname) ?></td-->
			                                    <td><?= ucfirst($row->transact_date) ?></td>
			                                    <td><?= $row->username ?></td>
			                                    <td><?= ucfirst($row->weight) ?></td>
			                                    <td><?= ucfirst($row->price_per_kilo) ?></td>
			                                    <td><?= ucfirst($row->sales_status) ?></td>
			                                </tr>

			                        	<?php } }?>
			                    	</tbody>
			                	</table>
			            	</div>
			        	</div>
			        </div>
			   	</div>
			    


				<div class="card mb-2">
					<div class="card-header d-block">

						<section>
							<div class="row">
								<div class="col-9 align-self-center">
									<span>
										<strong>Goat Profile</strong>
									</span>
								</div>

								<div class="col-3">
									<span class="float-right">
										
										<a href="<?= base_url('reports/profile');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report"><i class="fa fa-file-pdf-o"></i></a>

									</span>
								</div>
							</div>
						</section>

					</div>
									
					<div class="card-body">
			        	<div class="row table-responsive mt-1 pl-4">
			            	<div class="col">
			                	<table class="table table-striped table-hover" id="gp_record">
			                    	<thead class="bg-success text-white">
			                        	<tr>
			                            	<th>Eartag ID</th>
			                            	
			                            	<th>Gender</th>
			                            	
			                            	<th>Body Color</th>
			                            	<th>Category</th>
			                        	</tr>
			                        		
			                    	</thead>
			                   		
			                   		<tbody>
			                        <?php if($goat_active_record != FALSE) {

			                            foreach($goat_active_record as $row) {?>
			                            <tr>
			                               	<td><span class="badge text-white <?php 
																switch ($row->eartag_color) {
																	case 'green' :
																		echo 'bg-success';
																		break;
																	case 'blue' :
																		echo 'bg-primary';
																		break;
																	case 'yellow' :
																		echo 'bg-warning';
																		break;
																	default:	
																		echo 'bg-orange';
																		break;
																}
															?>"><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?></span> (<?= ucfirst($row->nickname) 	?>)</td>
			                                <!--td><?= ucfirst($row->eartag_color) ?></td-->
			                                <td title="<?= $row->gender == 'male' ? 'Sire' : 'Dam' ?>" ><i class="fa fa-<?= $row->gender ?>"></i>&emsp;<?= ucfirst($row->gender) ?></td>
			                                <!--td><?= ucfirst($row->nickname) ?></td-->
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
					<div class="card-header d-block"><span class="d-inline-block mt-1">&emsp;<strong>List of Dam</strong></span><a href="<?= base_url('reports/loss');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report"><i class="fa fa-file-pdf-o"></i></a></div>
									
					<div class="card-body">
						<div class="row table-responsive mt-1 pl-4">
							A
						</div>
					</div>
				</div>

			    <div class="card mb-2">
					<div class="card-header d-block"><span class="d-inline-block mt-1">&emsp;<strong>List of Sire</strong></span><a href="<?= base_url('reports/loss');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report"><i class="fa fa-file-pdf-o"></i></a></div>
									
					<div class="card-body">
						A 
					</div>
				</div>

			    <div class="card mb-2">
					<div class="card-header d-block"><span class="d-inline-block mt-1">&emsp;<strong>Available Dam for breeding</strong></span><a href="<?= base_url('reports/loss');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report"><i class="fa fa-file-pdf-o"></i></a></div>
									
					<div class="card-body">
						A 
					</div>
				</div>

			    <div class="card mb-2">
					<div class="card-header d-block">
						<section>
							<div class="row">
								<div class="col-9 align-self-center">
									<span>
										<strong>Ready to give Birth</strong>
									</span>
								</div>

								<div class="col-3">
									<span class="float-right">
										
										<a href="<?= base_url('reports/loss');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report">
											<i class="fa fa-file-pdf-o"></i>
										</a>

									</span>
								</div>
							</div>
						</section>
					</div>
									
					<div class="card-body">
						A 
					</div>
				</div>

			    <div class="card mb-5">
					<div class="card-header d-block"><span class="d-inline-block mt-1">&emsp;<strong>Loss Reports</strong></span><a href="<?= base_url('reports/loss');?>" class="btn nav-link float-right text-primary d-inline-block" title="Generate Report"><i class="fa fa-file-pdf-o"></i></a></div>
									
					<div class="card-body">
						<div class="row table-responsive mt-1">
					        <div class="col">
					        	<div class="col">
					                <table class="table table-striped table-hover mt-1" id="gp_loss_record">
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
