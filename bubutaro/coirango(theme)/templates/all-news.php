<?php /* Template Name: All News */ ?>
<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>お知らせ</h1>
</div>
<?php 
/* */
$total_count = 0;
$posts_per_page = 10;
$pageno = 1;
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
if($pageno > 1) $posts_per_page = 9;
$search_recent = array(
    'post_type' => 'news',
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
    ),
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC'
);
$search_key = array(
    'post_type' => 'news',
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
    ),
    'posts_per_page' => $posts_per_page,
    'paged' => $pageno,
    'orderby' => 'date',
    'order' => 'DESC'
);
$news_query = new WP_Query($search_key);
$news_recent = new WP_Query($search_recent);
$total_count = $news_query->found_posts;
$posts_per_page = 9;
?>
	<main id="primary" class="site-main">

<div class="pg5">
    <div class="c-container">
<?php
    $loop_photo = get_stylesheet_directory_uri().'/images/noimage.png';
    if($news_recent->have_posts()) : 
        $news_recent->the_post();
        $loop_title = get_the_title();
        $loop_date = get_the_date("Y.m.d");
        $loop_id = get_the_ID();
        $loop_author_id = get_post_field( 'post_author', $loop_id );
        $loop_author_data = get_userdata( $loop_author_id );
        $loop_author_uname = $loop_author_data->user_login;
        $loop_author_photo = get_avatar_url($loop_author_id);
        $loop_content = strip_shortcodes( $post->post_content );
        $loop_content = apply_filters( 'the_content', $loop_content );
        $loop_content = str_replace(']]>', ']]&gt;', $loop_content);
        $excerpt_length = apply_filters( 'excerpt_length', 55 );
        $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
        $loop_content = wp_trim_words( $loop_content, $excerpt_length, $excerpt_more );
?>
        <div class="latestpost-sec">
            <div class="latest-post">
                <div class="js-button wrap" href="<?php echo get_post_permalink(); ?>">
                    <div class="photo-div">
                        <div class="c-circlediv" style="background-image:url('<?php echo $loop_photo; ?>');">
                        </div>
                        <img class="new-sign" alt="NEW" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new-secondary.png">
                    </div>
                    <div class="content-div">
                        <a class="c-profdiv" href="<?php echo get_site_url().'/cuser/?id='.$loop_author_id; ?>">
                            <div class="profphoto"><div class="c-circlediv" style="background-image:url('<?php echo $loop_author_photo; ?>');"></div></div>
                            <span class="profname"><?php echo $loop_author_uname; ?></span>
                            <span class="profdate"><?php echo $loop_date; ?></span>
                            <span class="profcount"></span>
                        </a>
                        <div class="hr-space10"></div>
                        <h2 class="title"><?php echo $loop_title; ?></h2>
                        <p class="excerpt"><?php echo $loop_content; ?></p>
                    </div>
                </div>
            </div>
        </div>
<?php
    endif;
    if($pageno == 1) {
        if($news_query->have_posts()) $news_query->the_post();
    }
?>
        <div class="post-list">
<?php
    if($news_query->have_posts()) : 
        while ($news_query->have_posts()) : 
            $news_query->the_post();
            $loop_title = get_the_title();
            $loop_date = get_the_date("Y.m.d");
            $loop_id = get_the_ID();
            $loop_author_id = get_post_field( 'post_author', $loop_id );
            $loop_author_data = get_userdata( $loop_author_id );
            $loop_author_uname = $loop_author_data->user_login;
            $loop_author_photo = get_avatar_url($loop_author_id);
?>
            <div class="post-div">
                <a href="<?php echo get_post_permalink(); ?>">
                    <div class="photo" style="background-image:url('<?php echo $loop_photo; ?>');">
                    </div>
                    <div class="author">
                        <div class="author-photo">
                            <div class="c-circlediv" style="background-image:url('<?php echo $loop_author_photo; ?>');">
                            </div>
                        </div>
                        <span class="author-name"><?php echo $loop_autor_name; ?></span>
                    </div>
                    <p class="date"><?php echo $loop_date; ?></p>
                    <h3 class="title"><?php echo $loop_title; ?></h3>
                </a>
            </div>
        
<!-- .posts_block -->
<?php
        endwhile;
    endif;
?>
        </div><!-- post-list -->
<?php
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
		if($page_first > 0) echo '<a class="page-other" href="'.get_site_url().'/all-news/?pageno='.$page_first.'">'.$page_first.'</a>';
		if($page_prev > 0) echo '<a class="page-other" href="'.get_site_url().'/all-news/?pageno='.$page_prev.'">'.$page_prev.'</a>';
		if($pageno > 0) echo '<a class="page-current" href="'.get_site_url().'/all-news/?pageno='.$pageno.'">'.$pageno.'</a>';
		if($page_next > 0) echo '<a class="page-other" href="'.get_site_url().'/all-news/?pageno='.$page_next.'">'.$page_next.'</a>';
		if($page_last > 0) echo '<a class="page-other" href="'.get_site_url().'/all-news/?pageno='.$page_last.'">'.$page_last.'</a>';
		echo '</div>';
    }
?>
    </div><!-- c-container -->
</div><!-- pg5 -->
		
	</main><!-- #main -->

<?php
get_footer();
