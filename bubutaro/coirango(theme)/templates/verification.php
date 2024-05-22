<?php /* Template Name: Verification*/ ?>
<?php 
get_header(); 
?>
<div class="gbanner-sec">
    <h1></h1>
</div>
    <main id="primary" class="site-main">

<div class="pg8">
    <div class="c-container">
<article class="profileinfo-sec">
    <style>

    </style>
<?php
    if(isset($_GET['act'])){
        $data = unserialize(base64_decode($_GET['act']));
        $code = get_user_meta($data['id'], 'activation_code', true);
        // verify whether the code given is the same as ours
        if($code == $data['code'] && !empty($data['id'])):
            // update the user meta
            update_user_meta($data['id'], 'account_activated', 1);
?>
            <p style="text-align:center;">
                『コイランＧＯ！ユーザ登録』<br>
                <br>
                ユーザ登録が完了致しました。<br>
                コイランＧＯを、引き続きお楽しみください。
                <br>
            </p>
            <p style="text-align:center;"><a style="color:#0000EE; text-decoration:underline" href="<?php echo get_site_url(); ?>/login/">ログイン</a></p>
<?php 
        else:
?>
            <p>
                ユーザ登録に失敗しました。<br>
                お手数おかけしますが、再度、ユーザ登録作業をお願い致します。<br>
                <br>
            </p>
            <p><a style="color:#0000EE; text-decoration:underline" href="<?php echo get_site_url(); ?>/send-verification/?from=verifyfailed">戻る</a></p>
<?php
        endif;
    }
?>
</article>
    </div><!-- c-container -->
</div><!-- pg8 -->
    
    
    </main><!-- #main -->

<?php
get_footer();