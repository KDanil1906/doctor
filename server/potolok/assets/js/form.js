/** Form mask start */
import {mutedBody, clickOverElement} from "./functions.js";
import {form_btns} from "./vars.js";
import {getForm} from "./embed-form-ajax.js";

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
    form_btns.forEach(function (value, key) {

        if (jQuery(key).length) {
            jQuery(key).off('click').on('click', function (e) {
                e.preventDefault();


                let elClass = value;

                jQuery(`.${elClass}`).toggleClass(`${elClass}--opened`)

                mutedBody();
                clickOverElement(jQuery(`.${elClass}`), jQuery(this));

                jQuery('.close__btn').on('click.closeForm', function () {
                    jQuery(`.${elClass}`).removeClass(`${elClass}--opened`)
                    mutedBody();
                    jQuery('.close__btn').off('click.closeForm')
                })
            })
        }
    })
}


export {initFormInput, handlingPopupShow};