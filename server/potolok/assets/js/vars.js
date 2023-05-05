
let menus = [
    jQuery('.footer__nav-links'),
    jQuery('.header__nav-links'),
    jQuery('.form'),
    jQuery('.measurement__form'),
    jQuery('.tab-item'),
    jQuery('.welcome-service__top-utp'),
];

let ajax_menus = [
    jQuery('.product-form--ajax'),
]

const form_btns = new Map([
    [jQuery('.utp-btn__mobile'), 'welcome-service__top-utp'],
    [jQuery('.btn'), 'form'],
    [jQuery('.cart-btn'), 'form'],
    [jQuery('.measuring-form'), 'measurement__form'],
    [jQuery('.footer__nav-links-close'), 'footer__nav-links'],

]);

let ajax_btns = [
    [jQuery('.product-info__link'), 'product-form--ajax'],
]

export {menus, form_btns, ajax_btns, ajax_menus};