
<div class="form-row p-1">
	<label class="col-form-label-sm col-12 col-sm-12 col-md-2 col-lg-2">Tag ID <span class="text-danger">*</span></label>								
	
	<div class="col">
		<select name="eartag_id" id="goat_id_select" class="form-control" placeholder="- Enter Ear Tag ID -" value="<?= set_value('eartag_id'); ?>" required>

			<?php foreach($goat_record as $row) {?>           
			<option value="<?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?>"><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT) ?> (<?= $row->nickname ?>)</option>
			<?php } ?>
		</select>
		
		<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>			
	</div>

</div>
								
<div class="form-row p-1">
	<label class="col-form-label-sm col-12 col-sm-12 col-md-2 col-lg-2">Date Sold <span class="text-danger">*</span></label>
	
	<div class="col">
		<input type="date" name="transact_date" value="<?= set_value('transact_date');?>" placeholder="" class="form-control " required>
		
		<?= (form_error('transact_date')	!= "" ? form_error('transact_date') : ''); ?>

	</div>
</div>

<div class="form-row p-1">
	
	<label class="col-form-label-sm col-12 col-sm-12 col-md-2 col-lg-2">Sold Through <span class="text-danger">*</span></label>
	
	<div class="col">
		
		<select name="sold_to" id="client_select" class="form-control" placeholder="- Select Buyer -" value="<?= set_value('sold_to'); ?>" required>

			<option value="MGM">MGM</option>           
		</select>
		
		<?= (form_error('sold_to')	!= "" ? form_error('sold_to') : ''); ?>

	</div>

</div>

<div class="form-row p-1">
	<label class="col-form-label-sm col-12 col-sm-12 col-md-2 col-lg-2">Total Weight <span class="text-danger">*</span></label>
	
	<div class="col">
		<input type="text" name="weight" value="<?= set_value('weight'); ?>" placeholder="Enter weight in kilos" class="form-control " required>
		
		<?= (form_error('weight')	!= "" ? form_error('weight') : ''); ?>
	
	</div>
</div>

<div class="form-row p-1">
	
	<label class="col-form-label-sm col-12 col-sm-12 col-md-2 col-lg-2">Price per Kilo <span class="text-danger">*</span></label>
	
	<div class="col">
		
		<input type="text" name="price_per_kilo" value="<?= set_value('price_per_kilo'); ?>" placeholder="Price per Kilo" class="form-control " required>
		
		<?= (form_error('price_per_kilo')	!= "" ? form_error('price_per_kilo') : ''); ?>
	
	</div>
</div>

<div class="form-row p-1">
	<label class="col-form-label-sm col-12 col-sm-12 col-md-2 col-lg-2">Description</label>
	
	<div class="col">
		<textarea name="remarks" placeholder="notes / additional information" class="form-control "><?= set_value('remarks'); ?></textarea>

		<?= (form_error('remarks')	!= "" ? form_error('remarks') : ''); ?>

	</div>
</div>

<div class="form-row p-1 float-right w-100 mt-2">
	<span class="col clearfix"></span>
	
	<button type="submit" class="font-weight-bolder btn btn-success col-md-3 offset-md-9" name="submit" id="save_btn">Add Sales</button>
	<!--input type="submit" class="btn btn-info col-12 col-md-3" value="Add Sale" id="save_btn"-->							
</div>

<div class="form-row p-1 float-right w-100">
	&emsp;
</div>			