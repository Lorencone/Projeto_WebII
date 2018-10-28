<?php
include_once ('../conexao/conectar.php');

$equipe = new Equipe();

switch ($_GET['acao']) {

    case 'salvar':
        if(!empty($_POST['id_equipe'])){
            $equipe->alterar($_POST);
        }else {
            $equipe->inserir($_POST);
        }
    case 'excluir':
        $equipe->deletar($_GET['id_equipe']);
        break;

    case 'verificar_nome':
        $existe = $filme->existeNome($_GET['nome']);

        if ($existe){
            if ($existe > 1){
                echo "<div class='alert' style='background: #2093ee; color: #ffffff'><h3 class='text-center'>Já existem {$existe} pessoas chamadas de  {$_GET['nome']}, informe outra. </h3></div>";
            } else {
                echo "<div class='alert' style='background: #2093ee; color: #ffffff'><h3 class='text-center'>Já existe {$existe} pessoa chamada de {$_GET['nome']}, informe outra.</h3></div>";
            }
        }

        die;
        break;
}
header('location: ../cadastro/index.php#equipe');

?>