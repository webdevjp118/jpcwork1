<?php /* Template Name: Cuser Edit */ ?>
<?php 
get_header(); 
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

if(!is_user_activated()) {
    wp_redirect(get_site_url().'/login');
}
?>
<?php
/* Get user info. */

global $current_user, $wp_roles;
$user_id = $current_user->ID;
$user_data = $current_user;
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $user_data =  get_userdata($user_id);  
}
$user_id = $user_data->ID;
$user_editlink = get_site_url().'/cuser-edit?id='.$user_id;
$error = array();    
$user_firstname = '';
$user_lastname = '';
$user_gender = '';
$user_description = '';
$user_birthday = '';

if ( !empty( $_POST['first_name'] ) ) $user_firstname =  $_POST['first_name'];
else $user_firstname = $user_data->first_name;
if ( !empty( $_POST['last_name'] ) ) $user_lastname =  $_POST['last_name'];
else $user_lastname = $user_data->last_name;
if ( !empty( $_POST['gender'] ) ) $user_gender=  $_POST['gender']; 
else $user_gender = get_user_meta($user_id, 'gender', true);
if ( !empty( $_POST['description'] ) ) $user_description = $_POST['description'];
else $user_description = $user_data->user_description;
if ( !empty( $_POST['birthday'] ) ) $user_birthday = $_POST['birthday'];
else $user_birthday = get_user_meta($user_id, 'birthday', true);
if ( !empty( $_POST['used_year'] ) ) $user_used_year = $_POST['used_year'];
else $user_usedyear = get_user_meta($user_id, 'used_year', true);
if ( !empty( $_POST['used_month'] ) ) $user_usedmonth = $_POST['used_month'];
else $user_usedmonth = get_user_meta($user_id, 'used_month', true);
if ( !empty( $_POST['favor_laundry'] ) ) $user_favorlaundry = $_POST['favor_laundry'];
else $user_favorlaundry = get_user_meta($user_id, 'favor_laundry', true);
if ( !empty( $_POST['web_url'] ) ) $user_weburl=  $_POST['web_url']; 
else $user_weburl = get_user_meta($user_id, 'web_url', true);
if ( !empty( $_POST['bio'] ) ) $user_bio=  $_POST['bio']; 
else $user_bio = get_user_meta($user_id, 'bio', true);
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update_user' ) {
    if ( !empty( $_POST['first_name'] ) )
    {
      wp_update_user( array('ID' => $user_data->ID, 'first_name' => sanitize_text_field( $_POST['first_name'] )));
    } 
    if ( !empty( $_POST['last_name'] ) ) {
      wp_update_user( array('ID' => $user_data->ID, 'last_name' => sanitize_text_field( $_POST['last_name'] )));
    } 
    if ( !empty( $_POST['gender'] ) ) {
      update_user_meta($user_data->ID, 'gender', $_POST['gender'] );
      echo "gender updated<br>";
    } 
    if ( !empty( $_POST['birthday'] ) ) update_user_meta($user_data->ID, 'birthday', esc_attr( $_POST['birthday'] ) );
    if ( !empty( $_POST['used_year'] ) ) update_user_meta($user_data->ID, 'used_year', esc_attr( $_POST['used_year'] ) );
    if ( !empty( $_POST['used_month'] ) ) update_user_meta($user_data->ID, 'used_month', esc_attr( $_POST['used_month'] ) );
    if ( !empty( $_POST['home_laundry'] ) ) update_user_meta($user_data->ID, 'home_laundry', esc_attr( $_POST['home_laundry'] ) );
    if ( !empty( $_POST['favor_laundry'] ) ) update_user_meta($user_data->ID, 'favor_laundry', esc_attr( $_POST['favor_laundry'] ) );
    if ( !empty( $_POST['bio'] ) ) update_user_meta( $user_data->ID, 'bio', $_POST['bio']);
    if ( !empty( $_POST['web_url'] ) ) update_user_meta( $user_data->ID, 'web_url', $_POST['web_url']);

    /* Update user information. */

    if ( !empty( $_POST['email'] ) ){
      if (!is_email(esc_attr( $_POST['email'] )))
          $error[] = __('メールアドレスが正しくありません。', 'profile');
      elseif(email_exists(esc_attr( $_POST['email'] )) != $user_data->id )
          $error[] = __('メールアドレスが正しくありません。', 'profile');
      else{
          wp_update_user( array ('ID' => $user_data->ID, 'user_email' => esc_attr( $_POST['email'] )));
      }
    }
    
    if($_FILES['uploadedfile']['name'] != ''){
        $uploadedfile = $_FILES['uploadedfile'];
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
        $imageurl = "";
        if ( $movefile && ! isset( $movefile['error'] ) ) {
           $imageurl = $movefile['url'];
           echo "url : ".$imageurl;
        } else {
            echo $movefile['error'];
        }
        update_user_meta($user_data->ID, 'moopenid_user_avatar', $imageurl);
    }


    /* Redirect so the page will show updated info.*/

  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */

    if ( count($error) == 0 ) {

        //action hook for plugins and extra fields saving

        do_action('edit_user_profile_update', $user_data->ID);
        wp_redirect( get_site_url().'/cuser?id='.$user_id ); exit;
    }       
}
?>
<div class="gbanner-sec">
  <h1>プロフィール</h1>
</div>

<?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
<?php 
$user_meta = get_user_meta($user_id);
?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<div class="pg9">
<div class="c-container">
<div style="hr-space30">
</div>
<div class="form-wrap">
<div class="content-width">
<form method="POST" action="<?php echo get_site_url(); ?>/cuser-edit" accept-charset="UTF-8" class="c-form" enctype="multipart/form-data">
  <input name="_token" type="hidden" value="XBuZ89DysLAk4fR1BAU9v8KozIkBp9Oe95GMkIhe">
  
