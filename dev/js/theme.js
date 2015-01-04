jQuery(document).ready(function($){
    if ($.fn.headroom !== undefined && $('.share-bar').length) {
        $('.share-bar').headroom({
            "tolerance": 5,
            "offset": 580,
            "classes": {
                "initial": "animated",
                "pinned": "slideUp",
                "unpinned": "slideDown",
                "top": "headroom--top",
                "notTop": "headroom--not-top"
            }
        });
        setTimeout(function () {
            $('.share-bar').css('top', 0);
        }, 300);
    }
});
