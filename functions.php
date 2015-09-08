<?php

include 'theme-options.php';
include 'home-options.php';
require_once('wp_bootstrap_navwalker.php');

if(!is_user_logged_in){
	add_filter('show_admin_bar', '__return_false');
}

if ( ! isset( $content_width ) ) $content_width = 1170;

// load textdomain
load_theme_textdomain('lightningmonkey');

function themeslug_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'themeslug_filter_front_page_template' );

function theme_lm_scripts() {
	wp_enqueue_script( 'lm-functions', get_template_directory_uri() . '/js/lm-functions.js', 'jQuery', '1.0.0', true );
}

function theme_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'lm-backend', get_template_directory_uri() . '/js/lm-backend.js', 'jQuery', '1.0.0', true );
	wp_enqueue_style('lm-backend-css', get_template_directory_uri() . '/admin-style.css');
}

function enqueue_bootstrap(){
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css'); 
	wp_enqueue_style( 'fontawesome_css', get_template_directory_uri() . '/css/font-awesome.min.css'); 
	wp_enqueue_script( 'bootstrap_script', get_template_directory_uri() . '/js/bootstrap.min.js', 'jQuery', false);
}

function enqueue_jquery(){
	wp_enqueue_script('jQuery', get_template_directory_uri() . '/js/jquery-1.11.3.min.js' );
}

add_action('wp_enqueue_scripts', 'enqueue_jquery' );
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );
add_action( 'wp_enqueue_scripts', 'theme_lm_scripts' );
add_action( 'admin_enqueue_scripts', 'theme_admin_scripts' );

function my_scripts_method() {

	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/tabs.js', array('jquery'));
	wp_enqueue_script('jquery-ui-tabs');

}
add_action('admin_enqueue_scripts', 'my_scripts_method');

//Add support for custom menus
add_action( 'init', 'register_primary_menu' );
//Register area for custom menu
function register_primary_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu', 'lightningmonkey' ) );
}

add_action( 'init', 'register_footer_menu' );
//Register area for custom menu
function register_footer_menu() {
    register_nav_menu( 'footer-menu', __( 'Footer Menu', 'lightningmonkey' ) );
}
// Adds theme support for post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(520, 250, true);

//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Title tag support
add_theme_support( "title-tag" )
?>
<?php
// Register Sidebar
function main_sidebar() {
	$args = array(
		'id'            => 'right-sidebar',
		'name'          => __( 'Right Sidebar', 'text_domain' ),
		'description'   => __( 'Appears on the right side of a page.', 'text_domain' ),
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'main_sidebar' );
?>