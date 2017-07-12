(
	function($){
		var total = 0;
		window.getPrice = function(){
			return total;
		};
		//Submit Form
		var cf = $('#send-registration');
		cf.on("submit", function (event) {
			dialog.dialog("open");
			event.preventDefault();
			var self = $(this), text;
			var values = [];
			$('input').each(function() {
				if($(this).is(':checkbox') == false && $(this).is(':radio') == false)
					values.push(encodeURIComponent($(this).attr("name")) + "=" + encodeURIComponent($(this).val()));
			});
			//Append Checkbox
			var checkbox = $('input[type="checkbox"]:checked, input[type="radio"]:checked');
			$(checkbox).each(function() {
				values.push(encodeURIComponent($(this).attr("name")) + "=" + encodeURIComponent($(this).val()));
			});
			//Append Mr
			values.push("signature" + "=" + $('#signature').find(":selected").text());
			var request = $.ajax({
				url: Drupal.settings.basePath + "node/set/register",
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
					//Payment buttons
					if($.inArray("payment-type", errors) !== -1){
						$('.payment-main').addClass("error-cont");
					}
					//Ticket buttons
					if($.inArray("ticket-type", errors) !== -1){
						$('.main-type-ticket').addClass("error-cont");
					}
					//
					if($.inArray("stay-in-hotel", errors) !== -1){
						$('.stay-in-hotel').addClass("error-cont");
					}
					if($.inArray("shuttle-airport", errors) !== -1){
						$('.shuttle-airport').addClass("error-cont");
					}
					if($.inArray("conference-trip", errors) !== -1){
						$('.conference-trip').addClass("error-cont");
					}
				}else{
					window.showDetailsDialog();
				}
			}, function () {});
		});

		$('.button_type_1').click(
			function(){
				if($(this).hasClass(".hidden"))
					return;

				//Find main cont
				var $cont = $(this).closest(".group-button");
				var oppositeClass = $cont.parent().hasClass("perc") ? "stone-change" : "perc";
				var wantsDisable = $(this).hasClass("selected");
				var beforeActionSelectedItem = $(".group-button.payment .button_type_1.selected");

				//Update selected
				if(wantsDisable){
					$(this).removeClass("selected");
				}else{
					$cont.find('.button_type_1').removeClass("selected");
					$(this).addClass("selected");
				}

				//Find Type
				var selectedItem = $(".group-button.payment .button_type_1.selected");
				var $percExist = $('.perc .group-button.payment .selected').length > 0;
				var $stoneChange = $('.stone-change .group-button.payment .selected');
				var $stoneChangeExist = $stoneChange.length > 0;

				var isFree = $('#free-btn-id').hasClass("selected");

				var typeFinder = selectedItem.first();
				if(selectedItem.first().hasClass("free")){
					typeFinder = selectedItem.last();
				}

				var type = "standard";
				if(typeFinder.hasClass("student")){
					type = "student";
				}else if(typeFinder.hasClass("discounted")){
					type = "discounted";
				}

				//Hide Button
				if(selectedItem.length == 1){
					$('.' + oppositeClass).find('.group-button.payment .button_type_1').addClass("hidden");
					$('.' + oppositeClass + ' .' + type).removeClass("hidden");
				}else if(selectedItem.length == 2  && !wantsDisable && beforeActionSelectedItem.length == 2){
					if(!isFree){
						$('.' + oppositeClass).find('.group-button.payment .button_type_1').removeClass("selected");
						$('.' + oppositeClass).find('.group-button.payment .button_type_1').addClass("hidden");
						$('.' + oppositeClass).find('.' + type).addClass("selected");
						$('.' + oppositeClass).find('.' + type).removeClass("hidden");
					}
				}
				if(isFree){
					$cont.find('.button_type_1').removeClass("hidden");
					$('.' + oppositeClass).find('.button_type_1').removeClass("hidden");
				}
				if(wantsDisable){
					if(selectedItem.length == 1){
						$('.' + oppositeClass).find('.button_type_1').removeClass("hidden");
					}
					if(selectedItem.length == 0){
						$(".container-fee").find(".hidden").removeClass("hidden");
					}
				}

				//Update value input
				$(".ticket-type").attr("value", $stoneChangeExist + "," + $percExist + "," + type);
				$(".payment-type").attr("value", $('.payment-methods').find('.selected').attr("id"));

				if($cont.hasClass("payment")){
					var spinnerUrl = Drupal.settings.pathToTheme + "/templates/pages/registrationPage/images/spinner.gif";
					var img = $("<img/>").attr("src", spinnerUrl);
					$('#price-item').html(img);
				}
				$("input[name='free-stonechange-conf']").val(isFree);
				var getPrice = Drupal.settings.basePath + "node/get/ticketCost" + "?free=" + isFree + "&perc=" + $percExist + "&stoneChange=" + $stoneChangeExist + "&type=" + type;
				$.get(getPrice,
					function(price){
						price = price == "null" ? "-" : price;
						$('#price-item').html(price);
						total = price;
					}
				)
			}
		)
	}
)(jQuery);