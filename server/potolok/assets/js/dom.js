function modifyTitleForMobile() {
    jQuery('.mobile-title--small').each(function () {
        if (jQuery(this).text()) {
            jQuery(this).parent('.title--small').addClass('title--small-mobile-active')
            jQuery(this).addClass('mobile-title--small-active')
        }
    })
}

export {modifyTitleForMobile};