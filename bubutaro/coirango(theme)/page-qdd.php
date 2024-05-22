<?php
	$args = array(
		// 'post_type' => 'laundry',
		// 's' => '1',
		// 'posts_per_page' => 2,
	);	
	$query = new WP_Query($args);
	if($query->have_posts()):
		while($query->have_posts()):
			$query->the_post();
			echo get_the_title()."<br>";
		endwhile;
	endif;
	print_r(get_queried_object());
	exit;

?>