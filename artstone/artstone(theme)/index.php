<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package artstone
 */

get_header();
?>

<?php
global $wp;
// get current url with query string.
$current_url =  home_url( $wp->request ); 
// get the position where '/page.. ' text start.
$pos = strpos($current_url , '/page');
// remove string from the specific postion
if($pos>0) $this_page_url = substr($current_url,0,$pos);
else $this_page_url = $current_url;

$this_category = get_the_category();

$pageno = (get_query_var('paged')) ? get_query_var('paged') : 1;
global $wp_query;
$page_count = $wp_query ? $wp_query->max_num_pages : 1;

if($pageno <= 1) $prev_link = "javascript:void(0)";
else $prev_link = $this_page_url.'/page/'.($pageno-1);
if($pageno >= $page_count) $next_link = "javascript:void(0)";
else $next_link = $this_page_url.'/page/'.($pageno+1);
$pagebtn_list = [];
if($pageno>1) {
	array_push($pagebtn_list, array(
		'type' => 'button',
		'cap' => 1,
		'pagelink' => $this_page_url.'/page/1',
	));
}
if($pageno>2) {
	array_push($pagebtn_list, array(
		'type' => 'text',
		'cap' => '...',
		'pagelink' => '',
	));
}
array_push($pagebtn_list, array(
	'type' => 'active',
	'cap' => $pageno,
	'pagelink' => 'javascript:void(0)',
));
if($pageno+1 < $page_count) {
	array_push($pagebtn_list, array(
		'type' => 'text',
		'cap' => '...',
		'pagelink' => '',
	));
}
if($pageno < $page_count) {
	array_push($pagebtn_list, array(
		'type' => 'button',
		'cap' => $page_count,
		'pagelink' => $this_page_url.'/page/'.$page_count,
	));
}

$post_loop = [];
while ( have_posts() ) :
	the_post();
    $loop_id = get_the_ID();
    array_push($post_loop, $loop_id);
endwhile;
wp_reset_query();

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
					<a href="<?php echo get_site_url(); ?>/">ホーム</a>
					<i class="fas fa-chevron-right"></i>
				</li>
				<li><span>お知らせ</span></li>
			</ul>
		</div>
	</div>
</section>
<section class="all_news_section">
	<div class="float_images">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-square-pattern-big.png" class="dot_square_pattern_1" alt="dot square pattern">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-square-pattern-3.png" class="dot_square_pattern_2" alt="dot square pattern">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-square-pattern-big.png" class="dot_square_pattern_3" alt="dot square pattern">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-square-pattern-2.png" class="dot_square_pattern_4" alt="dot square pattern">
	</div>
	<div class="custom_container">
		<div class="all_news_btn_sec">
			<ul>
<?php
if(is_category()) {
	echo '<li><a href="'.get_site_url().'/news/">ALL</a></li>';
}
else {
	echo '<li><a href="javascript:void(0)" class="active">ALL</a></li>';
}
$categories = get_categories();
foreach($categories as $category) {
	if(is_category() && $this_category[0]->term_id == $category->term_id) {
		echo '<li><a href="javascript:void(0)" class="active">'.$category->name.'</a></li>';
	}
	else {
		echo '<li><a href="'.get_category_link($category->term_id).'">'.$category->name.'</a></li>';
	}
}
?>
			</ul>
		</div>
		<div class="all_news_list_sec">
<?php
foreach($post_loop as $each_post) {
	$loop_id = $each_post;
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
								<?php echo !empty($loop_cat_name)?'<span>'.$loop_cat_name.'</span>':''; ?>
								<div class="all_news_text">
									<p><?php echo $loop_title; ?></p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
<?php
}
?>

			<div class="pagination_sec">
				<ul>
					<li>
						<a href="<?php echo $prev_link; ?>"><i class="fas fa-chevron-left"></i></a>
					</li>
<?php
foreach($pagebtn_list as $pagebtn) {
	if($pagebtn['type'] == 'active') {
		echo '<li><a href="'.$pagebtn['pagelink'].'" class="active">'.$pagebtn['cap'].'</a></li>';
	}
	else if($pagebtn['type'] == 'button') {
		echo '<li><a href="'.$pagebtn['pagelink'].'">'.$pagebtn['cap'].'</a></li>';
	}
	else {
		echo '<li><p>'.$pagebtn['cap'].'</p></li>';
	}
}
?>
					<li>
						<a href="<?php echo $next_link; ?>"><i class="fas fa-chevron-right"></i></a>
					</li>
				</ul>
			</div>
		</div>
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
			<a href="contact.html">お問い合わせフォームへ<i class="fas fa-chevron-right" aria-hidden="true"></i></a>
		</div>
	</div>
</section>


<?php
get_footer();
