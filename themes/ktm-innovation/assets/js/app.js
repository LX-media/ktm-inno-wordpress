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
	Jobs
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
