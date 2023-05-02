/** Fancybox start */
function fancyBoxOn() {
    jQuery('.fancybox').fancybox({
        smallBtn: true,
        transitionEffect: "fade",
        thumbs : {
            autoStart : true
        }
    });
}

function applyFancyGallery(selector, dataAttr, imgSelector) {
    jQuery(selector).each(function(index) {
        let images = jQuery(this).find(imgSelector);

        let attr = `${dataAttr}-${index}`;
        console.log(images)

        jQuery(images).each(function() {
            jQuery(this).attr('data-fancybox', attr);
        });

        jQuery('[data-fancybox*="'+attr+'"]').fancybox({
            smallBtn: true,
            transitionEffect: "fade",
            loop: true,
        });
    });
}


function fancyBoxOff() {
    jQuery('.fancybox').fancybox("destroy");
}
/** Fancybox end */

export {fancyBoxOn, fancyBoxOff, applyFancyGallery};