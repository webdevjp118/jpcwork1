<?php /* Template Name: Laundry Edit */ ?>
<?php 
get_header(); 
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
if(!is_user_activated()) {
    wp_redirect(get_site_url().'/login');
}
wp_enqueue_media();

//constants
$max_input_count = 5;

$post_id = '';
$laundry_name = '';
$laundry_photo = '';
$error = '';
$url_ext = '';

$laundry_province = '';
$laundry_address1 = '';
$laundry_address2 = '';
$laundry_address3 = '';
$laundry_postbox = '';
$laundry_phone = '';
$laundry_weburl = '';
$laundry_mapurl = '';

$laundry_washer_count = array_fill(0, $max_input_count, '');
$laundry_washer_text = array_fill(0, $max_input_count, '');
$laundry_washdryer_count = array_fill(0, $max_input_count, '');
$laundry_washdryer_text = array_fill(0, $max_input_count, '');
$laundry_dryer_count = array_fill(0, $max_input_count, '');
$laundry_dryer_text = array_fill(0, $max_input_count, '');
$laundry_quiltwashdryer_count = array_fill(0, $max_input_count, '');
$laundry_quiltwashdryer_text = array_fill(0, $max_input_count, '');
$laundry_quiltdryer_count = array_fill(0, $max_input_count, '');
$laundry_quiltdryer_text = array_fill(0, $max_input_count, '');


$laundry_shoewasher_count = '';
$laundry_moneychanger10000 = '';
$laundry_moneychanger5000 = '';
$laundry_moneychanger2000 = '';
$laundry_moneychanger1000 = '';
$laundry_moneychanger500 = '';
$laundry_parkingslot_count = '';
$laundry_is_vendingmachine = '';
$laundry_is_camera = '';
$laundry_is_toilet = '';
$laundry_is_autodoor = '';

$laundry_moreinfo = '';
$laundry_is_work24 = '';
$laundry_is_freewifi = '';
$laundry_is_lendpower = '';
$laundry_is_tv = '';
$laundry_is_radio = '';
$laundry_is_bgm = '';

$laundry_viewno = '';

if(isset($_GET['id'])){
    $post_id = $_GET['id'];
}

if(!empty($post_id)){
    $content_post = get_post($post_id);
    $laundry_name = $content_post->post_title;
    $laundry_photo = get_post_meta( $post_id, 'laundry_photo', true );
    $laundry_province = get_post_meta( $post_id, 'laundry_province', true );
    $laundry_address1 = get_post_meta( $post_id, 'laundry_address1', true );
    $laundry_address2 = get_post_meta( $post_id, 'laundry_address2', true );
    $laundry_address3 = get_post_meta( $post_id, 'laundry_address3', true );

    $laundry_weburl = get_post_meta( $post_id, 'laundry_weburl', true );
    $laundry_postbox = get_post_meta( $post_id, 'laundry_postbox', true );
    $laundry_phone = get_post_meta( $post_id, 'laundry_phone', true );
    $laundry_mapurl = get_post_meta( $post_id, 'laundry_mapurl', true );

    for($i=0;$i<$max_input_count;$i++) {
        $laundry_washer_count[$i] = get_post_meta( $post_id, 'laundry_washer_count'.$i, true );
        $laundry_washer_text[$i] = get_post_meta( $post_id, 'laundry_washer_text'.$i, true );
        $laundry_washdryer_count[$i] = get_post_meta( $post_id, 'laundry_washdryer_count'.$i, true );
        $laundry_washdryer_text[$i] = get_post_meta( $post_id, 'laundry_washdryer_text'.$i, true );
        $laundry_dryer_count[$i] = get_post_meta( $post_id, 'laundry_dryer_count'.$i, true );
        $laundry_dryer_text[$i] = get_post_meta( $post_id, 'laundry_dryer_text'.$i, true );
        $laundry_quiltwashdryer_count[$i] = get_post_meta( $post_id, 'laundry_quiltwashdryer_count'.$i, true );
        $laundry_quiltwashdryer_text[$i] = get_post_meta( $post_id, 'laundry_quiltwashdryer_text'.$i, true );
        $laundry_quiltdryer_count[$i] = get_post_meta( $post_id, 'laundry_quiltdryer_count'.$i, true );
        $laundry_quiltdryer_text[$i] = get_post_meta( $post_id, 'laundry_quiltdryer_text'.$i, true );
    }
    
    $laundry_shoewasher_count = get_post_meta( $post_id, 'laundry_shoewasher_count', true );
    $laundry_moneychanger10000 = get_post_meta( $post_id, 'laundry_moneychanger10000', true );
    $laundry_moneychanger5000 = get_post_meta( $post_id, 'laundry_moneychanger5000', true );
    $laundry_moneychanger2000 = get_post_meta( $post_id, 'laundry_moneychanger2000', true );
    $laundry_moneychanger1000 = get_post_meta( $post_id, 'laundry_moneychanger1000', true );
    $laundry_moneychanger500 = get_post_meta( $post_id, 'laundry_moneychanger500', true );
    $laundry_parkingslot_count = get_post_meta( $post_id, 'laundry_parkingslot_count', true );
    $laundry_is_vendingmachine = get_post_meta( $post_id, 'laundry_is_vendingmachine', true );
    $laundry_is_camera = get_post_meta( $post_id, 'laundry_is_camera', true );
    $laundry_is_toilet = get_post_meta( $post_id, 'laundry_is_toilet', true );
    $laundry_is_autodoor = get_post_meta( $post_id, 'laundry_is_autodoor', true );

    $laundry_moreinfo = get_post_meta( $post_id, 'laundry_moreinfo', true );
    $laundry_is_work24 = get_post_meta( $post_id, 'laundry_is_work24', true );
    $laundry_is_freewifi = get_post_meta( $post_id, 'laundry_is_freewifi', true );
    $laundry_is_lendpower = get_post_meta( $post_id, 'laundry_is_lendpower', true );
    $laundry_is_tv = get_post_meta( $post_id, 'laundry_is_tv', true );
    $laundry_is_radio = get_post_meta( $post_id, 'laundry_is_radio', true );
    $laundry_is_bgm = get_post_meta( $post_id, 'laundry_is_bgm', true );

}
if(empty($laundry_photo)) {
    $laundry_photo = get_stylesheet_directory_uri()."/images/noimage.png";
}

