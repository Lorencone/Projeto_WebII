<pre>
<?php
include_once ('../conexao/conectar.php');

$filme = new Filme();

switch ($_GET['acao']) {

    case 'salvar':
        $origem = $_FILES['imagem']['tmp_name'];
        $destino = '';

        if (!empty($_POST['id_filme'])) {
            $filme->alterar($_POST);
            break;
        } else {
            $filme->inserir($_POST);
            break;
        }

    case 'excluir':
        $filme->deletar($_GET['id_filme']);
        break;

    case 'verificar_nome':
        $existe = $filme->existeNome($_GET['nome']);

        if ($existe){
            echo "<div class='alert' style='background: #373737; color: #ffffff'><h3 class='text-center'>Já existe {$existe} filme chamado de {$_GET['nome']}, informe outro.</h3></div>";
        }

        die;
        break;
}
header('location: ../cadastro/index.php#filme');

?>