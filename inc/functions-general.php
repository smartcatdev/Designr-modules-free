<?php

namespace buildr;

function attr( $attr ) {
    echo esc_attr( $attr );
}

function url( $url ) {
    echo esc_url( $url );
}

function html( $html ) {
    echo html_entity_decode( $html );
}

function button( $text, $url, $class = 'primary', $size = 'medium', $target = 'same' ) { 
    
    if( $text ) : ?> 
        
        <a href="<?php url( $url ) ?>" class="button <?php attr( $class ) ?> <?php attr( $size ) ?>" <?php echo $target == 'new' ? 'target="_BLANK"' : ''; ?>>
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

function button_sizes() {
    return array(
        'small'       => 'Small',
        'medium'     => 'Medium',
        'large'        => 'Large'
    );
}

function button_targets() {
    return array(
        'same'      => 'Open in Same Tab',
        'new'       => 'Open in New',
    );
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
