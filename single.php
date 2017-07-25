<?php require_once 'templates/head.php' ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php $header_title = get_the_title() ?>
	<?php include( locate_template( 'templates/header-title.php' ) ) ?>

    <div class="container">

        <p>
            <i class="mdi mdi-clock"></i>
		    <?php the_time( 'j \d\e F \d\e Y H:i' ); ?>

            <i class="mdi mdi-account ml-2"></i>
		    <?php the_author() ?>
        </p>
        <hr>
		<?= apply_filters( 'the_content', get_the_content() ) ?>

		<?php if ( function_exists( 'dw_reactions' ) ) {
			dw_reactions();
		} ?>

		<?php if ( comments_open() || get_comments_number() ) : comments_template();endif; ?>

    </div>
<?php endwhile; ?>

<?php require_once 'templates/footer.php' ?>
