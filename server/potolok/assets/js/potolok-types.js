// tabs
import {clickOverElement, mutedBody} from "./functions.js";
import {fancyBoxOn, fancyBoxOff} from "./fancybox.js";

function initPorolokTypesBlock() {
    jQuery('.ustanovka-tabs__wrapper .tab').on('click', function (event) {
        let id = jQuery(this).attr('data-id');

        jQuery(this).parent('.tabs').siblings('.tab_content').find(`.tab-item.active-tab`).hide();
        jQuery(this).parent('.tabs').siblings('.tab_content').find(`.tab-item.active-tab`).removeClass('active-tab');
        jQuery(this).siblings('.tab.active').removeClass('active');
        jQuery(this).addClass('active');

        jQuery(this).parent('.tabs').siblings('.tab_content').find(`.tab-item[id=${id}]`).addClass('active-tab').fadeIn();

        sliderTypeOfPotokokMainOff();
        sliderTypeOfPotokokMainOn();

        sliderTypeOfPotokokNavOff();
        sliderTypeOfPotokokNavOn();
    });

// sliders
    function sliderTypeOfPotokokMainOn() {
        jQuery('.ustanovka-box__slider-wrap').slick({
            asNavFor: '.ustanovka-box__slider-nav',
            prevArrow: '<button class="button prev-button"><span></span></button>',
            nextArrow: '<button class="button next-button"><span></span></button>',
            lazyLoad: 'progressive',
            responsive: [
                {
                    breakpoint: 843,
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
                    }
                },
            ]
        })
    }
    sliderTypeOfPotokokMainOn();

    function sliderTypeOfPotokokMainOff() {
        jQuery('.ustanovka-box__slider-wrap').slick("unslick")
    }

    function sliderTypeOfPotokokNavOn(){
        jQuery('.ustanovka-box__slider-nav').slick({
            focusOnSelect: true,
            arrows: false,
            slidesToScroll: 1,
            slidesToShow: 5,
            lazyLoad: 'progressive',
            asNavFor: '.ustanovka-box__slider-wrap',
        })
    }

    sliderTypeOfPotokokNavOn();

    function sliderTypeOfPotokokNavOff(){
        jQuery('.ustanovka-box__slider-nav').slick("unslick")
    }

// Подсчет общего колличества слайдов
    jQuery('.tab-item').each(function () {
        let slide_all = jQuery(this).find('.ustanovka-box__slider-wrap .slick-slide:not(.slick-cloned)').length
        jQuery(this).find('.slider-counter--all').text(slide_all)

        let slider = jQuery(this).find('.ustanovka-box__slider-wrap')
        let current_slide = jQuery(this).find('.slider-counter--current');

        jQuery(slider).on('afterChange', function (event, slick, currentSlide) {
            let postNumber = currentSlide + 1;
            jQuery(current_slide).text(postNumber)
        });
    })

    // Инициализация слайдера на мобильной версии
    jQuery('.tab_content__mobile-links').slick({
        arrows: false,
        slidesToScroll: 1,
        lazyLoad: 'progressive',
        slidesToShow: 1,
        variableWidth: true,
        infinite: false
    })


    // Обработка клика на карточку в мобильной версии
    jQuery('.btn--show-service-info').on('click', function (e) {
        e.preventDefault()
        let elClass = 'tab-item';

        let block_id = jQuery(this).attr('data-block');
        let block = jQuery(`.tab-item#${block_id}`);

        jQuery(block).addClass('tab-item--opened');
        mutedBody();
        clickOverElement(jQuery(`.${elClass}`), jQuery(this));

        sliderTypeOfPotokokMainOff();
        sliderTypeOfPotokokMainOn();

        fancyBoxOff();
        fancyBoxOn();
    })

    // Обработка клика на "закрыть окно" в модальном окне (мобильная версия)
    jQuery('.tab_content__close').on('click', function () {
        jQuery('.tab-item--opened').removeClass('tab-item--opened');
        mutedBody();
    })
}

export {initPorolokTypesBlock};