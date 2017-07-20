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
		'url'                   => get_field( 'url' ) ?: '#',
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
                                                <a href="<?= $membro['url'] ?>" <?= $membro['url'] == '#' ? '' : 'target="_blank"' ?>>
                                                    <img src="<?= $membro['foto'] ?>" alt="<?= $membro['nome'] ?>" class="card-img-top">
                                                </a>
                                            </div>
                                            <div class="col-9">
                                                <table class="table">
                                                    <tr>
                                                        <td colspan="2" class="border-top-0">
                                                            <h4>
                                                                <i class="mdi mdi-account mr-1"></i><?= $membro['nome'] ?>
                                                            </h4>
                                                            <p><?= $membro['sobre'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="mdi mdi-calendar mr-1"></i>Entrou na UNIFEI em <?= $membro['ano_de_entrada_unifei'] ?>
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-school mr-1"></i>Faz <?= $membro['curso'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <i class="mdi mdi-calendar mr-1"></i>Entrou na equipe em <?= $membro['ano_de_entrada_equipe'] ?>
                                                        </td>
                                                    </tr>
                                                </table>
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
                                                <a href="<?= $membro['url'] ?>" <?= $membro['url'] == '#' ? '' : 'target="_blank"' ?>>
                                                    <img src="<?= $membro['foto'] ?>" alt="<?= $membro['nome'] ?>" class="card-img-top">
                                                </a>
                                            </div>
                                            <div class="col-9">
                                                <table class="table">
                                                    <tr>
                                                        <td colspan="2" class="border-top-0">
                                                            <h4>
                                                                <i class="mdi mdi-account mr-1"></i><?= $membro['nome'] ?>
                                                            </h4>
                                                            <p><?= $membro['sobre'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="mdi mdi-calendar mr-1"></i>Entrou na UNIFEI em <?= $membro['ano_de_entrada_unifei'] ?>
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-school mr-1"></i>Faz <?= $membro['curso'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="mdi mdi-calendar mr-1"></i>Entrou na equipe em <?= $membro['ano_de_entrada_equipe'] ?>
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-calendar mr-1"></i>Saiu da equipe em <?= $membro['ano_de_saida_equipe'] ?>
                                                        </td>
                                                </table>

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
