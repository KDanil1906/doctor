jQuery(document).ready(function ($) {
    var $product_categories_dropdown = $('#product-categories-dropdown');
    var $product_categories_results = $('.product-layout__items');
    var category_id = $product_categories_dropdown.val();
    let ajaxurl = qm_l10n['ajaxurl'];

    $product_categories_dropdown.change(function () {
        category_id = $product_categories_dropdown.val();
        loadProducts();
    });


    function loadProducts() {
        var data = {
            action: 'load_products_by_category',
            category_id: category_id,
            paged: 1,
        };

        $product_categories_results.html('<div class="loader"></div>');
        $.post(ajaxurl, data, function (response) {
            $product_categories_results.html(response);
            paginationBtnHandler(data, ajaxurl);

        });
    }


    function paginationBtnHandler(data, url) {
        $('.woocommerce-pagination a').on('click', function (e) {
            e.preventDefault();

            var link_url = $(this).attr('href');
            var parts = link_url.split('?');
            var params = new URLSearchParams(parts[1]);
            var paged = params.get('paged');

            data.paged = paged;
            $product_categories_results.html('<div class="loader"></div>');
            $.post(url, data, function (response) {
                $product_categories_results.html(response);

                $('.woocommerce-pagination a').off('click');

                var data = {
                    action: 'load_products_by_category',
                    category_id: $product_categories_dropdown.val(),
                    paged: 1,
                };

                paginationBtnHandler(data, ajaxurl);
            });
        });
    }
});
