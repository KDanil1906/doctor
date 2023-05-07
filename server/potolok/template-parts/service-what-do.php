<?php
$data  = $args['data'] ?? false;
$turbo = $args['turbo'] ?? false;
?>

<section class="actions">
	<div class="container">
		<div class="actions__inner">
			<div class="single__text-header">
				<h2 class="sinlge__title">
					<?php echo $data['what-do-title']; ?>
				</h2>

				<?php $desc = $data['what-do-desc'];
				if ( $desc ):
					?>
					<div class="single__desc">
						<?= $desc; ?>
					</div>
				<? endif; ?>
			</div>
			<div class="actions__carts  actions__items-wrapper">
				<?php if ( $data['what-do-do'] ): ?>
					<div class="actions__item-box actions__item-must-do-wrapper">
						<?php $what_do_title = $data['what-do-title-have'];
						if ( $what_do_title ):
							; ?>
							<h3 class="item-must-do-wrapper__title">
								<?php echo __( 'В первую очередь', 'potolok' ) ?>
							</h3>
						<?php endif; ?>
						<div class="item-must-do-wrapper__items">
							<?php foreach ( $data['what-do-do'] as $do ): ?>
								<ul class="actions__carts-item__item">
									<li class="actions__carts-item-title">
										<?php echo $do['what-do-do-title'] ?>
									</li>
								</ul>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( $data['what-do-not-do'] ): ?>
					<div class="actions__item-box actions__item-not-do-wrapper">
						<?php $what_do_title = $data['what-not-do-title-have'];
						if ( $what_do_title ):
							; ?>
							<h3 class="item-not-do-wrapper__title">
								<?php echo __( 'Ни в коем случае не делайте этого', 'potolok' ) ?>
							</h3>
						<?php endif; ?>
						<div class="item-not-do-wrapper__items">
							<?php foreach ( $data['what-do-not-do'] as $not_do ): ?>
								<ul class="actions__carts-item__item">
									<li class="actions__carts-item-title">
										<?php echo $not_do['what-do-not-do-title'] ?>
									</li>
								</ul>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( $data['what-do-we-do'] ): ?>
					<div class="actions__item-box actions__item-we-do-wrapper">
						<?php $what_do_title = $data['what-we-do-title-have'];
						if ( $what_do_title ):?>
							<h3 class="item-we-do-wrapper__title">
								<?php echo __( 'Что мы делаем', 'potolok' ) ?>
							</h3>
						<?php endif; ?>
						<div class="item-we-do-wrapper__items">
							<?php foreach ( $data['what-do-we-do'] as $not_do ): ?>
								<ul class="actions__carts-item__item">
									<li class="actions__carts-item-title">
										<?php echo $not_do['what-do-we-do-title'] ?>
									</li>
								</ul>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( $data['what-do-more-do'] ): ?>
					<div class="actions__item-box actions__item-more-do-wrapper">
						<h3 class="item-more-do-wrapper__title">
							<?php echo __( 'При необходимости', 'potolok' ) ?>
						</h3>
						<div class="item-more-do-wrapper__items">
							<?php foreach ( $data['what-do-more-do'] as $not_do ): ?>
								<ul class="actions__carts-item__item">
									<li class="actions__carts-item-title">
										<?php echo $not_do['what-do-more-do-title'] ?>
									</li>
								</ul>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( ! $turbo ): ?>
				<?php echo get_template_part( 'template-parts/button', 'order' ) ?>
			<?php endif; ?>
		</div>
	</div>
</section>