$(document).ready(function() {
    /* Sections Scroll */
    var anchor = $('.js-scroll');

    $(anchor).click(function() {
        scrollToSection();
    });

    //scroll to section when is not the home
    if(! $('#vereadores-list').length ) {
        scrollToSection();
        console.log('true');
    }

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

function scrollToSection() {
    $('html,body').animate({
        scrollTop: $('.section').offset().top
    },
    'slow');
}