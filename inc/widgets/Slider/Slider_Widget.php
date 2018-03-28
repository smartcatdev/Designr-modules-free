<?php

namespace designr;

class Slider_Widget extends \WP_Widget {

    static $variables = array();
    
    public function __construct() {

        parent::__construct(
            'designr_slider',
            __( 'Designr: Slider', 'designr' ),
            array(
                'description' => __( 'A slider banner.', 'designr' ),
            )
        );
        
    }
    
    public function widget( $args, $instance ) {
        
        $widget_id = $args['widget_id'];
        
        add_action( 'wp_footer', array( $this, 'localize_options' ) );
        wp_enqueue_script( 'designr-module-slider', get_plugin_url() . 'inc/widgets/Slider/assets/designr-slider.js', array( 'jquery' ), DESIGNR_MODULES_VERSION );
        
        $slider_instance_settings = array(
            'slider_id'                 => $widget_id,
            'slider_autoplay'           => !empty( $instance['slider_autoplay'] ) ? true : false,
            'slider_autoplay_speed'     => !empty( $instance['slider_autoplay_speed'] ) ? $instance['slider_autoplay_speed'] : 6500,
            'slider_arrows'             => !empty( $instance['slider_arrows'] ) ? true : false,
            'slider_dots'               => !empty( $instance['slider_dots'] ) ? true : false,
            'slider_fade'               => !empty( $instance['slider_fade'] ) ? true : false,
            'slider_pause_hover'        => !empty( $instance['slider_pause_hover'] ) ? true : false,
            'slider_trans_speed'        => !empty( $instance['slider_trans_speed'] ) ? $instance['slider_trans_speed'] : 500,
        );
        
        self::$variables[$widget_id] = $slider_instance_settings;
        
        include 'Slider_View.php';
        
    }

