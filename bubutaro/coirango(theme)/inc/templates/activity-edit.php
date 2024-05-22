<?php /* Template Name: Activity Edit */ ?>
<?php 
get_header(); 
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
if(!is_user_activated()) {
    wp_redirect(get_site_url().'/login');
}
wp_enqueue_media();

$current_user = wp_get_current_user();
$current_uname = $current_user->user_login;
$current_uid = $current_user->ID;

$activity_name = $current_uname;
$activity_id = '';
$activity_content = '';
$activity_photo = '';
$activity_visitno = 1;

$laundry_photo = '';
$laundry_id = '';

$error = '';

$activity_slug = '';

if(isset($_POST['activity_id']) || isset($_GET['id'])){
	if(isset($_POST['activity_id'])) $activity_id = $_POST['activity_id'];//This is page id or post id
	else if(isset($_GET['id'])) $activity_id = $_GET['id'];
	if(!empty($activity_id)) {
		$activity_post = get_post($activity_id);
		$activity_meta = get_post_meta($activity_id);
		$laundry_id = get_post_meta( $activity_id, 'laundry_id', true );
		$activity_date = get_post_meta( $activity_id, 'activity_date', true );
		$activity_content = get_post_meta( $activity_id, 'activity_content', true );

		$activity_washer_count = get_post_meta( $activity_id, 'activity_washer_count', true );
		$activity_washer_text = get_post_meta( $activity_id, 'activity_washer_text', true );
		$activity_washdryer_count = get_post_meta( $activity_id, 'activity_washdryer_count', true );
		$activity_washdryer_text = get_post_meta( $activity_id, 'activity_washdryer_text', true );
		$activity_dryer_count = get_post_meta( $activity_id, 'activity_dryer_count', true );
		$activity_dryer_text = get_post_meta( $activity_id, 'activity_dryer_text', true );

		$activity_photo =  get_post_meta( $activity_id, 'activity_photo', true );	
	}
}
if(isset($_GET['laundry_id'])) $laundry_id = $_GET['laundry_id'];
if(isset($_POST['laundry_id'])) $laundry_id = $_POST['laundry_id'];
if(empty($laundry_id)) {
    wp_redirect(get_site_url().'/all-activity');
}

if(!empty($laundry_id)) {
    $laundry_post = get_post($laundry_id);
    $laundry_name = $laundry_post->post_title;
}

if(empty($activity_photo)) $activity_photo = get_stylesheet_directory_uri()."/images/noimage.png";

$laundry_user_activities_query = new WP_Query( 
    array(
        'post_type' => 'activity',
        'post_author' => $current_uid,
        'meta_query' => array(
        'relation' => 'OR',
            array(
                'key' => 'laundry_id',
                'value' => $laundry_id,
            ),
        ),
    )
);
    
$activity_visitno = $laundry_user_activities_query->found_posts;
$activity_visitno = $activity_visitno + 1;

if( isset($_POST['action']) && $_POST['action'] == 'add_activity' ) { // Check what the post type is here instead
        // Do some minor form validation to make sure there is content
    if ($_POST['activity_date'] != '' ) { $activity_date =  $_POST['activity_date']; } else $activity_date = '';
    if ($_POST['activity_content'] != '' ) { $activity_content =  $_POST['activity_content']; } else $activity_content = '';

    if ($_POST['activity_washer_count'] > 0 ) { $activity_washer_count =  $_POST['activity_washer_count']; } else $activity_washer_count = 0;
    if ($_POST['activity_washer_text'] != '' ) { $activity_washer_text =  $_POST['activity_washer_text']; } else $activity_washer_text = '';
    if ($_POST['activity_washdryer_count'] > 0 ) { $activity_washdryer_count =  $_POST['activity_washdryer_count']; } else $activity_washdryer_count = 0;
    if ($_POST['activity_washdryer_text'] != '' ) { $activity_washdryer_text =  $_POST['activity_washdryer_text']; } else $activity_washdryer_text = '';
    if ($_POST['activity_dryer_count'] > 0 ) { $activity_dryer_count =  $_POST['activity_dryer_count']; } else $activity_dryer_count = 0;
    if ($_POST['activity_dryer_text'] != '' ) { $activity_dryer_text =  $_POST['activity_dryer_text']; } else $activity_dryer_text = '';
	print_val("hello0");
    if($error == ''){
		print_val("hello1");
        if(isset($_POST['id'])){
            $activity_slug = get_post_field( 'post_name', $activity_id );
			print_val("hello2");
            
        }else{
			print_val("hello3");
            // Add the content of the form to $post as an array
            if(empty($activity_name)) $activity_name='admin';
            $post = array(
                'post_title'	=> $activity_name,
                'post_content'	=> '',
                'post_status'	=> 'publish', 
                'post_type'		=> 'activity' ,
                'post_author'   => get_current_user_id()
            );
            $activity_id = wp_insert_post($post);   
            $activity_slug = $activity_id;
            wp_update_post(
                array (
                    'ID'        => $activity_id,
                    'post_name' => $activity_slug
                )
            );
            $activity_slug = get_post_field( 'post_name', $activity_id );
        }
        print_val("hello4");
		print_val($activity_id);
        update_post_meta( $activity_id, 'laundry_id', $laundry_id );
        update_post_meta( $activity_id, 'activity_visitno', $activity_visitno ); 
        update_post_meta( $activity_id, 'activity_date', $activity_date);

        update_post_meta( $activity_id, 'activity_content', $activity_content );
        
        update_post_meta( $activity_id, 'activity_washer_count', $activity_washer_count );
        update_post_meta( $activity_id, 'activity_washer_text', sanitize_text_field($activity_washer_text) );
        update_post_meta( $activity_id, 'activity_washdryer_count', $activity_washdryer_count );
        update_post_meta( $activity_id, 'activity_washdryer_text', sanitize_text_field($activity_washdryer_text) );
        update_post_meta( $activity_id, 'activity_dryer_count', $activity_dryer_text );
        update_post_meta( $activity_id, 'activity_dryer_text', sanitize_text_field($activity_dryer_text) );
            
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
			print_val($imageurl);
            update_post_meta( $activity_id, 'activity_photo', $imageurl );
        }
        wp_redirect(get_site_url().'/activity\/'.$activity_slug);
    }
} 
?>
    
