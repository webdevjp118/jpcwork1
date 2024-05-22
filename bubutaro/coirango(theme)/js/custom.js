$(document).ready(function() {
    $('.js-uavatar').on('click', function(){
        $('.dmenu-set').toggleClass('opened');
    });
    $('.modal-toggle').on('click', function(e) {
        $('.modal').toggleClass('is-visible');
    });
    $('.modal-toggle-close').on('click', function(e) {
        $('.modal').toggleClass('is-visible');
    });
    $('.modal-toggle1').on('click', function(e) {
        $('.modal1').toggleClass('is-visible');
    });
    $('.modal-toggle-close1').on('click', function(e) {
        $('.modal1').toggleClass('is-visible');
    });
});
$( function() {
    $( "#datepicker1,#datepicker2" ).datepicker( {
        dateFormat: 'yy年mm月dd日',
        monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]
    });
});


function readURL(input, imgControlName) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // $(imgControlName).attr('src', e.target.result);
            $(imgControlName).css('background-image', 'url(' + e.target.result +')');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
  
$("#profile-fileinput").change(function() {
  // add your logic to decide which image control you'll use
  var imgControlName = "#photo-preview";
  readURL(this, imgControlName);
});
$(".area-chk").on('click', function(e) {
    let province = $(this).attr('data-province');
    let cond = $(this).attr('data-cond');
    let areakey = $("#areakey").val();
    let condkey = $("#condkey").val();
    console.log(province);
    console.log(cond);
    if(province && province != 'undefined') {
        if(areakey.indexOf(province) >= 0) {
            areakey = areakey.replace(province+',','');
            console.log("here?");
        }
        else {
            areakey = areakey + province + ',';
        }
        
    }
    if(cond && cond != 'undefined') {
        if(condkey.indexOf(cond)>=0) {
            condkey = condkey.replace(cond+',','');
        }
        else {
            condkey = condkey + cond + ',';
        }
    }
    $("#areakey").val(areakey);
    $("#condkey").val(condkey);
    updateSearchKeyUI();
});

$(".remove-key").on('click', function(e) {
    let key = $(this).attr('data-key');
    console.log(key);
    let areakey = $("#areakey").val();
    let condkey = $("#condkey").val();
    if(areakey.indexOf(key) >= 0) {
        areakey = areakey.replace(province+',','');
    }
    if(condkey.indexOf(key)>=0) {
        condkey = condkey.replace(cond+',','');
    }
    $("#areakey").val(areakey);
    $("#condkey").val(condkey);
    updateSearchKeyUI();
});

function updateSearchKeyUI() {
    console.log("hello");
    let areakey = $("#areakey").val();
    console.log(areakey);
    let condkey = $("#condkey").val();
    console.log(condkey);
    let allkey = areakey + condkey;
    let keylist = allkey.split(',');
    let html = '';
    console.log(keylist);
    keylist.forEach(key => {
        if(key != '') {
            let keystr = "'" + key + "'";
            html = html + '<a onclick="removeSearchKey('+keystr+');" class="remove-key" data-key="'+key+'">'+key+'<i class="fas fa-close"></i></a>';
        }
    });
    $('#searchkey-set').html(html);
}

function removeSearchKey(datakey) {
    key = datakey;
    console.log(key);
    let areakey = $("#areakey").val();
    let condkey = $("#condkey").val();
    if(areakey.indexOf(key) >= 0) {
        areakey = areakey.replace(key+',','');
    }
    if(condkey.indexOf(key)>=0) {
        condkey = condkey.replace(key+',','');
    }
    $("#areakey").val(areakey);
    $("#condkey").val(condkey);
    updateSearchKeyUI();
}

$(".page-current").on('click', function(e) {
    let page = $(this).attr('data-page');
    let elpageno = $("#pageno").val(page);
    $('#search-form').submit();
});
$(".page-other").on('click', function(e) {
    let page = $(this).attr('data-page');
    let elpageno = $("#pageno").val(page);
    $('#search-form').submit();
});


$('.js-button').click(function() {
    if($(this).attr('data-href')) {
        location.href = $(this).attr('data-href');
    }
});