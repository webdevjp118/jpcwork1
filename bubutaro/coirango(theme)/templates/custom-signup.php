<?php /* Template Name: Custom Signup */ ?>
<?php get_header(); ?>
<?php 
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
$errors = array();
if(isset($_POST['wp-submit'])){
    $username = $_POST['username'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $email = $_POST['email'];
    if ( empty( $username ) || empty( $password ) || empty( $password1 ) || empty( $email ) ) {
        $errors[] = 'メールアドレスまたはパスワードが正しくありません。';
    }
    else if ( empty( $password ) != empty( $password1 ) ) {
        $errors[] = 'メールアドレスまたはパスワードが正しくありません。';
    }
    if ( 4 > strlen( $username ) ) {
        $errors[] = 'ユーザー名 : 4文字以上';
    }
    if ( username_exists( $username ) ){
       $errors[] = 'ユーザー名 : このユーザ名は既に使われています。他のユーザ名にてご登録ください。';
    }
    if ( !is_email( $email ) ) {
        $errors[] = 'メールアドレスが正しくありません。';
    }
    if ( email_exists( $email ) ) {
        $errors[] = 'メールアドレス : このメールアドレスは既に使われています。他のメールアドレスにてご登録ください。';
    }
    // if(empty($errors)) { //test
    //     $html = "Hello!";
    //     wp_mail( $email, __('コイランＧｏメール認証','text-domain') , $html);
    // }
    if(empty($errors)) {
        $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $email,
            'user_pass'     =>   $password,
            'first_name'    =>   $firstname,
            'last_name'     =>   $lastname
        );
        $user_id = wp_insert_user( $userdata );
        if(!empty($user_id)){
            if($_FILES['uploadedfile']['name'] != ''){
                $uploadedfile = $_FILES['uploadedfile'];
                $upload_overrides = array( 'test_form' => false );
                $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
                $imageurl = "";
                if ( $movefile && ! isset( $movefile['error'] ) ) {
                    $imageurl = $movefile['url'];
                } else {
                    echo $movefile['error'];
                }
            }
            update_user_meta($user_id,'moopenid_user_avatar', $imageurl);

            $user_info = get_userdata($user_id);
            // create md5 code to verify later
            $code = md5(time());
            // make it into a code to send it to user via email
            $string = array('id'=>$user_id, 'code'=>$code);
            // create the activation code and activation status
            update_user_meta($user_id, 'account_activated', 0);
            
            // update_user_meta($user_id, 'activation_code', $code);
            // // create the url
            // $url = get_site_url(). '/verification/?act=' .base64_encode( serialize($string));
            // // basically we will edit here to make this nicer
            // $html = 'Please click the following links <br/><br/> <a href="'.$url.'">'.$url.'</a>';
            // // send an email out to user
            // wp_mail( $email, __('コイランＧｏメール認証','text-domain') , $html);
        }

        wp_set_current_user( $user_id, $username );
        wp_set_auth_cookie( $user_id, true, false ); 
        wp_redirect(get_site_url().'/send-verification/?from=signup');
    }
}

function alert($msg) {
    echo "<script>alert('".$msg."')</script>";
}
?>

<div class="gbanner-sec cpc">
    <h1>新規登録</h1>
</div>

<div class="pg10">
<?php
    if ( !empty($errors) ) {
        echo "<div class='error-box'>";
        foreach ( $errors as $error ) {
            echo '<p><strong>';
            echo '<span class="icon-warning-sign"> </span>'.$error;
            echo '</strong></p>';
        }
        echo "</div>";
    }
?>
<div class="uq-login">
    <div class="uq-login_content">
        <div class="uq-login_type is-sns is-register">
            <h2 class="c-headline c-headline--lv4"><span class="c-headline_string">SNSアカウントで登録</span></h2>
            <div class="uq-loginSns">
                <div class="c-button c-button--full is-twitter">
                    <a href="https://sauna-ikitai.com/auth/twitter"><span>twitter</span></a>
                </div>
                <div class="uq-loginSns_sub">   
                    <div class="c-button c-button--full is-line">
                        <a href="https://sauna-ikitai.com/auth/line"><span>LINE</span></a>
                    </div>
                    <div class="c-button c-button--full is-facebook">
                        <a href="https://sauna-ikitai.com/auth/facebook"><span>facebook</span></a>
                    </div>
                </div>
            </div>
            <p class="uq-loginSns_description">新規登録するにあたっては、<a href="/terms/">利用規約</a>に同意するものとします。</p>
        </div>
        <div class="uq-login_type is-sns is-register">
            <h2 class="c-headline c-headline--lv4"><span class="c-headline_string">メールアドレスでで登録</span></h2>

<form action="" method="post" enctype="multipart/form-data">
<div class="photo-div">
    <div id="photo-preview" class="c-circlediv" style="background-image:url(<?php echo get_avatar_url($user_id); ?>);">
    </div>
    <div class="c-modify-photo">
        <span class="c-btn-upload">
            <input type="file" id="profile-fileinput" title="" class="input-img" name="uploadedfile"/>
            アイコン選択
        </span>
    </div>
</div>
<table class="c-formTable">
    <tbody>
        <tr>
          <th class="c-formTable_th">お名前 姓</th>
          <td class="c-formTable_td">
              <div class="c-formText c-formText--md">
                  <input name="fname" type="text" value="<?php echo $firstname; ?>" required>
              </div>
          </td>
        </tr>
        <tr>
          <th class="c-formTable_th">お名前 名</th>
          <td class="c-formTable_td">
              <div class="c-formText c-formText--md">
                  <input name="lname" type="text" value="<?php echo $lastname; ?>" required>
              </div>
          </td>
        </tr>
        <tr>
          <th class="c-formTable_th">ユーザー名</th>
          <td class="c-formTable_td">
              <div class="c-formText c-formText--md">
                  <input name="username" type="text" value="<?php echo $username; ?>" required>
              </div>
          </td>
        </tr>
        <tr>
          <th class="c-formTable_th">メールアドレス</th>
          <td class="c-formTable_td">
              <div class="c-formText c-formText--md">
                  <input name="email" type="text" value="<?php echo $email; ?>" required>
              </div>
          </td>
        </tr>
        <tr>
          <th class="c-formTable_th">パスワード</th>
          <td class="c-formTable_td">
              <div class="c-formText c-formText--md">
                  <input name="password" type="password" value="<?php echo $password; ?>" required>
              </div>
          </td>
        </tr>
        <tr>
          <th class="c-formTable_th">パスワード（確認）</th>
          <td class="c-formTable_td">
              <div class="c-formText c-formText--md">
                  <input name="password1" type="password" value="<?php echo $password1; ?>" required>
              </div>
          </td>
        </tr>
    </tbody>
</table>            

            <div class="c-form_button">
                <div class="c-button c-button--submit">
                    <button type="submit" name="wp-submit"><span>新規登録する</span></button>
                </div>
            </div>
</form>


        </div>
    </div>
</div><!-- uq-login -->
</div><!-- pg10 -->

<?php 

get_footer();