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
       $errors[] = 'ユーザー名 : 不可能';
    }
    if ( !is_email( $email ) ) {
        $errors[] = 'メールアドレスが正しくありません。';
    }
    if ( email_exists( $email ) ) {
        $errors[] = 'メールアドレス : 不可能';
    }
    
    if(empty($errors)) {
        $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $email,
            'user_pass'     =>   $password,
            'first_name'    =>   $firstname,
            'last_name'     =>   $lastname
        );
        $user = wp_insert_user( $userdata );
        if(!empty($user)){
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
            update_user_meta($user,'moopenid_user_avatar', $imageurl);
        }

        $userID = $user->ID;
        wp_set_current_user( $userID, $username );
        wp_set_auth_cookie( $userID, true, false );
        wp_redirect(home_url());
        die; // You have to die here
    }
}
?>

<div class="gbanner-sec">
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
    <div id="photo-preview" class="circlediv" style="background-image:url(<?php echo get_avatar_url($user_id); ?>);">
    </div>
    <div class="modify-photo">
        <span class="btn_upload">
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