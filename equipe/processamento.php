<?php
include_once ('../conexao/conectar.php');

$equipe = new Equipe();

switch ($_GET['acao']) {

    case 'salvar':
        if(!empty($_POST['id_equipe'])){
            $equipe->alterar($_POST);
        }else {
            $equipe->inserir($_POST);
        }
    case 'excluir':
        $equipe->deletar($_GET['id_equipe']);
        break;
}
header('location: ../cadastro/index.php#equipe');

?>