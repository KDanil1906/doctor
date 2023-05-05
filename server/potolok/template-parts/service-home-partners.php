<?php
$title        = carbon_get_theme_option( 'main-trust-title' );
$undertitle   = carbon_get_theme_option( 'main-trust-undertitle' );
$clients_logo = carbon_get_theme_option( 'main-trust-logos' );
?>

<section class="clients">
	<div class="container">
		<div class="title--small clients__title">
			<?php echo $title; ?>
		</div>
		<div class="under-middle-title__desc">
			<?php echo $undertitle; ?>
		</div>
		<div class="clients__slider-wrap">
			<?php
			foreach ( $clients_logo as $logo ):
				?>


				<div class="clients__slider-iteminner">
					<div class="clients__slider-item">
						<img data-lazy="<?php echo carbonImageData( $logo )['url'] ?>"
						     alt="<?php echo carbonImageData( $logo )['alt'] ?>">
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>
</section>
