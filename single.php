<?php require_once 'templates/head.php' ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php $header_title = get_the_title() ?>
	<?php include( locate_template( 'templates/header-title.php' ) ) ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <article>

                    <header>
                        <p>
                            <i class="mdi mdi-clock"></i>
							<?php the_time( 'j \d\e F \d\e Y H:i' ); ?>
                            <i class="mdi mdi-account ml-2"></i>
							<?php the_author() ?>
                        </p>
                        <hr>
                    </header>

                    <section>
						<?= apply_filters( 'the_content', get_the_content() ) ?>
                    </section>

                    <footer>

                        <hr>

						<?php require_once 'templates/author-info.php' ?>

						<?php if ( function_exists( 'dw_reactions' ) ) {
							dw_reactions();
						} ?>

                        <hr>
						<?php if ( comments_open() || get_comments_number() ) : comments_template();endif; ?>
                    </footer>

                </article>
            </div>
			<?php if ( is_active_sidebar( 'aside-right' ) ): ?>
                <div class="col-md-3 aside-right"><?php dynamic_sidebar( 'aside-right' ); ?></div>
			<?php endif ?>
        </div>
    </div>
<?php endwhile; ?>

<?php require_once 'templates/footer.php' ?>

