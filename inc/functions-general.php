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

function toolbar_link( $wp_admin_bar ) {
    
    if( is_admin() ) {
        return;
    }
    
    $post = get_queried_object();
    
    if( ! isset( $post->ID ) ) {
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

function modify_user_contact_methods( $user_contact ) {

    // Add additional user meta contact fields
    $user_contact['job_title']      = __( 'Job Title', 'buildr' );
    $user_contact['location']       = __( 'Location', 'buildr' );
    $user_contact['facebook']       = __( 'Facebook', 'buildr' );
    $user_contact['twitter']        = __( 'Twitter', 'buildr' );
    $user_contact['linkedin']       = __( 'LinkedIn', 'buildr' );
    $user_contact['pinterest']      = __( 'Pinterest', 'buildr' );
    $user_contact['instagram']      = __( 'Instagram', 'buildr' );
    $user_contact['author_banner']  = __( 'Author Banner Image URL', 'buildr' );

    return $user_contact;
    
}
add_filter( 'user_contactmethods', 'buildr\modify_user_contact_methods' );
