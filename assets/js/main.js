$(document).ready(function() {
    /* Sections Scroll */
    var anchor = $('.js-scroll');

    $(anchor).click(function() {
        var section = $(this).attr('data-scroll');
        console.log(section);
        $('html,body').animate({
            scrollTop: $(section).offset().top},
        'slow');
    });

});//ready


//header cover effect when scroll
var cover = $('.cover-container__item');
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if( scroll > 99) {
        $(cover).addClass('opacity-cover');
    } else {
        $(cover).removeClass('opacity-cover');
    }
});