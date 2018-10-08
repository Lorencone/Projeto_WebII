<?php
include_once ('../conexao/conectar.php');

$paises = new Pais();
$apais = $paises->recuperarDados();
?>
<div class="container" style="margin-top: 60px;">
    <h2>País</h2>
    <br/>
    <a href="../pais/formulario.php" class="btn btn-success">Cadastrar</a>
    <br/>
    <br/>
    <table class="table table-hover active">
        <thead>
        <tr>
            <th>Ações</th>
            <th>ID</th>
            <th>País</th>
        </tr>
        </thead>
        <?php
        // Foreach para exibiçãoo do resultado da consulta
        foreach ($apais as $pais) {
            echo "
                        <tr>
                            <td><a href='../pais/formulario.php?id_pais={$pais['id_pais']}' class='btn btn-info'>Alterar</a> </td>
                            <td>{$pais['id_pais'] }</td>
                            <td>{$pais['nome'] }</td>
                        </tr>";
        }
        ?>
    </table>
</div>

<?php
include_once "../rodape.php";
?>
