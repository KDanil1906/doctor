<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

add_action('wp_enqueue_scripts', function () {
	// подключаем файл стилей темы
	wp_enqueue_style('potolok-libs-css', get_template_directory_uri() . '/assets/css/libs.min.css', array(), '3.4');
	wp_enqueue_style('potolok-style-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '3.4');
	wp_enqueue_style('potolok-form-css', get_template_directory_uri() . '/assets/css/form.min.css', array(), '3.4');
	wp_enqueue_style('potolok-media-css', get_template_directory_uri() . '/assets/css/media.min.css', array(), '3.4');
	wp_enqueue_style('potolok-form-media-css', get_template_directory_uri() . '/assets/css/form_media.min.css', array(), '3.4');

	// подключаем js файл темы
	wp_enqueue_script('potolok-libs-js', get_template_directory_uri() . '/assets/js/libs.min.js', array('jquery'), '3.4', true);
	wp_enqueue_script('potolok-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '3.4', true);
	wp_enqueue_script( 'potolok-referrer-js', get_template_directory_uri() . '/assets/js/referrer.js', array( 'jquery', 'potolok-main-js' ), '3.4', true );
	wp_enqueue_script( 'potolok-woo-ajax-product-js', get_template_directory_uri() . '/assets/js/products-woo.js', array( 'jquery'), '3.4', true );

});



add_filter("script_loader_tag", "add_module_to_my_script", 10, 3);
function add_module_to_my_script($tag, $handle, $src)
{
	if (
	    "potolok-main-js" === $handle

	) {
		$tag = '<script type="module" src="' . esc_url($src) . '"></script>';
	}

	return $tag;
}