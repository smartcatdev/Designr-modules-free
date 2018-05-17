<?php

namespace buildr;

add_filter( 'pt-ocdi/import_files', 'buildr\import_files' );

add_action( 'pt-ocdi/after_import', 'buildr\after_import_setup' );

add_filter( 'pt-ocdi/plugin_page_setup', 'buildr\import_page_title' );

add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function import_files() {
    
    return apply_filters( 'buildr_presets', array (
        array (
            'import_file_name' => 'Buildr Product',
            'categories' => array ( 'Pro' ),
            'import_file_url' => get_plugin_url( 'presets/preset4/content.xml' ),
            'import_widget_file_url' => get_plugin_url( 'presets/preset4/widgets.wie' ),
            'import_customizer_file_url' => get_plugin_url( 'presets/preset4/customizer.dat' ),
            'import_preview_image_url' => get_plugin_url( 'presets/preset4/screenshot.jpg' ),
            'import_notice' => __( 'After you import this demo, you will have to setup the slider separately.', 'buildr' ),
            'preview_url' => 'http://buildr.pro.smartcatthemes.com/',
        ),
        array (
            'import_file_name' => 'Buildr Agency',
            'categories' => array ( 'Pro' ),
            'import_file_url' => get_plugin_url( 'presets/preset5/content.xml' ),
            'import_widget_file_url' => get_plugin_url( 'presets/preset5/widgets.wie' ),
            'import_customizer_file_url' => get_plugin_url( 'presets/preset5/customizer.dat' ),
            'import_preview_image_url' => get_plugin_url( 'presets/preset5/screenshot.jpg' ),
            'import_notice' => __( 'After you import this demo, you will have to setup the slider separately.', 'buildr' ),
            'preview_url' => 'http://buildr.pro1.smartcatthemes.com/',
        ),
        array (
            'import_file_name' => 'Preset 1',
            'categories' => array ( 'Free' ),
            'import_file_url' => get_plugin_url( 'presets/preset1/content.xml' ),
            'import_widget_file_url' => get_plugin_url( 'presets/preset1/widgets.wie' ),
            'import_customizer_file_url' => get_plugin_url( 'presets/preset1/customizer.dat' ),
            'import_preview_image_url' => get_plugin_url( 'presets/preset1/screenshot.jpg' ),
            'import_notice' => __( 'After you import this demo, you will have to setup the slider separately.', 'buildr' ),
            'preview_url' => 'http://buildr.preset1.smartcatthemes.com/',
        ),
        array (
            'import_file_name' => 'Preset 2',
            'categories' => array ( 'Free' ),
            'import_file_url' => get_plugin_url( 'presets/preset2/content.xml' ),
            'import_widget_file_url' => get_plugin_url( 'presets/preset2/widgets.wie' ),
            'import_customizer_file_url' => get_plugin_url( 'presets/preset2/customizer.dat' ),
            'import_preview_image_url' => get_plugin_url( 'presets/preset2/screenshot.jpg' ),
            'import_notice' => __( 'After you import this demo, you will have to setup the slider separately.', 'buildr' ),
            'preview_url' => 'http://buildr.preset2.smartcatthemes.com/',
        ),
        array (
            'import_file_name' => 'Preset 3',
            'categories' => array ( 'Free' ),
            'import_file_url' => get_plugin_url( 'presets/preset3/content.xml' ),
            'import_widget_file_url' => get_plugin_url( 'presets/preset3/widgets.wie' ),
            'import_customizer_file_url' => get_plugin_url( 'presets/preset3/customizer.dat' ),
            'import_preview_image_url' => get_plugin_url( 'presets/preset3/screenshot.jpg' ),
            'import_notice' => __( 'After you import this demo, you will have to setup the slider separately.', 'buildr' ),
            'preview_url' => 'http://buildr.preset3.smartcatthemes.com/',
        ),

    ));
    
}
function get_page_url( $title ) {

    $page = get_page_by_title( $title );
    
    return get_the_permalink( $page->ID );
    
}


function after_import_setup( $selected_import ) {
    
    
    $menu1 = __( 'Buildr Demo Nav', 'buildr' );
    $menu_exists = wp_get_nav_menu_object( $menu1 );

    // If it doesn't exist, let's create it.
    if( !$menu_exists){

        $menu_id = wp_create_nav_menu($menu1);

            // Set up default menu items
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' =>  __( 'Home', 'buildr' ),
            'menu-item-classes' => 'home',
            'menu-item-url' => get_page_url( 'Home' ), 
            'menu-item-status' => 'publish'
        ));

        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' =>  __('Blog', 'buildr' ),
            'menu-item-url' => get_page_url( 'Blog' ), 
            'menu-item-status' => 'publish'
        ));
        
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' =>  __('Buildr Pro'),
            'menu-item-url' => 'https://smartcatdesign.net', 
            'menu-item-status' => 'publish'
        ));

    }
    
    $menu2 = __( 'Buildr Demo Nav 2', 'buildr' );
    $menu_exists = wp_get_nav_menu_object( $menu2 );

    // If it doesn't exist, let's create it.
    if( !$menu_exists){

        $menu_id = wp_create_nav_menu($menu2);
        
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' =>  __('Default Page', 'buildr' ),
            'menu-item-url' => get_page_url( 'Default Page' ), 
            'menu-item-status' => 'publish'
        ));
        
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' =>  __('Buildr Widgets', 'buildr' ),
            'menu-item-url' => get_page_url( 'Buildr Widgets' ), 
            'menu-item-status' => 'publish'
        ));
        
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' =>  __('Buildr Pro'),
            'menu-item-url' => 'https://smartcatdesign.net', 
            'menu-item-status' => 'publish'
        ));

    }

    
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', $menu1, 'nav_menu' );
    $secondary_menu = get_term_by( 'name', $menu2, 'nav_menu' );
    
    set_theme_mod( 'nav_menu_locations', array(
        'primary-menu'              => $main_menu->term_id,
        'split-primary-left'        => $main_menu->term_id,
        'split-primary-right'       => $secondary_menu->term_id,
        'mobile-menu'               => $main_menu->term_id,
        'custom-header'             => $secondary_menu->term_id,
    ));

//	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );
//
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
    
//	echo "This will be displayed on all after imports!";
//
	if ( 'Demo Import 1' === $selected_import['import_file_name'] ) {
            
            // Set logo in customizer
//            set_theme_mod( 'logo_img', get_template_directory_uri() . '/assets/images/logo1.png' );
	}
//	elseif ( 'Demo Import 2' === $selected_import['import_file_name'] ) {
//		echo "This will be displayed only on after import if user selects Demo Import 2";
//
//		// Set logo in customizer
//		set_theme_mod( 'logo_img', get_template_directory_uri() . '/assets/images/logo2.png' );
//	}

}

function import_page_title( $title ) {
    
    $title['menu_title'] = esc_html__( 'Theme Presets' , 'buildr' );
    
    return $title;
}
