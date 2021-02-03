<?php 

// Remove editor from pages
add_action( 'init', function() {
    remove_post_type_support( 'page', 'editor' );
}, 99);


// Remove Genesis menu link
remove_theme_support( 'genesis-admin-menu' );

