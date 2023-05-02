function isElementInViewport(el) {
    let rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function onElementInViewport(el, callback) {
    jQuery(window).on('scroll resize', function() {
        if (isElementInViewport(el[0])) {
            callback();
        }
    });
}

export {onElementInViewport};