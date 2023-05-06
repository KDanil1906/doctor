import {ajax_btns} from "./assets/js/vars";
import {pasteForm} from "./assets/js/embed-form-ajax";
import {clickOverElement, mutedBody} from "./assets/js/functions";

function handlingAjaxPopupShow() {
    ajax_btns.forEach(function (form, btn) {

        if (jQuery(btn).length) {
            jQuery(btn).off('click').on('click', function (e) {
                e.preventDefault();

                let formName = form.split('-')[0];

                pasteForm(formName, form);
            })
        }
    })
}

function processingPopupShow(elClass) {
    mutedBody();
    clickOverElement(jQuery(`.${elClass}`), jQuery(this));

    jQuery('.close__btn').on('click.closeForm', function () {
        jQuery(`.${elClass}`).removeClass(`${elClass}--opened`)
        mutedBody();
        jQuery('.close__btn').off('click.closeForm')
    })
}