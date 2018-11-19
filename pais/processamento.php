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

    case 'verificar_nome':
        $existe = $pais->existeNome($_GET['nome']);

        if ($existe){

            echo "<div class='alert' style='background: #373737; color: #ffffff'><h3 class='text-center'>Já existe {$existe} pais chamado de {$_GET['nome']}, informe outro.</h3></div>";
        }

        die;
        break;
}
header('location: ../cadastro/index.php#pais');