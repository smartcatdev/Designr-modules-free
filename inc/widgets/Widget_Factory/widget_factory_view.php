<?php

if ( !empty( $instance[ 'title' ] ) ) {
    echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
}

// Output generated fields
echo '<p>' . $instance[ 'textfield_61055' ] . '</p>';
echo '<p>' . $instance[ 'textarea_76714' ] . '</p>';
echo '<p>' . $instance[ 'checkbox_75243' ] . '</p>';
echo '<p>' . $instance[ 'imageupload_82814' ] . '</p>';
echo '<p>' . $instance[ 'email_39459' ] . '</p>';
echo '<p>' . $instance[ 'url_61666' ] . '</p>';
echo '<p>' . $instance[ 'password_33742' ] . '</p>';
echo '<p>' . $instance[ 'number_87178' ] . '</p>';
echo '<p>' . $instance[ 'telephone_31629' ] . '</p>';
echo '<p>' . $instance[ 'date_35159' ] . '</p>';