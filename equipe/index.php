<?php
include_once ('../conexao/conectar.php');
$equipes = new Equipe();
$aequipes = $equipes->recuperarDados();
?>
    <div class="container" style="margin-top: 60px;">
        <h2>Equipe</h2>
        <br/>
        <a href="../equipe/formulario.php" class="btn btn-success">Cadastrar</a>
        <br/>
        <br/>
        <table class="table table-hover active">
            <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Nome</th>
                <th>Sexo</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição do resultado da consulta
            foreach ($aequipes as $equipe) {
                ?>
                <tr>
                    <td>
                        <a href="../equipe/formulario.php?&id_equipe=<?= $equipe['id_equipe']?>" class="btn btn-info">Alterar</a>
                        <a href="../equipe/processamento.php?acao=excluir&id_equipe=<?= $equipe['id_equipe']?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $equipe['id_equipe']?></td>
                    <td><?= $equipe['nome']?></td>
                    <td><?= $equipe['sexo']?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>