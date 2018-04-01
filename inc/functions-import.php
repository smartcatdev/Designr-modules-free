<?php

namespace designr;

add_filter( 'pt-ocdi/import_files', 'designr\import_options' );

add_filter( 'pt-ocdi/plugin_page_setup', 'designr\import_page_title' );

function import_options() {
    
    return apply_filters( 'designr_presets', array (
        array (
            'import_file_name' => 'Demo Import 1',
            'categories' => array ( 'Free' ),
            'import_file_url' => 'http://www.your_domain.com/ocdi/demo-content.xml',
            'import_widget_file_url' => 'http://www.your_domain.com/ocdi/widgets.json',
            'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer.dat',
            'import_preview_image_url' => 'https://smartcatdesign.net/wp-content/uploads/edd/Lebanon.jpg',
            'import_notice' => __( 'After you import this demo, you will have to setup the slider separately.', 'your-textdomain' ),
            'preview_url' => 'http://www.your_domain.com/my-demo-1',
        ),
        array (
            'import_file_name' => 'Demo Import 2',
            'categories' => array ( 'Free' ),
            'import_file_url' => 'http://www.your_domain.com/ocdi/demo-content2.xml',
            'import_widget_file_url' => 'http://www.your_domain.com/ocdi/widgets2.json',
            'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer2.dat',
            'import_preview_image_url' => 'https://smartcatdesign.net/wp-content/uploads/edd/Lebanon.jpg',
            'import_notice' => __( 'You need to have the Pro version to install this', 'your-textdomain' ),
            'preview_url' => 'http://www.your_domain.com/my-demo-2',
        ),
    ));
    
}


function import_page_title( $title ) {
    
    $title['menu_title'] = esc_html__( 'Theme Presets' , 'designr' );
    
    return $title;
}
