<?php

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

register_nav_menus( [
	'primary_left'  => __( 'Menu Principal (Esquerda)', 'primary_left' ),
	'primary_right' => __( 'Menu Principal (Direita)', 'primary_right' ),
] );
