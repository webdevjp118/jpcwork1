<?php
/**
 * COCOTOTO functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package COCOTOTO
 */
if ( is_user_logged_in() ) {
	// require_once(ABSPATH . 'wp-admin/includes/media.php');
	wp_enqueue_media();
}
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cocototo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cocototo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on COCOTOTO, use a find and replace
		 * to change 'cocototo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cocototo', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'cocototo' ),
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
				'cocototo_custom_background_args',
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
add_action( 'after_setup_theme', 'cocototo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cocototo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cocototo_content_width', 640 );
}
add_action( 'after_setup_theme', 'cocototo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cocototo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cocototo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cocototo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cocototo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cocototo_scripts() {
	/*
	wp_enqueue_style( 'cocototo-style', get_stylesheet_uri(), array(), _S_VERSION );
	*/
	wp_style_add_data( 'cocototo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'cocototo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cocototo_scripts' );

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


/*****************************************Custom Code*******************************/
/* Like Any Ajax */
function kaction_table_create() {
	global $wpdb;
	$table_name = $wpdb->prefix. "kaction_table";
	global $charset_collate;
	$charset_collate = $wpdb->get_charset_collate();
	global $db_version;
	
	if( $wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") != $table_name)
	{ $create_sql = "CREATE TABLE " . $table_name . " (
		id INT(11) NOT NULL auto_increment,
		postid INT(11) NOT NULL ,
		ktype VARCHAR(20) NOT NULL ,
		clientip VARCHAR(40) NOT NULL ,
		
		PRIMARY KEY (id))$charset_collate;";
		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		dbDelta( $create_sql );
	}
	
	//register the new table with the wpdb object
	if (!isset($wpdb->kaction_table))
	{
		$wpdb->kaction_table = $table_name;
		//add the shortcut so you can use $wpdb->stats
		$wpdb->tables[] = str_replace($wpdb->prefix, '', $table_name);
	}
	
}
add_action( 'init', 'kaction_table_create');
	
// Add the JS
function kaction_script() {
	wp_enqueue_script( 'kaction-script', get_template_directory_uri() . '/js/kaction.js', array('jquery'), '1.0.0', true );
	wp_localize_script( 'kaction-script', 'kaction', array(
		// URL to wp-admin/admin-ajax.php to process the request
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		// generate a nonce with a unique ID "myajax-post-comment-nonce"
		// so that you can check it later when an AJAX request is sent
		'security' => wp_create_nonce( 'kaction-string' )
	));
}
add_action( 'wp_enqueue_scripts', 'kaction_script' );
// The function that handles the AJAX request
function kaction_callback() {
	check_ajax_referer( 'kaction-string', 'security' );
	$postid = intval( $_POST['postid'] );
	$ktype = $_POST['ktype'];
	$clientip=get_client_ip();
	$like=0;
	$dislike=0;
	$like_count=0;
	//check if post id and ip present
	global $wpdb;
	$row = $wpdb->get_results( "SELECT id FROM $wpdb->kaction_table WHERE postid = '$postid' AND ktype = '$ktype' AND clientip = '$clientip'");
	if(empty($row)){
		//insert row
		$wpdb->insert( $wpdb->kaction_table, array( 'postid' => $postid, 'ktype' => $ktype, 'clientip' => $clientip ), array( '%d', '%s', '%s' ) );
		//echo $wpdb->insert_id;
		$like=1;
	}
	if(!empty($row)){
		//delete row
		$wpdb->delete( $wpdb->kaction_table, array( 'postid' => $postid, 'ktype' => $ktype, 'clientip'=> $clientip ), array( '%d','%s','%s' ) );
		$dislike=1;
	}
	
	//calculate like count from db.
	$totalrow = $wpdb->get_results( "SELECT id FROM $wpdb->kaction_table WHERE postid = '$postid' AND ktype = '$ktype'");
	$total_like=$wpdb->num_rows;
	update_post_meta($postid, 'kenv_'.$ktype, $total_like);
	$pointrow = $wpdb->get_results( "SELECT id FROM $wpdb->kaction_table WHERE postid = '$postid'");
	$total_points=$wpdb->num_rows;
	update_post_meta($postid, 'kenv_point', $total_points);
	$data=array( 'postid'=>$postid,'likecount'=>$total_like, 'points'=>$total_points, 'clientip'=>$clientip, 'ktype'=>$ktype, 'like'=>$like,'dislike'=>$dislike);
	echo json_encode($data);
	//echo $clientip;
	die(); // this is required to return a proper result
}
add_action( 'wp_ajax_kaction', 'kaction_callback' );
add_action( 'wp_ajax_nopriv_kaction', 'kaction_callback' );

function custom_admin_enqueue($hook) {
    // Only add to the edit.php admin page.
    // See WP docs.
    // if ('edit.php' !== $hook) {
    //     return;
    // }
    wp_enqueue_script('custom_admin_script', get_template_directory_uri().'/js/adminscript.js');
}

add_action('admin_enqueue_scripts', 'custom_admin_enqueue');

add_action('init', 'register_post_type_contributor');
function register_post_type_contributor() {
  register_post_type(
    'contributor'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => '投稿者'            //ダッシュボードに表示される名前
                    , 'add_new_item' => '投稿者を新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => '投稿者の編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
      , 'supports'     => array(	                              // カスタム投稿ページに表示される項目
                             'custom-fields'                  // カスタムフィールド
                          )
      , 'menu_position' => 5                                  // ダッシュボードで投稿の下に表示
      , 'rewrite'       => array('with_front' => false)       // パーマリンクの編集（productの前の階層URLを消して表示）
      )
  );
}

add_action('init', 'register_post_type_kenkattu');
function register_post_type_kenkattu() {
  register_post_type(
    'kenkattu'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'ケンカツ投稿'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'ケンカツ投稿を新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'ケンカツ投稿の編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
      , 'supports'     => array(   
							'title',                           // カスタム投稿ページに表示される項目
//							'editor',
                             'custom-fields'                  // カスタムフィールド
                          )
      , 'menu_position' => 5                                  // ダッシュボードで投稿の下に表示
      , 'rewrite'       => array('with_front' => false)       // パーマリンクの編集（productの前の階層URLを消して表示）
      )
  );
}

