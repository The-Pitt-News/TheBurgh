(function($) {
	$('.readmore')
		.addClass('pull-right')
		.after('<br />');

	$('a').each(
		function() {
			var a = new RegExp('/' + window.location.host + '/');
			if(!a.test(this.href)) {
				$(this).click(
					function(event) {
						event.preventDefault();
						event.stopPropagation();
						window.open(this.href, '_blank');
					}
				);
			}
		}
	);

	$('#featured-image video').attr('width', 1200);
	if ($(window).width() <= 1440) {
		$('#featured-image video').attr('width', 795);
	}
	else if ($(window).width() <= 960) {
		$('#featured-image video').attr('width', 640);
	}
	else if ($(window).width() <= 795) {
		$('#featured-image video').attr('width', 350);
	}

	if ($(window).width() <= 1200) {
		$('#featured-image').children('img')
		.attr('class', 'attachment-medium wp-post-image')
		.attr('width', '560')
		.attr('height', '');
	}

	if ($(window).width() <= 979) {
		$('p').after('<br />');
		// $('#featured-image').children('img')
		// .attr('class', 'attachment-large wp-post-image')
		// .attr('width', '720');
	}
}) (jQuery);