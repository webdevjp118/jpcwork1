<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Company_Core
 */

get_header();
?>

<?php
while ( have_posts() ) :
	the_post();
	$featured_img_url = get_the_post_thumbnail_url(); 
	$prev_post = get_adjacent_post(false, '', true);
	$prev_post_link = "";
	if(!empty($prev_post)) $prev_post_link = get_permalink($prev_post->ID);
	$next_post = get_adjacent_post(false, '', false);
	$next_post_link = "";
	if(!empty($next_post)) $next_post_link = get_permalink($next_post->ID);
    $category_detail=get_the_category();//$post->ID
    $cat_list = [];
    foreach($category_detail as $cd){
        array_push($cat_list, $cd->cat_name);
    }

?>
<!-- CONTAIN_START -->
<section id="contain">
    
    <div class="topics-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 topics-block-in-hp">
                    <div class="topics-middle-hp">
                        <div class="topics-left-hp">
                            <div class="topics-category-hp">
                                <p class="date"><i class="fas fa-clock"></i>&ensp;2021.10.12</p>
                                <div class="topics-category-list-hp">
<?php
    for($i=0;$i<count($cat_list);$i++) {
        echo '<div class="topics-category-item-hp">'.$cat_list[$i].'</div>';
    }
?>
                                </div>
                            </div>
                            <h2><?php the_title(); ?></h2>
                            <div class="line"></div>
<?php
	if(!empty($featured_img_url)) {
?>
							<img src="<?php echo $featured_img_url; ?>" alt="" />
<?php
	} else {
?>
							<div style="content:'';height:30px;"></div>
<?php
	}
?>
                            
							<div class="pmhwp">
								<?php the_content(); ?>
							</div>
                            <div class="topics-buttons-hp">
<?php
	if(!empty($prev_post_link)):
?>
                                <a href="<?php echo $prev_post_link; ?>" class="common-btn-hp">
                                    <i class="fas fa-chevron-left"></i>前の記事へ
                                </a>
<?php
	endif;
?>
<?php
	if(!empty($next_post_link)):
?>
                                <a href="<?php echo $next_post_link; ?>" class="common-btn-hp">
                                    次の記事へ<i class="fas fa-chevron-right"></i>
                                </a>
<?php
	endif;
endwhile; // End of the loop.
?>
                            </div>
<?php
$related = ci_get_related_posts( get_the_ID(), 4 );

if ( $related->have_posts() ):
?>
							<div class="common-title-hp align-left">
                                <h1>RELATED TOPICS</h1>
                                <h4>関連記事</h4>
                            </div>
							<div class="news-list-hp">
								<div class="row">
<?php 
	while ( $related->have_posts() ): 
		$related->the_post(); 
		$loop_url = get_permalink(); 
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
	endwhile; ?>
                            </div>
<?php
endif;
wp_reset_postdata();
?>
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
<!-- CONTAIN_END -->
<?php
get_footer();
