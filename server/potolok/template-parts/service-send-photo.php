<?php
$data     = isset( $args['data'] ) ? $args['data'] : false;
$whatsapp = carbon_get_theme_option( 'settings-cont-whats' );
$telegram = carbon_get_theme_option( 'settings-cont-telegram' );

$right_title = carbon_get_theme_option( 'send-photo-title-right' );
if ( $data['send-photo-right-title'] ) {
	$right_title = $data['send-photo-right-title'];
}

$left_title = carbon_get_theme_option( 'send-photo-title-left' );
if ( $data['send-photo-left-title'] ) {
	$left_title = $data['send-photo-left-title'];
}

$mobile_title = carbon_get_theme_option( 'send-photo-title' );
if ( $data['send-photo-title-mobile'] ) {
	$mobile_title = $data['send-photo-title-mobile'];
}
?>

<section class="action">
	<div class="container">
		<div class="action__inner action__inner-social action__inner-social--mobile">
			<h2 class="action__inner-left action__inner-leftsocial">
                <span>
                <?php echo $mobile_title; ?>
                </span>

			</h2>
			<div class="action__inner-right">
				<div class="action__inner-right-title">
					<?php echo __( 'Отправить фото', 'potolok' ) ?>
				</div>
				<?php if ( carbon_get_theme_option( 'send-photo-whatsapp' ) ): ?>

					<a href="https://api.whatsapp.com/send/?phone=<?php echo $whatsapp; ?>"
					   class="btn--white btn--white-whatsapp" target="_blank"></a>
				<? endif; ?>

				<?php if ( carbon_get_theme_option( 'send-photo-telegram' ) ): ?>

					<a href="https://t.me/+<?php echo $telegram; ?>" class="btn--white btn--white--tg"
					   target="_blank"></a>
				<? endif; ?>
			</div>
		</div>

		<div class="action__inner-pc">
			<div class="action__inner-pc-left">

				<span class="inner-pc__title"><?= $left_title; ?></span>
				<div class="inner-pc__number">
					<?php if ( carbon_get_theme_option( 'send-photo-whatsapp' ) ): ?>
						<a href="https://api.whatsapp.com/send/?phone=<?php echo $whatsapp; ?>"
						   class="inner-pc__social-icon inner-pc__social-icon--whats" target="_blank"></a>
					<?php endif; ?>
					<?php if ( carbon_get_theme_option( 'send-photo-telegram' ) ): ?>
						<a href="https://t.me/+<?php echo $telegram; ?>"
						   class="inner-pc__social-icon inner-pc__social-icon--tg" target="_blank"></a>
					<?php endif; ?>
					<span class="inner-pc__phone"><?= phoneDecorate( $whatsapp ); ?></span>
				</div>

			</div>

			<span class="action__inner-or">или</span>

			<div class="action__inner-pc-right">
				<span class="inner-pc__title"><?= $right_title; ?></span>
				<a class="btn btn--white">
					Оставить заявку
				</a>
			</div>
		</div>
	</div>
</section>

