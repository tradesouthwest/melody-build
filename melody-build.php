<?php
namespace Melody_Build;
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/tradesouthwest
 * @since             1.0.0
 * @package           Melody_Build
 *
 * @wordpress-plugin & @classicpress-plugin
 * Plugin Name:       Melody Build
 * Plugin URI:        https://github.com/tradesouthwest/melody-build
 * Description:       Melody Build is a content page builder focused on promoting HTML for ClassicPress.
 * Version:           1.0.0
 * Author:            Tradesouthwest
 * Author URI:        https://tradesouthwest.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       melody-build
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
define( 'MELODY_BUILD_VERSION', time() );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-activator.php';
	register_activation_hook( __FILE__, 
		array( '\Melody_Build\Activator', 'activate' ) );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-deactivator.php';
    register_activation_hook( __FILE__, 
        array( '\Melody_Build\Deactivator', 'deactivate' ) );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-core.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_melody_build() {

	$plugin = new \Melody_Build\Core;
	$plugin->run();

}
run_melody_build();
