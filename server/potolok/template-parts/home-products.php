<?php $products = getPostsForMainPage(); ?>

<?php if ( $products->have_posts() ): ?>
	<section class="products">
		<div class="container">
			<div class="title--middle clients__title">
				Комплектующие
			</div>
			<div class="under-middle-title__desc">
				Если хотите сделать ремонт самостоятельно
			</div>
			<div class="products__items-wrap">

				<?php
					while ( $products->have_posts() ) {
						$products->the_post();
						$product = wc_get_product( get_the_ID() );

						$params = array(
							'image_id'     => get_post_thumbnail_id(),
							'product_name' => get_the_title(),
							'price'        => $product->get_price_html(),
							'buy_link'     => esc_url( $product->add_to_cart_url() ),
						);

						echo get_template_part( 'template-parts/product', 'cart', $params );
					}
				wp_reset_postdata();
				?>
			</div>
			<div class="products__all-products">
				<a href="<?= get_permalink( 2402 ); ?>" class="btn--no-form">
					Все товары
				</a>
			</div>
		</div>
	</section>
<?php endif; ?>