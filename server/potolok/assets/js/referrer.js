jQuery(document).ready(function () {
    let previousPageUrl = document.referrer;

    if (previousPageUrl) {
        let btn_back = jQuery('.to-back-btn');
        if (btn_back) {
            jQuery(btn_back).attr('href', previousPageUrl);
        } else {
            jQuery(btn_back).remove();
        }
    }
})