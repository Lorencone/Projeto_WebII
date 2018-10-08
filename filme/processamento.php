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
}
header('location: ../cadastro/index.php#filme');

?>