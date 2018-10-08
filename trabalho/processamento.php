<?php

include_once ('../conexao/conectar.php');

$trabalho = new Trabalho();

switch ($_GET['acao']) {

    case 'salvar':
        if(!empty($_POST['id_trabalho'])){
            $trabalho->alterar($_POST);
            break;
        }else {
            $trabalho->inserir($_POST);
            break;
        }
    case 'excluir':
        $trabalho->deletar($_GET['id_trabalho']);
        break;
}
header('location: ../cadastro/index.php#trabalho');