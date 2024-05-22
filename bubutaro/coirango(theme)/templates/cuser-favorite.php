<?php /* Template Name: Cuser favorite*/ ?>
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
$added_key = array(
	'post_type' => 'laundry',
	'author' => $user_id,
	'posts_per_page' => -1,
);
$added_query = new WP_Query($added_key);
$added_count = $added_query->found_posts;
//constants
$max_input_count = 5;
$posts_per_page = 10;

$pageno = 1;
if(isset($_POST['pageno'])) $pageno = $_POST['pageno'];
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
$favorite_key = array( 
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'favorite_from_users',
            'value' => $user_id.',', //array
            'compare' => 'LIKE',
        ),
    ),
    'posts_per_page' => $posts_per_page,
	'paged' => $pageno,
);
$user_query = new WP_User_Query( $favorite_key );
$user_count = $user_query->found_users;
$user_list = $user_query->get_results();
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
            <a data-icon="activities" href="<?php echo get_site_url().'/cuser/?id='.$user_id; ?>">お洗活<span class="gsmenu-val"><?php echo $activity_count; ?></span></a>
        </li>
        <li>
            <a data-icon="ikitai" href="<?php echo get_site_url().'/cuser-ikitai/?id='.$user_id; ?>">Go!<span class="gsmenu-val"><?php echo $ikitai_count; ?></span></a>
        </li>
        <li>
            <a data-icon="laundry-info" href="<?php echo get_site_url().'/cuser-laundry/?id='.$user_id; ?>" >登録施設<span class="gsmenu-val"><?php echo $added_count; ?></span></a>
        </li>
        <li>
            <a data-icon="favorite" class="selected">お気に入り<?php echo_gmenuval(count($user_list)); ?></a>
        </li>
        
    </ul>
    <div class="fuser-list">
<?php 
    if(!empty($user_list)) : 
        $hide_first_line = 0;
        foreach($user_list as $loop) : 
            $hide_first_line++;
            $loop_user_data = get_userdata( $loop->ID );
            $loop_user_uname = $loop_user_data->user_login;
            $loop_user_photo = get_avatar_url($loop->ID);
            
            if($hide_first_line != 1) {
                echo '<div class="h-border-line" ></div>';
            } 
?>

			<div class="fuser-div">
                <div class="fuser-line">
                    <a class="c-profdiv" href="<?php echo get_site_url().'/cuser/?id='.$loop->ID; ?>">
                        <div class="profphoto"><div class="c-circlediv" style="background-image: url(<?php echo $loop_user_photo; ?>);"></div></div>
                        <span class="profname"><?php echo $loop_user_uname; ?></span>
                    </a>
                    <a data-uid="<?php echo $user_id; ?>" data-tid="<?php echo $loop->ID; ?>" class="action-favorite c-btn c-btn_tertiary">お気に入りを解除</a>
                </div>
            </div>
            
<?php
		endforeach;
	endif;

	$total_count = $user_count;
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
		if($page_first > 0) echo '<a class="page-other" data-page="'.$page_first.'">'.$page_first.'</a>';
		if($page_prev > 0) echo '<a class="page-other" data-page="'.$page_prev.'">'.$page_prev.'</a>';
		if($pageno > 0) echo '<a class="page-current" data-page="'.$pageno.'">'.$pageno.'</a>';
		if($page_next > 0) echo '<a class="page-other" data-page="'.$page_next.'">'.$page_next.'</a>';
		if($page_last > 0) echo '<a class="page-other" data-page="'.$page_last.'">'.$page_last.'</a>';
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