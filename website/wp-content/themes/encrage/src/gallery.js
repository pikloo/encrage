import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import mediumZoom from 'medium-zoom'

//Swiper
const sliderHome = new Swiper(".slider-home", {
    autoplay: {
        delay: 5000,
      },
      effect: "fade",
      keyboard: {
        enabled: true,
      },
});


const postsCarousel = new Swiper(".blogpost-carousel", {
    centeredSlides: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      keyboard: {
        enabled: true,
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
