
function set_prescription(e){
	alert(e.value);
	$("#prescription").val(e.value);
	//alert("Prescribe: "+ x);
}


 $('#color-select').on('change',function(){
 	
 	var color = $(this).val();
 	
 	if(color == 'blue'){

 		$(this).css('background-color','#0000FF');
 		$(this).css('color','#fff');

 	} else if(color == 'yellow') {

 		$(this).css('background','#FFFF00');
 		$(this).css('color','#fff');

 	} else if(color == 'orange') {

 		$(this).css('background','#FFA500');
 		$(this).css('color','#fff');

 	} else if(color == 'green'){

 		$(this).css('background','#008000');
 		$(this).css('color','#FFF');

 	}else {

 		$(this).css('background','#fff');
 		$(this).css('color','#000');
// 		$(this).html('<i class="fa fa-check-circle"></i>');


 	}

});

function show_ctype(e){
	//alert(e.value);
	if(e.value == ""){
		$(".med_vaccine").hide();
		$(".med_supplement").hide();
		$(".item_info").removeClass("d-none").addClass("d-none");
	}else{
		$(".item_info").removeClass("d-none");
		$(".item_info").show();
		if(e.value == 'supplementation'){

			$(".med_vaccine").hide();
			$(".med_supplement").show();

		} else {

			$(".med_vaccine").show();
			$(".med_supplement").hide();

		}
	}
}

function proceed_healthCheck(e){
	
	//alert("Eartag ID: " + e.value);
	//var base_url = <?php echo json_encode(base_url()) ?>;
	alert("Proceeding...");
	if(e.value != ""){
	//	alert(base_url);	
		$("#redir_checkup").removeClass("disabled");
		alert("Current Value: " + e.value);
		var d = e.value;
		//location.replace("checkup/" + e.value + "/new");
		var eartag_id = d.substring(0, d.indexOf(" "));
		alert(eartag_id);
		$("#redir_checkup").attr("href", base_url + "checkup/" + eartag_id + "/new");

	} else {

		$("#redir_checkup").removeClass("disabled").addClass("disabled");

	}
	
}

function inventoryCheck(inventory_id, def_val, min_val){
	//alert("Inventory (Default Value:"+def_val);

	var cur_url = base_url + "inventory/" + inventory_id + "/edit";
	
	$("#inventoryForm").attr("action",cur_url);
			
	document.getElementById("qtyIDT").min 		= min_val;
	document.getElementById("qtyIDT").value 	= min_val;
	document.getElementById("modItem").value 	= def_val;
	document.getElementById("hmodItem").value 	= def_val;
		
}

function change_icon(elem){
	
	var cname = $("#icon-toggler").attr("class");
			
	$("#icon-toggler").removeClass();
			
	if(cname == "fa fa-arrow-circle-right fa-lg text-white") {
		$("#icon-toggler").addClass("fa fa-arrow-circle-left fa-lg text-white");
	} else {
		$("#icon-toggler").addClass("fa fa-arrow-circle-right fa-lg text-white");
	}


}

function check_form(e){

	var elem_tag = "#" + e.submit.id;
	var msg = "<div class='spinner-border spinner-border-sm' role='status' aria-hidden='true'><span class='sr-only'>";
	var btn_text = "Please wait...";

	if(e.submit.id == "login_btn"){

		btn_text = "Signing in..." ;

	} else if(e.submit.id == "reg_submit") {

		btn_text = "Signing Up...";

	} else if(e.submit.id == "update_btn") {
  				
		btn_text = "Updating...";

	} else if(e.submit.id == "save_btn") {

		btn_text = "Saving...";

	}
	
//	alert('Result::'+btn_text);
	btn_text = msg + btn_text + "</span></div>&emsp;" + btn_text;
//	alert(btn_text);
	$(elem_tag).attr("disabled","disabled");
	$(elem_tag).html(btn_text);
//	$(elem_tag).val(btn_text);
//	$(elem_tag).addClass('spinner-border spinner-border-sm');

}

function pregcheck_form(act_id) {
	//alert("Activity ID: "+act_id);
	var cur_url = base_url + "breeding/" + act_id + "/update";

	$("#pregcheck_aform").attr("action",cur_url);
	e.preventDefault();

}


function checkInventoryValue(){

	var minx = document.getElementById("qtyIDT");

	if(parseInt($("#qtyIDT").val()) < parseInt(minx.min)){

		minx.value = parseInt(minx.min);
		alert("Inventory Value: "+minx.value);
		$("#update_btn").attr("disabled",true);
			
	} else {

		$("#update_btn").attr("disabled",false);

	}

}

function confirm_remove(obj){
	
}

function confirm_request(obj){

	

	var msg;

	//alert("URL:: " + obj.action);

	var href = "";
	var response = confirm("Are you sure to save this changes?");
	
	if (response == true) {
  		href = obj.action;
  		//msg = "You pressed OK!";
  		//alert("Confirm Request");
		//$("#"+obj.id).attr("action",href);	
		location.replace(href);
		return true;
	} else {
  	
  		//alert("Cancel Request");
		//href = $(location).attr("href");
		//href = javascript::void(0);
		//href= "";
		//alert("Requested URL: " + obj.action + "\nPrevious URL: " + window.location.href);
		//location.replace(href);
		
//		e.preventDefault();
		location.reload(true);	
		return false;
		
		
		//$("#"+obj.id).attr("action",location.href);
		//$("#"+obj.id).attr("action", window.location.href);
		//return FALSE;

		//e.preventDefault();

		//location.replace(href);
		//$("#"+obj.id).attr("action",href);	
    	//location.reload(true);
		

	}	

//	alert("Requested URL: " + obj.action + "\nPrevious URL: " + window.location.href);
	//$("#"+obj.id).attr("action",href);	

//	alert("URL: "+ , obj.action);
	

}