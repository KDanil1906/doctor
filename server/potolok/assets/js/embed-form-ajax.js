import {initFormInput, processingPopupShow, checkRequiredFields, yandexFormsGoals} from "./form.js";
import {mutedBody} from "./functions.js";

function pasteForm(formName, form_selector, btn, productName = '') {
    let ajaxurl = qm_l10n['ajaxurl'];
    let $body_place = jQuery('body');

    var data = {
        action: 'load_form',
        form: formName,
    };

    jQuery($body_place).append('<div class="loader loader--opened"></div>')
    mutedBody();

    jQuery.post(ajaxurl, data, function (response) {
        jQuery('.loader').remove();
        jQuery($body_place).append(response);

        checkRequiredFields();
        yandexFormsGoals();


        jQuery('.wpforms-field-hidden input[id*="wpforms"]').val(productName);


        initFormInput();
        processingPopupShow(form_selector, btn);


        jQuery(form_selector).on('wpformsAjaxSubmitSuccess', function (e, response) {
            setTimeout(function () {
                $(this).remove();
                mutedBody();
            }, 2000)
        });
    });
}

export {pasteForm};
