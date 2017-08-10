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

    //normalize  left and right heights
    var vereador = $('.vereador');
    $(vereador).each(function() {
        var left = $(this).find('.vereador__left').height();
        console.log(left);
        var right = $(this).find('.vereador__right').height();
        console.log(right);
        if( left > right ) {
            console.log('maior')
            $('.vereador__right').css('height', left);
        }
    });

});//ready


//header cover effect when scroll
var cover = $('.cover-container__item');
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if( scroll > 99) {
        $(cover).addClass('opacity-cover');
        $(cover).css('transform','scale(1)');
    } else {
        $(cover).removeClass('opacity-cover');
        $(cover).css('transform','scale(1.1)');
    }
});