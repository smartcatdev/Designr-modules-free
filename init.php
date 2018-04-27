<?php
/**
 * Plugin Name: Buildr Features
 * Author: Smartcat
 * Description: Advanced Widgets for Buildr theme.
 * Version: 1.0.1
 * Author: Smartcat
 * Author URI: https://smartcatdesign.net/
 * License: GPL V2
 * Text Domain: buildr
 * Domain Path: /languages 
 *
 * @package buildr
 * @since 1.0.0
 */
namespace buildr;

/**
 * Exit if accessed directly for security
 */
if( !defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Constant Declarations
 */
const BUILDR_MODULES_VERSION = '1.0.0';

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

if( $active_theme_name == 'buildr' || $parent_theme_name == 'buildr' ) {
   
    add_action( 'after_setup_theme', 'buildr\after_setup_theme' );
    add_action( 'plugins_loaded', 'buildr\plugins_loaded' );
    
}

/**
 * @since 1.0.0
 * @return null
 */
function after_setup_theme() {
    
   /**
    * Load Necessary Includes
    */
    require get_plugin_path() . 'inc/functions-fontawesome.php';
    require get_plugin_path() . 'inc/functions-general.php';
    require get_plugin_path() . 'inc/functions-metabox.php';
    require get_plugin_path() . 'inc/functions-customizer.php';
    require get_plugin_path() . 'inc/functions-widgets.php';
    require get_plugin_path() . 'inc/functions-enqueue.php';
    require get_plugin_path() . 'inc/functions-css.php';
    require get_plugin_path() . 'inc/functions-tgmpa.php';
    
    do_action( 'buildr_after_setup_theme' );
    
}

function plugins_loaded() {
    
    require get_plugin_path() . 'inc/functions-import.php';    
    do_action( 'buildr_plugins_loaded' );
    
}

function init() {
    return;
}