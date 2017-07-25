<footer class="mt-4 bg-light">
    <hr>
    <div class="container">
        <div class="row">
			<?php if ( is_active_sidebar( 'footer-1' ) ): ?>
                <div class="col-md mb-4"><?php dynamic_sidebar( 'footer-1' ); ?></div>
            <?php endif ?>
			<?php if ( is_active_sidebar( 'footer-2' ) ): ?>
                <div class="col-md mb-4"><?php dynamic_sidebar( 'footer-2' ); ?></div>
            <?php endif ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ): ?>
                <div class="col-md mb-4"><?php dynamic_sidebar( 'footer-3' ); ?></div>
            <?php endif ?>
			<?php if ( is_active_sidebar( 'footer-4' ) ): ?>
                <div class="col-md mb-4"><?php dynamic_sidebar( 'footer-4' ); ?></div>
            <?php endif ?>
        </div>
    </div>
    <p class="text-center bg-dark text-light p-4 mb-0">
        Copyright© 2010-<?= date( "Y" ) ?> Equipe Robok de Futebol de Robôs - Todos os direitos reservados.
    </p>
</footer>

<?php wp_footer(); ?>
</body>
</html>