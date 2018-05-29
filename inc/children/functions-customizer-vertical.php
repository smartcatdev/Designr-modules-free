<?php

$acid = acid_instance( buildr\get_plugin_url( '/inc/lib/' ) );

$data = array (

    'panels' => array (
    
        // Panel: Navbar -------------------------------------------------------
        'panel_navbar' => array (

            'title'         => __( 'Navbar', 'buildr' ),
            'desciption'    => __( 'Customize the primary navbar on your site, including control over appearance & behaviour', 'buildr' ),
            'sections'      => array (

                // Section : Navbar General Settings ---------------------------
                'section_nav_general' => array (

                    'title' => __( 'General Settings', 'buildr' ),
                    'options' => array (

                        BUILDR_OPTIONS::NAVBAR_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Navbar Style', 'buildr' ),
                            'default'       => BUILDR_DEFAULTS::NAVBAR_STYLE,
                            'choices'   => array (
                                'slim_split'    => __( 'Slim - Centered & Split', 'buildr' ),
                                'slim_left'     => __( 'Slim - Left Aligned', 'buildr' ),
                                'banner'        => __( 'Banner', 'buildr' ),
                                'vertical'      => __( 'Vertical', 'buildr' ),
                            )
                        ),
                        
                    )

                ),

            ), // End of Navbar Sections

        ), // End of Navbar Panel

    ), // End of Panels

);

$acid->config( $data );
