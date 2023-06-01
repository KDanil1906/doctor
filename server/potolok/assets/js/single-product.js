jQuery(document).ready(function ($) {
    $('.product__main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        // asNavFor: '.product__nav-slider'
    });

    $('.product__nav-slider').slick({
        slidesToShow: 3,
        vertical: true,
        slidesToScroll: 1,
        asNavFor: '.product__main-slider',
        focusOnSelect: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 651,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    vertical: false,
                }
            },
            {
                breakpoint: 426,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    vertical: false,
                }
            },
        ]
    })

    // Установка значение в скрытое поле формы
    $('.product__right-button').on('click', function () {
        let value = $('.product__right-title').text().trim();
        $('.single-product__form').find('.input-product-single input').val(value);
    })
})