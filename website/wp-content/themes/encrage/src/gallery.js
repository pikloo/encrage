import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import mediumZoom from 'medium-zoom'

//Swiper
const sliderHome = new Swiper(".slider-home", {
  lazy: true,
  loop: true,
  grabCursor: true,
  autoplay: {
    delay: 5000,
  },
  effect: "fade",
  keyboard: {
    enabled: true,
  },
});


const postsCarousel = new Swiper(".blogpost-carousel", {
  lazy: true,
  centeredSlides: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  keyboard: {
    enabled: true,
  },
  injectStyles: [`.swiper-wrapper { align-items: center }`],
});

const serieGalleryThumbnails = new Swiper(".thumbnails", {
  lazy: true,
  spaceBetween: 10,
  slidesPerView: 4,
  grabCursor: true,
  freeMode: true,
  watchSlidesProgress: true,
  

});


const serieGallery = new Swiper(".gallery", {
  lazy: true,
  spaceBetween: 10,
  grabCursor: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: serieGalleryThumbnails,
  },
  keyboard: {
    enabled: true,
  },
});


//Zoom Image

const zoom = mediumZoom(document.querySelectorAll('.release'), {
  scrollOffset: 0,
  background: 'rgba(148, 148, 148, 0.97)',
  margin: 24,
});
