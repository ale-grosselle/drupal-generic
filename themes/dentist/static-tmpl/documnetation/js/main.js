/**
 * Created by Qammar Zaman on 5/6/2017.
 */


$(document).ready(function () {
    $(".scrolling a").click(function(e) {
        var rel = $(this).attr("href");
        e.preventDefault();
        $('html,body').animate({
            scrollTop: $(rel).offset().top
        },500);
    });

})
