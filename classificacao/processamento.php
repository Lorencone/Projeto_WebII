<?php
include_once ('../conexao/conectar.php');

$classificacao = new Classificacao();

switch ($_GET['acao']) {

    case 'salvar':
        if(!empty($_POST['id_classificacao'])){
            $classificacao->alterar($_POST);
        }else {
            $classificacao->inserir($_POST);
        }
    case 'excluir':
        $classificacao->deletar($_GET['id_classificacao']);
        break;
}
header('location: ../cadastro/index.php#classificacao');

?>