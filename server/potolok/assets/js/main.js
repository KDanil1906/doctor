import {initFormInput, handlingPopupShow} from "./form.js";
import {initSliders} from "./sliders.js";
import {initHeaderHandling} from "./header.js";
// import {galleryShowMoreBtn} from "./buttons.js";
import {runLinksInit} from "./run_links.js";
import {infoCoockie} from "./coockie.js";
import {fancyBoxOn, applyFancyGallery} from "./fancybox.js";
import {initPorolokTypesBlock} from "./potolok-types.js";
import {numberAnimnate} from "./animations.js";
import {utpBlockHandler} from "./utp-handler.js";


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
    initSliders();
    initHeaderHandling();
    // galleryShowMoreBtn();
    handlingPopupShow()
    runLinksInit();
    infoCoockie();
    initPorolokTypesBlock();
    numberAnimnate();

    applyFancyGallery('.works-items__item', 'our-works-gallery', '.works-items__item-img');
    applyFancyGallery('.ustanovka-box__slider-wrap', 'potolok-types', 'a');

    if (jQuery('.welcome-service__top-utp').length) {
        utpBlockHandler()
    }

});

