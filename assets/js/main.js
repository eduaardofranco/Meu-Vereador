$(document).ready(function() {
    /* Sections Scroll */
    var anchor = $('.js-scroll');

    $(anchor).click(function() {
        var section = $(this).attr('data-scroll');
        $('html,body').animate({
                scrollTop: $(section).offset().top
            },
            'slow');
    });
    
    $("[data-fancybox]").fancybox({
    // Options will go here
    });

}); //ready


//header cover effect when scroll
var cover = $('.cover-container__item');
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll > 99) {
        $(cover).addClass('opacity-cover');
    } else {
        $(cover).removeClass('opacity-cover');
    }
});
