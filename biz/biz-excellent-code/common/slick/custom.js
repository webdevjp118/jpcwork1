jQuery(document).ready(function() {

/*----------------------------------------------------*/
/*	slick-slider
/*----------------------------------------------------*/
	$('.slick-class01').slick({
	
		arrows:true,//矢印
		infinite: true,//無限
		autoplay:true,//自動再生
		autoplaySpeed: 5000,//秒数
		slidesToShow: 4,//4個だけ表示
		slidesToScroll: 1,//一個だけスクロール
		responsive: [{
               breakpoint: 650,
                    settings: {
                         slidesToShow: 1,
                         slidesToScroll: 1,
               }
          },{
               breakpoint: 480,
                    settings: {
                         slidesToShow: 1,
                         slidesToScroll: 1,
                    }
               }
          ]
	});
	
	
	$('.slick-class02').slick({
	
		arrows:true,//矢印
          dots:true,
		infinite: true,//無限
		autoplay:true,//自動再生
		autoplaySpeed: 5000,//秒数
		slidesToShow: 5,//一個だけ表示
		slidesToScroll: 2,//一個だけスクロール
          appendArrows: $('.pick-arrows'),
          appendDots: $('.pick-dots'),
		responsive: [{
               breakpoint: 650,
                    settings: {
                         slidesToShow: 1,
                         slidesToScroll: 1,
               }
          },{
               breakpoint: 480,
                    settings: {
                         slidesToShow: 1,
                         slidesToScroll: 1,
                    }
               }
          ]
	});

	$('.slick-class03').slick({
	
		arrows:true,//矢印
          dots:true,
          infinite: true,//無限
          autoplay:true,//自動再生
          autoplaySpeed: 5000,//秒数
          slidesToShow: 5,//一個だけ表示
          slidesToScroll: 2,//一個だけスクロール
          appendArrows: $('.new-arrows'),
          appendDots: $('.new-dots'),
          responsive: [{
               breakpoint: 650,
                    settings: {
                         slidesToShow: 1,
                         slidesToScroll: 1,
               }
          },{
               breakpoint: 480,
                    settings: {
                         slidesToShow: 1,
                         slidesToScroll: 1,
                    }
               }
          ]
	});

/*  end   */
});