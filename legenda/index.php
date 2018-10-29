<?php
include_once ('../conexao/conectar.php');
$legendas = new Legenda();
$alegendas = $legendas->recuperarDados();
?>
    <div class="container" style="margin-top: 60px;">
        <h2>Legenda</h2>
        <br/>
        <a href="../legenda/formulario.php" class="btn btn-success">Cadastrar</a>
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
            foreach ($alegendas as $legenda) {
                ?>
                <tr>
                    <td>
                        <a href="../legenda/formulario.php?&id_legenda=<?= $legenda['id_legenda']?>" class="btn btn-info">Alterar</a>
                        <a href="../legenda/processamento.php?acao=exluir&id_legenda=<?= $legenda['id_legenda']?>" class="btn btn-info">Excluir</a>
                    </td>
                    <td><?= $legenda['id_legenda']?></td>
                    <td><?= $legenda['nome']?></td>
                </tr>"
                <?php
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>