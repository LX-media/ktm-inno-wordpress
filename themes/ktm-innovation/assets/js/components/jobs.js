define(
	['jquery'],
	function($) {
		'use strict';

		var Jobs = function() {};
		Jobs.init = function() {

        $(window).scroll(function() {
            var counter = $(".LxPercent");

            var top_of_element = $(".LxPercent").offset().top;
            var bottom_of_element = $(".LxPercent").offset().top + $(".LxPercent").outerHeight();
            var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
            var top_of_screen = $(window).scrollTop();
        
            if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
                    counter.easyPieChart({
                    lineWidth: 40,
                    lineCap: "butt",
                    barColor: '#FF6600',
                    trackColor: '',
                    scaleColor: '#dfe0e0',
                    scaleLength: 0,
                    trackWidth: undefined,
                    size: 400,       
                    rotate: 0,
                    animate: {
                        duration: 1000,
                        enabled: true
                    },
                });
            } 
        });    

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