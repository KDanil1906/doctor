<?php

$exception_id = $args['exception_id'] ?? false;
$title        = $args['title'] ?? false;
$turbo        = $args['turbo'] ?? false;
?>

<section class="other-services">
    <div class="container">
		<?php if ( ! $turbo ): ?>
            <h2 class="title--small">
				<?php if ( $title ): ?>
					<?php echo __( $title, 'potolok' ) ?>
				<?php else: ?>
					<?php echo __( 'Другие услуги', 'potolok' ) ?>
				<?php endif; ?>
            </h2>
		<?php endif; ?>
        <div class="other-services__body">
            <div class="other-services__other-items">

				<?php $services = getServicesPostForCarts( $exception_id );
				foreach ( $services as $service ):
					$page_id = $service->ID;
					$image      = carbon_get_post_meta( $page_id, 'service-general-image' )
					?>

                    <div class="other-items__item">
                        <a href="<?php echo get_permalink( $page_id ) ?>" class="other-items__item-image">
                            <img src="<?php echo carbonImageData( $image )['url']; ?>"
                                 alt="<?php echo carbonImageData( $image )['alt']; ?>"
                                 loading="lazy">
                        </a>
                        <div class="other-items__item-text">
                            <a href="<?php echo get_permalink( $page_id ) ?>" class="other-items__item-texttitle">
								<?php $alter_title = carbon_get_post_meta( $page_id, 'service-general-title-main' );
								if ( $alter_title ) {
									echo $alter_title;
								} else {
									echo $service->post_title;
								}
								?>
                            </a>
                            <div class="other-items__item-textdesc">
								<?php echo carbon_get_post_meta( $page_id, 'service-general-desc' ) ?>
                            </div>
                        </div>
						<?php $price = carbon_get_post_meta( $page_id, 'service-general-price' );
						if ( $price ):
							?>
                            <div class="other-items__item-price">
                                <span class="other-items__item-num">Стоимость услуги от: <span><?= $price; ?> ₽</span></span>
                            </div>
						<?php endif; ?>
                        <div class="other-items__item-buttons">
							<?php if ( ! $turbo ): ?>
                                <button class="other-items__item-application cart-btn" type="button" formaction="#">
									<?php echo __( 'Заявка', 'potolok' ) ?>
                                </button>
							<?php else: ?>
								<?= get_template_part( 'template-parts/buttons/phone', 'link' ) ?>
							<?php endif; ?>

                            <a href="<?php echo get_permalink( $page_id ) ?>"
                               class="other-items__item-more cart-btn--form">
								<?php echo __( 'Подробнее', 'potolok' ) ?>
                            </a>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
</section>