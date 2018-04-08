<?php

namespace designr;

class Heading extends \AcidWidget{
    
    function __construct() {
        
        $args = array(
            'id'            => 'designr_heading', // 1. Edit the widget ID
            'title'         => 'Designr: Heading', // 2. Edit the Widget Title
            'description'   => 'A widget to add a heading', // 3. Edit the widget description
            'output_file'   => get_plugin_path( 'inc/widgets/Heading/heading_view.php' ), // 4. Set the location of the frontend widget display
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
           
           array (
               'label' => 'Title',
               'id' => 'heading_title',
               'default' => '',
               'type' => 'text',
           ),
           array (
               'label' => 'Sub-title',
               'id' => 'heading_subtitle',
               'default' => '',
               'type' => 'textarea',
           ),
           
           array(
               'label'  => 'Appearance',
               'id'     => '',
               'default'=> '',
               'type'   => 'section',
           ),           
           array (
               'label' => 'Background color',
               'id' => 'heading_bg_color',
               'default' => '#ffffff',
               'type' => 'colorpicker',
           ),
           array(
               'label'  => 'Text align',
               'id'     => 'heading_text_align',
               'default'=> 'centered',
               'type'   => 'select',
               'options'=> array(
                   'left'       => 'Left',
                   'right'      => 'Right',
                   'centered'   => 'Centered',
               )
           ),
           array (
               'label' => 'Text color',
               'id' => 'heading_text_color',
               'default' => '#333333',
               'type' => 'colorpicker',
           ),
           array(
               'label'  => 'Vertical Padding',
               'id'     => 'heading_padding',
               'default'=> '30',
               'type'   => 'number'
           ),

       );
        
        parent::__construct( $args, $fields );
        
    }
    
    
}

function register_heading_widget() {
    register_widget( 'designr\Heading' );
}

add_action( 'widgets_init', 'designr\register_heading_widget' );