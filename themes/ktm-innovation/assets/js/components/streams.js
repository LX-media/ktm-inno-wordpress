define(
	['jquery'],
	function($) {
		'use strict';

		var Streams = function() {};
		Streams.init = function() {
            
            var stream = $(".LxStreams li");

            stream.hover(
                function() {
                    $( this ).addClass( "hover" );

            
                
                    if($(this).is('[class^=et_pb_menu_page_id]')){
                            var id = $(this).attr("id");
                            console.log(id);

                            var getID = "#" + id;

                

                            var className =  $(getID).attr("class");
                            console.log(className);
                        }else{
                            console.log("nono");
                    }
    

                }, function() {
                    $( this ).removeClass( "hover" );
                }
            );

            console.log("streams");
	
		}

		return Streams;
	}
);