<?php $this->load->view('includes/header') ?>
<div class="container-fluid">
	<div class="row">

		<div class="" id="sidebar">
			<?php $this->load->view('includes/sidebar') ?>
		</div>

		<div class="pr-5" id="content">
			
			<section>
				<?php $this->load->view('includes/breadcrumb') ?>
			</section>
			
			<section class="py-2 mt-2">
				<div class="container-fluid ml-3">
					<div class="row">
						<div class="col pl-5">
							<h1 class="ml-3">Inventory Management</h1>		
						</div>
					</div>

					<div class="form-row">
						<div class="col offset-md-6 offset-lg-8">
							<a href="<?= base_url()?>inventory/new" class="btn btn-success w-100 mt-3 mt-md-0" title="Add New Item">
								<span class="fa fa-plus fa-lg"></span>&emsp;Add Item
							</a>
						</div>
					</div>

					<div class="row">
						
						<div class="col">
							<input type="hidden" name="_status" value="" id="_status">
							<?= ($this->session->flashdata('inventory') ? $this->session->flashdata('inventory') : ''); ?>
						</div>

					</div>

					<div class="row mt-0 pl-4">
						<div class="col py-5">
							<div class="row table-responsive table-responsive-sm text-nowrap px-md-5 ">

								<table class="col-12 table table-striped table-hover" id="gp_record" >
									<thead class="bg-dark text-white text-center">
										<tr>
											<th>Item Name</th>
											<th>Item Type</th>
											<th>Quantity</th>
											<th width="1%">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($record as $row) {?>
										<tr>
											<td><?= $row->item_name ?></td>
											<td><?= $row->item_type ?></td>
											<td><?= $row->quantity ?> mL</td>
											<td>
												<a href="javascript:void(0);" class="btn btn-primary btn-sm btn-goat" title="Edit" onclick="inventoryCheck(<?= $row->inventory_id?>, '<?= $row->item_name ?>', <?= $row->quantity ?>);" data-toggle="modal" data-target="#inventoryUpdate" ><i class="fa fa-plus"></i></a>

											</td>
										</tr>
										<?php } ?>									
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

<div class="modal fade" id="inventoryUpdate" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
							
				<h5 class="modal-title" id="exampleModalLongTitle">Update Quantity</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>						
				</button>

			</div>
			
			<div class="modal-body">
							
				<?= form_open("", array(
				  		'class' 	=> 'form',
			      		'id'		=> 'inventoryForm',
			    		'onsubmit'	=> 'check_form(this)',
		        	)
	    		)?>
				    		
		    		<div class="container-fluid">
		    			<div class="form-row">

							<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Item Name <span class="text-danger">*</span></label>

							<div class="col">
		    					<input type="text" class="form-control" id="modItem" name="item_name" readonly>
		    				</div>
		    			</div>

		    			<div class="form-row">

							<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Quantity (mL)&nbsp;<span class="text-danger">*</span></label>

							<div class="col">
				    							
			    				<input type="number" class="form-control" value="<?= set_value('quantity') ?>" name="quantity" placeholder="Qty. (mL)" id="qtyIDT" onchange="return checkInventoryValue();" onblur="return checkInventoryValue();" step="1">

		    				</div>
				    				
		    			</div>

						<div class="form-row">
							<div class="clearfix">&emsp;</div>
						</div>

						<div class="form-row">
								
							<div class="col-12 col-sm-8 col-lg-4 offset-lg-8 offset-sm-4">
							
								<input type="submit" name="pregcheck_btn" value="Update" class="btn btn-primary w-100" id="update_btn">
						
							</div>
								
						</div>
					    	
			    	</div>

		    	<?= form_close() ?>
			</div>
		</div>
	</div>
</div>

