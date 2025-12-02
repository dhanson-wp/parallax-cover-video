(function() {
	'use strict';

	wp.domReady(function() {
		// Register block style for Cover block with parallax video
		wp.blocks.registerBlockStyle('core/cover', {
			name: 'has-parallax-video',
			label: 'Parallax Video'
		});
	});
})();

