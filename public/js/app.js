
$(document).ready(function(){

	//scroll to top
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});
		
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 1000);
		
		return false;
	});
	
/*	
	//Disable right-click on body
	$("body").on("contextmenu",function(e){
		return false;
	});

	//Disable right-click on div
	$("div").on("contextmenu",function(e){
		return false;
	});

	//Disable right-click on section
	$("section").on("contextmenu",function(e){
		return false;
	});
*/
	$(".card-menu").hover(
		function () {
			$(this).addClass("bg-dark text-white");
			$(this).find('.card-footer').addClass("bg-dark text-white");
			$(this).find('.icon').addClass("animated fadeInDown");
			$(this).find('p').addClass("animated fadeInUp");
		},
		
		function () {
			$(this).removeClass("bg-dark text-white");
			$(this).find('.card-footer').removeClass("bg-dark text-white");
			$(this).find('.icon').removeClass("animated fadeInDown");
			$(this).find('p').removeClass("animated fadeInUp");
		}
	);	



	$("#gp_record").DataTable();
	$("#gs_record").DataTable();
	
	//Editable Select tag		
	$("#dam_id_select").editableSelect();
	$("#sire_id_select").editableSelect();
	$("#s_id_select").editableSelect();
	$('#body_color_select').editableSelect();
	$('#tag_color_select').editableSelect();
	$('#goat_id_select').editableSelect();
	$('#client_select').editableSelect();		

	//Replace the Link with javascript:void(0) on sidebar menu
/*	$("#sidebar > li a.nav-link.sb-menu").each(function(){
				
		var self = $(this);
		var href = self.attr("href");

		self.attr("href","javascript:void(0);");

		self.click(function(){
			$("#ui_view").prop('src',href);
		});

	});
*/
	//Replace the Link with javascript:void(0) on table links
	$("a.btn-goat").each(function(){
				
	  	var self = $(this);
		var href = self.attr("href");

		self.attr("href","javascript:void(0);");

		self.click(function(){
			window.location.assign(href);
		});
	});

 	$("[data-dismiss='alert']").click(function(){ $(this).hide() });

	$('#gender').on('change', function() {
	
		if($(this).val() == 'male'){

			$("#is_castrated").prop("disabled",false);
			$("#goat_form").attr("action",cur_url);

		}else{

			$("#is_castrated").prop("checked",false);
			$("#is_castrated").prop("disabled",true);

		}

	});



	$('[name="category"]').on('change', function() {
			
		var x = this.value;

  		if(x != "" ){

  			$("#btn-submit").attr("disabled",false);
  			cur_url = base_url + "goat/r/" + x;				

			if(x == "purchase"){

				$(".birth-elem").hide();
				$(".purchase-elem").show();

			}else if(x == "birth"){

				$(".purchase-elem").hide();
				$(".birth-elem").show();				

			}else {

				$(".purchase-elem").hide();
				$(".birth-elem").hide();

				cur_url = base_url+"goat/new";	

			}
			
			$("#goat_form").attr("action",cur_url);

  		}else{
  				
  			$('.birth-elem').hide(); 
			$('.purchase-elem').hide();

  			$("#btn-submit").attr("disabled",true);
  	
  		}

	});	

	$('[name="category"]').on('change', function() {
			
		var x = this.value;
	
		$("#save_btn").attr("disabled",false);
  	
  		if(x != "" ){

			$("#save_submit").attr("disabled",false);
  			cur_url = base_url + "goat/r/" + x;				
				
			if(x == "purchase"){
					
				$(".mbirth-elem").hide();
				$(".mpurchase-elem").show();

			}else if(x == "birth"){

				$(".mpurchase-elem").hide();
				$(".mbirth-elem").show();				

			}else {

				$(".mpurchase-elem").hide();
				$(".mbirth-elem").hide();
				$("#save_btn").attr("disabled",true);
	
				cur_url = base_url+"goat/new";	

			}

			$("#goat_form").attr("action",cur_url);

  		} else {
  				
  			$('.birth-elem').hide(); 
			$('.purchase-elem').hide();

  			$("#btn-submit").attr("disabled",true);
  		}
  	});

	if($("#gender").val() == ""){
			
		$("#is_castrated").prop("checked",false);
		$("#is_castrated").prop("disabled",true);

	}else if($("#gender").val() == "male"){

		$("#is_castrated").prop("disabled",false);	
					
	}

	if($("#rcategory").val() == "birth" || $("#rcategory").val() == "birth"){

		$('.birth-elem').show(); 
		$('.purchase-elem').hide();

	}else if($("#rcategory").val() == "purchase" || $("#rcategory").val() == "purchase" ){

		$('.birth-elem').hide(); 
		$('.purchase-elem').show();
			
	}else {

		$('.birth-elem').hide(); 
		$('.purchase-elem').hide();

	}

	$("[name='checkup_type'").on('change', function(){

		var e = this.value; 

		if(e == "supplementation"){

			$('#med_supplement').show(); 
			$('#med_vaccine').hide();

		} else {

			$('#med_supplement').hide(); 
			$('#med_vaccine').show();

		}

	});

	if($("[name='checkup_type'").val() == ''){

		$('#med_supplement').hide(); 
		$('#med_vaccine').show();

	}

	$("a.btn-goat-rm").each(function(){
				
		var self = $(this);
		var href = self.attr("href");

		self.attr("href","javascript:void(0);");

		self.click(function(){

			if(confirm("Are you sure you want to delete this transaction?")){

				window.location.assign(href);
		  			
			}else{
		  			
				return false;
		  			
			}

		});

	});
	  		
	$("#ui_view").height($(window).height() - ($("body").height() - '20px'));
	
	$(function () {

		$('#ui_view').slimscroll({

			width : 'auto',
			height: '526px',
			opacity: 0.4,
			size: '1px',
			railOpacity: 0.1,
			railVisible: true,
			allowPageScroll: false,

		});

	});

	//Sidebar Menu Popover

  	$('[data-target="#assetManagement"]').popover({

  		placement: "right",
  		trigger: "focus",
  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-danger text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'

  	});
			
	$('[data-toggle="popover dashboard"]').popover({

  		placement: "right",
  		trigger: "focus",
  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-light text-dark"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'

  	});

	$('[data-toggle="popover transaction"]').popover({

  		placement: "right",
  		trigger: "focus",
  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-info text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'

  	});

	$('[data-toggle="popover manage"]').popover({

  		placement: "right",
  		trigger: "focus",
  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-dark text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'

  	});

	$('#sidebarCollapse').on('click', function () {

		$('#sidebar').toggleClass('active');
		$("#content").toggleClass('active');

	});

});