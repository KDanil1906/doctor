<?php
$turbo = $args['turbo'] ?? false; ?>

<?php $home_id     = get_option( 'page_on_front' );
$title             = carbon_get_post_meta( $home_id, 'main-welcome-title' );
$seo_article_title = carbon_get_post_meta( $home_id, 'main-more-title' );
$seo_article_desc  = carbon_get_post_meta( $home_id, 'main-more-desc' );

if ( isset( $product ) ) {
	$product_id          = get_the_ID();
	$seo_article_desc    = getAssociateArticle( $product_id );
	$title               = getProductTitle( $product_id );
	$welcome_inner_class = 'welcome__inner--seo-title';
}


?>
<section class="welcome">
	<?php $welcome_bgi = carbon_get_post_meta( $home_id, 'main-welcome-image' ); ?>
    <div class="welcome-bgi" style="background-image: url(<?php echo carbonImageData( $welcome_bgi )['url']; ?>);">

    </div>
    <div class="container">

        <div class="welcome__inner <?= isset( $welcome_inner_class ) ? $welcome_inner_class : ''; ?>">
            <h1 class="welcome__title">
				<?= $title; ?>
            </h1>
            <div class="welcome__desc">
                <ul class="listing-general">
					<?php $welcome_items = carbon_get_post_meta( $home_id, 'main-welcome-title-items' ); ?>
					<?php foreach ( $welcome_items as $item ): ?>
                        <li><?php echo $item['main-welcome-title-item']; ?></li>
					<?php endforeach; ?>
                </ul>
            </div>
            <div class="welcome__urder-items">
				<?= carbon_get_post_meta( $home_id, 'main-welcome-under-items' ); ?>
            </div>
            <div class="welcome__btn">
				<?php if ( ! $turbo ): ?>
                    <button class="btn">
						<?php echo __( 'Оставить заявку', 'potolok' ) ?>
                    </button>
				<?php endif; ?>
				<?php $phone = carbon_get_theme_option( 'settings-cont-tel' ) ?>
                <a href="tel:<?php echo formatPhone( $phone ); ?>"
                   class="btn--no-form btn-phone"><?php echo __( 'Позвонить', 'potolok' ) ?></a>
            </div>
        </div>

    </div>
</section>


<?php echo get_template_part( 'template-parts/home', 'services-cart', array( 'page-id' => $home_id ) ); ?>

<?= get_template_part( '/template-parts/service', 'home-rules' ) ?>


<?php if ( ! $turbo ): ?>
	<?= get_template_part( '/template-parts/service', 'we-in-number' ) ?>
	<?= get_template_part( '/template-parts/service', 'home-reviews' ) ?>
<?php endif; ?>


<?= get_template_part( '/template-parts/service', 'home-discount' ) ?>

<?php if ( ! $turbo ): ?>
	<?= get_template_part( '/template-parts/service', 'home-partners' ) ?>
<?php endif; ?>

<?= get_template_part( '/template-parts/service', 'home-dzen' ) ?>

<?php if ( ! $turbo ): ?>
	<?= get_template_part( 'template-parts/home', 'products' ); ?>
<?php endif; ?>

<?php if ( ! $turbo ): ?>
	<?php echo get_template_part( 'template-parts/form' ); ?>
<?php endif; ?>

<section class="more">
    <div class="container">
        <div class="more__inner">
			<?php if ( $seo_article_title ): ?>
                <div class="more__title">
					<?= $seo_article_title; ?>
                </div>
			<?php endif; ?>
            <div class="more__desc wp-editor">
				<?= $seo_article_desc; ?>
            </div>
        </div>
    </div>
</section>