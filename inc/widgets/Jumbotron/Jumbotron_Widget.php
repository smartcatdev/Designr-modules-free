<?php

namespace designr;

class Jumbotron_Widget extends \WP_Widget {

    public function __construct() {

        parent::__construct(
            'designr_jumbotron',
            __( 'Jumbotron', 'designr' ),
            array(
                'description' => __( 'A large hero banner that can have a second image floating over the backdrop.', 'designr' ),
            )
        );

    }

    public function widget( $args, $instance ) {
        include 'Jumbotron_View.php';
    }

    public function form( $instance ) {

        // Set default values
        $instance = wp_parse_args( (array) $instance, array(
            'bg_color'                  => '',
            'background_image'          => '',
            'main_title'                => '',
            'popout_image'              => '',
            'button_text'               => '',
            'button_url'                => '',
            'button_text_login'         => '',
            'button_url_login'          => '',
            'live_coach_image'          => '',
            'live_coach_title'          => '',
            'live_coach_quote'          => '',
        ) );

        // Retrieve an existing value from the database
        $bg_color                       = !empty( $instance['bg_color'] )                   ? $instance['bg_color'] : '';
        $background_image               = !empty( $instance['background_image'] )           ? $instance['background_image'] : '';
        $main_title                     = !empty( $instance['main_title'] )                 ? $instance['main_title'] : '';
        $popout_image                   = !empty( $instance['popout_image'] )               ? $instance['popout_image'] : '';
        $button_text                    = !empty( $instance['button_text'] )                ? $instance['button_text'] : '';
        $button_url                     = !empty( $instance['button_url'] )                 ? $instance['button_url'] : '';
        $button_text_login              = !empty( $instance['button_text_login'] )          ? $instance['button_text_login'] : '';
        $button_url_login               = !empty( $instance['button_url_login'] )           ? $instance['button_url_login'] : '';
        $live_coach_image               = !empty( $instance['live_coach_image'] )           ? $instance['live_coach_image'] : '';
        $live_coach_title               = !empty( $instance['live_coach_title'] )           ? $instance['live_coach_title'] : '';
        $live_coach_quote               = !empty( $instance['live_coach_quote'] )           ? $instance['live_coach_quote'] : '';

        // Form fields

        // Background Image
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'background_image' ) . '" class="background_image_label">' . __( 'Background Image', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'background_image' ) . '" name="' . $this->get_field_name( 'background_image' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'designr' ) . '" value="' . esc_attr( $background_image ) . '">';
        echo '<input  class="sc-upload-button button" type="button" value="Upload Image" />';
        echo '</p>';

        echo '<hr>';

