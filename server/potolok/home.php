<?php
/*
Template Name: Главная
Template Post Type: page
*/
?>


<?php
global $product;

if ( $product ) {
	get_header( 'seo' );
	echo get_template_part( 'template-parts/breadcrumbs' );
} else {
	get_header();
}
?>

<?php $home_id     = get_option( 'page_on_front' );
$title             = carbon_get_post_meta( $home_id, 'main-welcome-title' );
$seo_article_title = carbon_get_post_meta( $home_id, 'main-more-title' );
$seo_article_desc  = carbon_get_post_meta( $home_id, 'main-more-desc' );
if ( $product ) {
	$product_id       = get_the_ID();
	$seo_article_desc = getAssociateArticle( $product_id );
	$title            = getProductTitle( $product_id );
	$welcome_inner_class = 'welcome__inner--seo-title';
}
?>
<section class="welcome">
	<?php $welcome_bgi = carbon_get_post_meta( $home_id, 'main-welcome-image' ); ?>
	<div class="welcome-bgi" style="background-image: url(<?php echo carbonImageData( $welcome_bgi )['url']; ?>);">

	</div>
	<div class="container">

		<div class="welcome__inner <?= isset($welcome_inner_class)?$welcome_inner_class:'';?>">
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
			<div class="welcome__btn">
				<a class="btn">
					<?php echo __( 'Оставить заявку', 'potolok' ) ?>
				</a>
				<?php $phone = carbon_get_theme_option( 'settings-cont-tel' ) ?>
				<a href="tel:<?php echo formatPhone( $phone ); ?>"
				   class="btn--no-form btn-phone"><?php echo __( 'Позвонить', 'potolok' ) ?></a>
			</div>
		</div>

	</div>
</section>


<?php echo get_template_part( 'template-parts/home', 'services-cart', array( 'page-id' => $home_id ) ); ?>

<?= get_template_part( '/template-parts/service', 'home-rules' ) ?>

<?= get_template_part( '/template-parts/service', 'we-in-number' ) ?>

<?= get_template_part( '/template-parts/service', 'home-reviews' ) ?>

<?= get_template_part( '/template-parts/service', 'home-discount' ) ?>

<?= get_template_part( '/template-parts/service', 'home-partners' ) ?>

<?= get_template_part( '/template-parts/service', 'home-dzen' ) ?>

<!--<section class="products">-->
<!--    <div class="container">-->
<!--        <div class="title--middle clients__title">-->
<!--            Комплектующие-->
<!--        </div>-->
<!--        <div class="under-middle-title__desc">-->
<!--            Если хотите сделать ремонт самостоятельно-->
<!--        </div>-->
<!--        <div class="products__items-wrap">-->
<!--            <div class="products__product">-->
<!--                <div class="products__product-image">-->
<!--                    <img src="./images/webp_image/main_product_1.webp" loading="lazy" alt="">-->
<!--                </div>-->
<!--                <div class="products__product-info">-->
<!--                    <div class="product-info__title">-->
<!--                        Потолочный светильник 20th c.Factory Filament Metal-->
<!--                    </div>-->
<!--                    <div class="product-info__price">-->
<!--                        7200 ₽ <span>/ шт.</span>-->
<!--                    </div>-->
<!--                    <a href="#" class="product-info__link text-btns__link">-->
<!--                        Подробнее-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="products__product">-->
<!--                <div class="products__product-image">-->
<!--                    <img src="./images/webp_image/main_product_2.webp" loading="lazy" alt="">-->
<!--                </div>-->
<!--                <div class="products__product-info">-->
<!--                    <div class="product-info__title">-->
<!--                        Потолочный светильник 20th c.Factory Filament Metal-->
<!--                    </div>-->
<!--                    <div class="product-info__price">-->
<!--                        7200 ₽ <span>/ шт.</span>-->
<!--                    </div>-->
<!--                    <a href="#" class="product-info__link text-btns__link">-->
<!--                        Подробнее-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="products__product">-->
<!--                <div class="products__product-image">-->
<!--                    <img src="./images/webp_image/main_product_3.webp" loading="lazy" alt="">-->
<!--                </div>-->
<!--                <div class="products__product-info">-->
<!--                    <div class="product-info__title">-->
<!--                        Потолочный светильник 20th c.Factory Filament Metal-->
<!--                    </div>-->
<!--                    <div class="product-info__price">-->
<!--                        7200 ₽ <span>/ шт.</span>-->
<!--                    </div>-->
<!--                    <a href="#" class="product-info__link text-btns__link">-->
<!--                        Подробнее-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

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

<?php echo get_template_part( 'template-parts/form' ); ?>

<?php get_footer() ?>
