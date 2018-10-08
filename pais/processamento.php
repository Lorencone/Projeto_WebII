<?php
include_once ('../conexao/conectar.php');

$pais = new Pais();

switch ($_GET['acao']) {

    case 'salvar':
        if(!empty($_POST['id_pais'])){
            $pais->alterar($_POST);
        }else {
            $pais->inserir($_POST);
        }
    case 'excluir':
        $pais->deletar($_GET['id_pais']);
        break;
}
header('location: ../cadastro/index.php#pais');