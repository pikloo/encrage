import Swiper from 'swiper/bundle';

// init Swiper:
const sliderHome = new Swiper(".slider-home", {
    autoplay: {
        delay: 4000,
      },
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
});
