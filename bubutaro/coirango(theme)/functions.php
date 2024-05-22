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
function cw_post_type_news() {
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
        'name' => _x('お知らせ', 'plural'),
        'singular_name' => _x('news', 'singular'),
        'menu_name' => _x('お知らせ', 'admin menu'),
        'name_admin_bar' => _x('お知らせ', 'admin bar'),
        'add_new' => _x('新規追加', 'add new'),
        'add_new_item' => __('お知らせ新規追加'),
        'new_item' => __('新規追加'),
        'edit_item' => __('Edit News'),
        'view_item' => __('View News'),
        'all_items' => __('お知らせ一覧'),
        'search_items' => __('お知らせ検索'),
        'not_found' => __('No News found.'),
    );
    
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'news'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('News', $args);
}
add_action('init', 'cw_post_type_news');
function cw_post_type_magazine() {
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
        'name' => _x('コイラン裏テク', 'plural'),
        'singular_name' => _x('magazine', 'singular'),
        'menu_name' => _x('コイラン裏テク', 'admin menu'),
        'name_admin_bar' => _x('コイラン裏テク', 'admin bar'),
        'add_new' => _x('新規追加', 'add new'),
        'add_new_item' => __('コイラン裏テク新規追加'),
        'new_item' => __('新規追加'),
        'edit_item' => __('Edit Magazine'),
        'view_item' => __('View Magazine'),
        'all_items' => __('コイラン裏テク一覧'),
        'search_items' => __('お知らせ検索'),
        'not_found' => __('No Magazine found.'),
    );
    
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'magazine'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('Magazine', $args);
}
add_action('init', 'cw_post_type_magazine');
function cw_post_type_ccomment() {
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
        'name' => _x('ccomment', 'plural'),
        'singular_name' => _x('ccomment', 'singular'),
        'menu_name' => _x('Ccomment', 'admin menu'),
        'name_admin_bar' => _x('ccomment', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New Ccomment'),
        'new_item' => __('New Ccomment'),
        'edit_item' => __('Edit Ccomment'),
        'view_item' => __('View Ccomment'),
        'all_items' => __('All Ccomment'),
        'search_items' => __('Search ccomment'),
        'not_found' => __('No ccomment found.'),
    );
    
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'ccomment'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('Ccomment', $args);
}
add_action('init', 'cw_post_type_ccomment');

function cw_post_type_activity() {
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
        'name' => _x('activity', 'plural'),
        'singular_name' => _x('activity', 'singular'),
        'menu_name' => _x('Activity', 'admin menu'),
        'name_admin_bar' => _x('Activity', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New Activity'),
        'new_item' => __('New Ativity'),
        'edit_item' => __('Edit Activity'),
        'view_item' => __('View Activity'),
        'all_items' => __('All Activity'),
        'search_items' => __('Search activity'),
        'not_found' => __('No activity found.'),
    );
    
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'activity'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('Activity', $args);
}
add_action('init', 'cw_post_type_activity');

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
        'menu_name' => _x('Laundry', 'admin menu'),
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
        'publicly_queryable'  => true,
    );
    register_post_type('Laundry', $args);
}
add_action('init', 'cw_post_type_laundry');
/*Custom Post type end*/

// get the first image in content
function catch_first_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
  
    if(empty($first_img)){ //Defines a default image
      $first_img = "/images/default.jpg";
    }
    return $first_img;
  }
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
    show_admin_bar(false);
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
    // global $user;
    // if ( isset( $user->roles ) && is_array( $user->roles ) ) {
    //     if ( in_array( 'author', $user->roles ) ) {
    //         return home_url().'/dashboard';
	// 	}
	// 	else 
	// 	{
	// 		return $redirect_to;
	// 	}
    // } else {
    //     return $redirect_to;
    // }
    wp_redirect( get_site_url() );
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

/*********** redirect after logout ************/
function ps_redirect_after_logout(){
         wp_redirect( get_site_url() );
         exit();
}
add_action('wp_logout','ps_redirect_after_logout');
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

/*Laundry ikitai plugin code******************************************** */
function ids_toarray($ids) {
    $temp = [];
    if(!empty($ids)) $temp = explode(',', $ids);
    $result = [];
    foreach($temp as $each) {
        if(!empty($each)) array_push($result, intval($each));
    }
    return $result;
}
function arr_toids($arr) {
    $result = "";
    foreach($arr as $each) {
        if(!empty($each)) $result .= $each.',';
    }
    return $result;
}

