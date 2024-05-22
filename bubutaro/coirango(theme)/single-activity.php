<?php
/**
 * The template for displaying a single laundry
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Coirango
 */

get_header();
$cur_uid = 0;
if(is_user_activated()) {
	global $current_user;
	$cur_uid = $current_user->ID;
	$fav_author_array = get_user_meta($cur_id, 'favorite_to_users', true);
	$fav_author_array = ids_toarray($fav_author_array);
}
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
$activity_date = date('Y.m.d', strtotime($activity_date));
$activity_visitno = get_post_meta( $post_id, 'activity_visitno', true );
$activity_content = get_post_meta( $post_id, 'activity_content', true );
$activity_content = wpautop($activity_content);

$activity_washer_count = get_post_meta( $post_id, 'activity_washer_count', true );
$activity_washer_count = get_post_meta( $post_id, 'activity_washer_count', true );
$activity_washdryer_count = get_post_meta( $post_id, 'activity_washdryer_count', true );

$activity_photo = get_post_meta( $post_id, 'activity_photo', true );

$activity_like_from = get_post_meta($post_id, 'like_from', true);
$activity_like_from_array = ids_toarray($activity_like_from);
$activity_like_count = count($activity_like_from_array);   
$activity_liked = 1;
if(in_array($cur_uid, $activity_like_from_array)) $activity_liked = 1;
else $activity_liked = 0;

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
          'order' => 'DESC',
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
      'order' => 'DESC',
    )
  );
$laundry_activity_query = new WP_Query( 
    array(
      'post_type' => 'activity',
      'meta_query' => array(
        'relation' => 'OR',
        array(
          'key' => 'laundry_id',
          'value' => $laundry_id,
        ),
      ),
    )
  );
$laundry_activity_count = $laundry_activity_query->found_posts;
?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->


<div class="pg2">
	<div class="hr-space30" ></div>
   <div class="titleinfo-sec">
        <div class="c-container">
            <div class="c-post-title">
                <h1><?php echo $laundry_name; ?></h1>
                <h2><?php echo $laundry_province.' '.$laundry_address1; ?></h2>
            </div>
        </div>
    </div>
    <div class="hr-space30 cpc" ></div>
    <div class="detail-sec">
        <div class="c-container">
            <ul class="gsubmenu-ul">
                    <li>
                        <a data-icon="laundry-info" href="<?php echo get_site_url(); ?>/laundry/<?php echo $laundry_slug; ?>">施設情報</a>
                    </li>
                    <li>
                        <a data-icon="activities" class="selected" href="<?php echo get_site_url(); ?>/lactivity/?id=<?php echo $laundry_id; ?>">お洗活<?php echo_gmenuval($laundry_activity_count); ?></a>
                    </li>
            </ul>
            <div class="activity-list"><div class="activity-div">
                <div class="profile-div-line">
                    <div class="c-profdiv">
                        <div class="profphoto"><div class="c-circlediv" style="background-image: url(<?php echo $author_photo; ?>);"></div></div>
                        <div class="profinfo">
                            <span class="profname"><?php echo $author_uname; ?></span><br class="csp">
                            <span class="profdate"><?php echo $activity_date; ?></span>
                            <span class="profcount"><?php echo $activity_visitno; ?>回目の訪問</span>
                        </div>
                    </div>
                    <a href="<?php echo get_site_url().'/activity-edit?id='.$post_id; ?>" class="modify-btn c-btn c-btn_green">編集</a>
                </div>
                <div class="activity-content">
                    <P>
                        <?php echo $activity_content; ?>
                    </P>
                    <?php echo echo_photo_content($activity_photo); ?>
                </div>
                <!-- <div class="activity-photo">
                    <img src="<?php echo $activity_photo; ?>">        
                </div> -->
                <div class="c-likecmt">
                    <div class="action-like c-likediv" data-uid="<?php echo $cur_uid; ?>" data-tid="<?php echo $post_id; ?>">
                        <div class="<?php echo $activity_liked?'c-like-ic':'c-unlike-ic'; ?>"></div>
                        <?php echo_num_or_empty($activity_like_count); ?>
                    </div>
                    <div class="c-cmtdiv">
                        <a class="c-cmt-a">
                            <div class="c-cmt-ic"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/comment-icon.svg"></div>
                            <?php echo $activity_comments_query->found_posts ?>
                        </a>
                    </div>
                </div>
                <h3 class="comment-cap">コメント</h3>
                <div class="ccomment-area">

<?php 
    if($activity_comments_query->have_posts()) : 
        while ($activity_comments_query->have_posts()) : 
            $activity_comments_query->the_post(); 
            $loop_cid = get_the_ID();
            $loop_cauthor_id = get_post_field( 'post_author', $loop_cid );
            $loop_cauthor_data = get_userdata( $loop_cauthor_id );
            $loop_cauthor_uname = $loop_cauthor_data->user_login;
            $loop_ccontent = get_the_content();
            $loop_cauthorphoto = get_avatar_url($loop_cauthor_id);

            $like_from = get_post_meta($loop_cid, 'like_from', true);
			$like_from_array = ids_toarray($like_from);
			$like_count = count($like_from_array);   
			$loop_liked = 1;
			if(in_array($cur_uid, $like_from_array)) $loop_liked = 1;
			else $loop_liked = 0;
?>
                    <div class="single-ccomment">
                        <div class="profile-line">
                            <div class="profphoto"><div class="c-circlediv" style="background-image: url(<?php echo $loop_cauthorphoto; ?>);"></div></div>
                            <div class="meta-div">
                                <p class="meta-user"><?php echo $loop_cauthor_uname; ?></p>
                                <span class="meta-date"><?php the_time('Y.m.d G:i') ?></span>
                                <span class="small-cclike" data-tid="<?php echo $loop_cid; ?>">
                                    <div class="inline-flex"><div class="<?php echo $loop_liked?'c-like-ic':'c-unlike-ic'; ?>"></div><?php echo_num_or_empty($like_count); ?></div>
                                </span>
                            </div>
                            <div class="cclike-div">
                                <div class="action-cclike " data-uid="<?php echo $cur_uid; ?>" data-tid="<?php echo $loop_cid; ?>">
                                    <div class="<?php echo $loop_liked?'c-like-ic':'c-unlike-ic'; ?>"></div>
                                </div>
                            </div>
                        </div>
                        <div class="ccomment-content">
                            <p><?php echo $loop_ccontent; ?></p>
                        </div>
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
get_footer();
