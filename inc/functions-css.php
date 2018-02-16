<?php

namespace designr;

/**
 * Enqueue scripts and styles.
 */
function wp_head_styles() { ?>
    
    <style type="text/css">

        
        
    </style>
    
<?php
}
add_action( 'wp_head', '\designr\wp_head_styles' );