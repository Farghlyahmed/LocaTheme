<?php
/**
 * loca functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package loca
 */

if ( ! function_exists( 'loca_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function loca_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on loca, use a find and replace
		 * to change 'loca' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'loca', get_template_directory() . '/languages' );

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
        
        
        /*
         * add support the excerpt in page
         * 
         * 
        */
        add_post_type_support( 'page', 'excerpt' );
        
        /*
            * add custom logo
            * add support change custom logo
        */
        add_theme_support( 'custom-logo' );
function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
        
add_action( 'after_setup_theme', 'loca_custom_logo_setup' );

if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'loca' )
			
		) );
        /**
         * add support to search form
         * 
        */
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery' ) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'loca_custom_background_args', array(
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'loca_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function loca_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'loca_content_width', 640 );
}
add_action( 'after_setup_theme', 'loca_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function loca_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'loca' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'loca' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'loca' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'loca' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'loca_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function loca_scripts() {
	wp_enqueue_style( 'loca-style', get_stylesheet_uri() );

	wp_enqueue_script( 'loca-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'loca-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'loca_scripts' );




/**
    * function to register post view counts
    * 
    * 
*/
//Set the Post Custom Field in the WP dashboard as Name/Value pair 
function bac_PostViews($post_ID) {
 
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count'; 
     
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
     
    //If the the Post Custom Field value is empty. 
    if($count == ''){
        $count = 0; // set the counter to zero.
         
        //Delete all custom fields with the specified key from the specified post. 
        delete_post_meta($post_ID, $count_key);
         
        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta($post_ID, $count_key, '0');
        return $count . ' View';
     
    //If the the Post Custom Field value is NOT empty.
    }else{
        $count++; 
        //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta($post_ID, $count_key, $count);
         
        //If statement, is just to have the singular form 'View' for the value '1'
        if($count == '1'){
        return $count . ' View';
        }
        //In all other cases return (count) Views
        else {
        return $count . ' Views';
        }
    }
}

function new_excerpt_more($more){
    global $post;
    return '...<a class="moretag btn btn-sucess"href="'.get_permalink($post->ID).'">continue reading &raquo; </a>';
}
add_filter('excerpt_more','new_excerpt_more');

function limit_word_count($title) {
        $len = 10; //change this to the number of words
    if (str_word_count($title) > $len) {
        $keys = array_keys(str_word_count($title, 2));
        $title = substr($title, 0, $keys[$len]);
    }
    return $title;
}
add_filter('the_title', 'limit_word_count');

function limit_content($title,$len) {
       // $len = 10; //change this to the number of words
    if (str_word_count($title) > $len) {
        $keys = array_keys(str_word_count($title, 2));
        $title = substr($title, 0, $keys[$len]);
    }
    return $title;
}

function title_words($title,$count){
    
        $title = get_the_title(); // This must be!, because this is the return - the_title would be echo
        $title_array = explode(' ', $title);
        $result = '';
       for ($i = 0; $i < $count && isset($title_array [$i]); $i++) {
        $result .= $words[$i].' ';
       }
    return $result;

}


/*get post view count */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


/*get the excerpt by Id*/
function robins_get_the_excerpt($post_id) {
  global $post;  
  $save_post = $post;
  $post = get_post($post_id);
  $output = get_the_excerpt();
  $post = $save_post;
  return $output;
}
/*end function the excerpt by Id*/

/*
    end of post  view count
*/


/*remove_post_thumbnial_dimensions*/

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function twitter_share_custom_options( $options, $defaults, $attributes )
{
  $options['size'] = 'large';
  return $options;
}
add_filter( 'shortcode_atts_twitter_share', 'twitter_share_custom_options', 10, 3 );

/*change login url*/

/*add_filter('site_url',  'wplogin_filter', 10, 3);
function wplogin_filter( $url, $path, $orig_scheme )
{
 $old  = array( "/(wp-login\.php)/");
 $new  = array( "b-login");
 return preg_replace( $old, $new, $url, 1);
}*/

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

