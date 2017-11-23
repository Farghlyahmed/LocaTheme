
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

        
        // this function to add css and scripts from here
/*

function mytheme_style(){
    wp_enqueue_style('style',get_template_directory_uri().'/assets/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts','mytheme_style');
 */       
      
// active menu
add_filter( 'wp_list_categories', 'replace_current_cat_css_class' );

function replace_current_cat_css_class( $html ) {
    return str_replace( ' current-cat', ' active', $html );
}
        
/*custom logo setup*/
function loca_custom_logo_setup() {
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
/* end of custom logo setup */

// register primary menu.
register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'loca' )
			
) );
/*end of register menu*/
        
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

/*
    ** register post type
*/
register_post_type( 'slider',
    array(
    'labels' => array(
    'name' => __( 'sliders', 'loca' ),
    'singular_name' => __( 'slider', 'loca' )
    ),
    'public' => true,
    'has_archive' => true,
    )
);



/*
    ** end of register post type
*/

/*
    ** register another post type
*/




/*
    ** end of movie posts
*/


/**
    * function to register post view counts
    * 
    * 
*/
//Set the Post Custom Field in the WP dashboard as Name/Value pair 
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
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
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/*get the excerpt*/
function new_excerpt_more($more){
    global $post;
    return '...<a class="moretag btn btn-sucess"href="'.get_permalink($post->ID).'">continue reading &raquo; </a>';
}
add_filter('excerpt_more','new_excerpt_more');
/*end of get excerpt*/

/*limit words in post title*/
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
        $result .= $count[$i].' ';
        /*$result .= $words[$i].' '*/
       }
    return $result;

}



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
};

/*pagination*/
function numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

/*end of pagination*/

/*
  class of drop down menu
*/


class BootstrapNavMenuWalker extends Walker_Nav_Menu {

    // &$output, $depth = 0
	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output	   .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {


		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		// managing divider: add divider class to an element to get a divider before it.
		$divider_class_position = array_search('divider', $classes);
		if($divider_class_position !== false){
			$output .= "<li class=\"divider\"></li>\n";
			unset($classes[$divider_class_position]);
		}
		
		$classes[] = ($args->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if($depth && $args->has_children){
			$classes[] = 'dropdown-submenu';
		}


		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($depth == 0 && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;


		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		//v($element);
		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);

	}

}

/*
    * end of class dropdown menu
*/




/* text customization*/
add_action( 'customize_register', 'loca_register_theme_customizer' );
/*
 * Register Our Customizer Stuff Here
 */
function loca_register_theme_customizer( $wp_customize ) {
 // Create custom panel.
     $wp_customize->add_panel( 'text_blocks', array(
     'priority' => 500,
     'theme_supports' => '',
     'title' => __( 'Text Blocks', 'loca' ),
     'description' => __( 'Set editable text for certain content.', 'loca' ),
     ) );
     // Add Footer Text
     // Add section.
     $wp_customize->add_section( 'custom_footer_text' , array(
     'title' => __('Change Footer Text','loca'),
     'panel' => 'text_blocks',
     'priority' => 10
     ) );
     // Add setting
     $wp_customize->add_setting( 'footer_text_block', array(
     'default' => __( 'Write you text here', 'loca' ),
     'sanitize_callback' => 'sanitize_text'
     ) );
     // Add control
     $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize,
     'custom_footer_text',
     array(
     'label' => __( 'Footer Text', 'loca' ),
     'section' => 'custom_footer_text',
     'settings' => 'footer_text_block',
     'type' => 'textarea'
     )
     )
     );
     // Sanitize text
     function sanitize_text( $text ) {
     return sanitize_text_field( $text );
     }
}



/*end of text customization*/

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

