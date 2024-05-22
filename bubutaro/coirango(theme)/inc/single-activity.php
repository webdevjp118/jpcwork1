<?php
/**
 * The template for displaying a single laundry
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Coirango
 */

get_header();
?>
<div class="gbanner-sec">
    <h1>お洗活</h1>
</div>

<?php 
/* */

$post_id = get_the_id(); $activity_id = $post_id;
$user_id = get_current_user_id();
$author_id = get_post_field( 'post_author', $post_id );
$author_data = get_userdata( $author_id );
$author_uname = $author_data->user_login;
$author_photo = get_avatar_url($author_id);
$content_post = get_post($post_id);

$activity_name = $content_post->post_title;
$description = $content_post->post_content;

$laundry_id = get_post_meta( $post_id, 'laundry_id', true );
$laundry_slug = get_post_field( 'post_name', $laundry_id );
$laundry_post = get_post($laundry_id);
$laundry_name = $laundry_post->post_title;
$post_meta = get_post_meta($post_id);

$laundry_province = get_post_meta( $laundry_id, 'laundry_province', true );
$laundry_address1 = get_post_meta( $laundry_id, 'laundry_address1', true );
$laundry_address2 = get_post_meta( $laundry_id, 'laundry_address2', true );
$laundry_address3 = get_post_meta( $laundry_id, 'laundry_address3', true );

$activity_date = get_post_meta( $post_id, 'activity_date', true );
$activity_visitno = get_post_meta( $post_id, 'activity_visitno', true );
$activity_content = get_post_meta( $post_id, 'activity_content', true );
$activity_content = wpautop($activity_content);

$activity_washer_count = get_post_meta( $post_id, 'activity_washer_count', true );
$activity_washer_count = get_post_meta( $post_id, 'activity_washer_count', true );
$activity_washdryer_count = get_post_meta( $post_id, 'activity_washdryer_count', true );

$activity_photo = get_post_meta( $post_id, 'activity_photo', true );

$new_ccomment = '';
if(isset($_POST['new_ccomment'])){
    $new_ccomment = $_POST['new_ccomment'];
}

if(!empty($new_ccomment)) { //Add Comment
    $cpost_type = 'ccomment';
    // Add the content of the form to $post as an array
    $cpost = array(
        'post_title'	=> $activity_name.'comment',
        'post_content'	=> $new_ccomment,
        'post_status'	=> 'publish', 
        'post_type'		=> $cpost_type ,
        'post_author'   => get_current_user_id()
    );
    
    $cpost_id = wp_insert_post($cpost);   
    update_post_meta( $cpost_id, 'activity_id', sanitize_text_field( $post_id ) );

    $new_ccomment = '';
    $activity_comments_query = new WP_Query( 
        array(
          'post_type' => 'ccomment',
          'meta_query' => array(
            'relation' => 'OR',
            array(
              'key' => 'activity_id',
              'value' => $activity_id,
            ),
          ),
        )
      );
    $ccomment_count = $activity_comments_query->found_posts;
    update_post_meta( $activity_id, 'activity_ccommentcount', sanitize_text_field( $ccomment_count ) );
}

$activity_comments_query = new WP_Query( 
    array(
      'post_type' => 'ccomment',
      'meta_query' => array(
        'relation' => 'OR',
        array(
          'key' => 'activity_id',
          'value' => $activity_id,
        ),
      ),
    )
  );
?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->


