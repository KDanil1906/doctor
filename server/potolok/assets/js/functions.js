import {menus} from "./vars.js";

function mutedBody() {
    let checkOpened = false;

    jQuery(menus).each(function () {
        if (jQuery(this).length) {
            let firstClass = jQuery(this).attr('class').split(' ')[0];

            if (jQuery(this).hasClass(`${firstClass}--opened`)) {
                checkOpened = true;
            }
        }
    })

    if (checkOpened) {
        jQuery('body').addClass('body--muted')
        jQuery('.header').addClass('header--muted')
    } else {
        jQuery('body').removeClass('body--muted')
        jQuery('.header').removeClass('header--muted')
        jQuery(document).off('click.clickOver')
    }
}

function checkOpenedMenus(elClass, menus) {

    menus.forEach(function (el) {
        let elClassList = jQuery(el).attr("class");
        if (elClassList && !el.hasClass(elClass)) {
            elClassList = elClassList.split(/\s+/);
            elClassList.forEach(function (cl) {
                if (cl.indexOf("--opened") >= 0) {
                    jQuery(el).removeClass(cl);
                    jQuery(document).off('click.clickOver')
                }
            });
        }
    });
}


function clickOverElement(el, btn) {

        jQuery(document).off('click.clickOver').on('click.clickOver', function (e, thatEl = el, thatBtn = btn) {
            if (!thatBtn.is(e.target) && !thatEl.is(e.target) && thatEl.has(e.target).length === 0 && thatBtn.has(e.target).length === 0) {
                let classes = jQuery(thatEl).attr('class').split(' ');
                classes.forEach(function (item) {
                    if (~item.indexOf("--opened")) {
                        jQuery(thatEl).removeClass(item)
                    }
                })

                mutedBody();
            }
        });
}

export {mutedBody, checkOpenedMenus, clickOverElement}