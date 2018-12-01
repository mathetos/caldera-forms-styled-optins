<?php
/**
 * Default Opt-in Template
 */

?>

<header>
    <div class="description">
        <h3><?php echo $atts['header']; ?></h3>
        <p><?php echo $atts['description']; ?></p>
    </div>
    <img src="<?php echo WPBR_FUNCTIONS_URL . 'assets/images/man-holding-email.png'?>">
</header>

<?php echo do_shortcode('[caldera_form id="' . $atts['form_id'] . '"]');
