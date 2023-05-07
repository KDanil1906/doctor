<?php
$data  = $args['data'] ?? false;
$turbo = $args['turbo'] ?? false;
?>

<section class="example-works">
	<div class="container">
		<div class="example-works__inner">
			<?php $title = $data['example-work-title'];
			if ( $title ):
				?>
				<h2 class="sinlge__title">
					<?php echo $title; ?>
				</h2>
			<?php endif; ?>
			<div class="example-works__slider-box">
				<?php
				foreach ( $data['example-work-photo'] as $photo ):
					?>
					<?php if ( ! $turbo ): ?>
					<a href="<?php echo carbonImageData( $photo )['url']; ?>" class="example-works__item fancybox">
						<img
							data-src="<?= LOADING_IMAGE ?>"
							data-lazy="<?php echo carbonImageData( $photo )['url']; ?>"
							alt="<?php echo carbonImageData( $photo )['alt']; ?>" class="example-works__img"
							loading="lazy">
					</a>
				<?php else: ?>
					<img
						src="<?php echo carbonImageData( $photo )['url']; ?>"
						alt="<?php echo carbonImageData( $photo )['alt']; ?>" class="example-works__img"
						loading="lazy">
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
