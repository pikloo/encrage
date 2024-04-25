// core version + navigation, pagination modules:
import Swiper from 'swiper';

// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener( 'DOMContentLoaded', function() {
	// init Swiper:
	const swiper = new Swiper( '.swiper', {
		// Optional parameters
		direction: 'vertical',
		loop: true,

		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

		// And if we need scrollbar
		scrollbar: {
			el: '.swiper-scrollbar',
		},
	} );

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
