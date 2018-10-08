<?php
include_once "../conexao/conectar.php";

$trabalhos = new Trabalho();
$atrabalhos = $trabalhos->recuperarDados();
?>

<div class="container" style="margin-top: 60px;">
    <h2>Área de Trabalho</h2>
    <br/>
    <a href="../trabalho/formulario.php" class="btn btn-success">Cadastrar</a>
    <br/>
    <br/>
    <table class="table table-hover active">
        <thead>
        <tr>
            <th>Ação</th>
            <th>ID</th>
            <th>Nome</th>
        </tr>
        </thead>
        <?php
        // Foreach para exibição do resultado da consulta
        foreach ($atrabalhos as $trabalhos) {
            echo "
                        <tr>
                            <td><a href='../trabalho/formulario.php?id_trabalho={$trabalhos['id_trabalho']}' class='btn btn-info'>Alterar</a></td> 
                            <td>{$trabalhos['id_trabalho'] }</td>
                            <td>{$trabalhos['nome'] }</td>
                        </tr>";
        }
        ?>
    </table>
</div>

<?php
include_once "../rodape.php";
?>
