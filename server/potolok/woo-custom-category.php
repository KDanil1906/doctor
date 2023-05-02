<?php get_header(); ?>

<?php
$category = get_queried_object();
$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args     = array(
	'post_type'      => 'product',
	'posts_per_page' => 99,
	'paged'          => $paged,
	'tax_query'      => array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'id',
			'terms'    => $category->term_id,
		),
	),
);
$loop     = new WP_Query( $args );

?>


<div class="services-links">
    <div class="container">
        <div class="services-links__inner">
            <div class="services-links__services">
				<?php foreach ( $loop->posts as $item ): ?>
                    <a href="<?php echo get_permalink( $item->ID ) ?>"
                       class="services-links__item"><?php echo $item->post_title; ?></a>
				<? endforeach; ?>
            </div>
            <?php
            $pagination = paginate_links( array(
	            'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
	            'format' => '?paged=%#%',
	            'current' => max( 1, get_query_var( 'paged' ) ),
	            'total' => $loop->max_num_pages,
	            'prev_text' => '<',
	            'next_text' => '>',
	            'type' => 'array',
	            'before_page_number' => '<span class="page-link">',
	            'after_page_number' => '</span>',
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

            ?>
        </div>

    </div>
</div>

<a href="#" class="to-back-btn"></a>

<?php get_footer(); ?>
