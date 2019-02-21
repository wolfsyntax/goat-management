
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
 		$(this).css('color','#000');

 	} else if(color == 'orange') {

 		$(this).css('background','#FFF500');
 		$(this).css('color','#000');

 	} else if(color == 'green'){

 		$(this).css('background','#008000');
 		$(this).css('color','#FFF');

 	}else {

 		$(this).css('background','transparent');
 		$(this).css('color','#000');

 	}

 });

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