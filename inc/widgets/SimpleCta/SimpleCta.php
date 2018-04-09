<?php

namespace designr;

class SimpleCta extends \AcidWidget{
    
    function __construct() {
        
        $args = array(
            'id'            => 'designr_simple_cta', // 1. Edit the widget ID
            'title'         => 'Designr: Simple CTA', // 2. Edit the Widget Title
            'description'   => 'Creates a simple horizontal call to action with title, subtitle and button', // 3. Edit the widget description
            'output_file'   => get_plugin_path( 'inc/widgets/SimpleCta/simple_cta_view.php' ), // 4. Set the location of the frontend widget display
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
           'cta-content'   => array(
               'label'  => 'Content',
               'id'     => '',
               'default'=> '',
               'type'   => 'section',
           ),
           'cta_title' => array (
               'label' => 'Title',
               'id' => 'cta_title',
               'default' => '',
               'type' => 'text',
           ),
           'cta_subtitle'   => array (
               'label' => 'Sub-title',
               'id' => 'cta_subtitle',
               'default' => '',
               'type' => 'textarea',
           ),
           'cta_btn_text'   => array (
               'label' => 'Button Text',
               'id' => 'cta_btn_text',
               'default' => '',
               'type' => 'text',
           ),
           'cta_btn_url'    => array (
               'label' => 'Button URL',
               'id' => 'cta_btn_url',
               'default' => '',
               'type' => 'url',
           ),
           'cta-appearance'   => array(
               'label'  => 'Appearance',
               'id'     => '',
               'default'=> '',
               'type'   => 'section',
           ),
           'cta_layout' => array(
               'label'  => 'Layout',
               'id'     => 'cta_layout',
               'default'=> 'float',
               'type'   => 'select',
               'options'=> array(
                   'float'      => 'Float',
                   'stacked'    => 'Stack',
               )
           ),
           'cta_text_align' => array(
               'label'  => 'Text align',
               'id'     => 'cta_text_align',
               'default'=> 'center',
               'type'   => 'select',
               'options'=> alignment_options()
           ),
    
           'cta_btn_style'  => array(
               'label'  => 'Button style',
               'id'     => 'cta_btn_style',
               'default'=> 'primary',
               'type'   => 'select',
               'options'=> button_options()
           ),
           'cta_bg_color'   => array (
               'label' => 'Background color',
               'id' => 'cta_bg_color',
               'default' => '#ffffff',
               'type' => 'colorpicker',
           ),
           'cta_text_color' => array (
               'label' => 'Text color',
               'id' => 'cta_text_color',
               'default' => '#333333',
               'type' => 'colorpicker',
           ),
           'cta_padding'    => array(
               'label'  => 'Vertical Padding',
               'id'     => 'cta_padding',
               'default'=> '60',
               'type'   => 'number'
           ),
           
       );
        
        parent::__construct( $args, $fields );
        
    }
    
    
}

function register_simple_cta() {
    register_widget( 'designr\SimpleCta' );
}

add_action( 'widgets_init', 'designr\register_simple_cta' );