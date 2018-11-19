<?php
include_once '../conexao/conectar.php';

$filme = new Filme();
$filme->carregarPorId($_GET['id_filme']);

include_once '../cabecalho.php';
?>

<div class="container">
    <h1><?= $filme->getNome()?></h1>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
</div>

<?php
include_once '../rodape.php';
?>