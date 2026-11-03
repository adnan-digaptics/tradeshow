(function ($) {
  'use strict';

  $(document).ready(function () {
    $('.bdfab-project-slider').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: true,
      dots: true,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 2800,
      speed: 550,
      pauseOnHover: true,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 4
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  });
})(jQuery);
