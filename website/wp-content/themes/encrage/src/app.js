import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import mediumZoom from 'medium-zoom'

// init Swiper:
const sliderHome = new Swiper(".slider-home", {
    autoplay: {
        delay: 5000,
      },
      effect: "fade",
    //   fadeEffect: {
    //     crossFade: true,
    //   },
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


// const swiper = new Swiper(".mySwiper", {
//     spaceBetween: 10,
//     slidesPerView: 4,
//     freeMode: true,
//     watchSlidesProgress: true,
//   });

// const swiper2 = new Swiper(".mySwiper2", {
//     spaceBetween: 10,
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
//     thumbs: {
//       swiper: swiper,
//     },
//   });

const zoom = mediumZoom(document.querySelectorAll('.release'), {
    scrollOffset: 0,
    background: 'rgba(148, 148, 148, 0.97)',
    margin: 24,
});


document.addEventListener( 'DOMContentLoaded', function() {
// Menu
//Open Menu
const burger = document.querySelectorAll( '.navbar-burger' );
const menu = document.querySelectorAll( '.navbar-menu' );

if ( burger.length && menu.length ) {
    for ( var i = 0; i < burger.length; i++ ) {
        burger[ i ].addEventListener( 'click', function() {
            for ( let j = 0; j < menu.length; j++ ) {
                menu[ j ].classList.toggle( 'hidden' );
            }
        } );
    }
}
// Close Menu
const close = document.querySelectorAll( '.navbar-close' );
const backdrop = document.querySelectorAll( '.navbar-backdrop' );

if ( close.length ) {
    for ( var i = 0; i < close.length; i++ ) {
        close[ i ].addEventListener( 'click', function() {
            for ( let j = 0; j < menu.length; j++ ) {
                menu[ j ].classList.toggle( 'hidden' );
            }
        } );
    }
}

if ( backdrop.length ) {
    for ( var i = 0; i < backdrop.length; i++ ) {
        backdrop[ i ].addEventListener( 'click', function() {
            for ( let j = 0; j < menu.length; j++ ) {
                menu[ j ].classList.toggle( 'hidden' );
            }
        } );
    }
}

// Scroll to top
const backToTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
   
 };


const toTopButtons = document.querySelectorAll(".to-top");
toTopButtons.forEach(function(button) { 
    button.addEventListener("click", backToTop);
});

} );

