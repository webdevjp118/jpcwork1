// on page scroll animations js
$(window).on('load', function () {
	$('.loader-wrapper').fadeOut('slow');
	$(function () {
		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (e) {
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
		}, {
			// オプション設定
			rootMargin: '0px 0px -5% 0px' //下端から5%入ったところで発火
			//threshold: [0, 0.5, 1.0]
		});
		var target = document.querySelectorAll('.io'); //監視したい要素をNodeListで取得
		for (var i = 0; i < target.length; i++) {
			observer.observe(target[i]); // 要素の監視を開始
		}
		//アニメーションによる各要素のはみ出しを解消
		$("body").wrapInner("<div style='overflow:hidden;'></div>");
		// $("#id_selectbox").on("change", function() {
		// 	$(this).removeClass("holder_col").addClass("active_col");
		// });
	});
});

$(document).ready(function () {

	// navbar toggle js
	$('.navbar_toggler').click(function () {
		$('body').toggleClass('no_scroll');
		$(this).toggleClass('open_menu');
		$(this).next("nav").toggleClass('navbar_animate');
	});
	$('.js_contact').click(function () {
		if($('body').hasClass('no_scroll')) {
			$('body').removeClass('no_scroll');
			$(this).removeClass('open_menu');
			setTimeout(() => {
				$('.custom_navbar').removeClass('navbar_animate');	
			}, 100);
		}
		$('body,html').animate({
			scrollTop: $("#id_contact").offset().top
		}, 800);
	});
	// got to page top js
	$(window).on('load scroll', function () {
		var windowTop = $(window).scrollTop();
		if (windowTop > 600) {
			$('.pagetop').fadeIn();
		} else {
			$('.pagetop').fadeOut();
		}
	});
	$('.pagetop').on('click', function (event) {
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0,
		}, 800);
	});

	// FAQ accordian
	$(function () {
		$(".accordion-jquery-ui").accordion({
			active: false,
			collapsible: true,
		  });
	});

	// before after
	var window_size = $(window).width();

	if (window_size < 676) {
		$('.stepper_row').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			fade: true,
			arrows: true,
			dots: true
		});
		$('.before_after_slider').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1
		});
	}

	// problem contnet slider JS
	$('.problem_contnet_slider').slick({
		dots: false,
		arrows: false,
		fade: true,
		speed: 500,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 1500,
	});
});
