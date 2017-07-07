<?php
require_once 'libs/bs4navwalker.php';

add_theme_support( 'post-thumbnails' );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/dist/js/robok.js', [], false, true );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/dist/css/robok.css' );
} );

register_nav_menus( [
	'primary_left'  => __( 'Menu Principal (Esquerda)', 'primary_left' ),
	'primary_right' => __( 'Menu Principal (Direita)', 'primary_right' ),
] );

function robok_main_nav_left() {
	return wp_nav_menu( [
		'menu'            => 'primary_left',
		'theme_location'  => 'primary_left',
		'container'       => 'div',
		'container_id'    => 'main-navbar-left',
		'container_class' => '',
		'menu_id'         => false,
		'menu_class'      => 'navbar-nav',
		'depth'           => 2,
		'fallback_cb'     => 'bs4navwalker::fallback',
		'walker'          => new bs4navwalker(),
	] );
}

function robok_main_nav_right() {
	return wp_nav_menu( [
		'menu'            => 'primary_right',
		'theme_location'  => 'primary_right',
		'container'       => 'div',
		'container_id'    => 'main-navbar-right',
		'container_class' => '',
		'menu_id'         => false,
		'menu_class'      => 'navbar-nav',
		'depth'           => 2,
		'fallback_cb'     => 'bs4navwalker::fallback',
		'walker'          => new bs4navwalker(),
	] );
}

function create_members_type() {
	register_post_type( 'members',
		[
			'labels'      => [
				'add_new_item'  => __( 'Adicionar novo membro' ),
				'name'          => __( 'Membros' ),
				'singular_name' => __( 'Membro' )
			],
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-admin-users',
			'supports'    => [
				'title'
			]
		]
	);


}

function create_sponsors_type() {
	register_post_type( 'sponsors',
		[
			'labels'      => [
				'add_new_item'  => __( 'Adicionar novo patrocinador' ),
				'name'          => __( 'Patrocinadores' ),
				'singular_name' => __( 'Patrocinador' )
			],
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-megaphone',
			'supports'    => [
				'title'
			]
		]
	);


}

function create_testimonials_type() {
	register_post_type( 'testimonials',
		[
			'labels'      => [
				'add_new_item'  => __( 'Adicionar novo depoimento' ),
				'name'          => __( 'Depoimentos' ),
				'singular_name' => __( 'Depoimento' )
			],
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-format-quote',
			'supports'    => [
				'title'
			]
		]
	);


}

add_action( 'init', 'register_custom_post_types' );
function register_custom_post_types() {
	create_members_type();
	create_sponsors_type();
	create_testimonials_type();

	flush_rewrite_rules();
}