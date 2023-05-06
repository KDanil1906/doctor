<?php

function getAllNotSeoProducts( $num_posts, $paged ) {
	$excludes = getIdsWooSeoCats();


	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => $num_posts,
		'paged'          => $paged,
		'tax_query'      => array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'id',
				'terms'    => $excludes, // массив идентификаторов категорий, которые нужно исключить
				'operator' => 'NOT IN',
			),
		),
	);

	return new WP_Query( $args );
}

function getPostsForMainPage () {
	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => 3,
		'meta_query'     => array(
			array(
				'key'   => '_product-main-page',
				'value' => 'yes',
			),
		),
	);

	return new WP_Query( $args );

}