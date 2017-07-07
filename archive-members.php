<?php get_template_part( 'templates/head' ) ?>

<?php $header_title = 'Nossa Equipe' ?>
<?php include( locate_template( 'templates/header-title.php' ) ) ?>

<?php
$subequipes = [];

while ( have_posts() ) : the_post();

	$subequipes[ get_field( 'subequipe' ) ]['hash']      = str_replace( ' ', '-', strtolower( get_field( 'subequipe' ) ) );
	$subequipes[ get_field( 'subequipe' ) ]['membros'][] = [
		'nome'  => get_field( 'nome' ),
		'foto'  => get_field( 'foto' ),
		'curso' => get_field( 'curso' ),
		'sobre' => get_field( 'sobre' ),
	];

endwhile;

asort( $subequipes );

?>

<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
				<?php foreach ( $subequipes as $key => $subequipe ): ?>
                    <a class="nav-link <?= $subequipe['hash'] == 'eletrônica' ? 'active' : '' ?>" id="<?= $subequipe['hash'] ?>-tab" data-toggle="pill" href="#<?= $subequipe['hash'] ?>" role="tab"><?= $key ?></a>
				<?php endforeach; ?>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content">
				<?php foreach ( $subequipes as $key => $subequipe ): ?>
                    <div class="tab-pane fade show <?= $subequipe['hash'] == 'eletrônica' ? 'active' : '' ?>" id="<?= $subequipe['hash'] ?>" role="tabpanel">
                        <div class="row">
							<?php asort( $subequipe['membros'] ) ?>
							<?php foreach ( $subequipe['membros'] as $membro ): ?>

                                <div class="col-sm-6 col-md-4 mb-4">
                                    <div class="card" style="border-width: 1px">
                                        <img src="<?= $membro['foto'] ?>" alt="<?= $membro['nome'] ?>" class="card-img-top">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $membro['nome'] ?></h4>
                                            <p class="card-text"><?= $membro['sobre'] ?></p>
                                        </div>

                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><?= $membro['curso'] ?></li>
                                        </ul>
                                    </div>
                                </div>

							<?php endforeach; ?>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php get_template_part( 'templates/footer' ) ?>
