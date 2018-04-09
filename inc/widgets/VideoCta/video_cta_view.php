<?php 
namespace designr;

// CSS
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

$this->css['#'. $args['widget_id'] . ' img.video-cta-img'] = array(
    'width'   => '100%',
    'height'   => 'auto',
);

$this->css['#'. $args['widget_id'] . ' .video-cta-wrapper'] = array(
    'position'  => 'relative',
    
);

$this->css['#'. $args['widget_id'] . ' .video-cta-wrapper .video-cta-icon'] = array(
    'position'      => 'absolute',
    'top'           => '0',
    'left'          => '0',
    'bottom'        => '0',
    'right'         => '0',
    'margin'        => 'auto',
    'z-index'       => '99',
    'text-align'    => 'center'
);

$this->css['#'. $args['widget_id'] . ' .video-cta-wrapper .video-cta-icon:before'] = array(
    'top'       => '50%',
    'position'  => 'absolute',
    'color'     => '#fff',
    'font-size' => '56px',
    
);


if( 'stacked' == $values['video_location'] ) {
    $this->css['#'. $args['widget_id'] . ' img.video-cta-img']['text-align'] = 'center';
    $this->css['#'. $args['widget_id'] . ' img.video-cta-img']['max-width'] = '50%';
    $this->css['#'. $args['widget_id'] . ' img.video-cta-img']['display'] = 'block';
    $this->css['#'. $args['widget_id'] . ' img.video-cta-img']['margin'] = '0 auto';
}

?>
<script>

//var tag = document.createElement('script');
//
//tag.src = "https://www.youtube.com/iframe_api";
//var firstScriptTag = document.getElementsByTagName('script')[0];
//firstScriptTag.parentNode.insertBefore( tag, firstScriptTag );
//
//var player;
//function onYouTubeIframeAPIReady() {
//    
//    player = new YT.Player( document.querySelector( '#<?php echo esc_attr( $args['widget_id' ] ); ?> .player' ), {
//        height: '<?php echo $values['height'] ?>px',
//        width: '100%',
//        videoId: '<?php echo $values['video'] ?>',
//        playerVars : {
//            autoplay: <?php echo intval( $values['autoplay'] ) ?>,
//            controls: <?php echo intval( $values['controls'] ) ?>,
//            cc_load_policy: 0,
//            iv_load_policy: 3,
//            loop: <?php echo intval( $values['loop'] ) ?>,
//            rel: 0,
//            showinfo: 0,
//            start: 0
//        },
//        events: {
//            'onReady': onPlayerReady,
//            'onStateChange': onPlayerStateChange,
//        }
//    });
//}
//
//
//function onPlayerReady(event) {
////        event.target.playVideo();
//}
//
//var done = false;
//function onPlayerStateChange(event) {
//
//}
//function stopVideo() {
//    player.stopVideo();
//}
//</script>


<div class="designr-module" id="<?php echo esc_attr( $args['widget_id' ] ); ?>">
    
    <div class="container">
        
        <div class="row">
            <?php 
            if( 'left' == $values['video_location'] ) :
                render_template( 'VideoCta/partials/partial_left.php', $values );
            elseif( 'right' == $values['video_location'] ) :
                render_template( 'VideoCta/partials/partial_right.php', $values );
            else:
                render_template( 'VideoCta/partials/partial_stacked.php', $values );
            endif;
            ?>    
        </div>
    </div>
    
</div>