<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Company_Core
 */

get_header();
global $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$prev_paged = $paged - 1;
if($prev_paged < 1) $prev_paged = 1;
$count_posts = wp_count_posts();
$total_pages = $wp_query->max_num_pages;
$next_paged = $paged + 1;
if($next_paged > $total_pages) $next_paged = $total_pages;
$search_key = "";
if(isset($_GET['s'])) $search_key = $_GET['s'];
$search_param = "";
if(!empty($search_key)) $search_param = "?s=".$search_key;
?>
<!-- CONTAIN_START -->
<section id="contain">
    <div class="main-banner-hp" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/news_banner_bg.png') center center no-repeat; background-size: cover;">
        <div class="common-title-hp common-banner-title-hp">
            <h1>NEWS & TOPICS</h1>
            <h4>ニュース</h4>
            <div class="line"></div>
        </div>
    </div>
    <div class="topics-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 topics-block-in-hp">
                    <div class="topics-middle-hp">
                        <div class="topics-left-hp">
                            <div class="news-list-hp">
<?php
		if ( have_posts() ) :
?>
								<div class="row">
<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				$featured_img_url = get_the_post_thumbnail_url(); 
				$loop_date = get_the_date('Y.m.d');
				$category_detail=get_the_category();//$post->ID
				$cat_list = [];
				foreach($category_detail as $cd){
					array_push($cat_list, $cd->cat_name);
				}

				if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/noimage.jpg";

?>
									<div class="col-md-6">
                                        <div class="news-item-hp">
                                            <img src="<?php echo $featured_img_url; ?>" alt="" />
                                            <div class="news-item-content-hp">
                                                <div class="date">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time.svg" alt="" /><?php echo $loop_date; ?>
                                                </div>
                                                <p><?php the_title(); ?></p>
                                            </div>
                                            <div class="news-item-category-hp">
												<?php for($i=0;$i<count($cat_list);$i++){	
                                                    if ($i == count($cat_list) - 1)
                                                        echo '<span>'.$cat_list[$i].'</span>';
                                                    else
                                                        echo '<span>'.$cat_list[$i].'</span>, ';
												}?>
											</div>
                                        </div>
                                    </div>
<?php
			endwhile;
?>
								</div>
							</div>
<?php
	endif;
?>
                            <div class="pagination-hp">
                                <a href="<?php echo get_site_url(); ?>/page/<?php echo $prev_paged.'/'.$search_param; ?>" class="pagination-item-hp"><i class='fas fa-chevron-left'></i></a>
<?php 
for($i=1;$i<=$total_pages;$i++) {
	if($i == $paged) {
		echo '<a href="'.get_site_url().'/page/'.$i.'/'.$search_param.'" class="pagination-item-hp active">'.$i.'</a>';
	}
	else {
		echo '<a href="'.get_site_url().'/page/'.$i.'/'.$search_param.'" class="pagination-item-hp">'.$i.'</a>';
	}
}
?>
                                <a href="<?php echo get_site_url(); ?>/page/<?php echo $next_paged.'/'.$search_param; ?>" class="pagination-item-hp"><i class='fas fa-chevron-right'></i></a>
                            </div>
                        </div>
                        <div class="topics-right-hp">
<?php
get_sidebar();
?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</section>
<?php
get_footer();