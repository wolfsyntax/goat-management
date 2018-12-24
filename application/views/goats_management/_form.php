
	<div class="form-row p-1">
		<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Tag ID <span class="text-danger">*</span></label>								
		
		<div class="col-8 col-sm-8 col-md-4">
			<input type="text" name="eartag_id" placeholder="Tag ID"  class="form-control" value="<?= set_value('eartag_id');?>" />
			
			<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>	
		</div>

		<label class="col-form-label-sm col-4 col-sm-4 col-md-1">Tag Color <span class="text-danger">*</span></label>								
		<div class="col">
			<div class="row px-3">
										
				<select name="eartag_color" id="tag_color_select" class="form-control col-11" placeholder="- Enter Tag Color -" value="<?= set_value('eartag_color'); ?>" required>

 	    			<option value="green">Green</option> 
	                <option value="yellow">Yellow</option>
	                <option value="orange">Orange</option>
	                <option value="blue">Blue</option>      
	                                    		          
				</select>
				<input type="color" name="tag_picker" id="tagpicker" class="form-control col-1" onchange="tagColorPick(this.value);" >
			</div>
                        			
			<?= (form_error('eartag_color')	!= "" ? form_error('eartag_color') : ''); ?>	

		</div>
	</div>
	
	<div class="form-row p-1">
		<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Gender <span class="text-danger">*</span></label>
		<div class="col">
			<select name="gender" class="custom-select" id="gender" onchange="select_gender(this);">
				<option value="" >- Select a Gender -</option>
				<?php if(set_value("gender") == "male") {?>
					<option value="male" selected>Male</option>
					<option value="female">Female</option>
				<?php } elseif(set_value("gender") == "female") {?>
					<option value="male">Male</option>
					<option value="female" selected>Female</option>
				<?php } else {?>
					<option value="male">Male</option>
					<option value="female">Female</option>
				<?php }?>

			</select>
			<?= (form_error('gender')	!= "" ? form_error('gender') : ''); ?>	
		</div>
	</div>

	<div class="form-row p-1">
		<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Body Color <span class="text-danger">*</span></label>
		
		<div class="col">
			<select name="body_color" id="body_color_select" class="form-control" placeholder="- Enter Body Color -" value="<?= set_value('body_color'); ?>">

				<option value="Brown">Brown</option>           
			</select>
			
			<?= (form_error('body_color')	!= "" ? form_error('body_color') : ''); ?>	
		</div>

	</div>
	
	
	<fieldset >
		<div class="form-row p-1 pt-3 ">
			<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Category <span class="text-danger">*</span></label>
			<select name="category" id="cat_info" class="col form-control" onchange="show_form(this);">
				<option value="">-- Select Category --</option>
				<?php if(set_value("category") == "birth") {?>
					<option value="birth" selected>Birth</option>
					<option value="purchase">Purchase</option>
				<?php } elseif(set_value("category")) {?>
					<option value="birth">Birth</option>
					<option value="purchase" selected>Purchase</option>
				<?php } else {?>
					<option value="birth">Birth</option>
					<option value="purchase">Purchase</option>
				<?php }?>
			</select>
		</div>
		<div class="form-row p-1 birth-elem">
			<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Birth Date <span class="text-danger">*</span></label>
			<div class="col">
				<input type="date" name="birth_date" value="<?= set_value('birth_date');?>" placeholder="Date of Birth" class="form-control" onchange="check_date_format(this);" >
				<span id="date_checker"><?= (form_error('birth_date')	!= "" ? form_error('birth_date') : ''); ?></span>	
			</div>
		</div>

		<div class="form-row p-1 birth-elem">
			<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Dam ID <span class="text-danger">*</span></label>
			
			<div class="col">
				<select name="dam_id" id="dam_id_select" class="form-control" placeholder="- Enter Dam ID -" value="<?= set_value('dam_id'); ?>" >

				<?php foreach($dam_record as $row){ ?>
					<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
				<?php } ?>           
				</select>
				
				<?= (form_error('dam_id')	!= "" ? form_error('dam_id') : ''); ?>	
			</div>
		</div>

		<div class="form-row p-1 birth-elem">
			<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Sire ID <span class="text-danger">*</span></label>
		
			<div class="col">
				<select name="sire_id" id="sire_id_select" class="form-control" placeholder="- Enter Sire ID -" value="<?= set_value('sire_id');?>">

				<?php foreach($sire_record as $row){ ?>
					<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
				<?php } ?>                                	
				</select>
				
				<?= (form_error('sire_id')	!= "" ? form_error('sire_id') : ''); ?>	
			</div>
		</div>

<!-- Purchase  -->

		<div class="form-row p-1 purchase-elem">
			<label class="col-form-label-sm col-12 col-sm-3 col-md-2 col-lg-2">Purchase Date <span class="text-danger">*</span></label>
			
			<div class="col">
				<input type="date" name="purchase_date" value="<?= set_value('purchase_date'); ?>" placeholder="Date of Purchase" class="form-control" onchange="check_date_format(this);" >
				
				<span id="date_checker"><?= (form_error('purchase_date') != "" ? form_error('purchase_date') : ''); ?></span>
			</div>
		</div>

		<div class="form-row p-1 purchase-elem">
			<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Purchase Weight <span class="text-danger">*</span></label>
			
			<div class="col">
				<input type="text" name="purchase_weight" value="<?= set_value('purchase_weight'); ?>" placeholder="Enter weight in kilo" class="form-control" >
				<?= (form_error('purchase_weight')	!= "" ? form_error('purchase_weight') : ''); ?>		
			</div>
		</div>

		<div class="form-row p-1 purchase-elem">
			<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Purchase From <span class="text-danger">*</span></label>
			
			<div class="col">
				<select name="purchase_from" id="client_select" class="form-control" placeholder="- Vendor -" value="<?= set_value('purchase_from');?>">

					<option value=""></option>           
				</select>

				<?= (form_error('purchase_from')	!= "" ? form_error('purchase_from') : ''); ?>		
			</div>

		</div>

		<div class="form-row p-1 purchase-elem">
			<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Price per Kilo<span class="text-danger">*</span></label>
			
			<div class="col">
				<input type="text" name="purchase_price" value="<?= set_value("purchase_price"); ?>" placeholder="Purchase Price" class="form-control">

				<?= (form_error('purchase_price')	!= "" ? form_error('purchase_price') : ''); ?>		
			</div>
		</div>

	</fieldset>

	<div class="form-row p-1">
		<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Is castrated ? <span class="text-danger">*</span></label>
		
		<div class="col mt-2">
			<input type="checkbox" name="is_castrated" value="" class="custom-checkbox" id="is_castrated" disabled="" >
			
			<?= (form_error('is_castrated')	!= "" ? form_error('is_castrated') : ''); ?>	
		</div>
	</div>




