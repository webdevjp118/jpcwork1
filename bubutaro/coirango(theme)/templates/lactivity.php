<?php /* Template Name: Laundry Activity */ ?>
<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>コインランドリー店舗</h1>
</div>
<?php 
/* */
$max_input_count = 5;
$posts_per_page = 10;
$pageno = 1;
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];

$post_id = '';
if(isset($_GET['id'])){
    $post_id = $_GET['id'];
}
$laundry_id = $post_id;
$user_id = get_current_user_id();
$author_id = get_post_field( 'post_author', $post_id );
$author_data = get_userdata( $author_id );
$author_uname = $author_data->user_login;
$content_post = get_post($post_id);

$laundry_name = $content_post->post_title;
$laundry_photo = get_post_meta( $post_id, 'laundry_photo', true );
if(empty($laundry_photo)) $laundry_photo = get_stylesheet_directory_uri().'/images/noimage.png';

$laundry_province = get_post_meta( $post_id, 'laundry_province', true );
$laundry_address1 = get_post_meta( $post_id, 'laundry_address1', true );
$laundry_address2 = get_post_meta( $post_id, 'laundry_address2', true );
$laundry_address3 = get_post_meta( $post_id, 'laundry_address3', true );
$laundry_postbox = get_post_meta( $post_id, 'laundry_postbox', true );
$laundry_phone = get_post_meta( $post_id, 'laundry_phone', true );
$laundry_weburl = get_post_meta( $post_id, 'laundry_weburl', true );
$laundry_mapurl = get_post_meta( $post_id, 'laundry_mapurl', true );

$laundry_ikitai_users = get_post_meta( $post_id, 'laundry_ikitai_users', true );
$laundry_ikitai_count = count(ids_toarray($laundry_ikitai_users));

$laundry_activities_query = new WP_Query( 
    array(
      'post_type' => 'activity',
      'meta_query' => array(
        'relation' => 'OR',
        array(
          'key' => 'laundry_id',
          'value' => $laundry_id,
        ),
      ),
      'paged' => $pageno,
      'posts_per_page' => $posts_per_page,
    )
  );
$total_count = $laundry_activities_query->found_posts;
?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->


<div class="pg1">
    <div class="titleinfo-sec">
        <div class="c-container">
            <div class="enrollee">
                <div class="enrollee-div">
                    <span class="enrollee-cap">登録者：</span>
                    <a href="" class="enrollee-name"><?php echo $author_uname; ?></a>
                </div>
                <a href="<?php echo get_site_url(); ?>/laundry-edit?id=<?php echo $post_id ?>" class="modify-info c-btn c-btn_green c-btn_noarrow">情報修正</a>
            </div>
            <div class="c-post-title">
                <!-- <h1>湯の泉 東名厚木健康センター</h1> -->
                <h1><?php echo $laundry_name; ?></h1>
                <h2><?php echo $laundry_province.' '.$laundry_address1; ?></h2>
            </div>
            <div class="laundrytitle-bottom">
                <div class="social-div">
                    <a href="#" class="fa fa-twitter"><span class="cpc">シェア</span><span class="csp">&nbsp;</span></a>
                    <a href="#" class="fa fa-facebook"><span class="cpc">シェア</span><span class="csp">&nbsp;</span></a>
                </div>
                <div class="laundry-action">
                    <a class="action-ikitai btn-ikitai">
                        <input type="hidden" id="laundry_id" name="laundry_id" value="<?php echo $post_id; ?>">
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
                        <span class="has-icon">Go!</span>
                        <span class="ikitai-count"><?php echo $laundry_ikitai_count; ?></span>
                    </a>
                    <a class="add-blog" href="<?php echo get_site_url().'/activity-edit/?laundry_id='.$laundry_id; ?>">
                        <span>投稿</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <ul class="gsubmenu-ul">
        <li>
            <a data-icon="laundry-info" href="<?php echo get_site_url().'/laundry/'.$laundry_id; ?>">施設情報</a>
        </li>
        <li>
            <a data-icon="activities" class="selected">お洗活<?php echo_gmenuval($total_count); ?></a>
        </li>
    </ul>
    <div class="main-sec">
        <div class="c-container">
