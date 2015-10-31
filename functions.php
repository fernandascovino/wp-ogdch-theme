<?php

// =======================================================================//
// Composer
// =======================================================================//
require_once( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' );

// =======================================================================//
// Frontend Includes
// =======================================================================//

$frontend_includes = array(
	'assets/php/init.php',
	'assets/php/cleanup.php',
	'assets/php/scripts.php',
	'assets/php/actions.php',
	'assets/php/filters.php',
	'assets/php/shortcodes.php',
	'assets/php/walker.php',
	'assets/php/theme_functions.php',
	'assets/php/widgets.php',
	'assets/php/ajax.php',
	'assets/php/multilingual_ninjaforms.php',
);

foreach ( $frontend_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		// @codingStandardsIgnoreStart
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'ogdch' ), $file ), E_USER_ERROR );
		// @codingStandardsIgnoreEnd
	}
	require_once $filepath;
}
unset( $file, $filepath );


// =======================================================================//
// Only Backend Includes
// =======================================================================//

if ( is_admin() ) {

	$backend_includes = array(
		'assets/php/backend/scripts.php',               // Admin Scripts / CSS
		'assets/php/backend/caps.php',                  // Caps & Roles
		'assets/php/backend/menu.php',                  // Menu
		'assets/php/backend/statistics.php',            // Statistics API
		'assets/php/backend/wysiwyg.php',               // TinyMCE Configuration
	);

	foreach ( $backend_includes as $file ) {
		if ( ! $filepath = locate_template( $file ) ) {
			// @codingStandardsIgnoreStart
			trigger_error( sprintf( __( 'Error locating %s for inclusion', 'ogdch' ), $file ), E_USER_ERROR );
			// @codingStandardsIgnoreEnd
		}
		require_once $filepath;
	}
	unset( $file, $filepath );
}
