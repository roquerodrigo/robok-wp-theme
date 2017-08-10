<?php /* Template Name: home */ ?>

<?php require_once 'templates/head.php' ?>

    <div class="parallax d-none d-sm-block" style="background-image: url(<?php bloginfo( 'template_url' ); ?>/assets/dist/images/cover.jpg)"></div>

    <div class="container-fluid pt-4 pb-4">
        <div class="row">
            <div class="container">
                <div class="col-12">
					<?php require 'templates/recent-posts.php' ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 pb-4">
        <div class="row">
            <div class="container">
                <div class="col-12">
					<?php require 'templates/sponsors.php' ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 pb-4">
        <div class="row">
            <div class="container">
                <div class="col-12">
					<?php require 'templates/testimonials.php' ?>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'templates/footer.php' ?>