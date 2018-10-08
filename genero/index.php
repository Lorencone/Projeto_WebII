<?php
include_once ('../conexao/conectar.php');

$genero = new Genero();
$ageneros = $genero->recuperarDados();
?>
    <div class="container" style="margin-top: 60px;">
        <h2>Gênero</h2>
        <br/>
        <a href="../genero/formulario.php" class="btn btn-success">Cadastrar</a>
        <br/>
        <br/>
        <table class="table table-hover active">
            <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Gênero</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição do resultado da consulta
            foreach ($ageneros as $genero) {
                echo "
        <tr>
            <td><a href='../genero/formulario.php?id_genero={$genero['id_genero']}' class='btn btn-info'>Alterar</a> </td>
            <td>{$genero['id_genero'] }</td>
            <td>{$genero['nome'] }</td>
        </tr>";
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>