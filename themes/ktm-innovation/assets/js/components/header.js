define(
	['jquery'],
	function($) {
		'use strict';

		var Header = function() {};
		console.log("test");
		Header.init = function() {
			var burger 	= $(".LxBurger");
			var menu 	= $("#LxMenu");
			var facts	= $(".LxHeaderFacts");
			var topMenu	= $("#et-top-navigation");
			var logo	= $("#LxLogo");
			var logoInv	= $("#LxLogoInverted");

			burger.click(function() {
				burger.toggleClass("open");
				menu.toggleClass("active");
				$('body').toggleClass("noScroll");
				facts.toggleClass("menuActive");
				topMenu.toggleClass("menuActive");
				logo.toggleClass("bye");
				logoInv.toggleClass("hello");

			});
	
		}

		return Header;
	}
);