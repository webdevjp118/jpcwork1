<?php get_header(); ?>

<?php
if(isset($_POST['contact-option'])) {

    $field2 = isset($_POST['field2']) ? $_POST['field2']: '';
    $field3 = isset($_POST['field3']) ? $_POST['field3']: '';
    $field4 = isset($_POST['field4']) ? $_POST['field4']: '';
    $field5 = isset($_POST['field5']) ? $_POST['field5']: '';
    $field6 = isset($_POST['field6']) ? $_POST['field6']: '';
    $field7 = isset($_POST['field7']) ? $_POST['field7']: '';
    
    $to      = 'info@fstageliver.jp';

    $message = "
    会社名 : ".$field2."<br>
    ご担当者名 : ".$field3."<br>
    電話番号 : ".$field4."<br>
    メールアドレス : ".$field5."<br>
    URL : ".$field6."<br>
    お問い合わせ内容 : <br>
    ".$field7."<br>
    ";

    $subject = 'FSTAGE';

    $headers = "From: " . $field5 . "\r\n";
    $headers .= "Reply-To: " . $field5 . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo '<script>alert("Success!"); location.href="'.home_url().'"</script>';
    } else {
        echo '<script>alert("Failed!"); location.href="'.home_url().'"</script>';
    }    
}

?>

<div class="banner-block-cp">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner-block-in-cp">
                <div class="page-title-cp">
                    <h1>CONTACT</h1>
                    <p>お問い合わせ</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="contact-block-cp">
    <div class="container">
        <div class="row">
            <form action="" method="POST" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contact-block-in-cp">
                <div class="contact-title-cp">
                    <h2>お仕事依頼を希望する企業様</h2>
                    <p>
                        弊社所属ライバーへのお仕事依頼、ライブ事務所に関するご質問は以下フォームより受け付けております。<br>
                        <span>*</span> は必須項目です。お手数ですが、必ずご記入ください。
                    </p>
                </div>
                <div class="conact-form-cp">
                    <div class="form-field-cop">
                        <div class="form-field-lable-cop">会社名 <span>*</span></div>
                        <div class="form-field-input-cop"><input type="text" placeholder="記入例） 一般社団法人　東日本麻酔科医ネットワーク" name="field2" required></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-cop">
                        <div class="form-field-lable-cop">ご担当者名 <span>*</span></div>
                        <div class="form-field-input-cop"><input type="text" placeholder="例）田中　太郎" name="field3" required></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-cop">
                        <div class="form-field-lable-cop">電話番号 <span>*</span></div>
                        <div class="form-field-input-cop"><input type="text" placeholder="例）0120-123-4567" name="field4" required></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-cop">
                        <div class="form-field-lable-cop">メールアドレス <span>*</span></div>
                        <div class="form-field-input-cop"><input type="email" placeholder="例）fstage@sample.com" name="field5" required></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-cop">
                        <div class="form-field-lable-cop">URL <span>*</span></div>
                        <div class="form-field-input-cop"><input type="text" placeholder="例）https://sample.com" name="field6" required></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-cop">
                        <div class="form-field-lable-cop form-field-label-top-cop">お問い合わせ内容 <span>*</span></div>
                        <div class="form-field-input-cop"><textarea placeholder="ご自由にご入力下さい" name="field7" required></textarea></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-cop form-field-radio-main-cop">
                        <div class="form-field-lable-cop"></div>
                        <div class="form-field-input-cop form-field-radio-cop">
                            <label class="radio-container-cop"><a href="#">プライバシーポリシー</a>に同意
                            <input type="checkbox" checked="checked" name="radio" required>
                            <span class="checkmark-cop"></span>
                        </label>
                        </div>
                    </div>
                    <div class="form-field-cop form-btn-cop pb-0">
                        <div class="form-field-lable-cop"></div>
                        <div class="form-field-input-cop">
                            <button type="submit" name="contact-option" class="common-btn-hp yellow-btn-hp">確認する</button>
                        </div>
                    </div>
                </div>

                <div class="contact-title-cp">
                    <h2>ライバー応募希望の方</h2>
                    <p>
                        弊社ライバーにご応募・条件面のご相談はLINEより受け付けております。<br> 以下より友達追加後、お問い合わせください。
                    </p>
                </div>
                <div class="conact-form-cp conact-form-2-cp">
                    <div class="friends-left-cp">
                        <div class="friends-title-cp">友だち追加方法</div>
                        <p>
                            右記ボタンをクリック。<br> 表示されるQRコードを読み取り
                            <br> 友達追加をしてください。
                        </p>
                    </div>
                    <div class="friends-right-cp">
                        <a href="https://line.me/R/ti/p/%40562txjdw" class="common-btn-hp line-btn-hp"><img src="<?php echo get_stylesheet_directory_uri();?>/images/line_icon.png" alt="" />友だち追加</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<?php get_footer(); ?>