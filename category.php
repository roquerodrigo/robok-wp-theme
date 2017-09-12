<?php require_once 'templates/head.php';

$header_title = single_cat_title( '', false );

include( locate_template( 'templates/header-title.php' ) );

$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args     = [
	'post_type'      => 'post',
	'category_name'  => single_cat_title( '', false ),
	'posts_per_page' => 5,
	'paged'          => $paged,
];
$wp_query = new WP_Query( $args );

?>

<div class="container-fluid">

    <div class="row">
        <div class="container">
            <div class="col-12">

				<?php while ( have_posts() ) : the_post(); ?>

                    <div class="row mb-4 post">

                        <div class="col-md-4 mb-3">
                            <a href="<?= get_permalink() ?>">
								<?php if ( has_post_thumbnail() ): ?>
                                    <img class="card-img-top" src="<?= get_the_post_thumbnail_url( null, 'recent-post-thumb' ) ?>" alt="<?php the_title() ?>">
								<?php else : ?>
                                    <img class="card-img-top" src="http://via.placeholder.com/1200x630" alt="<?php the_title() ?>">
								<?php endif; ?>
                            </a>
                        </div>

                        <div class="col-md-8">
                            <h4><a href="<?= get_permalink() ?>"> <?php the_title() ?></a></h4>
                            <p>
                                <i class="mdi mdi-clock"></i>
								<?php the_time( 'j \d\e F \d\e Y H:i' ); ?>

                                <i class="mdi mdi-account ml-2"></i>
								<?php the_author() ?>
                            </p>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>

				<?php endwhile; ?>

                <div class="mt-1">
					<?php bootstrap_pagination() ?>
                </div>

            </div>
        </div>
    </div>

</div>

<?php require_once 'templates/footer.php' ?>
