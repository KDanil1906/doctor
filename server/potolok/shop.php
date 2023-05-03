<?php
/*
Template Name: Комплектующие
Template Post Type: page
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>




<?php get_header();
echo get_template_part( 'template-parts/breadcrumbs' );

?>


<section class="product-layout">
	<div class="container">
		<div class="product-layout__header">
			<h2 class="sinlge__title">
				Комплектующие
			</h2>
		</div>
		<div id="product-categories-filter">
			<select id="product-categories-dropdown">
				<option value="">Все категории</option>
				<!--				<option value="">--><?php //getWooCatsForSelector();?><!--</option>-->
				<?php

				// Получаем список всех категорий товаров
				$categories = getWooCatsForSelector();
				foreach ( $categories as $category ) {
					echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
				}
				?>
			</select>

		</div>
		<div class="product-layout__items">

			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$query = getAllNotSeoProducts( 12, $paged );
			if ( $query->have_posts() ):
				foreach ( $query->posts as $item ):
					$query->the_post();
					?>
					<div class="products__product">
						<div class="products__product-image">
							<?php $image_id = get_post_thumbnail_id(); ?>
							<img src="<?= carbonImageData( $image_id )['url']; ?>" loading="lazy"
							     alt="<?= carbonImageData( $image_id )['alt']; ?>">
						</div>
						<div class="products__product-info">
							<div class="product-info__title">
								<?php the_title(); ?>
							</div>
							<div class="product-info__price">
								<?php echo $product->get_price_html(); ?> <span>/ шт.</span>
							</div>

							<div class="product__link">
								<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="btn--no-form"
								   target="_blank">Купить</a>
							</div>
							<a href="#" class="product-info__link text-btns__link">
								Подробнее
							</a>
						</div>
					</div>
				<?php
				endforeach;
			endif; ?>
		</div>

		<?php
		$pagination = paginate_links( array(
			'base'               => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'             => '?paged=%#%',
			'current'            => max( 1, get_query_var( 'paged' ) ),
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

		?>

	</div>
</section>


<?php get_footer(); ?>