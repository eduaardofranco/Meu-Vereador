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
    var images = [
        "cover.jpg",
        "cover.jpg",
        "cover.png",
        "cover2.jpg"
    ];

    var capa = $('.cover-container__item');

    var current = 0;

    function teste() {
        current = current + 1;
        $(capa).css(
            'background-image', 'url(assets/images/'+images[current]+')'
        );
        console.log(current);
    }
    setInterval(function() {
        teste();
    },3000)
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