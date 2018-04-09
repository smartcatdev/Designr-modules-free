<?php

namespace designr;

add_filter( 'pt-ocdi/import_files', 'designr\import_options' );

add_action( 'pt-ocdi/after_import', 'designr\after_import_setup' );

add_filter( 'pt-ocdi/plugin_page_setup', 'designr\import_page_title' );

add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function import_options() {
    
    return apply_filters( 'designr_presets', array (
        array (
            'import_file_name' => 'Demo Import 1',
            'categories' => array ( 'Free' ),
            'import_file_url' => get_plugin_url( 'presets/preset1/content.xml' ),
            'import_widget_file_url' => get_plugin_url( 'presets/preset1/widgets' ),
            'import_customizer_file_url' => get_plugin_url( 'presets/preset1/customizer' ),
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

function after_import_setup( $selected_import ) {
	// Assign menus to their locations.
//	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
//
//	set_theme_mod( 'nav_menu_locations', array(
//			'main-menu' => $main_menu->term_id,
//		)
//	);
//
//	// Assign front page and posts page (blog page).
//	$front_page_id = get_page_by_title( 'Home' );
//	$blog_page_id  = get_page_by_title( 'Blog' );
//
//	update_option( 'show_on_front', 'page' );
//	update_option( 'page_on_front', $front_page_id->ID );
//	update_option( 'page_for_posts', $blog_page_id->ID );
    
//	echo "This will be displayed on all after imports!";
//
//	if ( 'Demo Import 1' === $selected_import['import_file_name'] ) {
//		echo "This will be displayed only on after import if user selects Demo Import 1";
//
//		// Set logo in customizer
//		set_theme_mod( 'logo_img', get_template_directory_uri() . '/assets/images/logo1.png' );
//	}
//	elseif ( 'Demo Import 2' === $selected_import['import_file_name'] ) {
//		echo "This will be displayed only on after import if user selects Demo Import 2";
//
//		// Set logo in customizer
//		set_theme_mod( 'logo_img', get_template_directory_uri() . '/assets/images/logo2.png' );
//	}

}

function import_page_title( $title ) {
    
    $title['menu_title'] = esc_html__( 'Theme Presets' , 'designr' );
    
    return $title;
}
