require.config({
    baseUrl: "/wp-content/themes/ktm-innovation/assets/js/",

    paths: {
        // helpers
        "jquery"        : "helper/jquery.min",
        "three"         : "helper/three.min",
        "vanta"         : "helper/vanta.net.min",
        "loading"       : "helper/loading-bar",
        "owl"           : "helper/owl.carousel.min",
        "easypie"       : "helper/easypiechart",

        // custom js
        "app"           : "app",
        "header"        : "components/header",
        "streams"       : "components/streams",
        "stage"         : "components/stage",
        "pagehead"      : "components/pageHead",
        "posts"         : "components/posts",
        "jobs"          : "components/jobs"
    }
});

if (typeof jQuery === 'function') {
    define('jquery', function () { return jQuery; });
}

require([ 'app'], function(App) {
    'use strict';
    var app = new App();
});

VANTA.NET({
    el: "#vantajs",
    color: 0xff6600,
    backgroundColor: 0xffffff,
    points: 8.00,
    maxDistance: 22.00,
    spacing: 16.00,
    showDots: false
})
