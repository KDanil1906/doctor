<?php

//Обработка пагинации товаров
function load_products_by_category() {
	$category_id = $_POST['category_id'];

	if ( $category_id == 'all' ) {
		$category_id = getWooCatsForSelector();
		$term_ids    = array();

		foreach ( $category_id as $key => $value ) {
			array_push( $term_ids, $value->term_id );
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
			$product = wc_get_product( get_the_ID() ); ?>

			<?php

			$params = array(
				'image_id'     => get_post_thumbnail_id(),
				'product_name' => get_the_title(),
				'price'        => $product->get_price_html(),
				'buy_link'     => esc_url( $product->add_to_cart_url() ),
			);

			echo get_template_part( 'template-parts/product', 'cart', $params );
		}
		get_template_part( 'template-parts/pagination', '', array( 'query' => $query, 'page' => $paged ) );
		wp_reset_postdata();
	}

	wp_reset_postdata();
	wp_die();
}

add_action( 'wp_ajax_load_products_by_category', 'load_products_by_category' );
add_action( 'wp_ajax_nopriv_load_products_by_category', 'load_products_by_category' );