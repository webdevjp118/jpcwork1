<?php /* Template Name: Top */ ?>
<?php
get_header();
?>


<!-- CONTAIN_START -->
<section id="contain">
    <div class="main-banner-hp">
        <video autoplay muted loop id="myVideo">
            <source src="<?php echo get_stylesheet_directory_uri(); ?>/images/keyvision20211216.mp4" type="video/mp4">
        </video>
        <!-- <h1 style="opacity:0">想像の先に、感動を</h1> -->
    </div>
    <div class="mission-block-hp">
        <div class="left-banner-image-hp" data-aos="fade-left" data-aos-duration="2000">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mission_img.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mission-block-in-hp">
                    <div class="mission-middle-hp">
                        <div class="mission-content-hp" data-aos="fade-right" data-aos-duration="2000">
                            <div class="common-title-hp align-left">
                                <h1 class="grey">Our Mission & Philosophy</h1>
                                <h4 class="grey">株式会社COREについて</h4>
                                <div class="line grey"></div>
                            </div>
                            <h1>創造の先に、感動を。</h1>
                            <p>
                                私たちコアが触媒として作用し、お客さまと課題に反応する。<br>
                                知識と経験と技術に創造力を融合させ、より強く、より激しく活性化させる。<br>
                                そうして生まれた創造的産物は、お客様に喜びと感動を与え、<br>
                                お客様の更なる発展に寄与すると信じます。<br>
                                これこそが私たちの使命であり、喜びと感動と活力の源となるものです。<br><br>
                                「Solutions Company ～ 創造の先に、感動を。」<br>
                                これが私たちの企業活動における理念です。
                            </p>
                            <a href="<?php echo get_site_url(); ?>/about/" class="common-btn-hp">
                                ABOUT<i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="news-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 news-block-in-hp">
                    <div class="news-middle-hp">
                        <div class="common-title-hp" data-aos="fade-down" data-aos-duration="2000">
                            <h1>NEWS & TOPICS</h1>
                            <h4>ニュース</h4>
                            <div class="line"></div>
                        </div>
                        <div class="news-list-hp" data-aos="fade-down" data-aos-duration="2000">
                            <div class="row">
<?php
query_posts( 'posts_per_page=12' );
while ( have_posts() ) : 
    the_post();
    $loop_url = get_permalink(); 
    $featured_img_url = get_the_post_thumbnail_url(); 
    if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/noimage.jpg";
    $loop_date = get_the_date('Y.m.d');
    $category_detail=get_the_category();//$post->ID
    $cat_list = [];
    foreach($category_detail as $cd){
        array_push($cat_list, $cd->cat_name);
    }
?>
                                <div class="col-md-4">
                                    <a href="<?php echo $loop_url; ?>" class="news-item-hp">
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
                                    </a>
                                </div>
<?php
endwhile;
wp_reset_postdata();
?>
                            </div>
                        </div>
                        <a href="<?php echo get_site_url(); ?>/news-topics/" class="common-btn-hp">
                            もっと見る<i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="mission-block-hp">
        <div class="left-banner-image-hp" data-aos="fade-left" data-aos-duration="2000">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/services_img.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mission-block-in-hp">
                    <div class="mission-middle-hp">
                        <div class="mission-content-hp" data-aos="fade-right" data-aos-duration="2000">
                            <div class="common-title-hp align-left">
                                <h1>SERVICES</h1>
                                <h4>業務内容</h4>
                                <div class="line"></div>
                            </div>
                            <h1>
                                お客さまの視点に立った<br>
                                ソリューションを目指す
                            </h1>
                            <p>
                                ソリューションのテーマはいつもお客さまの中にあります。<br>
                                私たちは「お客さまの立場に立って」考えることを大切にします。
                            </p>
                            <a href="<?php echo get_site_url(); ?>/service/" class="common-btn-hp">
                                MORE<i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="staff-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 staff-block-in-hp">
                    <div class="staff-middle-hp">
                        <div class="common-title-hp align-left" data-aos="fade-down" data-aos-duration="2000">
                            <h1 class="white">STAFF INTERVIEW</h1>
                            <h4 class="white">スタッフインタビュー</h4>
                            <div class="line white"></div>
                        </div>
                        <div class="staff-content-hp">
                            <img class="staff-man-img-hp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/man.svg" alt="" />
                            <img class="staff-woman-img-hp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/woman.svg" alt="" />
                            <img class="staff-tree-img-hp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/tree.svg" alt="" />
                            <div class="staff-list-hp" data-aos="fade-down" data-aos-duration="2000">
                                <div class="row">
<?php
query_posts( 'post_type=interview' );
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
wp_reset_postdata();
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