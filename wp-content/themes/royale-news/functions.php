<?php
/**
 * Royale News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Royale_News
 */

if ( ! function_exists( 'royale_news_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function royale_news_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Royale News, use a find and replace
		 * to change 'royale-news' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'royale-news', get_template_directory() . '/languages' );

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

		// Theme Thumbnail Sizes
		add_image_size( 'royale-news-thumbnail-1', 200, 150, true );
		add_image_size( 'royale-news-thumbnail-2', 370, 241, true );
		add_image_size( 'royale-news-thumbnail-3', 761, 492, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'royale-news' ),
			'social' => esc_html__( 'Social', 'royale-news' ),
			'footer' => esc_html__( 'Footer', 'royale-news' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'royale_news_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 90,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'royale_news_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function royale_news_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'royale_news_content_width', 640 );
}
add_action( 'after_setup_theme', 'royale_news_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function royale_news_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'royale-news' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'royale-news' ),
		'before_widget' => '<div id="%1$s" class="col-md-12 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-info clearfix"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Featured Posts Widget Area', 'royale-news' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add Main Featured Posts or Slider Featured Posts widgets here.', 'royale-news' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'FrontPage Widget Area', 'royale-news' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add Main Highlight or Slider Highlight widgets here.', 'royale-news' ),
		'before_widget' => '<div class="row clearfix news-section %2$s"><div class="col-md-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'FrontPage Bottom Widget Area', 'royale-news' ),
		'id'            => 'sidebar-6',
		'description'   => esc_html__( 'Add Widgets Here.', 'royale-news' ),
		'before_widget' => '<div class="row clearfix news-section %2$s"><div class="col-md-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'royale-news' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add only four widgets here.', 'royale-news' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-info"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisement', 'royale-news' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add advertisement here.', 'royale-news' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
}
add_action( 'widgets_init', 'royale_news_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function royale_news_scripts() {
	wp_enqueue_style( 'royale-news-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/themebeez/assets/css/bootstrap.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/themebeez/assets/css/font-awesome.css' );

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/themebeez/assets/css/animate.css' );

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/themebeez/assets/css/owl.carousel.css' );

	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/themebeez/assets/css/meanmenu.css' );

	wp_enqueue_style( 'royale-news-font', royale_news_fonts_url(), array(), null );

	wp_enqueue_style( 'royale-news-main', get_template_directory_uri() . '/themebeez/assets/css/main.css' );

	wp_enqueue_style( 'royale-news-skin', get_template_directory_uri() . '/themebeez/assets/css/skin.css' );
	

	wp_enqueue_script( 'royale-news-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/themebeez/assets/js/bootstrap.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/themebeez/assets/js/owl.carousel.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'jquery-menumenu', get_template_directory_uri() . '/themebeez/assets/js/jquery.meanmenu.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/themebeez/assets/js/theia-sticky-sidebar.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'royale-news-main', get_template_directory_uri() . '/themebeez/assets/js/main.js', array('jquery'), '20151215', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'royale_news_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/themebeez/customizer/dynamic.php';

/**
 * Load Breadcrumbs.
 */
require get_template_directory() . '/themebeez/third-party/breadcrumbs.php';

/**
 * Load theme hooks.
 */
require get_template_directory() . '/themebeez/hooks.php';

/**
 * Load Default Options.
 */
require get_template_directory() . '/themebeez/defaults.php';

/**
 * Load Helper Functions.
 */
require get_template_directory() . '/themebeez/helpers.php';

/**
 * Load theme filters.
 */
require get_template_directory() . '/themebeez/filters.php';

/**
 * Load theme tags.
 */
require get_template_directory() . '/themebeez/theme-tags.php';

/**
 * Load Widgets.
 */
require get_template_directory() . '/themebeez/widgets/widget-init.php';


// custom post Movie Start

function movie_custom_post() {
	$labels = array(
	  'name'               => _x( 'Movies', 'post type general name' ),
	  'singular_name'      => _x( 'Movie', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'movie' ),
	  'add_new_item'       => __( 'Add New movie' ),
	  'edit_item'          => __( 'Edit movie' ),
	  'new_item'           => __( 'New movie' ),
	  'all_items'          => __( 'All movies' ),
	  'view_item'          => __( 'View movie' ),
	  'search_items'       => __( 'Search movies' ),
	  'not_found'          => __( 'No movies found' ),
	  'not_found_in_trash' => __( 'No movies found in the Trash' ), 
	  'parent_item_colon'  => '',
	  'menu_name'          => 'Movie'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds our products and product specific data',
	  'public'        => true,
	  'menu_position' => 5,
	  'supports'      => array( 'title', 'editor', 'thumbnail', 'comments' ),
	  'has_archive'   => true,
	);
	register_post_type( 'movie', $args ); 
  }
  add_action( 'init', 'movie_custom_post' );

// movies category texonomy start

function taxonomies_movie() {
	$labels = array(
	  'name'              => _x( 'Movie Categories', 'taxonomy general name' ),
	  'singular_name'     => _x( 'Movie Category', 'taxonomy singular name' ),
	  'search_items'      => __( 'Search Movie Categories' ),
	  'all_items'         => __( 'All Movie Categories' ),
	  'parent_item'       => __( 'Parent Movie Category' ),
	  'parent_item_colon' => __( 'Parent Movie Category:' ),
	  'edit_item'         => __( 'Edit Movie Category' ), 
	  'update_item'       => __( 'Update Movie Category' ),
	  'add_new_item'      => __( 'Add New Movie Category' ),
	  'new_item_name'     => __( 'New Movie Category' ),
	  'menu_name'         => __( 'Movie Categories' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	);
	register_taxonomy( 'movie_category', array('movie'), $args );
  }
  add_action( 'init', 'taxonomies_movie', 0 );

// movies category texonomy end



// movie metabox start

add_action( 'add_meta_boxes', 'product_price_box' );
function product_price_box() {

    add_meta_box( 
        'movie_info_metabox',
        __( 'Movie Info'),
        'movie_info_metabox_fun',
        'movie',
        'normal',
        'high'
    );
}

function movie_info_metabox_fun( $post ) {
	$movie_post_id = get_the_ID();
	wp_nonce_field( plugin_basename( __FILE__ ), 'movie_info_metabox_fun_nonce' );
	$mov_html = '<table style="width:100%">' 
			 		.'<tr>' 
			 			.'<td>' 
			 				.'<label style="width:100%" for="mov_release_year">Release year</label>'
			 				.'<input style="width:100%" type="text" id="mov_release_year"  value="'. get_post_meta( $movie_post_id, 'mov_release_year', true ) .'" name="mov_release_year" placeholder="e.g YYYY" />'
			 			.'</td>' 
			 			.'<td>' 
			 				.'<label style="width:100%" for="mov_duration">Duration</label>'
			 				.'<input style="width:100%" type="text" id="mov_duration"  value="'. get_post_meta( $movie_post_id, 'mov_duration', true ) .'" name="mov_duration" placeholder="e.g 2hr 4min 3sec" />'
			 			.'</td>' 
					.'</tr>'
					.'<tr>'
			 			.'<td>' 
			 				.'<label style="width:100%" for="mov_cast">Cast</label>'
			 				.'<input style="width:100%" type="text" id="mov_cast"  value="'. get_post_meta( $movie_post_id, 'mov_cast', true ) .'" name="mov_cast" placeholder="e.g Aamir Khan, Tom Cruise" />'
			 			.'</td>' 
			 			.'<td>' 
			 				.'<label style="width:100%" for="mov_country">Country</label>'
			 				.'<input style="width:100%" type="text" id="mov_country"  value="'. get_post_meta( $movie_post_id, 'mov_country', true ) .'" name="mov_country" placeholder="e.g India, US, UK" />'
						 .'</td>'
					.'</tr>'
					.'<tr>'
						 .'<td colspan="2">' 
							 .'<label style="width:100%" for="mov_embedded_code" style="width:100%" >Enter embedded code</label>'
							 .'<textarea style="width:100%" id="mov_embedded_code" name="mov_embedded_code" placeholder="paste embedded code here"></textarea>' 
			 			.'</td>' 
					 .'</tr>'
				.'</table>'; 

	
	echo $mov_html;
  }

  add_action( 'save_post', 'movie_info_save_fun' );
function movie_info_save_fun( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['movie_info_metabox_fun_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }

  $mov_release_year = $_POST['mov_release_year'];
  update_post_meta( $post_id, 'mov_release_year', $mov_release_year );
  
  $mov_duration = $_POST['mov_duration'];
  update_post_meta( $post_id, 'mov_duration', $mov_duration );
  
  $mov_cast = $_POST['mov_cast'];
  update_post_meta( $post_id, 'mov_cast', $mov_cast );
 
  $mov_country = $_POST['mov_country'];
  update_post_meta( $post_id, 'mov_country', $mov_country );
  }

// movie metabox end
// custom post Movie End


//....... custom post Video Songs Start (Second Custom Post Position 2) .....//

function videosong_custom_post() {
	$labels = array(
	  'name'               => _x( 'video songs', 'post type general name' ),
	  'singular_name'      => _x( 'Video Songs', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'videosong' ),
	  'add_new_item'       => __( 'Add New videosong' ),
	  'edit_item'          => __( 'Edit videosong' ),
	  'new_item'           => __( 'New videosong' ),
	  'all_items'          => __( 'All Video Songs' ),
	  'view_item'          => __( 'View videosong' ),
	  'search_items'       => __( 'Search videosong' ),
	  'not_found'          => __( 'No videos songs found' ),
	  'not_found_in_trash' => __( 'No videos songs found in the Trash' ), 
	  'parent_item_colon'  => '',
	  'menu_name'          => 'Video Songs'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds our products and product specific data',
	  'public'        => true,
	  'menu_position' => 5,
	  'supports'      => array( 'title', 'editor', 'thumbnail', 'comments' ),
	  'has_archive'   => true,
	);
	register_post_type( 'videosong', $args ); 
  }
  add_action( 'init', 'videosong_custom_post' );

// Video Songs category texonomy start

function taxonomies_videosong() {
	$labels = array(
	  'name'              => _x( 'Video Song Categories', 'taxonomy general name' ),
	  'singular_name'     => _x( 'Video Song Category', 'taxonomy singular name' ),
	  'search_items'      => __( 'Search Video Song Categories' ),
	  'all_items'         => __( 'All Video Song Categories' ),
	  'parent_item'       => __( 'Parent Video Song Category' ),
	  'parent_item_colon' => __( 'Parent Video Song Category:' ),
	  'edit_item'         => __( 'Edit Video Song Category' ), 
	  'update_item'       => __( 'Update Video Song Category' ),
	  'add_new_item'      => __( 'Add New Video Song Category' ),
	  'new_item_name'     => __( 'New Video Song Category' ),
	  'menu_name'         => __( 'Video Song Categories' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	);
	register_taxonomy( 'videosong_category', array('videosong'), $args );
  }
  add_action( 'init', 'taxonomies_videosong', 0 );

// Video Song category texonomy end

// Video Song metabox start

add_action( 'add_meta_boxes', 'product_box' );
function product_box() {

    add_meta_box(                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
        'videosong_info_metabox',
        __( 'Video Songs Info'),
        'videosong_info_metabox_fun',
        'videosong',
        'normal',
        'high'
    );
}

function videosong_info_metabox_fun( $post ) {
	$vidsong_post_id = get_the_ID();
	wp_nonce_field( plugin_basename( __FILE__ ), 'videosong_info_metabox_fun_nonce' );
	$vidsong_html = '<table style="width:100%">' 
			 		.'<tr>' 
			 			.'<td>' 
			 				.'<label style="width:100%" for="vidsong_release_year">Release year</label>'
			 				.'<input style="width:100%" type="text" id="vidsong_release_year"  value="'. get_post_meta( $vidsong_post_id, 'vidsong_release_year', true ) .'" name="vidsong_release_year" placeholder="e.g YYYY" />'
			 			.'</td>' 
			 			.'<td>' 
			 				.'<label style="width:100%" for="vidsong_duration">Duration</label>'
			 				.'<input style="width:100%" type="text" id="vidsong_duration"  value="'. get_post_meta( $vidsong_post_id, 'vidsong_duration', true ) .'" name="vidsong_duration" placeholder="e.g 2min 30sec" />'
			 			.'</td>' 
					.'</tr>'
					.'<tr>'
			 			.'<td>' 
			 				.'<label style="width:100%" for="vidsong_artist">Artist</label>'
			 				.'<input style="width:100%" type="text" id="vidsong_artist"  value="'. get_post_meta( $vidsong_post_id, 'vidsong_artist', true ) .'" name="vidsong_artist" placeholder="e.g Taylor Swift,Enrique Iglesias, A.R. Rahman " />'
			 			.'</td>' 
			 			.'<td>' 
			 				.'<label style="width:100%" for="vidsong_country">Country</label>'
			 				.'<input style="width:100%" type="text" id="vidsong_country"  value="'. get_post_meta( $vidsong_post_id, 'vidsong_country', true ) .'" name="vidsong_country" placeholder="e.g India, US, UK" />'
						 .'</td>'
					.'</tr>'
					.'<tr>'
			 			.'<td>' 
			 				.'<label style="width:100%" for="vidsong_album">Album</label>'
			 				.'<input style="width:100%" type="text" id="vidsong_album"  value="'. get_post_meta( $vidsong_post_id, 'vidsong_album', true ) .'" name="vidsong_album" placeholder="e.g 2 states, T-Series, Migos" />'
			 			.'</td>' 
			 		.'<tr>'
						 .'<td colspan="2">' 
							 .'<label style="width:100%" for="vidsong_embedded_code" style="width:100%" >Enter embedded code</label>'
							 .'<textarea style="width:100%" id="vidsong_embedded_code" name="vidsong_embedded_code" placeholder="paste embedded code here"></textarea>' 
			 			.'</td>' 
					 .'</tr>'
				.'</table>'; 

	
	echo $vidsong_html;
  }

  add_action( 'save_post', 'videosong_info_save_fun' );
function videosong_info_save_fun( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['videosong_info_metabox_fun_nonce'], plugin_basename( __FILE__ ) ) )
  retursongn;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }

  $vidsong_release_year = $_POST['vidsong_release_year'];
  update_post_meta( $post_id, 'vidsong_release_year', $vidsong_release_year );
  
  $vidsong_duration = $_POST['vidsong_duration'];
  update_post_meta( $post_id, 'vidsong_duration', $vidsong_duration );
  
  $vidsong_artist = $_POST['vidsong_artist'];
  update_post_meta( $post_id, 'vidsong_artist', $vidsong_artist );
 
  $vidsong_country = $_POST['vidsong_country'];
  update_post_meta( $post_id, 'vidsong_country', $vidsong_country );

  $vidsong_album = $_POST['vidsong_album'];
  update_post_meta( $post_id, 'vidsong_album', $vidsong_album );
  
}

// vidsong metabox end

// custom post video Song End

// language category texonomy start


//....... custom post Video Start (Third Custom Post Position 3) .....//

function video_custom_post() {
	$labels = array(
	  'name'               => _x( 'video', 'post type general name' ),
	  'singular_name'      => _x( 'Video', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'video' ),
	  'add_new_item'       => __( 'Add New video' ),
	  'edit_item'          => __( 'Edit video' ),
	  'new_item'           => __( 'New video' ),
	  'all_items'          => __( 'All Video' ),
	  'view_item'          => __( 'View video' ),
	  'search_items'       => __( 'Search video' ),
	  'not_found'          => __( 'No videos songs found' ),
	  'not_found_in_trash' => __( 'No videos songs found in the Trash' ), 
	  'parent_item_colon'  => '',
	  'menu_name'          => 'Video'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds our products and product specific data',
	  'public'        => true,
	  'menu_position' => 5,
	  'supports'      => array( 'title', 'editor', 'thumbnail', 'comments' ),
	  'has_archive'   => true,
	);
	register_post_type( 'video', $args ); 
  }
  add_action( 'init', 'video_custom_post' );

// Video category texonomy start

function taxonomies_video() {
	$labels = array(
	  'name'              => _x( 'Video Categories', 'taxonomy general name' ),
	  'singular_name'     => _x( 'Video Category', 'taxonomy singular name' ),
	  'search_items'      => __( 'Search Video Categories' ),
	  'all_items'         => __( 'All Video Categories' ),
	  'parent_item'       => __( 'Parent Video Category' ),
	  'parent_item_colon' => __( 'Parent Video Category:' ),
	  'edit_item'         => __( 'Edit Video Category' ), 
	  'update_item'       => __( 'Update Video Category' ),
	  'add_new_item'      => __( 'Add New Video Category' ),
	  'new_item_name'     => __( 'New Video Category' ),
	  'menu_name'         => __( 'Video Categories' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	);
	register_taxonomy( 'video_category', array('video'), $args );
  }
  add_action( 'init', 'taxonomies_video', 0 );

// Video category texonomy end


function taxonomies_language() {
	$labels = array(
	  'name'              => _x( 'language Categories', 'taxonomy general name' ),
	  'singular_name'     => _x( 'language Category', 'taxonomy singular name' ),
	  'search_items'      => __( 'Search language Categories' ),
	  'all_items'         => __( 'All language Categories' ),
	  'parent_item'       => __( 'Parent language Category' ),
	  'parent_item_colon' => __( 'Parent language Category:' ),
	  'edit_item'         => __( 'Edit language Category' ), 
	  'update_item'       => __( 'Update language Category' ),
	  'add_new_item'      => __( 'Add New language Category' ),
	  'new_item_name'     => __( 'New language Category' ),
	  'menu_name'         => __( 'language Categories' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	);
	register_taxonomy( 'language_category', array('movie','videosong', 'video', 'post'), $args );
  }
  add_action( 'init', 'taxonomies_language', 0 );

// language category texonomy end

//enque script

function add_custom_script() {
 
	wp_register_script('filterizr_plugin', '/wp-content/themes/royale-news/js/lib/filterzr/jquery.filterizr.min.js', array('jquery'),'1.1', true);
	wp_register_script('custom_script', '/wp-content/themes/royale-news/js/custom/custom.js', array('jquery', 'filterizr_plugin'),'1.1', true);
	wp_enqueue_script('filterizr_plugin');
	wp_enqueue_script('custom_script');
}	  
add_action( 'wp_enqueue_scripts', 'add_custom_script' ); 
