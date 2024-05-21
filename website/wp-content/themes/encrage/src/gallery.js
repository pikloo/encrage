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
  lazy: true,
  grabCursor: true,
  slidesPerView: 1,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  keyboard: {
    enabled: true,
  },
  breakpoints: {
    640: {
      slidesPerView: "auto",
      // centeredSlides: true,
      spaceBetween: 100,
      normalizeSlideIndex: false,
      initialSlide: 0,
    },
  },
  injectStyles: [`.swiper-wrapper { align-items: center, height:100% }`, `.swiper-slide { aheight:100% }`],
  on: {
    snapGridLengthChange:function(){
      if( this.snapGrid.length != this.slidesGrid.length ){
        this.snapGrid = this.slidesGrid.slice(0);
      }
    }
  }
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