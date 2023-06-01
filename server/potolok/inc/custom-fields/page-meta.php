<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

require_once get_stylesheet_directory() . '/inc/custom-fields/ServiceFieldsCreator.php';


$service_fields = new ServiceFieldsCreator();

Container::make( 'post_meta', 'Контент на страничке' )
         ->where( 'post_type', '=', 'page' )
         ->where( 'post_id', 'IN', array( 12 ) )
         ->add_tab( '"Welcome" блок', array(
	         Field::make( 'rich_text', 'main-welcome-title', 'Заголовок' )
	              ->set_width( 50 ),
	         Field::make( 'image', 'main-welcome-image', 'Изображение' )
	              ->set_width( 50 ),
	         Field::make( 'complex', 'main-welcome-title-items', 'Пункты' )
	              ->set_collapsed( true )
	              ->setup_labels(
		              array(
			              'plural_name'   => 'Пункты',
			              'singular_name' => 'Пункт',
		              )
	              )
	              ->add_fields( 'main-welcome-title-items-box', array(
		              Field::make( 'rich_text', 'main-welcome-title-item', 'Пункт' ),
	              ) )
	              ->set_header_template( '
                <% if (main_welcome_title_item) { %>
                    <%- main_welcome_title_item %>
                <% } %>
            ' ),
	         Field::make( 'text', 'main-welcome-under-items', 'Под пунктами' )
	              ->set_width( 100 ),
         ) )
         ->add_tab( 'Услуги', array(
	         Field::make( 'rich_text', 'main-services-title', 'Заголовок' )
	              ->set_width( 50 ),
         ) )
         ->add_tab( 'Заключение', array(

	         Field::make( 'text', 'main-more-title', 'Заголовок' )
	              ->set_width( 50 ),
	         Field::make( 'rich_text', 'main-more-desc', 'Подзаголовок' )
	              ->set_width( 100 ),

         ) );


$select_vars = json_encode( $service_fields->select_name );
Container::make( 'post_meta', 'Контент на страничке' )
         ->where( 'post_template', '=', 'page-services.php' )
         ->where( 'post_type', '=', 'page' )
         ->add_tab( '"Welcome" блок', array(
	         Field::make( 'image', 'service-welcome-bgi', 'Изображение (задник)' )
	              ->set_width( 25 ),
	         Field::make( 'checkbox', 'service-welcome-bgi-blur', 'Использовать размытие заднего фона ?' )
	              ->set_default_value( true )
	              ->set_width( 25 ),
	         Field::make( 'image', 'service-welcome-target', 'Изображение (акцент)' )
	              ->set_width( 25 )
	              ->set_conditional_logic( array(
		              'relation' => 'AND', // Optional, defaults to "AND"
		              array(
			              'field' => 'service-welcome-bgi-blur',
			              'value' => true
			              // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
		              )
	              ) ),
	         Field::make( 'text', 'service-welcome-title', 'Заголовок' )
	              ->set_width( 25 ),
	         Field::make( 'checkbox', 'service-welcome-general-items-check', 'Использовать общие пункты?' )
	              ->set_default_value( true )
	              ->set_help_text( 'Если данная карточка установлена, то на странице в первом блоке будут отображаться общие пункты, которые заложены в разделе админки "Общие блоки" + пункты которые будут переданы ниже.<br>
Если же данный флаг снят, то отображаться будут только те пункты, которые переданы полями ниже' )
	              ->set_width( 25 ),
	         Field::make( 'complex', 'service-welcome-items-wrap', 'Пункты' )
	              ->set_collapsed( true )
	              ->setup_labels(
		              array(
			              'plural_name'   => 'Пункты',
			              'singular_name' => 'Пункт',
		              )
	              )
	              ->add_fields( 'service-welcome-items-box', array(
		              Field::make( 'text', 'service-welcome-item', 'Пункт' )
		                   ->set_width( 33 ),
	              ) )
	              ->set_header_template( '
                <% if (service_welcome_item) { %>
                    <%- service_welcome_item %>
                <% } %>
            ' ),
	         Field::make( 'separator', 'service-welcome-sep', '' )
	              ->set_help_text( 'Утп на сайте (подарок). Заполнять его не обязательно. Если нужно УПТ на страничке - заполняем, если нет - оставляем пустым' )
	              ->set_width( 100 ),
	         Field::make( 'text', 'service-welcome-utp-title', 'Заголовок УТП' )
	              ->set_width( 50 ),
	         Field::make( 'textarea', 'service-welcome-utp-desc', 'Описание УТП (необязательно)' )
	              ->set_width( 50 ),
	         Field::make( 'image', 'service-welcome-utp-image-main', 'Изображение для УТП' )
	              ->set_width( 50 ),
	         Field::make( 'image', 'service-welcome-utp-image-btn', 'Изображение для кнопки на мобильном' )
	              ->set_help_text( 'Рекомендовано изображение использовать в соотношении 1*1 не более 120px' )
	              ->set_width( 50 ),
         ) )
         ->add_tab( 'Тело странички (блоки)', array(
	         Field::make( 'separator', 'service-blocks-help', __( '' ) )
	              ->set_help_text( __( 'Формирование порядка блоков и их содержания. 
	              - блоки услуг внизу страницы выводятся автоматически<br>
	              - блок формы генерируется автоматически, но место его вывода необходимо указывать<br>
	              Можно добавлять несколько одинаковых блоков с разным контентом <br>
	              Можно менять порядок блоков <br>
	              Можно удалять или редактировать информацию в блоках
	              ' ) )
         ,
	         Field::make( 'complex', 'service-blocks-wrap', 'Блоки' )
	              ->set_collapsed( true )
	              ->setup_labels(
		              array(
			              'plural_name'   => 'Блоки',
			              'singular_name' => 'Блок',
		              )
	              )
	              ->add_fields( 'service-blocks-wrap-box',
		              $service_fields->getFields()
	              )
	              ->set_header_template( '
                <% if (service_blocks_wrap_select) { %>
                    <%- ' . $select_vars . '[service_blocks_wrap_select] %>
                <% } %>
            ' ),
         ) );

Container::make( 'post_meta', 'Контент карточек (отображение карточек на страницах)' )
         ->where( 'post_template', '=', 'page-services.php' )
         ->where( 'post_type', '=', 'page' )
         ->add_fields( array(
	         Field::make( 'checkbox', 'service-general-check-main', 'Добавить карточку на главную ?' )
	              ->set_help_text( 'При активном флажке карточка будет добавлена на главной странице в блоке услуг а так же в всплывающем меню "выбор лечения"' )
	              ->set_default_value( true )
	              ->set_width( 50 ),
	         Field::make( 'checkbox', 'service-general-check-services', 'Добавить карточку на страницу услуг' )
	              ->set_default_value( true )
	              ->set_width( 50 ),
	         Field::make( 'separator', 'service-general-sep-general', '' )
	              ->set_help_text( 'общие настойки для карточек' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'text', 'service-general-price', 'Цена услуги (от)' )
	              ->set_width( 50 )
	              ->set_attribute( 'type', 'number' )
         ,
	         Field::make( 'image', 'service-general-image', 'Изображение услуги' )
	              ->set_width( 50 )
	              ->set_conditional_logic( array(
		              'relation' => 'OR', // Optional, defaults to "AND"
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
			              // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
		              ),
		              array(
			              'field' => 'service-general-check-services',
			              'value' => true,
			              // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
		              )
	              ) ),
	         Field::make( 'separator', 'service-general-sep-main', '' )
	              ->set_help_text( 'Настройки для карточки на главной' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'text', 'service-general-title-main', 'Альтернативный заголовок для главной страницы (карточка)' )
	              ->set_width( 50 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'rich_text', 'service-general-do', 'Первая помощь' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'rich_text', 'service-general-notdo', 'Не делайте этого' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'rich_text', 'service-general-we', 'Что делаем мы' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'rich_text', 'service-general-needed', 'При необходимости' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'rich_text', 'service-general-warning', 'Предупреждение' )
	              ->set_help_text( 'Блок обрамленный желтой рамкой' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'separator', 'service-general-sep-mobile', '' )
	              ->set_help_text( 'настройки для мобильной карточки' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'text', 'service-general-mobile-desc', 'Короткое описание для мобильного всплывающего меню "выбор лечения"' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'image', 'service-general-icon', 'Иконка услуги для всплывающего меню навигации на мобильном "выбор лечения"' )
	              ->set_width( 25 )
	              ->set_conditional_logic( array(
		              'relation' => 'OR', // Optional, defaults to "AND"
		              array(
			              'field' => 'service-general-check-main',
			              'value' => true,
			              // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
		              ),
	              ) ),
	         Field::make( 'separator', 'service-general-sep-service', '' )
	              ->set_help_text( 'Настройки для карточки на странице услуг' )
	              ->set_width( 100 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-services',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'text', 'service-general-title-general', 'Альтернативный заголовок для страницы услуг (карточка)' )
	              ->set_width( 50 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-services',
			              'value' => true,
		              )
	              ) ),
	         Field::make( 'textarea', 'service-general-desc', 'Короткое описание для карточки на стр услуг' )
	              ->set_rows( 4 )
	              ->set_width( 50 )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'service-general-check-services',
			              'value' => true,
		              )
	              ) ),
         ) );

Container::make( 'post_meta', 'Текст на странице' )
         ->where( 'post_template', '=', 'thanks.php' )
         ->where( 'post_type', '=', 'page' )
         ->add_fields( array(
	         Field::make( 'rich_text', 'thanks-text', 'Текст' )
	              ->set_width( 100 )
         ) );

Container::make( 'post_meta', 'Участие на главной' )
         ->where( 'post_type', '=', 'product' )
         ->add_fields( array(
	         Field::make( 'checkbox', 'product-main-page', 'Вывести ли товар на главную ?' )
	              ->set_help_text( 'При активации данного флага, товар выводит на главной. Максимум может
	               вывестись 3 товара. 
	              В случае если флаг активирован больше чем на 3х товарах все равно вывод будет только 3х, 
	              но сортировка между выбранными будет произведена по алфавиту ' )
	              ->set_width( 100 )
         ) );