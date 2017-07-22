<footer class="mt-4">
    <hr>
    <div class="container pt-2">
        <div class="row">
            <?php if(is_active_sidebar('footer-1')):?><div class="col-md"><?php dynamic_sidebar( 'footer-1' ); ?></div><?php endif?>
            <?php if(is_active_sidebar('footer-2')):?><div class="col-md"><?php dynamic_sidebar( 'footer-2' ); ?></div><?php endif?>
            <?php if(is_active_sidebar('footer-3')):?><div class="col-md"><?php dynamic_sidebar( 'footer-3' ); ?></div><?php endif?>
            <?php if(is_active_sidebar('footer-4')):?><div class="col-md"><?php dynamic_sidebar( 'footer-4' ); ?></div><?php endif?>
        </div>
    </div>
    <hr>
    <p class="text-center">Copyright© 2010-<?= date( "Y" ) ?> Equipe Robok de Futebol de Robôs - Todos os direitos reservados.</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>