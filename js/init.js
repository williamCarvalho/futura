(function($) {
    $(function() {
        // This is a slide out menu.
        $('.sidenav').sidenav({
            edge: 'right'
        });

        // Add a dropdown list to any button
        $('.dropdown-trigger').dropdown({
            hover: true,
            constrainWidth: false
        });

        // Collapsibles are accordion elements that expand when clicked on
        $('.collapsible').collapsible();

        // Parallax is an effect where the background content or image in this case,
        // is moved at a different speed than the foreground content while scrolling.
        $('.parallax').parallax();

        // Our Carousel is a robust and versatile component that can be an image slider,
        // to an item carousel, to an onboarding experience.
        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });

        if ($('.carousel.autoplay').height()) {
            let carousel = $('.carousel.autoplay');
            var second = carousel.data('second') ?? 2;

            setInterval(function() {
                $('.carousel.autoplay').carousel('next');
            }, second * 1000);
        }

        // Scrollspy is a jQuery plugin that tracks certain elements and which element
        // the user's screen is currently centered on.
        $('.scrollspy').scrollSpy();

        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            mirror: true
        });
    });
})(jQuery);