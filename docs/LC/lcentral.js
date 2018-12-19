function initpage(){
	

	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'inline';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'none';
	
	
				 	
}


function numbersonly(myfield, e, dec) {
	var key;
	var keychar;
	
	if (window.event)
	   key = window.event.keyCode;
	else if (e)
	   key = e.which;
	else
	   return true;
	keychar = String.fromCharCode(key);
	
	// control keys
	if ((key==null) || (key==0) || (key==8) || 
	    (key==9) || (key==13) || (key==27) )
	   return true;

	// numbers
	else if ((("0123456789.").indexOf(keychar) > -1))
									   
	   return true;
		
		
	// decimal point jump
	else if (dec && (keychar == "."))
	   {
	   myfield.form.elements[dec].focus();
	   return false;
	   }
	else
	   return false;
	}


function eloadroutine() {	//LEFT SIDE BUTTON
	$("#finalproduct").val("");
	//document.getElementById(eloadbtn).style.backgroundColor='#ff6666';
	if($('#eloadgroup').hasClass('collapse')) {
		$('#eloadgroup').collapse('show');
	} 
	$('#callcardgroup').collapse('hide');
	
}

function SmartEloadRoutine(){		//TOP SIDE BUTTON

	
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	document.getElementById("SmartEP").style.display = 'inline';
	document.getElementById("GlobeEP").style.display = 'none';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'none';
	
	
	
	//$('#_SmartEP').selectpicker('toggle');
	
	  	$('#_SmartEP').selectpicker('val', '');
		$('#_GlobeEP').selectpicker('val', '');
		$('#_SunEP').selectpicker('val', '');
		//$('#_ABSEP').selectpicker('val', '');
		$('#_SmartCCP').selectpicker('val', '');
		$('#_GlobeCCP').selectpicker('val', '');
		$('#_GamesP').selectpicker('val', '');
		$('#_SatP').selectpicker('val', '');
		$('#_OtherP').selectpicker('val', '');
		$('#_PortalP').selectpicker('val', '');
		
		$(document).ready(function(){
		    setTimeout(function(){
		        //$("#_SmartEP").click().focus();;
		    		$('#_SmartEP').selectpicker('toggle');
		    },1);
		});

		
		$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
		$('#quantity').val("");
		$('#quantity').prop('disabled', true);
		//$("input").selectpicker().parent().find(".selected a").focus();
		//$(".selectpicker").selectpicker().parent().find("selected a").focus();
		//$('#_SmartEP').data('selectpicker').$button.focus();
		//$("#_SmartEP").selectpicker().data("selectpicker").$searchbox.focus();		
}


function GlobeEloadRoutine(){
	
	//document.getElementById(eloadbtn).style.backgroundColor='#ff6666';
		
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'inline';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'none';
	$("#finalproduct").val("");
    $('#_SmartEP').selectpicker('val', '');
    $('#_GlobeEP').selectpicker('val', '');
	$('#_SunEP').selectpicker('val', '');
	//$('#_ABSEP').selectpicker('val', '');
	$('#_SmartCCP').selectpicker('val', '');
	$('#_GlobeCCP').selectpicker('val', '');
	$('#_GamesP').selectpicker('val', '');
	$('#_SatP').selectpicker('val', '');
	$('#_OtherP').selectpicker('val', '');
	$('#_PortalP').selectpicker('val', '');

	$(document).ready(function(){
	    setTimeout(function(){
	    		$('#_GlobeEP').selectpicker('toggle');
	    },1);
	});
	
	
	$('#quantity').val("");
	$('#quantity').prop('disabled', true);
	
	
	
		
		
		
		
		
	
	
	
	
	
}

function SunEloadRoutine(){
	
	
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'none';
	document.getElementById("SunEP").style.display = 'inline';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'none';
	$("#finalproduct").val("");
    $('#_SmartEP').selectpicker('val', '');
	$('#_GlobeEP').selectpicker('val', '');
	$('#_SunEP').selectpicker('val', '');
	//$('#_ABSEP').selectpicker('val', '');
	$('#_SmartCCP').selectpicker('val', '');
	$('#_GlobeCCP').selectpicker('val', '');
	$('#_GamesP').selectpicker('val', '');
	$('#_SatP').selectpicker('val', '');
	$('#_OtherP').selectpicker('val', '');
	$('#_PortalP').selectpicker('val', '');
	$(document).ready(function(){
	    setTimeout(function(){
	       	$('#_SunEP').selectpicker('toggle');
	    	},1);
		});
 
	
	$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
	$('#quantity').val("");
	$('#quantity').prop('disabled', true);
}