if( isset($_POST['action']) && $_POST['action'] == 'add_laundry' ) { // Check what the post type is here instead

    // Do some minor form validation to make sure there is content
    if ($_POST['laundry_name'] != '' ) { $laundry_name =  $_POST['laundry_name']; } else { $error .=  '施設名：なし'; }
    if ($_POST['laundry_province'] != '' ) { $laundry_province =  $_POST['laundry_province']; } else $laundry_province = '';
    if ($_POST['laundry_address1'] != '' ) { $laundry_address1 =  $_POST['laundry_address1']; } else $laundry_address1 = '';
    if ($_POST['laundry_address2'] != '' ) { $laundry_address2 =  $_POST['laundry_address2']; } else $laundry_address2 = '';
    if ($_POST['laundry_address3'] != '' ) { $laundry_address3 =  $_POST['laundry_address3']; } else $laundry_address3 = '';
    if ($_POST['laundry_postbox'] != '' ) { $laundry_postbox =  $_POST['laundry_postbox']; } else $laundry_postbox = '';
    if ($_POST['laundry_phone'] != '' ) { $laundry_phone =  $_POST['laundry_phone']; } else $laundry_phone = '';
    if ($_POST['laundry_weburl'] != '' ) { $laundry_weburl =  $_POST['laundry_weburl']; } else $laundry_weburl = '';
    if ($_POST['laundry_mapurl'] != '' ) { $laundry_mapurl =  $_POST['laundry_mapurl']; } else $laundry_mapurl = '';

    for($i=0;$i<$max_input_count;$i++) {
        if ($_POST['laundry_washer_count'.$i] > 0 ) { $laundry_washer_count[$i] =  $_POST['laundry_washer_count'.$i]; } else $laundry_washer_count[$i] = '';
        if ($_POST['laundry_washer_text'.$i] != '' ) { $laundry_washer_text[$i] =  $_POST['laundry_washer_text'.$i]; } else $laundry_washer_text[$i] = '';
        if ($_POST['laundry_washdryer_count'.$i] > 0 ) { $laundry_washdryer_count[$i] =  $_POST['laundry_washdryer_count'.$i]; } else $laundry_washdryer_count[$i] = '';
        if ($_POST['laundry_washdryer_text'.$i] != '' ) { $laundry_washdryer_text[$i] =  $_POST['laundry_washdryer_text'.$i]; } else $laundry_washdryer_text[$i] = '';
        if ($_POST['laundry_dryer_count'.$i] > 0 ) { $laundry_dryer_count[$i] =  $_POST['laundry_dryer_count'.$i]; } else $laundry_dryer_count[$i] = '';
        if ($_POST['laundry_dryer_text'.$i] != '' ) { $laundry_dryer_text[$i] =  $_POST['laundry_dryer_text'.$i]; } else $laundry_dryer_text[$i] = '';
        if ($_POST['laundry_quiltwashdryer_count'.$i] > 0 ) { $laundry_quiltwashdryer_count[$i] =  $_POST['laundry_quiltwashdryer_count'.$i]; } else $laundry_quiltwashdryer_count[$i] = '';
        if ($_POST['laundry_quiltwashdryer_text'.$i] != '' ) { $laundry_quiltwashdryer_text[$i] =  $_POST['laundry_quiltwashdryer_text'.$i]; } else $laundry_quiltwashdryer_text[$i] = '';
        if ($_POST['laundry_quiltdryer_count'.$i] > 0 ) { $laundry_quiltdryer_count[$i] =  $_POST['laundry_quiltdryer_count'.$i]; } else $laundry_quiltdryer_count[$i] = '';
        if ($_POST['laundry_quiltdryer_text'.$i] != '' ) { $laundry_quiltdryer_text[$i] =  $_POST['laundry_quiltdryer_text'.$i]; } else $laundry_quiltdryer_text[$i] = '';
    }

    if ($_POST['laundry_shoewasher_count'] > 0 ) { $laundry_shoewasher_count =  $_POST['laundry_shoewasher_count']; } else $laundry_shoewasher_count = '';
    if ($_POST['laundry_moneychanger10000'] != '' ) { $laundry_moneychanger10000 =  $_POST['laundry_moneychanger10000']; } else $laundry_moneychanger10000 = '';
    if ($_POST['laundry_moneychanger5000'] != '' ) { $laundry_moneychanger5000 =  $_POST['laundry_moneychanger5000']; } else $laundry_moneychanger5000 = '';
    if ($_POST['laundry_moneychanger2000'] != '' ) { $laundry_moneychanger2000 =  $_POST['laundry_moneychanger2000']; } else $laundry_moneychanger2000 = '';
    if ($_POST['laundry_moneychanger1000'] != '' ) { $laundry_moneychanger1000 =  $_POST['laundry_moneychanger1000']; } else $laundry_moneychanger1000 = '';
    if ($_POST['laundry_moneychanger500'] != '' ) { $laundry_moneychanger500 =  $_POST['laundry_moneychanger500']; } else $laundry_moneychanger500 = '';
    if ($_POST['laundry_parkingslot_count'] != '' ) { $laundry_parkingslot_count =  $_POST['laundry_parkingslot_count']; } else $laundry_parkingslot_count = ''; 
    if ($_POST['laundry_is_vendingmachine'] != '' ) { $laundry_is_vendingmachine =  $_POST['laundry_is_vendingmachine']; } else $laundry_is_vendingmachine = ''; 
    if ($_POST['laundry_is_camera'] != '' ) { $laundry_is_camera =  $_POST['laundry_is_camera']; } else $laundry_is_camera = '';
    if ($_POST['laundry_is_toilet'] != '' ) { $laundry_is_toilet =  $_POST['laundry_is_toilet']; } else $laundry_is_toilet = '';
    if ($_POST['laundry_is_autodoor'] != '' ) { $laundry_is_autodoor =  $_POST['laundry_is_autodoor']; } else $laundry_is_autodoor = '';

    if ($_POST['laundry_moreinfo'] != '' ) { $laundry_moreinfo =  $_POST['laundry_moreinfo']; } else $laundry_moreinfo = '';
    if ($_POST['laundry_is_work24'] != '' ) { $laundry_is_work24 =  $_POST['laundry_is_work24']; } else $laundry_is_work24 = '';
    if ($_POST['laundry_is_freewifi'] != '' ) { $laundry_is_freewifi =  $_POST['laundry_is_freewifi']; } else $laundry_is_freewifi = '';
    if ($_POST['laundry_is_lendpower'] != '' ) { $laundry_is_lendpower =  $_POST['laundry_is_lendpower']; } else $laundry_is_lendpower = '';
    if ($_POST['laundry_is_tv'] != '' ) { $laundry_is_tv =  $_POST['laundry_is_tv']; } else $laundry_is_tv = '';
    if ($_POST['laundry_is_radio'] != '' ) { $laundry_is_radio =  $_POST['laundry_is_radio']; } else $laundry_is_radio = '';
    if ($_POST['laundry_is_bgm'] != '' ) { $laundry_is_bgm =  $_POST['laundry_is_bgm']; } else $laundry_is_bgm = '';
    
    if($error == ''){
        // Add the content of the form to $post as an array
        
        if(!empty($post_id)){ //Edit Laundry 
            $post = array(
                'post_title'	=> $laundry_name,
            );
            $post['ID'] = $post_id;
            wp_update_post($post);
            $laundry_viewno = get_post_field( 'post_name', $post_id );
        } else { //Add Laundry
            $post = array(
                'post_title'	=> $laundry_name,
                'post_content'	=> '',
                'post_status'	=> 'publish', 
                'post_type'		=> 'laundry' ,
                'post_author'   => get_current_user_id()
            );
            $post_id = wp_insert_post($post);   
            $laundry_viewno = $post_id;
            wp_update_post(
                array (
                    'ID'        => $post_id,
                    'post_name' => $laundry_viewno
                )
            );
            $laundry_viewno = get_post_field( 'post_name', $post_id );
        }
        
        update_post_meta( $post_id, 'laundry_province', sanitize_text_field( $laundry_province ) );
        update_post_meta( $post_id, 'laundry_address1', sanitize_text_field( $laundry_address1 ) );
        update_post_meta( $post_id, 'laundry_address2', sanitize_text_field( $laundry_address2 ) );
        update_post_meta( $post_id, 'laundry_address3', sanitize_text_field( $laundry_address3 ) );
        update_post_meta( $post_id, 'laundry_postbox', sanitize_text_field( $laundry_postbox ) );
        update_post_meta( $post_id, 'laundry_phone', sanitize_text_field( $laundry_phone ) );
        update_post_meta( $post_id, 'laundry_weburl', sanitize_text_field( $laundry_weburl ) );
        update_post_meta( $post_id, 'laundry_mapurl', sanitize_text_field( $laundry_mapurl ) );

        for($i=0;$i<$max_input_count;$i++) {
            update_post_meta( $post_id, 'laundry_washer_count'.$i, $laundry_washer_count[$i] );
            update_post_meta( $post_id, 'laundry_washer_text'.$i, sanitize_text_field( $laundry_washer_text[$i] ) );
            update_post_meta( $post_id, 'laundry_washdryer_count'.$i,  $laundry_washdryer_count[$i] );
            update_post_meta( $post_id, 'laundry_washdryer_text'.$i, sanitize_text_field( $laundry_washdryer_text[$i] ) );
            update_post_meta( $post_id, 'laundry_dryer_count'.$i,  $laundry_dryer_count[$i]  );
            update_post_meta( $post_id, 'laundry_dryer_text'.$i, sanitize_text_field( $laundry_dryer_text[$i] ) );
            update_post_meta( $post_id, 'laundry_quiltwashdryer_count'.$i,  $laundry_quiltwashdryer_count[$i]  );
            update_post_meta( $post_id, 'laundry_quiltwashdryer_text'.$i, sanitize_text_field( $laundry_quiltwashdryer_text[$i] ) );
            update_post_meta( $post_id, 'laundry_quiltdryer_count'.$i,  $laundry_quiltdryer_count[$i]  );
            update_post_meta( $post_id, 'laundry_quiltdryer_text'.$i, sanitize_text_field( $laundry_quiltdryer_text[$i] ) );
        }
        update_post_meta( $post_id, 'laundry_shoewasher_count', sanitize_text_field( $laundry_shoewasher_count ) );
        update_post_meta( $post_id, 'laundry_moneychanger10000', sanitize_text_field( $laundry_moneychanger10000 ) );
        update_post_meta( $post_id, 'laundry_moneychanger5000', sanitize_text_field( $laundry_moneychanger5000 ) );
        update_post_meta( $post_id, 'laundry_moneychanger2000', sanitize_text_field( $laundry_moneychanger2000 ) );
        update_post_meta( $post_id, 'laundry_moneychanger1000', sanitize_text_field( $laundry_moneychanger1000 ) );
        update_post_meta( $post_id, 'laundry_moneychanger500', sanitize_text_field( $laundry_moneychanger500 ) );
        update_post_meta( $post_id, 'laundry_parkingslot_count', sanitize_text_field( $laundry_parkingslot_count ) );
        update_post_meta( $post_id, 'laundry_is_vendingmachine', sanitize_text_field( $laundry_is_vendingmachine ) );
        update_post_meta( $post_id, 'laundry_is_camera', sanitize_text_field( $laundry_is_camera ) );
        update_post_meta( $post_id, 'laundry_is_toilet', sanitize_text_field( $laundry_is_toilet ) );
        update_post_meta( $post_id, 'laundry_is_autodoor', sanitize_text_field( $laundry_is_autodoor ) );
        
        update_post_meta( $post_id, 'laundry_moreinfo', $laundry_moreinfo );
        update_post_meta( $post_id, 'laundry_is_work24', sanitize_text_field( $laundry_is_work24 ) );
        update_post_meta( $post_id, 'laundry_is_freewifi', sanitize_text_field( $laundry_is_freewifi ) );
        update_post_meta( $post_id, 'laundry_is_lendpower', sanitize_text_field( $laundry_is_lendpower ) );
        update_post_meta( $post_id, 'laundry_is_tv', sanitize_text_field( $laundry_is_tv ) );
        update_post_meta( $post_id, 'laundry_is_radio', sanitize_text_field( $laundry_is_radio ) );
        update_post_meta( $post_id, 'laundry_is_bgm', sanitize_text_field( $laundry_is_bgm ) );

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
            update_post_meta( $post_id, 'laundry_photo', $imageurl );
        }
        wp_redirect(get_site_url().'/laundry\/'.$laundry_viewno);
    }
}
?>
    
