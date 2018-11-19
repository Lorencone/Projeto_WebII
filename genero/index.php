<?php
include_once ('../conexao/conectar.php');
$generos = new Genero();
$ageneros = $generos->recuperarDados();
?>
    <div class="container" style="margin-top: 60px;">
        <h2>Gênero</h2>
        <br/>
        <a href="../genero/formulario.php" class="btn btn-success">Cadastrar</a>
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
            foreach ($ageneros as $genero) {
                ?>
                <tr>
                    <td>
                        <a href="../genero/formulario.php?&id_genero=<?= $genero['id_genero']?>" class="btn btn-info">Alterar</a>
                        <a href="../genero/processamento.php?acao=excluir&id_genero=<?= $genero['id_genero']?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $genero['id_genero']?></td>
                    <td><?= $genero['nome']?></td>
                </tr>"
                <?php
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>