(
	function($){
		var $dialog = $( "#dialog-form" );

		var selectCorrectPaypalItem = function(){
			var prices = {};
			prices["p50"] = "A";
			prices["p80"] = "B";
			prices["p100"] = "C";
			prices["p150"] = "D";
			prices["p200"] = "E";
			prices["p250"] = "F";
			prices["p300"] = "G";
			prices["p350"] = "H";
			prices["p400"] = "I";
			prices["p450"] = "L";
			var price = window.getPrice();
			$("input[name='os0']").val(prices["p" + price]);
		};

		var getQP = function(name){
			name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
			var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
				results = regex.exec(location.search);
			return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
		};

		window.hideWaiting = function(){
			$('#dialog-form .waiting').hide();
		};

		window.hideAll = function(){
			$('#dialog-form .details, #dialog-form .error').hide();
			$('#dialog-form .waiting').show();
		};

		window.closeDialog = function(){
			document.location.href = Drupal.settings.basePath;
		};

		window.showErrorsDialog = function(){
			window.hideAll();
			window.hideWaiting();
			$('#dialog-form .error').show();
			$("input.error").removeClass("error");
		};

		window.showDetailsDialog = function(){
			window.hideAll();
			window.hideWaiting();
			var useCreditCard = $('.payment-methods').find('.selected').attr("id") == "credit-card";
			var usePhone = $('.payment-methods').find('.selected').attr("id") == "by-phone";
			var usePaypal = $('.payment-methods').find('.selected').attr("id") == "by-paypal-credit-cards";
			var isFree = $(".group-button.payment .button_type_1.selected").hasClass("free");
			$("input.error").removeClass("error");
			$('#dialog-form .waiting, #dialog-form .error').hide();
			if(useCreditCard)
				$('#dialog-form .details-credit-card').show();
			else if(usePaypal)
				$('#dialog-form .details-paypal').show();
			else if(usePhone)
				$('#dialog-form .details-phone').show();
			else if(isFree)
				$('#dialog-form .details-free').show();
			else
				$('#dialog-form .details-bank').show();
			//Show close only if payment is different by paypal.
			if(!usePaypal)
				$dialog.dialog("option", "buttons", {Close: window.closeDialog});
			$dialog.on( "dialogclose", window.closeDialog);
			selectCorrectPaypalItem();
		};

		function showDialog(){
			if(getQP("payment") == "ok"){
				var $okPayment = $("#thx-payment");
				$("#thx-payment").show();
				$okPayment.dialog({
					width: 550,
					resizable: true,
					modal: false,
					position: {my: "center top"}
				});
			}

			window.dialog = $dialog.dialog({
				width: 550,
				resizable: true,
				modal: true,
				closeOnEscape:false,
				autoOpen: false
			});
			$dialog.on( "dialogbeforeclose", window.hideAll);
		}
		$(document).ready(showDialog);
	}
)(jQuery);


