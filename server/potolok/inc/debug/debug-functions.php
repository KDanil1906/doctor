<?php

function writeToDebug( $data ) {
	$path_file = get_stylesheet_directory() . '/inc/debug/debug.json';
	$data = json_encode($data, JSON_UNESCAPED_UNICODE);
	file_put_contents($path_file, $data, FILE_APPEND);
}