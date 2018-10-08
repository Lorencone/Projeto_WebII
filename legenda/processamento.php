<?php
include_once ('../conexao/conectar.php');

$legenda = new Legenda();

switch ($_GET['acao']) {

    case 'salvar':
        if(!empty($_POST['id_legenda'])){
            $legenda->alterar($_POST);
        }else {
            $legenda->inserir($_POST);
        }
    case 'excluir':
        $legenda->deletar($_GET['id_legenda']);
        break;
}
header('location: ../cadastro/index.php#legenda');