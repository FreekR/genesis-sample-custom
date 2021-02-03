<?php 


// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
add_image_size( 'genesis-singular-images', 702, 526, true );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

// Sample modified stuff
// Removes all site layouts except full width. Also removes metaboxes.

// Remove unused sidebars
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );

// Remove layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar' );

// Remove layout metaboxes
remove_theme_support( 'genesis-inpost-layouts' );
remove_theme_support( 'genesis-archive-layouts' );

// Use full width layout 
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


// Remove entry footer markup
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );




// Remove edit post link
add_filter ( 'genesis_edit_post_link' , '__return_false' );


// Remove the site title
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );


// Remove entry header
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );


// Removes footer widgets.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );


// Removes site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );