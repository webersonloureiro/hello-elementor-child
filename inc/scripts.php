<?php

if( !defined('ABSPATH') ) exit;

add_action( 'wp_enqueue_scripts', 'wl_theme_scripts' );

function wl_theme_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/assets/dist/style.min.css', '', THEME_VERSION );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/assets/dist/script.min.js', array('jquery'), THEME_VERSION, true );
	wp_localize_script( 'theme-scripts', 'theme_ajax_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
