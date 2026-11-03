(function ($) {
  "use strict";

  $(function () {
    var $slider = $(".tsrealm-case-slider");

    if ($slider.length && $.fn.slick) {
      $slider.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: true,
        autoplay: false,
        speed: 450,
        adaptiveHeight: false,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });
    }
  });
})(jQuery);
