<?php

namespace buildr;


add_action('admin_bar_menu', 'buildr\toolbar_link', 999);

function attr( $attr ) {
    echo esc_attr( $attr );
}

function url( $url ) {
    echo esc_url( $url );
}

function html( $html ) {
    echo html_entity_decode( $html );
}

function button( $text, $url, $class = 'primary', $size = 'medium' ) { 
    
    if( $text ) : ?> 
        
        <a href="<?php url( $url ) ?>" class="button <?php attr( $class ) ?> <?php attr( $size ) ?>">
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

function toolbar_link( $wp_admin_bar ) {
    
    if( is_admin() ) {
        return;
    }
    
    $post = get_queried_object();
    
    if( ! $post->ID ) {
        return;
    }
    
    $query['autofocus[panel]'] = 'widgets';
    $query['url'] = get_the_permalink( $post->ID );
    $panel_link = add_query_arg( $query, admin_url( 'customize.php' ) );
    
    $args = array(
        'id'        =>  'buildr-widgets',
        'title'     =>  __( 'Edit Buildr Widgets', 'buildr' ), 
        'href'      => $panel_link, 
        'meta'      => array(
            'class' => 'buildr-toolbar-link', 
            'title' => __( 'Buildr Page Widgets', 'buildr' ),
        )
    );
    
    $wp_admin_bar->add_node( $args );
}
