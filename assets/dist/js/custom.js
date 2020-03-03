$(function () {

    'use strict';

    function carousel() {
        $('.carousel').carousel({
            interval: 3000
        })
    }

    $( "body" ).delegate( ".myCarousel", "click", function() {
        carousel();
    });

    $(document).ready(function(){
        carousel();
    });

});
