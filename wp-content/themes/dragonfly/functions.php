<?php
 
function dragonfly_support() {
	add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);
}

add_action( 'after_setup_theme', 'dragonfly_support' );

// Enqueue scripts
function dragonfly_scripts()
{
    // Deregister standard WP jQuery and register new one
    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri() . '/src/js/jquery-3.5.1.min.js', 'jquery', '3.5.1', true);
    wp_enqueue_script('dragonfly-js',get_template_directory_uri() . '/dist/js/dragonfly.js', 'jquery', '1.0.1', true);
}
add_action( 'wp_enqueue_scripts', 'dragonfly_scripts');


// Inculude styles
function dragonfly_stylesheets()
{
wp_register_style('dragonfly-style-min', get_template_directory_uri() . '/style.css' , array(), false, 'all' );
wp_enqueue_style('dragonfly-style-min');

}
add_action('wp_enqueue_scripts','dragonfly_stylesheets');


// Register Custom Navigation Walker for bootstrap
require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Dragonfly' ),
));

// Filter excrept length to 35 words.
function custom_excerpt_length( $length ) {
	return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Remove [...] from excerpt	
function new_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	
//Custom Post Type
function portfolio_post_type() {
		$labels = array(
			'name'                => 'Portfolio',
			'singular_name'       => 'Portfolio',
			'menu_name'           => 'Portfolio',
			'all_items'           => 'All',
			'view_item'           => 'All Portfolio',
			'add_new_item'        => 'Add new Portfolio',
			'add_new'             => 'Add new',
			'edit_item'           => 'Edit Portfolio',
			'update_item'         => 'Update',
			'search_items'        => 'Search Portfolio',
			'not_found'           => 'Not found',
			'not_found_in_trash'  => 'Not found in trash'
		); 
		$args = array(
			'label' => 'portfolio',
			'rewrite' => array(
			'slug' => 'portfolio', ),
			'description'         => 'Portfolio',
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'editor','page-attributes'),
			'hierarchical'        => false,
			'public'              => true, 
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'shpw_in_rest' 		  => true,
			'query_var' 	  	  => true,
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-portfolio',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'portfolio', $args );

		register_taxonomy( 'categories', array('portfolio'), array(
			'hierarchical' => true, 
			'label' => 'Categories', 
			'singular_label' => 'Category', 
			'show_ui'           => true,
        	'show_admin_column' => true,
			'query_var'         => true,
			'rewrite' => array( 'slug' => 'portfolio-category', )
			)
		);
	
		register_taxonomy_for_object_type( 'categories', 'portfolio' ); // Better be safe than sorry

	} 
	add_action( 'init', 'portfolio_post_type', 0 );

//Contact Form 7 
add_filter('wpcf7_autop_or_not', '__return_false');  //Remove <p> tags
add_filter( 'wpcf7_load_js', '__return_false' ); add_filter( 'wpcf7_load_css', '__return_false' );

/**
 * Disable standard editor and Gutenberg for the homepage
 * keeping the status (enabled/disabled) for others who uses the same filter (i.e. ACF)
 */
add_filter( 'use_block_editor_for_post', 'dragonfly_hide_editor', 10, 2 );
function dragonfly_hide_editor( $use_block_editor, $post_type ) {
    if ( (int) get_option( 'page_on_front' ) == get_the_ID() ) { // on frontpage
        remove_post_type_support( 'page', 'editor' ); // disable standard editor
        return false; // and disable gutenberg
    }

    return $use_block_editor; // keep gutenberg status for other pages/posts 
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


//Remove Gutenberg CSS
function dm_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	}
add_action( 'wp_enqueue_scripts', 'dm_remove_wp_block_library_css' );

//Remove wp-embed JS
function my_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
  }
  add_action( 'wp_footer', 'my_deregister_scripts' );


//Images sizes
add_image_size( '200', 200 );
add_image_size( '300', 300 );
add_image_size( '400', 400 );
add_image_size( '500', 500 );
add_image_size( '600', 600 );
add_image_size( '700', 700 );
add_image_size( '800', 800 );
add_image_size( '1000', 1000 );
add_image_size( '1200', 1200 );
add_image_size( '1400', 1400 );
add_image_size( '1600', 1600 );
add_image_size( '1800', 1800 );
add_image_size( '1920', 1920 );

add_filter( 'max_srcset_image_width', 'awesome_acf_max_srcset_image_width', 10 , 2 );

// set the max image width 
function awesome_acf_max_srcset_image_width() {
	return 2200;
}

/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute 
 */

function awesome_acf_responsive_image($image_id,$image_size,$max_width){

	// check the image ID is not blank
	if($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// generate the markup for the responsive image
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

	}
}

	