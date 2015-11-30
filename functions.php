<?php
require_once('wp_bootstrap_navwalker.php');
if ( ! isset( $content_width ) ) $content_width = 1170;
// load textdomain
add_action('after_setup_theme', 'lm_theme_setup');
function lm_theme_setup(){
	load_theme_textdomain('lightning-monkey', get_template_directory() . '/languages');
}
function lm_themeslug_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'lm_logo_section' , array(
	    'title'       => __( 'Logo', 'lightning-monkey' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name and description in the header',
	) );
	$wp_customize->add_setting( 'lm-logo', array('sanitize_callback' => 'esc_url_raw') );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lm-logo', array(
	    'label'    => __( 'Logo', 'lightning-monkey' ),
	    'section'  => 'lm_logo_section',
	    'settings' => 'lm-logo',
	) ) );
	// Home Page
	$wp_customize->add_section( 'lm_home_section' , array(
	    'title'       => __( 'Home Page', 'lightning-monkey' ),
	    'priority'    => 30,
	    'description' => 'Customize the home page content.',
	) );
	$wp_customize->add_setting( 'lm-home-img', array('sanitize_callback' => 'esc_url_raw') );
	$wp_customize->add_setting( 'lm-home-cta-url', array('sanitize_callback' => 'esc_url_raw') );
	$wp_customize->add_setting( 'lm-home-cta-text', array('sanitize_callback' => 'sanitize_text_field','default' => 'Click Here') );
	$wp_customize->add_setting( 'lm-home-header-text', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'This is Lightning Monkey') );
	$wp_customize->add_setting( 'lm-home-subheader-text', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Fast, Responsive and Awesome!') );
	$wp_customize->add_setting( 'lm-home-content-text', array('sanitize_callback' => 'sanitize_text_field','default' => 'If you need a fast, lightweight theme that looks great, Lightning Monkey is for you. It also has the power of lightning and monkeys. How can you lose?') );
	$wp_customize->add_setting( 'lm-home-left-header', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Left Header') );
	$wp_customize->add_setting( 'lm-home-center-header', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Center Header') );
	$wp_customize->add_setting( 'lm-home-right-header', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Right Header') );
	$wp_customize->add_setting( 'lm-home-left-text', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lorem odio, convallis non tincidunt in, elementum at urna. Fusce porta ultricies lacus, non tristique neque varius vel.') );
	$wp_customize->add_setting( 'lm-home-center-text', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lorem odio, convallis non tincidunt in, elementum at urna. Fusce porta ultricies lacus, non tristique neque varius vel.') );
	$wp_customize->add_setting( 'lm-home-right-text', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lorem odio, convallis non tincidunt in, elementum at urna. Fusce porta ultricies lacus, non tristique neque varius vel.') );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lm-home-img', array(
	    'label'    => __( 'Home Image', 'lightning-monkey' ),
	    'section'  => 'lm_home_section',
	    'settings' => 'lm-home-img',
	) ) );
	$wp_customize->add_control( 'lm-home-cta-url', array(
	    'label'      => __( 'Call To Action URL', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-cta-url',
	    'type'       => 'text',
	) );
	$wp_customize->add_control( 'lm-home-cta-text', array(
	    'label'      => __( 'Call To Action Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-cta-text',
	    'type'       => 'text',
	) );
	$wp_customize->add_control( 'lm-home-header-text', array(
	    'label'      => __( 'Header Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-header-text',
	    'type'       => 'text',
	) );
	$wp_customize->add_control( 'lm-subhome-header-text', array(
	    'label'      => __( 'Subheader Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-subheader-text',
	    'type'       => 'text',
	) );
	$wp_customize->add_control( 'lm-home-content-text', array(
	    'label'      => __( 'Content Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-content-text',
	    'type'       => 'textarea',
	) );
	$wp_customize->add_control( 'lm-home-left-header', array(
	    'label'      => __( 'Left Header Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-left-header',
	    'type'       => 'text',
	) );
	$wp_customize->add_control( 'lm-home-left-text', array(
	    'label'      => __( 'Left Section Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-left-text',
	    'type'       => 'textarea',
	) );
	$wp_customize->add_control( 'lm-home-center-header', array(
	    'label'      => __( 'Center Header Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-center-header',
	    'type'       => 'text',
	) );
	$wp_customize->add_control( 'lm-home-center-text', array(
	    'label'      => __( 'Left Section Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-center-text',
	    'type'       => 'textarea',
	) );
	$wp_customize->add_control( 'lm-home-right-header', array(
	    'label'      => __( 'Right Header Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-right-header',
	    'type'       => 'text',
	) );
	$wp_customize->add_control( 'lm-home-right-text', array(
	    'label'      => __( 'Right Section Text', 'lightning-monkey' ),
	    'section'    => 'lm_home_section',
	    'settings'   => 'lm-home-right-text',
	    'type'       => 'textarea',
	) );
	// Social Icons
	$wp_customize->add_section( 'lm_social_icons', array(
	    'title'          => __( 'Social Icons', 'lightning-monkey' ),
	    'priority'       => 35,
	) );
	$social_icon_settings = array(
		array(
			'setting'	=> 'lm-facebook-url', 
			'name'		=> 'Facebook URL',
		),
		array(
			'setting'	=> 'lm-twitter-url', 
			'name'		=> 'Twitter URL',
		),
		array(
			'setting'	=> 'lm-youtube-url', 
			'name'		=> 'YouTube URL',
		),
		array(
			'setting'	=> 'lm-google-plus-url', 
			'name'		=> 'Google Plus URL',
		),
		array(
			'setting'	=> 'lm-tumblr-url', 
			'name'		=> 'Tumblr URL',
		),
		array(
			'setting'	=> 'lm-pinterest-url', 
			'name'		=> 'Pinterest URL',
		),
		array(
			'setting'	=> 'lm-linkedin-url', 
			'name'		=> 'LinkedIn URL',
		),
		array(
			'setting'	=> 'lm-instagram-url', 
			'name'		=> 'Instagram URL',
		),
		array(
			'setting'	=> 'lm-flickr-url', 
			'name'		=> 'Flickr URL',
		),
		array(
			'setting'	=> 'lm-vine-url', 
			'name'		=> 'Vine URL',
		),
	);
	foreach($social_icon_settings as $setting){
		$wp_customize->add_setting( $setting['setting'], array(
		    'default'        => '',
		    'type'           => 'theme_mod',
		    'sanitize_callback' => 'esc_url_raw',
		) );
	}
	foreach($social_icon_settings as $setting){
		$wp_customize->add_control( $setting['setting'], array(
		    'label'      => $setting['name'], 'lightning-monkey',
		    'section'    => 'lm_social_icons',
		    'settings'   => $setting['setting'],
		    'type'       => 'text',
		) );
	}
}
add_action( 'customize_register', 'lm_themeslug_customize_register' );
function lm_themeslug_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'lm_themeslug_filter_front_page_template' );
function lm_enqueue_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'lm_google_fonts', '//fonts.googleapis.com/css?family=Open+Sans+Condensed:300' );
	wp_enqueue_style( 'lm_bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css'); 
	wp_enqueue_style( 'lm_fontawesome_css', get_template_directory_uri() . '/css/font-awesome.min.css'); 
	wp_enqueue_script( 'lm_bootstrap_script', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false);
	wp_enqueue_style( 'lm_lightning_monkey_style', get_stylesheet_uri(), array() );
}
add_action('wp_enqueue_scripts', 'lm_enqueue_scripts' );
//Register area for custom menu
function lm_register_menus() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu', 'lightning-monkey' ) );
    register_nav_menu( 'footer-menu', __( 'Footer Menu', 'lightning-monkey' ) );
}
add_action( 'init', 'lm_register_menus' );
// Adds theme support for post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(520, 250, true);
//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );
// Title tag support
add_theme_support( "title-tag" );
// Register Sidebar
function lm_main_sidebar() {
	$args = array(
		'id'            => 'right-sidebar',
		'name'          => __( 'Right Sidebar', 'lightning-monkey' ),
		'description'   => __( 'Appears on the right side of a page.', 'lightning-monkey' ),
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'lm_main_sidebar' );
?>