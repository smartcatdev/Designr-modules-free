<?php

namespace designr;

/**
 * Load CSS & JS for the front-end
 * 
 * @since 1.0.0
 * @return void
 */
function enqueue_plugin_styles_scripts() {
    
    // Styles
//    wp_enqueue_style( 'owlCarousel', get_plugin_url() . 'inc/assets/styles/owl.carousel.css', NULL, DESIGNR_MODULES_VERSION );
    
    // Scripts
//    wp_enqueue_script( 'scpbw-main-script', get_plugin_url() . 'inc/assets/scripts/script.js', array( 'jquery' ), DESIGNR_MODULES_VERSION );
    
}
add_action( 'wp_enqueue_scripts', 'designr\enqueue_plugin_styles_scripts' );