<?php

// Функция получения настроек ассоциации
function getSettingsAssociate() {
	return carbon_get_theme_option( 'seo-services-write' );
}


// Функция получения категорий из настроек ассоциации
function getCategoriesFromSettingsAssociate() {
	$settings = getSettingsAssociate();
	$category = [];

	foreach ( $settings as $associate ) {
		array_push( $category, $associate['seo-services-write-woocat'] );
	}

	return $category;
}

// Функция ассоциации категорий и статей
function associateCategoriesArticles() {
	global $wpdb;

	// Получаем настройки ассоциации
	$categories_articles = getSettingsAssociate();

	// Проходимся по каждой категории и получаем ее артикулы и синонимы
	foreach ( $categories_articles as $category_index => $category ) {
		$category_articles = $category['seo-services-articles'];
		$category_slug     = $category['seo-services-write-woocat'];

		// Получаем список всех товаров из нужной категории
		$products = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.*
        FROM {$wpdb->posts} p
        JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
        JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
        JOIN {$wpdb->terms} t ON tt.term_id = t.term_id
        WHERE p.post_type = 'product'
        AND p.post_status = 'publish'
        AND tt.taxonomy = 'product_cat'
        AND t.slug = %s
        ORDER BY p.menu_order ASC, p.post_title ASC",
				$category_slug
			)
		);



		// Вычисляем количество товаров, приходящихся на каждую статью
		$number_products_for_article = ceil( count( $products ) / count( $category_articles ) );
		$article_index               = 0;

		// Проходимся по каждому товару и ассоциируем его с нужной статьей
		foreach ( $products as $index => $product ) {
			$product_id  = $product->ID;
			$option_name = "_seo-services-write|seo-services-articles:seo-services-article-text|$category_index:$article_index|0|value";
			$meta_key    = 'association-with-seo-articles';
			$meta_value  = $option_name;

			$existing_meta_value = get_post_meta( $product_id, $meta_key, true );

			if ( empty( $existing_meta_value ) ) {
				$query = $wpdb->prepare(
					"INSERT INTO {$wpdb->postmeta} (post_id, meta_key, meta_value) VALUES (%d, %s, %s)",
					$product_id,
					$meta_key,
					$meta_value
				);

				$wpdb->query( $query );
			} else {
				update_post_meta( $product_id, $meta_key, $meta_value, $existing_meta_value );
			}

			// Переходим к следующей статье
			if ( ( $index + 1 ) % $number_products_for_article === 0 ) {
				$article_index ++;
			}
		}
	}
}


// Функция получения ассоциированных статей для товара по его ID
function getAssociateArticle( $product_id ) {
	global $wpdb; // Объявление глобальной переменной $wpdb

	$meta_key = 'association-with-seo-articles'; // Ключ метаполя для поиска

	$results = $wpdb->get_results( // Запрос на получение значений метаполей
		$wpdb->prepare( // Подготовленный запрос для безопасного выполнения
			"
        SELECT meta_value
        FROM $wpdb->postmeta
        WHERE meta_key = %s AND post_id = %d
        ",
			$meta_key,
			$product_id
		)
	);

	$results = $results[0]->meta_value;

	if ( $results ) {
		$content = $wpdb->get_var( // Запрос на получение контента статьи
			$wpdb->prepare(
				"
        SELECT option_value 
        FROM $wpdb->options
        WHERE option_name = %s
        ",
				$results
			)
		);

		return $content;
	}

	return false;
}
