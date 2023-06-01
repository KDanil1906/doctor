<?php


/**
 * Filters the canonical URL.
 *
 * @param string $canonical The current page's generated canonical URL.
 *
 * @return string The filtered canonical URL.
 */
function prefix_filter_canonical_example( $canonical ) {

	if (strpos($canonical, 'page')) {
		$canonical = explode( 'page', $canonical )[0];
	}

	return $canonical;
}

add_filter( 'wpseo_canonical', 'prefix_filter_canonical_example' );