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

function getProductTitle( $product_id ) {
	$product       = get_post( $product_id ); // получаем объект товара
	$product_title = $product->post_title; // получаем заголовок товара

	return $product_title;
}

function checkAccessoryProductToSeoCats() {
	if ( is_singular( 'product' ) ) {
		$product_categories = get_the_terms( get_the_ID(), 'product_cat' );
		if ( $product_categories && ! is_wp_error( $product_categories ) ) {
			$product_category_slug = $product_categories[0]->slug;
			$page_id               = getSettingsAssociationCatPage()[ $product_category_slug ] ?? null;
			if ( $page_id ) {
				return array(
					'type'    => 'seo-product',
					'page_id' => $page_id
				);
			}
		}

		return array(
			'type' => 'product',
		);
	}

	return false;
}

function concatProductImages( $product_id ) {

	$product        = new WC_product( $product_id );
	$attachment_ids = $product->get_gallery_image_ids();

	$image_ids = array();

	if ( get_post_thumbnail_id( $product_id ) ) {
		$image_ids[] = get_post_thumbnail_id( $product_id );
	}


	foreach ( $attachment_ids as $attachment_id ) {
		$image_ids[] = $attachment_id;
	}

	return $image_ids;
}

/** Получение массив атрибутов товара */
function getProductAttrs( $product ) {
	$product_attributes = array();

	$attributes = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );

	foreach ( $attributes as $attribute ) {
		$values = array();

		if ( $attribute->is_taxonomy() ) {
			$attribute_taxonomy = $attribute->get_taxonomy_object();
			$attribute_values   = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

			foreach ( $attribute_values as $attribute_value ) {
				$value_name = esc_html( $attribute_value->name );
				$values[]   = trim( $value_name, "\n\r\t\v\x00" );
			}
		}

		$product_attributes[ 'attribute_' . sanitize_title_with_dashes( $attribute->get_name() ) ] = array(
			'label' => wc_attribute_label( $attribute->get_name() ),
			'value' => $values,
		);
	}

	return $product_attributes;
}

/**
 * @param $id
 * Получает и возвращает данные о видео
 *
 * @return array
 */
function getVideoInfo( $id ) {

	$video_url  = wp_get_attachment_url( $id ); // Получение URL видео
	$video_type = get_post_mime_type( $id ); // Получение MIME-типа (type) видео

	return array(
		'url'  => $video_url,
		'type' => $video_type
	);
}