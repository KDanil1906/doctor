<?php


function load_form() {
	$form = $_POST['form'];

	echo get_template_part( '/inc/form', $form );
}

add_action( 'wp_ajax_load_form', 'load_form' );
add_action( 'wp_ajax_nopriv_load_form', 'load_form' );