<div class="gbanner-sec">
    <h1>お洗活</h1>
</div>
<?php 

?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<div class="pg13">
<div class="c-container">
<?php
if ( !empty($error) ){
    echo "<div class='error-box'>";
    echo '<p><strong>';
    echo '<span class="icon-warning-sign"> </span>'.$error;
    echo '</strong></p>';
    echo "</div>";
}
?>
<div class="hr-space30">
</div>
<form method="POST" action="<?php echo get_site_url(); ?>/activity-edit" accept-charset="UTF-8" class="c-form" enctype="multipart/form-data">
<input name="action" type="hidden" id="action" value="add_activity" />
<?php if(!empty($activity_id)) : ?>
<input name="activity_id" type="hidden" id="activity_id" value="<?php echo $activity_id; ?>" />
<?php endif; ?>	
<?php if(!empty($laundry_id)) : ?>
<input name="laundry_id" type="hidden" id="laundry_id" value="<?php echo $laundry_id; ?>" />
<?php endif; ?>	
<div class="form-wrap">
<div class="content-width">
<h2><?php echo $laundry_name; ?></h2>  
<table class="c-formTable">
    <tbody>
        <tr>
            <th class="c-formTable_th">
                <div class="visit-datecap">訪問日</div>
                <div class="c-formText c-formText--md">
                    <input id="datepicker1" name="activity_date" type="text" value="<?php echo $activity_date; ?>">
                </div>
            </th>
            <td class="c-formTable_td">
                
            </td>
        </tr>
    </tbody>
</table>
<div class="c-formTextarea">
    <textarea id="activity_content" name="activity_content" maxlength="1200" cols="50" rows="30"><?php echo $activity_content; ?></textarea>
</div>
<div class="photo-line">
    <div class="photo-div">
        <div id="photo-preview" class="circlediv" style="background-image:url(<?php echo $activity_photo; ?>);">
        </div>
        <div class="modify-photo">
            <span class="btn_upload">
            <input type="file" id="profile-fileinput" title="" class="input-img" name="uploadedfile"/>
            画像を追加
            </span>
        </div>
    </div>
</div>
<div class="hr-space30">
</div>
<table class="c-formTable">
    <tbody>
        <tr>
            <th class="c-formTable_th">洗濯機</th>
            <td colspan="2" class="c-formTable_td">
                <div class="c-formText c-formText--md c-formText--inlineBlock">
                    <input placeholder="" name="activity_washer_text" type="text" value="<?php echo $activity_washer_text; ?>">
                </div>
                <div class="c-formText c-formText--md c-formText--inlineBlock">
                    <input placeholder="" name="activity_washer_count" type="number" value="<?php echo $activity_washer_count; ?>">
                </div>
                台
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">洗濯乾燥機</th>
            <td colspan="2" class="c-formTable_td">
                <div class="c-formText c-formText--md c-formText--inlineBlock">
                    <input placeholder="" name="activity_washdryer_text" type="text" value="<?php echo $activity_washdryer_text; ?>">
                </div>
                <div class="c-formText c-formText--md c-formText--inlineBlock">
                    <input placeholder="" name="activity_washdryer_count" type="number" value="<?php echo $activity_washdryer_count; ?>">
                </div>
                台
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">乾燥機</th>
            <td colspan="2" class="c-formTable_td">
                <div class="c-formText c-formText--md c-formText--inlineBlock">
                    <input placeholder="" name="activity_dryer_text" type="text" value="<?php echo $activity_dryer_text; ?>">
                </div>
                <div class="c-formText c-formText--md c-formText--inlineBlock">
                    <input placeholder="" name="activity_dryer_count" type="number" value="<?php echo $activity_dryer_count; ?>">
                </div>
                台
            </td>
        </tr>
    </tbody>
</table>
<div class="c-form_button">
    <div class="c-button c-button--submit c-button--arrowRight">
    	<a onclick="$(this).closest('form').get(0).submit(); return false"><span>投稿する</span></a>
    </div>
</div>
</div><!-- class=content-width -->                            
</div><!-- class=form-wrap --> 

</form><!-- form -->
</div><!-- class=c-container -->
</div><!-- id=primary -->
</div><!-- class=pg7 -->
</main><!-- class=site-main -->

<?php get_footer(); ?>