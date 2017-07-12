/*
/!* ---------------------------------------------------------------------- *!/
/!* FlexSlider jQuery Initializer
 /!* ---------------------------------------------------------------------- *!/
(function ($) {
	var allFlexSliders = [
		{
			'controlsContainer': '.flex-container',
			'animation': 'slide',
			'slideshow': false,
			'slideshowSpeed': 7000,
			'animationSpeed': 600
		}
	];

	$.fn.flexSliderInitializer = function (flexSliderObj) {
		var animation = flexSliderObj.animation;
		var sliderSelector = flexSliderObj.controlsContainer;
		var sliders = $(sliderSelector);
		var players;

		if (sliders.length > 0) {
			sliders.each(function () {
				var sliderElement = this;
				var sliderImages = $(sliderElement).find('img');
				if (sliderImages.length > 0) {

					var firstImageSrc = $(sliderImages[0]).attr('src');
					if (Util.isIE()) {
						firstImageSrc += '?t=' + $.now();
					}

					$.imgpreload(firstImageSrc, function () {
						if (Util.isIE()) {
							$(sliderImages[0]).attr('src', firstImageSrc);
							initSlider(sliderElement);
						} else {
							initSlider(sliderElement);
						}
					});
				}
			});
		}

		function initSlider(sliderElement) {
			var slider = $(sliderElement);
			players = slider.find('iframe');

			var sliderConfig = $.extend({}, {
				smoothHeight: (animation === 'slide'),
				pauseOnHover: true, //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
				video: (animation === 'slide'),
				before: function () {
					pausePlayers();
				}
			}, flexSliderObj);
			slider.fitVids().flexslider(sliderConfig);

			// Swipe gestures support
			if (Modernizr.touch && $().swipe) {
				var next = slider.find('a.flex-next');
				var prev = slider.find('a.flex-prev');

				var doFlexSliderSwipe = function (e, dir) {
					if (dir.toLowerCase() === 'left') {
						next.trigger('click');
					}
					if (dir.toLowerCase() === 'right') {
						prev.trigger('click');
					}
				};

				slider.swipe({
					click: function (e, target) {
						$(target).trigger('click');
					},
					swipeLeft: doFlexSliderSwipe,
					swipeRight: doFlexSliderSwipe,
					allowPageScroll: 'auto'
				});
			}
		}

		function pausePlayers() {
			try {
				if (players.length > 0 && window.$f) {
					players.each(function () {
						$f(this).api('pause');
					});
				}
			} catch (e) {
			}
		}

	};

	function initAllFlexSliders() {
		if ($().flexslider && allFlexSliders) {
			for (var i = 0; i < allFlexSliders.length; i++) {
				$().flexSliderInitializer(allFlexSliders[i]);
			}
		}
	}

	$(document).ready(initAllFlexSliders);

})(jQuery);*/
