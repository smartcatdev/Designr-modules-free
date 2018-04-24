<?php

namespace buildr;

// create a metabox on page
add_action( 'add_meta_boxes', 'buildr\page_metabox' );


function page_metabox() {
    add_meta_box( 
            'buildr-page-metabox', 
            __( 'Page Widgets', 'buildr' ), 
            'buildr\render_post_metabox', 
            'page',
            'side',
            'high' );
    
}

function render_post_metabox() {
    
    global $post;
    
    $query['autofocus[panel]'] = 'widgets';
    $query['url'] = get_the_permalink( $post->ID );
    $panel_link = add_query_arg( $query, admin_url( 'customize.php' ) );
    ?>

    <p><?php _e( 'Add widgets to this page using Buildr\'s Drag & Drop widgets.', 'buildr' ) ?></p>
    
    <a class="button button-primary" 
       style="width: 100%;line-height: 40px;height: 40px;text-align: center;font-size: 18px;" 
       href="<?php echo esc_url( $panel_link ); ?>"><?php _e( 'Buildr Widgets', 'buildr' ); ?></a>
    
    <p><?php _e( 'Page templates share their widgets. To create unique widgets for each page, select a new page '
            . 'template from the <strong>Template</strong> dropdown, under <strong>Page Attributes</strong>') ?></p>
    
    <p>
        <a href="<?php echo esc_url( admin_url( 'themes.php?page=buildr-theme-info#page-templates' ) ); ?>"><?php _e( 'Click here ', 'buildr' ) ?></a>
        <?php _e( 'to read the docs on page templates', 'buildr' ); ?>
    </p>
    
    <?php
}
