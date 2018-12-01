<?php
/**
 * Ouibounce Opt-in Template
 */

wp_enqueue_script('mccfso_ouibounce_js');
add_action( 'wp_footer', 'mccfso_ouibounce_inline_script' );
?>
    <div class="optin-modal">
        <header>
            <div class="description">
                <i alt="Close Modal" class="optin-exit">x</i>
                <h3><?php echo $atts['header']; ?></h3>
                <p><?php echo $atts['description']; ?></p>
            </div>
            <img src="<?php echo WPBR_FUNCTIONS_URL . 'assets/images/man-holding-email.png'?>">
        </header>

        <?php echo do_shortcode('[caldera_form id="' . $atts['form_id'] . '"]'); ?>
    </div>

<?php

function mccfso_ouibounce_inline_script() {
    ?>
    <script>
        jQuery(document).ready(function( $ ) {
            "use strict";

            ouibounce($('#optin-ouibounce')[0], {
                // Uncomment the line below if you want the modal to appear every time
                // More options here: https://github.com/carlsednaoui/ouibounce
                aggressive: true,
                sitewide: true,
            });

            $('body').on('click', function(event) {
                event.preventDefault();
                $('#optin-ouibounce').hide();
            });

            $('.optin-exit').on('click', function(event) {
                event.preventDefault();
                $('#optin-ouibounce').hide();
            });
        });
    </script>

    <?php
}