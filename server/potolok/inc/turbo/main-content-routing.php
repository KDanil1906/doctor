<?php

function yturbo_acf_template( $content ) {

	//обрабатываем только нужные нам поля (остальные обработает плагин RSS for Yandex Turbo)
	if ( preg_match_all( "/%%(.*?)%%/i", $content, $res ) ) {
		foreach ( $res[0] as $r ) {

			if ( $r == '%%post_content%%' ) {
				$template_name = get_page_template_slug( get_the_ID() );

				/** Шаблон отдельных страниц услуг */
				if ( $template_name == 'page-services.php' ) {
					$content = str_replace( $r, get_template_part( 'page', 'services', array( 'turbo' => true )  ), $content );
				}


				/** Шаблон страницы "все услуги" */
				if ( $template_name == 'services.php' ) {
					$content = str_replace( $r, get_template_part( 'template-parts/service', 'more-services', array(
						'title' => 'Услуги',
						'turbo' => true
					) ), $content );
				}

				/** Шаблон Главная */
				if ( $template_name == 'home.php' ) {
					$content = str_replace( $r, get_template_part( 'template-parts/home', 'body', array( 'turbo' => true ) ), $content );
				}

				/** Шаблон Контакты */
				if ( $template_name == 'contacts.php' ) {
					$content = str_replace( $r, get_template_part( 'contacts', '', array( 'turbo' => true ) ), $content );
				}

				/** Шаблон "Полезное" (страница записей) */
				if ( $template_name == 'useful.php' ) {
					$content = str_replace( $r, get_template_part( 'template-parts/posts/get', 'posts', array( 'turbo' => true ) ), $content );
				}
			}


		}
	}

	return $content;
}

add_filter( 'yturbo_the_template', 'yturbo_acf_template' );
//обработка произвольных полей плагина ACF end
