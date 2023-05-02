let doc = jQuery(document);
let win = jQuery(window);

doc.ready(function () {

    win.on('YoastSEO:ready', function () {
        new CarbonFieldsYoast();
    });
});