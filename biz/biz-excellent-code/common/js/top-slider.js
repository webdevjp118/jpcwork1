/*-----------------------------------------------------------------------------------
/* 企業ロゴ SPでのみスライダー適用
-----------------------------------------------------------------------------------*/

jQuery(document).ready(function() {
	
  var mql = window.matchMedia('screen and (max-width: 650px)');
  function checkBreakPoint(mql) {
    if (mql.matches) {
      // スマホ向け（650px以下のとき）
      $('.sp-slider-01').not('.slick-initialized').slick({
        //スライドさせる
        slidesToShow: 3,
        slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		speed: 1000,
        arrows: false,
        dots: false,
		centerMode: false,
		swipe: true
      });
    } else {
      // PC向け
      $('.sp-slider-01.slick-initialized').slick('unslick');
    }
  }

  // ブレイクポイントの瞬間に発火
  mql.addListener(checkBreakPoint);

  // 初回チェック
  checkBreakPoint(mql);
	
/*  end   */
});