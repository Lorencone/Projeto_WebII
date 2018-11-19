<pre>
<?php
include_once ('../conexao/conectar.php');

$filme = new Filme();

switch ($_GET['acao']) {

    case 'salvar':
        if (!empty($_POST['id_filme'])) {
            $filme->alterar($_POST);
            //print_r($_POST);
            //echo "alterar";
            //die;
            break;
        } else {
            $filme->inserir($_POST);
            //print_r($_POST);
            //echo "inserir";
            //die;
            break;
        }

    case 'excluir':
        $filme->deletar($_GET['id_filme']);
        break;

    case 'verificar_nome':
        $existe = $filme->existeNome($_GET['nome']);

        if ($existe){
            echo "<div class='alert' style='background: #000000; color: #ffffff'><h3 class='text-center'>Já existe {$existe} filme chamado de {$_GET['nome']}, informe outro.</h3></div>";
        }

        die;
        break;
}
header('location: ../cadastro/index.php#filme');

?>