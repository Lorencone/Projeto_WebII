<?php
include_once ('../conexao/conectar.php');

$paginas = new Pagina();
$apaginas = $paginas->recuperarDados();
?>
    <div class="container" style="margin-top: 60px;">
        <h2>Pagina</h2>
        <br/>
        <br/>
        <br/>
        <a href="../pagina/formulario.php" class="btn btn-success">Cadastrar</a>
        <table class="table table-hover active">
            <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Página</th>
                <th>Pública</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição do resultado da consulta
            foreach ($apaginas as $pagina) {
                echo "
                        <tr>
                            <td><a href='../pagina/formulario.php?id_pagina={$pagina['id_pagina']}' class='btn btn-info'>Alterar</a> 
                            <td>{$pagina['id_pagina'] }</td>
                            <td>{$pagina['nome'] }</td>
                            <td>{$pagina['publica'] }</td>
                        </tr>";
            }
            ?>
        </table>
    </div>
<?php
include_once("../rodape.php");
?>