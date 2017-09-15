$(document).ready(function() {
    /* Sections Scroll */
    var anchor = $('.js-scroll');

    $(anchor).click(function() {
        scrollToSection();
    });

    //scroll to section when is not the home
    if(! $('#vereadores-list').length ) {
        scrollToSection();
    }
    //images array from banner
    var images = [
        "1.jpg",
        "2.jpg",
        "3.jpg"
    ];

    var capa = $('.cover-container__item');

    //start with 1 because the first image is defined inline
    var current = 1;
    //function that switch banner images 
    function switchImages() {
        // if current is smaller or equal a length array
        if (current <= images.length) {
            //if item exist in array change the image (diferent the undefined)
            if(images[current]) {
                $(capa).css(
                    'background-image', 'url(assets/images/'+images[current]+')'
                );
                current += 1;
            } else {
                //if no set zero for current and exucute the function again
                current = 0;
                switchImages();
            }
        } else {
            //if no set zero for current and exucute the function again
            current = 0;
            switchImages();
        }
    }
    setInterval(function() {
        switchImages();
    },4000)
}); //ready


//header cover effect when scroll
var cover = $('.cover-container__item');
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll > 99) {
        $(cover).addClass('opacity-cover');
        $(cover).css('background-position-y', -(scroll += scroll)/5+'px');
    } else {
        $(cover).removeClass('opacity-cover');
        $(cover).css('background-position-y', 'center');
    }
});

//scroll to section when laod page
function scrollToSection() {
    if(! $('#vereadores-list').length ) {
        $('html,body').animate({
            scrollTop: $('.section').offset().top - 38
        },
    'slow');
    } else {
        $('html,body').animate({
            scrollTop: $('.section').offset().top
        },
    'slow');
    }
}

//menu fixed when scroll is trigger
var menu = $('.menu');
var  windowH = $(window).height();
$(window).scroll(function() {
    var windowScroll = $(window).scrollTop(); 
    if(windowScroll > windowH) {
        $(menu).addClass('menu--fixed');
    } else {
        $(menu).removeClass('menu--fixed');
    }
});