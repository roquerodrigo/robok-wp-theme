<?php get_template_part( 'templates/head' ) ?>

<?php $header_title = 'Nossa Equipe' ?>
<?php include( locate_template( 'templates/header-title.php' ) ) ?>

<?php
$subequipes = [];

while ( have_posts() ) : the_post();

	$subequipes[ get_field( 'subequipe' ) ]['hash'] = str_replace( ' ', '-', strtolower( get_field( 'subequipe' ) ) );

	$estaNaEquipe = get_field( 'ano_de_saida_equipe' ) == '' ? 'membros' : 'exmembros';

	$subequipes[ get_field( 'subequipe' ) ][ $estaNaEquipe ][] = [
		'nome'                  => get_field( 'nome' ),
		'foto'                  => get_field( 'foto' ),
		'curso'                 => get_field( 'curso' ),
		'ano_de_entrada_unifei' => get_field( 'ano_de_entrada_unifei' ),
		'ano_de_entrada_equipe' => get_field( 'ano_de_entrada_equipe' ),
		'ano_de_saida_equipe'   => get_field( 'ano_de_saida_equipe' ),
		'sobre'                 => get_field( 'sobre' ),
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

						<?php if ( $subequipe['membros'] ) : ?>

                            <h3 class="text-uppercase text-center mb-4">Membros</h3>

							<?php asort( $subequipe['membros'] ) ?>
							<?php foreach ( $subequipe['membros'] as $membro ): ?>

                                <div class="card mb-4" style="border-width: 1px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="<?= $membro['foto'] ?>" alt="<?= $membro['nome'] ?>" class="card-img-top">
                                            </div>
                                            <div class="col-9">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item pl-0">
                                                        <h4><?= $membro['nome'] ?></h4>
                                                        <p><?= $membro['sobre'] ?></p>
                                                    </li>
                                                    <li class="list-group-item pl-0">Entrou na UNIFEI em <?= $membro['ano_de_entrada_unifei'] ?></li>
                                                    <li class="list-group-item pl-0">Faz <?= $membro['curso'] ?></li>
                                                    <li class="list-group-item pl-0">Entrou na equipe em <?= $membro['ano_de_entrada_equipe'] ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

							<?php endforeach; ?>
						<?php endif; ?>

						<?php if ( $subequipe['exmembros'] ) : ?>
                            <h3 class="text-uppercase text-center mb-4">Ex-Membros</h3>

							<?php asort( $subequipe['exmembros'] ) ?>
							<?php foreach ( $subequipe['exmembros'] as $membro ): ?>

                                <div class="card mb-4" style="border-width: 1px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="<?= $membro['foto'] ?>" alt="<?= $membro['nome'] ?>" class="card-img-top">
                                            </div>
                                            <div class="col-9">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item pl-0">
                                                        <h4><?= $membro['nome'] ?></h4>
                                                        <p><?= $membro['sobre'] ?></p>
                                                    </li>
                                                    <li class="list-group-item pl-0">Entrou na UNIFEI em <?= $membro['ano_de_entrada_unifei'] ?></li>
                                                    <li class="list-group-item pl-0">Faz <?= $membro['curso'] ?></li>
                                                    <li class="list-group-item pl-0">Entrou na equipe em <?= $membro['ano_de_entrada_equipe'] ?></li>
                                                    <li class="list-group-item pl-0">Saiu da equipe em <?= $membro['ano_de_saida_equipe'] ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

							<?php endforeach; ?>
						<?php endif; ?>

                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php get_template_part( 'templates/footer' ) ?>