        // Main Title
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'main_title' ) . '" class="main_title_label">' . __( 'Main Title', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'main_title' ) . '" name="' . $this->get_field_name( 'main_title' ) . '" class="widefat" placeholder="' . esc_attr__( 'Enter the main title', 'designr' ) . '" value="' . esc_attr( $main_title ) . '">';
        echo '</p>';

        // Popout Image
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'popout_image' ) . '" class="popout_image_label">' . __( 'Popout Image', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'popout_image' ) . '" name="' . $this->get_field_name( 'popout_image' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'designr' ) . '" value="' . esc_attr( $popout_image ) . '">';
        echo '<input  class="sc-upload-button button" type="button" value="Upload Image" />';
        echo '</p>';

        // Button Text
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'button_text' ) . '" class="button_text_label">' . __( 'Button Text', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'button_text' ) . '" name="' . $this->get_field_name( 'button_text' ) . '" class="widefat" placeholder="' . esc_attr__( 'Enter the main title', 'designr' ) . '" value="' . esc_attr( $button_text ) . '">';
        echo '</p>';

        // Button URL
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'button_url' ) . '" class="button_url_label">' . __( 'Button URL', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'button_url' ) . '" name="' . $this->get_field_name( 'button_url' ) . '" class="widefat" placeholder="' . esc_attr__( 'Enter the main title', 'designr' ) . '" value="' . esc_attr( $button_url ) . '">';
        echo '</p>';

        // Button Text - LOGGED IN
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'button_text_login' ) . '" class="button_text_login_label">' . __( 'Button Text - Logged In', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'button_text_login' ) . '" name="' . $this->get_field_name( 'button_text_login' ) . '" class="widefat" placeholder="' . esc_attr__( 'Enter the main title', 'designr' ) . '" value="' . esc_attr( $button_text_login ) . '">';
        echo '</p>';

        // Button URL - LOGGED IN
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'button_url_login' ) . '" class="button_url_login_label">' . __( 'Button URL - Logged In', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'button_url_login' ) . '" name="' . $this->get_field_name( 'button_url_login' ) . '" class="widefat" placeholder="' . esc_attr__( 'Enter the main title', 'designr' ) . '" value="' . esc_attr( $button_url_login ) . '">';
        echo '</p>';
        
        // Live Coach Image
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'live_coach_image' ) . '" class="live_coach_image_label">' . __( 'Live Coach - Image', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'live_coach_image' ) . '" name="' . $this->get_field_name( 'live_coach_image' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'designr' ) . '" value="' . esc_attr( $live_coach_image ) . '">';
        echo '<input  class="sc-upload-button button" type="button" value="Upload Image" />';
        echo '</p>';
        
        // Live Coach Title
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'live_coach_title' ) . '" class="live_coach_title_label">' . __( 'Live Coach - Title', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'live_coach_title' ) . '" name="' . $this->get_field_name( 'live_coach_title' ) . '" class="widefat" placeholder="' . esc_attr__( 'Enter the coach title', 'designr' ) . '" value="' . esc_attr( $live_coach_title ) . '">';
        echo '</p>';
        
        // Live Coach Quote
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'live_coach_quote' ) . '" class="live_coach_quote_label">' . __( 'Live Coach - Quote', 'designr' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'live_coach_quote' ) . '" name="' . $this->get_field_name( 'live_coach_quote' ) . '" class="widefat" placeholder="' . esc_attr__( 'Enter the coach quote', 'designr' ) . '" value="' . esc_attr( $live_coach_quote ) . '">';
        echo '</p>';

    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['bg_color']           = !empty( $new_instance['bg_color'] )               ? strip_tags( $new_instance['bg_color'] ) : '';
        $instance['background_image']   = !empty( $new_instance['background_image'] )       ? strip_tags( $new_instance['background_image'] ) : '';
        $instance['main_title']         = !empty( $new_instance['main_title'] )             ? strip_tags( $new_instance['main_title'] ) : '';
        $instance['popout_image']       = !empty( $new_instance['popout_image'] )           ? strip_tags( $new_instance['popout_image'] ) : '';
        $instance['button_text']        = !empty( $new_instance['button_text'] )            ? strip_tags( $new_instance['button_text'] ) : '';
        $instance['button_url']         = !empty( $new_instance['button_url'] )             ? strip_tags( $new_instance['button_url'] ) : '';
        $instance['button_text_login']  = !empty( $new_instance['button_text_login'] )      ? strip_tags( $new_instance['button_text_login'] ) : '';
        $instance['button_url_login']   = !empty( $new_instance['button_url_login'] )       ? strip_tags( $new_instance['button_url_login'] ) : '';
        $instance['live_coach_image']   = !empty( $new_instance['live_coach_image'] )       ? strip_tags( $new_instance['live_coach_image'] ) : '';
        $instance['live_coach_title']   = !empty( $new_instance['live_coach_title'] )       ? strip_tags( $new_instance['live_coach_title'] ) : '';
        $instance['live_coach_quote']   = !empty( $new_instance['live_coach_quote'] )       ? strip_tags( $new_instance['live_coach_quote'] ) : '';

        return $instance;

    }

}

function register_jumbotron_widget() {
    register_widget( '\designr\Jumbotron_Widget' );
}
add_action( 'widgets_init', '\designr\register_jumbotron_widget' );
