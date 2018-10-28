<?php
define("PLUGIN_DIR",plugin_dir_path( __FILE__ ) );
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://linkode.com.au
 * @since             1.0.0
 * @package           Decode_Asset_Management
 *
 * @wordpress-plugin
 * Plugin Name:       Decode Asset Management
 * Plugin URI:        https://www.twmg.com.au/decode-asset-management
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sujan Prajapati Maharjan
 * Author URI:        http://linkode.com.au
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       decode-asset-management
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-decode-asset-management-activator.php
 */
function activate_decode_asset_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-decode-asset-management-activator.php';
	Decode_Asset_Management_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-decode-asset-management-deactivator.php
 */
function deactivate_decode_asset_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-decode-asset-management-deactivator.php';
	Decode_Asset_Management_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_decode_asset_management' );
register_deactivation_hook( __FILE__, 'deactivate_decode_asset_management' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-decode-asset-management.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_decode_asset_management() {

	$plugin = new Decode_Asset_Management();
	$plugin->run();

}
run_decode_asset_management();
