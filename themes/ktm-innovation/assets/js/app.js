define([
	'jquery',
    'header',
	'loading',
	'three',
	'vanta',
	'streams',
	'stage',
	'pagehead',
	'posts'
], function(
	$,
	Header,
	Loading,
	Three,
	Vanta,
	Streams,
	Stage,
	PageHead,
	Posts
) {

	var App = function() {

		// * ———————————————————————————————————————————————————————— * //
		// * 	header functions
		// * ———————————————————————————————————————————————————————— * //
		Header.init();
		Streams.init();
		Stage.init();
		PageHead.init();
		Posts.init();

		// * ———————————————————————————————————————————————————————— * //
		// * 	components
		// * ———————————————————————————————————————————————————————— * //

	};
	
	// particlesJS.load('particles-js', '/wp-content/themes/ktm-innovation/assets/js/helper/particlesjs-config.json', function() {
	// 	console.log('callback - particles.js config loaded');
	// });


	return App;
});
