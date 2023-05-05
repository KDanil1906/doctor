<?php

//Обработка пагинации товаров
function load_products_by_category() {
	$category_id = $_POST['category_id'];

	if ( $category_id == 'all' ) {
		$category_id = getWooCatsForSelector();
		$term_ids = array();

		foreach ( $category_id as $key => $value ) {
			array_push($term_ids, $value->term_id);
		}

		$category_id = $term_ids;
	}

	$paged = $_POST['paged'];
	$args  = array(
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
	$query = new WP_Query( $args );

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
					$image_id = get_post_thumbnail_id();
					?>
					<img src="<?= carbonImageData( $image_id )['url']; ?>" loading="lazy"
					     alt="<?= carbonImageData( $image_id )['alt']; ?>">
				</div>
				<div class="products__product-info">
					<div class="product-info__title">
						<?php the_title(); ?>
					</div>
					<div class="product-info__coast-box">
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
			</div>
			<?php
//			}
		}
		get_template_part( 'template-parts/pagination', '', array( 'query' => $query, 'page' => $paged ) );
		wp_reset_postdata();
	}

	wp_reset_postdata();
	wp_die();
}

add_action( 'wp_ajax_load_products_by_category', 'load_products_by_category' );
add_action( 'wp_ajax_nopriv_load_products_by_category', 'load_products_by_category' );