<div class="photo-line">
<table class="c-formTable">
    <tbody>
        <tr>
          <th class="c-formTable_th">お名前 姓</th>
          <td class="c-formTable_td">
              <div class="c-formText c-formText--md">
                  <input name="first_name" type="text" value="<?php echo $user_firstname; ?>">
              </div>
          </td>
        </tr>
        <tr>
          <th class="c-formTable_th">お名前 名</th>
          <td class="c-formTable_td">
              <div class="c-formText c-formText--md">
                  <input name="last_name" type="text" value="<?php echo $user_lastname; ?>">
              </div>
          </td>
        </tr>
        <tr>
            <th class="c-formTable_th">性別</th>
            <td class="c-formTable_td">
                <div class="c-formRadio">
                    <input class="js-addFormItem" id="gender_male"  name="gender" <?php echo ($user_gender == 'male')?'checked':''; ?> type="radio" value="male">
                    <label for="gender_male" class="js-addFormItem">男性</label>
                </div>
                <div class="c-formRadio">
                    <input class="js-addFormItem" id="gender_female"  name="gender" <?php echo ($user_gender == 'female')?'checked':''; ?> type="radio" value="female">
                    <label for="gender_female" class="js-addFormItem">女性</label>
                </div>
            </td>
        </tr>
        <tr>
          <th class="c-formTable_th">生年月日</th>
          <td class="c-formTable_td">
              <div class="c-formText c-formText--md">
                  <input id="datepicker1" name="birthday" type="text" value="<?php echo $user_birthday; ?>">
              </div>
          </td>
        </tr>
    </tbody>
</table>
<div class="photo-div">
  <div id="photo-preview" class="circlediv" style="background-image:url(<?php echo get_avatar_url($user_id); ?>);">
  </div>
  <div class="modify-photo">
    <span class="btn_upload">
      <input type="file" id="profile-fileinput" title="" class="input-img" name="uploadedfile"/>
      アイコン変更
    </span>
  </div>
</div>
<div>
</div>
</div>
<table class="c-formTable">
    <tbody>
        <tr>
          <th class="c-formTable_th">コインラン歴</th>
          <td class="c-formTable_td">
            <div class="c-formText c-formText--sm c-formText--inlineBlock">
              <input placeholder="例：1" name="used_year" type="number" value="<?php echo $user_usedyear; ?>">
            </div>
            年　
            <div class="c-formText c-formText--sm c-formText--inlineBlock">
              <input placeholder="例：3" name="used_month" type="number" value="<?php echo $user_usedmonth; ?>">
            </div>
            ヶ月
            <p class="c-form_helpText is-bottom">※一度入力すると自動で更新されます</p>
          </td>
        </tr>
                      <tr>
                        <th class="c-formTable_th">ホームサウナ</th>
                        <td class="c-formTable_td">
                                                    <p class="home u-mb20">Smart Stay SHIZUKU 上野駅前</p>
                                                                              <div class="c-button c-button--submit c-button--whiteBorder c-button--searchLeft" id="check">
                                                        <a onclick="showSearchModal()"><span class="js-saunaSelect">施設を選びなおす</span></a>
                                                      </div>
                          <div id="shadow" class="js-close"></div>
                          <div id="modal-close" class="p-modal_close js-close"></div>
                          <div id="modal-content" style="display:none;">
                            <div class="c-formText c-formText--lg c-formText--inlineBlock">
                              <input id="datepicker1" type="text" name="birthday"  value="" placeholder="キーワードでサウナ検索">
                            </div>
                            <div class="c-button c-button--submit c-button--black c-button--searchLeft">
                              <a onclick="searchHomeSauna(1)"><span>探す</span></a>
                            </div>
                          </div>
                          <input id="home_sauna" name="home_sauna" type="hidden" value="7913">
                        </td>
                      </tr>
        <tr>
          <th class="c-formTable_th">好きなコインラン</th>
          <td class="c-formTable_td">
            <div class="c-formTextarea">
              <textarea placeholder="例：サウナ室:テレビ無し、輻射熱モリモリなサウナ室。水風呂:15度バイブラ有りの深め" name="favor_laundry" cols="50" rows="10"></textarea>
            </div>
          </td>
        </tr>
        <tr>
          <th class="c-formTable_th">自己紹介</th>
          <td class="c-formTable_td">
            <div class="c-formTextarea">
              <textarea placeholder="自己紹介を書いてみよう！" name="bio" cols="50" rows="10">
                <?php echo $user_bio; ?>
              </textarea>
            </div>
          </td>
        </tr>
        <tr>
          <th class="c-formTable_th">メールアドレス</th>
          <td class="c-formTable_td">
            <div class="c-formText">
                <input placeholder="example@email.com" name="email" type="text" value="<?php echo $user_email; ?>">
            </div>
          </td>
        </tr>
        <tr>
          <th class="c-formTable_th">ホームページ</th>
          <td colspan="2" class="c-formTable_td">
            <div class="c-formText">
              <input placeholder="https://blog.sauna-ikitai.com" name="web_url" type="text" value="<?php echo $user_weburl; ?>">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <input name="action" type="hidden" id="action" value="update_user" />
    <div class="c-form_button">
      <div class="c-button c-button--submit c-button--arrowRight">
        <a onclick="$(this).closest('form').get(0).submit(); return false"><span>登録</span></a>
      </div>
    </div>
</form><!-- form -->
</div><!-- class=content-width -->                            
</div><!-- class=form-wrap -->                
</div><!-- class=c-container -->
</div><!-- id=primary -->
</div><!-- class=pg7 -->
</main><!-- class=site-main -->
<?php get_footer(); // Loads the footer.php template. ?>