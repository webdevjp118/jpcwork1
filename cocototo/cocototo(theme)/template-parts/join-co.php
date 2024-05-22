<?php /* Template Name: Join Co*/ ?>
<?php 
get_header(); 
?>
<?php
if(isset($_POST['join-option'])) {

    $field1 = isset($_POST['field1']) ? $_POST['field1']: '';
    $field2 = isset($_POST['field2']) ? $_POST['field2']: '';
    $field3 = isset($_POST['field3']) ? $_POST['field3']: '';

    $field4 = isset($_POST['field4']) ? $_POST['field4']: '';
    $field5 = isset($_POST['field5']) ? $_POST['field5']: '';
    $field6 = isset($_POST['field6']) ? $_POST['field6']: '';
    
    $to = get_company_email();

    $message = "
    投稿記事の種類 : ".$field4."<br>
    投稿者の属性 : ".$field5."<br>
    お名前 : ".$field1."<br>
    ココトトを知ったきっかけ : ".$field3."<br>
    ";

    $subject = 'COCOTOTO';

    $headers = "From: " . $field2 . "\r\n";
    $headers .= "Reply-To: " . $field2 . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    mail($to, $subject, $message, $headers); 

    $to = $field2;
    $from = get_company_email();

    if($field6 == '1') {
        $message = "
        ".$field1."様<br>
        <br>
        この度は、お問い合わせ誠にありがとうございます。<br>
        ケンカツ投稿の詳細に関しましては、以下の「ケンカツ投稿詳細」のURLよりアクセスしていただきご利⽤規約、条件等をご確認をしてから投稿フォームより投稿の⼿続きをお願いします。<br>
        <br>
        初回のケンカツ投稿詳細<br>
        https://drive.google.com/file/d/1LRtYQyUsGGrzpzTX1d60BtuyutgwiR8E/view?usp=sharing
        <br>
        <br>
        今後ともケンカツサポートCOCOTOTO MEDIAを宜しくお願いします。<br>
        <br>
        COCOTOTO MEDIA<br>
        ココトト事務局<br>
        ";
    }
    else {
        $message = "
        ".$field1."様<br>
        <br>
        この度は、お問い合わせ誠にありがとうございます。<br>
        ケンカツ投稿の詳細に関しましては、以下の「ケンカツ投稿詳細」のURLよりアクセスしていただきご利⽤規約、条件等をご確認をしてから投稿フォームより投稿の⼿続きをお願いします。<br>
        <br>
        2回⽬以降のケンカツ投稿詳細<br>
        https://drive.google.com/file/d/1tIF43B2oPXrTXdz2_2x_nRmstswa4XTx/view?usp=sharing
        <br>
        <br>
        今後ともケンカツサポートCOCOTOTO MEDIAを宜しくお願いします。<br>
        <br>
        COCOTOTO MEDIA<br>
        ココトト事務局<br>
        ";
    }

    $subject = 'COCOTOTO';

    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo '<script>location.href="'.home_url().'"</script>';
    } else {
        echo '<script>alert("Failed!"); location.href="'.home_url().'"</script>';
    }       
}
?>
<main id="primary" class="site-main">


