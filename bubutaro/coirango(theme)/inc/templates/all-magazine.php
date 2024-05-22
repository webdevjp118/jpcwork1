<?php /* Template Name: All Magazine */ ?>
<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>コイラン裏テク</h1>
</div>
<?php 
/* */
$search_key = array(
    'post_type' => 'magazine',
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
    ),
    'orderby' => 'date',
    'order' => 'ASC'
);
$magazine_query = new WP_Query($search_key);
?>
	<main id="primary" class="site-main">

<div class="pg5">
    <div class="c-container">
<?php
    if($magazine_query->have_posts()) : 
        $magazine_query->the_post();
        $loop_title = get_the_title();
        $loop_date = get_the_date("Y.m.d");
        $loop_id = get_the_ID();
        $loop_author_id = get_post_field( 'post_author', $loop_id );
        $loop_author_data = get_userdata( $loop_author_id );
        $loop_author_uname = $loop_author_data->user_login;
        $loop_author_photo = get_avatar_url($loop_author_id);
        $loop_photo = get_the_post_thumbnail_url();
        if(empty($loop_photo)) $loop_photo = catch_first_image();
        if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.png';
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
    if($magazine_query->have_posts()) : 
        while ($magazine_query->have_posts()) : 
            $magazine_query->the_post();
            $loop_title = get_the_title();
            $loop_date = get_the_date("Y.m.d");
            $loop_id = get_the_ID();
            $loop_author_id = get_post_field( 'post_author', $loop_id );
            $loop_author_data = get_userdata( $loop_author_id );
            $loop_author_uname = $loop_author_data->user_login;
            $loop_author_photo = get_avatar_url($loop_author_id);
            $loop_photo = get_the_post_thumbnail_url();
            if(empty($loop_photo)) $loop_photo = catch_first_image();
            if(strpos($loop_photo, "default.jpg") !== false) $loop_photo = "";
            if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.png';
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
