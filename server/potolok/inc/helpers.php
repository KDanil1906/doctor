<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


//Удобная развертка массива
if ( ! function_exists( 'get_pr' ) ) {
	/**
	 * Debug function print_r
	 *
	 * @param mixed $var
	 * @param boolean $die
	 */
	function get_pr( $var, $die = true ) {
		echo '<pre>';
		print_r( $var );
		echo '</pre>';
		if ( $die ) {
			die();
		}
	}
}
if ( ! function_exists( 'get_vd' ) ) {
	/**
	 * Debug function var_dump
	 *
	 * @param mixed $var
	 * @param boolean $die
	 */
	function get_vd( $var, $die = true ) {
		echo '<pre>';
		var_dump( $var );
		echo '</pre>';
		if ( $die ) {
			die();
		}
	}
}
if ( ! function_exists( 'get_num_ending' ) ) {
	/**
	 * Склонения числительных
	 *
	 * @param $number
	 * @param $ending_array
	 *
	 * @return mixed
	 */
	function get_num_ending( $number, $ending_array ) {
		$number = $number % 100;
		if ( $number >= 11 && $number <= 19 ) {
			$ending = $ending_array[2];
		} else {
			$i = $number % 10;
			switch ( $i ) {
				case ( 1 ):
					$ending = $ending_array[0];
					break;
				case ( 2 ):
				case ( 3 ):
				case ( 4 ):
					$ending = $ending_array[1];
					break;
				default:
					$ending = $ending_array[2];
			}
		}

		return $ending;
	}
}

function debug( $data ) {
	$file_path = get_template_directory() . '/inc/debug.json';
	file_put_contents( $file_path, json_encode( $data, JSON_UNESCAPED_UNICODE ) . PHP_EOL, FILE_APPEND );
}
