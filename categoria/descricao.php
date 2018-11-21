<?php
include_once '../conexao/conectar.php';

$filme = new Filme();
$aequipe = new Equipe();
$agenero = new Genero();
$aidioma = new Idioma();
$alegenda = new Legenda();
$atrabalho = new Trabalho();
$aet = new Equipe_Trabalho();
$afet = new Filme_Equipe_Trabalho();
$afg = new Filme_Genero();
$afi = new Filme_Idioma();
$afl = new  Filme_Legenda();

$equipes = $aequipe->recuperarDados();
$generos = $agenero->recuperarDados();
$idiomas = $aidioma->recuperarDados();
$legendas = $alegenda->recuperarDados();
$trabalhos = $atrabalho->recuperarDados();
$fets = $afet->recuperarFilme($_GET['id_filme']);
$fgs = $afg->recuperarFilme($_GET['id_filme']);
$fis = $afi->recuperarFilme($_GET['id_filme']);
$fls = $afl->recuperarFilme($_GET['id_filme']);
$filme->carregarPorId($_GET['id_filme']);

include_once '../cabecalho.php';
?>

    <div class="container">
        <h1><?= $filme->getNome() ?></h1>
        <br>
        <img src="../upload/filme/<?= $filme->getImagem();?>" style="width: 400px; height: 400px" class="img-rounded">

        <p><strong>Estreia: </strong><?= $filme->getEstreia(); ?></p>
        <p><strong>Estudio: </strong><?= $filme->getEstudio(); ?></p>
        <p><strong>Genêro:</strong>
            <?php foreach ($fgs as $fg) { ?>
                <?php foreach ($generos as $genero) { ?>
                    <?= ($fg['id_genero'] == $genero['id_genero']) ? "{$genero['nome']}" : ''; ?>
                <?php }
            } ?>
        </p>
        <p><strong>Idioma:</strong>
            <?php foreach ($fis as $fi) { ?>
                <?php foreach ($idiomas as $idioma) { ?>
                    <?= ($fi['id_idioma'] == $idioma['id_idioma']) ? "{$idioma['nome']}" : ''; ?>
                <?php }
            } ?>
        </p>
        <p><strong>Legenda:</strong>
            <?php foreach ($fls as $fl) { ?>
                <?php foreach ($legendas as $legenda) { ?>
                    <?= ($fl['id_legenda'] == $legenda['id_legenda']) ? "{$legenda['nome']}" : ''; ?>
                <?php }
            } ?>
        </p>
<!--        <p><strong>Equipe: </strong>-->
<!--            --><?php //foreach ($fets as $fet) { ?>
<!--                --><?php
//                $ets = $aet->recuperarEquipeTrabalho($id_equipe_trabalho);
//                foreach ($ets as $et) { ?>
<!--                    --><?php //foreach ($equipes as $equipe) { ?>
<!--                        --><?php //foreach ($trabalhos as $trabalho) { ?>
<!--                            --><?//= ($et['id_equipe'] == $equipe['id_equipe'])? "{$equipe['nome']}" : ''; ?>
<!--                            --><?//= " - ";?>
<!--                            --><?//= ($et['id_trabalho'] == $trabalho['id_trabalho'])? "{$trabalho['nome']}" : ''; ?>
<!--                        --><?php //}
//                    }
//                }
//            } ?>
<!--        </p>-->
        <p><strong>Bilheteria: </strong><?= $filme->getBilheteria(); ?></p>
        <p><strong>Duracao: </strong><?= $filme->getDuracao(); ?> minutos</p>
        <p><strong>Sinopse: </strong><?= $filme->getSinopse(); ?></p>
        <p><strong>Critica: </strong><?= $filme->getCritica(); ?></p>
        <p><strong>Trailer: </strong><a href="<?= $filme->getTrailer(); ?>"><?= $filme->getTrailer(); ?></a></p>
        <p><strong>Assistir: </strong><a href="<?= $filme->getAssistir(); ?>"><?= $filme->getAssistir(); ?></a></p>
        <p><strong>Indicação ao Oscar: </strong><?= $filme->getIndicacao(); ?></p>
        <p><strong>Gastos: </strong><?= $filme->getGasto(); ?></p>
        <p><strong>Classificação Indicativa: </strong><?= $filme->getIdClassificacao(); ?></p>
        <p><strong>Pais de Origem: </strong><?= $filme->getIdPais(); ?></p>

    </div>

<?php
include_once '../rodape.php';
?>