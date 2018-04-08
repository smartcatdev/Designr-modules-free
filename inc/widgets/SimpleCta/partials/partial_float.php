<?php 
namespace designr;
?>

<style type="text/css" scoped>
    
</style>

<div class="col-sm-6">
    <h2><?php attr( $cta_title ); ?></h2>
    <h6><?php html( $cta_subtitle ); ?></h6>
</div>
<div class="col-sm-6">
    <?php button( $cta_btn_text, $cta_btn_url, $cta_btn_style ); ?>    
</div>