add_action( 'wp_enqueue_scripts', 'laundry_ikitai_it_scripts' );
function laundry_ikitai_it_scripts() {
    if( is_single() ) {
         
        if (!wp_script_is( 'jquery', 'enqueued' )) {
            wp_enqueue_script( 'jquery' );// Comment this line if you theme has already loaded jQuery
        }
    	wp_enqueue_script( 'ikitai-it', get_stylesheet_directory_uri().'/js/ikitai.js', array('jquery'), '1.0', true );
 
        wp_localize_script( 'ikitai-it', 'ikitaiit', array(
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));
    }
}

add_action( 'wp_ajax_nopriv_laundry_ikitai_it', 'laundry_ikitai_it' );
add_action( 'wp_ajax_laundry_ikitai_it', 'laundry_ikitai_it' );
function laundry_ikitai_it() {
	$laundry_id = $_REQUEST['laundry_id'];
    $user_id = $_REQUEST['user_id'];
    $laundry_ikitai_users = get_post_meta( $laundry_id, 'laundry_ikitai_users', true );
    $laundry_ikitai_user_array = ids_toarray($laundry_ikitai_users);
    $test = [];
    $user_ikitai_laundries = get_user_meta($user_id, 'user_ikitai_laundries', true);
    $user_ikitai_laundry_array = ids_toarray($user_ikitai_laundries);
    
    $ikitai_it_flag = 0;
	if(in_array($laundry_id, $user_ikitai_laundry_array)) {
        $ikitai_it_flag = 0;
        $pos = array_search($laundry_id, $user_ikitai_laundry_array);
        unset($user_ikitai_laundry_array[$pos]);
        $pos = array_search($user_id, $laundry_ikitai_user_array);
        unset($laundry_ikitai_user_array[$pos]);
	}
	else {
        $ikitai_it_flag = 1;
        array_push($user_ikitai_laundry_array, $laundry_id);
        array_push($laundry_ikitai_user_array, $user_id);
	}
    $laundry_ikitai_users = arr_toids($laundry_ikitai_user_array);
	update_post_meta($laundry_id, 'laundry_ikitai_users', $laundry_ikitai_users );
    $user_ikitai_laundries = arr_toids($user_ikitai_laundry_array);
	update_user_meta($user_id, 'user_ikitai_laundries', $user_ikitai_laundries );

    $return_data = array(
        'test' => $test,
        'ikitai_it_count' => count($laundry_ikitai_user_array),
        'ikitai_it_flag' => $ikitai_it_flag
    );

    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        echo json_encode($return_data);
        die();
    }
    else {
        wp_redirect( get_permalink( $laundry_id ) );
        exit();
    }
}

/* Like Any Ajax */
add_action( 'wp_enqueue_scripts', 'like_it_scripts' );
function like_it_scripts() { 
    if (!wp_script_is( 'jquery', 'enqueued' )) {
        wp_enqueue_script( 'jquery' );// Comment this line if you theme has already loaded jQuery
    }
    wp_enqueue_script( 'like-it', get_stylesheet_directory_uri().'/js/likeit.js', array('jquery'), '1.0', true );

    wp_localize_script( 'like-it', 'like_it', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}

add_action( 'wp_ajax_nopriv_like_it', 'like_it' );
add_action( 'wp_ajax_like_it', 'like_it' );
function like_it() {
	$user_id = $_REQUEST['user_id'];
    $target_id = $_REQUEST['target_id'];
    $like_to = get_user_meta( $user_id, 'like_to', true );
    $like_from = get_post_meta($target_id, 'like_from', true);
    $like_to_array = ids_toarray($like_to);
    $like_from_array = ids_toarray($like_from);
    $like_flag = 0;
    if(in_array($target_id, $like_to_array)) {
        $like_flag = 0;
        $pos = array_search($target_id, $like_to_array);
        unset($like_to_array[$pos]);
        $pos = array_search($user_id, $like_from_array);
        unset($like_from_array[$pos]);
	}
	else {
        $like_flag = 1;
        array_push($like_to_array, $target_id);
        array_push($like_from_array, $user_id);
    }
    $like_to = arr_toids($like_to_array);
    update_user_meta($user_id, 'like_to', $like_to );
    $like_from = arr_toids($like_from_array);
    update_post_meta($target_id, 'like_from', $like_from );
    $like_count = count($like_from_array);
    if($like_count <= 0 ) $like_count = '';
    $return_data = array(
        'like_flag' => $like_flag,
        'like_count' => $like_count
    );

    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        echo json_encode($return_data);
        die();
    }
    else {
        wp_redirect( get_permalink( $user_id ) );
        exit();
    }
}
/* Favirute User Ajax */
add_action( 'wp_enqueue_scripts', 'favorite_user_scripts' );
function favorite_user_scripts() { 
    if (!wp_script_is( 'jquery', 'enqueued' )) {
        wp_enqueue_script( 'jquery' );// Comment this line if you theme has already loaded jQuery
    }
    wp_enqueue_script( 'favorite-user', get_stylesheet_directory_uri().'/js/favorite.js', array('jquery'), '1.0', true );

    wp_localize_script( 'favorite-user', 'favorite_user', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}

add_action( 'wp_ajax_nopriv_favorite_user', 'favorite_user' );
add_action( 'wp_ajax_favorite_user', 'favorite_user' );
function favorite_user() {
	$user_id = $_REQUEST['user_id'];
    $target_id = $_REQUEST['target_id'];
    $favorite_to_users = get_user_meta( $user_id, 'favorite_to_users', true );
    $favorite_from_users = get_user_meta($target_id, 'favorite_from_users', true);
    $favorite_to_user_array = ids_toarray($favorite_to_users);
    $favorite_from_user_array = ids_toarray($favorite_from_users);
    $favorite_flag = 0;
    if(in_array($target_id, $favorite_to_user_array)) {
        $favorite_flag = 0;
        $pos = array_search($target_id, $favorite_to_user_array);
        unset($favorite_to_user_array[$pos]);
        $pos = array_search($user_id, $favorite_from_user_array);
        unset($favorite_from_user_array[$pos]);
	}
	else {
        $favorite_flag = 1;
        array_push($favorite_to_user_array, $target_id);
        array_push($favorite_from_user_array, $user_id);
    }
    
    $favorite_to_users = arr_toids($favorite_to_user_array);
    update_user_meta($user_id, 'favorite_to_users', $favorite_to_users );
    $favorite_from_users = arr_toids($favorite_from_user_array);
    update_user_meta($target_id, 'favorite_from_users', $favorite_from_users );

    $return_data = array(
        'favorite_flag' => $favorite_flag
    );

    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        echo json_encode($return_data);
        die();
    }
    else {
        wp_redirect( get_permalink( $user_id ) );
        exit();
    }
}
/* Remove menu items */
function remove_menu_items() {
    remove_menu_page( 'edit.php?post_type=laundry' );
    remove_menu_page( 'edit.php?post_type=activity' );
    remove_menu_page( 'edit.php?post_type=ccomment' );
    // remove_menu_page( 'edit.php?post_type=news' );
    // remove_menu_page( 'edit.php?post_type=magazine' );
}
add_action( 'admin_menu', 'remove_menu_items' );

