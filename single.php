<?php require_once 'templates/head.php' ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php $header_title = get_the_title() ?>
	<?php include( locate_template( 'templates/header-title.php' ) ) ?>

    <div class="container">

        <div class="row mb-4">
            <div class="col">
                <img src="<?php the_post_thumbnail_url() ?>" class="img-fluid w-100">
            </div>
        </div>

		<?= apply_filters( 'the_content', get_the_content() ) ?>

		<?php if ( function_exists( 'dw_reactions' ) ) {
			dw_reactions();
		} ?>

		<?php if ( comments_open() || get_comments_number() ) : comments_template();endif; ?>

    </div>
<?php endwhile; ?>

<?php require_once 'templates/footer.php' ?>
