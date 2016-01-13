(function($) {
	//update site title in real time
	wp.customize('blogname', function(value) {
		value.bind(function(newVal) {
			$('#site-title a').html(newVal);
		});
	});

	//update site description in real time
	wp.customize('blogdescription', function(value) {
		value.bind(function(newVal) {
			$('.site-description').html(newVal);
		});
	});

	//update site background color in real time
	wp.customize('background_color', function(value) {
		value.bind(function(newVal) {
			$('body').css('background-color', newVal);
		});
	});
}) (jQuery);