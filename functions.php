<?php

require_once 'libs/bs4navwalker.php';

if (
	! in_array( $GLOBALS['pagenow'], [ 'wp-login.php', 'wp-register.php' ] )
	&& ! is_admin()
	&& ! is_user_logged_in()
) {
	wp_redirect( 'https://www.facebook.com/EquipeRobok/' );
	exit();
}

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

add_action( 'init', 'register_custom_post_types' );
function register_custom_post_types() {
	create_members_type();
	create_sponsors_type();
	create_testimonials_type();

	flush_rewrite_rules();
}

add_action( 'widgets_init', 'register_footer_widgets' );
function register_footer_widgets() {

	for ( $i = 0; $i < 4; $i ++ ) {
		register_sidebar( [
			'name'          => __( 'Footer #' . ( $i + 1 ), 'robok' ),
			'id'            => 'footer-' . ( $i + 1 ),
			'description'   => __( 'Footer #' . ( $i + 1 ), 'robok' ),
			'before_widget' => null,
			'after_widget'  => null,
			'before_title'  => '<h4 class="text-uppercase">',
			'after_title'   => '</h4>',
		] );
	}
}

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