<div class="pg2">
	<div class="hr-space30" ></div>
   <div class="titleinfo-sec">
        <div class="c-container">
            <div class="post-title-div">
                <h1><?php echo $laundry_name; ?></h1>
                <h2><?php echo $laundry_province.' '.$laundry_address1; ?></h2>
            </div>
        </div>
    </div>
    <div class="detail-sec">
        <div class="c-container">
            <ul class="submenu-ul">
                <li class="submenu-li submenu-li1">
                    <a href="<?php echo get_site_url(); ?>/laundry/<?php echo $laundry_slug; ?>">施設情報</a>
                </li>
                <li class="submenu-li submenu-li2">
                    <a href="">
                        サ活 <span class="submenu-count">1601</span>
                    </a>
                </li>
            </ul>
            <div class="activity-list"><div class="activity-div">
                <div class="profile-div-line">
                    <div class="profile-div">
                        <div class="circleimg-div"><img class="circle-img" src="<?php echo $author_photo; ?>" alt=""></div>
                        <span class="profile-name"><?php echo $author_uname; ?></span><span class="visit-date"><?php echo $activity_date; ?></span>
                        <span class="visit-count"><?php echo $activity_visitno; ?>回目の訪問</span>
                    </div>
                    <a href="http://127.0.0.1/worktest/bubutaro/wordpress/activity-edit?id=<?php echo $post_id; ?>" class="modify-btn c-btn c-btn_green">編集</a>
                </div>
                <div class="activity-content">
                    <P>
                        <?php echo $activity_content; ?>
                    </P>
                </div>
                <div class="activity-photo">
                    <img src="<?php echo $activity_photo; ?>">        
                </div>
                <div class="like-comment">
                    <div class="like-div">
                        <a class="like liked">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heart-icon-yes.svg">
                        </a>
                        <span>16</span>
                    </div>
                    <div class="comment-div">
                        <a class="comment">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/comment-icon.svg">
                        </a>
                        <span><?php echo $activity_comments_query->found_posts ?></span>
                    </div>
                </div>
                <h3 class="comment-cap">コメント</h3>
<?php 
    if($activity_comments_query->have_posts()) : 
        while ($activity_comments_query->have_posts()) : 
            $activity_comments_query->the_post(); 
            $loop_cdate = get_the_date();
            $loop_ctime = get_the_time();
            $loop_cdatetime = date("Y.m.d", strtotime($loop_cdate))." ".date("h:i", strtotime($loop_ctime));  
            $loop_cid = get_the_ID();
            $loop_cauthor_id = get_post_field( 'post_author', $loop_cid );
            $loop_cauthor_data = get_userdata( $loop_cauthor_id );
            $loop_cauthor_uname = $loop_cauthor_data->user_login;
            $loop_ccontent = get_the_content();
            $loop_cauthorphoto = get_avatar_url($loop_cauthor_id);
            $loop_likes = get_post_meta($loop_cid, 'ccomment_likes');
?>
                <div class="ccomment-area">
                    <div class="single-ccomment">
                        <div class="profile-line">
                            <div class="circleimg-div">
                                <img class="circle-img" src="<?php echo $loop_cauthorphoto; ?>">
                            </div>
                            <div class="meta-div">
                                <p class="meta-user"><?php echo $loop_cauthor_uname; ?></p>
                                <span class="meta-date"><?php echo $loop_cdatetime; ?></span><span class="small-like"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/comment-icon.svg"><span><span class="meta-likes">5<span>
                            </div>
                            <div class="like-div">
                                <a><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heart-icon-yes.svg"></a>
                            </div>
                        </div>
                        <div class="ccomment-content">
                            <p><?php echo $loop_ccontent; ?></p>
                        </div>
                    <div>
                </div>
<?php 
        endwhile; 
    endif;
?>
                <div class="ccomment-form-area">
                    <form id="new_comment" name="new_comment" method="post" action="">
						<div class="c-formTextarea">
							<textarea id="new_ccomment" name="new_ccomment" maxlength="1200" cols="50" rows="30"><?php echo $new_ccomment; ?></textarea>
						</div>
						<div class="hr-space30" ></div>
                        <div class="c-form_button">
							<div class="c-button c-button--submit c-button--arrowRight">
								<a onclick="$(this).closest('form').get(0).submit(); return false"><span>送信</span></a>
							</div>
						</div>
                    </form>
                </div>
            </div></div>
        </div>
    </div>
</div>

</main><!-- End of #main ----------------------------------------------------------------------------------------------------------------------------------->

<?php
get_sidebar();
get_footer();
