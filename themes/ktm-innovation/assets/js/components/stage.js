define(
	['jquery'],
	function($) {
		'use strict';

		var Stage = function() {};
		Stage.init = function() {

            // find the next element (module) and add a safety padding of 5% to inner
            var next = $(".et_pb_row .lxmo_stage").next('.et_pb_module');
            var inner = $(next).find(".et_pb_module_inner");
            inner.css("padding-top", "5%");
            
        }
            return Stage;
    }
);