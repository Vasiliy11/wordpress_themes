$(function() {

    $('.slider__wrapper, .news__slider').slick({
        nextArrow: "<button type='button' class='slick-btn slick-next '></button>",
        prevArrow: "<button type='button' class='slick-btn slick-prev '></button>",
        infinite: false,
    });

    $('select').styler();

    
    $('.header__btn-menu').on('click', () => {
        $('.header__menu ul').toggleClass('.active');
    });

});