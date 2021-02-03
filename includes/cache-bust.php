<?php 

/*
*
*
* Cache bust the style.css whenever it changes
*
*
*/


// Remove default Genesis Child Theme Stylesheet
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
// Create function to append last modified file to stylesheet URL
add_action( 'wp_enqueue_scripts', 'wd_genesis_child_stylesheet' );
function wd_genesis_child_stylesheet() {
     $theme_name = defined('CHILD_THEME_NAME') && CHILD_THEME_NAME ? sanitize_title_with_dashes(CHILD_THEME_NAME) : 'child-theme';
     $version = defined( 'CHILD_THEME_VERSION' ) && CHILD_THEME_VERSION ? CHILD_THEME_VERSION : PARENT_THEME_VERSION;
     $version .= '.' . date ( "njYHi", filemtime( get_stylesheet_directory() . '/style.css' ) );
     wp_enqueue_style( $theme_name, get_stylesheet_uri(), array(), $version );
}


 ?>