<?php
/**
*
* This program is a free software; you can use it and/or modify it under the terms of the GNU
* General Public License as published by the Free Software Foundation; either version 2 of the License,
* or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
* even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*
* You should have received a copy of the GNU General Public License along with this program; if not, write
* to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*
* @package   	Customizr
* @since     	1.0
* @author    	Nicolas GUILLAUME <nicolas@presscustomizr.com>
* @copyright 	Copyright (c) 2013-2016, Nicolas GUILLAUME
* @link      	http://presscustomizr.com/customizr
* @license   	http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if ( !defined( 'CZR_MIN_PHP_VERSION' ) ) define ( 'CZR_MIN_PHP_VERSION', 5.3 );
if ( !defined( 'CZR_MIN_WP_VERSION' ) ) define ( 'CZR_MIN_WP_VERSION', 4.5 );

if ( version_compare( phpversion(), CZR_MIN_PHP_VERSION, '<' ) ) {
    add_action( 'admin_notices'             , 'czr_fn_display_min_php_message' );
    return;
}
global $wp_version;
if ( version_compare( $wp_version, CZR_MIN_WP_VERSION, '<' ) ) {
    add_action( 'admin_notices'             , 'czr_fn_display_min_wp_message' );
    return;
}

function czr_fn_display_min_php_message() {
    czr_fn_display_min_requirement_notice( __( 'PHP', 'customizr' ), CZR_MIN_PHP_VERSION );
}

function czr_fn_display_min_wp_message() {
    czr_fn_display_min_requirement_notice( __( 'WordPress', 'customizr' ), CZR_MIN_WP_VERSION );
}


function czr_fn_display_min_requirement_notice( $requires_what, $requires_what_version ) {
    $theme = wp_get_theme()->Name;
    printf( '<div class="error"><p>%1$s</p></div>',
        sprintf( __( 'The <strong>%1$s</strong> theme requires at least %2$s version %3$s', 'customizr' ),
            $theme,
            $requires_what,
            $requires_what_version
        )
    );
}

/**
* This is where Customizr starts. This file defines and loads the theme's components :
* => Constants : CUSTOMIZR_VER, TC_BASE, TC_BASE_CHILD, TC_BASE_URL, TC_BASE_URL_CHILD, THEMENAME, CZR_WEBSITE
* => Default filtered values : images sizes, skins, featured pages, social networks, widgets, post list layout
* => Text Domain
* => Theme supports : editor style, automatic-feed-links, post formats, navigation menu, post-thumbnails, retina support
* => Plugins compatibility : JetPack, bbPress, qTranslate, WooCommerce and more to come
* => Default filtered options for the customizer
* => Customizr theme's hooks API : front end components are rendered with action and filter hooks
*
* The method CZR__::czr_fn__() loads the php files and instantiates all theme's classes.
* All classes files (except the class__.php file which loads the other) are named with the following convention : class-[group]-[class_name].php
*
* The theme is entirely built on an extensible filter and action hooks API, which makes customizations easy and safe, without ever needing to modify the core structure.
* Customizr's code acts like a collection of plugins that can be enabled, disabled or extended.
*
* If you're not familiar with the WordPress hooks concept, you might want to read those guides :
* http://docs.presscustomizr.com/article/26-wordpress-actions-filters-and-hooks-a-guide-for-non-developers
* https://codex.wordpress.org/Plugin_API
*/

//Fire Customizr
require_once( get_template_directory() . '/core/init-base.php' );


