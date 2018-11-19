<?php
include_once ('../cabecalho.php');
?>

<div class="container">
    <ul class="nav nav-pills nav-justified cadastro">
        <li class="active"><a href="#filme" data-toggle="tab">Filme</a></li>
        <li><a href="#classificacao" data-toggle="tab">Classificação</a></li>
        <li><a href="#genero" data-toggle="tab">Gênero</a></li>
        <li><a href="#pais" data-toggle="tab">País</a></li>
        <li><a href="#idioma" data-toggle="tab">Idioma</a></li>
        <li><a href="#legenda" data-toggle="tab">Legenda</a></li>
        <li><a href="#equipe" data-toggle="tab">Equipe</a></li>
        <li><a href="#trabalho" data-toggle="tab">Área de Trabalho</a></li>
        <li><a href="#usuario" data-toggle="tab">Usuário</a></li>
        <li><a href="#perfil" data-toggle="tab">Perfil</a></li>
        <li><a href="#pagina" data-toggle="tab">Página</a></li>
    </ul>
</div>

<div class="tab-content tab">
    <div class="tab-pane active" id="filme">
        <?php include_once ('../filme/index.php');?>
    </div>
    <div class="tab-pane" id="classificacao">
        <?php include_once ('../classificacao/index.php');?>
    </div>
    <div class="tab-pane" id="genero">
        <?php include_once ('../genero/index.php');?>
    </div>
    <div class="tab-pane" id="pais">
        <?php include_once ('../pais/index.php');?>
    </div>
    <div class="tab-pane" id="idioma">
        <?php include_once ('../idioma/index.php');?>
    </div>
    <div class="tab-pane" id="legenda">
        <?php include_once ('../legenda/index.php');?>
    </div>
    <div class="tab-pane" id="equipe">
        <?php include_once ('../equipe/index.php');?>
    </div>
    <div class="tab-pane" id="trabalho">
        <?php include_once ('../trabalho/index.php');?>
    </div>
    <div class="tab-pane" id="usuario">
        <?php include_once ('../usuario/index.php');?>
    </div>
    <div class="tab-pane" id="perfil">
        <?php include_once ('../perfil/index.php');?>
    </div>
    <div class="tab-pane" id="pagina">
        <?php include_once ('../pagina/index.php');?>
    </div>
</div>


<?php
include_once ('../rodape.php');
?>
