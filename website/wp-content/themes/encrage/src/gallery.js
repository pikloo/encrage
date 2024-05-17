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


const serieGallery = new Swiper(".gallery", {
  // lazy: true,
  spaceBetween: 40,
  grabCursor: true,
  slidesPerView: 1,
  autoHeight: true,
  centeredSlides: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1.5,
      spaceBetween: 30,
    },
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


zoom.on(
  'open',
  event => {
    document.querySelector(".main-header").classList.remove("z-20");
    document.querySelector(".main-header").classList.add("z-0", "duration-100");
  }
)

zoom.on(
  'close',
  event => {
    document.querySelector(".main-header").classList.remove("z-0");
    document.querySelector(".main-header").classList.add("z-20");
  }
)