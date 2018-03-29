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
    wp_enqueue_style( 'slick', get_plugin_url() . 'assets/lib/slick/slick.css', null, DESIGNR_MODULES_VERSION );
    
    // Scripts
    wp_enqueue_script( 'slick', get_plugin_url() . 'assets/lib/slick/slick.min.js', array( 'jquery' ), DESIGNR_MODULES_VERSION );
    
}
add_action( 'wp_enqueue_scripts', 'designr\enqueue_plugin_styles_scripts' );

/**
 * Load Admin CSS & JS for the back-end
 * 
 * @since 1.0.0
 * @return void
 */
function enqueue_admin_plugin_styles_scripts() {
    
    // Styles
    wp_enqueue_style( 'designr-customize', get_plugin_url() . 'assets/admin/customizer.css', null, DESIGNR_MODULES_VERSION );
    
}
add_action( 'customize_controls_enqueue_scripts', 'designr\enqueue_admin_plugin_styles_scripts' );
add_action( 'admin_print_styles-post-new.php', 'designr\enqueue_admin_plugin_styles_scripts' );
add_action( 'admin_print_styles-post.php', 'designr\enqueue_admin_plugin_styles_scripts' );
add_action( 'admin_print_styles-widgets.php', 'designr\enqueue_admin_plugin_styles_scripts' );
