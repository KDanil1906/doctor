<?php $data = $args['data'];
?>

<section class="ustanovka">
	<div class="container">
		<div class="ustanovka__inner">
			<?php
			$title = $data['potolok-type-title'];
			if ( $title ):
				?>
				<h2 class="title--small voices__title">
					<?= $title ?>
				</h2>
			<?php endif; ?>
			<?php
			$undetitle = $data['potolok-type-undertitle'];
			if ( $undetitle ):
				?>
				<div class="under-middle-title__desc">
					<?= $undetitle ?>
				</div>
			<?php endif; ?>

			<?php $items = $data['potolok-type-items'] ?>
			<?php if ( $items ): ?>
				<div class="ustanovka__items">
					<div class="ustanovka-tabs__wrapper">
						<div class="tabs">
							<?php
							$counter = 0;
							$data_id = 'potolok-';
							foreach ( $items as $item ): ?>

								<span class="tab <?= $counter == 0 ? 'active' : ''; ?>"
								      data-id="<?= $data_id . $counter ?>"><?= $item['potolok-type-name']; ?></span>

								<?php
								$counter ++;
							endforeach; ?>
						</div>
						<div class="tab_content">
							<div class="tab_content__mobile-links">
								<?php
								$counter = 0;
								$data_id = 'potolok-';
								foreach ( $items as $item ):
									$image = $item['potolok-type-mobile-image']
									?>
									<a href="#" class="btn--show-service-info" data-block="<?= $data_id . $counter ?>">
										<img
											data-src="<?= LOADING_IMAGE?>"
											data-lazy="<?php echo carbonImageData( $image )['url'] ?>"
										     alt="<?php echo carbonImageData( $image )['alt'] ?>" loading="lazy">
										<div class="show-service-info__text">
											<div class="show-service-info__title">
												<?= $item['potolok-type-full-name'] ?>
											</div>
											<div class="show-service-info__price">
												<span>цена с установкой</span>
												<div class="show-service-info__coast">
													<?= $item['potolok-type-price'] ?> руб/м2
												</div>
											</div>
										</div>
									</a>
								<?php endforeach; ?>
							</div>
							<?php
							$counter = 0;
							$data_id = 'potolok-';
							foreach ( $items as $item ): ?>
								<div class="tab-item <?= $counter == 0 ? 'active-tab' : ''; ?>"
								     id="<?= $data_id . $counter ?>">
									<div class="tab_content__close-wrap">
										<div class="tab_content__close"></div>
									</div>
									<div class="ustanovka-box">
										<div class="ustanovka-box__slider">
											<div class="ustanovka-box__slider-wrap">
												<?php foreach ( $item['potolok-type-images'] as $image ): ?>
													<a href="<?php echo carbonImageData( $image )['url'] ?>">
														<img
															data-src="<?= LOADING_IMAGE?>"
															data-lazy="<?php echo carbonImageData( $image )['url'] ?>"
															alt="<?php echo carbonImageData( $image )['alt'] ?>" loading="lazy">
													</a>
												<?php endforeach; ?>
											</div>
											<div class="ustanovka-box__slider-counter">
												<span class="slider-counter--current">1</span>
												<span class="slider-counter--sep">/</span>
												<span class="slider-counter--all"></span>
											</div>
										</div>
										<div class="ustanovka-box__info">
											<h3 class="ustanovka-box__info-title">
												<?= $item['potolok-type-full-name'] ?>
											</h3>
											<div class="ustanovka-box__info-desc">
												<?= $item['potolok-type-desc'] ?>
											</div>
											<div class="ustanovka-box__info-price">
												<span>Стоимость от:</span>
												<div class="ustanovka-box__info-coast">
													<?= $item['potolok-type-price'] ?> руб/м2
												</div>
											</div>
											<div class="ustanovka-box__info-bnt">
												<a class="btn--white measuring-form"
												   type="submit"><?= __( 'Записаться на замер', 'potolok' ) ?></a>
											</div>
										</div>
										<?php if ( count( $item['potolok-type-images'] ) > 1 ): ?>
											<div class="ustanovka-box__slider-nav">
												<?php foreach ( $item['potolok-type-images'] as $image ): ?>
													<div class="ustanovka-box__info-img">
														<img
															data-src="<?= LOADING_IMAGE?>"
															data-lazy="<?php echo carbonImageData( $image )['url'] ?>"
														     alt="<?php echo carbonImageData( $image )['alt'] ?>" loading="lazy">
													</div>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<?php
								$counter ++;
							endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>