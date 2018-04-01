<?php
namespace designr;


function my_widget_filter( $content ) {
    // manipulate $content as you see fit
    error_log( 23 );
    echo $content;
    return $content;
}

add_filter( 'widget_title', 'designr\my_widget_filter', 99 );