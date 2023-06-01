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
				<?php endforeach; ?>
            </div>
			<?= get_template_part( 'template-parts/pagination', '', array( 'query' => $loop ) ); ?>
        </div>

    </div>
</div>


<?php if ( isset( $_SERVER['HTTP_REFERER'] ) ) : ?>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="to-back-btn"></a>
<?php endif; ?>

<?php get_footer(); ?>
