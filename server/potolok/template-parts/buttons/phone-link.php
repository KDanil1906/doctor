<?php
$phone = carbon_get_theme_option( 'settings-cont-tel' );
$name_action = $agrs['name-action']??'Позвонить';
?>
<a href="tel:<?php echo formatPhone( $phone ); ?>"
   class="btn--no-form btn-phone"><?php echo __( $name_action, 'potolok' ) ?></a>