<div class="gbanner-sec">
    <h1>コインランドリー店舗登録</h1>
</div>

<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<div class="pg11">
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
<div class="hr-space30 cpc">
</div>
<form method="POST" action="<?php echo get_site_url(); ?>/laundry-edit?id=<?php echo $post_id; ?>" accept-charset="UTF-8" class="c-form" enctype="multipart/form-data">
<input name="action" type="hidden" id="action" value="add_laundry" />
<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
<div class="form-wrap">
<div class="content-width">
<h2>店舗情報</h2>  
<table class="c-formTable">
    <tbody>
        <tr>
            <th class="c-formTable_th">施設名</th>
            <td colspan="2" class="c-formTable_td">
                <div class="c-formText">
                <input placeholder="例）●●コインランドリー" name="laundry_name" type="text" value="<?php echo $laundry_name; ?>">
                </div>
            </td>
        </tr>
    </tbody>
</table>
<div class="photo-line">
    <table class="c-formTable">
        <tbody>
            <tr>
                <th class="c-formTable_th">都道府県</th>
                <td class="c-formTable_td">
                    <div class="c-formSelect">
                        <select name="laundry_province">
<?php
    $allprovince = [""=>"","hokkaido"=>"北海道","aomori"=>"青森県","iwate"=>"岩手県","miyagi"=>"宮城県","akita"=>"秋田県","yamagata"=>"山形県","fukushima"=>"福島県","ibaraki"=>"茨城県","tochigi"=>"栃木県","gunma"=>"群馬県","saitama"=>"埼玉県","chiba"=>"千葉県","tokyo"=>"東京都","kanagawa"=>"神奈川県","niigata"=>"新潟県","toyama"=>"富山県","ishikawa"=>"石川県","fukui"=>"福井県","yamanashi"=>"山梨県","nagano"=>"長野県","gifu"=>"岐阜県","shizuoka"=>"静岡県","aichi"=>"愛知県","mie"=>"三重県","shiga"=>"滋賀県","kyoto"=>"京都府","osaka"=>"大阪府","hyogo"=>"兵庫県","nara"=>"奈良県","wakayama"=>"和歌山県","tottori"=>"鳥取県","shimane"=>"島根県","okayama"=>"岡山県","hiroshima"=>"広島県","yamaguchi"=>"山口県","tokushima"=>"徳島県","kagawa"=>"香川県","ehime"=>"愛媛県","kochi"=>"高知県","fukuoka"=>"福岡県","saga"=>"佐賀県","nagasaki"=>"長崎県","kumamoto"=>"熊本県","oita"=>"大分県","miyazaki"=>"宮崎県","kagoshima"=>"鹿児島県","okinawa"=>"沖縄県"];
    foreach($allprovince as $key=>$value) {
        $checked = ($value == $laundry_province)?'selected="selected"':'';
        echo '<option value="'.$value.'" '.$checked.' >'.$value.'</option>';
    }
