<?php /* Template Name: All News */ ?>
<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>お知らせ</h1>
</div>
<?php 
/* */
$search_key = array(
    'post_type' => 'news',
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
    ),
    'orderby' => 'date',
    'order' => 'ASC'
);
$news_query = new WP_Query($search_key);
?>
	<main id="primary" class="site-main">

<div class="pg5">
    <div class="c-container">
<?php
    $loop_photo = get_stylesheet_directory_uri().'/images/noimage.png';
    if($news_query->have_posts()) : 
        $news_query->the_post();
        $loop_title = get_the_title();
        $loop_date = get_the_date("Y.m.d");
        $loop_id = get_the_ID();
        $loop_author_id = get_post_field( 'post_author', $loop_id );
        $loop_author_data = get_userdata( $loop_author_id );
        $loop_author_uname = $loop_author_data->user_login;
        $loop_author_photo = get_avatar_url($loop_author_id);
        // $loop_content = $post->post_content;
?>
        <div class="latestpost-sec">
            <div class="latest-post">
                <a href="<?php echo get_post_permalink(); ?>">
                    <div class="photo-div">
                        <div class="circlediv" style="background-image:url('<?php echo $loop_photo; ?>');">
                        </div>
                        <img class="new-sign" alt="NEW" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new-secondary.png">
                    </div>
                    <div class="content-div">
                        <div class="profile-div">
                            <div class="profile-photo">
                                <div class="circlediv" style="background-image:url('<?php echo $loop_author_photo; ?>');">
                                </div>
                            </div>
                            <span class="profile-name"><?php echo $loop_author_uname; ?></span><span class="visit-date"><?php echo $loop_date; ?></span>
                            <span class="visit-count"></span>
                        </div>
                        <h2 class="title"><?php echo $loop_title; ?></h2>
                        <p class="excerpt"><?php echo $loop_content; ?></p>
                    </div>
                </a>
            </div>
        </div>
<?php
    endif;
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
                            <div class="circlediv" style="background-image:url('<?php echo $loop_author_photo; ?>');">
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
    </div><!-- c-container -->
</div><!-- pg5 -->
		
	</main><!-- #main -->

<?php
get_footer();
