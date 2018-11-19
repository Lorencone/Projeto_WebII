<?php

include_once '../conexao/conectar.php';

$afg = new Filme_Genero();
$afilme = new Filme();
$genero = new Genero();
$fgs = $afg->recuperarGenero($_GET['id_genero']);
$genero->carregarPorId($_GET['id_genero']);


include_once '../cabecalho.php';
?>
<div class="container">
    <h1>Filmes de <?= $genero->getNome(); ?></h1>
    <div class="row">
        <div class="col-md-4 col-xs-6">
            <?php foreach ($fgs as $fg){ ?>
                <?php
                $filmes = $afilme->recuperarFilme($fg['id_filme']);
                foreach ($filmes as $filme){?>
                    <label>
                        <a href="descricao.php?id_filme=<?= $filme['id_filme'];?>"><img src="../upload/filme/<?= $filme['imagem'];?>" style="width: 150px; height: 150px" class="img-rounded"></a>
                        <a href="descricao.php?id_filme=<?= $filme['id_filme'];?>"><h4><?= $filme['nome'];?></h4></a>
                    </label>
                <?php }?>
            <?php }?>
        </div>
    </div>
</div>
<?php
include_once '../rodape.php';
?>