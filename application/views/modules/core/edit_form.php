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
						<div class="col">
							<h4>Modify Goat Records</h4>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<section>
								<?php foreach($goat_record as $row) { ?>
								<div class="container-fluid">
									<?= form_open("", array("id" => "goats_form", "style" => "", "class" => "p-3 p-md-5","onload"=>"", "onsubmit"=>"check_form(this); return confirm_request(this)",)); ?>

									<div class="form-row p-1">
										<input type="hidden" name="recent_category" id="rcategory" value="<?= $row->category ?>" />
										<input type="hidden" name="ref_id" id="ref_id" value="<?= $row->ref_id ?>" />
									</div>
									
									<div class="form-row p-1">
										
										<div class="col-12 col-lg-6">
											<div class="row px-0">
												<label class="col-form-label-sm col-12 col-sm-4 col-md-2 col-lg-4">Tag ID <span class="text-danger">*</span></label>

												<div class="col col-sm-8 col-md-10 col-lg-8">
													<input type="text" name="eartag_id" value="<?= str_pad(set_value('eartag_id', $row->eartag_id), 6, "0", STR_PAD_LEFT);?>" placeholder="Eartag ID" class="form-control my-2 my-md-0" readonly>
														
													<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>	
												</div>
											</div>
										</div>

										<div class="col-12 col-lg-6 pt-2 pb-1 py-lg-0">
											<div class="row px-0">
												<label class="col-form-label-sm col-12 col-sm-4 col-md-2 col-lg-4 text-lg-center">Tag Color <span class="text-danger">*</span></label>
													
												<div class="col col-sm-8 col-md-10 col-lg-8" id="color-tag">
													<select class="form-control" id="color-select" name="eartag_color">
													<?php if($row->eartag_color == 'blue') { ?>

														<option value="">-- Choose color --</option>
														<option value="blue" selected="">
															Blue
														</option>
														<option value="green">
															Green
														</option>
														<option value="orange">
															Orange
														</option>
														<option value="yellow">
															Yellow
														</option>

													<?php } else if($row->eartag_color == 'green') { ?>

														<option value="">-- Choose color --</option>
														<option value="blue">
															Blue
														</option>
														<option value="green" selected="">
															Green
														</option>
														<option value="orange">
															Orange
														</option>
														<option value="yellow">
															Yellow
														</option>

													<?php } else if($row->eartag_color == 'orange') { ?>

														<option value="">-- Choose color --</option>
														<option value="blue">
															Blue
														</option>
														<option value="green">
															Green
														</option>
														<option value="orange" selected="">
															Orange
														</option>
														<option value="yellow">
															Yellow
														</option>

													<?php } else if($row->eartag_color == 'yellow') {?>

														<option value="">-- Choose color --</option>
														<option value="blue">
															Blue
														</option>
														<option value="green">
															Green
														</option>
														<option value="orange">
															Orange
														</option>
														<option value="yellow" selected="">
															Yellow
														</option>

													<?php } else {?>

														<option value="">-- Choose color --</option>
														<option value="blue">
															Blue
														</option>
														<option value="green">
															Green
														</option>
														<option value="orange">
															Orange
														</option>
														<option value="yellow">
															Yellow
														</option>
	
													<?php } ?>
													</select>

													<?= (form_error('eartag_color')	!= "" ? form_error('eartag_color') : ''); ?>	

												</div>
											</div>
										</div>
									</div>

									<div class="form-row p-1">
										
										<div class="col">
											<div class="row px-0">
												<label class="col-form-label-sm col-12 col-sm-4 col-md-2 col-lg-2">Nickname <span class="text-danger">*</span></label>
														
												<div class="col px-3">
													<input type="text" name="nickname" value="<?= set_value("nickname",$row->nickname); ?>" placeholder="Nickname" class="form-control" >
														
													<?= (form_error('nickname')	!= "" ? form_error('nickname') : ''); ?>	
												</div>
											</div>
										</div>

									</div>
				
									<div class="form-row p-1">
										<div class="col">
											<div class="row px-0">

												<label class="col-form-label-sm col-12 col-sm-4 col-md-2 col-lg-2">Gender <span class="text-danger">*</span></label>
											
												<div class="col">
													<select name="gender" class="custom-select" id="gender" onchange="select_gender(this);" data-role="tagsinput">
														<option value="" >- Select a Gender -</option>
														<?php if(set_value("gender", $row->gender) == "male") {?>

															<option value="male" selected>Male</option>
															<option value="female">Female</option>

														<?php } elseif(set_value("gender", $row->gender) == "female") {?>

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
										</div>

									</div>

									<div class="form-row p-1">

										<div class="col">
											<div class="row px-0">
												<label class="col-form-label-sm col-12 col-sm-4 col-md-2 col-lg-2">Body Color <span class="text-danger">*</span></label>
															
												<div class="col">
													<select name="body_color" id="body_color_select" class="form-control" placeholder="- Enter Body Color -" value="<?= set_value('body_color', $row->body_color); ?>" >

														<option value="Brown">Brown</option>    
														<option value="White">White</option>           
													</select>
																
													<?= (form_error('body_color')	!= "" ? form_error('body_color') : ''); ?>	
												</div>
											</div>
										</div>

									</div>
				
	
									<fieldset >
										<div class="form-row p-1">
											<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Birth Date <span class="text-danger">*</span></label>

											<div class="col">
												<input type="date" name="birth_date" value="<?= set_value('birth_date', $row->acquire_date);?>" placeholder="Date of Birth" class="form-control" onchange="check_date_format(this);"  >
									
												<span id="date_checker"><?= (form_error('birth_date')	!= "" ? form_error('birth_date') : ''); ?></span>	
											</div>
										</div>

										<div class="form-row p-1 pt-3 ">
											<label class="col-form-label-sm col-12 col-sm-4 col-md-2 col-lg-2">Category <span class="text-danger">*</span></label>
											<div class="col">
												<div class="row mt-2">
													<div class="col-12 col-sm-6 col-md-3"><label><input type="radio" name="category" value="purchase" id="category" required="" <?= $row->category == 'purchase' ? 'checked' : '' ?> >&emsp;By Purchase</label></div>

													<div class="col-12 col-sm-6 col-md-3"><label><input type="radio" name="category" value="birth" id="category" required="" <?= $row->category == 'birth' ? 'checked' : '' ?> >&emsp;By Birth</label></div>
												</div>
											</div>
										</div>

										

										<div class="form-row p-1 birth-elem">
											<label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Dam ID <span class="text-danger">*</span></label>
														
											<div class="col">
												<select name="dam_id" id="dam_id_select" class="form-control" placeholder="- Enter Dam ID -" value="<?= set_value('dam_id', str_pad($row->dam_id, 6, "0", STR_PAD_LEFT)); ?>" onchange="eartag_checker()">

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
										
												<select name="sire_id" id="sire_id_select" class="form-control" placeholder="- Enter Sire ID -" value="<?= set_value('sire_id', str_pad($sire_id, 6, "0", STR_PAD_LEFT));?>" onchange="eartag_checker()" >

													<?php foreach($sire_record as $row){ ?>
														<option value="<?= $row->eartag_id; ?>"><?= str_pad($row->eartag_id, 6, "0", STR_PAD_LEFT); ?></option>
													<?php } ?>                                	
												</select>
															
												<?= (form_error('sire_id')	!= "" ? form_error('sire_id') : ''); ?>	
											</div>
										</div>

									<!-- Purchase  -->

										<div class="form-row p-1 purchase-elem">
											<label class="col-form-label-sm col-4 col-sm-3 col-md-2 col-lg-2">Purchase Date <span class="text-danger">*</span></label>
														
											<div class="col">
									
												<input type="date" name="purchase_date" value="<?= set_value('purchase_date', $row->acquire_date); ?>" placeholder="Date of Purchase" class="form-control" onchange="check_date_format(this);" >
															
												<span id="date_checker"><?= (form_error('purchase_date') != "" ? form_error('purchase_date') : ''); ?></span>
											</div>
										</div>

										<div class="form-row p-1 purchase-elem">
											<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Purchase Weight <span class="text-danger">*</span></label>
														
											<div class="col-8 col-sm-8 col-md-4">
												<input type="text" name="purchase_weight" value="<?= set_value('purchase_weight', $row->purchase_weight); ?>" placeholder="Enter weight in kilo" class="form-control" >

												<?= (form_error('purchase_weight')	!= "" ? form_error('purchase_weight') : ''); ?>		

											</div>

											<label class="col-form-label-sm col-4 col-sm-4 col-md-2">Price per Kilo<span class="text-danger">*</span></label>
														
											<div class="col-8 col-sm-8 col-md-4">
												<input type="text" name="purchase_price" value="<?= set_value("purchase_price", $row->purchase_price); ?>" placeholder="Purchase Price" class="form-control">

												<?= (form_error('purchase_price')	!= "" ? form_error('purchase_price') : ''); ?>		
											</div>

										</div>

										<div class="form-row p-1 purchase-elem">
											<label class="col-form-label-sm col-4 col-sm-3 col-md-2 col-lg-2">Purchase From <span class="text-danger">*</span></label>
											
											<div class="col">
												<select name="purchase_from" id="client_select" class="form-control" placeholder="- Vendor -" value="<?= set_value('purchase_from', ucfirst($row->purchase_from)) ?>" >
													<option value=""></option>           
												</select>

												<?= (form_error('purchase_from')	!= "" ? form_error('purchase_from') : ''); ?>		
											</div>

										</div>

									</fieldset>

									<div class="form-row p-1">
										<label class="col-form-label-sm col-6 col-sm-4 col-md-2 col-lg-2">Is castrated ? <span class="text-danger">*</span></label>
													
										<div class="col mt-2">
											<input type="checkbox" name="is_castrated" value="" class="custom-checkbox" id="is_castrated" disabled="" <?= $row->is_castrated === "Yes" ? "checked" : ''?> >
														
											<?= (form_error('is_castrated')	!= "" ? form_error('is_castrated') : ''); ?>	
										</div>
									</div>

									<div class="form-row mt-3">
										<button type="submit" class="font-weight-bolder btn btn-primary col-md-3 offset-md-9" name="submit" id="update_btn">Save Changes</button>
										<!--input type="submit" class="btn btn-primary col col-md-3 offset-md-9" name="submit" value="Save" id="update_btn"/=-->
									</div>

									<?= form_close(); ?>
								</div>
								<?php } ?>
							</section>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

