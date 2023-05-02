<section class="seo-services">
    <div class="seo-services__links">

		<?php
		$seo_categories = array_keys( getSettingsAssociationCatPage() );
		$products       = wc_get_products( array(
			'numberposts' => - 1,
			'status'      => 'publish',
			'category'    => $seo_categories,
		) );

		foreach ( $products as $product ):
			?>


            <a href="<?php echo $product->get_permalink()?>" class="seo-services__running-string"><?php echo $product->get_name(); ?></a>

		<?php endforeach; ?>

    </div>
    <div class="seo-services__title">
        <h2 class="title--small">
			<?php echo carbon_get_theme_option( 'seo-services-title' ) ?>
        </h2>
    </div>
</section>