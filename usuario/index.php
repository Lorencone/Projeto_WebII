<?php
include_once ('../conexao/conectar.php');
$usuarios = new Usuario();
$perfis = new Perfil();

$ausuarios = $usuarios->recuperarDados();
$aperfil = $perfis->recuperarDados();

include_once '../cabecalho.php';
?>
    <div class="container" style="margin-top: 60px;">
        <h2>Usuario</h2>
        <br/>
        <a href="../usuario/formulario.php" class="btn btn-success">Cadastrar</a>
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
            foreach ($ausuarios as $usuario) {
            ?>
            <tr>
                <td>
                    <a href="formulario.php?&id_usuario=<?= $usuario['id_usuario']?>" class="btn btn-info">Alterar</a>
                    <a href="processamento.php?acao=excluir&id_usuario=<?= $usuario['id_usuario']?>" class="btn btn-danger">Excluir</a>
                </td>
                <td><?= $usuario['id_usuario']?></td>
                <td><?= $usuario['nome']?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>