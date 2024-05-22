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

$('#gototop'). click(function() {
	$('html, body'). animate({
		scrollTop: 0
	}, 1000);
});

$(document).on('click','#gototop',function(){
    // document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});
function scrollFunc() {
    if (document.documentElement.scrollTop > 300) {
        document.getElementById("gototop").style.display = "flex";
    }else {
        document.getElementById("gototop").style.display = "none";
    }
}
window.onscroll = function() {scrollFunc()};