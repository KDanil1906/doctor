<?php $data = isset( $args['data'] ) ? $args['data'] : false; ?>

<section class="working-approach">
	<div class="container">
		<div class="working-approach__header">
			<h2 class="sinlge__title">
				<?= $data['more-actions-title']; ?>
			</h2>

			<?php
			$undertitle = $data['more-actions-undertitle'];
			if ( $undertitle ):
				?>
				<div class="single__desc">
					<?= $undertitle; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="working-approach__slider">
		<?php
		$slides = $data['more-actions-items'];
		foreach ( $slides as $slide ):
			?>
			<div class="working-approach__item">
				<div class="working-approach__item-wrap">
					<div class="working-approach__image">
						<?php $image = carbonImageData( $slide['more-actions-item-image'] ); ?>
						<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
					</div>
					<div class="working-approach__textbox">
						<div class="working-approach__textbox-title">
							<?= $slide['more-actions-item-title']; ?>
						</div>
						<div class="working-approach__textbox-desc wp-editor">
							<?= apply_filters( 'the_content', $slide['more-actions-item-desc'] ); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>