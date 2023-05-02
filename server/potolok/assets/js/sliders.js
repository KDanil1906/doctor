/** Sliders start */

function initSliders() {
    jQuery('.works-items__item-images').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        // arrows: false,
        autoplay: true,
        autoplaySpeed: 2500,
        fade: true,
        nextArrow: '<button class="works-slide works-slide--next"></button>',
        prevArrow: '<button class="works-slide works-slide--prev"></button>',
    });

    jQuery('.before-after:not(.before-after--ourworks) .before-after__slider').slick({
        arrows: false,
        fade: true,
        asNavFor: '.before-after__slider-nav',
        lazyLoad: 'progressive',
    })

    jQuery('.before-after:not(.before-after--ourworks) .before-after__slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.before-after__slider',
        dots: false,
        centerMode: true,
        infinite: false,
        focusOnSelect: true,
        lazyLoad: 'progressive',
        variableWidth: true,
        prevArrow: '<button class="button prev-button"><span></span></button>',
        nextArrow: '<button class="button next-button"><span></span></button>',
        responsive: [
            {
                breakpoint: 667,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: false,
                }
            },
            {
                breakpoint: 426,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                }
            },
        ]
    });

    /** Скрываю навигацию в случе если слайдов меньше 2 */
    let before_nev_wrappers =  jQuery('.before-after__slider-nav');
    jQuery(before_nev_wrappers).each(function () {
        let count_before_items =  jQuery(this).find('.before-after__nav-item').length

        if (count_before_items <= 1) {
            jQuery(this).css('display', 'none')
        }
    })

    jQuery('.example-works__slider-box').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        focusOnSelect: true,
        prevArrow: '<button class="button prev-button"><span></span></button>',
        nextArrow: '<button class="button next-button"><span></span></button>',
        autoplay: true,
        autoplaySpeed: 2500,
        lazyLoad: 'progressive',
        responsive: [
            {
                breakpoint: 921,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 653,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
        ]
    })
    
    
    jQuery('.voices__reviews').slick({
        prevArrow: '<button class="button prev-button"><span></span></button>',
        nextArrow: '<button class="button next-button"><span></span></button>',
        adaptiveHeight: true,
    });

    jQuery('.our-works__slider').slick({
        infinite: false,
        prevArrow: '<button class="button-works button-works--prev"><span>Предыдущий проект</span></button>',
        nextArrow: '<button class="button-works button-works--next"><span>Следующий проект</span></button>',
    });

    jQuery('.clients__slider-wrap').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        lazyLoad: 'ondemand',
        prevArrow: '<button class="button-clients button-clients--prev"><span>Предыдущий проект</span></button>',
        nextArrow: '<button class="button-clients button-clients--next"><span>Следующий проект</span></button>',
        responsive: [
            {
                breakpoint: 995,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 799,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 628,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
        ]
    });

    jQuery('.working-approach__slider').slick({
        centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        focusOnSelect: true,
        centerPadding: '25%',
        nextArrow: '<button class="working-approach__btn working-approach__btn--next"></button>',
        prevArrow: '<button class="working-approach__btn working-approach__btn--prev"></button>',
        responsive: [
            {
                breakpoint: 1458,
                settings: {
                    centerPadding: '10%',
                }
            },
            {
                breakpoint: 769,
                settings: {
                    centerPadding: '5%',
                }
            },
            {
                breakpoint: 426,
                settings: {
                    centerPadding: '0',
                }
            },
        ]
    });
}

export {initSliders}
/** Sliders end */