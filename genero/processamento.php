<?php
include_once ('../conexao/conectar.php');

$genero = new Genero();

switch ($_GET['acao']) {

    case 'salvar':
        if(!empty($_POST['id_genero'])){
            $genero->alterar($_POST);
            break;
        }
        else {
            $genero->inserir($_POST);
            break;
        }
    case 'excluir':
        $genero->deletar($_GET['id_genero']);
        break;
}
header('location: ../cadastro/index.php#genero');
?>

