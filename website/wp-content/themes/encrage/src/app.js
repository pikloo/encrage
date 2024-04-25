import Swiper from 'swiper/bundle';
// import 'swiper/swiper-bundle.min.css'

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
} );