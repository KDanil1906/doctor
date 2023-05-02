<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );


function crb_attach_theme_options() {
	$select_woo_cats = json_encode( getAllWooCategoryes() );
	$select_pages    = json_encode( getAllPages() );

	Container::make( 'theme_options', __( 'Настройки темы', 'potolok' ) )
	         ->add_tab( 'Основные', array(
		         Field::make( 'image', 'settings-logo-header', __( 'Логотип в хедере' ) )
		              ->set_width( 33 ),
		         Field::make( 'image', 'settings-logo-footer', __( 'Логотип в футере' ) )
		              ->set_width( 33 ),
		         Field::make( 'image', 'settings-logo-fav', __( 'favicon' ) )
		              ->set_width( 33 ),
	         ) )
	         ->add_tab( 'Юридическая информация', array(
		         Field::make( 'text', 'settings-ip', __( 'ИП' ) )
		              ->set_width( 25 ),
		         Field::make( 'text', 'settings-inn', __( 'ИНН' ) )
		              ->set_width( 25 ),
		         Field::make( 'text', 'settings-ogrn', __( 'ОГРН' ) )
		              ->set_width( 25 ),
//		         Field::make( 'file', 'settings-file', __( 'Файл реквизитов' ) )
//		              ->set_width( 25 ),
	         ) )
	         ->add_tab( 'Контактная информация', array(
		         Field::make( 'text', 'settings-cont-tel', __( 'Номер телефона' ) )
		              ->set_width( 20 )
		              ->set_attribute( 'type', 'number' ),
		         Field::make( 'text', 'settings-cont-email', __( 'Email' ) )
		              ->set_width( 20 )
		              ->set_attribute( 'type', 'email' ),
		         Field::make( 'text', 'settings-cont-whats', __( 'WhatsApp' ) )
		              ->set_width( 20 ),
		         Field::make( 'text', 'settings-cont-telegram', __( 'Telegram' ) )
		              ->set_width( 20 ),
		         Field::make( 'text', 'settings-cont-address-1', __( 'Адрес 1' ) )
		              ->set_width( 50 ),
		         Field::make( 'textarea', 'settings-cont-map', __( 'Скрипт карты 1' ) )
		              ->set_rows( 4 )
		              ->set_width( 50 ),
		         Field::make( 'text', 'settings-cont-address-2', __( 'Адрес 2' ) )
		              ->set_width( 50 ),
		         Field::make( 'textarea', 'settings-cont-map-2', __( 'Скрипт карты 2' ) )
		              ->set_rows( 4 )
		              ->set_width( 50 ),
//		         Field::make( 'file', 'settings-cont-document', __( 'Реквизиты компании (документ)' ) )
//		              ->set_value_type( 'url' )
//		              ->set_width( 50 ),
	         ) )
	         ->add_tab( 'Настройки СЕОШНЫХ услуг из WooCommerce', array(
		         Field::make( 'separator', 'seo-services-sep', __( '' ) )
		              ->set_help_text( 'Тут настраиваются ассоциации для выбора шаблона который будет работать на определенные услоуги.<br>
Например: <br>
Есть большое количество услуг "слив воды", для того что бы они отображались с шаблоном странички "слив", нужно нижу выбрать категорию "слив" от WooCommerce и страницу "Слив".
В таком случае все услуги, которые находятся в категории слива в товарах, будут отображаться с страничкой слив.
' ),
		         Field::make( 'text', 'seo-services-title', 'Вывод текста в блоке' )
		              ->set_help_text( 'Тут определяется какой текст будет выведен в блоке с бегущими ссылками' ),
		         Field::make( 'complex', 'seo-services', 'Ассоциации категорий с страницами' )
		              ->set_collapsed( true )
		              ->setup_labels(
			              array(
				              'plural_name'   => 'Ассоциации',
				              'singular_name' => 'Ассоциация',
			              )
		              )
		              ->add_fields( 'main-reviews-companies-box', array(
			              Field::make( 'select', 'seo-services-woocat', __( 'Выберите категорию Woo' ) )
			                   ->set_width( 50 )
			                   ->set_options( getAllWooCategoryes() ),
			              Field::make( 'select', 'seo-services-page', __( 'Выберите страницу' ) )
			                   ->set_width( 50 )
			                   ->set_options( getAllPages() ),
		              ) )
		              ->set_header_template( '
        <%- ' . $select_woo_cats . '[seo_services_woocat]' . ' %> - <%- ' . $select_pages . '[seo_services_page]' . ' %>
' ),
		         Field::make( 'complex', 'seo-services-write', 'Сео статьи для Сеошных услуг' )
		              ->set_collapsed( true )
		              ->setup_labels(
			              array(
				              'plural_name'   => 'Категории',
				              'singular_name' => 'Категорию',
			              )
		              )
		              ->add_fields( array(
			              Field::make( 'select', 'seo-services-write-woocat', __( 'Выберите категорию Woo' ) )
			                   ->set_width( 50 )
			                   ->set_options( getAllWooCategoryes() ),
			              Field::make( 'complex', 'seo-services-articles', 'Статьи' )
			                   ->set_collapsed( true )
			                   ->setup_labels(
				                   array(
					                   'plural_name'   => 'Статьи',
					                   'singular_name' => 'Статью',
				                   )
			                   )
			                   ->add_fields( array(
				                   Field::make( 'rich_text', 'seo-services-article-text', __( 'Статья для категории' ) )
			                   ) ),
		              ) )
		              ->set_header_template( '<%- ' . $select_woo_cats . '[seo_services_write_woocat]' . ' %>' )
	         ,
	         ) );

	Container::make( 'theme_options', __( 'Общие блоки', 'potolok' ) )
	         ->set_icon( 'dashicons-welcome-widgets-menus' )
//	         ->add_tab( 'Уведомление о Cookie', array(
//		         Field::make( 'rich_text', 'cookie-notif', __( 'Содержание уведомления' ) )
//		              ->set_width( 100 ),
//	         ) )
             ->add_tab( 'Отправьте фото', array(
			Field::make( 'separator', 'send-photo-sep-both', '' )
			     ->set_help_text( 'общие настройки' )
			     ->set_width( 100 ),
			Field::make( 'checkbox', 'send-photo-whatsapp', 'Показывать кнопку WhatsApp?' )
			     ->set_width( 50 )
			     ->set_default_value( true ),
			Field::make( 'checkbox', 'send-photo-telegram', 'Показывать кнопку Telegram?' )
			     ->set_width( 50 )
			     ->set_default_value( true ),
			Field::make( 'separator', 'send-photo-sep-mobile', '' )
			     ->set_help_text( 'Мобильная версия' )
			     ->set_width( 100 ),
			Field::make( 'text', 'send-photo-title', 'Заголовок' )
			     ->set_width( 50 ),
			Field::make( 'separator', 'send-photo-sep-pc', '' )
			     ->set_help_text( 'ПК версия' )
			     ->set_width( 100 ),
			Field::make( 'text', 'send-photo-title-left', 'Заголовок левой части (социальные сети)' )
			     ->set_width( 50 ),
			Field::make( 'text', 'send-photo-title-right', 'Заголовок правой части (заявка)' )
			     ->set_width( 50 ),
		) )
	         ->add_tab( 'Компании отзовиков', array(
		         Field::make( 'complex', 'settings-reviews-companies', 'Компании отзывов' )
		              ->set_collapsed( true )
		              ->setup_labels(
			              array(
				              'plural_name'   => 'Компании',
				              'singular_name' => 'Компания',
			              )
		              )
		              ->add_fields( 'main-reviews-companies-box', array(
			              Field::make( 'text', 'settings-reviews-companies-slug', 'Ярлык компании' )
			                   ->set_help_text( 'Ярлык используется для работы функциональной части сайта.Указывать его следует только кириллицей и в нижнем регистре. Пример - yandex' ),
			              Field::make( 'text', 'settings-reviews-companies-name', 'Название компании' ),
			              Field::make( 'text', 'settings-reviews-companies-link', 'Ссылка на отзывы' ),
			              Field::make( 'text', 'settings-reviews-companies-mark', 'Оценка' ),
		              ) )
		              ->set_header_template( '
                <% if (settings_reviews_companies_name) { %>
                    <%- settings_reviews_companies_name %>
                <% } %>
            ' ),
	         ) )
	         ->add_tab( 'Мы в цифрах', array(
		         Field::make( 'separator', 'we-in-number-sep', '' )
		              ->set_help_text( 'Данная настройка передает данные в блок с перечисление цифр компании. Например "Сколько времени работаем", "сколько клиентов в день обслуживаем и тд"' )
		              ->set_width( 100 ),
		         Field::make( 'text', 'we-in-number-title', 'Заголовок блока' )
		              ->set_width( 50 ),
		         Field::make( 'text', 'we-in-number-undertitle', 'Подзаголовок' )
		              ->set_width( 50 ),
		         Field::make( 'image', 'we-in-number-bgi', 'Изображение на заднем фоне' )
		              ->set_width( 50 ),
		         Field::make( 'complex', 'we-in-number-items', 'Пункты' )
		              ->set_collapsed( true )
		              ->setup_labels(
			              array(
				              'plural_name'   => 'Пункты',
				              'singular_name' => 'Пункт',
			              )
		              )
		              ->add_fields( 'we-in-number-box', array(
			              Field::make( 'text', 'we-in-number-num', 'Число' )
			                   ->set_width( 50 ),
			              Field::make( 'text', 'we-in-number-desc', 'Описание' )
			                   ->set_width( 50 ),
		              ) )
		              ->set_header_template( '
                <% if (we_in_number_desc) { %>
                    <%- we_in_number_num %> <%- we_in_number_desc %>
                <% } %>
            ' )
	         ) )
	         ->add_tab( 'Как мы работаем', array(
		         Field::make( 'rich_text', 'how-work-title', 'Заголовок' )
		              ->set_width( 33 ),
		         Field::make( 'complex', 'how-work-items', 'Пункты' )
		              ->set_collapsed( true )
		              ->setup_labels(
			              array(
				              'plural_name'   => 'Пункты',
				              'singular_name' => 'Пункт',
			              )
		              )
		              ->add_fields( 'how-work-items-box', array(
			              Field::make( 'text', 'how-work-items-title', 'Заголовок пункта' )
			                   ->set_width( 30 ),
			              Field::make( 'textarea', 'how-work-items-desc', 'Заголовок пункта' )
			                   ->set_width( 30 )
			                   ->set_rows( 3 ),
			              Field::make( 'image', 'how-work-items-icon', 'Иконка пункта' )
			                   ->set_width( 20 ),
//				     Field::make( 'checkbox', 'how-work-items-icon-animate', 'Добавить анимацию ?' )
//				          ->set_help_text( 'Настройка для иконки скорой помощи. Анимация смены цвета (красный - синий)' )
//				          ->set_default_value( false )
//				          ->set_width( 20 ),
		              ) )
		              ->set_header_template( '
                <% if (how_work_items_title) { %>
                    <%- how_work_items_title %>
                <% } %>
            ' )
	         ) )
	         ->add_tab( 'Общие элементы для страниц услуг в блоке "Welcome"', array(
		         Field::make( 'complex', 'general-welcome-items', 'Пункты' )
		              ->set_collapsed( true )
		              ->setup_labels(
			              array(
				              'plural_name'   => 'Пункты',
				              'singular_name' => 'Пункт',
			              )
		              )
		              ->add_fields( 'general-welcome-items-box', array(
			              Field::make( 'textarea', 'general-welcome-item-title', 'Пункт' )
			                   ->set_rows( 4 )
		              ,
		              ) )
		              ->set_header_template( '
                <% if (general_welcome_item_title) { %>
                    <%- general_welcome_item_title %>
                <% } %>
            ' )
	         ) )
	         ->add_tab( 'Блок "Правила команды"', array(
		         Field::make( 'rich_text', 'main-rules-title', 'Заголовок' )
		              ->set_width( 100 ),
		         Field::make( 'complex', 'main-rules-rules', 'Правила' )
		              ->set_collapsed( true )
		              ->setup_labels(
			              array(
				              'plural_name'   => 'Правила',
				              'singular_name' => 'Правило',
			              )
		              )
		              ->add_fields( 'main-rules-rules-box', array(
			              Field::make( 'text', 'main-rules-rule-title', 'Заголовок правила' ),
			              Field::make( 'rich_text', 'main-rules-rule-desc', 'Содержание правила' ),
		              ) )
		              ->set_header_template( '
                <% if (main_rules_rule_title) { %>
                    <%- main_rules_rule_title %>
                <% } %>
            ' ),
		         Field::make( 'rich_text', 'main-rules-more', 'Послесловие' ),
	         ) )
	         ->add_tab( 'Отзывы', array(
		         Field::make( 'rich_text', 'main-reviews-title', 'Заголовок' )
		              ->set_width( 100 ),
		         Field::make( 'rich_text', 'main-reviews-undertitle', 'Подзаголвок' )
		              ->set_width( 100 ),


		         Field::make( 'complex', 'main-reviews-reviews', 'Отзывы' )
		              ->set_collapsed( true )
		              ->setup_labels(
			              array(
				              'plural_name'   => 'Отзывы',
				              'singular_name' => 'Отзыв',
			              )
		              )
		              ->add_fields( 'main-reviews-reviews-box', array(
			              Field::make( 'text', 'main-reviews-review-name', 'Имя' )
			                   ->set_width( 33 ),
			              Field::make( 'image', 'main-reviews-review-photo', 'Фото' )
			                   ->set_width( 33 ),
			              Field::make( 'text', 'main-reviews-review-date', 'Дата' )
			                   ->set_width( 33 ),
			              Field::make( 'textarea', 'main-reviews-review-desc', 'Отзыв' )
			                   ->set_rows( 4 )
			                   ->set_width( 80 ),
			              Field::make( 'select', 'main-reviews-review-company', 'Источник отзыва' )
			                   ->set_options( selectReviewsOptionals() )
			                   ->set_width( 20 )
		              ) )
		              ->set_header_template( '
                <% if (main_reviews_review_name) { %>
                    <%- main_reviews_review_name %>
                <% } %>
            ' ),

	         ) )
	         ->add_tab( 'Блок "скидка"', array(

		         Field::make( 'rich_text', 'main-discount-title', 'Заголовок' )
		              ->set_width( 70 ),
		         Field::make( 'image', 'main-discount-image', 'Дополнительное изображение блока' )
		              ->set_help_text( 'Изображение справа блока' )
		              ->set_width( 30 )

	         ) )
	         ->add_tab( 'Нам доверяют', array(

		         Field::make( 'rich_text', 'main-trust-title', 'Заголовок' )
		              ->set_width( 100 ),
		         Field::make( 'text', 'main-trust-undertitle', 'Подзаголовок' )
		              ->set_width( 100 ),
		         Field::make( 'media_gallery', 'main-trust-logos', __( 'Лого компаний (слайдер)' ) )
		              ->set_type( array( 'image' ) )

	         ) )
	         ->add_tab( 'Дзен', array(

		         Field::make( 'rich_text', 'main-dzen-title', 'Заголовок' )
		              ->set_width( 50 ),
		         Field::make( 'textarea', 'main-dzen-undertitle', 'Подзаголовок' )
		              ->set_rows( 4 )
		              ->set_width( 50 ),
		         Field::make( 'text', 'main-dzen-link', 'Ссылка' )
		              ->set_width( 25 ),
		         Field::make( 'image', 'main-dzen-photo', __( 'Лого компаний (слайдер)' ) )
		              ->set_width( 25 ),

	         ) );

}