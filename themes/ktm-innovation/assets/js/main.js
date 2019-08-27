require.config({
    baseUrl: "/wp-content/themes/ktm-innovation/assets/js/",

    paths: {
        // helpers
        "jquery"        : "helper/jquery.min",
        "particles"     : "helper/particles.min",

        // custom js
        "app"           : "app",
        "header"        : "components/header"
    }
});

if (typeof jQuery === 'function') {
    define('jquery', function () { return jQuery; });
}

require([ 'app'], function(App) {
    'use strict';
    var app = new App();
});

