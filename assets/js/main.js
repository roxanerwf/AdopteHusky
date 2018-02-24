/*
	Tessellate by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.breakpoints({
		wide: '(max-width: 1680px)',
		normal: '(max-width: 1280px)',
		narrow: '(max-width: 1000px)',
		mobile: '(max-width: 736px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				$body.removeClass('is-loading');
			});

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// CSS polyfills (IE<9).
			if (skel.vars.IEVersion < 9)
				$(':last-child').addClass('last-child');

		// Scrolly links.
			$('.scrolly').scrolly();

		// Prioritize "important" elements on narrow.
			skel.on('+narrow -narrow', function() {
				$.prioritize(
					'.important\\28 narrow\\29',
					skel.breakpoint('narrow').active
				);
			});
			// Carousels.
				$('.carousel').each(function() {

					var	$t = $(this),
						$forward = $('<span class="forward"></span>'),
						$backward = $('<span class="backward"></span>'),
						$reel = $t.children('.reel'),
						$items = $reel.children('article');

					var	pos = 0,
						leftLimit,
						rightLimit,
						itemWidth,
						reelWidth,
						timerId;

					// Items.
						if (settings.carousels.fadeIn) {

							$items.addClass('loading');

							$t.onVisible(function() {
								var	timerId,
									limit = $items.length - Math.ceil($window.width() / itemWidth);

								timerId = window.setInterval(function() {
									var x = $items.filter('.loading'), xf = x.first();

									if (x.length <= limit) {

										window.clearInterval(timerId);
										$items.removeClass('loading');
										return;

									}

									if (skel.vars.IEVersion < 10) {

										xf.fadeTo(750, 1.0);
										window.setTimeout(function() {
											xf.removeClass('loading');
										}, 50);

									}
									else
										xf.removeClass('loading');

								}, settings.carousels.fadeDelay);
							}, 50);
						}
	});
})(jQuery);
