<?php
/**
 * Plugin Name: Designr Widgets
 * Author: Smartcat
 * Description: WordPress Widgets for the Designer Theme
 * Version: 1.0.0
 * Author: Smartcat
 * Author URI: https://smartcatdesign.net/
 * License: GPL V2
 * Text Domain: designr
 * Domain Path: /languages 
 *
 * @package designr
 * @since 1.0.0
 */
namespace designr;

/**
 * Exit if accessed directly for security
 */
if( !defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Constant Declarations
 */
const DESIGNR_MODULES_VERSION = '1.0.0';

/**
 * @since 1.0.0
 * @param string $path
 * @return string
 */
function get_plugin_path( $path = '' ) {
    return plugin_dir_path( __FILE__ ) . $path;
}

/**
 * @since 1.0.0
 * @param string $url
 * @return string
 */
function get_plugin_url( $url = '' ) {
    return plugin_dir_url( __FILE__ ) . $url;
}

if ( function_exists( 'wp_get_theme' ) ) {
    
    $active_theme = wp_get_theme();
    
    $active_theme_name = strtolower( $active_theme->get( 'Name' ) );
    $parent_theme_name = strtolower( $active_theme->get( 'Template' ) );
    
} else {
    
    $active_theme_name = strtolower( get_option( 'current_theme') );
    $parent_theme_name = strtolower( get_option( 'current_theme') );
    
}

if( $active_theme_name == 'designr' || $parent_theme_name == 'designr' ) {
    add_action( 'after_setup_theme', 'designr\designr_modules_init' );
}

/**
 * @since 1.0.0
 * @return null
 */
function designr_modules_init() {
    
   /**
    * Load Necessary Includes
    */
   require get_plugin_path() . 'inc/functions-general.php';
   require get_plugin_path() . 'inc/functions-widgets.php';
   require get_plugin_path() . 'inc/functions-enqueue.php';
   require get_plugin_path() . 'inc/functions-css.php';
    
}
