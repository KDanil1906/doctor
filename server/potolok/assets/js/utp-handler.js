function utpBlockHandler() {
    let utp_block = jQuery('.welcome-service__top-utp');
    if (utp_block.length && jQuery(window).width() > 768) {
        let showUtp = setTimeout(function () {
            jQuery(utp_block).addClass('welcome-service__top-utp--showed')
        }, 1000)
    } else if (utp_block.length && jQuery(window).width() < 768) {
        jQuery(utp_block).removeClass('welcome-service__top-utp--showed')
    }

// Обработка кнопки утп
    let welcome_block = jQuery('.welcome-service');
    let gift_btn = jQuery('.utp-btn__mobile')
    if (jQuery(gift_btn).length) {

        jQuery(gift_btn).on('click', function () {
            jQuery(this).addClass('utp-btn__mobile--clicked');
        })
    }
}

export {utpBlockHandler};