/* Change Permal link when post created */
function slug_save_post_callback( $post_ID, $post, $update ) {
    // allow 'publish', 'draft', 'future'
    if ($post->post_type != 'news' || $post->post_type != 'magazine' || $post->post_status == 'auto-draft')
    if ($post->post_status == 'auto-draft') return;
    if ($post->post_type != 'news' && $post->post_type != 'magazine') return;
    // only change slug when the post is created (both dates are equal)
    if ($post->post_date_gmt != $post->post_modified_gmt)
        return;

    // use title, since $post->post_name might have unique numbers added
    $new_slug = $post_ID;
    if ($new_slug == $post->post_name)
        return; // already set

    // unhook this function to prevent infinite looping
    remove_action( 'save_post', 'slug_save_post_callback', 10, 3 );
    // update the post slug (WP handles unique post slug)
    wp_update_post( array(
        'ID' => $post_ID,
        'post_name' => $new_slug
    ));
    // re-hook this function
    add_action( 'save_post', 'slug_save_post_callback', 10, 3 );
}
add_action( 'save_post', 'slug_save_post_callback', 10, 3 );

/*Check if user activated */
function is_user_activated() {
    if(!is_user_logged_in()) {
        return false;
    }
    global $current_user, $wp_roles;
    $user_id = $current_user->ID;
    $account_activated = get_user_meta($user_id, 'account_activated', true);
    if($account_activated == 1){
        return true;
    } 
    return false;
}
function get_user_full_name( $user_id = null ) {
    if(!is_user_activated()) return '';
	$user_info = $user_id ? new WP_User( $user_id ) : wp_get_current_user();
   
	if ( $user_info->first_name ) {
   
		if ( $user_info->last_name ) {
			return $user_info->first_name . ' ' . $user_info->last_name;
		}
   
		return $user_info->first_name;
	}
	return $user_info->display_name;
}

/* Echo value if > 0 only. */
function echo_num_or_empty($num) {
    if($num > 0) echo $num;
    else echo '';
}
function echo_gmenuval($val) {
    if($val) {
        echo "<span class='gsmenu-val'>".$val."</span>";
    }
}
function echo_photo_content ($photo_url) {
    if(!empty($photo_url)) {
        echo '<p style="max-width: 100%; text-align:center;"><img src='.$photo_url.'></p>';
    }
}

//Send htaml fomatted email
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

/*Search Dialogs */
require get_template_directory().'/search-dialog.php';
