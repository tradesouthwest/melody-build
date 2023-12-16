<?php 
/**
 * Utility to add MCE Popup fired by custom Media Buttons button
 * @param $tgh string Text goes here translatable text string.
 * 
 * @since 1.0.1
 * @hook admin_footer
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} 
/**
 * The plugin form rendering file
 *
 * @since             1.0.0
 * @package           melody-build
 * @subpackage        melody-build/includes
 *
*/
// A1
add_action( 'init', 'melody_build_buttons' );
// A2
add_action( 'admin_footer', 'melody_build_render_mce_popup' );
// A3
add_action( 'media_buttons', 'melody_build_render_media_buttons' );
// F1
//add_filter( 'the_content', 'melody_build_fix_shortcodes', 99 );

/** #A1
 * @see https://madebydenis.com/adding-custom-buttons-in-tinymce-editor-in-wordpress/
 *
 * ********* TinyMCE Buttons ***********
 */

if ( ! function_exists( 'melody_build_buttons' ) ) {
	function melody_build_buttons() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
	        return;
        }
        add_filter( 'mce_buttons', 'melody_build_render_mixers' );
        add_filter( 'mce_external_plugins', 'melody_build_add_mixers' );
    }
}

/** #A2
 * The popup on editor page with instructions.
 *
 * @since    1.0.0
 * @var      string    $mxmt_refer_pagemixer  The ID of this popup.
 */
function melody_build_render_mce_popup() {
    /** Check if user have permission */
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    $tgh = __( 'Start content here', 'melody-build' );
    $imgurl = plugin_dir_url( __FILE__ ) . 'imgs/';
    ?>
    <div id="mxmt_refer_pagemixer" style="display:none;">

        <div class="mxmt-tsw-mcepopup">
            <div class="mxmt-popup-wrap">
            <h4><?php esc_html_e('melody-build PageMixer ','melody-build'); ?> <?php esc_html_e('Follow these steps please','melody-build'); ?></h4>
                <h3><?php esc_html_e( 'First', 'melody-build' ); ?></h3>
                <ul>
                <li><?php esc_html_e('Set your cursor, inside of the editor, exactly where you want a section to display.','melody-build'); ?></li>
                <li><?php esc_html_e( 'Be sure you are in the Visual editor tab when you do this step.', 'melody-build' ); ?></li>
                </ul>
                <h3><?php esc_html_e( 'Then', 'melody-build' ); ?></h3>
                <ul>
                <li><?php esc_html_e('Select the icon for the column you want in that spot.','melody-build'); ?></li>
                <li><?php esc_html_e('To add images or other content, simply Highlight the (sample) text and select an element to insert.','melody-build'); ?></li>
                <li><strong><?php esc_html_e( 'Borders in editor will not show on the front of your site. These just help sections stand out, visually.', 'melody-build' ); ?></strong></li>
                </ul>
                <img src="<?php echo esc_url( $imgurl .'mxmt-sections.png' ); ?>" />
                <h3><?php esc_html_e( 'Tips', 'melody-build' ); ?></h3>
                <h4><?php esc_html_e( 'USE MOUSE TO SET CURSOR/CARAT POSITION ON PAGE... not keys please.', 'melody-build' ); ?></h4>
                <p><?php esc_html_e( 'To add lots of space between rows you can use the Single Column icon and do not add any content (empty row).', 'melody-build' ); ?></p>
                <p><?php esc_html_e( 'You may need to toggle to Text editor tab in order to be sure all your work is clean and has no unneeded spaces or div tags.', 'melody-build' ); ?></p>
                <img src="<?php echo esc_url( $imgurl .'mxmt-admin-activehtml.png' ); ?>" />
                <p><?php esc_html_e( 'You can nest columns inside of other columns. Just be sure to not go too deep with nesting. Maybe two columns insed of a single half column would suffice.', 'melody-build' ); ?></p>
            </div>

        </div>

    </div>
    <?php

} 

/** #A3
 * Utility to add MCE Popup button to the Media Buttons section which lies directly
 * above the Visual / Text Editor
 *
 * @hook media_buttons
 */
function melody_build_render_media_buttons() {

    ?>
    <a href = "#TB_inline?width=540&height=820&inlineId=mxmt_refer_pagemixer"
    class = "button thickbox mxmt_doin_media_link" id = "add_div_pagemixer"
    title = "<?php esc_attr_e( 'Layout Selection', 'melody-build' ); ?>">
    <?php esc_attr_e( 'Melody Build Steps', 'melody-build' ); ?></a>
    <?php
}

/**
 * The popup on editor page with instructions.
 *
 * @since    1.0.0
 * @var      string    $mxmt_refer_pagemixer  The ID of this popup.
 */
if ( !function_exists('melody_build_fix_shortcodes') ) {
    function melody_build_fix_shortcodes($content){
        $array = array (
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );
        $content = strtr($content, $array);
        return $content;
    }
    //add_filter('the_content', 'melody_build_fix_shortcodes');
}

/**
 * The icons for tinymce column.
 *
 * @since    1.0.0
 * @var      string   $imgurl The url for icons.
 */
function melody_build_add_mixers($plugin_array){
$imgurl = plugin_dir_url( __FILE__ ) . 'imgs/';
$plugin_array['column']       = $imgurl . 'mxmtic-1.png';
$plugin_array['columns']      = $imgurl . 'mxmtic-2.png';
$plugin_array['columnsThree'] = $imgurl . 'mxmtic-3.png';
$plugin_array['columnsFour']  = $imgurl . 'mxmtic-4.png';

	    return $plugin_array;

}

/**
 * The tinymce columns adder
 *
 * @since    1.0.0
 * @var      string  $buttons  The buttons to control icons selector.
 */
function melody_build_render_mixers($buttons){
    array_push( $buttons, 'column', 'columns', 'columnsThree', 'columnsFour' );
	    return $buttons;

}
