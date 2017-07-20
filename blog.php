<?php /* Template Name: blog */ ?>
<?php /* Template Name: home */ ?>

<?php require_once 'templates/head.php' ?>

<?php $header_title = get_the_title() ?>
<?php include( locate_template( 'templates/header-title.php' ) ) ?>

<div class="container-fluid">

    <div class="row">
        <div class="container">
            <div class="col-12">
				<?php require 'templates/recent_posts.php' ?>
            </div>
        </div>
    </div>

</div>

<?php require_once 'templates/footer.php' ?>

