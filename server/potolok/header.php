<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">
<head>
    <link rel="shortcut icon" href="<?= carbonImageData( carbon_get_theme_option( 'settings-logo-fav' ) )['url']; ?>"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="yandex-verification" content="3261b536b79df074"/>
	<?php if ( is_404() ): ?>
        <meta name="description" content="Страница не найдена - Доктор Потолков"/>
        <link rel="canonical" href="<?php echo home_url(); ?>"/>
	<?php endif; ?>

	<?php wp_head(); ?>
    <title><?php echo get_the_title() ?> :: <?php echo bloginfo( 'name' ); ?></title>
</head>
<body>

<header class="header">
    <a href="<?php echo home_url(); ?>" class="header__logo">
		<?php $logo_id = carbon_get_theme_option( 'settings-logo-header' ) ?>
        <img src="<?php echo carbonImageData( $logo_id )['url']; ?>"
             alt="<?php echo carbonImageData( $logo_id )['alt']; ?>">
    </a>
    <nav class="header__nav">
        <div class="header__nav-menu">
            <div class="header__nav-menubtn">

            </div>
            <div class="header__nav-menutitle">
				<?php echo __( 'Выбор лечения', 'potolok' ) ?>
            </div>

            <ul class="header__nav-dropdown">
				<?php $services = getGeneralServices();
				foreach ( $services as $service ):
					$page_id = $service->ID;
					?>
                    <li><a href="<?php echo get_permalink( $page_id ); ?>">
							<?php $alter_title = carbon_get_post_meta( $page_id, 'service-general-title-main' );
							if ( $alter_title ) {
								echo $alter_title;
							} else {
								echo $service->post_title;
							}
							?>
                        </a></li>
				<?php endforeach; ?>
            </ul>
        </div>
        <div class="header__nav-links-btnwrap">
            <div class="header__nav-links-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
		<?php echo get_template_part( 'menu', 'custom' ) ?>
    </nav>
    <div class="header__nav-contact">
        <span>Остались вопросы? Звоните</span>
		<?php $phone = carbon_get_theme_option( 'settings-cont-tel' ) ?>
        <a href="tel:<?php echo formatPhone( $phone ); ?>"><?php echo phoneDecorate( $phone ); ?></a>
    </div>
</header>

