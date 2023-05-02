<?php
$block_title      = carbon_get_theme_option( 'we-in-number-title' );
$block_undertitle = carbon_get_theme_option( 'we-in-number-undertitle' );
$block_elems      = carbon_get_theme_option( 'we-in-number-items' );
$block_bgi        = carbonImageData( carbon_get_theme_option( 'we-in-number-bgi' ) );

?>

<?php if ( $block_elems ): ?>
	<section class="we-in-number">
		<div class="we-in-number__wrapper">
			<div class="we-in-number__back-image">
				<img src="<?= $block_bgi['url'] ?>" alt="<?= $block_bgi['alt'] ?>" loading="lazy">
			</div>
			<?php if ( $block_title ): ?>
				<div class="we-in-number__header">
					<h2 class="sinlge__title">
						<?= $block_title ?>
					</h2>
					<?php if ( $block_undertitle ): ?>
						<div class="single__desc">
							<?= $block_undertitle ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="we-in-number__inner">
				<div class="container">
					<?php foreach ( $block_elems as $element ): ?>
						<div class="we-in-number__item">
							<div class="we-in-number__item-value">
								<?= $element['we-in-number-num'] ?>
							</div>
							<div class="we-in-number__item-title">
								<?= $element['we-in-number-desc'] ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>
	</section>
<?php endif; ?>