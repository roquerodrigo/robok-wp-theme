<?php
$loop = new WP_Query( [
	'post_type'      => 'testimonials',
	'posts_per_page' => 5,
	'orderby'        => 'rand',
] );

if ( $loop->have_posts() ): ?>

    <h3 class="mb-4 text-uppercase text-center">Depoimentos</h3>

    <div class="owl-carousel owl-theme testimonials">

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="item text-center">
                <img src="<?= wp_get_attachment_image_src( get_field( 'foto' ), 'testimonial-thumb' )[0] ?>" alt="Depoimento de <?php the_field( 'nome' ) ?>" class="rounded-circle ml-auto mr-auto mb-4" style="height: 100px; width: 100px">
                <h4><?php the_field( 'nome' ) ?></h4>
                <p><?php the_field( 'depoimento' ) ?></p>
            </div>

		<?php endwhile ?>

    </div>

<?php endif;

wp_reset_query();
