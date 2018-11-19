<?php
include_once '../conexao/conectar.php';

$agenero = new Genero();
$generos = $agenero->recuperarDados();

include_once '../cabecalho.php';
?>

<div class="container">
    <h1>Categorias dos Filmes</h1>
    <div class="row">
        <div class="col-md-4 col-xs-6">
            <?php foreach ($generos as $genero) {?>
                <label>
                    <a href="filmes.php?id_genero=<?= $genero['id_genero'];?>"><img src="../upload/genero/<?= $genero['imagem'];?>" style="width: 150px; height: 150px" class="img-rounded"></a>
                    <a href="filmes.php?id_genero=<?= $genero['id_genero'];?>"><h4><?= $genero['nome'];?></h4></a>
                </label>
            <?php }?>
        </div>
    </div>
</div>

<?php
include_once '../rodape.php';
?>
