<?php $phone = carbon_get_theme_option( 'settings-cont-tel' ) ?>
<a href="tel:<?php echo formatPhone( $phone ); ?>"
   class="btn--no-form btn-phone"><?php echo __( 'Позвонить', 'potolok' ) ?></a>