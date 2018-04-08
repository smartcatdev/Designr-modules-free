<?php 
namespace designr;


$this->css['#' . $args['widget_id'] ] = array(
    'background-color'  => $values['bg_color'],
    'padding'           => $values['padding'] . 'px 0 ' . $values['padding'] . 'px 0',
    'text-align'        => $values['text_align']
);

$this->css['#'. $args['widget_id'] . ' h3'] = array(
    'color'   => $values['text_color']
);

$this->css['#'. $args['widget_id'] . ' p'] = array(
    'color'   => $values['text_color']
);

$this->css['#'. $args['widget_id'] . ' img.image-cta-img'] = array(
    'width'   => '100%',
    'height'   => 'auto',
);

if( $values['image_rounded'] ) {
    $this->css['#'. $args['widget_id'] . ' img.image-cta-img']['border-radius'] = '100%';
}

if( 'stacked' == $values['image_location'] ) {
    $this->css['#'. $args['widget_id'] . ' img.image-cta-img']['text-align'] = 'center';
    $this->css['#'. $args['widget_id'] . ' img.image-cta-img']['max-width'] = '50%';
    $this->css['#'. $args['widget_id'] . ' img.image-cta-img']['display'] = 'block';
    $this->css['#'. $args['widget_id'] . ' img.image-cta-img']['margin'] = '0 auto';
}

?>


<div class="designr-module" id="<?php echo esc_attr( $args['widget_id' ] ); ?>">
    
    <div class="container">
        
        <div class="row">
            <?php 
            if( 'left' == $values['image_location'] ) :
                render_template( 'ImageCta/partials/partial_left.php', $values );
            elseif( 'right' == $values['image_location'] ) :
                render_template( 'ImageCta/partials/partial_right.php', $values );
            else:
                render_template( 'ImageCta/partials/partial_stacked.php', $values );
            endif;
            ?>    
        </div>
        
        
 
        
    </div>
    
</div>