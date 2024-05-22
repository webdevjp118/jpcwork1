<?php /* Template Name: Cuser laundry*/ ?>
<?php 
get_header(); 
if(!is_user_activated()) {
    wp_redirect(get_site_url().'/login');
}
?>
<div class="gbanner-sec">
    <h1>プロフィール</h1>
</div>
<main id="primary" class="site-main">

<div class="pg8">
<div class="c-container">
<?php
global $current_user, $wp_roles;
$user_id = $current_user->ID;
$user_data = $current_user;
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $user_data =  get_userdata($user_id);  
}
$user_id = $user_data->ID;
$user_editlink = get_site_url().'/cuser-edit?id='.$user_id;
$user_fullname = $user_data->first_name.' '.$user_data->last_name;
$user_registered = date('Y.m.d', strtotime($user_data->user_registered));
$user_favorlaundry = get_user_meta($user_id, 'favor_laundry', true);
$user_usedyear = get_user_meta($user_id, 'used_year', true);
$user_usedmonth = get_user_meta($user_id, 'used_month', true);
$user_bio = get_user_meta($user_id, 'bio', true);
$user_weburl = get_user_meta($user_id, 'web_url', true);
$home_laundry = "";

$favorite_to_users = get_user_meta($user_id, 'favorite_to_users', true);
$favorite_to_user_count = count(ids_toarray($favorite_to_users));
$activity_key = array(
    'post_type' => 'activity',
    'author' => $user_id,
	'posts_per_page' => -1,
);
$activity_query = new WP_Query($activity_key);
$activity_count = $activity_query->found_posts;
$ikitai_key = array(
	'post_type' => 'laundry',
	'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'laundry_ikitai_users',
							'value' => $user_id.',', //array
							'compare' => 'LIKE',
						),
					),
	'posts_per_page' => $posts_per_page,
	'paged' => $pageno,
	'order' => 'DESC'
);
$ikitai_query = new WP_Query($ikitai_key);
$ikitai_count = $ikitai_query->found_posts;
//constants
$max_input_count = 5;
$posts_per_page = 10;

$pageno = 1;
if(isset($_POST['pageno'])) $pageno = $_POST['pageno'];
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
$added_key = array(
    'post_type' => 'laundry',
    'author' => $user_id,
	'posts_per_page' => $posts_per_page,
	'paged' => $pageno,
	'order' => 'DESC'
);
$added_query = new WP_Query($added_key);
$added_count = $added_query->found_posts;

?>
    <div class="profileinfo-sec">
        <div class="profile-header">
            <div class="profile-photo"><div class="c-circlediv" style="background-image: url(<?php echo get_avatar_url($user_id); ?>);"></div></div>
			<div class="name-div">
                <div class="c-leaftitle">
                <h2 class="h21"><span><?php echo $user_registered; ?> 登録</span><br class="csp"> <?php echo $user_fullname; ?></h2>
                </div>
                <div class="hr-space10"></div>
                <div class="tonttu-div">
                    <div class="tonttu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tonttu_color.svg"></div>
                    <span class="tonttu-cap">トントゥ</span>
                    <span class="c-numspan">350</span>
                </div>
<?php if($current_user->ID == $user_id): ?>
                <p class="modify-wrap"><a href="<?php echo $user_editlink; ?>" class="modify-info c-btn c-btn_green c-btn_noarrow">プロフィール編集</a></p>
<?php elseif($curuser_favorited): ?>
                <p class="modify-wrap"><a class="action-favorite c-btn c-btn_tertiary c-btn_noarrow" data-uid="<?php echo $current_user->ID; ?>" data-tid="<?php echo $user_id; ?>">お気に入りを解除</a></p>
<?php elseif(!$curuser_favorited): ?>
                <p class="modify-wrap"><a class="action-favorite c-btn c-btn_primary c-btn_noarrow" data-uid="<?php echo $current_user->ID; ?>" data-tid="<?php echo $user_id; ?>">お気に入りに追加</a></p>                
<?php endif; ?>
			</div>
		</div>
    </div><!-- profileinfo-sec -->
    <div class="hr-space20"></div>
    <ul class="gsubmenu-ul">
        <li>
            <a data-icon="activities" href="<?php echo get_site_url().'/cuser/?id='.$user_id; ?>">お洗活<?php echo_gmenuval($activity_count); ?></a>
        </li>
        <li>
            <a data-icon="ikitai" href="<?php echo get_site_url().'/cuser-ikitai/?id='.$user_id; ?>">Go!<?php echo_gmenuval($ikitai_count); ?></a>
        </li>
        <li>
            <a data-icon="laundry-info" class="selected">登録施設<?php echo_gmenuval($added_count); ?></a>
        </li>
        <li>
            <a data-icon="favorite" href="<?php echo get_site_url().'/cuser-favorite/?id='.$user_id; ?>">お気に入り<?php echo_gmenuval($favorite_to_user_count); ?></a>
        </li>
        
    </ul>
    <div class="laundry-list">
