<?php 
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://tradesouthwest.com
 * @since      1.0.0
 *
 * @package    Melody_Build
 * @subpackage Melody_Build/admin/partials
 */
?>

<div id="mxmtWrap" class="wrap">
    <h1><span class="dashicons dashicons-admin-settings">
    </span>
    <?php echo esc_html__( ' Melody Build', 'melody-build' ); ?></h1>

    <form action="options.php" method="post">
    <?php 
    settings_fields( 'melody_build_options' );
    do_settings_sections( 'melody-build-options' );
    ?>
    <?php submit_button(); ?>

    </form>

    <div class="melody-build-instructions-admin">
        <h2><?php esc_html_e( 'Page Sections Builder Information', 'melody-build' ); ?></h2>
       
    </div>
</div>