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

/** SEO функции  */
require_once get_stylesheet_directory() . '/inc/seo-make-services-desc.php';

add_action( 'carbon_fields_register_fields', 'product_seo' );
function product_seo() {
	require_once get_stylesheet_directory() . '/inc/seo-set-product-desc.php';
}

;


//Обработка пагинации товаров
function load_products_by_category() {
	$category_id = $_POST['category_id'];
	$paged       = $_POST['paged'];
	$args        = array(
		'post_type'      => 'product',
		'posts_per_page' => 12,
		'paged'          => $paged,
		'tax_query'      => array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'    => $category_id,
			),
		),
	);
	$query       = new WP_Query( $args );

//	echo json_encode( $query->posts );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();

			// Получаем объект товара
			$product = wc_get_product( get_the_ID() );

			// Проверяем, есть ли у товара цена и можно ли его купить
//			if ( $product->is_purchasable() && $product->get_price() !== '' ) {
			?>
			<div class="products__product">
				<div class="products__product-image">
					<?php
					// Получаем URL изображения товара
					$image_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' );
					?>
					<img src="<?php echo $image_url; ?>" loading="lazy" alt="">
				</div>
				<div class="products__product-info">
					<div class="product-info__title">
						<?php the_title(); ?>
					</div>
					<div class="product-info__price">
						<?php echo $product->get_price_html(); ?> <span>/ шт.</span>
					</div>

					<div class="product__link">
						<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="btn--no-form"
						   target="_blank">Купить</a>
					</div>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="product-info__link text-btns__link">
						Подробнее
					</a>
				</div>
			</div>
			<?php
//			}
		}
		wp_reset_postdata();
	}

	wp_reset_postdata();
	wp_die();
}

add_action( 'wp_ajax_load_products_by_category', 'load_products_by_category' );
add_action( 'wp_ajax_nopriv_load_products_by_category', 'load_products_by_category' );
