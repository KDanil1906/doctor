<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


if ( is_array( checkAccessoryProductToSeoCats() ) ) {
	if ( checkAccessoryProductToSeoCats()['type'] === 'seo-product' ) {
		$page_id = checkAccessoryProductToSeoCats()['page_id'];

		$template_slug = get_page_template_slug( $page_id );
		$template      = get_stylesheet_directory() . "/$template_slug";

		echo get_template_part( str_replace( '.php', '', $template_slug ) );
	} else {
//		echo get_template_part( 'template-parts/product' );
		echo get_template_part( 'product' );
	}


}