add_action('save_post', 'save_custom_postdata');

// 保存メソッド
function doSave($post_id, $data_name){
	$data = '';
	if(isset($_POST[$data_name])){
		$data = $_POST[$data_name]; 
	}else{
	  $data = '';
	}
	if( $data != get_post_meta($post_id, $data_name, true)){
	  update_post_meta($post_id, $data_name,$data);
	}elseif($data == ""){
	  delete_post_meta($post_id, $data_name,get_post_meta($post_id,$data_name,true));
	}
	
	if( $data_name == "user_id") {
		$nickname = get_post_meta($data, 'nickname', true);
		update_post_meta($post_id, 'nickname', $nickname);
	}
}
function idSlugSave($post_id){
	remove_action( 'save_post', 'save_custom_postdata' );
	wp_update_post([
		"post_name" => $post_id,
		"ID" => $post_id,
	]);
	add_action( 'save_post', 'save_custom_postdata' );
}
function save_custom_postdata($post_id){
	global $post;
	if(isset($_POST['ken_comment_custom_editor'])){
        update_post_meta($post_id, 'ken_comment', $_POST['ken_comment_custom_editor']);
    }
	if(isset($_POST['content_health_custom_editor'])){
        update_post_meta($post_id, 'content_health', $_POST['content_health_custom_editor']);
    }
	if(isset($_POST['content_env_custom_editor'])){
        update_post_meta($post_id, 'content_env', $_POST['content_env_custom_editor']);
    }

	$post_type = get_post_type($post_id);
	if($post_type == 'contributor') {
		//contributor
		doSave($post_id, 'nickname');
		doSave($post_id, 'profile_pic');
		for($i = 1; $i <= 2; $i++){
			doSave($post_id, 'kenkattu_act_img'.$i);
		}
		doSave($post_id, 'level_type');
		doSave($post_id, 'level');
		doSave($post_id, 'ken_years');
		doSave($post_id, 'gender');
		doSave($post_id, 'ten_age');
		doSave($post_id, 'job');
		doSave($post_id, 'address');
		doSave($post_id, 'bio');
	}

	if($post_type == 'kenkattu') {
		//kenkattu
		idSlugSave($post_id);
		doSave($post_id, 'user_id');
		doSave($post_id, 'category');
		doSave($post_id, 'ken_item');
		// doSave($post_id, 'content_env');
		// doSave($post_id, 'ken_comment');
		doSave($post_id, 'ken_photo');
		doSave($post_id, 'ken_url');
		doSave($post_id, 'buy_url');
		doSave($post_id, 'duration');
		doSave($post_id, 'star_cost');
		doSave($post_id, 'star_easy');
		doSave($post_id, 'star_health');
		doSave($post_id, 'star_env');
	}
}
function custom_kenkattu_info_area(){
	//これがないと入力欄が更新されない！
	global $post;
	$current_post_id = $post->ID;
	$user_key = array(
		'post_type' => 'contributor',
		// 'author' => $user_id,
		'posts_per_page' => -1,
		'fields' => 'ids',
	);
	$sel_list = [];
	$uid_list = [];
	$user_query = new WP_Query($user_key);
	if($user_query->have_posts()) : 
		while ($user_query->have_posts()) : 
			$user_query->the_post(); 
			$loop_id = get_the_id();
			$loop_name = get_post_meta($loop_id,'nickname',true);
			array_push($sel_list, $loop_name);
			array_push($uid_list, $loop_id);
		endwhile;
	endif;		
	wp_reset_query();
	$post = get_post($current_post_id);
	echo '投稿者　：<select name="user_id">';
	$post_selvalue = get_post_meta($post->ID, 'user_id', true);
	for($i=0;$i<count($sel_list);$i++) {
		if($uid_list[$i] == $post_selvalue) echo '<option value="'.$uid_list[$i].'" selected>'.$sel_list[$i].'</option>';
		else echo '<option value="'.$uid_list[$i].'">'.$sel_list[$i].'</option>';
	}
	echo '</select><br>';
	echo 'カテゴリ　：<select name="category">';
	$post_selvalue = get_post_meta($post->ID, 'category', true);
	$sel_list = get_kenkattu_category();
	foreach($sel_list as $sel_item) {
		if($sel_item == $post_selvalue) echo '<option value="'.$sel_item.'" selected>'.$sel_item.'</option>';
		else echo '<option value="'.$sel_item.'">'.$sel_item.'</option>';
	}
	echo '</select><br>';
	echo 'ケンカツアイテム　：<input type="text" name="ken_item" value="'.get_post_meta($post->ID,'ken_item',true).'"><br>';
	echo 'ケンカツ実践期間　：<input type="text" name="duration" value="'.get_post_meta($post->ID,'duration',true).'"><br>';
	echo '記事掲載画像　：<input type="text" class="admin-input-media" data-id="ken_photo"  name="ken_photo" value="'.get_post_meta($post->ID,'ken_photo',true).'"><button type="button" class="admin-upbutton" data-id="ken_photo">選択</button><br>';
	// echo 'ケンカツ内容（健康）　：<textarea cols="70" rows="5" name="content_health">'.get_post_meta($post->ID,'content_health',true).'</textarea><br>';
	//echo 'ケンカツ内容（環境）　：<textarea cols="70" rows="5" name="content_env">'.get_post_meta($post->ID,'content_env',true).'</textarea><br>';
	//echo 'ケンカツコメント　：<textarea cols="70" rows="5" name="ken_comment">'.get_post_meta($post->ID,'ken_comment',true).'</textarea><br>';
	echo '参考記事　：<input type="text" name="ken_url" value="'.get_post_meta($post->ID,'ken_url',true).'"><br>';
	echo 'ケンカツアイテム購⼊　：<input type="text" name="buy_url" value="'.get_post_meta($post->ID,'buy_url',true).'"><br>';
	
	$kenv_point = get_post_meta($post->ID,'kenv_point',true);
	if(empty($kenv_point)) $kenv_point = 0;
	update_post_meta($post->ID, 'kenv_point', $kenv_point);

	echo '費用　：<select name="star_cost">';
	$post_selvalue = get_post_meta($post->ID, 'star_cost', true);
	$sel_list = array("1","2","3","4","5");
	foreach($sel_list as $sel_item) {
		if($sel_item == $post_selvalue) echo '<option value="'.$sel_item.'" selected>'.$sel_item.'</option>';
		else echo '<option value="'.$sel_item.'">'.$sel_item.'</option>';
	}
	echo '</select><br>';
	echo '活動しやすさ　：<select name="star_easy">';
	$post_selvalue = get_post_meta($post->ID, 'star_easy', true);
	$sel_list = array("1","2","3","4","5");
	foreach($sel_list as $sel_item) {
		if($sel_item == $post_selvalue) echo '<option value="'.$sel_item.'" selected>'.$sel_item.'</option>';
		else echo '<option value="'.$sel_item.'">'.$sel_item.'</option>';
	}
	echo '</select><br>';
	echo '健康　：<select name="star_health">';
	$post_selvalue = get_post_meta($post->ID, 'star_health', true);
	$sel_list = array("1","2","3","4","5");
	foreach($sel_list as $sel_item) {
		if($sel_item == $post_selvalue) echo '<option value="'.$sel_item.'" selected>'.$sel_item.'</option>';
		else echo '<option value="'.$sel_item.'">'.$sel_item.'</option>';
	}
	echo '</select><br>';
	echo '環境　：<select name="star_env">';
	$post_selvalue = get_post_meta($post->ID, 'star_env', true);
	$sel_list = array("1","2","3","4","5");
	foreach($sel_list as $sel_item) {
		if($sel_item == $post_selvalue) echo '<option value="'.$sel_item.'" selected>'.$sel_item.'</option>';
		else echo '<option value="'.$sel_item.'">'.$sel_item.'</option>';
	}
	echo '</select><br>';

}
function custom_contributor_info_area(){
	//これがないと入力欄が更新されない！
	global $post;
	
	echo 'ハンドルネーム　：<input type="text" name="nickname" value="'.get_post_meta($post->ID,'nickname',true).'"><br>';
	echo 'プロフィール画像　：<input type="text" class="admin-input-media" data-id="profile_pic"  name="profile_pic" value="'.get_post_meta($post->ID,'profile_pic',true).'"><button type="button" class="admin-upbutton" data-id="profile_pic">選択</button><br>';
	for($i = 1; $i <= 2; $i++){
		echo 'ケンカツ活動画像'.$i.'　　：<input type="text" class="admin-input-media" data-id="kenkattu_act_img'.$i.'" name="kenkattu_act_img'.$i.'" value="'.get_post_meta($post->ID,'kenkattu_act_img'.$i,true).'"><button type="button" class="admin-upbutton" data-id="kenkattu_act_img'.$i.'">選択</button><br>';
	}
	echo '投稿記事の種類　：<select name="level_type">';
	$post_selvalue = get_post_meta($post->ID, 'level', true);
	$sel_list = array("ケンカツ記事の投稿","ケンカツアイテム（商品）の掲載と記事の投稿");
	foreach($sel_list as $sel_item) {
		if($sel_item == $post_selvalue) echo '<option value="'.$sel_item.'" selected>'.$sel_item.'</option>';
		else echo '<option value="'.$sel_item.'">'.$sel_item.'</option>';
	}
	echo '</select><br>';
	echo '投稿者の属性　：<select name="level">';
	$post_selvalue = get_post_meta($post->ID, 'level', true);
	$sel_list = array("⼀般","専門家");
	foreach($sel_list as $sel_item) {
		if($sel_item == $post_selvalue) echo '<option value="'.$sel_item.'" selected>'.$sel_item.'</option>';
		else echo '<option value="'.$sel_item.'">'.$sel_item.'</option>';
	}
	echo '</select><br>';
	echo '所属　：<input type="text" name="job" value="'.get_post_meta($post->ID,'job',true).'"><br>';
	echo 'ケンカツ歴　：<input type="text" name="ken_years" value="'.get_post_meta($post->ID,'ken_years',true).'"><br>';
	echo '性別　：<select name="gender">';
	$post_selvalue = get_post_meta($post->ID, 'gender', true);
	$sel_list = array("男性","女性","その他");
	foreach($sel_list as $sel_item) {
		if($sel_item == $post_selvalue) echo '<option value="'.$sel_item.'" selected>'.$sel_item.'</option>';
		else echo '<option value="'.$sel_item.'">'.$sel_item.'</option>';
	}
	echo '</select><br>';
	echo '年代　：<select name="ten_age">';
	$post_selvalue = get_post_meta($post->ID, 'ten_age', true);
	$sel_list = array("未成年","20代","30代","40代","50代","60代");
	foreach($sel_list as $sel_item) {
		if($sel_item == $post_selvalue) echo '<option value="'.$sel_item.'" selected>'.$sel_item.'</option>';
		else echo '<option value="'.$sel_item.'">'.$sel_item.'</option>';
	}
	echo '</select><br>';
	echo '住居　：<input type="text" name="address" value="'.get_post_meta($post->ID,'address',true).'"><br>';
	echo '略歴　：<textarea cols="70" rows="5" name="bio">'.get_post_meta($post->ID,'bio',true).'</textarea><br>';
}
function add_custom_inputbox() {
	add_meta_box( 'contributor_id','投稿者情報', 'custom_contributor_info_area', 'contributor', 'normal' );
	add_meta_box( 'kenkattu_id','投稿情報', 'custom_kenkattu_info_area', 'kenkattu', 'normal' );
}
add_action('admin_menu', 'add_custom_inputbox');

