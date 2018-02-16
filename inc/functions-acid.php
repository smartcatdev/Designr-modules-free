<?php 

include_once get_stylesheet_directory() . '/inc/lib/Acid/acid.php';
$acid = acid_instance();

$data = array (
    
    'panels' => array (
        
        'appearance' => array ( // Appearance Panel
            
            'title' => __( 'Appearance', 'designr' ),
            'description' => __( 'Customize your site\'s colors, fonts, and more', 'designr' ),
            'sections' => array (
                
                'section-1' => array (
                    'title' => 'default label',
                    'description' => 'default description',
                    'options' => array (
                        'text-2' => array (
                            'type' => 'url',
                            'label' => 'website',
                            'default' => 'https://smartcatdesign.net',
                        ),
                        'text-3' => array (
                            'type' => 'textarea',
                            'label' => '',
                            'default' => 'Default value',
                        ),
                        'text-4' => array (
                            'type' => 'number',
                            'label' => '',
                            'default' => 15,
                        ),
                        'select-1' => array(
                            'type' => 'date',
                            'label' => '',
                            'default' => 'Default value',                
                        ),
                        'select-2' => array(
                            'type' => 'checkbox',
                            'label' => 'do you want things?',
                            'default' => true,                
                        ),
                        'select-3' => array(
                            'type' => 'radio',
                            'label' => 'do you want things?',
                            'default' => 'red',
                            'choices'   => array(
                                'red'   => __( 'Red', 'themeslug' ),
                                'white' => __( 'white', 'themeslug' ),
                                'orange' => __( 'Orange', 'themeslug' ),
                            ),
                        ),
                        'select-4' => array(
                            'type' => 'select',
                            'label' => 'Select dropdown',
                            'default' => 'white',
                            'choices'   => array(
                                'red'   => __( 'Red', 'themeslug' ),
                                'white' => __( 'white', 'themeslug' ),
                                'orange' => __( 'Orange', 'themeslug' ),
                            ),
                        ),
                        'select-5' => array(
                            'type' => 'color',
                            'label' => 'text color',
                            'default' => '#333',
                        ),
                        'select-6' => array(
                            'type' => 'image',
                            'label' => 'bg image',
                            'default' => 'this',
                        ),
                        'select-7' => array(
                            'type' => 'dropdown-pages',
                            'label' => 'bg image',
                            'default' => 1,
                        ),
                    ),
                ), // End of Section
                
            ), // End of Sections
            
        ), // End of Panel
        
    ), // End of Panels
    
);

$acid->config( $data );