function AbsCbnEloadRoutine(){
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'none';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'inline';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'none';
		$("#finalproduct").val("");
	    $('#_SmartEP').selectpicker('val', '');
		$('#_GlobeEP').selectpicker('val', '');
		$('#_SunEP').selectpicker('val', '');
		//$('#_ABSEP').selectpicker('val', '');
		$('#_SmartCCP').selectpicker('val', '');
		$('#_GlobeCCP').selectpicker('val', '');
		$('#_GamesP').selectpicker('val', '');
		$('#_SatP').selectpicker('val', '');
		$('#_OtherP').selectpicker('val', '');
		$('#_PortalP').selectpicker('val', '');
		$(document).ready(function(){
		    setTimeout(function(){
		    		$('#_ABSEP').selectpicker('toggle');
		    },1);
			});
	 
		
		$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
		$('#quantity').val("");
		$('#quantity').prop('disabled', true);
}

function SmartCallCardRoutine(){
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'none';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'inline';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'none';
	
	$('#_SmartEP').selectpicker('val', '');
	$('#_GlobeEP').selectpicker('val', '');
	$('#_SunEP').selectpicker('val', '');
	//$('#_ABSEP').selectpicker('val', '');
	$('#_SmartCCP').selectpicker('val', '');
	$('#_GlobeCCP').selectpicker('val', '');
	$('#_GamesP').selectpicker('val', '');
	$('#_SatP').selectpicker('val', '');
	$('#_OtherP').selectpicker('val', '');
	$('#_PortalP').selectpicker('val', '');
	
	$(document).ready(function(){
	    setTimeout(function(){
    		$('#_SmartCCP').selectpicker('toggle');
	    },1);
	});
	$("#finalproduct").val("");
	$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
	$('#quantity').val("");
	$('#quantity').prop('disabled', false);
}

function GlobeCallCardRoutine(){
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'none';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'inline';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'none';
	
	$('#_SmartEP').selectpicker('val', '');
	$('#_GlobeEP').selectpicker('val', '');
	$('#_SunEP').selectpicker('val', '');
	//$('#_ABSEP').selectpicker('val', '');
	$('#_SmartCCP').selectpicker('val', '');
	$('#_GlobeCCP').selectpicker('val', '');
	$('#_GamesP').selectpicker('val', '');
	$('#_SatP').selectpicker('val', '');
	$('#_OtherP').selectpicker('val', '');
	$('#_PortalP').selectpicker('val', '');
	$(document).ready(function(){
		    setTimeout(function(){
		    		$('#_GlobeCCP').selectpicker('toggle');
		    },1);
		});
	
	$("#finalproduct").val("");
	$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
	$('#quantity').val("");
	$('#quantity').prop('disabled', false);
}




function callcardroutine(){
	$("#genParam").prop('required',false);
	$('#genParamGroup').collapse('hide');
	$('#eloadgroup').addClass('collapse');
	$('#eloadgroup').collapse('hide');
	$('#callcardgroup').collapse('show');
	
	


}

function gamesroutine() {
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	$('#eloadgroup').addClass('collapse');
	$('#eloadgroup').collapse('hide');
	$('#callcardgroup').collapse('hide');
	
	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'none';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'inline';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'none';
	
	$('#_SmartEP').selectpicker('val', '');
	$('#_GlobeEP').selectpicker('val', '');
	$('#_SunEP').selectpicker('val', '');
	//$('#_ABSEP').selectpicker('val', '');
	$('#_SmartCCP').selectpicker('val', '');
	$('#_GlobeCCP').selectpicker('val', '');
	//$('#_GamesP').selectpicker('val', '');
	$('#_SatP').selectpicker('val', '');
	$('#_OtherP').selectpicker('val', '');
	$('#_PortalP').selectpicker('val', '');
	
	$("#finalproduct").val("");
	$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
	$('#quantity').val("");
	$('#quantity').prop('disabled', false);
}

function satroutine() {
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	$('#eloadgroup').addClass('collapse');
	$('#eloadgroup').collapse('hide');
	$('#callcardgroup').collapse('hide');
	
	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'none';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'inline';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'none';
	
	$('#_SmartEP').selectpicker('val', '');
	$('#_GlobeEP').selectpicker('val', '');
	$('#_SunEP').selectpicker('val', '');
	//$('#_ABSEP').selectpicker('val', '');
	$('#_SmartCCP').selectpicker('val', '');
	$('#_GlobeCCP').selectpicker('val', '');
	$('#_GamesP').selectpicker('val', '');
	//$('#_SatP').selectpicker('val', '');
	$('#_OtherP').selectpicker('val', '');
	$('#_PortalP').selectpicker('val', '');
	
	$("#finalproduct").val("");
	$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
	$('#quantity').val("");
	$('#quantity').prop('disabled', false);
}

