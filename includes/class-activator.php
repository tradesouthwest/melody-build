<?php
namespace Melody_Build;
/**
 * Fired during plugin activation
 *
 * @link       https://github.com/
 * @since      1.0.0
 *
 * @package    Melody_Build
 * @subpackage Melody_Build/includes
 */
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Melody_Build
 * @subpackage Melody_Build/includes
 * @author     TSW
 */
class Activator {

	/* Add time stamp when installed. 
	 *
	 * Update option.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$format = get_option('date_format');
		$timestamp = get_the_time();
		$time = date_i18n($format, $timestamp, true);
		add_option( 'melody_build_date_plugin_activated' );
		update_option( 'melody_build_date_plugin_activated', $time );

	}

    public function activation_time(){
		$format = get_option('date_format');
		$timestamp = get_the_time();
		$time = date_i18n($format, $timestamp, true);

	}
} 
