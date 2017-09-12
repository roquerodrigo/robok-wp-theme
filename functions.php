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

function related_posts() {
	$args = [
		'posts_per_page' => 3,
		'post_in'        => get_the_tag_list(),
	];

	$the_query = new WP_Query( $args ); ?>

    <section id="related_posts">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <div class="card bg-light mb-2">
                <a class="card-link" href="<?= get_permalink() ?>">

					<?php if ( has_post_thumbnail() ): ?>
                        <img class="card-img-top" src="<?= get_the_post_thumbnail_url( null, 'recent-post-thumb' ) ?>" alt="<?= the_title() ?>">
					<?php else : ?>
                        <img class="card-img-top" src="http://via.placeholder.com/1200x630" alt="<?= the_title() ?>">
					<?php endif; ?>

                    <div class="card-body">
                        <h5 class="card-title text-dark"><?= the_title() ?></h5>
                    </div>
                </a>
            </div>

		<?php endwhile; ?>

    </section>

	<?php
	wp_reset_postdata();
}
