// function galleryShowMoreBtn() {
//     jQuery(window).on('load resize', function () {
//         if (jQuery(window).width() > 1024) {
//             jQuery('.works-items__item-images').each(function () {
//                 let images = jQuery(this).children('.works-items__item-img')
//                 if (jQuery(images).length >= 6) {
//                     let that = jQuery(this);
//                     let btn = jQuery(this).siblings('.works-items__item-imagesmore').children('.works-items__item-more');
//                     jQuery(btn).addClass('works-items__item-more--show');
//
//                     let big_image_height = jQuery(jQuery(images)[0]).height()
//                     let small_image_height = jQuery(jQuery(images)[1]).height()
//                     let number_small_images = jQuery(images).length - 1
//                     let gap = jQuery(this).css('gap').replace('px', '')
//                     let rounded_images = Math.ceil(number_small_images / 2)
//                     let gaps = rounded_images * gap + parseInt(gap)
//                     let max_height = big_image_height + gaps + (small_image_height * rounded_images)
//
//                     jQuery(btn).on('click', function () {
//                         jQuery(that).css('min-height', max_height)
//                     })
//                 }
//             })
//         } else {
//             let btns = jQuery('.works-items__item-more');
//             jQuery(btns).each(function () {
//                 jQuery(this).removeClass('works-items__item-more--show');
//             })
//         }
//     })
// }
//
//
// export {galleryShowMoreBtn}