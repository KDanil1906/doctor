<?php

$data  = $args['data'] ?? false;
$turbo = $args['turbo'] ?? false;

?>

<secrion class="works">
	<div class="container">
		<div class="works__inner">
			<div class="works-text">
				<h2 class="sinlge__title">
					<?= $data['our-works-title'] ?>
				</h2>
				<?php if ( $data['our-works-desc'] ): ?>
					<div class="single__desc">
						<?php echo $data['our-works-desc']; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="works-items">
				<?php foreach ( $data['our-works-items'] as $work ): ?>
					<div class="works-items__item">
						<h2 class="works-items__item-name">
							<?php echo $work['our-works-items-item-name']; ?>
						</h2>
						<div class="works-items__item-body">
							<div class="works-items__item-info">
								<div class="works-items__item-desc">
									<?php echo apply_filters( 'the_content', $work['our-works-items-item-desc'] ); ?>
									<div class="works-items__item-descmore">
										<div class="item-descmore__title">
											<?php echo __( 'В этом проекте задействованы:', 'potolok' ) ?>
										</div>

										<?php if ( $work['our-works-items-item-material'] ): ?>
											<ul class="item-descmore__items">
												<?php foreach ( $work['our-works-items-item-material'] as $material ): ?>
													<li class="item-descmore__item">
														<?php echo $material['our-works-items-item-material-item']; ?>
													</li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
								</div>

								<?php if ( ! $turbo ): ?>
									<div class="works-item__btns">
										<button class="text-btns__link-btn btn">
											<?php echo __( 'Хочу такой же', 'potolok' ) ?>
										</button>
									</div>
								<?php endif; ?>
							</div>
							<?php if ( $work['our-works-items-item-images'] ): ?>
								<div class="works-items__item-imagesbox">
									<div class="works-items__item-images">
										<?php
										$work_images = $work['our-works-items-item-images'];

										if ( ! $turbo ):
											$counter = 0; // счетчик элементов
											?>
											<?php foreach ( $work_images as $key => $image ): ?>
											<?php if ( $counter == 0 ): ?>
												<div class="works-items__item-images-wrap">
												<div class="works-items__item-images-box">
											<?php endif; ?>
											<a href="<?php echo carbonImageData( $image )['url']; ?>"
											   class="works-items__item-img">
												<img src="<?php echo carbonImageData( $image )['url']; ?>"
												     alt="<?php echo carbonImageData( $image )['alt']; ?>"
												     loading="lazy">
											</a>

											<?php
											$counter ++;
											if ( $counter == 3 || $key === count( $work_images ) - 1 ):
												$counter = 0;
												?>
												</div>
												</div>
											<?php endif; ?>
										<?php endforeach; ?>
										<?php else: ?>
											<?php
											$image = $work_images[0]; ?>
											<img src="<?php echo carbonImageData( $image )['url']; ?>"
											     alt="<?php echo carbonImageData( $image )['alt']; ?>"
											     loading="lazy">
											<?= get_template_part( 'template-parts/buttons/phone', 'link' ) ?>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</secrion>