function manage_contributor_columns ($columns) {
	unset($columns['title']);
	unset($columns['date']);
	$columns['nickname']  = 'ハンドルネーム';
	$columns['profile_pic']  = 'プロフィール画像';
	$columns['ken_years']   = 'ケンカツ歴';
	$columns['gender'] = '性別';
	$columns['ten_age'] = '年代';
	$columns['address'] = '住居';
	
	return $columns;
}
function manage_kenkattu_columns ($columns) {
	unset($columns['date']);
	$columns['nickname']  = '投稿者ネーム';
	$columns['ken_photo']  = '記事掲載画像';
	$columns['category']   = 'カテゴリ';
	$columns['ken_item'] = 'ケンカツアイテム';
	$columns['content_health'] = 'ケンカツ内容（健康）';
	$columns['content_env'] = 'ケンカツ内容（環境）';
	
	return $columns;
}
function add_kenkattu_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'nickname':
			$name = get_post_meta($post_id,'nickname',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'ken_photo':
			// 画像1だけ表示
			$image = get_post_meta($post_id,'ken_photo',true);
			if (isset($image) && $image) {
		?>
				<div>
					<img class="img-responsive" alt="" src="<?php echo $image; ?>" width="80px" height="auto">
				</div>
		<?php
			} else {
				echo __('None');
			}
			break;
		case 'category':
			$name = get_post_meta($post_id,'category',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'ken_item':
			$name = get_post_meta($post_id,'ken_item',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'content_health':
			$name = get_post_meta($post_id,'content_health',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'content_env':
			$name = get_post_meta($post_id,'content_env',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		default:
	}
}
function add_contributor_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'nickname':
			$name = get_post_meta($post_id,'nickname',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'profile_pic':
			// 画像1だけ表示
			$image = get_post_meta($post_id,'profile_pic',true);
			if (isset($image) && $image) {
		?>
				<div>
					<img class="img-responsive" alt="" src="<?php echo $image; ?>" width="80px" height="auto">
				</div>
		<?php
			} else {
				echo __('None');
			}
			break;
		case 'ken_years':
			$name = get_post_meta($post_id,'ken_years',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'gender':
			$name = get_post_meta($post_id,'gender',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'ten_age':
			$name = get_post_meta($post_id,'ten_age',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'address':
			$name = get_post_meta($post_id,'address',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		default:
	}
}
add_filter('manage_edit-contributor_columns', 'manage_contributor_columns');
add_action('manage_contributor_posts_custom_column', 'add_contributor_column', 10, 2);

add_filter('manage_edit-kenkattu_columns', 'manage_kenkattu_columns');
add_action('manage_kenkattu_posts_custom_column', 'add_kenkattu_column', 10, 2);


// ケンカツ category
function get_kenkattu_category() {
	return array(
		'コウノトリ',
		'ツシマヤマネコ',
		'ラッコ',
		'アオウミガメ',
		'ツキノワグマ',
	);
}
function get_kenkattu_category_desc($category) {
	if($category == 'コウノトリ') return '飲み物';
	if($category == 'ツシマヤマネコ') return '食べ物';
	if($category == 'ラッコ') return '日用品';
	if($category == 'アオウミガメ') return '衣類';
	if($category == 'ツキノワグマ') return '行動習慣';
	return 'stork';
}
function in_kenkattu_category($category) {
	if($category == 'コウノトリ') return true;
	if($category == 'ツシマヤマネコ') return true;
	if($category == 'ラッコ') return true;
	if($category == 'アオウミガメ') return true;
	if($category == 'ツキノワグマ') return true;
	return false;
}
function get_kenkattu_category_eng($category) {
	if($category == 'コウノトリ') return 'stork';
	if($category == 'ツシマヤマネコ') return 'leopard';
	if($category == 'ラッコ') return 'otter';
	if($category == 'アオウミガメ') return 'turtle';
	if($category == 'ツキノワグマ') return 'bear';
	return 'stork';
}
function get_animal_photo1($category) {
    if($category == 'コウノトリ') return get_stylesheet_directory_uri().'/images/animal_stork.svg';
	if($category == 'ツシマヤマネコ') return get_stylesheet_directory_uri().'/images/animal_leopard.svg';
	if($category == 'ラッコ') return get_stylesheet_directory_uri().'/images/animal_otter.svg';
	if($category == 'アオウミガメ') return get_stylesheet_directory_uri().'/images/animal_turtle.svg';
	if($category == 'ツキノワグマ') return get_stylesheet_directory_uri().'/images/animal_bear.svg';
	return get_stylesheet_directory_uri().'/images/animal_stork.svg';
}
function get_animal_photo2($category) {
    if($category == 'コウノトリ') return get_stylesheet_directory_uri().'/images/animal_stork_circle.svg';
	if($category == 'ツシマヤマネコ') return get_stylesheet_directory_uri().'/images/animal_leopard_circle.svg';
	if($category == 'ラッコ') return get_stylesheet_directory_uri().'/images/animal_otter_circle.svg';
	if($category == 'アオウミガメ') return get_stylesheet_directory_uri().'/images/animal_turtle_circle.svg';
	if($category == 'ツキノワグマ') return get_stylesheet_directory_uri().'/images/animal_bear_circle.svg';
	return get_stylesheet_directory_uri().'/images/animal_stork.svg';
}
function echo_stars($star_count) {
    for($i=1;$i<=5;$i++) {
        if($i <= $star_count) {
            echo '<li><span><i class="fa fa-star" aria-hidden="true"></i></span></li>';
        }
        else {
            echo '<li><span><i class="fa fa-star-o" aria-hidden="true"></i></span></li>';
        }
    }
}

// function get_client_ip() {
// 	$ip=$_SERVER['REMOTE_ADDR']; 
// 	return $ip;
// }
function get_client_ip() {
	$ipaddress = '';
	if ($_SERVER['HTTP_CLIENT_IP'])
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if($_SERVER['HTTP_X_FORWARDED_FOR'])
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if($_SERVER['HTTP_X_FORWARDED'])
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if($_SERVER['HTTP_FORWARDED_FOR'])
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if($_SERVER['HTTP_FORWARDED'])
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if($_SERVER['REMOTE_ADDR'])
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';
	
	return $ipaddress;
}

function get_company_email() {
	return 'info@cocototo.co.jp';
	// return 'prgfinal216@gmail.com';
}


function add_custom_editor_metabox(){
 
    add_meta_box(
                    'ken_comment_editor',
                    'ケンカツコメント',
                    'ken_comment_html_code_editor',
                    'kenkattu'
    );
	add_meta_box(
				'content_health_editor',
				'ケンカツ内容（健康）',
				'content_health_html_code_editor',
				'kenkattu'
	);
	add_meta_box(
			'content_env_editor',
			'ケンカツ内容（環境）',
			'content_env_html_code_editor',
			'kenkattu'
	);
}
add_action('add_meta_boxes', 'add_custom_editor_metabox');

// Callback function for our custom metabox
function ken_comment_html_code_editor(){
    // function that will add the wp editor in the metabox.
    // wp_editor( $content, 'diwp_custom_editor', array() );
	global $post;
	$ken_comment_custom_editor = get_post_meta($post->ID, 'ken_comment', true); 
	// var_dump(get_post_meta($post->ID));exit;
	wp_editor( $ken_comment_custom_editor,  'ken_comment_custom_editor', array() );

}
// Callback function for our custom metabox
function content_health_html_code_editor(){
    // function that will add the wp editor in the metabox.
    // wp_editor( $content, 'diwp_custom_editor', array() );
	global $post;
	$content_health_custom_editor = get_post_meta($post->ID, 'content_health', true); 
	// var_dump(get_post_meta($post->ID));exit;
	wp_editor( $content_health_custom_editor,  'content_health_custom_editor', array() );
}
// Callback function for our custom metabox
function content_env_html_code_editor(){
    // function that will add the wp editor in the metabox.
    // wp_editor( $content, 'diwp_custom_editor', array() );
	global $post;
	$content_env_custom_editor = get_post_meta($post->ID, 'content_env', true); 
	// var_dump(get_post_meta($post->ID));exit;
	wp_editor( $content_env_custom_editor,  'content_env_custom_editor', array() );
}

function my_mce4_options($init) {
	$default_colours = '"000000", "Black",
						"993300", "Burnt orange",
						"333300", "Dark olive",
						"003300", "Dark green",
						"003366", "Dark azure",
						"000080", "Navy Blue",
						"333399", "Indigo",
						"333333", "Very dark gray",
						"800000", "Maroon",
						"FF6600", "Orange",
						"808000", "Olive",
						"008000", "Green",
						"008080", "Teal",
						"0000FF", "Blue",
						"666699", "Grayish blue",
						"808080", "Gray",
						"FF0000", "Red",
						"FF9900", "Amber",
						"99CC00", "Yellow green",
						"339966", "Sea green",
						"33CCCC", "Turquoise",
						"3366FF", "Royal blue",
						"800080", "Purple",
						"999999", "Medium gray",
						"FF00FF", "Magenta",
						"FFCC00", "Gold",
						"FFFF00", "Yellow",
						"00FF00", "Lime",
						"00FFFF", "Aqua",
						"00CCFF", "Sky blue",
						"993366", "Red violet",
						"FFFFFF", "White",
						"FF99CC", "Pink",
						"FFCC99", "Peach",
						"FFFF99", "Light yellow",
						"CCFFCC", "Pale green",
						"CCFFFF", "Pale cyan",
						"99CCFF", "Light sky blue",
						"CC99FF", "Plum"';
  
	$custom_colours =  '"E14D43", "Color 1 Name",
						"D83131", "Color 2 Name",
						"ED1C24", "Color 3 Name",
						"F99B1C", "Color 4 Name",
						"50B848", "Color 5 Name",
						"00A859", "Color 6 Name",
						"00AAE7", "Color 7 Name",
						"282828", "Color 8 Name"';
  
	// build colour grid default+custom colors
	$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';
  
	// enable 6th row for custom colours in grid
	$init['textcolor_rows'] = 6;
  
	return $init;
  }
  add_filter('tiny_mce_before_init', 'my_mce4_options');