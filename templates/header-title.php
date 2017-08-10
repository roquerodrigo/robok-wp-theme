<div class="jumbotron post-title bg-dark post-title"
     style="background-image: url(<?php bloginfo( 'template_url' ); ?>/assets/dist/images/bg.png); background-size: cover">
    <div class="container">
        <h1 class="display-5 text-uppercase text-center text-light"><?= $header_title ?></h1>
		<?php if ( isset( $header_subtitle ) ): ?>
            <h3 class="display-1h mt-5 text-center text-light"><em><?= $header_subtitle ?></em></h3>
		<?php endif; ?>
    </div>
</div>