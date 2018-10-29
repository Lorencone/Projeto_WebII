<?php
include_once ('../conexao/conectar.php');

$usuario = new Usuario();

switch ($_GET['acao']) {

    case 'salvar':
        if(!empty($_POST['id_usuario'])){
            $usuario->alterar($_POST);
        }else {
            $usuario->inserir($_POST);
        }
    case 'excluir':
        $usuario->deletar($_GET['id_usuario']);
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

    case 'logar':
        $usuario->logar($_POST);
        break;
}
header('location: ../cadastro/index.php#usuario');

?>