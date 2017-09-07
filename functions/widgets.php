<?php

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
