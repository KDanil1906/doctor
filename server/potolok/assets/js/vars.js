const menus = [
    '.footer__nav-links',
    '.header__nav-links',
    '.form',
    '.measurement__form',
    '.tab-item',
    '.welcome-service__top-utp',
    '.product-form--ajax',
    '.loader--opened',
    '.single-product__form',
];


const form_btns = new Map([
    ['.utp-btn__mobile', 'welcome-service__top-utp'],
    ['.btn', 'form'],
    ['.cart-btn', 'form'],
    ['.measuring-form', 'measurement__form'],
    ['.footer__nav-links-close', 'footer__nav-links'],
    ['.product-info__link--form', 'product-form--ajax'],
    ['.single-product__btn', 'single-product__form'],
]);


// 54 - основная - sendForm1
// 2890 - фитбек на товар - sendForm2
// 2435 - скидка - sendForm3
// 2682 - замер потолка - sendForm4
const form_selectors = [
    'form[data-formid="54"]',
    'form[data-formid="2890"]',
    'form[data-formid="2435"]',
    'form[data-formid="2682"]',
    'form[data-formid="3372"]',
];

export {menus, form_btns, form_selectors};