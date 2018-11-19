<?php
include_once ('../conexao/conectar.php');
include_once '../perfil/Perfil.php';

$usuario = new Usuario();


switch ($_GET['acao']) {

    case 'salvar':
        if(!empty($_POST['id_usuario'])){
            $usuario->alterar($_POST);
        }else {
            $usuario->inserir($_POST);
        }  break;
    case 'excluir':
        $usuario->excluir($_GET['id_usuario']);
        break;

    case 'verificar_email':
        $existe = $usuario->existeEmail($_GET['email']);

        if ($existe){
            echo "<div class='alert' style='background: #373737; color: #ffffff'><h3 class='text-center'>Já existe {$existe} e-mail chamado de {$_GET['email']}, informe outro.</h3></div>";
        }

        break;

    case 'logar':

        $usuario->logar($_POST);

        if (!empty($_SESSION['usuario'])){

            switch ($_SESSION['usuario']['id_perfil']){

                case Perfil::PERFIL_ADMINISTRADOR:
                    header('location: ../usuario/formulario.php');
                    die;
                case Perfil::PERFIL_USUARIO:
                    header('location: ../usuario/index.php');
                    die;
            }
        };
        break;
}

header('location: ../cadastro/index.php#usuario');
?>