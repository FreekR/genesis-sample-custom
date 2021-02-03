<?php 

// Add Google Fonts. Set to Montserrat by default.
add_action( 'wp_enqueue_scripts', 'load_custom_google_fonts' );

function load_custom_google_fonts() {

	wp_enqueue_style( 'sk-custom-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800|&display=swap', array(), 'CHILD_THEME_VERSION' );
}


// Dequeue Source Sans Pro
add_action( 'wp_enqueue_scripts', function () {
	$appearance = genesis_get_config( 'appearance' );

	wp_dequeue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		array(),
		genesis_get_theme_version()
	);
	
}, 20 );


 ?>