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

});

$(function () {
    // aimation呼び出し
    if ($('.js-scroll-trigger2').length) {
        scrollAnimation();
    }

    // aimation関数
    function scrollAnimation() {
        $(window).scroll(function () {
            $(".js-scroll-trigger2").each(function () {
                let position = $(this).offset().top,
                    scroll = $(window).scrollTop(),
                    windowHeight = $(window).height(),
                    elementHeight = $(this).height();

                if (scroll > position - windowHeight + elementHeight + 20) {
                    $(this).addClass('anim');
                }
            });
        });
    }
    $(window).trigger('scroll');
});




$(function () {
    // aimation呼び出し
    if ($('.js-scroll-trigger').length) {
        scrollAnimation();
    }

    // aimation関数
    function scrollAnimation() {
        $(window).scroll(function () {
            $(".js-scroll-trigger").each(function () {
                let position = $(this).offset().top,
                    scroll = $(window).scrollTop(),
                    windowHeight = $(window).height(),
                    elementHeight = $(this).height();

                if (scroll > position - windowHeight + elementHeight - 30) {
                    $(this).addClass('anim');
                }
            });
        });
    }
    $(window).trigger('scroll');
});



$(function(){
    var s = $('.right_computer_slider_list_content');
    var n = s.length;
    function replaceAddClass(i) {
        s.eq(i).siblings().removeClass('active');
        s.eq(i).addClass('active');
    }
    var i = 0; replaceAddClass(i);
    setInterval(function(){
        i++;
        if ( !(i < n) ) { i = 0; }
        replaceAddClass(i);
    }, 5000);
});


$(function(){
    var s = $('.left_computer_slider_list_content');
    var n = s.length;
    function replaceAddClass(i) {
        s.eq(i).siblings().removeClass('active');
        s.eq(i).addClass('active');
    }
    var i = 0; replaceAddClass(i);
    setInterval(function(){
        i++;
        if ( !(i < n) ) { i = 0; }
        replaceAddClass(i);
    }, 5000);
});


$(".humbuger-menu").click(function() {
	$(".drawerbutton_line").toggleClass("open");
	$(this).toggleClass("open");
	$('body').toggleClass("draweropen");
});

$(".drawernavi a").click(function() {
	$(".drawerbutton_line").removeClass("open");
	$(".humbuger-menu").removeClass("open");
	$('body').removeClass("draweropen");
});


// var vW = $(window).width();
//     if(vW < 1640){
//         $(".left-scroll").addClass("left-scroll-no-page");
//     }
//     else{
//         $(".left-scroll").removeClass("left-scroll-no-page");
//     }
//     console.log(vW);
    


var _window = $(window),
    heroBottom;
 
_window.on('scroll',function(){
    heroBottom = $('.content-01').height();
    if(_window.scrollTop() > heroBottom){
        $("body").addClass("menufixed_on");  
    }
    else{
        $("body").removeClass("menufixed_on");
    }
});


$(function () {
    var unit = 140,
      canvasList, // キャンバスの配列
      info = {}, // 全キャンバス共通の描画情報
      colorList; // 各キャンバスの色情報
  
  /**
   * Init function.
   * 
   * Initialize variables and begin the animation.
   */
  function init() {
      info.seconds = 0;
      info.t = 0;
          canvasList = [];
      colorList = [];
      // canvas1個め
      canvasList.push(document.getElementById("canvasWave01"));
      colorList.push(['#F2FAF9']);
      // canvas2個め
      canvasList.push(document.getElementById("canvasWave02"));
      colorList.push(['#C8EFEF']);
    //   // canvas3個め
      canvasList.push(document.getElementById("canvasWave03"));
      colorList.push(['#DAF3F0']);
    //   // canvas4個め
      canvasList.push(document.getElementById("canvasWave04"));
      colorList.push(['#DAF3F0']);
    //   // canvas5個め
      canvasList.push(document.getElementById("canvasWave05"));
      colorList.push(['#fff']);
    //   // canvas6個め
    //   canvasList.push(document.getElementById("canvasWave06"));
    //   colorList.push(['#fff']);
    //   // canvas7個め
    //   canvasList.push(document.getElementById("canvasWave07"));
    //   colorList.push(['#fff']);
    //   // canvas8個め
    //   canvasList.push(document.getElementById("canvasWave08"));
    //   colorList.push(['#fff']);
    //   // canvas9個め
    //   canvasList.push(document.getElementById("canvasWave09"));
    //   colorList.push(['#fff']);
    //   // canvas10個め
    //   canvasList.push(document.getElementById("canvasWave10"));
    //   colorList.push(['#fff']);
  
  // 各キャンバスの初期化
  　　for(var canvasIndex in canvasList) {
          var canvas = canvasList[canvasIndex];
          canvas.width = document.documentElement.clientWidth; //Canvasのwidthをウィンドウの幅に合わせる
          canvas.height = 175;//波の高さ
          canvas.contextCache = canvas.getContext("2d");
      }
      // 共通の更新処理呼び出し
          update();
  }
  
  function update() {
          for(var canvasIndex in canvasList) {
          var canvas = canvasList[canvasIndex];
          // 各キャンバスの描画
          draw(canvas, colorList[canvasIndex]);
      }
      // 共通の描画情報の更新
      info.seconds = info.seconds + .005;
      info.t = info.seconds*Math.PI;
      // 自身の再起呼び出し
      setTimeout(update, 40);
  }
  
  /**
   * Draw animation function.
   * 
   * This function draws one frame of the animation, waits 20ms, and then calls
   * itself again.
   */
  function draw(canvas, color) {
          // 対象のcanvasのコンテキストを取得
      var context = canvas.contextCache;
      // キャンバスの描画をクリア
      context.clearRect(0, 0, canvas.width, canvas.height);
  
      //波を描画 drawWave(canvas, color[数字（波の数を0から数えて指定）], 透過, 波の幅のzoom,波の開始位置の遅れ )
      drawWave(canvas, color[0], 1.5, .5, 0);
  }
  
  /**
  * 波を描画
  * drawWave(色, 不透明度, 波の幅のzoom, 波の開始位置の遅れ)
  */
  function drawWave(canvas, color, alpha, zoom, delay) {
          var context = canvas.contextCache;
      context.fillStyle = color;//塗りの色
      context.globalAlpha = alpha;
      context.beginPath(); //パスの開始
      drawSine(canvas, info.t / 0.5, zoom, delay);
      context.lineTo(canvas.width + 10, canvas.height); //パスをCanvasの右下へ
      context.lineTo(0, canvas.height); //パスをCanvasの左下へ
      context.closePath() //パスを閉じる
      context.fill(); //波を塗りつぶす
  }
  
  /**
   * Function to draw sine
   * 
   * The sine curve is drawn in 10px segments starting at the origin. 
   * drawSine(時間, 波の幅のzoom, 波の開始位置の遅れ)
   */
  function drawSine(canvas, t, zoom, delay) {
      var xAxis = Math.floor(canvas.height/2);
      var yAxis = 0;
      var context = canvas.contextCache;
      // Set the initial x and y, starting at 0,0 and translating to the origin on
      // the canvas.
      var x = t; //時間を横の位置とする
      var y = Math.sin(x)/zoom;
      context.moveTo(yAxis, unit*y+xAxis); //スタート位置にパスを置く
  
      // Loop to draw segments (横幅の分、波を描画)
      for (i = yAxis; i <= canvas.width + 10; i += 10) {
          x = t+(-yAxis+i)/unit/zoom;
          y = Math.sin(x - delay)/5;
          context.lineTo(i, unit*y+xAxis);
      }
  }
  init();
});

