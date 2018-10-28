<?php
include_once ('../conexao/conectar.php');

$perfils = new Perfil();
$aperfils = $perfils->recuperarDados();
?>
    <div class="container" style="margin-top: 60px;">
        <h2>Perfil</h2>
        <br/>
        <a href="../perfil/formulario.php" class="btn btn-success">Cadastrar</a>
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
            foreach ($aperfils as $perfil) {
                echo "
            <tr>
                <td><a href='../perfil/formulario.php?&id_perfil={$perfil['id_perfil']}' class='btn btn-info'>Alterar</a></td> 
                <td>{$perfil['id_perfil'] }</td>
                <td>{$perfil['nome'] }</td>   
            </tr>";
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>