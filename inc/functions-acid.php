<?php 

include_once get_stylesheet_directory() . '/inc/lib/Acid/acid.php';
$acid = acid_instance();

$data = array (
    
    'panels' => array (
        
        'appearance' => array ( // Appearance Panel
            
            'title' => __( 'Appearance', 'designr' ),
            'description' => __( 'Customize your site colors, fonts, and more', 'designr' ),
            'sections' => array (
                
                // Colors Section
                'colours' => array ( 
                    
                    'title' => __( 'Colors', 'designr' ),
                    'description' => __( 'Customize the colors in use on your site', 'designr' ),
                    'options' => array (
                        'skin_theme' => array(
                            'type' => 'radio',
                            'label' => __( 'Theme Color', 'designr' ),
                            'default' => 'blue',
                            'choices' => array(
                                'blue'      => __( 'Blue', 'designr' ),
                                'green'     => __( 'Green', 'designr' ),
                                'red'       => __( 'Red', 'designr' ),
                            ),
                        ),
                    ),
                    
                ), // End of Color Section
                
                // Colors Section
                'fonts' => array ( 
                    
                    'title' => __( 'Fonts', 'designr' ),
                    'description' => __( 'Customize the fonts in use on your site', 'designr' ),
                    'options' => array (
                        'skin_theme' => array(
                            'type' => 'select',
                            'label' => __( 'Primary Font (Headings & Titles)', 'designr' ),
                            'default' => 'Montserrat, sans-serif',
                            'choices' => designr_fonts(),
                        ),
                    ),
                    
                ), // End of Color Section
                
            ), // End of Sections
            
        ), // End of Panel
        
    ), // End of Panels
    
);

$acid->config( $data );