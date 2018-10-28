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

    case 'verificar_nome':
        $existe = $filme->existeNome($_GET['nome']);

        if ($existe){

            echo "<div class='alert' style='background: #2093ee; color: #ffffff'><h3 class='text-center'>Já existe {$existe} área de trabalho chamada de {$_GET['nome']}, informe outra.</h3></div>";
        }

        die;
        break;
}
header('location: ../cadastro/index.php#trabalho');