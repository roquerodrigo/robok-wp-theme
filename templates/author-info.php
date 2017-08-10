<h4 class="text-uppercase mb-4">Sobre o autor</h4>
<div class="row">
    <div class="col-2">
        <img src="<?= get_wp_user_avatar_src() ?>" class="img-fluid w-100 rounded-circle" alt="<?= get_the_author_meta( 'display_name' ) ?>">
    </div>
    <div class="col-10">
        <h4 class="text-uppercase"><?= get_the_author_meta( 'display_name' ) ?></h4>
        <p><?= get_the_author_meta( 'user_description' ) ?></p>
        <p>
			<?php if ( get_the_author_meta( 'facebook' ) ): ?>
                <a target="_blank" href="<?php the_author_meta( 'facebook' ); ?>" class="btn btn-facebook"><i class="mdi mdi-facebook"></i></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'twitter' ) ): ?>
                <a target="_blank" href="https://www.twitter.com/<?php the_author_meta( 'twitter' ); ?>" class="btn btn-twitter text-light"><i class="mdi mdi-twitter"></i></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'googleplus' ) ): ?>
                <a target="_blank" href="<?php the_author_meta( 'googleplus' ); ?>" class="btn btn-google-plus"><i class="mdi mdi-google-plus"></i></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'email' ) ): ?>
                <a href="mailto:<?php the_author_meta( 'email' ); ?>" class="btn btn-dark"><i class="mdi mdi-email"></i></a>
			<?php endif; ?>
        </p>
    </div>
</div>
