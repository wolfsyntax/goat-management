<?php $this->load->view('includes/header') ?>

<div class="container-fluid" style="">
	<div class="row">
		
		<div class="" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>
		
		<div class="pl-3 pr-5" id="content">
			<section>
				<?php $this->load->view('includes/breadcrumb') ?>	
			</section>

			<section class="py-2 mt-2">
				<div class="container ml-3">
					<div class="row pl-3">
						<div class="col pl-2">
							<h1>Goat Sales</h1>
						</div>
					</div>
				</div>

				<div class="container pl-5">
					<div class="row">
						<div class="col offset-md-6 offset-lg-8">
							<a href="<?= base_url()?>goat/sales/new" class="btn btn-success w-100 mt-3 mt-md-0" title="Add New Sales">
								<span class="fa fa-plus fa-lg"></span>&emsp;New Transaction
							</a>
						</div>
					</div>

					<div class="row mt-5">
						<input type="hidden" name="_status" value="" id="_status">
						<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
					</div>
					
					<?php if($this->session->userdata('goat_records') == FALSE) { ?>
					<div class="row mt-2">
						<div class="col">
						
							<div class="alert alert-danger" role="alert">
								<i class="fa fa-exclamation-circle"></i>&emsp;No goat records found! Click <a href="<?= base_url('goat/new') ?>" class="alert-link">here</a>&nbsp;to add new goat.
							</div>					
						
						</div>
					</div>					
					<?php } ?>

					<div class="row mt-0 pl-4">
						<div class="col py-2 px-2">
							<div class="row table-responsive table-responsive-sm text-nowrap">
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
								        	<td>&nbsp;<?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?> (<?= $row->nickname ?>)</td>
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
			</section>
		</div>
	</div>
</div>