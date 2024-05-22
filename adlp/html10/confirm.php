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
function echo_post($field) {
    if(isset($_POST[$field]) && !empty($_POST[$field])) echo $_POST[$field];
    else echo "";
}
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
                        <p class="form-content-box-bottom-p ">
                            入力内容をご確認ください。<br>
                            問題がなければ【この内容で送信する】ボタンをクリックして下さい。
                        </p>
                        <div class="main-form">
                            <div class="form-progress ">
                                <div class="form-progress-bac">
                                    <img src="./images/confirm_form.png">
                                </div>
                                <div class="form-progress-buttn confirm-page">
                                    <div class="step1">Step1入力</div>
                                    <div class="step2">Step2内容確認</div>
                                    <div class="step3">Step3完了</div>
                                </div>
                            </div>
                            <form method="post" action="thanks.php">
                                <input type="hidden" name="company_name" value="<?php echo_post('company_name'); ?>">
                                <input type="hidden" name="personal_name" value="<?php echo_post('personal_name'); ?>">
                                <input type="hidden" name="email" value="<?php echo_post('email'); ?>">
                                <input type="hidden" name="post_code" value="<?php echo_post('post_code'); ?>">
                                <input type="hidden" name="client_address" value="<?php echo_post('client_address'); ?>">
                                <input type="hidden" name="tel_number" value="<?php echo_post('tel_number'); ?>">
                                <input type="hidden" name="question_type" value="<?php echo_post('question_type'); ?>">
                                <input type="hidden" name="content" value="<?php echo_post('content'); ?>">
                                <input type="hidden" name="contact_reason" value="<?php echo_post('contact_reason'); ?>">
                                <div class="all-form-input confirm-input">
                                    <label >
                                        <p>
                                            会社名
                                        </p>
                                    </label>
                                    <p class="confirm-text">
                                        <?php echo_post('company_name'); ?>
                                    </p>
                                </div>
                                <div class="all-form-input confirm-input">
                                    <label >
                                        <p>
                                            氏名
                                        </p>
                                    </label>
                                    <p class="confirm-text">
                                        <?php echo_post('personal_name'); ?>
                                    </p>
                                </div>
                                <div class="all-form-input confirm-input">
                                    <label >
                                        <p>
                                            メールアドレス
                                        </p>
                                    </label>
                                    <p class="confirm-text">
                                        <?php echo_post('email'); ?>
                                    </p>
                                </div>
                                <div class="all-form-input confirm-input">
                                    <label >
                                        <p>
                                            郵便番号
                                        </p>
                                    </label>
                                    <p class="confirm-text">
                                        <?php echo_post('post_code'); ?>
                                    </p>
                                </div>
                                <div class="all-form-input confirm-input">
                                    <label >
                                        <p>
                                            住所
                                        </p>
                                    </label>
                                    <p class="confirm-text">
                                        <?php echo_post('client_address'); ?>
                                    </p>
                                </div>
                                <div class="all-form-input confirm-input">
                                    <label >
                                        <p>
                                            電話番号
                                        </p>
                                    </label>
                                    <p class="confirm-text">
                                        <?php echo_post('tel_number'); ?>
                                    </p>
                                </div>
                                <div class="all-form-input confirm-input">
                                    <label >
                                        <p>
                                            お問い合わせ項目
                                        </p>
                                    </label>
                                    <p class="confirm-text">
                                        <?php echo_post('question_type'); ?>
                                    </p>
                                </div>
                                <div class="all-form-input textarea-part confirm-input">
                                    <label >
                                        <p>
                                            お問い合わせや<br>ご相談内容
                                        </p>
                                    </label>
                                    <p class="confirm-text">
                                        <?php echo_post('content'); ?>
                                    </p>
                                </div>
                                <div class="all-form-input confirm-input">
                                    <label >
                                        <p>
                                            弊社HPを知ったきっかけ
                                        </p>
                                    </label>
                                    <p class="confirm-text">
                                        <?php echo_post('contact_reason'); ?>
                                    </p>
                                </div>
                                <div class="confirm-button">
                                    <div class="left-button-cover">
                                        <input type="button" value="入力内容を修正する" onclick="history.back()" class="bottom-back-bttn">
                                        <div class="baisejianbiao">
                                            <img src="./images/left-baijiantou.svg">
                                        </div>
                                    </div>
                                    <div class="left-button-cover rihgt-button-cover">
                                        <input type="submit" value="この内容で送信する" class="bottom-back-bttn">
                                        <div class="baisejianbiao">
                                            <img src="./images/baisejianbiao.svg">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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