/**
* THE BEST AND SAFEST WAY TO EXTEND THE CUSTOMIZR THEME WITH YOUR OWN CUSTOM CODE IS TO CREATE A CHILD THEME.
* You can add code here but it will be lost on upgrade. If you use a child theme, you are safe!
*
* Don't know what a child theme is ? Then you really want to spend 5 minutes learning how to use child themes in WordPress, you won't regret it :) !
* https://codex.wordpress.org/Child_Themes
*
* More informations about how to create a child theme with Customizr : http://docs.presscustomizr.com/article/24-creating-a-child-theme-for-customizr/
* A good starting point to customize the Customizr theme : http://docs.presscustomizr.com/article/35-how-to-customize-the-customizr-wordpress-theme/
*/
	// Movie Custom Post Type

    function movie_post_type() {
 
        $labels = array(
            'name'                => _x( 'movie', 'Post Type General Name', 'text_domain' ),
            'singular_name'       => _x( 'movie', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'           => __( 'Movie', 'text_domain' ),
            'parent_item_colon'   => __( 'Parent movie', 'text_domain' ),
            'all_items'           => __( 'All Movies', 'text_domain' ),
            'view_item'           => __( 'View Movie', 'text_domain' ),
            'add_new_item'        => __( 'Add New movie', 'text_domain' ),
            'add_new'             => __( 'Add New', 'text_domain' ),
            'edit_item'           => __( 'Edit movie', 'text_domain' ),
            'update_item'         => __( 'Update movie', 'text_domain' ),
            'search_items'        => __( 'Search movie', 'text_domain' ),
            'not_found'           => __( 'Not Found', 'text_domain' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'movie', 'text_domain' ),
            'description'           => __( 'search your favorite movie', 'text_domain' ),
            'labels'                => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats' ),
            'taxonomies'          => array( 'category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'movie_fields'          => true , 
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'query_var' 			=> true,
            'rewrite'				=> true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            
        );
        
        register_post_type( 'movie', $args );
     }
     
    add_action( 'init', 'movie_post_type', 0 );

    function add_movie_fields_meta_box() {
        add_meta_box(
            'movie_fields_meta_box', // $id
            'movie', // $title
            'show_movie_fields_meta_box', // $callback
            'movie', // $screen
            'normal', // $context
            'high' // $priority
        );
    }
    
    add_action( 'add_meta_boxes', 'add_movie_fields_meta_box' );

    function show_movie_fields_meta_box() {
        global $post;  
            $meta = get_post_meta( $post->ID, 'movie_fields', true ); ?>
    
        <input type="hidden" name="movie_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
    
        <p>
            <label for="movie_fields[text]">Release Year</label>
            <br>
            <input type="text" name="movie_fields[text]" id="movie_fields[text]" class="regular-text" placeholder= "enter release year" value="<?php if (is_array($meta) && isset($meta['text'])) { echo $meta['text']; } ?>">
        </p>
        <p>
            <label for="movie_fields[text]">Geners</label>
            <br>
            <input type="text" name="movie_fields[text]" id="movie_fields[text]" class="regular-text" placeholder="enter geners" value="<?php if (is_array($meta) && isset($meta['text'])) {	echo $meta['text']; } ?>">
        </p>
        <p>
            <label for="movie_fields[textarea]">Cast</label>
            <br>
            <textarea name="movie_fields[textarea]" id="movie_fields[textarea]" placeholder= "enter cast" rows="3" cols="30" style="width:500px;"><?php echo $meta['textarea']; ?></textarea>
        </p>
        

        <p>
        <label for="movie_fields[select]">Ratings</label>
        <br>
        <select name="movie_fields[select]" id="movie_fields[select]">
                <option value="option-one" <?php selected( $meta['select'], 'option-one' ); ?>> One</option>
                <option value="option-two" <?php selected( $meta['select'], 'option-two' ); ?>> Two</option>
                <option value="option-three" <?php selected( $meta['select'], 'option-three' ); ?>> Three</option>
                <option value="option-four" <?php selected( $meta['select'], 'option-four' ); ?>> Four</option>
                <option value="option-five" <?php selected( $meta['select'], 'option-five' ); ?>> Five</option>
        </select>
        </p>

        <?php
        function save_movie_fields_meta( $post_id ) {   
            // verify nonce
            if ( isset($_POST['movie_meta_box_nonce']) 
                    && !wp_verify_nonce( $_POST['movie_meta_box_nonce'], basename(__FILE__) ) ) {
                    return $post_id; 
                }
            // check autosave
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return $post_id;
            }
            // check permissions
            if (isset($_POST['post_type'])) { //Fix 2
                if ( 'page' === $_POST['post_type'] ) {
                    if ( !current_user_can( 'edit_page', $post_id ) ) {
                        return $post_id;
                    } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                        return $post_id;
                    }  
                }
            }
            
            $old = get_post_meta( $post_id, 'movie_fields', true );
                if (isset($_POST['movie_fields'])) { //Fix 3
                    $new = $_POST['movie_fields'];
                    if ( $new && $new !== $old ) {
                        update_post_meta( $post_id, 'movie_fields', $new );
                    } elseif ( '' === $new && $old ) {
                        delete_post_meta( $post_id, 'movie_fields', $old );
                    }
                }
        }
        add_action( 'save_post', 'save_movie_fields_meta' ); ?>

        <!-- All fields will go here -->
    
        <?php }

    
         //  Video Custom Post Type
    
    function video_post_type(){
        $labels = array(
            'name'                => _x( 'Video', 'Post Type General Name', 'text_domain' ),
            'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'           => __( 'Video', 'text_domain' ),
            'parent_item_colon'   => __( 'Parent Video', 'text_domain' ),
            'all_items'           => __( 'All Video', 'text_domain' ),
            'view_item'           => __( 'View Video', 'text_domain' ),
            'add_new_item'        => __( 'Add New Video', 'text_domain' ),
            'add_new'             => __( 'Add New', 'text_domain' ),
            'edit_item'           => __( 'Edit Video', 'text_domain' ),
            'update_item'         => __( 'Update Video', 'text_domain' ),
            'search_items'        => __( 'Search Video', 'text_domain' ),
            'not_found'           => __( 'Not Found', 'text_domain' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'video', 'text_domain' ),
            'description'           => __( 'search video', 'text_domain' ),
            'labels'                => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats' ),
            'taxonomies'          => array( 'genres', 'category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 6,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page'
        );
        
        register_post_type( 'video', $args );
        register_taxonomy_for_object_type( 'category', 'video' );
     }
     
    add_action( 'init', 'video_post_type', 0 );

  

    // video metabox start
        function video_add_metabox() {
            add_meta_box(
                'video_meta_box', // $id
                'Video info', // $title
                'video_info_callback', // $callback
                'video', // $screen
                'normal', // $context
                'high' // $priority
            );
        }
        add_action( 'add_meta_boxes', 'video_add_metabox' );

        function save_video_metabox( $post_id ){
            // verify taxonomies meta box nonce
            if ( !isset( $_POST['video_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['video_meta_box_nonce'], basename( __FILE__ ) ) ){
                return;
            }
            // return if autosave
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
                return;
            }
            // Check the user's permissions.
            if ( ! current_user_can( 'edit_post', $post_id ) ){
                return;
            }
            // store custom fields values
            // cholesterol string
            if ( isset( $_REQUEST['my_video_name'] ) ) {
                update_post_meta( $post_id, '_my_video_name', sanitize_text_field( $_POST['my_video_name'] ) );
            }
        }

        add_action( 'save_post_food', 'save_video_metabox', 10, 2 );

        

        function video_info_callback($post){
            
            wp_create_nonce( basename(__FILE__), 'video_meta_box_nonce' );
            $_my_video_name = get_post_meta( $post->ID, '_my_video_name', true );
            ?>
                <input type="text" name="my_video_name" data-postid="<?php echo $post->ID ?>" value="<?php echo $_my_video_name; ?>" placeholder="Enter video name"  />
            <?php
        }

    // video metabox end
    
    

    /* function video_add_meta_boxes( $post ){
        add_meta_box( 'video_meta_box', __( 'video', 'video_example_plugin' ), 'video_build_meta_box', 'video', 'side', 'low' );
    }
    add_action( 'add_meta_boxes_video', 'video_add_meta_boxes' );

    function video_build_meta_box( $post ){
        // our code here
    } */

    
            //  Kids Custom Post Type
    
    function kids_post_type(){
        $labels = array(
            'name'                => _x( 'Kids', 'Post Type General Name', 'text_domain' ),
            'singular_name'       => _x( 'Kids', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'           => __( 'Kids', 'text_domain' ),
            'parent_item_colon'   => __( 'Parent Kids', 'text_domain' ),
            'all_items'           => __( 'All Kids', 'text_domain' ),
            'view_item'           => __( 'View Kids', 'text_domain' ),
            'add_new_item'        => __( 'Add New Kids', 'text_domain' ),
            'add_new'             => __( 'Add New', 'text_domain' ),
            'edit_item'           => __( 'Edit Kids', 'text_domain' ),
            'update_item'         => __( 'Update Kids', 'text_domain' ),
            'search_items'        => __( 'Search Kids', 'text_domain' ),
            'not_found'           => __( 'Not Found', 'text_domain' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'kids', 'text_domain' ),
            'description'           => __( 'search kids', 'text_domain' ),
            'labels'                => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats' ),
            'taxonomies'          => array( 'genres', 'category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 7,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page'
        );
        
        register_post_type( 'kids', $args );
        }
    add_action( 'init', 'kids_post_type', 0 );		
    
             //  Kids Custom Post Type
    
     function fitness_post_type(){
        $labels = array(
            'name'                => _x( 'Fitness', 'Post Type General Name', 'text_domain' ),
            'singular_name'       => _x( 'Fitness', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'           => __( 'Fitness', 'text_domain' ),
            'parent_item_colon'   => __( 'Parent Fitness', 'text_domain' ),
            'all_items'           => __( 'All Fitness', 'text_domain' ),
            'view_item'           => __( 'View Fitness', 'text_domain' ),
            'add_new_item'        => __( 'Add New Fitness', 'text_domain' ),
            'add_new'             => __( 'Add New', 'text_domain' ),
            'edit_item'           => __( 'Edit Fitness', 'text_domain' ),
            'update_item'         => __( 'Update Fitness', 'text_domain' ),
            'search_items'        => __( 'Search Fitness', 'text_domain' ),
            'not_found'           => __( 'Not Found', 'text_domain' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'fitness', 'text_domain' ),
            'description'           => __( 'search fitness', 'text_domain' ),
            'labels'                => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats' ),
            'taxonomies'          => array( 'genres', 'category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 8,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page'
        );
        
        register_post_type( 'fitness', $args );
        }
    add_action( 'init', 'fitness_post_type', 0 );
    
             // Food Custom Post Type
    
    function food_post_type(){
        $labels = array(
            'name'                => _x( 'Food', 'Post Type General Name', 'text_domain' ),
            'singular_name'       => _x( 'Food', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'           => __( 'Food', 'text_domain' ),
            'parent_item_colon'   => __( 'Parent Food', 'text_domain' ),
            'all_items'           => __( 'All Food', 'text_domain' ),
            'view_item'           => __( 'View Food', 'text_domain' ),
            'add_new_item'        => __( 'Add New Food', 'text_domain' ),
            'add_new'             => __( 'Add New', 'text_domain' ),
            'edit_item'           => __( 'Edit Food', 'text_domain' ),
            'update_item'         => __( 'Update Food', 'text_domain' ),
            'search_items'        => __( 'Search Food', 'text_domain' ),
            'not_found'           => __( 'Not Found', 'text_domain' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'food', 'text_domain' ),
            'description'           => __( 'search food', 'text_domain' ),
            'labels'                => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats' ),
            'taxonomies'          => array( 'genres', 'category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 9,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page'
        );
        
        register_post_type( 'food', $args );
        }
    add_action( 'init', 'food_post_type', 0 );
    
             //Genres Custom Post Type
    
        function genres_post_type(){
            $labels = array(
                'name'                => _x( 'Genres', 'Post Type General Name', 'text_domain' ),
                'singular_name'       => _x( 'Genres', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'           => __( 'Genres', 'text_domain' ),
                'parent_item_colon'   => __( 'Parent Genres', 'text_domain' ),
                'all_items'           => __( 'All Genres', 'text_domain' ),
                'view_item'           => __( 'View All Genres', 'text_domain' ),
                'add_new_item'        => __( 'Add New Genres', 'text_domain' ),
                'add_new'             => __( 'Add New', 'text_domain' ),
                'edit_item'           => __( 'Edit Genres', 'text_domain' ),
                'update_item'         => __( 'Update Genres', 'text_domain' ),
                'search_items'        => __( 'Search Genres', 'text_domain' ),
                'not_found'           => __( 'Not Found', 'text_domain' ),
                'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'genres', 'text_domain' ),
                'description'           => __( 'search genres', 'text_domain' ),
                'labels'                => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats' ),
                'taxonomies'          => array( 'genres', 'category' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 10,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'page'
            );
            
            register_post_type( 'genres', $args );
            }
        add_action( 'init', 'genres_post_type', 0 );

    // Register and load the widget
    function wpb_load_widget() {
        register_widget( 'wpb_widget' );
    }
    add_action( 'widgets_init', 'wpb_load_widget' );
    
    // Creating the widget 
    class wpb_widget extends WP_Widget {
    
    function __construct() {
    parent::__construct(
    
    // Base ID of your widget
    'wpb_widget', 
    
    // Widget name will appear in UI
    __('Movie', 'wpb_widget_domain'), 
    
    // Widget description
    array( 'description' => __( 'Movies Widget', 'wpb_widget_domain' ), ) 
    );
    }
    
    // Creating widget front-end
    
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    
    // This is where you run the code and display the output
    echo __( 'Hello, World!', 'wpb_widget_domain' );
    echo $args['after_widget'];
    }
            
    // Widget Backend 
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __( 'New title', 'wpb_widget_domain' );
    }
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
    }
        
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
    }        