?>
                    </div>
            </td>
            </tr>
            <tr>
                <th class="c-formTable_th">郵便番号</th>
                <td colspan="2" class="c-formTable_td">
                    <div class="c-formText">
                    <input placeholder="例）1231234" name="laundry_postbox" type="number" value="<?php echo $laundry_postbox; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <th class="c-formTable_th">住所1</th>
                <td colspan="2" class="c-formTable_td">
                    <div class="c-formText">
                    <input placeholder="市区　例：渋谷区" name="laundry_address1" type="text" value="<?php echo $laundry_address1; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <th class="c-formTable_th">住所2</th>
                <td colspan="2" class="c-formTable_td">
                    <div class="c-formText">
                    <input placeholder="町村番地　例：笹塚1-58-6" name="laundry_address2" type="text" value="<?php echo $laundry_address2; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <th class="c-formTable_th">住所3</th>
                <td colspan="2" class="c-formTable_td">
                    <div class="c-formText">
                    <input placeholder="ビル名　例：マルシンビル10F" name="laundry_address3" type="text" value="<?php echo $laundry_address3; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <th class="c-formTable_th">TEL</th>
                <td colspan="2" class="c-formTable_td">
                    <div class="c-formText">
                    <input placeholder="例）0001112222 ※ハイフン不要" name="laundry_phone" type="number" value="<?php echo $laundry_phone; ?>">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="photo-div">
        <div id="photo-preview" class="c-circlediv" style="background-image:url(<?php echo $laundry_photo; ?>);">
        </div>
        <div class="c-modify-photo">
            <span class="c-btn-upload">
                <input type="file" id="profile-fileinput" title="" class="input-img" name="uploadedfile"/>
                画像を追加
            </span>
        </div>
    </div>
