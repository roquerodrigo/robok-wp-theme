<?php require_once 'templates/head.php' ?>

<?php $header_title = get_the_title() ?>
<?php include( locate_template( 'templates/header-title.php' ) ) ?>

<?php while ( have_posts() ) : the_post() ?>

    <div class="container-fluid">
        <div class="homepage-section row">
            <div class="container">
				<?php the_content() ?>
            </div>
        </div>
    </div>

<?php endwhile ?>

<?php require_once 'templates/footer.php' ?>
