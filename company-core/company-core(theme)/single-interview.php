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
    $loop_id = get_the_ID();
    $loop_course = get_post_meta($loop_id, 'course', true);
    $loop_job = get_post_meta($loop_id, 'job', true);
    $loop_photo = get_field('photo');
    $loop_url = get_the_permalink();
?>
<!-- CONTAIN_START -->
<section id="contain">
    <div class="main-banner-hp top">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/staff_banner_bg.png" alt="" />
    </div>
    <div class="detail-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail-in-block-hp">
                    <div class="detail-middle-hp">
                        <div class="interview-detail-top-hp">
                            <img src="<?php echo $loop_photo['url']; ?>" alt="" />
                            <div class="interview-detail-tr-hp">
                                <h4><?php echo $loop_course; ?></h3>
                                <h1><?php echo $loop_job; ?></h1>
                                <h3><?php echo the_title(); ?></h3>
                            </div>
                        </div>
                        <div class="interview-detail-wrap">
							<div class="pmhwp">
								<?php the_content(); ?>
							</div>
                        </div>
                        <a href="<?php echo get_site_url(); ?>/interview/" class="common-btn-hp">
                            一覧へ戻る<i class="fas fa-chevron-right"></i>
                        </a>
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
endwhile;
?>
<?php
get_footer();
