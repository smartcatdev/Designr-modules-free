<?php 
namespace designr;

$this->css['#' . $args['widget_id'] ] = array(
    'background-color'  => $values['bg_color'],
    'padding'           => $values['padding'] . 'px 0 ' . $values['padding'] . 'px 0',
    'text-align'        => $values['text_align']
);

$this->css['#'. $args['widget_id'] . ' h2'] = array(
    'color'   => $values['text_color']
);

$this->css['#'. $args['widget_id'] . ' p'] = array(
    'color'   => $values['text_color']
);


?>


<div class="designr-module" id="<?php echo esc_attr( $args['widget_id' ] ); ?>">
    
    <div class="container">
        
        <div class="row">
        
            <div class="col-sm-12">
                
                <?php if( $values['title'] ) : ?>
                    <h2><?php attr( $values['title'] ); ?></h2>
                <?php endif; ?>
                
                <?php if( $values['subtitle'] ) : ?>
                    <h6><?php attr( $values['subtitle'] ); ?></h6>
                <?php endif; ?>
                
            </div>

        </div>
        
    </div>
    
</div>