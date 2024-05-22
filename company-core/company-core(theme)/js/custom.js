$(".mobile-menu-icon-hp").click(function() {
	$(".menu-toggle-btn").toggleClass("open");
	$(this).toggleClass("open");
	if($(".menu-toggle-btn").hasClass("open") == true){
		$(".menu-text-hp").text("CLOSE");	
	}
	else
	{
		$(".menu-text-hp").text("MENU");	
	}
	$(".navigation").slideToggle();
	$(".overlay-mobile-menu-hp").fadeToggle();
});

AOS.init();
