<?php
/**
 * Автозагрузка классов.
 *
 * @param string $class_name Имя класса.
 */
function custom_autoload( $class_name ) {
	// Путь к папке с классами.
	$classes_dir = __DIR__;
	$file_path = $classes_dir . '/' . $class_name;
	$file_path = str_replace('\\', '/', $file_path);

	if(file_exists($file_path)) {
		debug($file_path);
	}

//	debug($file_path);



//	// Перебираем файлы и подключаем их, если имя класса совпадает.
//	foreach ( $class_files as $file ) {
//		if ( $class_name === basename( $file, '.php' ) ) {
//			require_once $classes_dir . '/' . $file;
//			break;
//		}
//	}
}

// Регистрируем функцию автозагрузки классов.
spl_autoload_register( 'custom_autoload' );
