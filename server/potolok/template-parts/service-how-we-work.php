<?php $turbo = $args['turbo'] ?? false; ?>

<?php if ( ! $turbo ): ?>
	<section class="benefits">
		<div class="container">
			<div class="single__text-header">
				<h2 class="sinlge__title">
					<?php echo carbon_get_theme_option( 'how-work-title' ); ?>
				</h2>
			</div>
			<div class="benefits__inner">
				<div class="benefits__items">

					<?php $counter = 1;
					$items         = carbon_get_theme_option( 'how-work-items' );
					foreach ( $items as $item ):
						$image = $item['how-work-items-icon'];
						?>

						<div class="benefits__item">
							<div class="benefits__item-icon">
								<img src="<?php echo carbonImageData( $image )['url'] ?>"
								     alt="<?php echo carbonImageData( $image )['alt'] ?>">
								<?php if ( $counter < count( $items ) ): ?>
									<div class="benefits__item-iconarrow">
										<span></span>
										<span></span>
									</div>
								<?php endif; ?>
							</div>
							<div class="benefits__item-text">
								<div class="benefits__item-title">
									<?php echo $item['how-work-items-title']; ?>
								</div>
								<div class="benefits__item-desc">
									<?php echo $item['how-work-items-desc']; ?>
								</div>
							</div>
						</div>

						<?php
						$counter ++;
					endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>