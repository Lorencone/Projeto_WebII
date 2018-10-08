<?php
include_once ('../conexao/conectar.php');

$movie = new Filme();
$filmes = $movie->recuperarDados();

?>

<div class="container" style="margin-top: 60px;">
    <h2>Filme</h2>
    <br/>
    <a href="../filme/formulario.php" class="btn btn-success">Cadastrar</a>
    <br/>
    <br/>
    <table class="table table-hover active">
        <thead>
        <tr>
            <th>Ações</th>
            <th>ID</th>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Classificação</th>
        </tr>
        </thead>
        <?php
        // Foreach para exibição dos resultados da consulta
        foreach ($filmes as $filme) {
            echo "
        <tr>
            <td><a href='../filme/formulario.php?id_filme={$filme['id_filme']}' class='btn btn-info'>Alterar</a></td> 
            <td>{$filme['id_filme'] }</td>
            <td>{$filme['nome'] }</td>
            <td>{$filme['id_genero'] }</td>
            <td>{$filme['id_classificacao'] }</td>
        </tr>";
        }
        ?>
    </table>
</div>
<?php
include_once("../rodape.php");
?>