<?php
if($laundry_activities_query->have_posts()) : 
    while ($laundry_activities_query->have_posts()) : 
        $laundry_activities_query->the_post(); 
        $loop_id = get_the_id();

        $loop_author_id = get_post_field( 'post_author', $loop_id );
        $loop_author_data = get_userdata( $loop_author_id );
        $loop_author_uname = $loop_author_data->user_login;
        $loop_author_photo = get_avatar_url($loop_author_id);

        $loop_content = get_post_meta( $loop_id, 'activity_content', true );
        $loop_content = wpautop($loop_content);
        $loop_date = get_post_meta( $loop_id, 'activity_date', true );
        $loop_date = date('Y.m.d', strtotime($loop_date));
        $loop_visitno = get_post_meta( $loop_id, 'activity_visitno', true );

        $laundry_id = get_post_meta( $loop_id, 'laundry_id', true );
        $laundry_name = get_the_title( $laundry_id );
        $laundry_province = get_post_meta( $laundry_id, 'laundry_province', true );

        $loop_photo = get_post_meta( $loop_id, 'activity_photo', true );
        $laundry_photo = get_post_meta( $laundry_id, 'laundry_photo', true);
        if(empty($laundry_photo)) $laundry_photo = get_stylesheet_directory_uri()."/images/noimage.png";
        $loop_slug = get_post_field( 'post_name', $loop_id );
        $activity_url = get_site_url()."/activity/".$loop_slug;
        $laundry_url = get_site_url()."/laundry/".$laundry_id;
        $user_url = get_site_url()."/cuser/?id=".$loop_author_id;
        $like_from = get_post_meta($loop_id, 'like_from', true);
        $like_from_array = ids_toarray($like_from);
        $like_count = count($like_from_array);   
        $loop_liked = 1;
        if(in_array($cur_uid, $like_from_array)) $loop_liked = 1;
        else $loop_liked = 0;

        $comment_key = array(
            'post_type' => 'ccomment',
            'meta_query' => array(
                array(
                    'key' => 'activity_id',
                    'value' => $loop_id, //array
                    'compare' => '=',
                ),
            ),
            'posts_per_page' => -1,
        );
        $comment_query = new WP_Query($comment_key);
        $comment_count = $comment_query->found_posts;
?>
            <div class="c-actdiv js-button" data-href="<?php echo get_site_url().'/activity/'.$loop_id; ?>">
                <div class="content-line">
                    <div class="line-left">
                        <div class="c-leaftitle">
                        <h2 class="h21"><a href="<?php echo $laundry_url; ?>"><span>[ <?php echo $laundry_province; ?> ]&nbsp;</span><?php echo $laundry_name; ?></a></h2>
                        </div>
                        <div class="activity-content">
                            <div class="stop-overflow">
                                <p><?php echo $loop_content; ?></p>
                                <div class="c-spost-photo"><img src="<?php echo $loop_photo; ?>"></div>     
                            </div>
                        </div>
                    </div>
                    <div class="line-right">
                        <div class="c-rounddiv" style="background-image:url('<?php echo $laundry_photo; ?>')";>
                        </div>
                    </div>
                </div>
                <div class="profile-line">
                    <a class="c-profdiv" href="<?php echo $user_url; ?>">
                        <div class="profphoto"><div class="c-circlediv" style="background-image:url(<?php echo $loop_author_photo; ?>);"></div></div>
                        <div class="profinfo">
							<span class="profname"><?php echo $loop_author_uname; ?></span><br class="csp">
							<span class="profdate"><?php echo $loop_date; ?></span>
							<span class="profcount"><?php echo $loop_visitno; ?>回目の訪問</span>
						</div>
                    </a>
                    <div class="c-likecmt">
                        <div class="action-like c-likediv" data-uid="<?php echo $cur_uid; ?>" data-tid="<?php echo $loop_id; ?>">
                            <div class="<?php echo $loop_liked?'c-like-ic':'c-unlike-ic'; ?>"></div>
                            <?php echo_num_or_empty($like_count); ?>
                        </div>
                        <div class="c-cmtdiv">
                            <a class="c-cmt-a" href="<?php echo $activity_url; ?>">
                                <div class="c-cmt-ic"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/comment-icon.svg"></div>
                                <?php echo echo_num_or_empty($comment_count) ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- c-actdiv -->
            <div class="hr-space20"></div>
<?php
        endwhile;
    endif;

    $total_page = -1;
	if($total_count > 0) {
		$total_page = intdiv($total_count, $posts_per_page);
		if($total_count % $posts_per_page > 0)	$total_page++;
	} 
	$page_first = -1;$page_prev = -1;$page_next = -1;$page_last = -1;
	if($total_count > 0) {
		if($pageno > 2) $page_first = 1;
		if($pageno > 1) $page_prev = $pageno - 1;
		if($total_page - $pageno >= 2) $page_last = $total_page;
		if($total_page - $pageno >= 1) $page_next = $pageno + 1;
		echo '<div class="wp-pagenavi">';
		if($page_first > 0) echo '<a class="page-other" href="'.get_site_url().'/lactivity/?id='.$post_id.'&pageno='.$page_first.'">'.$page_first.'</a>';
		if($page_prev > 0) echo '<a class="page-other" href="'.get_site_url().'/lactivity/?id='.$post_id.'&pageno='.$page_prev.'">'.$page_prev.'</a>';
		if($pageno > 0) echo '<a class="page-current" href="'.get_site_url().'/lactivity/?id='.$post_id.'&pageno='.$pageno.'">'.$pageno.'</a>';
		if($page_next > 0) echo '<a class="page-other" href="'.get_site_url().'/lactivity/?id='.$post_id.'&pageno='.$page_next.'">'.$page_next.'</a>';
		if($page_last > 0) echo '<a class="page-other" href="'.get_site_url().'/lactivity/?id='.$post_id.'&pageno='.$page_last.'">'.$page_last.'</a>';
		echo '</div>';
	}
?>
        </div>
    </div>
</div>


</main><!-- End of #main ----------------------------------------------------------------------------------------------------------------------------------->

<?php
get_footer();