</div>
<table class="c-formTable">
    <tbody>
        <tr>
            <th class="c-formTable_th">HP</th>
            <td colspan="2" class="c-formTable_td">
                <div class="c-formText">
                <input placeholder="" name="laundry_weburl" type="text" value="<?php echo $laundry_weburl; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">Google Map</th>
            <td colspan="2" class="c-formTable_td">
                <div class="c-formText">
                <input placeholder="" name="laundry_mapurl" type="text" value="<?php echo $laundry_mapurl; ?>">
                </div>
                <a class="select-map" target="_blank" href="https://www.google.com/maps">マップ上で選択</a>
            </td>
        </tr>
    </tbody>
</table>
<div class="c-form_button">
    <div class="c-button c-button--submit c-button--arrowRight">
    <a onclick="$(this).closest('form').get(0).submit(); return false"><span>登録</span></a>
    </div>
</div>
</div><!-- class=content-width -->                            
</div><!-- class=form-wrap -->                

<div class="hr-space30">
</div>
<div class="form-wrap">
<div class="content-width">
<h2>メイン情報</h2>  
<table class="c-formTable">
    <tbody>
        <tr>
            <th class="c-formTable_th">洗濯機</th>
            <td colspan="2" class="c-formTable_td">
                <p class="notice-p">※フリー入力は、特大、大、中、小、LL、M、S、35㎏、27㎏、17㎏等　サイズ感がわかるようにわかりやすく自由に入力してください。</p>
