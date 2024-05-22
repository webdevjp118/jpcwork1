$(document).ready(function() {
    // grab the initial top offset of the navigation 
    
    if($('#floating').length) {
        var stickyNavTop = $('#floating-1').offset().top;

        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var stickyNav = function() {
            var scrollTop = $(window).scrollTop(); // our current vertical position from the top

            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scrollTop > stickyNavTop) {
                // $('#floating-1').css("opacity", "0");
                $('#floating').css("top", "0px");
            } else {
                // $('#floating-1').css("opacity", "1");
                $('#floating').css("top", "-250px");
            }
        };

        stickyNav();
        // and run it again every time you scroll
        $(window).scroll(function() {
            stickyNav();
        });
    }
});


weirdTextList = [
    'この下に、新着　お洗活、',
    'お洗活はコイランに行って、選択した記録や口コミ',
    '自分だけの日々のお洗濯記録や、初めて行ったコイラ',
    '日本中からさまざまなお洗活が投稿されています。何を洗ったまで、',
    'コイランを検索。。。',
];
curWeirdTextNo = 0;
setInterval(function() {
    var p = document.getElementById('weird-text');
    p.innerHTML = '';
    var n = 0;
    curWeirdTextNo = curWeirdTextNo + 1;
    if (curWeirdTextNo > weirdTextList.length - 1) curWeirdTextNo = 0;
    var str = weirdTextList[curWeirdTextNo];
    var typeTimer = setInterval(function() {
        n = n + 1;
        p.innerHTML = str.slice(0, n);
        if (n === str.length) {
            clearInterval(typeTimer);
            p.innerHTML = str;
            n = 0;
            // setInterval(function() {

            //     if (n === 0) {
            //         p.innerHTML = "> " + str + ""
            //         n = 1;
            //     } else {
            //         p.innerHTML = "> " + str
            //         n = 0;
            //     };
            // }, 500);
        };
    }, 100);
}, 6000);