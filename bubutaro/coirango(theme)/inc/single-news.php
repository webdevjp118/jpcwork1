<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>お知らせ</h1>
</div>


	<main id="primary" class="site-main">
<div class="pg6">
<div class="c-container">
<?php
	while ( have_posts() ) :
		the_post();
		$loop_date = get_the_date("Y.m.d");
		$loop_id = get_the_ID();
		$loop_author_id = get_post_field( 'post_author', $loop_id );
		$loop_author_data = get_userdata( $loop_author_id );
        $loop_author_uname = $loop_author_data->user_login;
		$loop_authorphoto = get_avatar_url($loop_author_id);
?>
	<div class="author-div">
		<span class="date"><?php echo $loop_date; ?></span>
		<div class="photo-div">
			<div class="author-photo">
				<div class="circlediv" style="background-image:url('<?php echo $loop_authorphoto; ?>');">
				</div>
			</div>
			<span class="author-name"><?php echo $loop_author_uname; ?></span>
		</div>
	</div>
<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
	<div class="post-share">
		<p class="inner">
			<span class="c-roboto">SHARE ON</span>
			<a href="" class="fb-share-btn" target="_blank">シェア</a>
			<a href="" class="tw-share-btn" target="_blank">シェア</a>
		</p>
	</div>
	<div class="backbtn-div">
		<a href="<?php echo get_site_url(); ?>/magazines" class="back-btn">お知らせに戻る</a>
	</div>
	
<?php
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . '</span> <span class="nav-title">%title</span>',
			)
		);
	endwhile; // End of the loop.
		?>
</div><!-- .c-container -->
</div><!-- .pg6 -->

	</main><!-- #main -->

<?php
get_footer();
