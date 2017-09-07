<?php

function create_members_type() {
	register_post_type( 'members',
		[
			'labels'      => [
				'add_new_item'  => __( 'Adicionar novo membro' ),
				'name'          => __( 'Membros' ),
				'singular_name' => __( 'Membro' ),
			],
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-admin-users',
			'supports'    => [
				'title',
			],
		]
	);
}

function create_sponsors_type() {
	register_post_type( 'sponsors',
		[
			'labels'      => [
				'add_new_item'  => __( 'Adicionar novo patrocinador' ),
				'name'          => __( 'Patrocinadores' ),
				'singular_name' => __( 'Patrocinador' ),
			],
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-megaphone',
			'supports'    => [
				'title',
			],
		]
	);
}

function create_testimonials_type() {
	register_post_type( 'testimonials',
		[
			'labels'      => [
				'add_new_item'  => __( 'Adicionar novo depoimento' ),
				'name'          => __( 'Depoimentos' ),
				'singular_name' => __( 'Depoimento' ),
			],
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-format-quote',
			'supports'    => [
				'title',
			],
		]
	);
}

function register_custom_post_types() {
	create_members_type();
	create_sponsors_type();
	create_testimonials_type();

	flush_rewrite_rules();
}

add_action( 'init', 'register_custom_post_types' );
