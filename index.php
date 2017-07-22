<?php /* Template Name: home */ ?>

<?php require_once 'templates/head.php' ?>

<div class="parallax" style="background-image: url(<?php bloginfo( 'template_url' ); ?>/assets/dist/images/cover.jpg)"></div>

<div class="container-fluid">

    <div class="row">
        <div class="container">
            <div class="col-12">
                <h3 class="m-4 text-uppercase text-center">Notícias Recentes</h3>
				<?php require 'templates/recent_posts.php' ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="col-12">
                <h3 class="m-4 text-uppercase text-center">Depoimentos</h3>
				<?php require 'templates/testimonials.php' ?>
            </div>
        </div>
    </div>
<div class="row">
        <div class="container">
            <div class="col-12">
                <h3 class="m-4 text-uppercase text-center">Nossos patrocinadores</h3>
				<?php require 'templates/sponsors.php' ?>
            </div>
        </div>
    </div>

</div>

<?php require_once 'templates/footer.php' ?>

