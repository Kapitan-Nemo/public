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
    wp_enqueue_script('dragonfly-js',get_template_directory_uri() . '/dist/js/dragonfly.js', 'jquery', '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'dragonfly_scripts');


// Inculude styles
function load_stylesheets()
{
wp_register_style('dragonfly-style-min', get_template_directory_uri() . '/style.css' , array(), false, 'all' );
wp_enqueue_style('dragonfly-style-min');

}
add_action('wp_enqueue_scripts','load_stylesheets');


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