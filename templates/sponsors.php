<?php
$new_query = new WP_Query( [
	'post_type' => 'sponsors',
] );

if ( $new_query->have_posts() ): ?>

    <h3 class="mb-4 text-uppercase text-center">Nossos patrocinadores</h3>

    <div class="owl-carousel owl-theme sponsors">

		<?php while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
            <div class="item">
                <a href="<?php the_field( 'url' ); ?>" target="_blank">
                    <img class="grayscale" src="<?= wp_get_attachment_image_src( get_field( 'imagem' ), 'sponsor-thumb' )[0] ?>" alt="<?php the_field( 'nome' ); ?>">
                </a>
            </div>
		<?php endwhile; ?>

    </div>

<?php endif;

wp_reset_postdata();