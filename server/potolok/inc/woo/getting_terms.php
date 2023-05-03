<?php

function getWooCatsForSelector() {
	$excludes = getIdsWooSeoCats();

	$categories = get_terms( array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => true,
		'exclude'    => $excludes,
	) );

	return $categories;
}

//get the id of categories that are seo goods
function getIdsWooSeoCats() {
	$excludes    = array_keys( getSettingsAssociationCatPage() );
	$exclude_ids = array();

	foreach ( $excludes as $exclude_slug ) {
		$term = get_term_by( 'slug', $exclude_slug, 'product_cat' );
		if ( $term && ! is_wp_error( $term ) ) {
			$exclude_ids[] = $term->term_id;
		}
	}

	return $exclude_ids;
}