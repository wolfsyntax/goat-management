<div class = "container-fluid mt-5">
	<div class="row mt-2 mt-md-5">
		<div class="col p-2 p-md-5">
			<div class="card ">
				<div class="card-header card-ubuntu">
					<h3>Modify Goats Record</h3>
				</div>
				<div class="card-body p-2">
					<?php foreach($goat_record as $row) { ?>
						
					<?= form_open(base_url()."goat/{$row->category}/edit/{$row->ref_id}", array("id" => "mgoat_form", "style" => "", "class" => "p-3 p-md-5","onload"=>"form_validator_js();")); ?>
						
						
					<div class="form-row p-1">
						<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Tag ID <span class="text-danger">*</span></label>								
		
						<div class="col-8 col-sm-8 col-md-4">
							<input type="text" name="eartag_id" placeholder="Tag ID"  class="form-control" value="<?= set_value('eartag_id') ? set_value('eartag_id') : $row->eartag_id; ?>" readonly/>
			
							<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>	
						</div>

						<label class="col-form-label-sm col-4 col-sm-4 col-md-1">Tag Color <span class="text-danger">*</span></label>								
						
						<div class="col">
							<div class="row px-3">
								
								<select name="eartag_color" class="form-control col-12" placeholder="- Enter Tag Color -" value="<?= set_value('eartag_color') ? set_value('eartag_id') : $row->eartag_color; ?>" required>
									<?php if($row->eartag_color == "green") {?>									
					 	    			<option value="green" selected>Green</option> 
						                <option value="yellow">Yellow</option>
						                <option value="orange">Orange</option>
						                <option value="blue">Blue</option>     

						            <?php } else if($row->eartag_color == "yellow"){?>

										<option value="green">Green</option> 
					                	<option value="yellow" selected>Yellow</option>
					                	<option value="orange">Orange</option>
					                	<option value="blue">Blue</option>    

	          						<?php }else if($row->eartag_color == "orange") {?>

					 	    			<option value="green">Green</option> 
						                <option value="yellow">Yellow</option>
						                <option value="orange" selected>Orange</option>
						                <option value="blue">Blue</option>      

	          						<?php }else if($row->eartag_color == "blue"){?>

					 	    			<option value="green">Green</option> 
						                <option value="yellow">Yellow</option>
						                <option value="orange">Orange</option>
						                <option value="blue" selected>Blue</option>      

						            <?php }else {?>

					 	    			<option value="green">Green</option> 
						                <option value="yellow">Yellow</option>
						                <option value="orange">Orange</option>
						                <option value="blue">Blue</option>      

						            <?php } ?>
								</select>


							</div>
                        			
							<?= (form_error('eartag_color')	!= "" ? form_error('eartag_color') : ''); ?>	

						</div>
					</div>
	
					<div class="form-row p-1">
						<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Gender <span class="text-danger">*</span></label>
						<div class="col">
							<select name="gender" class="custom-select" id="gender" onchange="select_gender(this);">
								<option value="" >- Select a Gender -</option>
								<?php if(set_value("gender") == "male" || $row->gender == "male") {?>
									<option value="male" selected>Male</option>
									<option value="female">Female</option>
								<?php } elseif(set_value("gender") == "female" || $row->gender == "female") {?>
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
							<select name="body_color" id="body_color_select" class="form-control" placeholder="- Enter Body Color -" value="<?= set_value('body_color') ? set_value('body_color') : $row->body_color; ?>">

								<option value="Brown">Brown</option>           
							</select>
							
							<?= (form_error('body_color')	!= "" ? form_error('body_color') : ''); ?>	
						</div>

					</div>
	
	
					<fieldset >
						<div class="form-row p-1 pt-3 ">
							<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Category <span class="text-danger">*</span></label>
							<!--select name="category" id="mcat_info" class="col form-control" onchange="show_form(this);">
								<option value="">-- Select Category --</option>
								<?php if(set_value("category") == "birth" || $row->category == "birth") {?>
									<option value="birth" selected>Birth</option>
									<option value="purchase">Purchase</option>
								<?php } elseif(set_value("category") == "purchase" || $row->category == "purchase") {?>
									<option value="birth">Birth</option>
									<option value="purchase" selected>Purchase</option>
								<?php } else {?>
									<option value="birth">Birth</option>
									<option value="purchase">Purchase</option>
								<?php }?>
							</select-->

							<input type="text" name="category" id="mcat_info" class="col form-control" readonly="" value="<?= $row->category; ?>">

						</div>
						<div class="form-row p-1 mbirth-elem">
							<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Birth Date <span class="text-danger">*</span></label>
							
							<div class="col-4 col-sm-4 col-md-10 col-lg-10">
								<input type="date" name="birth_date" value="<?= set_value('birth_date') ? set_value('birth_date') : $row->acquire_date;?>" placeholder="Date of Birth" class="form-control" onchange="check_date_format(this);" >
								<span id="date_checker"><?= (form_error('birth_date')	!= "" ? form_error('birth_date') : ''); ?></span>	
							</div>
						</div>

						<div class="form-row p-1 mbirth-elem">
							<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Dam ID <span class="text-danger">*</span></label>
							
							<div class="col">
								<select name="dam_id" id="dam_id_select" class="form-control" placeholder="- Enter Dam ID -" value="<?= set_value('dam_id') ? set_value('dam_id') : $row->dam_id; ?>" >

								<?php foreach($dam_record as $row){ ?>
									<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
								<?php } ?>           
								</select>
								
								<?= (form_error('dam_id')	!= "" ? form_error('dam_id') : ''); ?>	
							</div>
						</div>

						<div class="form-row p-1 mbirth-elem">
							<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Sire ID <span class="text-danger">*</span></label>
						
							<div class="col">
								<select name="sire_id" id="sire_id_select" class="form-control" placeholder="- Enter Sire ID -" value="<?= set_value('sire_id') ? set_value('sire_id') : $row->sire_id;?>">

								<?php foreach($sire_record as $row){ ?>
									<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
								<?php } ?>                                	
								</select>
								
								<?= (form_error('sire_id')	!= "" ? form_error('sire_id') : ''); ?>	
							</div>
						</div>

				<!-- Purchase  -->

						<div class="form-row p-1 mpurchase-elem">
							<label class="col-form-label-sm col-4 col-sm-3 col-md-2 col-lg-2">Purchase Date <span class="text-danger">*</span></label>
							
							<div class="col">
								<input type="date" name="purchase_date" value="<?= set_value('purchase_date') ? set_value('purchase_date'): $row->acquire_date; ?>" placeholder="Date of Purchase" class="form-control" onchange="check_date_format(this);" >
								
								<span id="date_checker"><?= (form_error('purchase_date') != "" ? form_error('purchase_date') : ''); ?></span>
							</div>
						</div>

						<div class="form-row p-1 mpurchase-elem">

							<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Purchase From <span class="text-danger">*</span></label>
							
							<div class="col-8 col-sm-8 col-md-10">
								<select name="purchase_from" id="client_select" class="form-control" placeholder="- Vendor -" value="<?= set_value('purchase_from') ? set_value('purchase_from') : $row->purchase_from; ?>">

									<option value=""></option>           
								</select>

								<?= (form_error('purchase_from')	!= "" ? form_error('purchase_from') : ''); ?>		
							</div>
						</div>

						<div class="form-row p-1 mpurchase-elem">
							
							<label class="col-form-label-sm col-4 col-sm-3 col-md-2 col-lg-2">Purchase Weight <span class="text-danger">*</span></label>
							
							<div class="col">
								<input type="text" name="purchase_weight" value="<?= set_value('purchase_weight') ? set_value('purchase_weight') : $row->purchase_weight; ?>" placeholder="Enter weight in kilo" class="form-control" >
								<?= (form_error('purchase_weight')	!= "" ? form_error('purchase_weight') : ''); ?>		
							</div>

							<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Price per  Kilo<span class="text-danger">*</span></label>
							
							<div class="col-8 col-sm-8 col-md-4">
								<input type="text" name="purchase_price" value="<?= set_value("purchase_price") ? set_value('purchase_price') : $row->purchase_price; ?>" placeholder="Purchase Price" class="form-control">

								<?= (form_error('purchase_price')	!= "" ? form_error('purchase_price') : ''); ?>		
							</div>
						</div>

					</fieldset>

					<!--div class="form-row p-1">
						<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Status <span class="text-danger">*</span></label>
							
						<div class="col">
							<select name="status" class="custom-select" id="status">
								<option value="" >- Select a Status -</option>
								<?php if(set_value("status") == "active") {?>
									
									<option value="active" selected>Active</option>
									<option value="deceased">Deceased</option>
									<option value="stolen">Stolen</option>
									<option value="lost">Lost</option>
									<option value="sold">Sold</option>				

								<?php } elseif(set_value("status") == "deceased") {?>
									
									<option value="active">Active</option>
									<option value="deceased" selected>Deceased</option>
									<option value="stolen">Stolen</option>
									<option value="lost">Lost</option>
									<option value="sold">Sold</option>				


								<?php } elseif(set_value("status") == "stolen") {?>
									
									<option value="active">Active</option>
									<option value="deceased">Deceased</option>
									<option value="stolen" selected>Stolen</option>
									<option value="lost">Lost</option>	
									<option value="sold">Sold</option>				

								<?php } elseif(set_value("status") == "lost") {?>

									<option value="active">Active</option>
									<option value="deceased">Deceased</option>
									<option value="stolen">Stolen</option>
									<option value="lost" selected>Lost</option>				
									<option value="sold">Sold</option>				

								<?php } else {?>

									<option value="active">Active</option>
									<option value="deceased">Deceased</option>
									<option value="stolen">Stolen</option>
									<option value="lost">Lost</option>
									<option value="sold" selected>Sold</option>
								<?php }?>

							</select>
							
							<?= (form_error('gender')	!= "" ? form_error('gender') : ''); ?>	
						</div>
					</div-->

					<div class="form-row p-1">
						<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Is castrated ? <span class="text-danger">*</span></label>
						
						<div class="col mt-2">
							<?php if($row->is_castrated == "Yes") {?>
							
								<input type="checkbox" name="is_castrated" value="" class="custom-checkbox" id="is_castrated" checked>

							<?php } else if($row->gender == "male"){?>
							
								<input type="checkbox" name="is_castrated" value="" class="custom-checkbox" id="is_castrated" >
							
							<?php } else {?>	
								
								<input type="checkbox" name="is_castrated" value="" class="custom-checkbox" id="is_castrated" disabled>

							<?php } ?>
							<?= (form_error('is_castrated')	!= "" ? form_error('is_castrated') : ''); ?>	
						</div>
					</div>
					
					
					<div class="form-row mt-3">
						<a href="javascript:void(0);" class="btn btn-danger col col-md-3 offset-md-5" onclick="js_button();">Cancel</a>

						<input type="submit" class="btn btn-primary col col-md-3 offset-md-1" name="submit" value="Save" id="btn-msubmit"/>
					</div>
					
					<?= form_close(); ?>

					<?php
						}
					?>	
					
				</div>
			</div>
		</div>
	</div>
</div>

