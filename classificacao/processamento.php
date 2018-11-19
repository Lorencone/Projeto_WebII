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

    case 'verificar_nome':
        $existe = $classificacao->existeNome($_GET['nome']);

        if ($existe){
            echo "<div class='alert' style='background: #000000; color: #ffffff'><h3 class='text-center'>Já existe {$existe} classificacão chamada de {$_GET['nome']}, informe outra.</h3></div>";
        }

        die;
        break;
}
header('location: ../cadastro/index.php#classificacao');

?>