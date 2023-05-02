<?php

$exception_id = array_key_exists( 'exception_id', $args ) ? $args['exception_id'] : false;
$title        = array_key_exists( 'title', $args ) ? $args['title'] : false;
?>

<section class="other-services">
	<div class="container">
		<h2 class="title--small">
			<?php if ( $title ): ?>
				<?php echo __( $title, 'potolok' ) ?>
			<?php else: ?>
				<?php echo __( 'Другие услуги', 'potolok' ) ?>
			<?php endif; ?>
		</h2>
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
						<div class="other-items__item-buttons">
							<button class="other-items__item-application cart-btn">
								<?php echo __( 'Заявка', 'potolok' ) ?>
							</button>
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