function portalroutine() {
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	$('#eloadgroup').addClass('collapse');
	$('#eloadgroup').collapse('hide');
	$('#callcardgroup').collapse('hide');
	
	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'none';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'none';
	document.getElementById("PortalP").style.display = 'inline';
	
	$('#_SmartEP').selectpicker('val', '');
	$('#_GlobeEP').selectpicker('val', '');
	$('#_SunEP').selectpicker('val', '');
	//$('#_ABSEP').selectpicker('val', '');
	$('#_SmartCCP').selectpicker('val', '');
	$('#_GlobeCCP').selectpicker('val', '');
	$('#_GamesP').selectpicker('val', '');
	$('#_SatP').selectpicker('val', '');
	$('#_OtherP').selectpicker('val', '');
	//$('#_PortalP').selectpicker('val', '');
	
	$("#finalproduct").val("");
	$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
	$('#quantity').val("");
	$('#quantity').prop('disabled', false);
}

function othersroutine() {
	$('#genParamGroup').collapse('hide');
	$("#genParam").prop('required',false);
	$('#eloadgroup').addClass('collapse');
	$('#eloadgroup').collapse('hide');
	$('#callcardgroup').collapse('hide');
	
	document.getElementById("SmartEP").style.display = 'none';
	document.getElementById("GlobeEP").style.display = 'none';
	document.getElementById("SunEP").style.display = 'none';
	//document.getElementById("ABSEP").style.display = 'none';
	document.getElementById("SmartCCP").style.display = 'none';
	document.getElementById("GlobeCCP").style.display = 'none';
	document.getElementById("GamesP").style.display = 'none';
	document.getElementById("SatP").style.display = 'none';
	document.getElementById("OtherP").style.display = 'inline';
	document.getElementById("PortalP").style.display = 'none';
	
	$('#_SmartEP').selectpicker('val', '');
	$('#_GlobeEP').selectpicker('val', '');
	$('#_SunEP').selectpicker('val', '');
	//$('#_ABSEP').selectpicker('val', '');
	$('#_SmartCCP').selectpicker('val', '');
	$('#_GlobeCCP').selectpicker('val', '');
	$('#_GamesP').selectpicker('val', '');
	$('#_SatP').selectpicker('val', '');
	//$('#_OtherP').selectpicker('val', '');
	$('#_PortalP').selectpicker('val', '');
	
	$("#finalproduct").val("");
	$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
	$('#quantity').val("");
	$('#quantity').prop('disabled', false);
}












