<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/** Получаю description страницы услуги, шаблон которой использует услуга и добавляю к нему имя услуги */
function makeServicesDesc( $id ) {
//	получить id категории
	$terms = get_the_terms( $id, 'product_cat' ); // получаем список категорий товара

	if ( $terms && ! is_wp_error( $terms ) ) {
		$product_cat_slug = $terms[0]->slug; // получаем slug первой категории
	}

	$associate_page = getSettingsAssociationCatPage();
//	получить id страницы
	if ( $product_cat_slug ) {
		$page_id         = $associate_page[ $product_cat_slug ];
		$seo_description = get_post_meta( $page_id, '_yoast_wpseo_metadesc', true );
		$product         = wc_get_product( $id );
		$product_name    = $product->get_name();
		$new_desc        = "$product_name - $seo_description";

		return $new_desc;
	}


	return '';
}