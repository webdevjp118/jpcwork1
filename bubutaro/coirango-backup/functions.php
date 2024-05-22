<?php
/**
 * Coirango functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Coirango
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'coirango_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function coirango_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Coirango, use a find and replace
		 * to change 'coirango' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'coirango', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'coirango' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'coirango_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'coirango_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function coirango_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'coirango_content_width', 640 );
}
add_action( 'after_setup_theme', 'coirango_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function coirango_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'coirango' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'coirango' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'coirango_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function coirango_scripts() {
	wp_enqueue_style( 'coirango-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'coirango-style', 'rtl', 'replace' );

	wp_enqueue_script( 'coirango-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coirango_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*********
 * 
 * 
 * Custom code
 * 
 * 
 * ***********/
/*Custom Post type start*/
function cw_post_type_laundry() {
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
    );
    
    $labels = array(
        'name' => _x('laundry', 'plural'),
        'singular_name' => _x('laundry', 'singular'),
        'menu_name' => _x('laundry', 'admin menu'),
        'name_admin_bar' => _x('laundry', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New laundry'),
        'new_item' => __('New laundry'),
        'edit_item' => __('Edit laundry'),
        'view_item' => __('View laundry'),
        'all_items' => __('All laundry'),
        'search_items' => __('Search laundry'),
        'not_found' => __('No laundry found.'),
    );
    
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'laundry'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('Laundry', $args);
}
add_action('init', 'cw_post_type_laundry');
/*Custom Post type end*/


// function that runs when shortcode is called
function wpb_search_shortcode() { 
?>
     <div>   
        <h3 style="text-align:center;">Search Laundry</h3>
        <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" style="display: flex;">
            <input type="text" name="s" placeholder="Facility name/ area / keyword"/>
            <input type="hidden" name="post_type" value="laundry" /> <!-- // hidden 'products' value -->
            <input type="submit" alt="Search" value="Search" />
        </form>
    </div>
    
<?php
} 
// register shortcode
add_shortcode('search-box', 'wpb_search_shortcode'); 



/************** custom search ******************/
function template_chooser($template)   {    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'laundry' )   
  {
    return locate_template('archive-search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');   


/************** Meta Box *****************/


/**
 * Add meta box
 *
 */
function laundry_add_meta_boxes( $post ){
	add_meta_box( 'laundry_meta_box', __( 'Area', 'area_example_plugin' ), 'area_build_meta_box', 'laundry', 'side', 'low' );
}
add_action( 'add_meta_boxes_laundry', 'laundry_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function area_build_meta_box( $post ){
	$laundry_area = get_post_meta( $post->ID, 'laundry_area', true );
	?>
	<div class='inside'>
		<h3><?php _e( 'Area', 'area_example_plugin' ); ?></h3>
		<p>
			<input type="text" name="laundry_area" value="<?php echo $laundry_area; ?>" /> 
		</p>
	</div>
	<?php
}

/**
 * Store custom field meta box data
 *
 */
function area_save_meta_box_data( $post_id ){
	if ( isset( $_REQUEST['laundry_area'] ) ) {
		update_post_meta( $post_id, 'laundry_area', sanitize_text_field( $_POST['laundry_area'] ) );
	}
}
add_action( 'save_post_laundry', 'area_save_meta_box_data' );




function posts_for_current_author($query) {
	global $pagenow;

	if( 'edit.php' != $pagenow || !$query->is_admin )
	    return $query;

	if( !current_user_can( 'edit_others_posts' ) ) {
		global $user_ID;
		$query->set('author', $user_ID );
	}
	return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

/******************************/
if ( ! function_exists('events_shortcode') ) {

    function events_shortcode() {
    	$args   =   array(
                	'post_type'         =>  'laundry',
                	'post_status'       =>  'publish',
                	'order' => 'ASC',
                	'posts_per_page' => 10,
    	            );
    	            
        $postslist = new WP_Query( $args );
        global $post;

        if ( $postslist->have_posts() ) :
        $events   .= '<div class="events-lists">';
		
            while ( $postslist->have_posts() ) : $postslist->the_post();         
                $events    .= '<div class="items">';
                $events    .= '<a href="'. get_permalink() .'">'. get_the_title() .'</a>';
                $events    .= '</div>';            
            endwhile;
            wp_reset_postdata();
            $events  .= '</div>';			
        endif;    
        return $events;
    }
    add_shortcode( 'laundry-list', 'events_shortcode' );   
}


/*********** comment points ***********/
function show_message_function( $comment_ID, $comment_approved ) {
    $user_id =  get_current_user_id();
    $user_coins = get_user_meta($user_id, 'user_coins');
    $prev_coins = (!empty($user_coins))?$user_coins[0]+1:1;
    update_user_meta($user_id, 'user_coins',  $prev_coins);


}
add_action( 'comment_post', 'show_message_function', 10, 2 );



/*** Hide admin-bar for front end user *****/
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
}



/*************** coin info in profile *************/
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <?php     
        $user_id =  get_current_user_id();
        $user_coins = get_user_meta($user_id, 'user_coins');
    ?>
    <h3><?php _e("Available Coins", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="address"><?php _e("Coins Available"); ?></label></th>
        <td>
            <?php echo (!empty($user_coins[0]))?$user_coins[0]:0; ?>
        </td>
    </tr>
    </table>
<?php }

/*********** redirect after login ************/
function my_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {

        if ( in_array( 'author', $user->roles ) ) {

            return home_url().'/dashboard';
        }
    } else {
        return $redirect_to;
    }
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


/********************************** Image Upload Scripts ******************************************/
add_action('admin_enqueue_scripts', 'my_admin_scripts');

function my_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {
        wp_enqueue_media();
        wp_register_script('my-admin-js', WP_PLUGIN_URL.'/my-plugin/my-admin.js', array('jquery'));
        wp_enqueue_script('my-admin-js');
    }
}


/**********************************************/

add_filter( 'wp_nav_menu', 'do_shortcode' );

add_shortcode( 'USER_INFO', 'dcwd_menu_shortcode_shortcode' );
function dcwd_menu_shortcode_shortcode( $atts, $content = "" ) {
    $current_user = wp_get_current_user();
	return $current_user->first_name.'&nbsp;&nbsp;'.get_avatar( $current_user->ID, 20 );
}