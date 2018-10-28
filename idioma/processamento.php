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

    case 'verificar_nome':
        $existe = $filme->existeNome($_GET['nome']);

        if ($existe){

            echo "<div class='alert' style='background: #2093ee; color: #ffffff'><h3 class='text-center'>Já existe {$existe} idioma chamado de {$_GET['nome']}, informe outro.</h3></div>";
        }

        die;
        break;
}
header('location: ../cadastro/index.php#idioma');
?>