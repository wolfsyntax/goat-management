
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