    public function form( $instance ) {

        /**
         * Set Default Values
         * ---------------------------------------------------------------------
         */
        
        $defaults = array(
            'slider_visibility'         => true,
            'slider_height'             => 600,
            'slider_autoplay'           => true,
            'slider_autoplay_speed'     => 6500,
            'slider_arrows'             => true,
            'slider_dots'               => false,
            'slider_fade'               => false,
            'slider_pause_hover'        => false,
            'slider_trans_speed'        => 500,
            'slider_overlay_gradient'   => false,
        );

        for ( $slide = 1; $slide < 4; $slide++ ) : 
            $defaults['slide_image_' . $slide] = '';
            $defaults['slide_pre_title_' . $slide] = '';
            $defaults['slide_title_' . $slide] = '';
            $defaults['slide_caption_' . $slide] = '';
            $defaults['slide_button_label_' . $slide] = '';
            $defaults['slide_button_url_' . $slide] = '';
            $defaults['slide_overlay_' . $slide] = true;
            $defaults['slide_overlay_opacity_' . $slide] = .35;
        endfor;
        
        $instance = wp_parse_args( (array) $instance, $defaults );

        /**
         * Retrieve Values from DB
         * ---------------------------------------------------------------------
         */
        
        $actual_slides = array();
        
        $slider_visibility          = !empty( $instance['slider_visibility'] ) ? true : false;
        $slider_height              = !empty( $instance['slider_height'] ) ? $instance['slider_height'] : 600;
        $slider_autoplay            = !empty( $instance['slider_autoplay'] ) ? true : false;
        $slider_autoplay_speed      = !empty( $instance['slider_autoplay_speed'] ) ? $instance['slider_autoplay_speed'] : 6500;
        $slider_arrows              = !empty( $instance['slider_arrows'] ) ? true : false;
        $slider_dots                = !empty( $instance['slider_dots'] ) ? true : false;
        $slider_fade                = !empty( $instance['slider_fade'] ) ? true : false;
        $slider_pause_hover         = !empty( $instance['slider_pause_hover'] ) ? true : false;
        $slider_trans_speed         = !empty( $instance['slider_trans_speed'] ) ? $instance['slider_trans_speed'] : 500;
        $slider_overlay_gradient    = !empty( $instance['slider_overlay_gradient'] ) ? true : false;
        
        for ( $slide = 1; $slide < 4; $slide++ ) : 
            
            $actual_slides[$slide] = array (
                'image'             => !empty( $instance['slide_image_' . $slide] ) ? $instance['slide_image_' . $slide] : '',
                'pre_title'         => !empty( $instance['slide_pre_title_' . $slide] ) ? $instance['slide_pre_title_' . $slide] : '',
                'title'             => !empty( $instance['slide_title_' . $slide] ) ? $instance['slide_title_' . $slide] : '',
                'caption'           => !empty( $instance['slide_caption_' . $slide] ) ? $instance['slide_caption_' . $slide] : '',
                'button_label'      => !empty( $instance['slide_button_label_' . $slide] ) ? $instance['slide_button_label_' . $slide] : '',
                'button_url'        => !empty( $instance['slide_button_url_' . $slide] ) ? $instance['slide_button_url_' . $slide] : '',
                'overlay'           => !empty( $instance['slide_overlay_' . $slide] ) ? true : false,
                'overlay_opacity'   => !empty( $instance['slide_overlay_opacity_' . $slide] ) ? $instance['slide_overlay_opacity_' . $slide] : .35,
            );
            
        endfor;
        
        /**
         * Form Fields
         * ---------------------------------------------------------------------
         */

        echo '<h2>' . __( 'General Settings', 'designr' ) . '</h2>';
        
        // Slider Visibility (Toggle)
        
        echo '<label class="designr-control-title">';
        echo '  <span>' . __( 'Slider Visibility', 'designr' ) . '</span>';
        echo '</label>';
        echo '<div class="toggle-flex">';
        echo '  <div class="flex-inner-small">';
        echo '      <label class="switch">';
        echo '          <input class="checkbox" id="' . esc_attr( $this->get_field_id( 'slider_visibility' ) ) . '" type="checkbox" name="' . esc_attr( $this->get_field_name( 'slider_visibility' ) ) . '"' . checked( $slider_visibility, true, false ) . ' />';
        echo '          <span class="slider round"></span>';
        echo '          <label for="' . esc_attr( $this->get_field_id( 'slider_visibility' ) ) . '" class="tgl-btn ' . 'slider_visibility' . '_label"></label>';
        echo '      </label>';
        echo '  </div>';
        echo '  <div class="flex-inner-wide">';
        echo '      <div class="description customize-control-description">' . __( 'Use this to hide the slider without needing to remove it', 'designr' ) . '</div>';
        echo '  </div>';
        echo '</div>';
        
        // Slider Height (Number)
        
        echo '<p>';
        echo '	<label for="' . esc_attr( $this->get_field_id( 'slider_height' ) ) . '" class="designr-control-title ' . 'slider_height' . '_label">' . __( 'Slider Height (Pixel Value)', 'designr' ) . '</label>';
        echo '	<input type="number" id="' . esc_attr( $this->get_field_id( 'slider_height' ) ) . '" name="' . esc_attr( $this->get_field_name( 'slider_height' ) ) . '" class="widefat" min="200" value="' . esc_attr( $slider_height ) . '">';
        echo '</p>';
        
        // Slider Fade (Toggle)
        
        echo '<label class="designr-control-title">';
        echo '  <span>' . __( 'Use Fade Transition?', 'designr' ) . '</span>';
        echo '</label>';
        echo '<div class="toggle-flex">';
        echo '  <div class="flex-inner-small">';
        echo '      <label class="switch">';
        echo '          <input class="checkbox" id="' . esc_attr( $this->get_field_id( 'slider_fade' ) ) . '" type="checkbox" name="' . esc_attr( $this->get_field_name( 'slider_fade' ) ) . '"' . checked( $slider_fade, true, false ) . ' />';
        echo '          <span class="slider round"></span>';
        echo '          <label for="' . esc_attr( $this->get_field_id( 'slider_fade' ) ) . '" class="tgl-btn ' . 'slider_fade' . '_label"></label>';
        echo '      </label>';
        echo '  </div>';
        echo '  <div class="flex-inner-wide">';
        echo '      <div class="description customize-control-description">' . __( 'Set whether to use the fade transition effect instead of the carousel effect', 'designr' ) . '</div>';
        echo '  </div>';
        echo '</div>';
        
        // Slider Transition Speed (Number)
        
        echo '<p>';
        echo '	<label for="' . esc_attr( $this->get_field_id( 'slider_trans_speed' ) ) . '" class="designr-control-title ' . 'slider_trans_speed' . '_label">' . __( 'Transition Duration (Milliseconds)', 'designr' ) . '</label>';
        echo '	<input type="number" id="' . esc_attr( $this->get_field_id( 'slider_trans_speed' ) ) . '" name="' . esc_attr( $this->get_field_name( 'slider_trans_speed' ) ) . '" class="widefat" value="' . esc_attr( $slider_trans_speed ) . '">';
        echo '</p>';
        
        echo '<hr class="space-line">';
        
        echo '<h2>' . __( 'Autoplay', 'designr' ) . '</h2>';
        
        // Autoplay (Toggle)
        
        echo '<label class="designr-control-title">';
        echo '  <span>' . __( 'Autoplay Through Slides?', 'designr' ) . '</span>';
        echo '</label>';
        echo '<div class="toggle-flex">';
        echo '  <div class="flex-inner-small">';
        echo '      <label class="switch">';
        echo '          <input class="checkbox" id="' . esc_attr( $this->get_field_id( 'slider_autoplay' ) ) . '" type="checkbox" name="' . esc_attr( $this->get_field_name( 'slider_autoplay' ) ) . '"' . checked( $slider_autoplay, true, false ) . ' />';
        echo '          <span class="slider round"></span>';
        echo '          <label for="' . esc_attr( $this->get_field_id( 'slider_autoplay' ) ) . '" class="tgl-btn ' . 'slider_autoplay' . '_label"></label>';
        echo '      </label>';
        echo '  </div>';
        echo '  <div class="flex-inner-wide">';
        echo '      <div class="description customize-control-description">' . __( 'Set whether to automatically change slides on a timer', 'designr' ) . '</div>';
        echo '  </div>';
        echo '</div>';
        
        // Pause Autoplay on Hover (Toggle)
        
        echo '<label class="designr-control-title">';
        echo '  <span>' . __( 'Pause Autoplay on Hover?', 'designr' ) . '</span>';
        echo '</label>';
        echo '<div class="toggle-flex">';
        echo '  <div class="flex-inner-small">';
        echo '      <label class="switch">';
        echo '          <input class="checkbox" id="' . esc_attr( $this->get_field_id( 'slider_pause_hover' ) ) . '" type="checkbox" name="' . esc_attr( $this->get_field_name( 'slider_pause_hover' ) ) . '"' . checked( $slider_pause_hover, true, false ) . ' />';
        echo '          <span class="slider round"></span>';
        echo '          <label for="' . esc_attr( $this->get_field_id( 'slider_pause_hover' ) ) . '" class="tgl-btn ' . 'slider_pause_hover' . '_label"></label>';
        echo '      </label>';
        echo '  </div>';
        echo '  <div class="flex-inner-wide">';
        echo '      <div class="description customize-control-description">' . __( 'Set whether to use the fade transition effect instead of the carousel effect', 'designr' ) . '</div>';
        echo '  </div>';
        echo '</div>';
        
        // Slider Autoplay Speed (Number)
        
        echo '<p>';
        echo '	<label for="' . esc_attr( $this->get_field_id( 'slider_autoplay_speed' ) ) . '" class="designr-control-title ' . 'slider_autoplay_speed' . '_label">' . __( 'Autoplay Timer (Milliseconds)', 'designr' ) . '</label>';
        echo '	<input type="number" id="' . esc_attr( $this->get_field_id( 'slider_autoplay_speed' ) ) . '" name="' . esc_attr( $this->get_field_name( 'slider_autoplay_speed' ) ) . '" class="widefat" value="' . esc_attr( $slider_autoplay_speed ) . '">';
        echo '</p>';
        
        echo '<hr class="space-line">';
        
        echo '<h2>' . __( 'Navigation', 'designr' ) . '</h2>';
        
        // Slider Arrows Nav (Toggle)
        
        echo '<label class="designr-control-title">';
        echo '  <span>' . __( 'Show "Arrows" Navigation?', 'designr' ) . '</span>';
        echo '</label>';
        echo '<div class="toggle-flex">';
        echo '  <div class="flex-inner-small">';
        echo '      <label class="switch">';
        echo '          <input class="checkbox" id="' . esc_attr( $this->get_field_id( 'slider_arrows' ) ) . '" type="checkbox" name="' . esc_attr( $this->get_field_name( 'slider_arrows' ) ) . '"' . checked( $slider_arrows, true, false ) . ' />';
        echo '          <span class="slider round"></span>';
        echo '          <label for="' . esc_attr( $this->get_field_id( 'slider_arrows' ) ) . '" class="tgl-btn ' . 'slider_arrows' . '_label"></label>';
        echo '      </label>';
        echo '  </div>';
        echo '  <div class="flex-inner-wide">';
        echo '      <div class="description customize-control-description">' . __( 'Set whether or not to display the arrow tabs at the sides of the slider', 'designr' ) . '</div>';
        echo '  </div>';
        echo '</div>';
        
        // Slider Dots Nav (Toggle)
        
        echo '<label class="designr-control-title">';
        echo '  <span>' . __( 'Show "Dots" Pagination?', 'designr' ) . '</span>';
        echo '</label>';
        echo '<div class="toggle-flex">';
        echo '  <div class="flex-inner-small">';
        echo '      <label class="switch">';
        echo '          <input class="checkbox" id="' . esc_attr( $this->get_field_id( 'slider_dots' ) ) . '" type="checkbox" name="' . esc_attr( $this->get_field_name( 'slider_dots' ) ) . '"' . checked( $slider_dots, true, false ) . ' />';
        echo '          <span class="slider round"></span>';
        echo '          <label for="' . esc_attr( $this->get_field_id( 'slider_dots' ) ) . '" class="tgl-btn ' . 'slider_dots' . '_label"></label>';
        echo '      </label>';
        echo '  </div>';
        echo '  <div class="flex-inner-wide">';
        echo '      <div class="description customize-control-description">' . __( 'Set whether or not to display the pagination tabs at the bottom of the slider', 'designr' ) . '</div>';
        echo '  </div>';
        echo '</div>';
        
        echo '<hr class="space-line">';
        
        // Slides
        
        echo '<h2>' . __( 'Slides', 'designr' ) . '</h2>';
        
        for ( $slide = 1; $slide < 4; $slide++ ) :
            
            echo '<div class="slide-detail-wrap">';
        
                echo '<h4>Slide #' . esc_html( $slide ) . '</h4>';
            
                echo '<div class="slide-detail-inner">';
                
                    // Image (URL)
                    echo '<p>';
                    echo '  <label for="' . esc_attr( $this->get_field_id( 'slide_image_' . $slide ) ) . '" class="designr-control-title ' . 'slide_image_' . $slide . '_label">' . __( 'Image', 'designr' ) . '</label>';
                    echo '  <input type="url" id="' . esc_attr( $this->get_field_id( 'slide_image_' . $slide ) ) . '" name="' . esc_attr( $this->get_field_name( 'slide_image_' . $slide ) ) . '" class="widefat" value="' . esc_url( $actual_slides[$slide]['image'] ) . '">';
                    echo '</p>';

                    // Pre-Title (Text)
                    echo '<p>';
                    echo '  <label for="' . esc_attr( $this->get_field_id( 'slide_pre_title_' . $slide ) ) . '" class="designr-control-title ' . 'slide_pre_title' . $slide . '_label">' . __( 'Pre-Title', 'designr' ) . '</label>';
                    echo '  <input type="text" id="' . esc_attr( $this->get_field_id( 'slide_pre_title_' . $slide ) ) . '" name="' . esc_attr( $this->get_field_name( 'slide_pre_title_' . $slide ) ) . '" class="widefat" value="' . esc_attr( $actual_slides[$slide]['pre_title'] ) . '">';
                    echo '</p>';

                    // Title (Text)
                    echo '<p>';
                    echo '  <label for="' . esc_attr( $this->get_field_id( 'slide_title_' . $slide ) ) . '" class="designr-control-title ' . 'slide_title' . $slide . '_label">' . __( 'Title', 'designr' ) . '</label>';
                    echo '  <input type="text" id="' . esc_attr( $this->get_field_id( 'slide_title_' . $slide ) ) . '" name="' . esc_attr( $this->get_field_name( 'slide_title_' . $slide ) ) . '" class="widefat" value="' . esc_attr( $actual_slides[$slide]['title'] ) . '">';
                    echo '</p>';

                    // Caption (Text Area)
                    echo '<p>';
                    echo '  <label for="' . esc_attr( $this->get_field_id( 'slide_caption_' . $slide ) ) . '" class="designr-control-title ' . 'slide_caption' . '_label">' . __( 'Caption', 'designr' ) . '</label>';
                    echo '  <textarea id="' . esc_attr( $this->get_field_id( 'slide_caption_' . $slide ) ) . '" name="' . esc_attr( $this->get_field_name( 'slide_caption_' . $slide ) ) . '" class="widefat">' . esc_html( $actual_slides[$slide]['caption'] ) . '</textarea>';
                    echo '</p>';

                    // Button Label (Text)
                    echo '<p>';
                    echo '  <label for="' . esc_attr( $this->get_field_id( 'slide_button_label_' . $slide ) ) . '" class="designr-control-title ' . 'slide_button_label' . $slide . '_label">' . __( 'Button - Label', 'designr' ) . '</label>';
                    echo '  <input type="text" id="' . esc_attr( $this->get_field_id( 'slide_button_label_' . $slide ) ) . '" name="' . esc_attr( $this->get_field_name( 'slide_button_label_' . $slide ) ) . '" class="widefat" value="' . esc_attr( $actual_slides[$slide]['button_label'] ) . '">';
                    echo '</p>';

                    // Button URL (Text)
                    echo '<p>';
                    echo '  <label for="' . esc_attr( $this->get_field_id( 'slide_button_url_' . $slide ) ) . '" class="designr-control-title ' . 'slide_button_url' . $slide . '_label">' . __( 'Button - URL', 'designr' ) . '</label>';
                    echo '  <input type="text" id="' . esc_attr( $this->get_field_id( 'slide_button_url_' . $slide ) ) . '" name="' . esc_attr( $this->get_field_name( 'slide_button_url_' . $slide ) ) . '" class="widefat" value="' . esc_attr( $actual_slides[$slide]['button_url'] ) . '">';
                    echo '</p>';
                    
                    // Overlay Opacity (Decimal)
                    echo '<p>';
                    echo '	<label for="' . esc_attr( $this->get_field_id( 'slide_overlay_opacity_' . $slide ) ) . '" class="designr-control-title ' . 'slider_overlay_opacity' . '_label">' . __( 'Dark Tint Amount', 'designr' ) . '</label>';
                    echo '	<input type="range" min="0.0" max="1.0" step=".05" id="' . esc_attr( $this->get_field_id( 'slide_overlay_opacity_' . $slide ) ) . '" name="' . esc_attr( $this->get_field_name( 'slide_overlay_opacity_' . $slide ) ) . '" class="widefat" value="' . esc_attr( $actual_slides[$slide]['overlay_opacity'] ) . '">';
                    echo '</p>';
            
                echo '</div>';
                    
            echo '</div>';
        
        endfor;
        
        
    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;
        
        $instance['slider_visibility']          =  ( !empty( $new_instance['slider_visibility'] ) ) ? true : false;
        $instance['slider_height']              =  ( !empty( $new_instance['slider_height'] ) ) ? intval( $new_instance['slider_height'] ) : '';
        $instance['slider_arrows']              =  ( !empty( $new_instance['slider_arrows'] ) ) ? true : false;
        $instance['slider_dots']                =  ( !empty( $new_instance['slider_dots'] ) ) ? true : false;
        $instance['slider_fade']                =  ( !empty( $new_instance['slider_fade'] ) ) ? true : false;
        $instance['slider_pause_hover']         =  ( !empty( $new_instance['slider_pause_hover'] ) ) ? true : false;
        $instance['slider_autoplay']            =  ( !empty( $new_instance['slider_autoplay'] ) ) ? true : false;
        $instance['slider_autoplay_speed']      =  ( !empty( $new_instance['slider_autoplay_speed'] ) ) ? intval( $new_instance['slider_autoplay_speed'] ) : '';
        $instance['slider_trans_speed']         =  ( !empty( $new_instance['slider_trans_speed'] ) ) ? intval( $new_instance['slider_trans_speed'] ) : '';
        
        for ( $slide = 1; $slide < 4; $slide++ ) : 
            $instance['slide_image_' . $slide]              = ( !empty( $new_instance['slide_image_' . $slide] ) ) ? esc_url_raw( $new_instance['slide_image_' . $slide] ) : '';
            $instance['slide_pre_title_' . $slide]          = ( !empty( $new_instance['slide_pre_title_' . $slide] ) ) ? wp_strip_all_tags( $new_instance['slide_pre_title_' . $slide] ) : '';
            $instance['slide_title_' . $slide]              = ( !empty( $new_instance['slide_title_' . $slide] ) ) ? wp_strip_all_tags( $new_instance['slide_title_' . $slide] ) : '';
            $instance['slide_caption_' . $slide]            = ( !empty( $new_instance['slide_caption_' . $slide] ) ) ? sanitize_textarea_field( $new_instance['slide_caption_' . $slide] ) : '';
            $instance['slide_button_label_' . $slide]       = ( !empty( $new_instance['slide_button_label_' . $slide] ) ) ? wp_strip_all_tags( $new_instance['slide_button_label_' . $slide] ) : '';
            $instance['slide_button_url_' . $slide]         = ( !empty( $new_instance['slide_button_url_' . $slide] ) ) ? wp_strip_all_tags( $new_instance['slide_button_url_' . $slide] ) : '';
            $instance['slide_overlay_opacity_' . $slide]    = ( !empty( $new_instance['slide_overlay_opacity_' . $slide] ) ) ? wp_strip_all_tags( $new_instance['slide_overlay_opacity_' . $slide] ) : '';
        endfor;
        
        return $instance;

    }
 
    function localize_options(){
        
        //  if( !empty( self::$widget_cal ) ) {
            wp_localize_script( 'designr-module-slider', 'slider_widget_instances', self::$variables );   
        //  }

    }      
    
}

function register_slider_widget() {
    register_widget( '\designr\Slider_Widget' );
}
add_action( 'widgets_init', '\designr\register_slider_widget' );
