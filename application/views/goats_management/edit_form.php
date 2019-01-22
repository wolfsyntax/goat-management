<div class = "container-fluid mt-5 pb-2" style="margin-bottom: 80px;">
	<div class="row mt-2 mt-md-5 mb-5 pr-5">
		<div class="col p-2 p-md-0 ">
			<div class="card shadow-none">
				<div class="card-header card-ubuntu">
					<h3>Modify Goats Record</h3>
				</div>
				<div class="card-body p-2">
					<?php foreach($goat_record as $row) { ?>
						
					<?= form_open(base_url()."manage/edit", array("id" => "mgoat_form", "style" => "", "class" => "p-3 p-md-5","onload"=>"", "onsubmit" => "")); ?>
						<div class="form-row p-1">
							<input type="hidden" name="recent_category" id="rcategory" value="<?= $row->category ?>" />
							<input type="hidden" name="ref_id" id="ref_id" value="<?= $row->ref_id ?>" />
						</div>
						<div class="form-row p-1">
							<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Tag ID <span class="text-danger">*</span></label>								
							
							<div class="col-8 col-sm-8 col-md-4">
								<input type="text" name="eartag_id" placeholder="Tag ID"  class="form-control" value="<?= set_value('eartag_id', $row->eartag_id);?>" id="eartag_id" onchange="" oninput="eartag_checker()">
								
								<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>	
							</div>

							<label class="col-form-label-sm col-4 col-sm-4 col-md-1">Tag Color <span class="text-danger">*</span></label>								
							<div class="col">
								<div class="row px-3">
									<div class="dropdown col">
										<div class="row">
											<a class="nav-link form-control text-muted" href="#" id="eartag_palette" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
												<i class="fas fa-palette fa-lg"></i>&emsp;-- Please Select --
											</a>
											<div class="dropdown-menu col" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" onclick="choose_color('Green')"><!--i class="fas fa-box" style="color: green"></i--><span class="badge" style="background-color: green; width: 120px">&emsp;</span>&emsp;Green</a>
												<a class="dropdown-item" onclick="choose_color('Yellow')"><!--i class="fas fa-box" style="color: yellow"></i--><span class="badge" style="background-color: yellow; width: 120px">&emsp;</span>&emsp;Yellow</a>
												<a class="dropdown-item" onclick="choose_color('Orange')"><!--i class="fas fa-box" style="color: orange"></i--><span class="badge" style="background-color: orange; width: 120px">&emsp;</span>&emsp;Orange</a>
												<a class="dropdown-item" onclick="choose_color('Blue')"><!--i class="fas fa-box" style="color: blue"></i--><span class="badge" style="background-color: blue; width: 120px">&emsp;</span>&emsp;Blue</a>							
											</div>					
										</div>

									</div>
									<input type="hidden" name="eartag_color" id="eartag_colorx">

								</div>	                        			
								<?= (form_error('eartag_color')	!= "" ? form_error('eartag_color') : ''); ?>	

							</div>
						</div>
						
						<div class="form-row p-1">
							<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Gender <span class="text-danger">*</span></label>
							<div class="col">
								<select name="gender" class="custom-select" id="gender" onchange="select_gender(this);">
									<option value="" >- Select a Gender -</option>
									<?php if(set_value("gender") == "male" or $row->gender == "male") {?>
										<option value="male" selected>Male</option>
										<option value="female">Female</option>
									<?php } elseif(set_value("gender") == "female" or $row->gender == "female") {?>
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
								<select name="body_color" id="body_color_select" class="form-control" placeholder="- Enter Body Color -" value="<?= ucfirst(set_value('body_color', $row->body_color)) ?>">

									<option value="Brown">Brown</option>           
								</select>
								
								<?= (form_error('body_color')	!= "" ? form_error('body_color') : ''); ?>	
							</div>

						</div>
						
						
						<fieldset >
							<div class="form-row p-1 pt-3 ">
								<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Category <span class="text-danger">*</span></label>
								<div class="col">
									<div class="row">
										<div class="col-3"><label><input type="radio" name="category" value="purchase" <?= $row->category == "purchase" ? "checked" : ''?> >&emsp;By Purchase</label></div>
										<div class="col-3"><label><input type="radio" name="category" value="birth" <?= $row->category == "birth" ? "checked" : ''?> >&emsp;By Birth</label></div>
									</div>
								</div>
							</div>

<!-- PURCHASE -->
							<div class="form-row p-1 purchase-elem">
								<label class="col-form-label-sm col-4 col-sm-3 col-md-2 col-lg-2">Purchase Date <span class="text-danger">*</span></label>
								
								<div class="col">
									<input type="date" name="purchase_date" value="<?= set_value('purchase_date',$row->acquire_date) ?>" placeholder="Date of Purchase" class="form-control" onchange="check_date_format(this);" >
									
									<span id="date_checker"><?= (form_error('purchase_date') != "" ? form_error('purchase_date') : ''); ?></span>
								</div>
							</div>

							<div class="form-row p-1 purchase-elem">

								<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Purchase From <span class="text-danger">*</span></label>
								
								<div class="col-8 col-sm-8 col-md-10">
									<!--select name="purchase_from" id="client_select" class="form-control" placeholder="- Vendor -" value="<?= set_value('purchase_from') ? set_value('purchase_from') : ucfirst($row->purchase_from) ?>">

										<option value=""></option>           
									</select-->
									<input type="text" value="<?= set_value('purchase_from', ucfirst($row->purchase_from)) ?>" id="" name="purchase_from" placeholder="Vendor" class="form-control">

									<?= (form_error('purchase_from')	!= "" ? form_error('purchase_from') : ''); ?>		
								</div>
							</div>

							<div class="form-row p-1 purchase-elem">
								
								<label class="col-form-label-sm col-4 col-sm-3 col-md-2 col-lg-2">Purchase Weight <span class="text-danger">*</span></label>
								
								<div class="col">
									<input type="text" name="purchase_weight" value="<?= set_value('purchase_weight', $row->purchase_weight); ?>" placeholder="Enter weight in kilo" class="form-control" >
									<?= (form_error('purchase_weight')	!= "" ? form_error('purchase_weight') : ''); ?>		
								</div>

								<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Price per  Kilo<span class="text-danger">*</span></label>
								
								<div class="col-8 col-sm-8 col-md-4">
									<input type="text" name="purchase_price" value="<?= set_value('purchase_price',$row->purchase_price); ?>" placeholder="Purchase Price" class="form-control">

									<?= (form_error('purchase_price')	!= "" ? form_error('purchase_price') : ''); ?>		
								</div>
							</div>
<!--END OF PURCHASE ELEMENTS -->

<!-- BIRTH -->

							<div class="form-row p-1 birth-elem">
								<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Birth Date <span class="text-danger">*</span></label>
								
								<div class="col-4 col-sm-4 col-md-10 col-lg-10">
									<input type="date" name="birth_date" value="<?= set_value('birth_date', $row->acquire_date) ?>" placeholder="Date of Birth" class="form-control" onchange="check_date_format(this);" >
									<span id="date_checker"><?= (form_error('birth_date')	!= "" ? form_error('birth_date') : ''); ?></span>	
								</div>
							</div>

							<div class="form-row p-1 birth-elem">
								<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Dam ID <span class="text-danger">*</span></label>
								
								<div class="col">
									<select name="dam_id" id="dam_id_select" class="form-control" placeholder="- Enter Dam ID -" value="<?= set_value('dam_id', $row->dam_id) ?>" onchange="eartag_checker();" oninput="eartag_checker()" >

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
									<select name="sire_id" id="sire_id_select" class="form-control" placeholder="- Enter Sire ID -" value="<?= set_value('sire_id', $sire_id) ?>" onchange="eartag_checker()" oninput="eartag_checker()" >

									<?php foreach($sire_record as $row){ ?>
										<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
									<?php } ?>           
									</select>
									
									<?= (form_error('sire_id')	!= "" ? form_error('sire_id') : ''); ?>	

								</div>
							</div>
<!--END OF BIRTH ELEMENTS -->

						</fieldset>

						<div class="form-row p-1">
							<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Is castrated ? <span class="text-danger">*</span></label>
							
							<div class="col mt-2">
								<input type="checkbox" name="is_castrated" value="" class="custom-checkbox" id="is_castrated" disabled="" <?= $row->is_castrated === "Yes" ? "checked" : ''?> >
								
								<?= (form_error('is_castrated')	!= "" ? form_error('is_castrated') : ''); ?>	
							</div>
						</div>

						<div class="form-row mt-3">
							<input type="submit" class="btn btn-primary col col-md-3 offset-md-9" name="submit" value="Save" id="update_btn"/>
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

