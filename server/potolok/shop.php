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
				<?php
				// Получаем список всех категорий товаров
				$categories = get_terms(array(
					'taxonomy'   => 'product_cat',
					'hide_empty' => true,
				));
				foreach ($categories as $category) {
					echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
				}
				?>
			</select>
			<div id="product-categories-results"></div>
		</div>
		<div class="product-layout__items">
			<div class="products__product">
				<div class="products__product-image">
					<img src="./images/webp_image/main_product_1.webp" loading="lazy" alt="">
				</div>
				<div class="products__product-info">
					<div class="product-info__title">
						Потолочный светильник 20th c.Factory Filament Metal
					</div>
					<div class="product-info__price">
						7200 ₽ <span>/ шт.</span>
					</div>

					<div class="product__link">
						<a href="#" class="btn--no-form" target="_blank">Купить</a>
					</div>
					<a href="#" class="product-info__link text-btns__link">
						Подробнее
					</a>
				</div>
			</div>
			<div class="products__product">
				<div class="products__product-image">
					<img src="./images/webp_image/main_product_1.webp" loading="lazy" alt="">
				</div>
				<div class="products__product-info">
					<div class="product-info__title">
						Потолочный светильник 20th c.Factory Filament Metal
					</div>
					<div class="product-info__price">
						7200 ₽ <span>/ шт.</span>
					</div>

					<div class="product__link">
						<a href="#" class="btn--no-form" target="_blank">Купить</a>
					</div>
					<a href="#" class="product-info__link text-btns__link">
						Подробнее
					</a>
				</div>
			</div>
			<div class="products__product">
				<div class="products__product-image">
					<img src="./images/webp_image/main_product_1.webp" loading="lazy" alt="">
				</div>
				<div class="products__product-info">
					<div class="product-info__title">
						Потолочный светильник 20th c.Factory Filament Metal
					</div>
					<div class="product-info__price">
						7200 ₽ <span>/ шт.</span>
					</div>

					<div class="product__link">
						<a href="#" class="btn--no-form" target="_blank">Купить</a>
					</div>
					<a href="#" class="product-info__link text-btns__link">
						Подробнее
					</a>
				</div>
			</div>
			<div class="products__product">
				<div class="products__product-image">
					<img src="./images/webp_image/main_product_1.webp" loading="lazy" alt="">
				</div>
				<div class="products__product-info">
					<div class="product-info__title">
						Потолочный светильник 20th c.Factory Filament Metal
					</div>
					<div class="product-info__price">
						7200 ₽ <span>/ шт.</span>
					</div>

					<div class="product__link">
						<a href="#" class="btn--no-form" target="_blank">Купить</a>
					</div>
					<a href="#" class="product-info__link text-btns__link">
						Подробнее
					</a>
				</div>
			</div>
		</div>

	</div>
</section>




<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
get_footer(); ?>
