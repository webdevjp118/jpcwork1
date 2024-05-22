<?php /** Template Name: Custom Login **/

if(isset($_POST['wp-submit'])){
    //print_r($_POST);
    $user_login = $user_email = $_POST['log'];
    $user_password = $_POST['pwd'];
    $user_data = array(
        'user_login'    =>      $user_login,
        'user_pass'     =>      $user_password,
        'user_email'    =>      $user_email,
    );
    // Inserting new user to the db
    //wp_insert_user( $user_data );
    $creds = array();
    $creds['user_login'] = $user_login;
    $creds['user_password'] = $user_password;
    $creds['remember'] = true;
    $user = wp_signon( $creds, false );
    if($user->errors){
        $show_error = "メールアドレスまたはパスワードが正しくありません。";
        $error = $user->errors;
        if(isset($error['invalid_username'])){
            //echo $error['invalid_username'][0];
        }else if(isset($error['incorrect_password'])){
            //echo $error['incorrect_password'][0];
        }else if(isset($error['incorrect_email'])){
            //echo $error['incorrect_email'][0];
        }

    }else{
        $userID = $user->ID;
        wp_set_current_user( $userID, $user_login );
        wp_set_auth_cookie( $userID, true, false );
        wp_redirect(home_url());
        die; // You have to die here
    }
}
get_header();
?>

<div class="gbanner-sec">
    <h1>ログイン</h1>
</div>

<div class = "pg10">
<?php if(!empty($show_error)) :?>
    <div class= "error-box">
        <p><strong><span class="icon-warning-sign"> </span><?php echo $show_error; ?></strong><p>
    </div>
<?php endif; ?>

<div class="uq-login">
    <div class="uq-login_content">
        <div class="uq-login_type is-sns">
            <h2 class="c-headline c-headline--lv4"><span class="c-headline_string">SNSアカウントでログイン</span></h2>
            <div class="uq-loginSns">
                <div class="c-button c-button--full is-twitter">
                    <a href="/auth/twitter"><span>twitterでログイン</span></a>
                </div>
                <div class="uq-loginSns_sub">
                    <div class="c-button c-button--full is-line">
                        <a href="/auth/line"><span>LINE</span></a>
                    </div>
                    <div class="c-button c-button--full is-facebook">
                        <a href="/auth/facebook"><span>facebook</span></a>
                    </div>
                </div>
            </div>
            <p class="uq-loginSns_description">SNSアカウントが連携していない状態で、各外部サービスでログインを行うと新規登録扱いになります。アカウントを新規作成する場合は、<a href="/terms/">利用規約</a>に同意するものとします。</p>
        </div>
        <div class="uq-login_type is-mail">
            <h2 class="c-headline c-headline--lv4"><span class="c-headline_string">メールアドレスでログイン</span></h2>
            <!-- uq-loginForm -->
            <div id="email" class="uq-loginForm">
                <form method="POST" action="" accept-charset="UTF-8" class="c-form"><input name="_token" type="hidden" value="DJiLW14KWabPxw3vjnPhKBjm29btihzEb4sk1oIO">
                    <dl class="uq-loginForm_set">
                        <dt class="uq-loginForm_key">メールアドレス</dt>
                        <dd class="uq-loginForm_value">
                            <div class="c-formText">
                                <input placeholder="" name="log" value="" required autocapitalize="off">
                            </div>
                        </dd>
                        <dt class="uq-loginForm_key">パスワード</dt>
                        <dd class="uq-loginForm_value">
                            <div class="c-formText">
                                <input name="pwd" type="password" value="" required>
                            </div>
                        </dd>
                    </dl>
                    <div class="c-form_button">
                        <div class="c-button c-button--submit">
                            <button type="submit" name="wp-submit"><span>ログインする</span></button>
                        </div>
                    </div>
                    <div class="uq-loginForm_reset">
                        <a href="">パスワードを忘れた場合はこちら</a>
                    </div>
                </form>
            </div><!-- uq-loginForm -->
        </div>
        <div class="uq-login_type">
            <div class="c-button c-button--blackBorder c-button--full">
                <a href="<?php echo get_site_url();?>/signup" class="js-tabTrigger" data-target="register" data-scroll="top"><span>アカウント新規登録</span></a>
            </div>
        </div>
    </div>
</div><!-- uq-login -->
</div><!-- pg10 -->

<?php 

get_footer();