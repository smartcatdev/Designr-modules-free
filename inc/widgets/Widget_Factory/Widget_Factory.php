<?php

namespace designr;

// 1. Step 1, edit the class name
class Widgetfactory_Widget extends \WP_Widget {

    function __construct() {
        parent::__construct(
                'widgetfactory_widget', // 2. Edit the widget ID
                esc_html__( 'WidgetFactory', 'designr' ), // 3. Edit the Widget Title
                array ( 'description' => esc_html__( 'Widget Description', 'designr' ), ) // 4. Edit the widget description
        );
        add_action( 'admin_footer', array ( $this, 'media_fields' ) );
        add_action( 'customize_controls_print_footer_scripts', array ( $this, 'media_fields' ) );
    }

    /**
     * 5. Edit this array to specify your widget form fields
     * Make sure to set the ID to something easier for you to remember, 
     * Also set the type, which determines the datatype and form field type
     * 
     * This list is a sample of all possible options
     */
    private $widget_fields = array (
        array (
            'label' => 'Text Field',
            'id' => 'textfield_61055',
            'default' => 'Text field default',
            'type' => 'text',
        ),
        array (
            'label' => 'Text Area',
            'id' => 'textarea_76714',
            'default' => 'Text area default',
            'type' => 'textarea',
        ),
        array (
            'label' => 'Checkbox',
            'id' => 'checkbox_75243',
            'default' => '1',
            'type' => 'checkbox',
        ),
        array (
            'label' => 'Image upload',
            'id' => 'imageupload_82814',
            'type' => 'media',
        ),
        array (
            'label' => 'Email',
            'id' => 'email_39459',
            'default' => 'admin@smartcat.ca',
            'type' => 'email',
        ),
        array (
            'label' => 'Email',
            'id' => 'email_39412',
            'default' => 'admin@smartcat.ca',
            'type' => 'email',
        ),
        array (
            'label' => 'Email',
            'id' => 'email_59412',
            'default' => 'admin@smartcat.ca',
            'type' => 'email',
        ),
        array (
            'label' => 'URL',
            'id' => 'url_61666',
            'default' => 'https://smartcatdesign.net',
            'type' => 'url',
        ),
        array (
            'label' => 'Password',
            'id' => 'password_33742',
            'default' => 'password',
            'type' => 'password',
        ),
        array (
            'label' => 'Number',
            'id' => 'number_87178',
            'default' => '9',
            'type' => 'number',
        ),
        array (
            'label' => 'Telephone',
            'id' => 'telephone_31629',
            'default' => '8881239898',
            'type' => 'tel',
        ),
        array (
            'label' => 'Date',
            'id' => 'date_35159',
            'type' => 'date',
        ),
    );

    /**
     * 6. HTML code your frontend output here
     * or include a partial where the frontend output is
     */
    public function widget( $args, $instance ) {
        
        include 'widget_factory_view.php';

    }

    /**
     * Media Field Backend
     */
    public function media_fields() {
        ?><script>
            jQuery(document).ready(function ($) {
                if (typeof wp.media !== 'undefined') {
                    var _custom_media = true,
                            _orig_send_attachment = wp.media.editor.send.attachment;
                    $(document).on('click', '.custommedia', function (e) {
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        var button = $(this);
                        var id = button.attr('id');
                        _custom_media = true;
                        wp.media.editor.send.attachment = function (props, attachment) {
                            if (_custom_media) {
                                $('input#' + id).val(attachment.url);
                                $('input#' + id).trigger('change');
                            } else {
                                return _orig_send_attachment.apply(this, [props, attachment]);
                            }
                            ;
                        }
                        wp.media.editor.open(button);
                        return false;
                    });
                    $('.add_media').on('click', function () {
                        _custom_media = false;
                    });
                }
            });
        </script><?php
    }

    /**
     * Back-end widget fields
     * 
     */
    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $widget_value = !empty( $instance[ $widget_field[ 'id' ] ] ) ? $instance[ $widget_field[ 'id' ] ] : esc_html__( $widget_field[ 'default' ], 'designr' );
            switch ( $widget_field[ 'type' ] ) {
                case 'media':
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field[ 'id' ] ) ) . '">' . esc_attr( $widget_field[ 'label' ], 'designr' ) . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field[ 'id' ] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field[ 'id' ] ) ) . '" type="' . $widget_field[ 'type' ] . '" value="' . esc_url( $widget_value ) . '">';
                    $output .= '<button id="' . $this->get_field_id( $widget_field[ 'id' ] ) . '" class="button select-media custommedia">Add Media</button>';
                    $output .= '</p>';
                    break;
                case 'checkbox':
                    $output .= '<p>';
                    $output .= '<input class="checkbox" type="checkbox" ' . checked( $widget_value, true, false ) . ' id="' . esc_attr( $this->get_field_id( $widget_field[ 'id' ] ) ) . '" name="' . esc_attr( $this->get_field_id( $widget_field[ 'id' ] ) ) . '" value="1">';
                    $output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field[ 'id' ] ) ) . '">' . esc_attr( $widget_field[ 'label' ], 'designr' ) . '</label>';
                    $output .= '</p>';
                    break;
                case 'textarea':
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field[ 'id' ] ) ) . '">' . esc_attr( $widget_field[ 'label' ], 'designr' ) . ':</label> ';
                    $output .= '<textarea class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field[ 'id' ] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field[ 'id' ] ) ) . '" rows="6" cols="6" value="' . esc_attr( $widget_value ) . '">' . $widget_value . '</textarea>';
                    $output .= '</p>';
                    break;
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field[ 'id' ] ) ) . '">' . esc_attr( $widget_field[ 'label' ], 'designr' ) . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field[ 'id' ] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field[ 'id' ] ) ) . '" type="' . $widget_field[ 'type' ] . '" value="' . esc_attr( $widget_value ) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    /**
     * this will handle form output
     */
    public function form( $instance ) {
        $title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__( '', 'designr' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'designr' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
        $this->field_generator( $instance );
    }

    /**
     * this will handle form update
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array ();
        $instance[ 'title' ] = (!empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field[ 'type' ] ) {
                case 'checkbox':
                    $instance[ $widget_field[ 'id' ] ] = $_POST[ $this->get_field_id( $widget_field[ 'id' ] ) ];
                    break;
                default:
                    $instance[ $widget_field[ 'id' ] ] = (!empty( $new_instance[ $widget_field[ 'id' ] ] ) ) ? strip_tags( $new_instance[ $widget_field[ 'id' ] ] ) : '';
            }
        }
        return $instance;
    }

}

// 7. Edit function name and widget name here
function register_widgetfactory_widget() {
    register_widget( 'designr\Widgetfactory_Widget' );
}

add_action( 'widgets_init', 'designr\register_widgetfactory_widget' );