<?php

$bgi            = $args['bgi'];
$image          = $args['image'];
$title          = $args['title'];
$items          = $args['items'];
$blur           = $args['blur'];
$utp_title      = $args['utp-title'];
$utp_desc       = $args['utp-desc'];
$utp_img_btn    = $args['utp-img-btn'];
$utp_image      = $args['utp-image'];
$general_items  = $args['general-items'];
$general_titles = carbon_get_theme_option( 'general-welcome-items' );
$turbo          = $args['turbo'] ?? false;
?>

<section class="welcome-service">
	<div class="welcome-service__inner">
		<div class="welcome-service__top">
			<?php if ( $blur ): ?>
				<div class="welcome-service__top-bgi">
					<img src="<?php echo carbonImageData( $bgi )['url'] ?>"
					     alt="<?php echo carbonImageData( $bgi )['alt'] ?>"
					     style="
				filter: blur(4px) brightness(50%);
                 width: 102%;
                 height: 102%;
				left: -10px;
				object-position: left -15px bottom 0;
">

				</div>
			<?php else: ?>
			<div class="welcome-service__top-bgi"
			">
			<img src="<?php echo carbonImageData( $bgi )['url'] ?>"
			     alt="<?php echo carbonImageData( $bgi )['alt'] ?>"
			     style="
				filter: brightness(50%);
                 width: 100%;
                 height: 100%;
"
			>
		</div>
		<?php endif; ?>
		<div class="container">
			<div class="welcome-service__top-wrapper">
				<div class="welcome-service__top-text">
					<h1 class="top-text__title">
						<?php echo $title; ?>
					</h1>
					<div class="welcome__desc">
						<ul class="listing-general">
							<?php if ( $general_items ): ?>
								<?php foreach ( $general_titles as $item ): ?>
									<li class="top-text__benefits-item"><?php echo $item['general-welcome-item-title']; ?></li>
								<?php endforeach; ?>
							<?php endif; ?>
							<?php
							if ( $items ):
								foreach ( $items as $item ): ?>
									<li class="top-text__benefits-item"><?php echo $item['service-welcome-item']; ?></li>
								<?php
								endforeach;
							endif; ?>

						</ul>
					</div>
					<div class="welcome-service__top-btn">
						<?php if ( ! $turbo ): ?>
							<a href="#" class="btn"><?php echo __( 'Оставить заявку', 'potolok' ) ?></a>
						<?php endif; ?>
						<?php $phone = carbon_get_theme_option( 'settings-cont-tel' ) ?>
						<a href="tel:<?php echo formatPhone( $phone ); ?>"
						   class="btn--no-form btn-phone"><?php echo __( 'Позвонить', 'potolok' ) ?></a>
					</div>

					<?php if ( $utp_title && ! $turbo ): ?>
						<button class="utp-btn__mobile">
							<img src="<?= carbonImageData( $utp_img_btn )['url']; ?>" width="60"
							     alt="<?= carbonImageData( $utp_img_btn )['alt']; ?>">
						</button>
					<?php endif; ?>
				</div>
				<?php if ( $utp_title && ! $turbo ): ?>
					<div class="welcome-service__top-utp">
						<div class="close__btn icon-cross"></div>
						<div class="top-utp__gift">
							<img src="<?= get_template_directory_uri() ?>/assets/images/webp_image/gift.webp"
							     alt="Подарок">
						</div>
						<img class="top-utp__image" src="<?= carbonImageData( $utp_image )['url']; ?>"
						     alt="<?= carbonImageData( $utp_image )['alt']; ?>" loading="lazy">
						<div class="welcome-service__top-utp-title">
							<?= $utp_title ?>
						</div>
						<?php if ( $utp_desc ): ?>
							<div class="welcome-service__top-utp-desc">
								<?= $utp_desc ?>
							</div>
						<?php endif; ?>
						<a class="measuring-form" type="submit"><?= __( 'Записаться на замер', 'potolok' ) ?></a>
					</div>
				<?php endif; ?>

				<?php if ( $blur && $image && ! $turbo ): ?>
					<div class="welcome-service__top-image-wrapper">
						<div class="welcome-service__top-image">
							<img src="<?php echo carbonImageData( $image )['url'] ?>"
							     alt="<?php echo carbonImageData( $image )['alt'] ?>">
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="welcome-service__bottom">

	</div>
	</div>
</section>