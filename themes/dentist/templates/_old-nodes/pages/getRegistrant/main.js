(
	function($){
		//Submit Form
		var cf = $('#send-registration');
		cf.on("submit", function (event) {
			dialog.dialog("open");
			event.preventDefault();
			var values = [];
			$('input, textarea').each(function() {
				values.push(encodeURIComponent($(this).attr("name")) + "=" + encodeURIComponent($(this).val()));
			});
			//Append Mr
			values.push("signature", $('.select_title').html());
			var request = $.ajax({
				url: Drupal.settings.basePath + "node/set/paper",
				type: "post",
				data: values.join("&")
			});

			request.then(function (data) {
				$(".error, .error-cont").removeClass("error, error-cont");
				var errors = data;
				if(errors.length > 0){
					window.showErrorsDialog();
					$(errors).each(
							function(i, value){
								var input = $("input[name='" + value + "']");
								input.addClass("error");
							}
					);
				}else{
					window.showDetailsDialog();
				}
			}, function () {});
		});
	}
)(jQuery);