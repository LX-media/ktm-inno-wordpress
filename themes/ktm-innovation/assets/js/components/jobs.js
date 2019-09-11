define(
	['jquery'],
	function($) {
		'use strict';

		var Jobs = function() {};
		Jobs.init = function() {



        $('.LxOwl').owlCarousel({
            loop:true,
            nav:true,
            navText : ["",""],
            dots: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:2
                }
            }
        })
            
        }
            return Jobs;
    }
);