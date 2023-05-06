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
				<option value="all">Все категории</option>
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
			if ( $query->have_posts() ) {
				foreach ( $query->posts as $item ) {
					$query->the_post();

					$params = array(
						'image_id'     => get_post_thumbnail_id(),
						'product_name' => get_the_title(),
						'price'        => $product->get_price_html(),
						'buy_link'     => esc_url( $product->add_to_cart_url() ),
					);

					echo get_template_part( 'template-parts/product', 'cart', $params );

				}
				wp_reset_postdata();
			}

			echo get_template_part( 'template-parts/pagination', '', array( 'query' => $query ) );
			?>
		</div>

	</div>
</section>
<?php get_footer(); ?>
