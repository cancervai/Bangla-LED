/**
 * Bangla LED Premium — front-end behaviour.
 * Vanilla JS only: mobile navigation, scroll-aware nav surface,
 * and a small reveal-on-scroll touch for section headings.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		/* Mobile menu toggle */
		var toggle = document.getElementById( 'bl-menu-toggle' );
		var menu = document.getElementById( 'bl-mobile-menu' );

		if ( toggle && menu ) {
			toggle.addEventListener( 'click', function () {
				var isOpen = ! menu.hidden;
				menu.hidden = isOpen;
				menu.style.display = isOpen ? 'none' : 'flex';
				toggle.setAttribute( 'aria-expanded', String( ! isOpen ) );
			} );

			/* Close the panel after navigating to an in-page anchor. */
			menu.querySelectorAll( 'a' ).forEach( function ( link ) {
				link.addEventListener( 'click', function () {
					menu.hidden = true;
					menu.style.display = 'none';
					toggle.setAttribute( 'aria-expanded', 'false' );
				} );
			} );
		}

		/* Darken the glass nav once the hero is scrolled past. */
		var nav = document.querySelector( 'nav.glass-nav' );
		if ( nav ) {
			var onScroll = function () {
				nav.style.background = window.scrollY > 40 ? 'rgba(0, 0, 0, 0.7)' : 'rgba(0, 0, 0, 0.35)';
			};
			window.addEventListener( 'scroll', onScroll, { passive: true } );
			onScroll();
		}

		/* If a lead was just submitted, bring the confirmation into view. */
		if ( window.location.search.indexOf( 'lead=success' ) !== -1 ) {
			var booking = document.getElementById( 'booking' );
			if ( booking ) {
				booking.scrollIntoView( { behavior: 'auto', block: 'center' } );
			}
		}
	} );
} )();
