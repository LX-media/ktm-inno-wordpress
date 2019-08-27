define([
	'jquery',
    'header',
	'particles'
], function(
	$,
	Header,
	Particles
	) {

	var App = function() {

		// * ———————————————————————————————————————————————————————— * //
		// * 	header functions
		// * ———————————————————————————————————————————————————————— * //
		Header.init();

		// * ———————————————————————————————————————————————————————— * //
		// * 	components
		// * ———————————————————————————————————————————————————————— * //

	};
	
	particlesJS.load('particles-js', '/wp-content/themes/ktm-innovation/assets/js/helper/particlesjs-config.json', function() {
		console.log('callback - particles.js config loaded');
	});

	return App;
});
