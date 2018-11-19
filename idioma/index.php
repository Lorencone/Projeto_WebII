<?php
include_once ('../conexao/conectar.php');
$idiomas = new Idioma();
$aidiomas = $idiomas->recuperarDados();
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
                <th>Nome</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição do resultado da consulta
            foreach ($aidiomas as $idioma) {
                ?>
                <tr>
                    <td>
                        <a href="../idioma/formulario.php?&id_idioma=<?= $idioma['id_idioma']?>" class="btn btn-info">Alterar</a>
                        <a href="../idioma/processamento.php?acao=excluir&id_idioma=<?= $idioma['id_idioma']?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $idioma['id_idioma']?></td>
                    <td><?= $idioma['nome']?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>