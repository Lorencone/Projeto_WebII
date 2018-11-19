<?php
//session_start();
//include_once '../usuario/Usuario.php';
//
//$possuiAcesso = (new Usuario())->possuiAcesso();
//
//if (!$possuiAcesso) {
//    header('location: ../usuario/login.php');
//}
//
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Integrador Web I</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.min.css"/>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.15/dist/jquery.mask.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>
     <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/sweetalert2.all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
    </script>
<!--    --><?php include_once('../css/navbar.php') ?>

</head>
<?php //if (!empty($_SESSION['usuario'])) { ?>
<body>
<!-- Menu Superior -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Filmes.Info</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../cadastro/index.php">Cadastro</a></li>
                <li><a href="../categorias/index.php">Categorias</a></li>
                <li><a href="../usuario/index.php">Usuarios</a></li>
                <li style="color:rgba(242,248,255,0.86); padding-top: 1.1em;" class="user-name">//</li>
                <li>
                    <a href="../usuario/logof.php"><i class="glyphicon glyphicon-log-out"></i></a>
                    <!--                    <a style="color: #f9fffa" title="Sair" href="../usuario/processamento.php?acao=deslogar" class="fa fa-sign-out"></a>-->
                </li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<?php //} ?>