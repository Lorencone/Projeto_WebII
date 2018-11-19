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

    case 'verificar_nome':
        $existe = $legenda->existeNome($_GET['nome']);

        if ($existe){

            echo "<div class='alert' style='background: #373737; color: #ffffff'><h3 class='text-center'>Já existe {$existe} legenda chamada de {$_GET['nome']}, informe outra.</h3></div>";
        }

        die;
        break;
}
header('location: ../cadastro/index.php#legenda');