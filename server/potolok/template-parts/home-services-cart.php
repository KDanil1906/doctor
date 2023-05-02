<?php
$page_id = isset( $args['page-id'] ) ? $args['page-id'] : get_the_ID();
?>

<section class="services">
	<div class="container">
		<div class="services__inner">
			<div class="title--small">
				<?= $services_title = carbon_get_post_meta( $page_id, 'main-services-title' ); ?>
			</div>
			<div class="services__cart-wrapper">
				<?php $services = getGeneralServices(); ?>

				<?php foreach ( $services as $service ):
					$post_id = $service->ID;
					?>
					<div class="services__cart-item">
						<a href="<?php echo get_permalink( $post_id ) ?>" class="services__cart-title">
							<?php $alter_title = carbon_get_post_meta( $post_id, 'service-general-title-main' );
							if ( $alter_title ) {
								echo $alter_title;
							} else {
								echo $service->post_title;
							}
							?>
						</a>
						<div class="cart-item__image">
							<a href="<?php echo get_permalink( $post_id ) ?>" class="cart-item__image--inner">
								<?php $image_id = carbon_get_post_meta( $post_id, 'service-general-image' ); ?>
								<img src="<?php echo carbonImageData( $image_id )['url']; ?>"
								     alt="<?php echo carbonImageData( $image_id )['alt']; ?>"
								     loading="lazy"
								>
							</a>
						</div>
						<div class="cart-item__text">
							<div class="cart-item__text-wrap">
								<?php $must_do = carbon_get_post_meta( $post_id, 'service-general-do' ); ?>
								<?php if ( $must_do ): ?>
									<div class="cart-item__text-mustdo">
										<div class="cart-item__text-title cart-item__text-title--target">
											<span><?php echo __( 'Первая помощь:', 'potolok' ) ?></span>
											<span class="animate-pointer"></span>
										</div>
										<?php echo apply_filters( 'the_content', $must_do ); ?>
									</div>
								<?php endif; ?>
								<?php $not_do = carbon_get_post_meta( $post_id, 'service-general-notdo' ); ?>
								<?php if ( $not_do ): ?>
									<div class="cart-item__text-notdo">
										<div class="cart-item__text-title cart-item__text-title--target">
											<span><?php echo __( 'Не делайте этого:', 'potolok' ) ?></span>
											<span class="animate-pointer"></span>
										</div>
										<?php echo apply_filters( 'the_content', $not_do ); ?>
									</div>
								<?php endif; ?>
								<div class="cart-item__text-wedo">
									<?php $we_do = carbon_get_post_meta( $post_id, 'service-general-we' ); ?>
									<?php if ( $we_do ): ?>
										<div class="cart-item__text-title">
											<span><?php echo __( 'Что делаем мы:', 'potolok' ) ?></span>
										</div>
										<?php echo apply_filters( 'the_content', $we_do ); ?>
									<?php endif; ?>
									<?php $needed = carbon_get_post_meta( $post_id, 'service-general-needed' ); ?>
									<?php if ( $needed ): ?>
										<div class="cart-item__text-title">
											<span><?php echo __( 'При необходимости:', 'potolok' ) ?></span>
										</div>
										<?php echo apply_filters( 'the_content', $needed ); ?>
									<?php endif; ?>
								</div>
								<?php $warning = carbon_get_post_meta( $post_id, 'service-general-warning' ); ?>
								<?php if ( $warning ): ?>
									<div class="cart-item__text-warning">
										<?php echo apply_filters( 'the_content', $warning ); ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="cart-item__btns">
								<button class="cart-item__btn btn">
									<?php echo __( 'Оставить заявку', 'potolok' ) ?>
								</button>
								<a href="<?php echo get_permalink( $post_id ) ?>"
								   class="product-info__link text-btns__link">
									<?php echo __( 'Подробнее', 'potolok' ) ?>
								</a>
								<?php $phone = carbon_get_theme_option( 'settings-cont-tel' ) ?>
								<a href="tel:<?php echo formatPhone( $phone ); ?>"
								   class="btn--no-form btn-phone"><?php echo __( 'Позвонить', 'potolok' ) ?></a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<?php $all_service_link = get_permalink( 2403 ); ?>
			<a href="<?= $all_service_link; ?>" class="btn--no-form btn__all-services">Все услуги</a>
		</div>
	</div>
</section>