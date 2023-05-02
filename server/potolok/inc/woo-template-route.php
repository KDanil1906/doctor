<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_filter( 'template_include', 'my_custom_template_include' );
function my_custom_template_include( $template ) {
	if ( is_singular( 'product' ) ) {
		$product_categories = get_the_terms( get_the_ID(), 'product_cat' );
		if ( $product_categories && ! is_wp_error( $product_categories ) ) {
			$product_category_slug = $product_categories[0]->slug;
			$page_id = getSettingsAssociationCatPage()[$product_category_slug] ?? null;
			if ( $page_id ) {
				$template_slug = get_page_template_slug( $page_id );
				$template = get_stylesheet_directory() . "/$template_slug";
			}
		}
	}

	return $template;
}
