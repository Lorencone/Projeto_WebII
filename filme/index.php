<?php
include_once ('../conexao/conectar.php');
$filmes = new Filme();
$afilmes = $filmes->recuperarDados();
include_once '../cabecalho.php';
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
                <th>Classificação</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição do resultado da consulta
            foreach ($afilmes as $filme) {
                ?>
                <tr>
                    <td>
                        <a href="../filme/formulario.php?&id_filme=<?= $filme['id_filme']?>" class="btn btn-info">Alterar</a>
                        <a href="../filme/processamento.php?acao=excluir&id_filme=<?= $filme['id_filme']?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $filme['id_filme']?></td>
                    <td><?= $filme['nome']?></td>
                    <td><?= $filme['id_classificacao']?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>