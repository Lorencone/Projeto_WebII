<?php
session_start();
include_once '../usuario/Usuario.php';
include_once('../perfil/Perfil.php');

$possuiAcesso = (new Usuario())->possuiAcesso();

if (!$possuiAcesso) {
    header('location: ../usuario/login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Integrador Web II</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.min.css"/>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.15/dist/jquery.mask.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.3/chosen.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.3/chosen.jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $(".chosen-select").chosen()
        });
    </script>
    <?php include_once('../css/navbar.php') ?>
    <?php include_once('../css/chosen.php') ?>

</head>
<body>
<!-- Menu Superior -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Filmes.Info</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../categoria/index.php">Home</a></li>
                <li><a href="../categoria/index.php">Categoria</a></li>
                <?php if (!empty($_SESSION['usuario'])) { ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Cadastro<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../filme/index.php">Filme</a></li>
                        <li><a href="../genero/index.php">Genêro</a></li>
                        <li><a href="../classificacao/index.php">Classificação</a></li>
                        <li><a href="../idioma/index.php">Idioma</a></li>
                        <li><a href="../legenda/index.php">Legenda</a></li>
                        <li><a href="../equipe/index.php">Equipe</a></li>
                        <li><a href="../trabalho/index.php">Trabalho</a></li>
                        <li><a href="../pais/index.php">Pais</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Acesso<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../usuario/index.php">Usuario</a></li>
                        <li><a href="../perfil/index.php">Perfil</a></li>
                        <li><a href="../pagina/index.php">Página</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
        <li style="color:rgba(242,248,255,0.86); padding-top: 1.1em;"
            class="user-name"> <?= $_SESSION['usuario']['nome']; ?>
            <a style="color: #f9fffa" title="Sair" href="../usuario/processamento.php?acao=deslogar"
               class="fa fa-sign-out"></a>
            <?php } ?>
    </div>
</nav>




