<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_filter( 'woocommerce_enqueue_styles', 'disable_woocommerce_styles' );
function disable_woocommerce_styles( $styles ) {
	unset( $styles['woocommerce-general'] );       // Отключаем общие стили WooCommerce
	unset( $styles['woocommerce-layout'] );        // Отключаем стили макета WooCommerce
	unset( $styles['woocommerce-smallscreen'] );   // Отключаем стили для малых экранов WooCommerce
	return $styles;
}


define( '_VERSION', '6.4.0' );

//Подключение стилей и скриптов для различных шаблонов
function my_template_scripts() {
	if ( is_page_template( 'shop.php' ) ) {
		// Подключение стилей

		wp_enqueue_style( 'potolok-formstyler-css', get_template_directory_uri() . '/assets/css/formstyler.min.css', array(), _VERSION );


		// подключаем js файл темы
		wp_enqueue_script( 'potolok-woo-ajax-product-js', get_template_directory_uri() . '/assets/js/products-woo.js', array( 'jquery' ), _VERSION, true );
		wp_enqueue_script( 'potolok-formstyler-js', get_template_directory_uri() . '/assets/js/formstyler.min.js', array( 'jquery' ), _VERSION, true );
		wp_enqueue_script( 'potolok-selector-js', get_template_directory_uri() . '/assets/js/selector.js', array( 'jquery' ), _VERSION, true );
	}

	if ( is_page_template( 'shop.php' ) || is_page_template( 'home.php' ) ) {
		wp_enqueue_style( 'potolok-productform-css', get_template_directory_uri() . '/assets/css/product-form.min.css', array(), _VERSION );
	}

	if ( is_page_template( 'thanks.php' ) ) {
		wp_enqueue_script( 'potolok-referrer-js', get_template_directory_uri() . '/assets/js/referrer.js', array( 'jquery' ), _VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'my_template_scripts' );

add_action( 'wp_enqueue_scripts', function () {
	// подключаем файл стилей темы
	if ( is_array( checkAccessoryProductToSeoCats() ) && checkAccessoryProductToSeoCats()['type'] === 'product' ) {
		wp_enqueue_style( 'potolok-single-product-css', get_template_directory_uri() . '/assets/css/product.min.css', array(), _VERSION );
		wp_enqueue_script( 'potolok-single-product-js', get_template_directory_uri() . '/assets/js/single-product.js', array( 'jquery' ), _VERSION, true );
	}

	wp_enqueue_style( 'potolok-libs-css', get_template_directory_uri() . '/assets/css/libs.min.css', array(), _VERSION );
	wp_enqueue_style( 'potolok-style-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), _VERSION );
	wp_enqueue_style( 'potolok-form-css', get_template_directory_uri() . '/assets/css/form.min.css', array(), _VERSION );
	wp_enqueue_style( 'potolok-media-css', get_template_directory_uri() . '/assets/css/media.min.css', array(), _VERSION );
	wp_enqueue_style( 'potolok-form-media-css', get_template_directory_uri() . '/assets/css/form_media.min.css', array(), _VERSION );

//	// Отключаем встроенную версию jQuery
//	wp_deregister_script('jquery');
//	wp_dequeue_script('jquery');
//
//	// Подключаем вашу собственную версию jQuery из директории вашей темы
//	wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _VERSION, true);


	// подключаем js файл темы
	wp_enqueue_script( 'potolok-libs-js', get_template_directory_uri() . '/assets/js/libs.min.js', array( 'jquery' ), _VERSION, true );
	wp_enqueue_script( 'potolok-main-js', get_template_directory_uri() . '/assets/js/main-script.js', array( 'jquery' ), _VERSION, true );


} );


add_filter( "script_loader_tag", "add_module_to_my_script", 10, 3 );
function add_module_to_my_script( $tag, $handle, $src ) {
	if (
		"potolok-main-js" === $handle

	) {
		$tag = '<script type="module" id="' . $handle . '" src="' . esc_url( $src ) . '"></script>';
	}

	return $tag;
}



//function add_no_cache_headers($headers) {
//	$headers['Cache-Control'] = 'no-cache';
//	$headers['Pragma'] = 'no-cache';
//	$headers['Expires'] = '0';
//
//	return $headers;
//}
//
//add_filter('wp_headers', 'add_no_cache_headers');
