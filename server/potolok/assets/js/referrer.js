jQuery(document).ready(function () {
    // Редирект страницы "спасибо"
    let href = window.location.href;

    if (href.indexOf("spasibo") >= 0) {

        let domain = href.split('/');
        let refer = `${domain[0]}//${domain[2]}`

        if (document.referrer && document.referrer !== '' && href !== document.referrer) {
            refer = document.referrer;
        }

        setTimeout(function () {
            window.location.href = refer;
        }, 3000)
    }
})