<?php /* Template Name: Send Verification*/ ?>
<?php 
get_header(); 
if(!is_user_logged_in()) {
    wp_redirect(get_site_url().'/login');
}
?>
<div class="gbanner-sec">
    <h1></h1>
</div>
    <main id="primary" class="site-main">

<div class="pg8">
    <div class="c-container">
<?php
    global $current_user, $wp_roles;
    $user_id = $current_user->ID;
    $account_activated = get_user_meta($user_id, 'account_activated', true);
    if($account_activated == 1){
        wp_redirect(home_url());
        exit;
    } 
    $from = '';
    if(isset($_GET['from'])) $from = $_GET['from'];
    if($from == 'send' || $from == 'signup') {
        // create md5 code to verify later
        $code = md5(time());
        // make it into a code to send it to user via email
        $string = array('id'=>$user_id, 'code'=>$code);
        // create the activation code and activation status
        update_user_meta($user_id, 'account_activated', 0);
        update_user_meta($user_id, 'activation_code', $code);
        // create the url
        $url = get_site_url(). '/verification/?act=' .base64_encode( serialize($string));
        // basically we will edit here to make this nicer
        $html = '『コイランＧＯ！ユーザ登録』<br><br>';
        $html .= '下記のリンクをクリックして、ユーザ登録を完了させてください。<br>';
        $html .= 'この度は、コイランＧＯの登録作業を行って頂きまして、まことにありがとうございます。<br/><br/> <a href="'.$url.'">'.$url.'</a>';
        // send an email out to user
        wp_mail( $current_user->user_email, __('コイランＧｏメール認証','text-domain') , $html);
        echo '<input type="hidden" value="'.$url.'">';
        // echo $html;
    }
    
?>
<article class="profileinfo-sec">
    <style>

    </style>
<?php if($from == 'send' || $from == 'signup'): ?>
    <p style="text-align:center;">
        ユーザ新規登録を行いました。登録したメールアドレスに本登録用のリンクをお送りしております。<br>
        リンクをクリックして、ユーザ登録を完了させてください。
    </p>
<?php elseif($from == 'login'): ?>
    <p style="text-align:center;">
        ログイン後、お客様のアカウントはアクティブされていません。ー（テキスト修正お願いします。）
    </p>
    <p style="text-align:center;"><a style="color:#0000EE; text-decoration:underline" href="<?php echo get_site_url(); ?>/send-verification/?from=send">活性化メール再送信テキストー（修正お願いします。）</a></p>
<?php elseif($from == 'verifysuccess'): ?>
    <p style="text-align:center;">
        活性化成功の場合ー（テキスト修正お願いします。）
    </p>
    <p style="text-align:center;"><a style="color:#0000EE; text-decoration:underline" href="<?php echo get_site_url(); ?>/login/">ログイン</a></p>
<?php elseif($from == 'verifyfailed'): ?>
    <p style="text-align:center;">
        確認コードエラーの場合ー（テキスト修正お願いします。）
    </p>
    <p style="text-align:center;"><a style="color:#0000EE; text-decoration:underline" href="<?php echo get_site_url(); ?>/send-verification/?from=send">活性化メール再送信テキストー（修正お願いします。）</a></p>
<?php endif; ?>
</article>
    </div><!-- c-container -->
</div><!-- pg8 -->
    
<div style="display:none">
    <p style="text-align:center;">
        お客様のアカウントはアクティブされていません。
    </p>
    <p style="text-align:center;"><a style="color:#0000EE; text-decoration:underline" href="<?php echo get_site_url(); ?>/send-verification/">活性化メール再送信テキストー（修正お願いします。）</a></p>
</div>   
    </main><!-- #main -->

<?php
get_footer();