import {initFormInput, handlingPopupShow, checkRequiredFields, yandexFormsGoals} from "./form.js";
import {initSliders} from "./sliders.js";
import {initHeaderHandling} from "./header.js";
// import {galleryShowMoreBtn} from "./buttons.js";
import {runLinksInit} from "./run_links.js";
import {infoCoockie} from "./coockie.js";
import {fancyBoxOn, applyFancyGallery} from "./fancybox.js";
import {initPorolokTypesBlock} from "./potolok-types.js";
import {numberAnimnate} from "./animations.js";
import {utpBlockHandler} from "./utp-handler.js";
import {form_selectors} from "./vars.js";


jQuery(document).ready(function ($) {
    fancyBoxOn();

    /** Init start */
    let $window = $(window);
    let cart_titles = $('.cart-item__text-title--target')
    $(cart_titles).each(function () {
        let list = $(this).siblings('ol')
        $(list).slideUp();
    });
    /** Init end */

    initFormInput();
    checkRequiredFields();
    initSliders();
    initHeaderHandling();
    // galleryShowMoreBtn();
    handlingPopupShow();
    // handlingAjaxPopupShow();
    runLinksInit();
    infoCoockie();
    initPorolokTypesBlock();
    numberAnimnate();

    applyFancyGallery('.works-items__item', 'our-works-gallery', '.works-items__item-img');
    applyFancyGallery('.ustanovka-box__slider-wrap', 'potolok-types', 'a');
    applyFancyGallery('.example-works', 'example-works-gallery', '.slick-slide:not(.slick-cloned) a ');
    applyFancyGallery('.product__main-slider', 'single-product', '.product__main-slideritem');

    if (jQuery('.welcome-service__top-utp').length) {
        utpBlockHandler()
    }

    // Цель яндекс метрики "отправление формы"
    yandexFormsGoals();

    // Цель яндекс метрики "клик по звонку"
    if ($(window).innerWidth <= 768) {
        $('a[href*="tel:"]').on('click', function () {
            ym(53113441, 'reachGoal', 'clickCall')
        })
    }

    $('a[href*="https://api.whatsapp.com/send/"]').on('click', function () {
        ym(53113441, 'reachGoal', 'whatsAppClick');
    })


    $('a[href*="https://t.me/"]').on('click', function () {
        ym(53113441, 'reachGoal', 'clickTelegram')
    })

});

