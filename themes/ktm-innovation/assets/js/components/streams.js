define(
	['jquery'],
	function($) {
		'use strict';

		var Streams = function() {};
		Streams.init = function() {


            var img     = $("#StreamsImage");
            var streams = $(".LxStreams");        
            var stream  = $(".LxStreams li");
            var link    = $(".LxStreams li a");
            var lenght;


            var src = img.attr('src');
            console.log(src);
            streams.css("background-image", "url(" + src + ")");

            stream.each(function(){
                var text = $(this).find("a").html();
                var lenghtCheck = text.split(" ");
                var height = $(this).height();

                if ((lenghtCheck.length >= 2) && (height > 60)) {
                    var first = lenghtCheck[0];
                    var word = "<li><a>" + first + "</a></li>";
                
                    var cloned =  $(this).clone();
                    $('.hiddenmenu').html(word);
                    lenght = $('.hiddenmenu a').width();
                
                    $('.hiddenmenu').remove();
                    $(this).find(".line").css("left", lenght+20 + "px");

                    var li = $(this).width();
                    var exc = $(this).find(".excerpt").width();
                    var line = li - lenght - exc;
    
                }else{
                    var href = $(this).find("a").width();
                    $(this).find(".line").css("left", href+20 + "px");

                    var li = $(this).width();
                    var exc = $(this).find(".excerpt").width();
                    var line = li - href - exc;    
                }
            });

            stream.hover(
                function() {
                    var text = $(this).find("a").html();
                    var lenghtCheck = text.split(" ");
                    var height = $(this).height();

                    $(this).find("a").css("color", "#FF6600");
    
                    if ((lenghtCheck.length >= 2) && (height > 60)) {                            
                        $(this).find(".line").css("left", lenght+20 + "px");
    
                        var li = $(this).width();
                        var exc = $(this).find(".excerpt").width();
                        var line = li - lenght - exc;

                        $(this).find(".line").css("width", line-40 + "px");
                    }else{
                        var href = $(this).find("a").width();
                        $(this).find(".line").css("left", href+20 + "px");
                        var li = $(this).width();
                        var exc = $(this).find(".excerpt").width();
                        var line = li - href - exc;
    
                        $(this).find(".line").css("width", line-40 + "px");
                    }

                    $(this).find(".excerpt").addClass("active");

                }, function() {
                    $(this).find(".line").css("width", "0");
                    $(this).find(".excerpt").removeClass("active");
                    $(this).find("a").css("color", "");
                }
            );
		}

		return Streams;
	}
);