function setProductSE() {

	$('#genParamGroup').collapse('hide');
	var selected = $('#_SmartEP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	
	
	
	if(selected.substring(0,6) == "CIGNAL") {
		//SATELLITE AUTO TOPUP
		
		$("#buyernum").attr("placeholder", "Enter Cignal Account Number (6 - 9 digits)").val("").focus().blur();
		$('#buyernum').focus();
		
	}else if (selected.substring(0,3) == "PLP") {
		$("#buyernum").attr("placeholder", "Enter PLDT Telephone Number (63 + Area Code + 7 digit Tel. No.)").val("").focus().blur();
		$('#buyernum').focus();
	
	}else if (selected.substring(0,3) == "ILW") {
		$("#buyernum").attr("placeholder", "Enter Meralco Service ID Number (12 Digits)").val("").focus().blur();
		$('#buyernum').focus();
	
	}else{
		//REGULAR PRODUCT SELECTED
		$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
		$('#genParamGroup').collapse('hide');
		
		$("#genParam").attr("placeholder", "").val("");
		
		$("#buyernum").val("");
		$('#buyernum').focus();
	}
	
}
function setProductGE() {
	$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
	var selected = $('#_GlobeEP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	
	//console.log("Selected GMXVALUE="+selected); 
	
	if(selected == "GMXMAX" || selected == "TMXMAX" ) {
		//VARIABLE DENOM SELECTED
		//$(document).ready(function(){ 
		$('#genParamGroup').collapse('show');
		
		$("#genParam").attr("placeholder", "Enter AutoloadMax Load Value: 10 to 150").val("").focus().blur();
		$("#genParam").attr("maxlength", "3");
		$("#genParam").prop('required',true);
		$('#buyernum').focus();
			
		
	}else{
		//REGULAR PRODUCT SELECTED
		
		$('#genParamGroup').collapse('hide');
		$("#genParam").prop('required',false);
		$("#genParam").attr("placeholder", "").val("");
		
		$("#buyernum").attr("placeholder", "Buyer's Cellphone Number").val("");
		$('#buyernum').focus();
	}
	
	
	
	
	
}
function setProductSNE() {
	var selected = $('#_SunEP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	$('#buyernum').focus();
}
/*
function setProductAE() {
	var selected = $('#_ABSEP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	$('#buyernum').focus();
}*/
function setProductSC() {
	var selected = $('#_SmartCCP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	$('#buyernum').focus();
}
function setProductGC() {
	var selected = $('#_GlobeCCP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	$('#buyernum').focus();
}
function setProductGAC() {
	var selected = $('#_GamesP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	$('#buyernum').focus();
}
function setProductS() {
	var selected = $('#_SatP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	
	
	
	if(selected.substring(0,3) == "DRM") {
		//SATELLITE AUTO TOPUP
		//$(document).ready(function(){ 
		$('#genParamGroup').collapse('show');
		
		$("#genParam").attr("placeholder", "Enter Dream SmartCard Number").val("").focus().blur();
		$("#genParam").attr("maxlength", "20");
		//$("#genParam").prop('required',true);
		$('#genParam').focus();
			
		
	}else{
		//REGULAR PRODUCT SELECTED
		
		$('#genParamGroup').collapse('hide');
		
		$("#genParam").attr("placeholder", "").val("");
		
		$("#buyernum").val("");
		$('#buyernum').focus();
	}
	
	
	
	
}
function setProductO() {
	var selected = $('#_OtherP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	$('#buyernum').focus();
}
function setProductP() {
	var selected = $('#_PortalP').val();
	$("#finalproduct").val("");
	$("#finalproduct").val(selected);
	$('#buyernum').focus();
}

jQuery(document).ready(function($) {
	$(".product-button").click(function () {
	    $(".product-button").removeClass("active");
	    $(this).addClass("active");        
	});
	
	$(".eload-option").click(function () {
	    $(".eload-option").removeClass("active");
	    $(this).addClass("active");        
	});
	
	$(".callc-option").click(function () {
	    $(".callc-option").removeClass("active");
	    $(this).addClass("active");        
	});
});




function modalOnSearchDB(){
	$('table.searchdb-table').each(function() {
		var statusHidden = true;
		var lessForwardPage = 0;
	    var totalNopage = 0;
	    var numberOfPagetoShow = 5;//how many pages no. to show
	    var currentPageOld = 0;
	    var currentPage = 0;
	    var numPerPage = 3;//how many items in one page
	    var $table = $(this);
	    $table.bind('repaginate', function() {
	        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
	    });
	    $table.trigger('repaginate');
	    var numRows = $table.find('tbody tr').length;
	    var numPages = Math.ceil(numRows / numPerPage);
	    var $pager = $('<div class="page-btn"></div>');
	    var $previous = $('<span class="previous"><<</span>');
	    var $next = $('<span class="next">>></span>');
	    for (var page = 0; page < numPages; page++) {
	        $('<span class="page-number"></span>').text(page + 1).bind('click', {
	            newPage: page
	        }, function(event) {
	            currentPage = event.data['newPage'];
	            $table.trigger('repaginate');
	            $(this).addClass('active').siblings().removeClass('active');
	            statusHidden = $(this).is(':hidden');
	            $table.trigger('repaginatePageList');
	        }).appendTo($pager).addClass('clickable');
	    }
	    $pager.insertAfter($table).find('span.page-number:first').addClass('active');
	    $previous.insertBefore('span.page-number:first');
	    $next.insertAfter('span.page-number:last');
	    
	    $table.on('repaginate', function () {
	        $next.addClass('clickable');
	        $previous.addClass('clickable');
	        
	        setTimeout(function () {
	            var $active = $pager.find('.page-number.active');
	            if ($active.next('.page-number.clickable').length === 0) {
	                $next.removeClass('clickable');
	            } else if ($active.prev('.page-number.clickable').length === 0) {
	                $previous.removeClass('clickable');
	            }
	        });
	    });
	    $table.trigger('repaginate');
	    
	    $next.click(function (e) {
	        $previous.addClass('clickable');
	        $pager.find('.active').next('.page-number.clickable').click();
	    });
	    $previous.click(function (e) {
	        $next.addClass('clickable');
	        $pager.find('.active').prev('.page-number.clickable').click();
	    });
	    
	    $table.bind('repaginatePageList', function() {//show and hide other pages no or list;
	    	if(statusHidden){
	    		if(currentPageOld < currentPage){
		    		totalNopage++
	    		}else if(currentPageOld > currentPage){
	    			totalNopage = totalNopage - 1;
	    		}
	    	}
	    	
	    	console.log(currentPage+" "+totalNopage);
	    	$pager.find('.page-number.clickable').hide().slice(totalNopage * numberOfPagetoShow, (totalNopage + 1) * numberOfPagetoShow).show();
	    	currentPageOld = currentPage;
	    });
	    $table.trigger('repaginatePageList');
	    
	});
	
	
	$("#SearchDashboardModal").modal('show');
	
}