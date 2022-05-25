<?php
/**
 * Phpunit bootstrap file for running tests
 *
 */

$root = __DIR__;

do {
	$root = dirname( $root );

	// break if we don't find the file
	if ( strrpos( $root, DIRECTORY_SEPARATOR, intval( strpos( $root, PATH_SEPARATOR ) ) ) < 3 ) {
		define( 'FORCE_REINSTALL_SLUG', 'force-reinstall' );
		break;
	}
} while ( ! file_exists( $root . '/force-reinstall.php' ) );

/**
 * WP loaded check constant
 */
define( 'WPINC', 'wp-includes' );

/**
 * Reference to this file
 */
define( 'FORCE_REINSTALL_FILE', __FILE__ );

/**
 * Method stubs
 */
if ( ! function_exists( 'register_activation_hook' ) ) {
	/**
	 * Register activation hook stub
	 *
	 * @param string   $file
	 * @param callable $callable
	 * @return void
	 */
	function register_activation_hook( $file, $callable ) {
	}
}
if ( ! function_exists( 'register_deactivation_hook' ) ) {
	/**
	 * Register deactivation hook stub
	 *
	 * @param string   $file
	 * @param callable $callable
	 * @return void
	 */
	function register_deactivation_hook( $file, $callable ) {
	}
}
if ( ! function_exists( 'register_uninstall_hook' ) ) {
	/**
	 * Register uninstall hook stub
	 *
	 * @param string   $file
	 * @param callable $callable
	 * @return void
	 */
	function register_uninstall_hook( $file, $callable ) {
	}
}

	/**
	 * Load constants, no need for the actual value
	 */
$content = file_get_contents( $root . '/force-reinstall.php' );

preg_match_all( '/define\("(.*?)",\s?"?(.*?)"?\);/m', $content, $matches );

$matches = array_combine( $matches[1], $matches[2] );

foreach ( $matches as $constant => $value ) {
	if ( ! defined( $constant ) ) {
		define( $constant, $value );
	}
}
