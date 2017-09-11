<?php
$recent_posts = wp_get_recent_posts( [
	'numberposts' => 3,
	'post_status' => 'publish',
] );
?>

<div class="d-flex justify-content-between mb-4">
    <h3 class="text-uppercase">
        Notícias Recentes
    </h3>
    <a href="/blog" class="btn btn-light">
        Ver mais <i class="mdi mdi-arrow-right"></i>
    </a>
</div>

<div class="card-deck">
	<?php foreach ( $recent_posts as $recent ) : ?>

        <div class="card bg-dark mb-2">
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

<?php wp_reset_query(); ?>
