<?php

namespace buildr;

add_action( 'wp_ajax_reset_content', '\buildr\reset_content' );

function reset_content() {
    
    if( ! wp_verify_nonce( $_POST['nonce'], 'buildr_reset_content' ) ) {
        die('un-authorized');
    }
    
    global $wpdb;
    
    $wpdb->query( 'delete from ' . $wpdb->prefix . 'posts where post_type in ("post","page","buildr_faq","buildr_service","buildr_testimonial","buildr_event")');
    
    update_option( 'sidebars_widgets','' );
    
    exit();
}
