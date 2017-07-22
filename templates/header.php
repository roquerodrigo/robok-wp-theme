<nav class="navbar navbar-expand-md navbar-dark fixed-top justify-content-between">
    <div class="container">
        <a href="/">
            <img src="<?php bloginfo( 'template_url' ); ?>/assets/dist/images/logo.png" class="img-fluid" style="max-height: 65px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="main-navbar">
            <div><?php robok_main_nav_left() ?></div>
            <div><?php robok_main_nav_right() ?></div>
        </div>
    </div>
</nav>
