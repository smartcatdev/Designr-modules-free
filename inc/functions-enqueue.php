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
 * Load Admin JS & CSS for the back-end
 * 
 * @since 1.0.0
 * @return void
 */
function enqueue_admin_styles() {
    
    // Styles
    wp_enqueue_style( 'designr-customize', get_plugin_url() . 'assets/admin/customizer.css', null, DESIGNR_MODULES_VERSION );
    
    // Scripts
    wp_enqueue_media();
    wp_enqueue_script( 'wp-media-uploader', get_plugin_url() . 'assets/lib/wp-media-uploader/wp_media_uploader.js', array( 'jquery' ), DESIGNR_MODULES_VERSION );
    wp_enqueue_script( 'designr-admin', get_plugin_url() . 'assets/admin/admin.js', array( 'jquery' ), DESIGNR_MODULES_VERSION );
    
}
add_action( 'customize_controls_enqueue_scripts', 'designr\enqueue_admin_styles' );
add_action( 'admin_print_styles-post-new.php', 'designr\enqueue_admin_styles' );
add_action( 'admin_print_styles-post.php', 'designr\enqueue_admin_styles' );
add_action( 'admin_print_styles-widgets.php', 'designr\enqueue_admin_styles' );
