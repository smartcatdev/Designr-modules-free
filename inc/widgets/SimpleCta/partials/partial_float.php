<?php 
namespace designr;
?>

<style type="text/css" scoped>
    
</style>

<div class="col-sm-6">
    <h2><?php attr( $cta_title ); ?></h2>
    <p><?php attr( $cta_subtitle ); ?></p>
</div>
<div class="col-sm-6">
    <?php button( $cta_btn_text, $cta_btn_url, $cta_btn_style ); ?>    
</div>

