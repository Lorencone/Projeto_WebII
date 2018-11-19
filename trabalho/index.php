<?php
include_once ('../conexao/conectar.php');
$trabalhos = new Trabalho();
$atrabalhos = $trabalhos->recuperarDados();
?>
    <div class="container" style="margin-top: 60px;">
        <h2>Trabalho</h2>
        <br/>
        <a href="../trabalho/formulario.php" class="btn btn-success">Cadastrar</a>
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
            foreach ($atrabalhos as $trabalho) {
                ?>
                <tr>
                    <td>
                        <a href="../trabalho/formulario.php?&id_trabalho=<?= $trabalho['id_trabalho']?>" class="btn btn-info">Alterar</a>
                        <a href="../trabalho/processamento.php?acao=excluir&id_trabalho=<?= $trabalho['id_trabalho']?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $trabalho['id_trabalho']?></td>
                    <td><?= $trabalho['nome']?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>