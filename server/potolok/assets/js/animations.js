/** Animate start */
import {onElementInViewport} from "./el-show-tracking.js";

function isScrolledIntoView(jQueryelem, jQuerywindow) {
    let docViewTop = jQuerywindow.scrollTop();
    let docViewBottom = docViewTop + jQuerywindow.height();

    let elemTop = jQueryelem.offset().top;
    let elemBottom = elemTop + jQueryelem.height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function aminatedElemsWalk(elems, animateClass) {
    jQuery(elems).each(function () {
        if (isScrolledIntoView(jQuery(this), jQuerywindow)) {
            jQuery(this).addClass(animateClass)
        }
    })
}


export function startAminatedElemsWalk() {
    jQuery(document).on("scroll", function () {
        aminatedElemsWalk(jQuery('.animate-slide-from-left'), 'animate-slide-from-left--done');
    });
}


// Обработка появления блока с цифрами и запуска анимации
function numberAnimnate() {
    let element = jQuery('.we-in-number__inner');
    if (element.length) {
        onElementInViewport(element, function () {
            let elClass = 'we-in-number__item-value';
            let elClassShowed = `${elClass}--showed`

            if (!jQuery(element).hasClass(elClassShowed)) {
                jQuery(`.${elClass}`).spincrement({
                    from: 0,
                    duration: 2500,
                })

                jQuery(element).addClass(elClassShowed);
            }
        });
    }
}

/** Animate end */
export {numberAnimnate};