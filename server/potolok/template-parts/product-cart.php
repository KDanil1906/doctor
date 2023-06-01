<?php
$image_id     = $args['image_id'] ?? false;
$product_name = $args['product_name'] ?? false;
$price        = $args['price'] ?? false;
$buy_link     = $args['buy_link'] ?? false;
?>


<div class="products__product">
	<div class="products__product-image">
		<?php if ( $image_id ): ?>
			<img
				src="<?= carbonImageData( $image_id )['url']; ?>"
				loading="lazy"
				alt="<?= carbonImageData( $image_id )['alt']; ?>">
		<?php endif; ?>
	</div>
	<div class="products__product-info">
		<div class="product-info__title">
			<?= $product_name; ?>
		</div>
		<div class="product-info__coast-box">
			<?php if ( $price ): ?>
				<div class="product-info__price">
					<?= $price; ?> <span>/ шт.</span>
				</div>

				<div class="product__link">
					<a href="<?= $buy_link ?>"
					   class="btn--no-form" target="_blank">Купить</a>
				</div>
			<?php endif; ?>

			<button
				class="product-info__link product-info__link--form text-btns__link ">
				Подробнее
			</button>
		</div>
	</div>
</div>