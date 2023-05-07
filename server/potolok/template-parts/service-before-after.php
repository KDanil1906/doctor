<?php
$data  = $args['data'] ?? false;
$turbo = $args['turbo'] ?? false;
?>

<section class="before-after">
	<div class="container">
		<div class="before-after__inner">
			<div class="single__text-header ">
				<?php
				$title = $data['bf-block-title'];
				if ( $title ):
					?>
					<h2 class="sinlge__title">
						<?php echo $title; ?>
					</h2>
				<?php endif; ?>

				<?php
				$desc = $data['bf-block-undertitle'];
				if ( $desc ):
					?>
					<div class="single__desc">
						<?php echo $desc; ?>
					</div>
				<?php endif; ?>
			</div>

			<?php $ba_items = $data['bf-items']; ?>
			<div class="before-after__slider">
				<?php foreach ( $ba_items as $item ): ?>
					<div class="before-after__item">
						<div class="single__text-header-item">
							<?php
							$item_title = $item['bf-item-title'];
							if ( $item_title ):
								?>
								<h2 class="sinlge__title-item">
									<?php echo $item_title; ?>
								</h2>
							<?php endif; ?>

							<?php $item_desc = $item['bf-item-desc'];
							if ( $item_desc ):
								?>
								<div class="single__desc-item">
									<?php echo $item_desc; ?>
								</div>
							<?php endif; ?>
						</div>

						<?php
						$img_before = $item['bf-item-img-before'];
						$img_after  = $item['bf-item-img-after'];
						?>

						<div class="before-after__item-image-box">
							<?php if ( ! $turbo ): ?>
								<a href="<?php echo carbonImageData( $img_before )['url']; ?>"
								   class="before-after__item-img-wrap fancybox">
									<span class="before-after__item-label">До</span>
									<img
										data-src="<?= LOADING_IMAGE ?>"
										data-lazy="<?php echo carbonImageData( $img_before )['url']; ?>"
										alt="<?php echo carbonImageData( $img_before )['alt']; ?>"
										class="before-after__item-img">
								</a>
								<a href="<?php echo carbonImageData( $img_after )['url']; ?>"
								   class="before-after__item-img-wrap fancybox">
									<span class="before-after__item-label">После</span>
									<img
										data-src="<?= LOADING_IMAGE ?>"
										data-lazy="<?php echo carbonImageData( $img_after )['url']; ?>"
										alt="<?php echo carbonImageData( $img_after )['alt']; ?>"
										class="before-after__item-img">
								</a>
							<?php else: ?>
								<a href="<?php echo carbonImageData( $img_before )['url']; ?>"
								   class="before-after__item-img-wrap fancybox">
									<span class="before-after__item-label">До</span>
									<img
										src="<?php echo carbonImageData( $img_before )['url']; ?>"
										alt="<?php echo carbonImageData( $img_before )['alt']; ?>"
										class="before-after__item-img"
										loading="lazy">
								</a>
								<a href="<?php echo carbonImageData( $img_after )['url']; ?>"
								   class="before-after__item-img-wrap fancybox">
									<span class="before-after__item-label">После</span>
									<img
										src="<?php echo carbonImageData( $img_after )['url']; ?>"
										alt="<?php echo carbonImageData( $img_after )['alt']; ?>"
										class="before-after__item-img"
										loading="lazy">
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
			<?php if ( ! $turbo ): ?>
				<div class="before-after__slider-nav">
					<?php foreach ( $ba_items as $item ):
						$img_before = $item['bf-item-img-before'];
						?>
						<div class="before-after__nav-item">
							<img
								data-src="<?= LOADING_IMAGE ?>"
								data-lazy="<?php echo carbonImageData( $img_before )['url']; ?>"
								alt="<?php echo carbonImageData( $img_before )['alt']; ?>">
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>