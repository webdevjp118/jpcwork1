<?php /* Template Name: Laundry List  */ ?>
<?php get_header(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<?php 

$page_id = get_the_ID();

if(isset($_GET['id'])){
    wp_delete_post($_GET['id'], true);
}

$args = array(
    'post_type'=> 'laundry',
    'orderby'    => 'ID',
    'post_status' => 'publish',
    'order'    => 'DESC',
    'author'   => get_current_user_id(),
    'posts_per_page' => -1 // this will retrive all the post that is published 
);
$result = new WP_Query( $args ); ?>
<br><br>
	<div class="row">
		<div>
			<?php //include (TEMPLATEPATH . '/templates/custom-sidebar.php'); ?>
		</div>
		<div id="postbox">
			<table id="table_id" class="display">
				<thead>
					<tr>
						<th>Laundry Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if ( $result-> have_posts() ) : 
						while ( $result->have_posts() ) : 
						$result->the_post(); 
					?>
					<tr>
						<td><?php the_title(); ?></td>
						<td><a href="<?php echo get_site_url() ?>/add-laundry?id=<?php echo get_the_id(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;<a href="<?php echo get_permalink($page_id); ?>?id=<?php echo get_the_id(); ?>" onclick="return confirm('Are you sure, you want to delete this post?')"><i class="fa fa-trash-o"></i></a></td>
					</tr>
					<?php endwhile; endif;?>
				</tbody>
			</table>
		</div>
	</div>
<?php wp_reset_postdata(); ?>

<script>
    jQuery(document).ready( function () {
        jQuery('#table_id').DataTable();
} );
</script>
<style>
    .dataTables_wrapper {
        width:90%;
    }
    
     .dataTables_wrapper {
        width:90%;
        margin: 0 auto;
    }
    
     #postbox{
        width: 90%;
        margin: 0 auto;
    }
    #sidebar{
        width: 30%; 
    }
    .row{
        display:flex;
    }
</style>
<?php get_footer(); ?>