<?php

namespace designr;

// Create page for Widget settings
add_action('admin_menu', 'designr\visibility_menu_page');

function visibility_menu_page() {
    add_theme_page( 
            __( 'Widget Visibility', 'designr' ), 
            __( 'Widget Visibility', 'designr' ), 
            'edit_theme_options', 
            'designr-widget-visibility', 
            'designr\widget_visibility' );
}

function widget_visibility() {
    include_once get_plugin_path( 'admin/pages/widget-visibility.php' );
}


// Jumbotron
require_once get_plugin_path() . 'inc/widgets/Slider/Slider_Widget.php';
