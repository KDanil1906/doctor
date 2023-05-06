/** Form mask start */
import {mutedBody, clickOverElement} from "./functions.js";
import {form_btns} from "./vars.js";
import {pasteForm} from "./embed-form-ajax.js";

function initFormInput() {
    // jQuery('input[type=tel]').mask('+9-999-999-99-99', {placeholder: "+7 ___ ___ __ __"})
    let options = {
        placeholder: '+7 ___ ___ __ __',
        onKeyPress: function (cep, e, field, options) {
            var masks = ['+7-000-000-00-00', '8-000-000-00-00'];
            let first_symbol = Array.from(cep)[0] != '+' ? Array.from(cep)[0] : Array.from(cep)[1];

            let mask;
            if (first_symbol) {
                if (first_symbol == 7) {
                    mask = masks[0];
                } else {
                    mask = masks[1];
                }
            } else {
                mask = '0-000-000-00-00';
            }

            jQuery('input[type=tel]').mask(mask, options);
        }
    };

    jQuery('input[type=tel]').mask('0-000-000-00-00', options);
}

/** Form mask end */

function handlingPopupShow() {
    form_btns.forEach(function (form_selector, btn) {

        if (jQuery(btn).length) {
            jQuery(btn).off('click').on('click', function (e) {
                e.preventDefault();

                if (checkAjaxForm(form_selector)) {
                    let productName = jQuery(this).parent('.product-info__coast-box').siblings('.product-info__title').text().trim();
                    let formName = form_selector.split('-')[0];
                    pasteForm(formName, form_selector, btn, productName);
                } else {

                    processingPopupShow(form_selector, this);
                }
            })
        }
    })
}

function processingPopupShow(form_selector, btn) {

    let form = jQuery(`.${form_selector}`);

    jQuery(form).toggleClass(`${form_selector}--opened`);

    mutedBody();
    clickOverElement(form, jQuery(btn));

    jQuery('.close__btn').on('click.closeForm', function () {
        if (checkAjaxForm(form_selector)) {
            jQuery(form).removeClass(`${form_selector}--opened`);
            jQuery(form).remove();
        } else {
            jQuery(form).removeClass(`${form_selector}--opened`);
        }

        mutedBody();
        jQuery('.close__btn').off('click.closeForm')
    })
}

function checkAjaxForm(form_selector) {
    return ~form_selector.indexOf("--ajax")
}

export {initFormInput, handlingPopupShow, processingPopupShow, checkAjaxForm};