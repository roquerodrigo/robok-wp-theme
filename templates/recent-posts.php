<?php
$recent_posts = wp_get_recent_posts( [
	'numberposts' => 3,
	'post_status' => 'publish',
] );
?>

<h3 class="mb-4 text-uppercase text-center">Notícias Recentes</h3>

<div class="card-deck">
	<?php foreach ( $recent_posts as $recent ) : ?>

        <div class="card bg-dark m-2">
            <a class="card-link" href="<?= get_permalink( $recent["ID"] ) ?>">

				<?php if ( has_post_thumbnail( $recent["ID"] ) ): ?>
                    <img class="card-img-top" src="<?= get_the_post_thumbnail_url( $recent["ID"], 'recent-post-thumb' ) ?>" alt="<?= $recent["post_title"] ?>">
				<?php else : ?>
                    <img class="card-img-top" src="http://via.placeholder.com/1200x630" alt="<?= $recent["post_title"] ?>">
				<?php endif; ?>

                <div class="card-body">
                    <h5 class="card-title"><?= $recent["post_title"] ?></h5>
                </div>
            </a>
        </div>

	<?php endforeach; ?>
</div>

<div class="text-right mt-2"><a href="/blog" class="text-uppercase">Ver mais</a></div>

<?php wp_reset_query(); ?>
