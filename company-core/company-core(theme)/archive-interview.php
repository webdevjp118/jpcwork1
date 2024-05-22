<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Company_Core
 */

get_header();
?>


<!-- CONTAIN_START -->
<section id="contain">
    <div class="main-banner-hp" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/staffs_banner_bg.png') center center no-repeat; background-size: cover;">
        <div class="common-title-hp common-banner-title-hp" data-aos="fade-down" data-aos-duration="2000">
            <h1>STAFF INTERVIEW</h1>
            <h4>スタッフインタビュー</h4>
            <div class="line"></div>
        </div>
    </div>
    <div class="interview-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 interview-block-in-hp">
                    <div class="interview-middle-hp" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="500">
                        <p>弊社で活躍する先輩スタッフの声をご紹介します。</p>
                        <div class="staff-content-hp">
                            <img class="staff-man-img-hp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/man.svg" alt="" />
                            <img class="staff-woman-img-hp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/woman.svg" alt="" />
                            <img class="staff-tree-img-hp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/tree.svg" alt="" />
                            <div class="staff-list-hp">
                                <div class="row">
<?php
while ( have_posts() ) :
    the_post();
    $loop_id = get_the_ID();
    $loop_course = get_post_meta($loop_id, 'course', true);
    $loop_job = get_post_meta($loop_id, 'job', true);
    $loop_photo = get_field('photo');
    $loop_url = get_the_permalink();
?>
                                    <div class="col-md-4">
                                        <div class="staff-item-hp">
                                            <div class="staff-item-photo-hp">
                                                <img src="<?php echo $loop_photo['url']; ?>" alt="" />
                                            </div>
                                            <div class="staff-item-content-hp">
                                                <p class="name">
                                                    <?php echo $loop_course; ?><br>
                                                    <?php echo $loop_job; ?>
                                                </p>
                                                <p class="desc"><?php the_title(); ?></p>
                                                <a href="<?php echo $loop_url; ?>" class="common-btn-hp">
                                                    MORE<i class="fas fa-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
<?php
endwhile;
?>
                                </div>
                            </div>
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