<?php 
    if($added_query->have_posts()) : 
        while ($added_query->have_posts()) : 
            $added_query->the_post(); 
            $loop_title = get_the_title();
            $loop_date = get_the_date("Y.m.d");
            $loop_id = get_the_ID();
            $loop_province = get_post_meta( $loop_id, 'laundry_province', true );
            $loop_address1 = get_post_meta( $loop_id, 'laundry_address1', true );
            $loop_address2 = get_post_meta( $loop_id, 'laundry_address2', true );
            $loop_address3 = get_post_meta( $loop_id, 'laundry_address3', true );
            $loop_moreinfo = get_post_meta( $loop_id, 'laundry_moreinfo', true );
			$loop_photo = get_post_meta( $loop_id, 'laundry_photo', true );
			if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.png';
            $loop_url = get_the_permalink();
            $loop_content = get_post_meta( $loop_id, 'laundry_extra', true );
           
            $laundry_ikitai_users = get_post_meta( $loop_id, 'laundry_ikitai_users', true );
            $laundry_ikitai_count = count(ids_toarray($laundry_ikitai_users));
            $laundry_activities_query = new WP_Query( 
                array(
                  'post_type' => 'activity',
                  'fields' => 'ids',
                  'meta_query' => array(
                    'relation' => 'OR',
                    array(
                      'key' => 'laundry_id',
                      'value' => $loop_id,
                    ),
                  ),
                  'posts_per_page' => 5,
                )
              );
            $laundry_activity_count = $laundry_activities_query->found_posts;
?>
					<div class="js-button c-laundiv" data-href="<?php echo $loop_url; ?>">
						<div class="photo">
							<div class="c-rounddiv" style="background-image:url('<?php echo $loop_photo; ?>');">
							</div>
						</div>
						<div class="laundry-info">
                            <div class="c-leaftitle">
								<h2 class="h21">
								    <span>[ <?php echo $loop_province; ?> ]</span> <?php echo $loop_title; ?>
                                </h2>
                            </div>
							<div class="laundry-scroll">
								<p class="laundry-address"><?php echo $loop_province.' '.$loop_address1.' '.$loop_address2.' '.$loop_address3; ?></p>
								<p class="laundry-service"><?php echo $loop_moreinfo; ?></p>
							</div>
							<div class="ikitai-activity">
                                <a class="item">Go!<span class="c-numspan"><?php echo $laundry_ikitai_count; ?></span></a>
								<a class="item">お洗活<span class="c-numspan"><?php echo $laundry_activity_count; ?></span></a>
							</div>
						</div>
                    </div>
                    <div class="hr-space20"></div>
					<div class="c-laundiv-bline"></div>
<?php
		endwhile;
	endif;

	$total_count = $added_count;
	$total_page = -1;
	if($total_count > 0) {
		$total_page = intdiv($total_count, $posts_per_page);
		if($total_count % $posts_per_page > 0)	$total_page++;
	} 
    $page_first = -1;$page_prev = -1;$page_next = -1;$page_last = -1;
    $page_url = get_site_url().'/cuser-laundry/?id='.$user_id.'&pageno=';
	if($total_count > 0) {
		if($pageno > 2) $page_first = 1;
		if($pageno > 1) $page_prev = $pageno - 1;
		if($total_page - $pageno >= 2) $page_last = $total_page;
		if($total_page - $pageno >= 1) $page_next = $pageno + 1;
		echo '<div class="wp-pagenavi">';
		if($page_first > 0) echo '<a class="page-other" href="'.$page_url.$page_first.'">'.$page_first.'</a>';
		if($page_prev > 0) echo '<a class="page-other" href="'.$page_url.$page_prev.'">'.$page_prev.'</a>';
		if($pageno > 0) echo '<a class="page-current" href="'.$page_url.$pageno.'">'.$pageno.'</a>';
		if($page_next > 0) echo '<a class="page-other" href="'.$page_url.$page_next.'">'.$page_next.'</a>';
		if($page_last > 0) echo '<a class="page-other" href="'.$page_url.$page_last.'">'.$page_last.'</a>';
		echo '</div>';
	}
?>
			</div>
    </div>
</div><!-- c-container -->

</div><!-- pg8 -->
</main><!-- #main -->

<?php
search_form();
get_footer();