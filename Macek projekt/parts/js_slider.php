<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
<script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
<script defer src="js/jquery.flexslider-min.js"></script><!-- FlexSlider -->
<script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: false,
            prevText: "&#xf104;",
            nextText: "&#xf105;"
        });

        // Remove preloader
        // https://ihatetomatoes.net/create-custom-preloading-screen/
        $('body').addClass('loaded');
    });
</script>
