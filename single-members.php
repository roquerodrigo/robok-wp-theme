<?php get_template_part( 'templates/head' ) ?>

<?php
$membro = [
	'nome'                  => get_field( 'nome' ),
	'foto'                  => get_field( 'foto' ),
	'curso'                 => get_field( 'curso' ),
	'ano_de_entrada_unifei' => get_field( 'ano_de_entrada_unifei' ),
	'ano_de_entrada_equipe' => get_field( 'ano_de_entrada_equipe' ),
	'ano_de_saida_equipe'   => get_field( 'ano_de_saida_equipe' ),
	'sobre'                 => get_field( 'sobre' ),
	'url'                   => get_field( 'url' ) ?: '#',
];

$header_title = $membro['nome'];

include( locate_template( 'templates/header-title.php' ) );
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <a href="/members" class="btn btn-light mb-4"><i class="mdi mdi-arrow-left mr-2"></i>Veja todos nossos membros</a>
            <div class="card mb-4" style="border-width: 1px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <a href="<?= $membro['url'] ?>" <?= $membro['url'] == '#' ? '' : 'target="_blank"' ?>>
                                <img src="<?= $membro['foto'] ?>" alt="<?= $membro['nome'] ?>" class="card-img-top">
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-9">
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


        </div>
    </div>
</div>

<?php get_template_part( 'templates/footer' ) ?>
