<?php
include_once '../conexao/conectar.php';

$filme = new Filme();
$filme->carregarPorId($_GET['id_filme']);

include_once '../cabecalho.php';
?>

<div class="container">
    <h1><?= $filme->getNome()?></h1>
    <br>
    <p><strong>Estreia: </strong><?= $filme->getEstreia();?></p>
    <p><strong>Estudio: </strong><?= $filme->getEstudio();?></p>
    <p><strong>Bilheteria: </strong><?= $filme->getBilheteria();?></p>
    <p><strong>Duracao: </strong><?= $filme->getDuracao();?></p>
    <p><strong>Sinopse: </strong><?= $filme->getSinopse();?></p>
    <p><strong>Critica: </strong><?= $filme->getCritica();?></p>
    <p><strong>Trailer: </strong><?= $filme->getTrailer();?></p>
    <p><strong>Assistir: </strong><?= $filme->getAssistir();?></p>
    <p><strong>Indicacao: </strong><?= $filme->getIndicacao();?></p>
    <p><strong>Gasto: </strong><?= $filme->getGasto();?></p>
    <p><strong>Imagem: </strong><?= $filme->getImagem();?></p>
    <p><strong>Classificacao: </strong><?= $filme->getIdClassificacao();?></p>
    <p><strong>Pais: </strong><?= $filme->getIdPais();?></p>
</div>

<?php
include_once '../rodape.php';
?>