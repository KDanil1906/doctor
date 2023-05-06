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

echo get_template_part( 'template-parts/home', 'body' );

get_footer() ?>
