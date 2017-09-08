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
    var images = [
        "cidade.jpg",
        "porto-alegre.jpg",
        "cidade2.jpg",
        "porto-alegre2.jpg"
    ];

    var capa = $('.cover-container__item');

    //current começa com 1 pq a primeira imagem foi setada inline
    var current = 1;
    //função pra trocar os banners
    function switchImages() {
        // se o current for menor ou igual ao tamanho do array
        if (current <= images.length) {
            //se o item existir no array muda a imagem (diferente de undefined)
            if(images[current]) {
                $(capa).css(
                    'background-image', 'url(assets/images/'+images[current]+')'
                );
                current += 1;
            } else {
                //senão seta zero pro current e executa a função dnv
                current = 0;
                switchImages();
            }
        } else {
            //senão seta zero pro current e executa a função dnv
            current = 0;
            switchImages();
        }
    };
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