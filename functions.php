<?php

require_once 'libs/bs4navwalker.php';

require_once 'functions/wp-optimization.php';
require_once 'functions/navs.php';
require_once 'functions/custom-types.php';
require_once 'functions/custom-fields.php';
require_once 'functions/widgets.php';

function wps_yoast_breadcrumb_bootstrap() {
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		$breadcrumb = yoast_breadcrumb(
			'<ol class="breadcrumb"><li>',
			'</li></ol>',
			false
		);

		$breadcrumb = str_replace( '»', '</li><li>', $breadcrumb );

		echo str_replace( '<li>', '<li class="breadcrumb-item">', $breadcrumb );
	}
}