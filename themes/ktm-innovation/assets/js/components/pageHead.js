define(
	['jquery'],
	function($) {
		'use strict';

		var PageHead = function() {};
		PageHead.init = function() {

            // find the next element (module) and add a safety padding 
            var next = $(".et_pb_row .lxmo_pagehead").next('.et_pb_module');
            next.css("margin-top", "-80px").css("z-index", "-1");
            
        }
            return PageHead;
    }
);