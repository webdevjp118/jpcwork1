<?php /* Template Name: Cuser Edit Backup */ ?>
<?php 
get_header(); 
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

if(!is_user_activated()) {
    wp_redirect(get_site_url().'/login');
}
?>
<div class="gbanner-sec">
</div>
<?php
/* Get user info. */

global $current_user, $wp_roles;
$user_id = $current_user->ID;
$user_data = $current_user;
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $user_data =  get_userdata($user_id);  
}
echo "<br><br><br>";
print_r($user_data);echo "<br><br><br>";
$user_id = $user_data->ID;
$user_editlink = get_site_url().'/cuser-edit?id='.$user_id;
$error = array();    
$user_firstname = '';
$user_lastname = '';
$user_gender = '';
$user_description = '';

if ( !empty( $_POST['first_name'] ) ) $user_firstname =  $_POST['first_name'];
else $user_firstname = $user_data->first_name;
if ( !empty( $_POST['last_name'] ) ) $user_lastname =  $_POST['last_name'];
else $user_lastname = $user_data->last_name;
if ( !empty( $_POST['gender'] ) ) $user_gender=  $_POST['gender']; 
else $user_gender = get_user_meta('gender', $user_id);
if ( !empty( $_POST['description'] ) ) $user_description = $_POST['description'];
else $user_description = $user_data->user_description;
/* If profile was saved, update profile. */
echo "here?";
print_r($_POST);
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update_user' ) {
    if ( !empty( $_POST['first_name'] ) ) wp_update_user( $user_data->ID, 'first_name', sanitize_text_field( $_POST['first_name'] ));
    if ( !empty( $_POST['last_name'] ) ) wp_update_user( $user_data->ID, 'last_name', sanitize_text_field( $_POST['last_name'] ));
    if ( !empty( $_POST['gender'] ) ) update_user_meta($user_data->ID, 'gender', esc_attr( $_POST['gender'] ));
    if ( !empty( $_POST['birthday'] ) ) update_user_meta($user_data->ID, 'birthday', esc_attr( $_POST['birthday'] ) );
    if ( !empty( $_POST['description'] ) ) wp_update_user( $user_data->ID, 'user_description', sanitize_text_field( $_POST['description'] ));
    // if ( !empty( $_POST['gender'] ) ) update_user_meta($user_data->ID, 'gender', esc_attr( $_POST['gender'] ) );
    // if ( !empty( $_POST['birthday'] ) ) update_user_meta($user_data->ID, 'birthday', esc_attr( $_POST['birthday'] ) );
    // if ( !empty( $_POST['history_ys'] ) ) update_user_meta($user_data->ID, 'history_ys', esc_attr( $_POST['history_ys'] ) );
    // if ( !empty( $_POST['history_ms'] ) ) update_user_meta($user_data->ID, 'history_ms', esc_attr( $_POST['history_ms'] ) );
    // if ( !empty( $_POST['home_laundry'] ) ) update_user_meta($user_data->ID, 'home_laundry', esc_attr( $_POST['home_laundry'] ) );
    // if ( !empty( $_POST['favorite_laundry'] ) ) update_user_meta($user_data->ID, 'favorite_laundry', esc_attr( $_POST['favorite_laundry'] ) );

    /* Update user information. */

    if ( !empty( $_POST['url'] ) )

       wp_update_user( array ('ID' => $user_data->ID, 'user_url' => esc_attr( $_POST['url'] )));

    if ( !empty( $_POST['email'] ) ){

        if (!is_email(esc_attr( $_POST['email'] )))

            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');

        elseif(email_exists(esc_attr( $_POST['email'] )) != $user_data->id )

            $error[] = __('This email is already used by another user.  try a different one.', 'profile');

        else{

            wp_update_user( array ('ID' => $user_data->ID, 'user_email' => esc_attr( $_POST['email'] )));

        }

    }


    

    

    if ( !empty( $_POST['description'] ) )

        update_user_meta( $user_data->ID, 'description', esc_attr( $_POST['description'] ) );

        

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

        //wp_redirect( get_site_url().'/cuser' ); exit;
    }       
}
echo "<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>";
echo $user_firstname;
echo $user_lastname;
?>

<?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
<div style="width:900px; margin:auto">

<form method="post" id="edituser" action="<?php echo $user_editlink; ?>" enctype="multipart/form-data">
    <p class="form-username">
        <label for="first_name"><?php _e('お名前 姓', 'profile'); ?></label>
        <input class="text-input" name="first_name" type="text" id="first_name" value="<?php echo $user_firstname; ?>" />
    </p><!-- .form-username -->
    <p class="form-username">
        <label for="last_name"><?php _e('お名前 名', 'profile'); ?></label>
        <input class="text-input" name="last_name" type="text" id="last_name" value="<?php echo $user_lastname; ?>" />
    </p><!-- .form-username -->
    <div style="display:flex">
        <span style="width:100px;">性別</span>
        <div>
            <input type="radio" id="gender-male" name="gender" value="male" <?php if($user_gender == 'male') echo "checked"; ?>>
            <label for="male">男性</label>
        </div>
        <div>
            <input type="radio" id="gender-female" name="gender" value="female" <?php if($user_gender == 'female') echo "checked"; ?>>
            <label for="gender-female">女性</label>
        </div>
    </div>
    <p class="form-username">
        <label for="description"><?php _e('自己紹介', 'profile'); ?></label>
        <input class="text-input" name="description" type="text" id="description" value="<?php echo $user_description; ?>" />
    </p><!-- .form-username -->
    <p class="form-username">
        <label for="birthday"><?php _e('生年月日', 'profile'); ?></label>
        <input class="text-input" name="birthday" type="text" id="birthday" value="<?php echo $user_birthday; ?>" />
    </p><!-- .form-username -->
    <p class="form-submit">

        <?php //echo $referer; ?>

        <input name="updateuser" type="submit" id="updateuser" class="submit button" value="Update" />

        <?php wp_nonce_field( 'update_user_'. $user_data->ID ) ?>

        <input name="action" type="hidden" id="action" value="update_user" />

    </p><!-- .form-submit -->

</form><!-- #edituser -->



<style>

    #postbox{

        width: 70%;

        margin: 0 auto;

    }

    #sidebar{

        width: 30%; 

    }

    .row{

        display:flex;

    }

    

    .entry-content{

        margin-top:-140px;

    }

    

    

    .wpcr3_respond_1 {

        display:none !important;

    }



</style>

<?php get_footer(); // Loads the footer.php template. ?>