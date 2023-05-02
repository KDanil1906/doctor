<?php

function getReviewsOptionals() {
	return carbon_get_theme_option( 'settings-reviews-companies' );
}

function selectReviewsOptionals() {
	$companies = getReviewsOptionals();
	$result    = array();

	foreach ( $companies as $company ) {
//		settings-reviews-companies-slug
//		settings-reviews-companies-name

		$result[ $company['settings-reviews-companies-slug'] ] = $company['settings-reviews-companies-name'];
	}

	return $result;
}

add_action( 'init', 'getAllWooCategoryes' );
function getAllWooCategoryes() {
	global $wpdb;

	$result = [];

	$table_name     = $wpdb->prefix . 'term_taxonomy';
	$query          = "SELECT * FROM $table_name WHERE taxonomy = 'product_cat'";
	$all_categories = $wpdb->get_results( $query );

	$ids = array();
	foreach ( $all_categories as $cat ) {
		$category_id = $cat->term_id;

		$ids[] .= $category_id;
	}

//	get_pr($ids);

	$table_name     = $wpdb->prefix . 'terms';
	$query          = "SELECT name, slug FROM $table_name WHERE term_id IN (" . implode( ",", $ids ) . ")";
	$all_categories = $wpdb->get_results( $query );

	foreach ( $all_categories as $cat ) {
		$category_name = $cat->name;
		$category_slug = $cat->slug;

		$result[ $category_slug ] = $category_name;
	}

	return $result;
}


function getAllPages() {
	$result = [];
	$pages  = get_pages();

	foreach ( $pages as $page ) {
		$page_id    = $page->ID;
		$page_title = $page->post_title;

		$result[ $page_id ] = $page_title;
	}

	return $result;
}

function getSettingsAssociationCatPage() {
	$result = [];

	$settings = carbon_get_theme_option( 'seo-services' );

	foreach ( $settings as $set ) {
		$result[ $set['seo-services-woocat'] ] = $set['seo-services-page'];
	}


	return $result;
}

function getGeneralServices() {

	$query = new WP_Query( array(
		'post_type' => 'page',
		'nopaging' => true,
		'meta_query' => array(
			array(
				'key' => '_service-general-check-main',
				'value' => 'yes',
			),
		),
	) );

	return $query->posts;
}

function getServicesPostForCarts($exception_id=false) {
	$query = new WP_Query( array(
		'post_type' => 'page',
		'nopaging' => true,
		'post__not_in' => array($exception_id),
		'meta_query' => array(
			array(
				'key' => '_service-general-check-services',
				'value' => 'yes',
			),
		),
	) );

	return $query->posts;
}