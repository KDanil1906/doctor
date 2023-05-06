<?php

//обработка произвольных полей плагина ACF begin
function yturbo_acf_template( $content ) {

	//обрабатываем только нужные нам поля (остальные обработает плагин RSS for Yandex Turbo)
	if (preg_match_all("/%%(.*?)%%/i", $content, $res)) {
		foreach ($res[0] as $r) {
			//обрабатываем поле %%myimage%% (заменяем его на результат работы функции ct_get_myimage)
			if($r == '%%content-for-turbo__main-page%%') {
				$content = str_replace($r, get_template_part( 'template-parts/home', 'body', array('turbo'=>true) ), $content);
			}

			if($r == '%%content-for-turbo__all-services%%') {
				$content = str_replace($r, get_template_part( 'template-parts/home', 'body', array('turbo'=>true) ), $content);
			}

		}
	}

	return $content;
}
add_filter( 'yturbo_the_template', 'yturbo_acf_template' );
//обработка произвольных полей плагина ACF end
