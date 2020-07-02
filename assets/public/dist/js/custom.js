$(function() {
    "use strict";

    $(document).ready(function() {
        var url = window.location.href;
        var url_segment = url.split('/');

        console.log(url_segment);

        $(".navbar-nav").children("li").each(function() {
            var link = $(this).children("a").attr("href");
            if(url_segment[4] != "")
                if(link.indexOf(url_segment[4]) > -1){
                   $(this).addClass("active");
                   return;
                } 
        });
    });
})