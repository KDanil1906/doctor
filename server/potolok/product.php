<?php get_header(); ?>

<div class="product">
    <div class="container">
        <div class="product__inner">
			<?php $images = concatProductImages( get_the_ID() ); ?>
            <div class="product__left">
                <div class="product__nav-slider">
					<?php if ( $images ): ?>
						<?php foreach ( $images as $image ): ?>
                            <div class="product__nav-slideritem">
                                <img
                                        src="<?= carbonImageData( $image )['url'] ?>"
                                        alt="<?= carbonImageData( $image )['alt'] ?>"
                                        loading="lazy"
                                >
                            </div>
						<?php endforeach; ?>
					<?php else: ?>
                        <div class="product__nav-slideritem">
                            <img
                                    src="<?= NOIMAGE_URL ;?>"
                                    alt="<?= NOIMAGE_ALT;?>"
                                    loading="lazy"
                            >
                        </div>
					<?php endif; ?>
                </div>
                <div class="product__main-slider">
					<?php if ( $images ): ?>
						<?php foreach ( $images as $image ): ?>
                            <a href="<?= carbonImageData( $image )['url'] ?>" class="product__main-slideritem">
                                <img src="<?= carbonImageData( $image )['url'] ?>"
                                     alt="<?= carbonImageData( $image )['alt'] ?>"
                                     loading="lazy"
                                >
                            </a>
						<?php endforeach; ?>
					<?php else: ?>
                        <a href="<?= NOIMAGE_URL ?>" class="product__main-slideritem">
                            <img src="<?= NOIMAGE_URL ?>"
                                 alt="<?= NOIMAGE_ALT ?>"
                                 loading="lazy"
                            >
                        </a>
					<?php endif; ?>
                </div>
            </div>
            <div class="product__right">
                <div class="product__right-header">
                    <h1 class="product__right-title">
						<?= get_the_title(); ?>
                    </h1>
                    <div class="product__right-price">
						<?php
						$product_id = get_the_ID();
						$product    = wc_get_product( $product_id );
						?>
						<?= $product->price; ?> ₽
                    </div>
					<?php $desc = get_the_content(); ?>
					<?php if ( $desc ): ?>
                        <div class="product__right-desc">
							<?= $desc ?>
                        </div>
					<?php endif; ?>
                    <ul class="product__right-attrs">

						<?php
						$product = new WC_product( get_the_ID() );
						foreach ( getProductAttrs( $product ) as $key => $attrs ):
							?>
                            <li>
                                <span class="product-attr__name"><?= $attrs['label'] ?></span> :
                                <span class="product-attr__price">
                                    <?php foreach ( $attrs['value'] as $index => $value ): ?>
	                                    <?= $value; ?>

	                                    <?php if ( count( $attrs['value'] ) > 1 && $index + 1 !== count( $attrs['value'] ) ): ?>
		                                    <?= ', ' ?>
	                                    <?php endif; ?>

                                    <?php endforeach; ?>
                                </span>
                            </li>
						<?php endforeach; ?>
                    </ul>
                    <div class="product__right-button">
                        <button class="btn single-product__btn">Купить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product__form">
    <div class="close__btn icon-cross"></div>
    <div class="single-product__form-title">
        Оставьте заявку
        <span>мы с вами свяжемся для подтверждения заказа</span>
    </div>
	<?= do_shortcode( '[wpforms id="3372"]' ); ?>
</div>


<?php get_footer(); ?>
