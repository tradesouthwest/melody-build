<?php
namespace Melody_Build;
/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/
 * @since      1.0.0
 *
 * @package    Melody_Build
 * @subpackage Melody_Build/includes
 */
/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Melody_Build
 * @subpackage Melody_Build/includes
 * @author     TSW
 */
class Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		if ( ! current_user_can( 'activate_plugins' ) )
        return;
        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        check_admin_referer( "deactivate-plugin_{$plugin}" );

        # Uncomment the following line to see the function in action
        # exit( var_dump( $_GET ) );
        $option_name = "melody_build_date_plugin_activated";
        delete_option( $option_name ); 
	}

}
