<?php
/*
* Plugin Name: Osome Post Slider
* Plugin Url:http://sanjaywebexpert.com
* Description: This is Responisve Post Slider with Category including Shortcodes
* Author Name: Sanjay Sharma
* Author Url: http://sanjaywebexpert.com
* Version: 1.0
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Define Plugin Path and Directory Path */
define("PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugin_dir_url(__FILE__));

/* Craeting Admin Menu */
function add_slider_menu(){
	add_menu_page(
		"osome_post_slider",
		"Osome Post Slider",
		"manage_options",
		"osome-post-slider",
		"osome_post_slider_func",
		"dashicons-format-gallery",
		5
	);
	add_submenu_page(
		'osome-post-slider',
		'Osome-setting',
		'Osome Setting',
		'manage_options',
		'osome_setting',
		'Osome_setting_function'
	);
}
add_action("admin_menu","add_slider_menu");
function osome_post_slider_func(){	
	include_once PLUGIN_DIR_PATH.'/inc/osomepost_how_to_use.php';
}
function Osome_setting_function(){
	include_once PLUGIN_DIR_PATH.'/inc/osomepost_setting.php';
}
/*  Registered All the Scripts and Styles */
function osomepost_slider_script(){
	wp_register_style("osomepost_slider_style",plugins_url('/owlcarousel/assets/osome-slider.css',__FILE__));
	wp_register_style("osomepost_owl_slider_style",plugins_url('/owlcarousel/assets/owl.carousel.min.css',__FILE__));
	wp_register_style("osomepost_slider_default_style",plugins_url('/owlcarousel/assets/owl.theme.default.min.css',__FILE__));
	wp_register_script("osomepost_slider_js",plugins_url('/owlcarousel/owl.carousel.js',__FILE__), array(), '1.0.0', true);
}
add_action('init','osomepost_slider_script');


function load_admin_style_forslider() {
        wp_register_style( 'custom_slider_admin_css', plugins_url('/owlcarousel/assets/admin-style.css',__FILE__) );
        wp_enqueue_style( 'custom_slider_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style_forslider' );

// Post thumbnails
if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}
add_image_size( 'post-slider-thumb', 600, 400, true );

/* Include Shortcode Function File  */
include_once PLUGIN_DIR_PATH.'/inc/osomepost_shortcode.php';



