<?php
/*
Template Name: Услуги
Template Post Type: page
*/
require_once get_template_directory() . '/ConstructPage.php';
$id = get_the_ID();
global $product;
?>

<?php
if ( $product ) {
	get_header( 'seo' );
} else {
	get_header();
}
?>

<?php echo get_template_part( 'template-parts/breadcrumbs' ); ?>

<?php
$title = carbon_get_post_meta( $id, 'service-welcome-title' );

global $product;
if ( $product ) {

	$page_id = get_the_ID();
	$terms   = get_the_terms( $page_id, 'product_cat' );

	$title = wc_get_product( $page_id )->name;

	if ( $terms && ! is_wp_error( $terms ) ) {
		// Получаем первую категорию
		$product_category         = $terms[0]->slug;
		$mapping_category_to_page = getSettingsAssociationCatPage();

		// Выводим имя категории
		if ( array_key_exists( $product_category, $mapping_category_to_page ) ) {
			$id = $mapping_category_to_page[ $product_category ];
		}
	}
}; ?>


<?php
/** Вызов welcome блока */

$params = array(
	'bgi'   => carbon_get_post_meta( $id, 'service-welcome-bgi' ),
	'image' => carbon_get_post_meta( $id, 'service-welcome-target' ),
	'title' => $title,
	'items' => carbon_get_post_meta( $id, 'service-welcome-items-wrap' ),
	'blur'  => carbon_get_post_meta( $id, 'service-welcome-bgi-blur' ),
	'general-items'  => carbon_get_post_meta( $id, 'service-welcome-general-items-check' ),
	'utp-title'  => carbon_get_post_meta( $id, 'service-welcome-utp-title' ),
	'utp-desc'  => carbon_get_post_meta( $id, 'service-welcome-utp-desc' ),
	'utp-img-btn'  => carbon_get_post_meta( $id, 'service-welcome-utp-image-btn' ),
	'utp-image'  => carbon_get_post_meta( $id, 'service-welcome-utp-image-main' ),
);
echo get_template_part( 'template-parts/service', 'welcome', $params );
?>

<?php
/** Вызов динамичных блоков */
$fields  = carbon_get_post_meta( $id, 'service-blocks-wrap' );
$content = new ConstructPage( $fields );
$content->blocksAssembly();
//?>


<?php
/** Подключение "других услуг" */
echo get_template_part( 'template-parts/service', 'more-services', array( 'exception_id' => $id ) );

/** Сеошные услуги */
echo get_template_part( 'template-parts/seo-services-links' );
?>


<?php get_footer(); ?>