<?php for($i=0;$i<$max_input_count;$i++): ?>
                <div class="hr-space20"></div>
                <div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="例）フリー入力" name="laundry_washer_text<?php echo $i; ?>" type="text" value="<?php echo $laundry_washer_text[$i]; ?>">
                    </div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="" name="laundry_washer_count<?php echo $i; ?>" type="number" value="<?php echo $laundry_washer_count[$i]; ?>">
                    </div>
                    台
                </div>
<?php endfor; ?>
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">洗濯乾燥機</th>
            <td colspan="2" class="c-formTable_td">
<?php for($i=0;$i<$max_input_count;$i++): ?>
                <div class="hr-space20"></div>
                <div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="例）フリー入力" name="laundry_washdryer_text<?php echo $i; ?>" type="text" value="<?php echo $laundry_washdryer_text[$i]; ?>">
                    </div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="" name="laundry_washdryer_count<?php echo $i; ?>" type="number" value="<?php echo $laundry_washdryer_count[$i]; ?>">
                    </div>
                    台
                </div>
<?php endfor; ?>
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">乾燥機</th>
            <td colspan="2" class="c-formTable_td">
<?php for($i=0;$i<$max_input_count;$i++): ?>
                <div class="hr-space20"></div>
                <div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="例）フリー入力" name="laundry_dryer_text<?php echo $i; ?>" type="text" value="<?php echo $laundry_dryer_text[$i]; ?>">
                    </div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="" name="laundry_dryer_count<?php echo $i; ?>" type="number" value="<?php echo $laundry_dryer_count[$i]; ?>">
                    </div>
                    台
                </div>
