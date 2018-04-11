<?php 
namespace designr;
?>

<div class="col-sm-12">

    <div class="flxbx center mid <?php attr( $video_location ); ?>-align-video <?php attr( $text_align ); ?>-align-text">

        <div>
            
            <h3><?php attr( $title ); ?></h3>
            <p><?php html( $details ); ?></p>

            <?php button( $btn_text, $btn_url, $btn_style, $btn_size ); ?>
            
        </div>
        
        <div>
            
            <div class="video-cta-wrapper">
                <iframe src="https://www.youtube.com/embed/<?php attr( $video ) ?>?autoplay=<?php attr( $autoplay ) ?>&showinfo=0&controls=0&loop=<?php attr( $loop ) ?>"
                        width="100%"
                        height="<?php attr( $height ) ?>" allow="autoplay; encrypted-media">
                </iframe>
            </div>
            
        </div>
        
    </div>
    
</div>
