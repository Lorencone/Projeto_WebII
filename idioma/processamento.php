<?php
include_once ('../conexao/conectar.php');

$idioma = new Idioma();

switch ($_GET['acao']) {
    case 'salvar':
        if(!empty($_POST['id_idioma'])){
            $idioma->alterar($_POST);
            break;
        }
        else {
            $idioma->inserir($_POST);
        }
    case 'excluir':
        $idioma->deletar($_GET['id_idioma']);
        break;
}
header('location: ../cadastro/index.php#idioma');
?>