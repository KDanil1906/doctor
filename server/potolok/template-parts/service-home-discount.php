<?php
$title = carbon_get_theme_option( 'main-discount-title' );
$image = carbon_get_theme_option( 'main-discount-image' );
?>
<section class="action">
	<div class="container">
		<div class="action__inner">
			<h2 class="action__inner-left">
				<?php echo $title ?>
			</h2>
			<div class="action__inner-right">
				<?php echo do_shortcode( '[wpforms id="2435"]' ); ?>
			</div>
		</div>
	</div>
	<?php if ( $image ): ?>
		<div class="action__image">
			<img src="<?php echo carbonImageData( $image )['url'] ?>"
			     alt="<?php echo carbonImageData( $image )['alt'] ?>" class="action__image-img" loading="lazy">
		</div>
	<?php endif; ?>
</section>
