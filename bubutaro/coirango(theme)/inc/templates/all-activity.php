<?php /* Template Name: All Activity */ ?>
<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>お洗活</h1>
</div>
<?php 
/* */
$search_key = array(
    'post_type' => 'activity',
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
    ),
    'order' => 'ASC'
);
$activity_query = new WP_Query($search_key);
?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<div class="pg3">
    <div class="titleinfo-sec">
        <div class="c-container">
            <div class="title-div">
                <h1>全国のコインランドリーのお洗活</h1>
                <h2>コインランドリーに行った記録や口コミを残してみよう。</h2>
            </div>
        </div>
    </div>
    <div class="detail-sec">
        <div class="c-container">
            <ul class="submenu-ul">
                <li>
                    <a href="<?php echo get_site_url(); ?>/activities">みんなのお洗活</a>
                </li>
                <li>
                    <a href="">お気に入り</a>
                </li>
            </ul>
            <div class="activity-list">
<?php 
    if($activity_query->have_posts()) : 
        while ($activity_query->have_posts()) : 
            $activity_query->the_post(); 
            $loop_id = get_the_id();

            $loop_author_id = get_post_field( 'post_author', $loop_id );
            $loop_author_data = get_userdata( $loop_author_id );
            $loop_author_uname = $loop_author_data->user_login;
            $loop_author_photo = get_avatar_url($loop_author_id);

            $loop_content = get_post_meta( $loop_id, 'activity_content', true );
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
           
?>
                <a href="<?php echo $activity_url; ?>"><div class="activity-div">
                    <div class="content-line">
                        <div class="line-left">
                            <div class="title-line">
                                <h2 class="h21"><span>[ <?php echo $laundry_province; ?> ]</span> <?php echo $laundry_name; ?></h2>
                            </div>
                            <div class="activity-content">
                                <div class="stop-overflow">
                                    <p><?php echo $loop_content; ?></p>
                                    <?php echo (!empty($loop_photo))?"<img src='$loop_photo'>":""; ?>
                                </div>
                                
                            </div>
                        </div>
                        <div class="line-right">
                            <div class="rounddiv" style="background-image:url('<?php echo $laundry_photo; ?>')";>
                            </div>
                        </div>
                    </div>
                    <div class="profile-line">
                        <div class="profile-div">
                            <div class="circleimg-div"><img class="circle-img" src="<?php echo $loop_author_photo; ?>" alt=""></div>
                            <span class="profile-name"><?php echo $loop_author_uname; ?></span>
                            <span class="visit-date"><?php echo $loop_date; ?></span>
                            <span class="visit-count"><?php echo $loop_visitno; ?>回目の訪問</span>
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
                    </div>
                </div></a>
<?php
        endwhile;
    endif;
?>
            </div>
        </div>
    </div>
</div>

</main><!-- End of #main ----------------------------------------------------------------------------------------------------------------------------------->

<?php
// get_sidebar();
get_footer();