<?php endfor; ?>
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">シューズランドリー</th>
            <td colspan="2" class="c-formTable_td">
                <div class="c-formText c-formText--md c-formText--inlineBlock">
                    <input placeholder="" name="laundry_shoewasher_count" type="number" value="<?php echo $laundry_shoewasher_count; ?>">
                </div>
                台
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">ふとん洗濯乾燥機</th>
            <td colspan="2" class="c-formTable_td">
<?php for($i=0;$i<$max_input_count;$i++): ?>
                <div class="hr-space20"></div>
                <div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="例）フリー入力" name="laundry_quiltwashdryer_text<?php echo $i; ?>" type="text" value="<?php echo $laundry_quiltwashdryer_text[$i]; ?>">
                    </div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="" name="laundry_quiltwashdryer_count<?php echo $i; ?>" type="number" value="<?php echo $laundry_quiltwashdryer_count[$i]; ?>">
                    </div>
                    台
                </div>
<?php endfor; ?>
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">ふとん乾燥機</th>
            <td colspan="2" class="c-formTable_td">
<?php for($i=0;$i<$max_input_count;$i++): ?>
                <div class="hr-space20"></div>
                <div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="例）フリー入力" name="laundry_quiltdryer_text<?php echo $i; ?>" type="text" value="<?php echo $laundry_quiltdryer_text[$i]; ?>">
                    </div>
                    <div class="c-formText c-formText--md c-formText--inlineBlock">
                        <input placeholder="" name="laundry_quiltdryer_count<?php echo $i; ?>" type="number" value="<?php echo $laundry_quiltdryer_count[$i]; ?>">
                    </div>
                    台
                </div>
<?php endfor; ?>
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">駐車場</th>
            <td colspan="2" class="c-formTable_td">
                <div class="c-formText c-formText--md c-formText--inlineBlock">
                    <input placeholder="" name="laundry_parkingslot_count" type="number" value="<?php echo $laundry_parkingslot_count; ?>">
                </div>
                台分
            </td>
        </tr>
        <tr>
            <th class="c-formTable_th">両替機</th>
            <td class="c-formTable_td">
                <div class="c-formCheckbox">
                    <input id="laundry_moneychanger10000" <?php echo ($laundry_moneychanger10000 == '10000')?'checked="checked"':''?> name="laundry_moneychanger10000" type="checkbox" value="10000">
                    <label for="laundry_moneychanger10000">10000円</label>
                </div>
                <div class="c-formCheckbox">
                    <input id="laundry_moneychanger5000" <?php echo ($laundry_moneychanger5000 == '5000')?'checked="checked"':''?> name="laundry_moneychanger5000" type="checkbox" value="5000">
                    <label for="laundry_moneychanger5000">5000円</label>
                </div>
                <div class="c-formCheckbox">
                    <input id="laundry_moneychanger2000" <?php echo ($laundry_moneychanger2000 == '2000')?'checked="checked"':''?> name="laundry_moneychanger2000" type="checkbox" value="2000">
                    <label for="laundry_moneychanger2000">2000円</label>
                </div>
                <div class="c-formCheckbox">
                    <input id="laundry_moneychanger1000" <?php echo ($laundry_moneychanger1000 == '1000')?'checked="checked"':''?> name="laundry_moneychanger1000" type="checkbox" value="1000">
                    <label for="laundry_moneychanger1000">1000円</label>
                </div>
                <div class="c-formCheckbox">
                    <input id="laundry_moneychanger500" <?php echo ($laundry_moneychanger500 == '500')?'checked="checked"':''?> name="laundry_moneychanger500" type="checkbox" value="500">
                    <label for="laundry_moneychanger500">500円</label>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<div class="c-formSwitche">
    <div class="c-formSwitches_content">
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">自販機</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_vendingmachine" name="laundry_is_vendingmachine" <?php echo ($laundry_moneychanger500 == '500')?'checked="checked"':''?> type="checkbox" value="yes">
                    <label for="laundry_is_vendingmachine"></label>
                </div>
            </div>
        </div>
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">監視カメラ</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_camera" name="laundry_is_camera" <?php echo ($laundry_is_camera == 'yes')?'checked="checked"':''?> type="checkbox" value="yes">
                    <label for="laundry_is_camera"></label>
                </div>
            </div>
        </div>
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">トイレ</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_toilet" name="laundry_is_toilet" <?php echo ($laundry_is_toilet == 'yes')?'checked="checked"':''?> type="checkbox" value="yes">
                    <label for="laundry_is_toilet"></label>
                </div>
            </div>
        </div>
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">自動ドア</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_autodoor" name="laundry_is_autodoor" <?php echo ($laundry_is_autodoor == 'yes')?'checked="checked"':''?> type="checkbox" value="yes">
                    <label for="laundry_is_autodoor"></label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hr-space20 csp"></div>
