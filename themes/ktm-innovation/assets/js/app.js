define([
	'jquery',
    'header',
	// 'particles',
	'three',
	'vanta'
], function(
	$,
	Header,
	// Particles,
	Three,
	Vanta
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
	
	// particlesJS.load('particles-js', '/wp-content/themes/ktm-innovation/assets/js/helper/particlesjs-config.json', function() {
	// 	console.log('callback - particles.js config loaded');
	// });


	return App;
});
