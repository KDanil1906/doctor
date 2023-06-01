<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'NOIMAGE_URL', get_stylesheet_directory_uri() . '/assets/images/webp_image/no-image.webp', );
define( 'NOIMAGE_ALT', 'Нет изображения', );

//Разрешаю SVG
add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ) {

	// WP 5.1 +
	if ( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ) {
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	} else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, - 4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if ( $dosvg ) {

		// разрешим
		if ( current_user_can( 'manage_options' ) ) {

			$data['ext']  = 'svg';
			$data['ext']  = 'csv';
			$data['type'] = 'image/svg+xml';
		} // запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

//Разрешения для редактора WP
function allow_additional_tags( $init ) {
	$init['extended_valid_elements'] = 'span[*],div[*]';

	return $init;
}

add_filter( 'tiny_mce_before_init', 'allow_additional_tags' );

//Разрешение всех форматов загрузки
define( 'ALLOW_UNFILTERED_UPLOADS', true );


//Отключение gutenberg
add_filter( 'use_block_editor_for_post', '__return_false' );

define( 'LOADING_IMAGE', get_stylesheet_directory_uri() . '/assets/images/webp_image/image-loading.webp' );


