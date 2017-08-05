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

add_action( 'widgets_init', 'register_widgets' );
function register_widgets() {
	register_sidebar( [
		'name'          => __( 'Barra Lateral (Direita)', 'robok' ),
		'id'            => 'aside-right',
		'description'   => __( 'Barra Lateral (Direita)', 'robok' ),
		'before_widget' => null,
		'after_widget'  => null,
		'before_title'  => '<h4 class="text-uppercase">',
		'after_title'   => '</h4>',
	] );
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

if ( function_exists( "register_field_group" ) ) {
	register_field_group( [
		'id'         => 'acf_depoimentos',
		'title'      => 'Depoimentos',
		'fields'     => [
			[
				'key'           => 'field_595e252fc1386',
				'label'         => 'Nome',
				'name'          => 'nome',
				'type'          => 'text',
				'instructions'  => 'Nome da pessoa',
				'required'      => 1,
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			],
			[
				'key'          => 'field_595e2558c1388',
				'label'        => 'Foto',
				'name'         => 'foto',
				'type'         => 'image',
				'save_format'  => 'url',
				'preview_size' => 'thumbnail',
				'library'      => 'all',
			],
			[
				'key'           => 'field_595e2540c1387',
				'label'         => 'Depoimento',
				'name'          => 'depoimento',
				'type'          => 'textarea',
				'required'      => 1,
				'default_value' => '',
				'placeholder'   => '',
				'maxlength'     => '',
				'rows'          => '',
				'formatting'    => 'br',
			],
		],
		'location'   => [
			[
				[
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'testimonials',
					'order_no' => 0,
					'group_no' => 0,
				],
			],
		],
		'options'    => [
			'position'       => 'acf_after_title',
			'layout'         => 'default',
			'hide_on_screen' => [
			],
		],
		'menu_order' => 0,
	] );
	register_field_group( [
		'id'         => 'acf_membros',
		'title'      => 'Membros',
		'fields'     => [
			[
				'key'           => 'field_595d9c3c884f1',
				'label'         => 'Nome',
				'name'          => 'nome',
				'type'          => 'text',
				'required'      => 1,
				'default_value' => '',
				'placeholder'   => 'Nome',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => 50,
			],
			[
				'key'           => 'field_595e205edd8d9',
				'label'         => 'Curso',
				'name'          => 'curso',
				'type'          => 'select',
				'required'      => 1,
				'choices'       => [
					''                                   => '',
					'Administração'                      => 'Administração',
					'Ciência da Computação'              => 'Ciência da Computação',
					'Ciências Atmosféricas'              => 'Ciências Atmosféricas',
					'Ciências Biológicas Licenciatura'   => 'Ciências Biológicas Licenciatura',
					'Engenharia Ambiental'               => 'Engenharia Ambiental',
					'Engenharia Civil'                   => 'Engenharia Civil',
					'Engenharia de Bioprocessos'         => 'Engenharia de Bioprocessos',
					'Engenharia de Computação'           => 'Engenharia de Computação',
					'Engenharia de Controle e Automação' => 'Engenharia de Controle e Automação',
					'Engenharia de Energia'              => 'Engenharia de Energia',
					'Engenharia de Materiais'            => 'Engenharia de Materiais',
					'Engenharia de Produção'             => 'Engenharia de Produção',
					'Engenharia Eletrônica'              => 'Engenharia Eletrônica',
					'Engenharia Elétrica'                => 'Engenharia Elétrica',
					'Engenharia Hídrica'                 => 'Engenharia Hídrica',
					'Engenharia Mecânica'                => 'Engenharia Mecânica',
					'Engenharia Mecânica Aeronáutica'    => 'Engenharia Mecânica Aeronáutica',
					'Engenharia Química'                 => 'Engenharia Química',
					'Física Bacharelado'                 => 'Física Bacharelado',
					'Física Licenciatura'                => 'Física Licenciatura',
					'Matemática Bacharelado'             => 'Matemática Bacharelado',
					'Matemática Licenciatura'            => 'Matemática Licenciatura',
					'Química Bacharelado'                => 'Química Bacharelado',
					'Química Licenciatura'               => 'Química Licenciatura',
					'Sistemas de Informação'             => 'Sistemas de Informação',
				],
				'default_value' => '',
				'allow_null'    => 0,
				'multiple'      => 0,
			],
			[
				'key'           => 'field_595d9cc677f5c',
				'label'         => 'Subequipe',
				'name'          => 'subequipe',
				'type'          => 'select',
				'required'      => 1,
				'choices'       => [
					''               => '',
					'Eletrônica'     => 'Eletrônica',
					'Gestão'         => 'Gestão',
					'Marketing'      => 'Marketing',
					'Mecânica'       => 'Mecânica',
					'Projeto Social' => 'Projeto Social',
					'Software'       => 'Software',
				],
				'default_value' => '',
				'allow_null'    => 0,
				'multiple'      => 0,
			],
			[
				'key'           => 'field_5961115e31be1',
				'label'         => 'Ano de entrada na UNIFEI',
				'name'          => 'ano_de_entrada_unifei',
				'type'          => 'select',
				'required'      => 1,
				'choices'       => [
					''   => '',
					2000 => 2000,
					2001 => 2001,
					2002 => 2002,
					2003 => 2003,
					2004 => 2004,
					2005 => 2005,
					2006 => 2006,
					2007 => 2007,
					2008 => 2008,
					2009 => 2009,
					2010 => 2010,
					2011 => 2011,
					2012 => 2012,
					2013 => 2013,
					2014 => 2014,
					2015 => 2015,
					2016 => 2016,
					2017 => 2017,
					2018 => 2018,
					2019 => 2019,
					2020 => 2020,
				],
				'default_value' => '',
				'allow_null'    => 0,
				'multiple'      => 0,
			],
			[
				'key'           => 'field_595d9dcef6db2',
				'label'         => 'Ano de entrada na equipe',
				'name'          => 'ano_de_entrada_equipe',
				'type'          => 'select',
				'required'      => 1,
				'choices'       => [
					''   => '',
					2010 => 2010,
					2011 => 2011,
					2012 => 2012,
					2013 => 2013,
					2014 => 2014,
					2015 => 2015,
					2016 => 2016,
					2017 => 2017,
					2018 => 2018,
				],
				'default_value' => '',
				'allow_null'    => 0,
				'multiple'      => 0,
			],
			[
				'key'           => 'field_595d9e5d04c8b',
				'label'         => 'Ano de saída da equipe',
				'name'          => 'ano_de_saida_equipe',
				'type'          => 'select',
				'choices'       => [
					''   => '',
					2010 => 2010,
					2011 => 2011,
					2012 => 2012,
					2013 => 2013,
					2014 => 2014,
					2015 => 2015,
					2016 => 2016,
					2017 => 2017,
					2018 => 2018,
				],
				'default_value' => '',
				'allow_null'    => 1,
				'multiple'      => 0,
			],
			[
				'key'          => 'field_595d9ca877f5b',
				'label'        => 'Foto',
				'name'         => 'foto',
				'type'         => 'image',
				'save_format'  => 'url',
				'preview_size' => 'medium',
				'library'      => 'all',
			],
			[
				'key'           => 'field_595d9fb2da877',
				'label'         => 'Sobre',
				'name'          => 'sobre',
				'type'          => 'textarea',
				'default_value' => '',
				'placeholder'   => '',
				'maxlength'     => '',
				'rows'          => '',
				'formatting'    => 'br',
			],
			[
				'key'           => 'field_595d9fcfda878',
				'label'         => 'URL',
				'name'          => 'url',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			],
		],
		'location'   => [
			[
				[
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'members',
					'order_no' => 0,
					'group_no' => 0,
				],
			],
		],
		'options'    => [
			'position'       => 'acf_after_title',
			'layout'         => 'default',
			'hide_on_screen' => [
			],
		],
		'menu_order' => 0,
	] );
	register_field_group( [
		'id'         => 'acf_patrocinadores',
		'title'      => 'Patrocinadores',
		'fields'     => [
			[
				'key'           => 'field_595e24c122e70',
				'label'         => 'Nome',
				'name'          => 'nome',
				'type'          => 'text',
				'required'      => 1,
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			],
			[
				'key'          => 'field_595e24d322e71',
				'label'        => 'Imagem',
				'name'         => 'imagem',
				'type'         => 'image',
				'save_format'  => 'url',
				'preview_size' => 'thumbnail',
				'library'      => 'all',
			],
			[
				'key'           => 'field_595e24f822e72',
				'label'         => 'URL',
				'name'          => 'url',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			],
		],
		'location'   => [
			[
				[
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'sponsors',
					'order_no' => 0,
					'group_no' => 0,
				],
			],
		],
		'options'    => [
			'position'       => 'acf_after_title',
			'layout'         => 'default',
			'hide_on_screen' => [
			],
		],
		'menu_order' => 0,
	] );
}
