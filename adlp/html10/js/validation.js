$(".bottom-next-bttn").on("click", function() {
    formCheck();
});

function formCheck() {
    // 電話番号の全角数字、全角ハイフンを半角に変換
    // var number = $('input[name="phone_number"]').val().replace(/[０-９‐－―ー]/g,function(s){
        //     return String.fromCharCode(s.charCodeAt(0)-0xFEE0);
        // });
        // // 電話番号のハイフンを削除
        // number = number.replace(/-/g,'');
        
        var is_error = false;
        
    if($('input[name="company_name"]').val() == "") {
        // $('input[name="company_name"]').addClass("errorMsg");
        $('.errorMsgText[data-ref="company_name"]').text("入力してください");
        is_error = true;
    } else {
        $('.errorMsgText[data-ref="company_name"]').text("");
    }
    
    if($('input[name="personal_email"]').val() == "") {
        $(this).removeClass("errorMsg").addClass("errorMsg");
        $(".errorMsg").text("メールアドレスを入力してください");
        is_error = true;
    } else {
        if(!$('input[name="personal_email"]').val().match(/^[A-Za-z0-9.]+[\w-]+@[\w\.-]+\.\w{2,}$/)) {
            $(this).removeClass("errorMsg").addClass("errorMsg");
            $(".errorMsg").text("メールアドレスを正しく入力してください");
            is_error = true;
        }
    }
    
    if(!is_error) {
        $('#contact-form').submit();
    }
}