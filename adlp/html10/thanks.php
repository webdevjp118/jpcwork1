<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>株式会社 AD プランニング 名古屋｜販促ツール・広告・デザイン制作</title>    
    <meta name="description" content="売上アップ、集客、求人募集など目的に応じ WEB×印刷物の掛け合わせで最適解のご提案をいたします。お客様の問題解決に向けて共に悩み考え、成果に繋げていきます。">

    <link rel="shortcut icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="./css/stylesheet.css">
    <link rel="stylesheet" href="./css/responsive.css">

</head>
<body>
<?php
$company_name = isset($_POST['company_name']) ? $_POST['company_name']: '';
$personal_name = isset($_POST['personal_name']) ? $_POST['personal_name']: '';
$email = isset($_POST['email']) ? $_POST['email']: '';
$post_code = isset($_POST['post_code']) ? $_POST['post_code']: '';
$client_address = isset($_POST['client_address']) ? $_POST['client_address']: '';
$tel_number = isset($_POST['tel_number']) ? $_POST['tel_number']: '';
$question_type = isset($_POST['question_type']) ? $_POST['question_type']: '';
$content = isset($_POST['content']) ? $_POST['content']: '';
$contact_reason = isset($_POST['contact_reason']) ? $_POST['contact_reason']: '';

// $company_email = 'adp-nagoya@adp.xii.jp';
$company_email = 'no.mars1471@gmail.com';
$to = $company_email;

$message = "
<br>
////////////////////////////////////////////////////////////////////////////<br>
お問い合わせ内容<br>
////////////////////////////////////////////////////////////////////////////<br>
<br>
■会社名 : ".$company_name."<br>
■氏名 : ".$personal_name."<br>
■メールアドレス : ".$email."<br>
■郵便番号 : ".$post_code."<br>
■住所 : ".$client_address."<br>
■電話番号 : ".$tel_number."<br>
■お問い合わせ項目 : ".$question_type."<br>
■お問い合わせやご相談内容 : <br>".$content."<br>
■弊社HPを知ったきっかけ : ".$contact_reason."<br>
<br>
<br>
<br>
***************************************************************************<br>
※本メールは自動返信メールです。その為、ご返信いただいても返答できません。<br>
※本メールに心当たりがない場合、またはご不明な点等ございましたら、<br>
下記よりご連絡ください。<br>
株式会社 AD プランニング<br>
〒462-0002 愛知県名古屋市中区中区丸の内 3-19-1 ライオンビル 3F<br>
TEL：052-962-7757 ／ FAX：052-962-7767<br>
E-mail：adp-nagoya@adp.xii.jp<br>
***************************************************************************<br>
";

$subject = '【AD プランニング】お問い合わせ受付完了メール';

$headers = "From: LP=?utf-8?b?".base64_encode("サイトから")."?= <" . $email . ">\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $message, $headers); //


$to = $email;

$message = "
".$personal_name."様<br>
<br>
この度は、AD プランニング WEB サイトより、<br>
「お問い合わせ」をいただき、誠にありがとうございます。<br>
<br>
下記の内容でお問い合わせを受け付けました。<br>
2 営業日以内に担当者よりご連絡いたします。<br>
<br>
////////////////////////////////////////////////////////////////////////////<br>
お問い合わせ内容<br>
////////////////////////////////////////////////////////////////////////////<br>
<br>
■会社名 : ".$company_name."<br>
■氏名 : ".$personal_name."<br>
■メールアドレス : ".$email."<br>
■郵便番号 : ".$post_code."<br>
■住所 : ".$client_address."<br>
■電話番号 : ".$tel_number."<br>
■お問い合わせ項目 : ".$question_type."<br>
■お問い合わせやご相談内容 : <br>".$content."<br>
<br>
■弊社HPを知ったきっかけ : ".$contact_reason."<br>
<br>
<br>
<br>
***************************************************************************<br>
※本メールは自動返信メールです。その為、ご返信いただいても返答できません。<br>
※本メールに心当たりがない場合、またはご不明な点等ございましたら、<br>
下記よりご連絡ください。<br>
株式会社 AD プランニング<br>
〒462-0002 愛知県名古屋市中区中区丸の内 3-19-1 ライオンビル 3F<br>
TEL：052-962-7757 ／ FAX：052-962-7767<br>
E-mail：adp-nagoya@adp.xii.jp<br>
***************************************************************************<br>
";

