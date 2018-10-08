<?php
include_once ('../conexao/conectar.php');

$idiomas = new Idioma();
$aIdiomas = $idiomas->recuperarDados();
?>
<div class="container" style="margin-top: 60px;">
    <h2>Idioma</h2>
    <br/>
    <a href="../idioma/formulario.php" class="btn btn-success">Cadastrar</a>
    <br/>
    <br/>
    <table class="table table-hover active">
        <thead>
        <tr>
            <th>Ações</th>
            <th>ID</th>
            <th>Idioma</th>
        </tr>
        </thead>
        <?php
        // Foreach para exibição do resultado da consulta
        foreach ($aIdiomas as $idioma) {
            echo "
                  <tr>
                      <td><a href='../idioma/formulario.php?direcionar=idioma&id_idioma={$idioma['id_idioma']}' class='btn btn-info'>Alterar</a> </td>
                      <td>{$idioma['id_idioma'] }</td>
                      <td>{$idioma['nome'] }</td>
                  </tr>";
        }
        ?>
    </table>
</div>
<?php
include_once("../rodape.php");
?>
