( function( $ ) {

	"use strict";
	
	jQuery(document).ready(function() {	

		$('.main-navigation').meanmenu({
			meanMenuContainer: '.menu-container',
			meanScreenWidth: "768",
			meanRevealPosition: "right",
		});
		
		jQuery('.sticky-section').theiaStickySidebar({
	        additionalMarginTop: 0
	    });

		$( '#scroll-top' ).click( function() {
			$('html, body').animate({ scrollTop: 0 }, 600);
			return false;
		});

		$( '.search-icon' ).click( function() {
			$( '.search-form-container' ).fadeToggle();
		} );
		$('.ticker-news-carousel').owlCarousel({
			items: 1,
			animateOut: 'fadeOutUp',
			animateIn: 'fadeInUp',
			autoplay: true,
			loop: true,
			nav: false
		});

		$( '.highlight-carousel' ).owlCarousel({
			items: 2,
			animateIn: 'fadeIn',
			autoplay: true,
			loop: true,
			responsive: {
				0 : {
					items: 1
				},
				767: {
					items: 2
				},
				991 : {
					items: 2
				},
				1199 : {
					items: 3
				}
			}
		});

		$( '.highlight-left-carousel' ).owlCarousel({
			items: 1,
			autoplay: true,
			loop: true,
			nav: true,
		});

		$( '.news-section-carousel' ).owlCarousel({
			items: 2,
			animateIn: 'fadeIn',
			autoplay: true,
			loop: false,
			nav: true,
			rewind: true,
			responsive: {
				0 : {
					items: 1
				},
				767: {
					items: 2
				},
				991 : {
					items: 2
				},
				1199 : {
					items: 2
				}
			}
		})
	});

	$(window).scroll( function() {
		if ($(this).scrollTop() > 100) {
			$( '.scroll-top' ).fadeIn(600);  
		} else {
			$( '.scroll-top' ).fadeOut(600);
		}
	});


} ) ( jQuery );