// on page scroll animations js
$(window).on('load',function() {
	$('.loader-wrapper').fadeOut('slow');
	$(function() {
		var observer = new IntersectionObserver(function(entries) {
			entries.forEach(function(e) {
				if (!e.isIntersecting) return;
				e.target.classList.add('move'); // 交差した時の処理
				observer.unobserve(e.target);
				// target element:
				//   e.target				ターゲット
				//   e.isIntersecting		交差しているかどうか
				//   e.intersectionRatio	交差している領域の割合
				//   e.intersectionRect		交差領域のgetBoundingClientRect()
				//   e.boundingClientRect	ターゲットのgetBoundingClientRect()
				//   e.rootBounds			ルートのgetBoundingClientRect()
				//   e.time					変更が起こったタイムスタンプ
			})
		},{
			// オプション設定
			rootMargin: '0px 0px -5% 0px' //下端から5%入ったところで発火
			//threshold: [0, 0.5, 1.0]
		});
		var target = document.querySelectorAll('.io'); //監視したい要素をNodeListで取得
		for(var i = 0; i < target.length; i++ ) {
			observer.observe(target[i]); // 要素の監視を開始
		}
		//アニメーションによる各要素のはみ出しを解消
		$("body").wrapInner("<div style='overflow:hidden;'></div>");
		// $("#id_selectbox").on("change", function() {
		// 	$(this).removeClass("holder_col").addClass("active_col");
		// });
	});
	(function(d) {
		var config = {
			kitId: 'xwv2rte',
			scriptTimeout: 3000,
			async: true
		},
		h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	})(document);
});

$(document).ready(function(){
	// navbar toggle js
	$('.navbar_toggler').click(function(){
		$('body').toggleClass('no_scroll');
		$(this).toggleClass('open_menu');
		$(this).next("nav").toggleClass('navbar_animate');
	});

	// got to page top js
	// $(window).on('load scroll',function(){
	// 	var	windowTop = $(window).scrollTop();
	// 	if(windowTop > 600) {
	// 		$('.pagetop').fadeIn();
	// 	} else {
	// 		$('.pagetop').fadeOut();
	// 	}
	// });
	// $('.pagetop').on('click', function (event) {
	// 	event.preventDefault();
	// 	$('body,html').animate({
	// 		scrollTop: 0,
	// 	}, 800);
	// });

	// news slider slider JS
	$('.news_slider_slider').slick({
		dots: false,
		arrows: false,
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		centerMode: true,
		centerPadding: '300px',
		autoplay: true,
		speed: 5500,
		autoplaySpeed: 0,
		cssEase: 'linear',
		pauseOnHover: false,
		responsive: [
		{
			breakpoint: 1230,
			settings: {
				centerPadding: '250px',
			}
		},
		{
			breakpoint: 1167,
			settings: {
				centerPadding: '0',
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 901,
			settings: {
				centerPadding: '0',
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 676,
			settings: {
				centerPadding: '0',
				slidesToShow: 1,
			}
		}
		]
	});

	// news slider slider center JS
	$('.news_slider_slider_center').slick({
		dots: false,
		arrows: false,
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		centerMode: true,
		centerPadding: '100px',
		autoplay: true,
		autoplaySpeed: 0,
		speed: 5000,
		cssEase: 'linear',
		rtl: true,
		pauseOnHover: false,
		pauseOnHover: false,
		responsive: [
		{
			breakpoint: 1230,
			settings: {
				centerPadding: '50px',
			}
		},
		{
			breakpoint: 1167,
			settings: {
				centerPadding: '0px',
			}
		},
		{
			breakpoint: 901,
			settings: {
				centerPadding: '0',
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 676,
			settings: {
				centerPadding: '0',
				slidesToShow: 1,
			}
		}
		]
	});


	// form list tab title JS
	$('.form_list_tab_title ul li a').click(function(){
		$('.form_list_tab_title ul li a').removeClass('active_tab');
		$(this).addClass('active_tab');
		var tagid = $(this).data('tag');
		$('.form_list_tab_content .form_tab_content').removeClass('tab_content_active').hide();
		$('#'+tagid).addClass('tab_content_active').show();
	});

	// faq content JS
	$(".faq_content").accordion({
		heightStyle: "content",
		collapsible: true
	});

	// responsive Tabs JS
	$('.services_tabs').responsiveTabs({
		startCollapsed: 'accordion',
		animation: 'fade',
		activate: function(event, tab){
			$(tab.selector).find('.service_talent_slide').slick({
				infinite: false,
				// adaptiveHeight: true,
				prevArrow: '<button type="button" class="slick-arrow slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
				nextArrow: '<button type="button" class="slick-arrow slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>'
			});
			$(tab.selector).find('.inner-slide').slick({
				infinite: true,
				slidesToShow: 3,
				arrows: false,
				autoplay: true,
				autoplaySpeed: 3000,
				cssEase: 'ease-in-out',
				draggable: false
			});
			$(tab.selector).find('.service_slide_handler').each(function(index){
				// $(this).attr('data-slide-index', index);
			});
			$('.service_slide_handler').click(function(){
				var currSliderIndex = $(this).attr('data-slide-index');
				$(tab.selector).find('.service_talent_slide').slick('slickGoTo', currSliderIndex);
				$('body,html').animate({
					scrollTop: $(tab.selector).find('.service_talent_slide').offset().top,
				}, 800);
			});
		}
	});

	setTimeout(function(){
		var triggerEl = $('.active_tab_on_load').prev('.r-tabs-accordion-title').find('.r-tabs-anchor')
		triggerEl.trigger('click');
	},100);

	//buttons not by <a>tag
	$('.js_button').click(function() {
		console.log("hello");
		if($(this).attr('data-href')) {
			if($(this).attr('data-target')) {
				window.open($(this).attr('data-href'), '_blank');
			}
			else {
				location.href = $(this).attr('data-href');
			}
			
		}
	});
});