<?php
/*
Template Name: Контакты
Template Post Type: page
*/

?>

<?php $turbo = $args['turbo'] ?? false; ?>

<?php if ( ! $turbo ): ?>
	<?php get_header(); ?>
<?php endif; ?>

	<section class="contacts" itemscope itemtype="http://schema.org/Organization">
		<div class="contacts__inner">
			<div class="contacts__left">
				<div class="contacts__left-wrap">
					<div class="contacts__left-title">
						<?php echo __( 'Контакты', 'potolok' ) ?>
						<span itemprop="name"><?= get_bloginfo( 'name' ); ?></span>
					</div>
					<div class="contacts__left-items">
						<div class="contacts__left-item">
							<div class="contacts__left-item-title">
								Телефон
							</div>
							<?php $phone = carbon_get_theme_option( 'settings-cont-tel' ) ?>
							<a href="tel:<?php echo formatPhone( $phone ); ?>"
							   class="contacts__left-item-val"
							   itemprop="telephone"><?php echo phoneDecorate( $phone ); ?></a>
						</div>
						<div class="contacts__left-item">
							<div class="contacts__left-item-title">
								Email
							</div>
							<?php $email = carbon_get_theme_option( 'settings-cont-email' ) ?>
							<a href="mailto:<?php echo $email; ?>" class="contacts__left-item-val" itemprop="email">
								<?php echo $email; ?>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php if ( carbon_get_theme_option( 'settings-cont-map' ) ): ?>
				<div class="contacts__center">
					<div class="map-title" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
						Офис №1
						<span
							itemprop="streetAddress"><?php echo carbon_get_theme_option( 'settings-cont-address-1' ) ?></span>
					</div>
					<?php echo carbon_get_theme_option( 'settings-cont-map' ) ?>
				</div>
			<?php endif ?>
			<?php if ( carbon_get_theme_option( 'settings-cont-map-2' ) ): ?>
				<div class="contacts__right">
					<div class="map-title" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
						Офис №2
						<span
							itemprop="streetAddress"><?php echo carbon_get_theme_option( 'settings-cont-address-2' ) ?></span>
					</div>
					<?php echo carbon_get_theme_option( 'settings-cont-map-2' ) ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php if ( ! $turbo ): ?>
	<?php get_footer(); ?>
<?php endif; ?>