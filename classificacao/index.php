<?php
include_once ('../conexao/conectar.php');

$classificacoes = new Classificacao();
$classificacaos = $classificacoes->recuperarDados();
?>
<div class="container" style="margin-top: 60px;">

    <h2>Classificação</h2>
    <br/>
    <a href="../classificacao/formulario.php" class="btn btn-success">Cadastrar</a>
    <br/>
    <br/>
    <table class="table table-hover active">
        <thead>
        <tr>
            <th>Ação</th>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
        </tr>
        </thead>
        <?php
        // Foreach para exibiÃ§Ã£o do resultado da consulta
        foreach ($classificacaos as $classificacao) {
            echo "
        <tr>
            <td><a href='../classificacao/formulario.php?id_classificacao={$classificacao['id_classificacao']}' class='btn btn-info'>Alterar</a></td>
            <td>{$classificacao['id_classificacao'] }</td>
            <td>{$classificacao['nome'] }</td>
            <td>{$classificacao['idade'] }</td>
        </tr>";
        }
        ?>
    </table>
</div>
<?php
include_once("../rodape.php");
?>