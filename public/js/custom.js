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