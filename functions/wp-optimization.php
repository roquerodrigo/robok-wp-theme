<?php

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/dist/js/robok.js', [], filemtime( __DIR__ . '/../assets/dist/js/robok.js' ), true );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/dist/css/robok.css', [], filemtime( __DIR__ . '/../assets/dist/css/robok.css' ) );
} );

function wpse_setup_theme() {
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'recent-post-thumb', 600, 315 );
		add_image_size( 'sponsor-thumb', 99999999, 150 );
		add_image_size( 'testimonial-thumb', 150, 150 );
		add_image_size( 'member-thumb', 200, 200 );
	}
}

add_action( 'after_setup_theme', 'wpse_setup_theme' );

add_theme_support( 'title-tag' );

function bootstrap_pagination() {

	$pages = paginate_links( [
			'type'      => 'array',
			'prev_next' => true,
			'prev_text' => __( '« Página anterior' ),
			'next_text' => __( 'Próxima página »' ),
		]
	);

	if ( is_array( $pages ) ) {

		$pagination = '<ul class="pagination justify-content-center">';

		foreach ( $pages as $page ) {
			$page = str_replace( 'page-numbers', 'page-link', $page );
			$page = str_replace( 'current', 'bg-dark text-light disabled', $page );

			$pagination .= '<li class="page-item">' . $page . '</li>';
		}

		$pagination .= '</ul>';

		echo $pagination;
	}
}

function disable_wp_emojicons() {

	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, [ 'wpemoji' ] );
	} else {
		return [];
	}
}

add_filter( 'emoji_svg_url', '__return_false' );

remove_action( 'wp_head', 'wp_generator' );
