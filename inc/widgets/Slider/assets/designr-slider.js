jQuery(document).ready(function ($) {

    $.each( slider_widget_instances, function( index, value ) {

        $('.designr-module.slider.instance-' + value.slider_id ).slick({
            dots: value.slider_dots,
            arrows: value.slider_arrows,
            pauseOnHover: value.slider_pause_hover,
            pauseOnFocus: false,
            infinite: true,
            speed: value.slider_trans_speed,
            fade: value.slider_fade,
            autoplay: value.slider_autoplay,
            autoplaySpeed: value.slider_autoplay_speed,
            cssEase: 'linear'
        });
        
    });
        
});
