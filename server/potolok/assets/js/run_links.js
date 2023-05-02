function runLinksInit() {
    // Бегущая строка
    let links_array = [];
    let links = jQuery('.seo-services__running-string');
    let count_links = links.length;
    let rows = 4;
    let count_elems_in_row = Math.ceil((count_links) / rows)
    let counter_wrapper = 1;

    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    jQuery(links).each(
        function (index, element) {
            links_array.push(jQuery(this))

            if ((index + 1) % count_elems_in_row === 0 || index + 1 === count_links) {
                let wrapper = jQuery('<div class="seo-services__links-' + counter_wrapper + '"></div>');

                jQuery(links_array).each(function () {
                    jQuery(wrapper).append(jQuery(this))
                })

                links_array = [];
                jQuery('.seo-services').append(wrapper)
                counter_wrapper++;

            }
        }
    );

    function setTranslateForLinks() {
        jQuery('div[class*="seo-services__links"]').each(function () {
            let inner_width = 0;
            let that = this;

            jQuery(this).children('.seo-services__running-string').each(function () {
                inner_width += jQuery(this).width()
            })


            jQuery(this).css('transition', `none`);
            jQuery(this).css('transform', `translate(0, 0)`);
            setTimeout(function () {
                jQuery(that).css('transform', `translate(-${inner_width}px, 0)`);
                jQuery(that).css('transition', `350s linear`);
            }, 500)
        });
    }

    setTranslateForLinks();

    function resetAnimateLinks() {
        let last_link = jQuery('div[class*=seo-services__links]:last-child > .seo-services__running-string:last-child');
        let width = jQuery(window).innerWidth();

        if (jQuery(last_link).length) {

            setInterval(function () {
                let coors_last_link = jQuery(last_link).offset().left;

                if (width >= coors_last_link) {
                    setTranslateForLinks();
                }
            }, 1000);
        }
    }

    resetAnimateLinks();
}

export {runLinksInit}