<table class="c-formTable">
    <tbody>
        <tr>
            <th class="c-formTable_th">補足情報</th>
            <th class="c-formTable_td">
                <div class="c-formTextarea">
                    <textarea id="laundry_moreinfo" name="laundry_moreinfo" cols="50" rows="10"><?php echo $laundry_moreinfo; ?></textarea>
                </div>
            </th>
        </tr>
    </tbody>
</table>
<div class="c-form_button">
    <div class="c-button c-button--submit c-button--arrowRight">
    <a onclick="$(this).closest('form').get(0).submit(); return false"><span>登録</span></a>
    </div>
</div>
</div><!-- class=content-width -->                            
</div><!-- class=form-wrap -->  
<div class="hr-space30">
</div>
<div class="form-wrap">
<div class="content-width">
<h2>その他設備</h2>  
<div class="c-formSwitche">
    <div class="c-formSwitches_content">
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">２４ｈ営業</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_work24" name="laundry_is_work24" <?php echo ($laundry_is_work24 == 'yes')?'checked="checked"':''?> type="checkbox" value="yes">
                    <label for="laundry_is_work24"></label>
                </div>
            </div>
        </div>
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">フリーwifi</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_freewifi" name="laundry_is_freewifi" <?php echo ($laundry_is_freewifi == 'yes')?'checked="checked"':''?> type="checkbox" value="yes">
                    <label for="laundry_is_freewifi"></label>
                </div>
            </div>
        </div>
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">貸し電源</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_lendpower" name="laundry_is_lendpower" <?php echo ($laundry_is_lendpower == 'yes')?'checked="checked"':''?> type="checkbox" value="yes">
                    <label for="laundry_is_lendpower"></label>
                </div>
            </div>
        </div>
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">テレビ</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_tv" name="laundry_is_tv" <?php echo ($laundry_is_tv == 'yes')?'checked="checked"':''?> type="checkbox"  value="yes">
                    <label for="laundry_is_tv"></label>
                </div>
            </div>
        </div>
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">ラジオ</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_radio" name="laundry_is_radio" <?php echo ($laundry_is_radio == 'yes')?'checked="checked"':''?> type="checkbox" value="yes">
                    <label for="laundry_is_radio"></label>
                </div>
            </div>
        </div>
        <div class="c-formSwitcheItem">
            <strong class="c-formSwitcheItem_key">ＢＧＭ</strong>
            <div class="c-formSwitcheItem_value">
                <div class="c-formSwitch">
                    <input id="laundry_is_bgm" name="laundry_is_bgm" <?php echo ($laundry_is_bgm == 'yes')?'checked="checked"':''?> type="checkbox" value="yes">
                    <label for="laundry_is_bgm"></label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hr-space20 csp"></div>
<div class="c-form_button">
    <div class="c-button c-button--submit c-button--arrowRight">
    <a onclick="$(this).closest('form').get(0).submit(); return false"><span>登録</span></a>
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