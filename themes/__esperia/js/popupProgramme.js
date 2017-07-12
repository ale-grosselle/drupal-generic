$ = jQuery;
$(document).ready(
	function () {
		var valCookie = Number($.cookie("programme"));
		var isProgrammePage = window.location.href.indexOf("programme") !== -1;
		if(!isProgrammePage && valCookie != 1){
			$("#programme-popup").dialog({
					width: "390",
					title: "Attention please!",
					modal: true,
					show: {
						effect: "blind",
						duration: 1000
					},
					hide: {
						effect: "fade",
						duration: 1000
					}
				}
			);
		}

		$("#see-final-programm").click(
			function(){
				$("#programme-popup").dialog("close");
				$.cookie("programme", 1);
			}
		)
	}
);