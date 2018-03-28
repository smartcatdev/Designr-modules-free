<?php if ( !empty( $instance['slider_visibility'] ) && $instance['slider_visibility'] ) : ?>

    <?php var_dump($instance['slide_overlay_opacity_1']); ?>

    <div class="designr-module slider instance-<?php echo esc_attr( $widget_id ); ?>" style="height: <?php echo !empty( $instance['slider_height'] ) ? esc_attr( $instance['slider_height'] ) : 600; ?>px;">

        <?php for ( $slide = 1; $slide < 4; $slide++ ) : ?>

            <?php if ( !empty( $instance['slide_image_' . $slide] ) ) : ?>

                <?php include 'partials/partial_slide.php'; ?>

            <?php endif; ?>
        
        <?php endfor; ?>
        
    </div>

<?php endif; ?>