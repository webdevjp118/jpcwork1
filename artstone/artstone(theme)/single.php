<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package artstone
 */

get_header();
?>

<?php
while(have_posts()):
	the_post();
	$cur_post_id = get_the_ID();
	$cur_post = get_post($cur_post_id);
	$cur_post_title = get_the_title($cur_post_id);
	$cur_post_date = get_the_date('Y/m/d');
	$cur_post_content = apply_filters('the_content', $cur_post->post_content);
	$cur_featured_img = get_the_post_thumbnail_url();
	if(empty($cur_featured_img)) $cur_featured_img = get_stylesheet_directory_uri()."/images/news_detail_image.png";
	$category_wp  = get_the_category();
	$cur_cat_name = "";
    $cur_cat_id = 0;
	if(count($category_wp)>0) {
        $cur_cat_name = $category_wp[0]->cat_name;
        $cur_cat_id = $category_wp[0]->term_id;
    } 

endwhile;
?>

<section class="breadcrumb_section">
    <div class="custom_container">
        <div class="breadcrumb_title">
            <h2>NEWS</h2>
            <p>_お知らせ</p>
        </div>
    </div>
    <div class="breadcrumb_path">
        <div class="custom_container">
            <ul>
                <li>
                    <a href="<?php echo get_site_url(); ?>">ホーム</a>
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li><span>お知らせ</span></li>
            </ul>
        </div>
    </div>
</section>
<section class="news_details_section">
    <div class="float_images">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-square-pattern-big.png" class="dot_square_pattern_1" alt="dot square pattern">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-square-pattern-3.png" class="dot_square_pattern_2" alt="dot square pattern">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-square-pattern-big.png" class="dot_square_pattern_3" alt="dot square pattern">
    </div>
    <div class="custom_container">
        <p><?php echo $cur_post_date; ?></p>
        <div class="news_details_sec">
            <div class="news_details_inner">
                <span><?php echo $cur_cat_name; ?></span>
                <h1 class="single_blog_title"><?php echo $cur_post_title; ?></h1>
                <div class="news_details_image">
                    <img src="<?php echo $cur_featured_img; ?>" alt="news detail image">
                </div>
				<div class="pmhwp">
					<?php echo $cur_post_content; ?>
				</div>
            </div>
        </div>
    </div>
</section>
<section class="all_news_section news_details_page_section">
    <div class="float_images">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-square-pattern-2.png" class="dot_square_pattern_4" alt="dot square pattern">
    </div>
    <div class="custom_container">
        <div class="heading_text">
            <h2>NEWS ENTRIES</h2>
            <p>_関連ニュース</p>
        </div>
        <div class="all_news_list_sec">
<?php
global $wp_query;
$args = array(
'category__and' => $cur_cat_id, //must use category id for this field
//'tag__in' => 'post_tag', //must use tag id for this field
//'posts_per_page' => -1,
); //get all posts

$rel_posts = get_posts($args);
foreach ($rel_posts as $each_post) :
    $loop_id = $each_post->ID;
    if($loop_id == $cur_post_id) continue;
	$loop_date = get_the_date('Y/m/d', $loop_id);
	$loop_title = get_the_title($loop_id);
	$loop_category = get_the_category($loop_id);
	$loop_permalink = get_permalink($loop_id);
	$loop_cat_name = "";
	if(count($loop_category)>0) $loop_cat_name = $loop_category[0]->cat_name;
	$loop_featured_img = get_the_post_thumbnail_url($loop_id);
    if(empty($loop_featured_img)) $loop_featured_img = get_stylesheet_directory_uri()."/images/blog-default.png";
?>
            <div class="all_news_list_box">
                <a href="<?php echo $loop_permalink; ?>">
                    <div class="custom_row">
                        <div class="custom_col_image">
                            <div class="all_news_image">
                                <p><?php echo $loop_date; ?></p>
                                <div class="all_news_image_inner">
                                    <img src="<?php echo $loop_featured_img; ?>" alt="news image">
                                </div>
                            </div>
                        </div>
                        <div class="custom_col_text">
                            <div class="all_news_content">
                                <span><?php echo $loop_cat_name; ?></span>
                                <div class="all_news_text">
                                    <p><?php echo $loop_title; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
<?php
endforeach;
?>
        </div>
        <a class="button_read_more io fade upS" href="<?php echo get_site_url(); ?>/news/">
            <span>ニュース一覧へ</span>
        </a>
    </div>
</section>
<section class="contact_section">
    <div class="custom_container">
        <div class="contact_content">
            <h3><span>C</span>ONTACT</h3>
            <h6>– お問い合わせ –</h6>
            <p>※取材、お仕事のご依頼などお気軽にお問合せください。<br>
                ※絵画に関するご質問も、こちらからお願い致します。<br>
                ※VASEライバーオーディションに関するお問い合わせには<br>
            回答できません。予めご了承ください。</p>
            <a href="<?php echo get_site_url(); ?>/contact/">お問い合わせフォームへ<i class="fas fa-chevron-right" aria-hidden="true"></i></a>
        </div>
    </div>
</section>

<?php
get_footer();
