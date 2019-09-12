define([
	'jquery',
    'header',
    'owl',
	'loading',
	'three',
	'vanta',
	'streams',
	'stage',
	'pagehead',
	'posts',
	'jobs',
	'easypie',
], function(
	$,
	Header,
	Loading,
	Owl,
	Three,
	Vanta,
	Streams,
	Stage,
	PageHead,
	Posts,
	Jobs,
	EasyPie,
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
		Jobs.init();

		// * ———————————————————————————————————————————————————————— * //
		// * 	components
		// * ———————————————————————————————————————————————————————— * //

	};
	


	return App;
});
