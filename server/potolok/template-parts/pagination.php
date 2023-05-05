<?php
$query   = isset( $args['query'] ) ? $args['query'] : array();
$current = isset( $args['page'] ) ? $args['page'] : max( 1, get_query_var( 'paged' ) );

$pagination = paginate_links( array(
	'base'               => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
	'format'             => '?paged=%#%',
	'current'            => $current,
	'total'              => $query->max_num_pages,
	'prev_text'          => '<',
	'next_text'          => '>',
	'type'               => 'array',
	'before_page_number' => '<span class="page-link">',
	'after_page_number'  => '</span>',
) );

if ( ! empty( $pagination ) ) {
	echo '<nav class="woocommerce-pagination">';
	echo '<ul class="page-numbers">';
	foreach ( $pagination as $page_link ) {
		echo '<li>' . $page_link . '</li>';
	}
	echo '</ul>';
	echo '</nav>';
}
