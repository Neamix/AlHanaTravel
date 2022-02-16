<script src="{{ asset('js/front/common_scripts.js') }}"></script>
<script src="{{ asset('js/front/main_rtl.js') }}"></script>

<!-- FlexSlider -->
<script defer src="{{ asset('js/front/jquery.flexslider.js') }}"></script>
<script>
    $(window).on('load',function() {
        'use strict';
        $('#carousel_slider').flexslider({
            animation: "slide",
            rtl: true,
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 280,
            itemMargin: 25,
            asNavFor: '#slider'
        });
        $('#slider').flexslider({
            animation: "fade",
            rtl: true,
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel_slider",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>	

@yield('script')