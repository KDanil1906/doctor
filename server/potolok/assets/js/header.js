// Handling the header menu click
import {checkOpenedMenus, mutedBody, clickOverElement} from "./functions.js";
import {menus} from "./vars.js";

function initHeaderHandling() {
    jQuery('.header__nav-menu').on('click', function () {
        let innerW = window.innerWidth;
        if (innerW > 768) {
            jQuery('.header__nav-dropdown').toggleClass('header__nav-dropdown--dropped');
        } else {
            let elClass = 'footer__nav-links'
            jQuery(`.${elClass}`).toggleClass(`${elClass}--opened`)
            mutedBody();
            checkOpenedMenus(elClass, menus);
            clickOverElement(jQuery(`.${elClass}`), jQuery(this));
        }
    });

    jQuery('.header__nav-links-btnwrap').on('click', function () {
        let elClass = 'header__nav-links';
        jQuery(`.${elClass}`).toggleClass(`${elClass}--opened`)
        mutedBody();
        checkOpenedMenus(elClass, menus);
        clickOverElement(jQuery(`.${elClass}`), jQuery(this));
    });

    jQuery('.cart-item__text-title').on('click', function () {
        let list = jQuery(this).siblings('ol')
        jQuery(list).slideToggle();
        jQuery(this).toggleClass('cart-item__text-title--target-opened')
    });

    jQuery('.socials__btn').on('click', function () {
        jQuery(this).siblings('.socials__links').toggleClass('socials__links--opened')
    });

    jQuery('.header__nav-links--close-btn').on('click', function () {
        jQuery('.header__nav-links').removeClass('header__nav-links--opened');
        mutedBody();
    })

// Scrolling
    let scrolling_step = 1;
    jQuery(window).scroll(function (event) {
        let scroll = jQuery(window).scrollTop();

        if (scroll - scrolling_step > 50) {
            scrolling_step = scroll;
            jQuery('body').addClass('body--scroller');
        } else if (scroll - scrolling_step < 0) {
            scrolling_step = scroll;
            jQuery('body').removeClass('body--scroller');
        }
    });
}

export {initHeaderHandling}