<section class="heading_image_section join_heading_image_section full_height_section">
        <h1>Join us</h1>
    </section>
    <!-- company_section -->
    <section class="join_section">
        <div class="small_custom_container">
            <div class="breadcrumb_sec">
                <ul>
                    <li>
                        <a href="<?php echo get_site_url(); ?>">COCOTOTO</a>
                    </li>
                    <li>
                        <a href="#">Join us</a>
                    </li>
                </ul>
            </div>
            <div class="join_sec">
                <div class="heading_text">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cocototo-heading-image-white.png">
                    <h2>Join us</h2>
                    <p>ケンカツ仲間募集</p>
                </div>
                <div class="join_text_box_sec">
                    <p>COCOTOTO MEDIAでは、個人や企業の方で、一緒にケンカツを広めるために<br>
                    記事を投稿していただくケンカツ仲間を募集しています。</p>
                    <p class="text_second">健康予防の取り組みや<br>
                    環境活動の取り組みを実践している人</p>
                    <p>健康や環境の分野で活躍されている<br>
                        専⾨家の⽅<br>
                    個人や法人の方でケンカツアイテム（商品）の広告を希望される人</p>
                    <p class="text_third">その他、<br>
                        ・ケンカツに参加したい<br>
                        ・健康や環境に関するこ<Br>
                        とで何かを伝えたい</p>

                    <p>COCOTOTOのVISIONやMISSIONに共感していただける方の</p>
                    <p>ご応募お待ちしております。</p>
                    <div class="join_text_red_box">
                        <div class="join_text_red_box_inner">
                            <div class="join_text_red_box_heading">
                                <h3>投稿特典</h3>
                            </div>
                            <div class="join_text_red_box_text">
                                <p>
                                    ケンカツ記事投稿者の中から<br>
                                    毎月抽選でケンカツアイテムを<br>
                                    <span>無料プレゼント</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="join_text_box_inner">
                        <p>＊ケンカツ記事投稿につきましては、<br>
                            下記お問い合わせフォームからご連絡をいただきましたら<br>
                            投稿詳細をご案内させていただきます。</p>
                    </div>
                </div>
                <div class="join_form_box_sec">
                    <div class="join_form_box_inner">
                        <div class="join_form_btn_sec">
                            <div class="custom_row">
                                <div class="custom_col_6">
                                    <div class="join_form_btn join_form_btn_blue">
                                        <a href="<?php echo get_site_url(); ?>/join">
                                            <img class="normal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/join-image-1.png">
                                            <img class="hover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/join-image-1-hover.png">
                                            個  人</a>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="join_form_div join_form_div_pink">
                                        <span>
                                            <img class="normal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/join-image-2.png">
                                            <img class="hover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/join-image-2-hover.png">
                                            法  人</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="join_form_box_field_box">
                            <form action="" method="POST">
                                <div class="join_form_box_field_first">
                                    <div class="">
                                        <h3>① 投稿記事の種類</h3>
                                        <div class="custom_checkbox reminder_ckeck_box">
                                            <input type="radio" id="checkbox-1" name="field4" value="ケンカツ記事の投稿" required>
                                            <label for="checkbox-1">ケンカツ記事の投稿</label>
                                        </div>
                                        <div class="custom_checkbox reminder_ckeck_box">
                                            <input type="radio" id="checkbox-2" name="field4" value="ケンカツアイテム（商品）の投稿と掲載" required>
                                            <label for="checkbox-2">ケンカツアイテム（商品）の掲載と記事の投稿</label>
                                        </div>
                                        <!-- <h3>② 投稿者の属性</h3> -->
                                        <div class="join_form_field_first_inner_box" style="display:none">
                                            <div class="custom_row">
                                                <div class="custom_col_6">
                                                    <div class="custom_checkbox reminder_ckeck_box">
                                                        <input type="radio" name="field5" id="checkbox-4" value="⼀般" required>
                                                        <label for="checkbox-4">⼀般</label>
                                                    </div>
                                                </div>
                                                <div class="custom_col_6">
                                                    <div class="custom_checkbox reminder_ckeck_box">
                                                        <input type="radio" name="field5" id="checkbox-5" value="専門家" required>
                                                        <label for="checkbox-5">専門家</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3>② 投稿について</h3>
                                        <div class="join_form_field_first_inner_box">
                                            <div class="custom_row">
                                                <div class="custom_col_6">
                                                    <div class="custom_checkbox reminder_ckeck_box">
                                                        <input type="radio" id="checkbox-7" name="field6" value="1" required>
                                                        <label for="checkbox-7">1回目</label>
                                                    </div>
                                                </div>
                                                <div class="custom_col_6">
                                                    <div class="custom_checkbox reminder_ckeck_box" style="width:100px;">
                                                        <input type="radio" id="checkbox-8" name="field6" value="2" required>
                                                        <label for="checkbox-8">2回目以降</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="join_form_box_field_second">
                                    <div class="join_form_box_field_second_inner">
                                        <div class="custom_row">
                                            <div class="join_form_second_text">
                                                <p>お名前 <span class="join_form_second_text_red">必須</span></p>
                                            </div>
                                            <div class="join_form_second_feild">
                                                <input type="text" name="field1" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="join_form_box_field_second_inner">
                                        <div class="custom_row">
                                            <div class="join_form_second_text">
                                                <p>メールアドレス <span class="join_form_second_text_red">必須</span></p>
                                            </div>
                                            <div class="join_form_second_feild">
                                                <input type="email" name="field2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom_col_12">
                                        <div class="join_form_second_text_inner">
                                            <p>弊社からお送りするメールが、迷惑メールとして扱われメールボックスに届かない場合がありますので、info@cocototo.co.jpからの受信許可設定をお願い致します。なお、1週間経っても投稿詳細のフォームが届かない場合は、大変お手数ではございますが、宛先をinfo@cocototo.co.jpとし、直接メールにてご連絡くださいませ。</p>
                                        </div>
                                    </div>
                                    <div class="join_form_box_field_second_inner">
                                        <div class="custom_row">
                                            <div class="join_form_second_text">
                                                <p>ココトトを知ったきっかけ <span class="join_form_second_text_blue">任意</span></p>
                                            </div>
                                            <div class="join_form_second_feild">
                                                <input type="text" name="field3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="join_form_box_field_second_inner" style="display:none">
                                        <div class="custom_row">
                                            <div class="join_form_second_text">
                                                <p>ケンカツ内容 <span class="join_form_second_text_red">必須</span></p>
                                            </div>
                                            <div class="join_form_second_feild">
                                                <textarea></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="join_form_box_field_second_inner join_form_box_field_second_checkbox">
                                        <div class="custom_row">
                                            <div class="join_form_second_text">
                                                <p>&nbsp;</p>
                                            </div>
                                            <div class="join_form_second_feild">
                                                <div class="custom_checkbox reminder_ckeck_box">
                                                    <input type="checkbox" id="checkbox-6" required>
                                                    <label for="checkbox-6"><a href="<?php echo get_site_url(); ?>/privacy" target="_blank">プライバシーポリシーに同意する</a></label>
                                                </div>
                                                <p>＊未成年の方は保護者の同意が必要です。</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="join-option">送    信</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->
<?php
get_footer();