<?php 
namespace designr;
?>
<div class="col-sm-12">
    <img class="image-cta-img" src="<?php url( $image ); ?>"/>
</div>
<div class="col-sm-12">
    
    <h3><?php attr( $title ); ?></h3>
    <p><?php html( $details ); ?></p>
    
    <?php button( $btn_text, $btn_url, $btn_style ); ?>    
</div>


