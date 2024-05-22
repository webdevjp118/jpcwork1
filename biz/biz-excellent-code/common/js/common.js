
var select_text = false;

// ボタンロールオーバー用
function rollOver(){
    var preLoad = new Object();
    $('img.over,input.over').each(function(){
        var imgSrc = this.src;
        var fType = imgSrc.substring(imgSrc.lastIndexOf('.'));
        var imgName = imgSrc.substr(0, imgSrc.lastIndexOf('.'));
        var imgOver = imgName + '-on' + fType;
        preLoad[this.src] = new Image();
        preLoad[this.src].src = imgOver;
        $(this).hover(
            function (){
                this.src = imgOver;
            },
            function (){
                this.src = imgSrc;
            }
        );
    });
}
$(document).ready(rollOver);

$(function() {
	

	if(0 < $(".tab_head").size()){
		
		$('.tab_head li a').click(function(e) {
			e.preventDefault();
			var url = $(this).attr('href');

			$(".tab_content .wrap").hide();
			$(url).show();
			
			$('.tab_head li a').removeClass("active");
			$(this).addClass("active");
		});
		
	}

	if(0 < $(".search_page_head").size()){
		
		$('.search_page_head .tab ul li a').click(function(e) {
			e.preventDefault();
			var url = $(this).attr('href');

			$(".search_page_content .wrap").hide();
			$(url).show();
			
			$('.search_page_head .tab ul li a').removeClass("active");
			$(this).addClass("active");
		});
		
	}


});






