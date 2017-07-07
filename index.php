<?php require_once 'templates/head.php' ?>

<!--<img src="--><?php //bloginfo( 'template_url' ); ?><!--/assets/img/main_bg.jpg" class="img-fluid">-->
<img src="https://unsplash.it/1640/624?image=911" class="img-fluid w-100">

<div class="container-fluid">

    <div class="homepage-section row">
        <div class="container">
            <div class="col-12">
                <h3 class="homepage-separator">Notícias Recentes</h3>
				<?php require 'templates/recent_posts.php' ?>
            </div>
        </div>
    </div>

    <div class="homepage-section row">
        <div class="container">
            <div class="col-12">
                <h3 class="homepage-separator">Depoimentos</h3>
				<?php require 'templates/testimonials.php' ?>
            </div>
        </div>
    </div>

</div>

<?php require_once 'templates/footer.php' ?>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        items: 1,
    })
</script>
