(
	function($){
		var $dialog = $( "#dialog-form" );

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
			$("input.error").removeClass("error");
			$('#dialog-form .waiting, #dialog-form .error').hide();
			$('#dialog-form .details').show();
			$dialog.dialog("option", "buttons", {Close: window.closeDialog});
			$dialog.on( "dialogclose", window.closeDialog);
		};

		function showDialog(){
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


