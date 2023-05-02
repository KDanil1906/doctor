jQuery(document).ready(function ($) {
    var $product_categories_dropdown = $('#product-categories-dropdown');
    var $product_categories_results = $('.product-layout__items');
    var category_id = '';

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

        let ajaxurl = qm_l10n['ajaxurl'];

        $product_categories_results.html('<div class="loader"></div>');
        $.post(ajaxurl, data, function (response) {
            $product_categories_results.html(response);
            console.log(response)
            $('.pagination a').on('click', function (e) {
                e.preventDefault();
                var paged = $(this).attr('href');
                data.paged = paged;
                $product_categories_results.html('<div class="loader"></div>');
                $.post(ajaxurl, data, function (response) {
                    // $product_categories_results.html(response);
                    console.log(response)
                });
            });
        });
    }
});
