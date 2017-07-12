jQuery(document).ready(
	function () {
		if (jQuery(".entry-dotted").dotdotdot)
			window.setTimeout(jQuery(".entry-dotted").dotdotdot.bind(jQuery(".entry-dotted"), {}), 500);

		jQuery(window).resize(
			function () {
				jQuery(".entry-dotted").dotdotdot({});
			}
		)
	}
)

