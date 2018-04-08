<?php

namespace designr;

class ImageCta extends \AcidWidget{
    
    function __construct() {
        
        $args = array(
            'id'            => 'designr_image_cta', // 1. Edit the widget ID
            'title'         => 'Designr: Image CTA', // 2. Edit the Widget Title
            'description'   => 'Output a single image, with some text in various ways', // 3. Edit the widget description
            'output_file'   => get_plugin_path( 'inc/widgets/ImageCta/image_cta_view.php' ), // 4. Set the location of the frontend widget display
            'widget_title'  => false, // 5. Set to True if you want the built in Widget Title to be used
        );
        
        /**
        * Edit this array to specify your widget form fields
        * Make sure to set the ID to something easier for you to remember, 
        * Also set the type, which determines the datatype and form field type
        * 
        * This list is a sample of all possible options
        */
       $fields = array (
           
           array(
               'label'  => 'Content',
               'id'     => '',
               'default'=> '',
               'type'   => 'section',
           ),
           
           array(
               'label'  => 'Image',
               'id'     => 'cta_image',
               'default'=> '',
               'type'   => 'media'
           ),
           
           array (
               'label' => 'Title',
               'id' => 'cta_title',
               'default' => '',
               'type' => 'text',
           ),
           array (
               'label' => 'Details',
               'id' => 'cta_details',
               'default' => '',
               'type' => 'textarea',
           ),
           
           array (
               'label' => 'Button Text',
               'id' => 'cta_btn_text',
               'default' => '',
               'type' => 'text',
           ),
           
           array (
               'label' => 'Button URL',
               'id' => 'cta_btn_url',
               'default' => '',
               'type' => 'url',
           ),
           
           array(
               'label'  => 'Appearance',
               'id'     => '',
               'default'=> '',
               'type'   => 'section',
           ),
           
           array(
               'label'  => 'Image Location',
               'id'     => 'cta_image_location',
               'default'=> '',
               'type'   => 'select',
               'options'=> array(
                   'left'       => 'Left',
                   'right'      => 'Right',
                   'stacked'    => 'Stacked',
               )
           ),

           array(
               'label'  => 'Text align',
               'id'     => 'cta_text_align',
               'default'=> '',
               'type'   => 'select',
               'options'=> array(
                   'left'       => 'Left',
                   'right'      => 'Right',
                   'centered'   => 'Centered',
               )
           ),
           
           array(
               'label'  => 'Rounded image?',
               'id'     => 'cta_image_rounded',
               'default'=> '',
               'type'   => 'checkbox'
           ),
      
           array (
               'label' => 'Background color',
               'id' => 'cta_bg_color',
               'default' => '#ffffff',
               'type' => 'colorpicker',
           ),
           array (
               'label' => 'Text color',
               'id' => 'cta_text_color',
               'default' => '#333333',
               'type' => 'colorpicker',
           ),
           array(
               'label'  => 'Vertical Padding',
               'id'     => 'cta_padding',
               'default'=> '30',
               'type'   => 'number'
           ),
           
       );
        
        parent::__construct( $args, $fields );
        
    }
    
    
}

function register_image_cta() {
    register_widget( 'designr\ImageCta' );
}

add_action( 'widgets_init', 'designr\register_image_cta' );