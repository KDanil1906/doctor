<?php


// Функция проверки категорий и создания ассоциированных статей
add_action( 'wp_trash_post', 'check_category_and_create_associate_articles' );
add_action( 'save_post_product', 'check_category_and_create_associate_articles' );
function check_category_and_create_associate_articles( $product_id ) {

	$post = get_post( $product_id );


	if ( 'product' === $post->post_type ) {

		$categories = getCategoriesFromSettingsAssociate(); // Получение списка категорий из настроек


		$taxonomy           = 'product_cat'; // Название таксономии
		$product_categories = wp_get_post_terms( $product_id, $taxonomy ); // Получение списка категорий товара


		if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
			// получаем первую категорию товара
			$product_category = $product_categories[0];
			$category_name    = $product_category->slug;

			if ( in_array( $category_name, $categories ) ) { // Проверка, что категория товара принадлежит списку категорий из настроек
				associateCategoriesArticles(); // Вызов функции создания ассоциированных статей
			}
		}
	}
}


//// Добавляем действие при обновлении, добавлении или удалении поля
//add_action( 'carbon_fields_field_update', 'check_change_associate_fields', 10, 2 );
//add_action( 'carbon_fields_field_add', 'check_change_associate_fields', 10, 1 );
//add_action( 'carbon_fields_field_delete', 'check_change_associate_fields', 10, 1 );
//
//// Функция для проверки обновления полей и вызова функции для ассоциации категорий и статей
//function check_change_associate_fields( $field, $new_value = null ) {
//	// Проверяем, что поле, которое обновляется или добавляется, является complex полем с ярлыком seo-services
//	if ( $field->type === 'complex' && $field->get_attribute( 'name' ) === 'seo-services' ) {
//		associateCategoriesArticles();
//	}
//
//	// Проверяем, что поле, которое обновляется или добавляется, находится внутри complex поля с ярлыком seo-services
//	$parent_field = $field->get_parent();
//	if ( $parent_field && $parent_field->type === 'complex' && $parent_field->get_attribute( 'name' ) === 'seo-services' ) {
//		associateCategoriesArticles();
//	}
//}
//
