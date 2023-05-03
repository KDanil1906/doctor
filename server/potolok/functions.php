<?php
///** Сопоставление категории товара с id страницы(для подставления необходимого шаблона) */
//$mapping_category_to_page = [
//	'sliv-vody'                  => 28,
//	'remont-natyazhnogo-potolka' => 36
//];

/** Различные настройки WP */
require_once get_stylesheet_directory() . '/inc/settings.php';

/** Небольшие DEV функции  */
require_once get_stylesheet_directory() . '/inc/helpers.php';

/** Подключение стилей и скриптов */
require_once get_stylesheet_directory() . '/inc/enqueue_scripts.php';

/** Вспомогательные скрипты вывода данных в шаблонах */
require_once get_stylesheet_directory() . '/inc/functions.php';

/** Различные функции для Carbon */
require_once get_stylesheet_directory() . '/inc/carbon-functions/functions.php';

/** Carbon_Fields_Yoast */
require_once get_stylesheet_directory() . '/inc/carbon-fields-yoast-master/core/Carbon_Fields_Yoast.php';

/** Подключение Carbon Fields */
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once get_stylesheet_directory() . '/inc/carbon/vendor/autoload.php';
	\Carbon_Fields\Carbon_Fields::boot();

	new \Carbon_Fields_Yoast\Carbon_Fields_Yoast;
}

add_action( 'admin_enqueue_scripts', 'crb_enqueue_admin_scripts' );
function crb_enqueue_admin_scripts() {
	wp_enqueue_script( 'potolok-carbon-yoast', get_stylesheet_directory_uri() . '/assets/js/admin-carbon-yoast.js', array( 'carbon-fields-yoast' ) );
}

require_once get_stylesheet_directory() . '/inc/custom-fields/theme-options.php';

add_action( 'carbon_fields_register_fields', 'potolok_register_custom_fields' );
function potolok_register_custom_fields() {
	require_once get_stylesheet_directory() . '/inc/custom-fields/page-meta.php';

}


/** Маршрутизация шаблонов Woo в зависимости от категории товара */
require_once get_stylesheet_directory() . '/inc/woo-template-route.php';

/** Подключение хлебных крошек  */
require_once get_stylesheet_directory() . '/inc/breadcrumbs.php';

function kama_breadcrumbs( $sep = '', $l10n = array(), $args = array() ) {
	$kb = new Kama_Breadcrumbs;
	echo $kb->get_crumbs( $sep, $l10n, $args );
}

/** Регистрация нового меню для  */
require_once get_stylesheet_directory() . '/inc/menus.php';


function custom_category_template( $template ) {
//	Нужно подогнать массив и убедиться что текущая категория в данном массивве
	$categories = array_keys( getSettingsAssociationCatPage() );
	if ( is_tax( 'product_cat', $categories ) ) {
		$template = get_stylesheet_directory() . '/woo-custom-category.php';
	}

	return $template;
}

add_filter( 'template_include', 'custom_category_template', 99 );

/** Woo функции  */
require_once get_stylesheet_directory() . '/inc/woo/getting_terms.php';
require_once get_stylesheet_directory() . '/inc/woo/getting_posts.php';
require_once get_stylesheet_directory() . '/inc/woo/ajax-get-product-for-category.php';

/** SEO функции  */
require_once get_stylesheet_directory() . '/inc/seo-make-services-desc.php';

add_action( 'carbon_fields_register_fields', 'product_seo' );
function product_seo() {
	require_once get_stylesheet_directory() . '/inc/seo-set-product-desc.php';
}

;



