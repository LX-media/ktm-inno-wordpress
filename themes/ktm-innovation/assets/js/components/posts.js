define(
	['jquery'],
	function($) {
		'use strict';

		var Posts = function() {};
		Posts.init = function() {

        var span    = $(".LxTopLine span");
        var div     = $(".LxNext");
        var i       = $(".LxTopLine span i");
        
        span.click(function() {

            div.toggleClass("active");
            i.toggleClass("rotate");

        });

            
        }
            return Posts;
    }
);