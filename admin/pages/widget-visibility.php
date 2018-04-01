<?php

namespace designr;

$sidebars = array(
    'sidebar-post-above',
    'sidebar-post-below',
    'sidebar-page-above',
    'sidebar-page-below',
    'sidebar-shop-above',
    'sidebar-shop-below',
    'sidebar-footer'
);

$sidebars_widgets = get_option( 'sidebars_widgets' );
unset( $sidebars_widgets['wp_inactive_widgets']);

foreach( $sidebars as $sidebar ) {
    
    echo '<h3>' . $sidebar . '</h3>';
    
    if( is_active_sidebar( $sidebar ) ) {
        var_dump( $sidebars_widgets[$sidebar] );        
    }
    

}



