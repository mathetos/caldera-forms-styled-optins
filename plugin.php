<?php
/**
 * Plugin Name: Caldera Forms Styled Optins
 * Description: A functionality plugin for outputting styled optins powered by Caledera Forms.
 * Version:     1.0.0
 * Author:      Matt Cromwell
 * Author URI:  https://www.mattcromwell.com
 * License:     GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: mccfso
 * Domain Path: /languages
 */

defined( 'MCCFSO_VERSION' ) || define( 'MCCFSO_VERSION', '1.0.0' );
defined( 'MCCFSO_URL' ) || define( 'MCCFSO_URL', plugin_dir_url( __FILE__ ) );
defined('MCCFSO_FILE') || define( 'MCCFSO_FILE', __FILE__ );
defined('MCCFSO_DIR') || define( 'MCCFSO_DIR', plugin_dir_path( __FILE__ ) );

add_action( 'wp_enqueue_scripts', 'register_mccfso_styles' );

/**
 * Register style sheet.
 */
function register_mccfso_styles() {
    wp_register_style('mccfso-shortcodes-styles', MCCFSO_URL . 'assets/mccfso-shortcodes-styles.css', array(), MCCFSO_VERSION, 'all');

    wp_register_script('mccfso_ouibounce_js', 'https://cdnjs.cloudflare.com/ajax/libs/ouibounce/0.0.12/ouibounce.min.js', array('jquery'), '0.0.12', 'false');
}

// Optin Subscriber Form to insert in Blog Content
add_shortcode('optin_form', 'mccfso_form_function');

function mccfso_form_function( $atts ) {

    $atts = shortcode_atts(array(
        'form_id' => '',
        'header' => 'Subscribe Now',
        'description' => 'Don’t let negative reviews get you down, Get our tips and tricks directly in your mailbox and stay ahead of the curve.',
        'style' => 'default'
    ), $atts, 'optin_form');

    $template = $atts['style'];

    if ( !empty($atts['form_id']) ) :

        wp_enqueue_style( 'mccfso-shortcodes-styles' );

        ob_start(); ?>

        <div class="optin_form <?php echo $atts['style']; ?>" id="optin-<?php echo $atts['style']; ?>">

            <?php
            switch($template) {
                case 'ouibounce' :
                    include( MCCFSO_DIR . 'templates/ouibounce.php');
                    break;
                default :
                    include( MCCFSO_DIR . 'templates/default.php' );
                    break;
            }
            ?>
        </div>

    <?php

    endif;

    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;

}