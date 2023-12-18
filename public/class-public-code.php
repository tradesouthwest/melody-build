<?php
namespace Melody_Build;
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/
 * @since      1.0.0
 *
 * @package    Melody_Build
 * @subpackage Melody_Build/public
 */
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Melody_Build
 * @subpackage Melody_Build/public
 * @author     TSW
 */
class Public_Code {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Melody_Build    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param string $Melody_Build       The name of the plugin.
	 * @param string $version    The version of this plugin.
	 * @param url    public/partials/melody-build-public-display wphead styles.
	 */
	public function __construct( $plugin_name, $version ) {

		if ( defined( 'MELODY_BUILD_VERSION' ) ) {
			$this->version = MELODY_BUILD_VERSION;
		} else {
			$this->version = '1.0.1';
		}
		$this->plugin_name = 'melody-build';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in melody_build_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The melody_build_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name . '-public', 
			plugin_dir_url( __FILE__ ) . 'css/melody-build-public.css', 
			array(), 
			$this->version, 
			'all' 
		);
	
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in melody_build_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The melody_build_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		/* wp_enqueue_script( $this->plugin_name . '-public', 
		 plugin_dir_url( __FILE__ ) . 'js/melody-build-public.js', 
		 array( 'jquery' ), 
		 $this->version, 
		 false 
	 	); */ 
		$styles = $this->frontside_inline_css();
		wp_register_style( 'melody-build-inline-set', false );
		wp_enqueue_style(   'melody-build-inline-set' );
		wp_add_inline_style( 'melody-build-inline-set', $styles );

	}

	/**
	 * Send css to head
	 * Theme color adjustment options
	 * @since 1.0.1
	 */
	public function frontside_inline_css(){

		$options      = get_option( 'melody_build_options' );
		$mldybldcolor = empty($options['mldybld_color_field_0']) 
					   ? '' : $options['mldybld_color_field_0'];
		$mldybldshado = empty($options['mldybld_color_field_1']) 
					   ? '' : $options['mldybld_color_field_1'];
		$mlbd_marg    =	empty($options['mldybld_theme_margins_option']) 
					   ? '' : $options['mldybld_theme_margins_option'];
		$mlbdchk      = (empty($options['mldybld_theme_adjustment_option']) )
					    ? 0 : $options['mldybld_theme_adjustment_option'];
	
		$style = '';

		ob_start();

		echo '.mldyflx-wide, 
		.mldyflx-thirds, 
		.mldyflx-thirds.joined, 
		.mldyflx-half, 
		.mldyflx-wide, 
		.mldyflx-quarters{';

		if( !empty ( $mldybldcolor ) ) : 
			echo 'background: ' . $mldybldcolor . ';';
		else : 
			echo 'background: transparent;';
		endif; 
		if( !empty ( $mldybldshado ) ) : 
			echo 'box-shadow: 0 0 2px 1px ' . $mldybldshado . ';';
			else : 
			echo 'box-shadow: none;';
		endif; 
		echo '}';

		if ( $mlbdchk ) :  
			echo '@media screen and (min-width: 300px) and (max-width: 768px){
			.mldyflx-quarters{width: calc( 50% - .5em );}}';
		endif;
		if ( $mlbd_marg  > 0 ) : 
			echo '.mldyflx-row{ margin-top: ' . $mlbd_marg . 'px; }';
		endif;

		$styles = ob_get_clean();
		
			return $styles;	
	} 
}
