<?php


use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ServiceFieldsCreator {

	public $fields_array = array();
	public $select_name = array(
		'our-works'           => 'Наши работы',
		'what-do'             => 'Что делать ?',
		'send-photo'          => 'Отправьте фото',
		'how-we-work'         => 'Как мы работаем',
		'text-block'          => 'Текстовый блок',
		'slider-more-actions' => 'Слайдер дополнительных условий оказаний услуги (работаем без пыли и тд)',
		'more-info'           => 'Дополнительный блок информации (пример: Обработка грибка)',
		'form'                => 'Форма (с парнем в каске)',
		'before-after'        => 'Работы "до и после" (слайдер)',
		'examples-work'       => 'Наши работы (слайдер изображений)',
		'potolok-types'       => 'Блок Типы потолков (тканевый, матовый и тд)',
		'we-in-number'        => 'Компания в цифрах',
		'home-rules'          => 'Главная - Наши правила',
		'home-reviews'        => 'Главная - Отзывы',
		'home-discount'       => 'Главная - Скидка по социальной карте',
		'home-partners'       => 'Главная - Наши партнеры',
		'home-dzen'           => 'Главная - Дзен',
	);


	private function blockSelector() {
		array_push( $this->fields_array,
			Field::make( 'select', 'service-blocks-wrap-select', 'Выбор блока' )
			     ->set_options( $this->select_name )
			     ->set_width( 100 )
		);
	}

	function getFields() {
		$this->blockSelector();
		$this->ourWorksFields();
		$this->whatDoFields();
		$this->sendPhotoFields();
		$this->howWorkFields();
		$this->moreInfoFields();
		$this->formFields();
		$this->textBlock();
		$this->beforeAfter();
		$this->exampleWork();
		$this->potolokTypes();
		$this->weInNumbers();
		$this->homeRusel();
		$this->homeReviews();
		$this->homeDiscount();
		$this->homePartners();
		$this->homeDzen();
		$this->moreActions();

		return $this->fields_array;
	}

	private function moreActions() {
		array_push( $this->fields_array,
			Field::make( 'text', 'more-actions-title', 'Заголовок блока' )
			     ->set_width( 50 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'slider-more-actions',
				     )
			     ) ),
			Field::make( 'textarea', 'more-actions-undertitle', 'Подзаголовок (не обязательно)' )
			     ->set_width( 50 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'slider-more-actions',
				     )
			     ) ),
			Field::make( 'complex', 'more-actions-items', 'Карточки слайдера' )
			     ->set_collapsed( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'slider-more-actions',
				     )
			     ) )
			     ->setup_labels(
				     array(
					     'plural_name'   => 'Карточка',
					     'singular_name' => 'Карточки',
				     )
			     )
			     ->add_fields( array(
				     Field::make( 'text', 'more-actions-item-title', 'Заголовок' )
				          ->set_width( 50 ),
				     Field::make( 'image', 'more-actions-item-image', 'Изображение' )
				          ->set_width( 50 ),
				     Field::make( 'rich_text', 'more-actions-item-desc', 'Описание' )
				          ->set_width( 100 ),
			     ) )
			     ->set_header_template( '
                <% if (more_actions_item_title) { %>
                    <%- more_actions_item_title %>
                <% } %>
            ' ),
		);
	}

	private function homeRusel() {
		array_push( $this->fields_array,
			Field::make( 'separator', 'service-home-rule', 'Блок добавлен. Информация в блоке сквозная (повторяется на всех страницах)' )
			     ->set_help_text( 'Управление контентом этого блока задается на главной странице. Поставить индивидуальные данные для страницы нельзя, данные общие для всех страниц где выводится этот блок' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'home-rules',
				     )
			     ) ),
		);
	}

	private function homeReviews() {
		array_push( $this->fields_array,
			Field::make( 'separator', 'service-home-reviews', 'Блок добавлен. Информация в блоке сквозная (повторяется на всех страницах)' )
			     ->set_help_text( 'Управление контентом этого блока задается на главной странице. Поставить индивидуальные данные для страницы нельзя, данные общие для всех страниц где выводится этот блок' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'home-reviews',
				     )
			     ) ),
		);
	}

	private function homeDiscount() {
		array_push( $this->fields_array,
			Field::make( 'separator', 'service-home-discount', 'Блок добавлен. Информация в блоке сквозная (повторяется на всех страницах)' )
			     ->set_help_text( 'Управление контентом этого блока задается на главной странице. Поставить индивидуальные данные для страницы нельзя, данные общие для всех страниц где выводится этот блок' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'home-discount',
				     )
			     ) ),
		);
	}

	private function homePartners() {
		array_push( $this->fields_array,
			Field::make( 'separator', 'service-home-partners', 'Блок добавлен. Информация в блоке сквозная (повторяется на всех страницах)' )
			     ->set_help_text( 'Управление контентом этого блока задается на главной странице. Поставить индивидуальные данные для страницы нельзя, данные общие для всех страниц где выводится этот блок' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'home-partners',
				     )
			     ) ),
		);
	}

	private function homeDzen() {
		array_push( $this->fields_array,
			Field::make( 'separator', 'service-home-dzen', 'Блок добавлен. Информация в блоке сквозная (повторяется на всех страницах)' )
			     ->set_help_text( 'Управление контентом этого блока задается на главной странице. Поставить индивидуальные данные для страницы нельзя, данные общие для всех страниц где выводится этот блок' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'home-dzen',
				     )
			     ) ),
		);
	}

	private function ourWorksFields() {
		array_push( $this->fields_array,
			Field::make( 'rich_text', 'our-works-title', 'Заголовок' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'our-works',
				     )
			     ) ),
			Field::make( 'textarea', 'our-works-desc', 'Описание' )
			     ->set_width( 33 )
			     ->set_rows( 4 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'our-works',
				     )
			     ) ),
			Field::make( 'complex', 'our-works-items', 'Работы' )
			     ->set_collapsed( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'our-works',
				     )
			     ) )
			     ->setup_labels(
				     array(
					     'plural_name'   => 'Работы',
					     'singular_name' => 'Работу',
				     )
			     )
			     ->add_fields( 'our-works-items-box', array(
				     Field::make( 'text', 'our-works-items-item-name', 'Название работы' )
				          ->set_width( 30 ),
				     Field::make( 'rich_text', 'our-works-items-item-desc', 'Описание работы' ),
				     Field::make( 'media_gallery', 'our-works-items-item-images', 'Фото работ' )
				          ->set_width( 100 )
				          ->set_type( array( 'image' ) ),
				     Field::make( 'complex', 'our-works-items-item-material', 'Что использовалось в работе' )
				          ->set_collapsed( true )
				          ->setup_labels(
					          array(
						          'plural_name'   => 'Материалы',
						          'singular_name' => 'Материал',
					          )
				          )
				          ->add_fields( 'our-works-items-item-material-box', array(
					          Field::make( 'text', 'our-works-items-item-material-item', 'Материал' )
					               ->set_width( 30 ),
				          ) )
				          ->set_header_template( '
                <% if (our_works_items_item_material_item) { %>
                    <%- our_works_items_item_material_item %>
                <% } %>
            ' )

			     ) )
			     ->set_header_template( '
                <% if (our_works_items_item_name) { %>
                    <%- our_works_items_item_name %>
                <% } %>
            ' ),
		);
	}

	private function weInNumbers() {
		array_push( $this->fields_array,
			Field::make( 'separator', 'we-in-numbers-info', 'Блок добавлен автоматически' )
			     ->set_help_text( 'Данный блок добавлен в указанное место. Если нужно изменить данные выводящиеся в блоке то делать это стоит в разделе "Общие Блоки"' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'we-in-number',
				     )
			     ) ),
		);
	}

	private function whatDoFields() {
		array_push( $this->fields_array,
			Field::make( 'rich_text', 'what-do-title', 'Заголовок' )
			     ->set_width( 33 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) ),
			Field::make( 'textarea', 'what-do-desc', 'Описание' )
			     ->set_width( 33 )
			     ->set_rows( 4 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) ),
			Field::make( 'checkbox', 'what-do-title-have', 'Вывести ли заголовок "В первую очередь"' )
			     ->set_width( 100 )
			     ->set_default_value( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) ),
			Field::make( 'complex', 'what-do-do', 'Что стоит делать' )
			     ->set_collapsed( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) )
			     ->setup_labels(
				     array(
					     'plural_name'   => 'Пункты',
					     'singular_name' => 'Пункт',
				     )
			     )
			     ->add_fields( 'what-do-do-box', array(
				     Field::make( 'textarea', 'what-do-do-title', 'Описание' )
				          ->set_width( 50 )
				          ->set_rows( 2 ),
			     ) )
			     ->set_header_template( '
                <% if (what_do_do_title) { %>
                    <%- what_do_do_title %>
                <% } %>
            ' ),
			Field::make( 'checkbox', 'what-not-do-title-have', 'Вывести ли заголовок "Ни в коем случае не делайте этого"' )
			     ->set_width( 100 )
			     ->set_default_value( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) ),
			Field::make( 'complex', 'what-do-not-do', 'Чего делать не стоит' )
			     ->set_collapsed( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) )
			     ->setup_labels(
				     array(
					     'plural_name'   => 'Пункты',
					     'singular_name' => 'Пункт',
				     )
			     )
			     ->add_fields( 'what-do-not-do-box', array(
				     Field::make( 'textarea', 'what-do-not-do-title', 'Описание' )
				          ->set_width( 50 )
				          ->set_rows( 2 ),
			     ) )
			     ->set_header_template( '
                <% if (what_do_not_do_title) { %>
                    <%- what_do_not_do_title %>
                <% } %>
            ' ),
			Field::make( 'checkbox', 'what-we-do-title-have', 'Вывести ли заголовок "Что делаем мы"' )
			     ->set_width( 100 )
			     ->set_default_value( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) ),
			Field::make( 'complex', 'what-do-we-do', 'Что делаем мы' )
			     ->set_collapsed( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) )
			     ->setup_labels(
				     array(
					     'plural_name'   => 'Пункты',
					     'singular_name' => 'Пункт',
				     )
			     )
			     ->add_fields( 'what-do-we-do-box', array(
				     Field::make( 'textarea', 'what-do-we-do-title', 'Описание' )
				          ->set_width( 50 )
				          ->set_rows( 2 ),
			     ) )
			     ->set_header_template( '
                <% if (what_do_we_do_title) { %>
                    <%- what_do_we_do_title %>
                <% } %>
            ' ),
			Field::make( 'checkbox', 'what-more-do-title-have', 'Вывести ли заголовок "При необходимости"' )
			     ->set_width( 100 )
			     ->set_default_value( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) ),
			Field::make( 'complex', 'what-do-more-do', 'При необходимости' )
			     ->set_collapsed( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'what-do',
				     )
			     ) )
			     ->setup_labels(
				     array(
					     'plural_name'   => 'Пункты',
					     'singular_name' => 'Пункт',
				     )
			     )
			     ->add_fields( 'what-do-more-do-box', array(
				     Field::make( 'textarea', 'what-do-more-do-title', 'Описание' )
				          ->set_width( 50 )
				          ->set_rows( 2 ),
			     ) )
			     ->set_header_template( '
                <% if (what_do_more_do_title) { %>
                    <%- what_do_more_do_title %>
                <% } %>
            ' ),
		);
	}

	function sendPhotoFields() {
		array_push( $this->fields_array,
			Field::make( 'separator', 'send-photo', __( 'Блок "отправьте нам фото, узнайте стоимость"' ) )
			     ->set_help_text( 'Настройки данного блока находятся в влкадке "Общие блока" в админ панели. Они общие для всех страниц' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'send-photo',
				     )
			     ) )
		);
	}

	function potolokTypes() {
		array_push( $this->fields_array,
			Field::make( 'text', 'potolok-type-title', 'Заголовок' )
			     ->set_width( 50 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'potolok-types',
				     )
			     ) ),
			Field::make( 'textarea', 'potolok-type-undertitle', 'Подзаголовок' )
			     ->set_width( 50 )
			     ->set_rows( 4 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'potolok-types',
				     )
			     ) ),
			Field::make( 'complex', 'potolok-type-items', 'Типы потолков' )
			     ->set_collapsed( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'potolok-types',
				     )
			     ) )
			     ->setup_labels(
				     array(
					     'plural_name'   => 'Типы',
					     'singular_name' => 'Тип',
				     )
			     )
			     ->add_fields( 'potolok-type-items-box', array(
				     Field::make( 'text', 'potolok-type-name', 'Короткое наименование' )
				          ->set_help_text( 'Передается в панель переключения между вилами потолков, например "Матовый"' )
				          ->set_required()
				          ->set_width( 50 ),
				     Field::make( 'text', 'potolok-type-full-name', 'Полное наименование' )
				          ->set_help_text( 'Передается в карточку с подробной информацией о виде потолка, пример "Матовые натяжные потолки"' )
				          ->set_required()
				          ->set_width( 50 ),
				     Field::make( 'textarea', 'potolok-type-desc', 'Короткое описание' )
				          ->set_required()
				          ->set_rows( 4 )
				          ->set_attribute( 'maxLength', 662 )
				          ->set_width( 50 ),
				     Field::make( 'text', 'potolok-type-price', 'Цена' )
				          ->set_required()
				          ->set_help_text( 'Цена с установкой за m2' )
				          ->set_attribute( 'type', 'number' )
				          ->set_width( 50 ),
				     Field::make( 'media_gallery', 'potolok-type-images', __( 'Изображения в слайдер' ) )
				          ->set_type( array( 'image' ) ),
				     Field::make( 'image', 'potolok-type-mobile-image', 'Фото для карточки мобильной версии' )
				          ->set_required()
				          ->set_help_text( 'Данное фото устанавливается на мобильной версии в карточку слайдера (по нажатию которой открывается полный блок)' )
				          ->set_width( 50 ),

			     ) )
			     ->set_header_template( '
                <% if (potolok_type_name) { %>
                    <%- potolok_type_name %>
                <% } %>
            ' )

		);
	}

	function beforeAfter() {
		array_push( $this->fields_array,
			Field::make( 'rich_text', 'bf-block-title', 'Заголовок' )
			     ->set_width( 50 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'before-after',
				     )
			     ) ),
			Field::make( 'textarea', 'bf-block-undertitle', 'Подзаголовок' )
			     ->set_width( 50 )
			     ->set_rows( 4 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'before-after',
				     )
			     ) ),
			Field::make( 'complex', 'bf-items', 'Работы "до и после"' )
			     ->set_collapsed( true )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'before-after',
				     )
			     ) )
			     ->setup_labels(
				     array(
					     'plural_name'   => 'Работы',
					     'singular_name' => 'Работу',
				     )
			     )
			     ->add_fields( 'bf-items-box', array(
				     Field::make( 'textarea', 'bf-item-title', 'Заголовок' )
				          ->set_width( 50 )
				          ->set_rows( 2 ),
				     Field::make( 'textarea', 'bf-item-desc', 'Описание' )
				          ->set_width( 50 )
				          ->set_rows( 3 ),
				     Field::make( 'image', 'bf-item-img-before', 'Изображение "до"' )
				          ->set_width( 50 ),
				     Field::make( 'image', 'bf-item-img-after', 'Изображение "После"' )
				          ->set_width( 50 ),
			     ) )
			     ->set_header_template( '
                <% if (bf_item_title) { %>
                    <%- bf_item_title %>
                <% } %>
            ' )
		);
	}

	function exampleWork() {
		array_push( $this->fields_array,
			Field::make( 'text', 'example-work-title', __( 'Заголовок блока' ) )
			     ->set_width( 50 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'examples-work',
				     )
			     ) ),
			Field::make( 'media_gallery', 'example-work-photo', __( 'Фото работ' ) )
			     ->set_type( array( 'image' ) )
			     ->set_width( 50 )->set_conditional_logic( array(
					array(
						'field' => 'service-blocks-wrap-select',
						'value' => 'examples-work',
					)
				) ),
		);
	}

	function textBlock() {
		array_push( $this->fields_array,
			Field::make( 'rich_text', 'text-block-title', 'Заголовок' )
			     ->set_width( 50 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'text-block',
				     )
			     ) ),
			Field::make( 'textarea', 'text-block-underitle', 'Подзаголовок' )
			     ->set_rows( 4 )
			     ->set_width( 50 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'text-block',
				     )
			     ) ),
			Field::make( 'rich_text', 'text-block-desc', 'Содержимое' )
			     ->set_width( 100 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'text-block',
				     )
			     ) ),
		);
	}

	function howWorkFields() {
		array_push( $this->fields_array,
			Field::make( 'separator', 'how-we-work', __( 'Блок "Как мы работаем"' ) )
			     ->set_help_text( 'Настройки данного блока находятся в влкадке "Общие блока" в админ панели. Они общие для всех страниц' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'how-we-work',
				     )
			     ) )
		);
	}

	function moreInfoFields() {
		array_push( $this->fields_array,
			Field::make( 'text', 'more-info-title', 'Заголовок' )
			     ->set_width( 33 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'more-info',
				     )
			     ) ),
			Field::make( 'textarea', 'more-info-desc', 'Описание' )
			     ->set_width( 33 )
			     ->set_rows( 3 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'more-info',
				     )
			     ) ),
			Field::make( 'text', 'more-info-link', 'Ссылка' )
			     ->set_width( 33 )
			     ->set_help_text( 'Ссылка должна указывать на страницу с описанием услуги. Передавать следует относительную ссылку. То есть если есть https://doctor-potolkov.ru/more то передануть нужно /more' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'more-info',
				     )
			     ) ),
			Field::make( 'image', 'more-info-image', 'Изображение' )
			     ->set_width( 100 )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'more-info',
				     )
			     ) ),
		);
	}

	function formFields() {
		array_push( $this->fields_array,
			Field::make( 'separator', 'form-info-link', __( 'Форма добавлена на страницу' ) )
			     ->set_help_text( 'Никаких полей для формы заполнять не нужно. Форма будет отображена на страничке. Достаточно сейчас сохранить страничку' )
			     ->set_conditional_logic( array(
				     array(
					     'field' => 'service-blocks-wrap-select',
					     'value' => 'form',
				     )
			     ) )
		);
	}

}