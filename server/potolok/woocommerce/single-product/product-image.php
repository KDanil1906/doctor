<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

$images = concatProductImages( get_the_ID() ); ?>
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
                        src="<?= NOIMAGE_URL; ?>"
                        alt="<?= NOIMAGE_ALT; ?>"
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
