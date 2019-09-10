require.config({
    baseUrl: "/wp-content/themes/ktm-innovation/assets/js/",

    paths: {
        // helpers
        "jquery"        : "helper/jquery.min",
        "three"         : "helper/three.min",
        "vanta"         : "helper/vanta.net.min",
        "loading"       : "helper/loading-bar",

        // custom js
        "app"           : "app",
        "header"        : "components/header",
        "streams"       : "components/streams",
        "stage"         : "components/stage",
        "pagehead"      : "components/pageHead",
        "posts"         : "components/posts"
    }
});

if (typeof jQuery === 'function') {
    define('jquery', function () { return jQuery; });
}

require([ 'app'], function(App) {
    'use strict';
    var app = new App();
});

