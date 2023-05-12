<?php
/**
 * Box Office
 *
 * @package   box-office
 * @author    Evan G <evangdesigns@gmail.com>
 * @copyright 2023 Box Office
 * @license   MIT
 * @link      https://evangdesigns.com
 *
 * Plugin Name:     Box Office
 * Plugin URI:      https://evangdesigns.com
 * Description:     a plugin for theatres to sell tickets to performances.
 * Version:         0.0.1
 * Author:          Evan G
 * Author URI:      https://evangdesigns.com
 * Text Domain:     box-office
 * Domain Path:     /languages
 * Requires PHP:    7.1
 * Requires WP:     5.5.0
 * Namespace:       BoxOffice
 */

declare( strict_types = 1 );

/**
 * Define the default root file of the plugin
 *
 * @since 1.0.0
 */
const BOX_OFFICE_PLUGIN_FILE = __FILE__;

/**
 * Load PSR4 autoloader
 *
 * @since 1.0.0
 */
$box_office_autoloader = require plugin_dir_path( BOX_OFFICE_PLUGIN_FILE ) . 'vendor/autoload.php';

/**
 * Setup hooks (activation, deactivation, uninstall)
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, [ 'BoxOffice\Config\Setup', 'activation' ] );
register_deactivation_hook( __FILE__, [ 'BoxOffice\Config\Setup', 'deactivation' ] );
register_uninstall_hook( __FILE__, [ 'BoxOffice\Config\Setup', 'uninstall' ] );

/**
 * Bootstrap the plugin
 *
 * @since 1.0.0
 */
if ( ! class_exists( '\BoxOffice\Bootstrap' ) ) {
	wp_die( __( 'Box Office is unable to find the Bootstrap class.', 'box-office' ) );
}
add_action(
	'plugins_loaded',
	static function () use ( $box_office_autoloader ) {
		/**
		 * @see \BoxOffice\Bootstrap
		 */
		try {
			new \BoxOffice\Bootstrap( $box_office_autoloader );
		} catch ( Exception $e ) {
			wp_die( __( 'Box Office is unable to run the Bootstrap class.', 'box-office' ) );
		}
	}
);

/**
 * Create a main function for external uses
 *
 * @return \BoxOffice\Common\Functions
 * @since 1.0.0
 */
function box_office(): \BoxOffice\Common\Functions {
	return new \BoxOffice\Common\Functions();
}
