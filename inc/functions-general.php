<?php

namespace designr;

function attr( $attr ) {
    echo esc_attr( $attr );
}

function url( $url ) {
    echo esc_url( $url );
}

function html( $html ) {
    echo html_entity_decode( $html );
}

function button( $text, $url, $class = 'button' ) { 
    
    if( $text ) : ?> 
        
        <a href="<?php url( $url ) ?>" class="button <?php attr( $class ) ?>">
            <?php attr( $text ); ?>
        </a>

        
    <?php endif;
    
}

function alignment_options() {
    return array(
        'left'      => 'Left',
        'right'     => 'Right',
        'center'    => 'Center',
    );
}

function button_options() {
    return array(
        'primary'       => 'Primary',
        'secondary'     => 'Secondary',
        'hollow'        => 'Hollow'
    );
}

function widgets() {
    
}

function render_template( $file, $args, $once = false ) {
    
    $file = get_plugin_path( 'inc/widgets/' . $file );
    
    if( file_exists( $file ) ) {
        
        extract( $args );
        
        
        if( $once ) {
            include_once $file;
        }else{
            include $file;
        }
        
    }
    
}
