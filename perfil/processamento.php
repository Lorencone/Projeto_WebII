<?php
include_once 'Perfil.php';

$perfil = new Perfil();

switch ($_GET['acao']) {
    case 'salvar':
        if (!empty($_POST['id_perfil'])) {
            $perfil->alterar($_POST);
        } else {
            $perfil->inserir($_POST);
        }
        break;
    case 'excluir':
        $perfil->excluir($_GET['id_perfil']);
        break;

    case 'verificar_nome':
        $existe = $filme->existeNome($_GET['nome']);

        if ($existe){

            echo "<div class='alert' style='background: #2093ee; color: #ffffff'><h3 class='text-center'>Já existe {$existe} perfil chamado de {$_GET['nome']}, informe outro.</h3></div>";
        }

        die;
        break;
}

header('location: index.php');