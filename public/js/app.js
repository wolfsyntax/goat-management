	
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

	
});