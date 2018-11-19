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

    case 'verificar_nome':
        $existe = $genero->existeNome($_GET['nome']);

        if ($existe){

            echo "<div class='alert' style='background: #373737; color: #ffffff'><h3 class='text-center'>Já existe {$existe} uma genêro chamado de {$_GET['nome']}, informe outra.</h3></div>";
        }

        die;
        break;
}
header('location: ../cadastro/index.php#genero');
?>