$subject = '【AD プランニング】お問い合わせ受付完了メール';
$headers = "From: =?utf-8?b?".base64_encode("AD プランニング")."?= <" . $company_email . ">\r\n";
$headers .= "Reply-To: " . $company_email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $message, $headers);
?>
    <header>
    </header>

    <main>
        <section class="left-scroll">
            <div class="left_computer_slider">
                <div class="left_computer_slider_inner">
                    <ul class="left_computer_slider_list">
                        <li class="left_computer_slider_list_content computer_slider_list_content01"></li>
                        <li class="left_computer_slider_list_content computer_slider_list_content02"></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="right-scroll">
            <div class="right_computer_slider">
                <div class="right_computer_slider_inner">
                    <ul class="right_computer_slider_list">
                        <li class="right_computer_slider_list_content computer_slider_list_content03"></li>
                        <li class="right_computer_slider_list_content computer_slider_list_content04"></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="main-scroll" id="main-scroll">
            <div class="container">
                <div class="form-content">
                    <div class="form-content-box" id="form-content-box">
                        <h3 >
                            お問い合わせフォーム
                        </h3>
                        <div class="main-form">
                            <div class="form-progress ">
                                <div class="form-progress-bac">
                                    <img src="./images/thanks_form.png">
                                </div>
                                <div class="form-progress-buttn thanks-page">
                                    <div class="step1">Step1入力</div>
                                    <div class="step2">Step2内容確認</div>
                                    <div class="step3">Step3完了</div>
                                </div>
                            </div>
                        </div>
                        <p class="form-content-box-bottom-p ">
                            送信が完了いたしました。<br>
                            弊社で確認後、折り返しご連絡させていただきます。<br>
                            2営業日以上経ってもご連絡がない場合は、お電話にてお問い合わせください。
                        </p>
                        <a class="thanks-go-top" href="index.html">
                            トップページへ
                            <div class="baisejianbiao">
                                <img src="./images/baisejianbiao.svg">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="footer-content">
                    <div class="footer-main">
                        <div class="footer-logo io fade upS">
                            <img src="./images/logo.svg">
                        </div>
                        <div class="footer-main-text">
                            <div class="footer-ul">
                                <p class="sp-hidden io fade upS">
                                    Address
                                </p>
                                <div class="ul-01-line sp-hidden io fade upS"></div>
                                <p class="io fade upS">
                                    〒460-0002<br>
                                    愛知県名古屋市中区丸の内3-19-1<br>
                                    ライオンビル3F
                                </p>
                            </div>
                            <div class="footer-ul io fade upS">
                                <p class="sp-hidden io fade upS">
                                    Contacts
                                </p>
                                <div class="ul-02-line sp-hidden io fade upS"></div>
                                <p class="io fade upS">
                                    TEL　052-962-7757<br>
                                    FAX　052-962-7767<br>
                                    MAIL  adp-nagoya@adp.xii.jp
                                </p>
                            </div>
                            <div class="footer-link-ul">
                                <a href="https://note.com/adp_nagoya/" class="footer-data io fade upS">
                                    <img src="./images/note.svg">
                                </a>
                                <a href="https://twitter.com/758758_ad?s=11&t= PvFSPHx_Cmt556xDxLAUw" class="footer-twitter io fade upS">
                                    <img src="./images/Icon awesome-twitter.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="copyright io fade upS">
                        ©2022 AD PLANNING Co.,Ltd.
                    </div>
                    <a href="#main-scroll" class="footer-go-to-top">
                        <img class="io fade upS" src="./images/go-top.svg">
                    </a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-navigation">
            <a href="tel:052-962-7757" class="footer-navigation-content  footer-navigation-content-01">
                <img src="./images/Group 970.svg">
            </a>
            <a href="#form-content-box" class="footer-navigation-content  footer-navigation-content-02">
                <img src="./images/Group 965.svg">
            </a>
            <a href="#form-content-box" class="footer-navigation-content  footer-navigation-content-03">
                <img src="./images/Group 966.svg">
            </a>
        </div>        
    </footer>
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/customs.js"></script>
    <script type="text/javascript" src="js/jquery.zip2addr.js"></script>
</body>
</html>