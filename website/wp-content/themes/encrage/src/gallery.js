import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import mediumZoom from 'medium-zoom'

//Swiper
const sliderHome = new Swiper(".slider-home", {
    autoplay: {
        delay: 5000,
      },
      effect: "fade",
});


const postsCarousel = new Swiper(".blogpost-carousel", {
    centeredSlides: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
});

const serieGalleryThumbnails = new Swiper(".thumbnails", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });


const serieGallery = new Swiper(".gallery", {
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
     thumbs: {
        swiper: serieGalleryThumbnails,
      },
});


//Zoom Image

const zoom = mediumZoom(document.querySelectorAll('.release'), {
    scrollOffset: 0,
    background: 'rgba(148, 148, 148, 0.97)',
    margin: 24,
});

const header = document.querySelector('.main-header');

zoom.on(
  'open',
  event => {
    header.style.setProperty("z-index", "0", "important");
  }
)

zoom.on('closed', event => {
  header.style.setProperty("z-index", "10", "important");
})