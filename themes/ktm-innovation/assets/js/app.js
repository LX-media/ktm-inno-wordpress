define([
	'jquery',
    'header',
	// 'particles',
	'three',
	'vanta',
	'streams',
	'stage',
	'pagehead'
], function(
	$,
	Header,
	// Particles,
	Three,
	Vanta,
	Streams,
	Stage,
	PageHead
) {

	var App = function() {

		// * ———————————————————————————————————————————————————————— * //
		// * 	header functions
		// * ———————————————————————————————————————————————————————— * //
		Header.init();
		Streams.init();
		Stage.init();
		PageHead.init();

		// * ———————————————————————————————————————————————————————— * //
		// * 	components
		// * ———————————————————————————————————————————————————————— * //

	};
	
	// particlesJS.load('particles-js', '/wp-content/themes/ktm-innovation/assets/js/helper/particlesjs-config.json', function() {
	// 	console.log('callback - particles.js config loaded');
	// });


	return App;
});
