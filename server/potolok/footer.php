<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top__inner">
                <div class="footer-top__legacy">
                    <div class="footer-top__legacy-logo">
						<?php $logo_id = carbon_get_theme_option( 'settings-logo-footer' ) ?>
                        <img src="<?php echo carbonImageData( $logo_id )['url']; ?>" loading="lazy"
                             alt="<?php echo carbonImageData( $logo_id )['alt']; ?>">
                    </div>
                    <div class="footer-top__legacy-info">
                        <div class="footer-top__legacy-infoitem">
<!--                            <span>ИП --><?php //echo carbon_get_theme_option( 'settings-ip' ) ?><!--</span>-->
                            <span>ИНН <?php echo carbon_get_theme_option( 'settings-inn' ) ?></span>
                            <span>ОГРН <?php echo carbon_get_theme_option( 'settings-ogrn' ) ?></span>
                        </div>
                        <div class="footer-top__legacy-infolink">
							<?php $document = carbon_get_theme_option( 'settings-cont-document' );
							if ( $document ):
								?>
                                <a href="<?php echo $document;?>" target="_blank">Скачать реквизиты компании</a>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="footer-top__services">
                    <div class="footer-top__services-title">
                        Услуги
                    </div>
                    <div class="footer-top__services-items">
						<?php $services = getServicesPostForCarts();
						foreach ( $services as $item ):
							?>

                            <a href="<?php echo get_permalink( $item->ID ) ?>"
                               class="footer-top__services-item"><?php echo $item->post_title ?></a>

						<?php endforeach; ?>
                    </div>
                </div>
                <div class="footer-top__contacts">
                    <div class="footer-top__contacts-title">
                        Связаться с нами
                    </div>
                    <div class="footer-top__contacts-item">
                        <div class="footer-top__contacts-itemname">
                            Телефон
                        </div>
						<?php $phone = carbon_get_theme_option( 'settings-cont-tel' ) ?>
                        <a href="tel:<?php echo formatPhone( $phone ); ?>"
                           class="footer-top__contacts-itemvalue"><?php echo phoneDecorate( $phone ); ?></a>
                    </div>
                    <div class="footer-top__contacts-item">
                        <div class="footer-top__contacts-itemname">
                            Электронная почта
                        </div>
						<?php $email = carbon_get_theme_option( 'settings-cont-email' ) ?>
                        <a href="mailto:<?php echo $email; ?>" class="footer-top__contacts-itemvalue">
							<?php echo $email; ?>
                        </a>
                    </div>
                    <a href="#" class="btn btn__contact">Заказать звонок</a>
                </div>
            </div>
        </div>

    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom__inner">
                <div class="footer-bottom__item">
                    ИП <?php echo carbon_get_theme_option( 'settings-ip' ) ?>
                </div>
                <div class="footer-bottom__item">
                    <a href="<?php echo get_permalink( 2428 ); ?>">
                        Политика конфиденциальности
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="socials">
    <ul class="socials__links">
        <li class="socials__link-item socials__link-item--whatsapp">
			<?php $whatsapp = carbon_get_theme_option( 'settings-cont-whats' ) ?>
            <a href="https://api.whatsapp.com/send/?phone=<?php echo $whatsapp; ?>"></a>
        </li>
    </ul>
</div>

<div class="footer__nav-links">
    <div class="footer__nav-links-close">
        <span></span>
        <span></span>
    </div>
    <ul>
		<?php $services = getGeneralServices();
		foreach ( $services as $service ):
			$page_id = $service->ID;
			?>
            <li>
                <a href="<?php echo get_permalink( $page_id ) ?>">
					<?php $icon = carbon_get_post_meta( $page_id, 'service-general-icon' ); ?>
                    <div class="nav-link__image-wrap">
                        <img src="<?php echo carbonImageData( $icon )['url']; ?>" loading="lazy" width="40"
                             alt="<?php echo carbonImageData( $icon )['alt']; ?>">
                    </div>
                    <span class="nav-link__title">
                        <?php $alter_title = carbon_get_post_meta( $page_id, 'service-general-title-main' );
                        if ( $alter_title ) {
	                        echo $alter_title;
                        } else {
	                        echo $service->post_title;
                        }
                        ?>
                    </span>
					<?php $short_desc = carbon_get_post_meta( $page_id, 'service-general-mobile-desc' ); ?>
                    <span class="nav-link__desc">
                        <?php echo $short_desc; ?>
                    </span>
                    <span class="nav-link__pointer">Подробнее</span>
                </a>
            </li>
		<?php endforeach; ?>
    </ul>
</div>

<div class="form ">
    <div class="close__btn icon-cross"></div>
    <div class="title--small">
		<?php echo __( 'Оставить заявку', 'potolok' ) ?>
    </div>
    <div class="under-middle-title__desc">
		<?php echo __( 'Мы свяжемся с вами в ближайшее время', 'potolok' ) ?>
    </div>
	<?php echo do_shortcode( '[wpforms id="54"]' ) ?>
</div>


<div class="measurement__form">
    <div class="close__btn icon-cross"></div>
    <div class="title--small">
        <?php echo __( 'Оставить заявку', 'potolok' ) ?>
    </div>
    <div class="under-middle-title__desc">
        <?php echo __( 'Мы свяжемся с вами в ближайшее время', 'potolok' ) ?>
    </div>
    <?php echo do_shortcode( '[wpforms id="2682"]' ) ?>
</div>

<!--<section class="cookie">-->
<!--    <div class="cookie-text">-->
<!--		--><?php //echo apply_filters( 'the_content', carbon_get_theme_option( 'cookie-notif' ) ); ?>
<!--    </div>-->
<!--    <button class="cookie-btn">-->
<!--		--><?php //echo __( 'Я понимаю', 'potolok' ) ?>
<!--    </button>-->
<!--</section>-->

<?php wp_footer(); ?>
<!-- Yandex.Metrika counter -->
<script>
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    ym(53113441, "init",
        {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/53113441" style="position:absolute; left:-9999px;" alt=""></div>
</noscript>

<script type="text/javascript" src="//api.venyoo.ru/wnew.js?wc=venyoo/default/science&widget_id=5135345422303232"></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S9LVRSWTME"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-S9LVRSWTME');
</script>



</body>
</html>