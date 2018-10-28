<?php
include_once 'Pagina.php';

$pagina = new Pagina();

switch ($_GET['acao']) {
    case 'salvar':
        if (!empty($_POST['id_pagina'])) {
            $pagina->alterar($_POST);
        } else {
            $pagina->inserir($_POST);
        }
        break;
    case 'excluir':
        $pagina->excluir($_GET['id_pagina']);
        break;

    case 'verificar_nome':
        $existe = $filme->existeNome($_GET['nome']);

        if ($existe){

            echo "<div class='alert' style='background: #2093ee; color: #ffffff'><h3 class='text-center'>Já existe {$existe} página chamada de {$_GET['nome']}, informe outra.</h3></div>";
        }

        die;
        break;

}

header('location: index.php');