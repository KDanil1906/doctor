function infoCoockie(){
    if (!localStorage.getItem('cookie-notification')) {
        jQuery('.cookie').addClass('cookie--show');

        jQuery('.cookie-btn').on('click', function () {
            jQuery(this).parent('.cookie').addClass('cookie--hide')
            localStorage.setItem('cookie-notification', 'true');
        })
    }

}

export {infoCoockie};