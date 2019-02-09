<div class="container-fluid mt-5" style="margin-bottom: 250px;">
	<div class="row px-0">
		<div class="col-12 py-2">
			&emsp;
		</div>
		<div class="col-12">
			<div class="card shadow-none">
				<div class="card-header bg-light">
					<h1 class="pt-2">
						Inventory Management
					</h1>
				</div>
				<div class="card-body px-0">
					<div class="container-fluid">
						
						<div class="row">
							<div class="col">
							<?= ($this->session->flashdata('inventory') ? $this->session->flashdata('inventory') : ''); ?>
							</div>
						</div>

					</div>
					<div class="container-fluid px-2">
						<div class="row table-responsive table-responsive-sm text-nowrap px-md-5 ">
							<a href="<?= base_url('inventory/new')?>" class="btn btn-success col-12 col-sm-4 offset-sm-8 col-lg-2 offset-lg-10 text-uppercase pt-3 mb-5 btn-goat">
								<i class="fa fa-plus"></i>&emsp;Add Item
							</a>

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
										<td><?= $row->quantity ?></td>
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
				<div class="card-footer">
					Footer
				</div>
			</div>
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
	    					<input type="text" class="form-control" value="<?= set_value('item_name') ?>" name="item_name" placeholder="Item Name" id="modItem">
	    					<input type="hidden" class="form-control" value="" name="item_hname" id="hmodItem">
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

	      <!--div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div-->
		</div>
	</div>
</div>