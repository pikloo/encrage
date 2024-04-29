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

// Scroll to top
const backToTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
   
 };

const toTopButtons = document.querySelectorAll(".to-top");
toTopButtons.forEach(function(button) { 
    button.addEventListener("click", backToTop);
});

//Zoom Image

const zoom = mediumZoom(document.querySelectorAll('.release'), {
    scrollOffset: 0,
    background: 'rgba(148, 148, 148, 0.97)',
    margin: 24,
});





document.addEventListener( 'DOMContentLoaded', function() {

// Gestion du menu toogle
const menuToogle = document.getElementById( 'menu-toggle' );

// Click the button.
menuToogle.onclick = function() {
	
  // Toggle class "opened". Set also aria-expanded to true or false.
  if ( -1 !== menuToogle.className.indexOf( 'opened' ) ) {
    menuToogle.className = menuToogle.className.replace( ' opened', '' );
    menuToogle.setAttribute( 'aria-expanded', 'false' );
    document.getElementById("sideBar").style.width = "0";
    document.getElementById("sideNav").style.width = "0";
    document.getElementById("sideLinks").style.opacity = "0";
  } else {
    menuToogle.className += ' opened';
    menuToogle.setAttribute( 'aria-expanded', 'true' );
    document.getElementById("sideBar").style.width = "100%";
    document.getElementById("sideNav").style.width = "100%";
    document.getElementById("sideLinks").style.opacity = "1";
   }
    
 };




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




} );

