<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//Подключение стилей и скриптов для различных шаблонов
function my_template_scripts() {
	if ( is_page_template( 'shop.php' ) ) {
		// Подключение стилей

		wp_enqueue_style( 'potolok-formstyler-css', get_template_directory_uri() . '/assets/css/formstyler.min.css', array(), '3.8' );


		// подключаем js файл темы
		wp_enqueue_script( 'potolok-woo-ajax-product-js', get_template_directory_uri() . '/assets/js/products-woo.js', array( 'jquery' ), '3.8', true );
		wp_enqueue_script( 'potolok-formstyler-js', get_template_directory_uri() . '/assets/js/formstyler.min.js', array( 'jquery' ), '3.8', true );
		wp_enqueue_script( 'potolok-selector-js', get_template_directory_uri() . '/assets/js/selector.js', array( 'jquery' ), '3.8', true );
	}

	if ( is_page_template( 'shop.php' ) || is_page_template( 'home.php' ) ) {
		wp_enqueue_style( 'potolok-productform-css', get_template_directory_uri() . '/assets/css/product-form.min.css', array(), '3.8' );
	}
}

add_action( 'wp_enqueue_scripts', 'my_template_scripts' );

add_action( 'wp_enqueue_scripts', function () {
	// подключаем файл стилей темы
	wp_enqueue_style( 'potolok-libs-css', get_template_directory_uri() . '/assets/css/libs.min.css', array(), '3.8' );
	wp_enqueue_style( 'potolok-style-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '3.8' );
	wp_enqueue_style( 'potolok-form-css', get_template_directory_uri() . '/assets/css/form.min.css', array(), '3.8' );
	wp_enqueue_style( 'potolok-media-css', get_template_directory_uri() . '/assets/css/media.min.css', array(), '3.8' );
	wp_enqueue_style( 'potolok-form-media-css', get_template_directory_uri() . '/assets/css/form_media.min.css', array(), '3.8' );

	// подключаем js файл темы
	wp_enqueue_script( 'potolok-libs-js', get_template_directory_uri() . '/assets/js/libs.min.js', array( 'jquery' ), '3.8', true );
	wp_enqueue_script( 'potolok-main-js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '3.8', true );
	wp_enqueue_script( 'potolok-referrer-js', get_template_directory_uri() . '/assets/js/referrer.js', array(
		'jquery',
		'potolok-main-js'
	), '3.8', true );

} );


add_filter( "script_loader_tag", "add_module_to_my_script", 10, 3 );
function add_module_to_my_script( $tag, $handle, $src ) {
	if (
		"potolok-main-js" === $handle

	) {
		$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
	}

	return $tag;
}



