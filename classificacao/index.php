<?php
include_once ('../conexao/conectar.php');
$classificacaos = new Classificacao();
$aclassificacaos = $classificacaos->recuperarDados();
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
                <th>Ações</th>
                <th>ID</th>
                <th>Nome</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição do resultado da consulta
            foreach ($aclassificacaos as $classificacao) {
                ?>
                <tr>
                    <td>
                        <a href="../classificacao/formulario.php?&id_classificacao=<?= $classificacao['id_classificacao']?>" class="btn btn-info">Alterar</a>
                        <a href="../classificacao/processamento.php?acao=excluir&id_classificacao=<?= $classificacao['id_classificacao']?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $classificacao['id_classificacao']?></td>
                    <td><?= $classificacao['nome']?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>