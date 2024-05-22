<?php /* Template Name: Member*/ ?>
<?php 
get_header(); 
?>
<?php
if(isset($_POST['member-option'])) {

    $field1 = isset($_POST['field1']) ? $_POST['field1']: '';
    $field2 = isset($_POST['field2']) ? $_POST['field2']: '';
    $field3 = isset($_POST['field3']) ? $_POST['field3']: '';
    $field4 = isset($_POST['field4']) ? $_POST['field4']: '';
    
    $to = get_company_email();

    $message = "
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

    $message = "
    ".$field1."様<br>
    <br>
    この度はケンカツメンバーへのご登録ありがとうございます。<br>
    メディアサイトメンバー登録ページの案内にもございましたが、健康や環境に関わる有料や無料の特別なご案内をさせていただくことがございます。<br>
    <br>
    ★ケンカツ記事を複数回投稿していただくとケンカツアイテムのプレゼント抽選もございます。<br>
    <br>
    1.記事投稿の詳細を知りたい⽅はページはコチラ<br>
    https://cocototo.co.jp/join/
    <br>
    <br>
    2.ケンカツ投稿やアイテム掲載のお問い合わせの場合はコチラ<br>
    <br>
    a.初めての投稿の⽅<br>
    https://drive.google.com/file/d/1LRtYQyUsGGrzpzTX1d60BtuyutgwiR8E/view?usp=sharing
    <br>
    <br>
    b.2回⽬以降の投稿の⽅<br>
    https://drive.google.com/file/d/1tIF43B2oPXrTXdz2_2x_nRmstswa4XTx/view?usp=sharing
    <br>
    <br>
    今後ともケンカツサポートCOCOTOTO MEDIAを宜しくお願いします。<br>
    <br>
    COCOTOTO MEDIA<br>
    ココトト事務局<br>
    ";

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


<section class="heading_image_section member_heading_image_section full_height_section">
    <h1>MEMBER</h1>
</section>
    <!-- company_section -->
    <section class="contact_section">
        <div class="small_custom_container">
            <div class="custom_container">
                <div class="breadcrumb_sec">
                    <ul>
                        <li>
                            <a href="<?php echo get_site_url(); ?>">COCO TOTO</a>
                        </li>
                        <li>
                            <a href="media.html">MEMBER</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="contact_sec">
                <div class="heading_text">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cocototo-heading-image.png">
                    <h2>MEMBER</h2>
                    <p>ケンカツメンバーを募集</p>
                </div>
                <div class="join_text_box_sec pg_member">
                    <p>メンバーに登録していただくと<br>
                        今後、メンバーの皆様へ有料・無料のお得な情報をご案内させていただきます。</p>
                    <div class="text2_div">
                        <p class="text_second">・ケンカツアイテムメンバー特別割引<br>
                                            ・コミュニティーへの参加<br>
                                            ・ケンカツ記事投稿特典<br>
                                            ・ケンカツプロジェクトへの参加 etc</p>
                    </div>
                </div>
                <div class="contact_form_sec">
                    <div class="join_form_box_field_box">
                        <form action="" method="POST">
                            <div class="join_form_box_field_second pg_member">
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
                                        <p>弊社からお送りするメールが、迷惑メールとして判定され、お問い合わせやエントリー下さった方のメールボックスに届かないことがございますので(※特に携帯電話会社のメールアドレスの場合)、info@cocototo.co.jpからの受信許可設定をお願い致します。なお、5日以内に確認メールが届かない場合は、大変お手数ではございますが、エントリーフォームからではなく、宛先をinfo@cocototo.co.jpとし、直接メールにてご連絡ください。</p>
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
                                <div class="join_form_box_field_second_inner join_form_box_field_second_checkbox">
                                    <div class="custom_row">
                                        <div class="join_form_second_text">
                                            <p>&nbsp;</p>
                                        </div>
                                        <div class="join_form_second_feild">
                                            <div class="custom_checkbox reminder_ckeck_box">
                                                <input type="checkbox" name="field4" id="checkbox-6" required>
                                                <label for="checkbox-6"><a href="<?php echo get_site_url(); ?>/privacy" target="_blank">プライバシーポリシーに同意する</a></label>
                                            </div>
                                            <p>＊未成年の方は保護者の同意が必要です。</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="member-option">送    信</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->
<?php
get_footer();