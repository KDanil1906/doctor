<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function carbonImageData( $image_id ) {
	$url = wp_get_attachment_image_url( $image_id, 'full' );

	$alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

	return array(
		'url' => $url,
		'alt' => $alt
	);
}

function phoneDecorate( $phone ) {
	return '+' . substr( $phone, 0, 1 ) .
	       ' (' . substr( $phone, 1, 3 ) . ') '
	       . substr( $phone, 4, 3 ) . '-' .
	       substr( $phone, 7, 2 ) . '-' .
	       substr( $phone, 9, 2 );
}

function formatPhone( $phone ) {
	return '+' . $phone;
}

function getProductTitle($product_id) {
	$product = get_post( $product_id ); // получаем объект товара
	$product_title = $product->post_title; // получаем заголовок товара

	return $product_title;
}