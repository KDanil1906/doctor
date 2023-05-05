function getForm(formName) {
    let ajaxurl = qm_l10n['ajaxurl'];
    let $body_place = jQuery('body');

    var data = {
        action: 'load_form',
        form: formName,
    };

    jQuery($body_place).append('<div class="loader"></div>')


    jQuery.post(ajaxurl, data, function (response) {
        jQuery('.loader').remove()
        jQuery($body_place).append(response)
    });
}

export {getForm};
