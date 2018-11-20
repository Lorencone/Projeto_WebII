<?php
include_once ('../conexao/conectar.php');
$paiss = new Pais();
$apaiss = $paiss->recuperarDados();
include_once '../cabecalho.php';
?>
    <div class="container" style="margin-top: 60px;">
        <h2>Pais</h2>
        <br/>
        <a href="../pais/formulario.php" class="btn btn-success">Cadastrar</a>
        <br/>
        <br/>
        <table class="table table-hover active">
            <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Nome</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição do resultado da consulta
            foreach ($apaiss as $pais) {
                ?>
                <tr>
                    <td>
                        <a href="../pais/formulario.php?&id_pais=<?= $pais['id_pais']?>" class="btn btn-info">Alterar</a>
                        <a href="../pais/processamento.php?acao=excluir&id_pais=<?= $pais['id_pais']?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $pais['id_pais']?></td>
                    <td><?= $pais['nome']?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>