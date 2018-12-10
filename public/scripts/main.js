(function () {
    'use strict';
    /*jslint browser: true*/
    /*eslint-env browser*/
    /*global $*/

    /* code for menu color change on scroll */
    $(document).scroll(function () {
        if ($(this).scrollTop() < $('.main-nav').height()) {
            $('.main-nav').css('background-color', 'transparent');
        } else {
            $('.main-nav').css('background-color', 'rgba(50, 50, 50, 1)');
        }
    });
    /* code for menu color change on scroll */
}());
