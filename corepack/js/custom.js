$(window).on('load',function() {
    $('.loader-wrapper').fadeOut('slow');
});
$(document).ready(function(){
    $('.navbar_toggler').click(function(){
        $('body').toggleClass('no_scroll');
        $(this).toggleClass('open_menu');
        $(this).next("nav").toggleClass('navbar_animate');
    });
    $(window).on("load resize", function(){
        var windowWidth = $(window).width();
        if (windowWidth > 1024) {
            $('body').removeClass('no_scroll');
            $(".navbar_toggler").removeClass('open_menu');
            $(".navbar_toggler").next("nav").removeClass('navbar_animate');
        }
    });
});