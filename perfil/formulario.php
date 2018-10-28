<?php
include_once ('../conexao/conectar.php');
$perfil = new Perfil();

if(!empty($_GET['id_perfil'])){
    $perfil->carregarPorId($_GET['id_perfil']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Perfil</h1>
        <br/>
        <form method="post" action="../perfil/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_perfil" value="<?= $perfil->getIdPerfil(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $perfil->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <?php
                    if(!empty($_GET['id_perfil'])){
                        echo "<a href='../perfil/processamento.php?acao=excluir&id_perfil={$perfil->getIdPerfil()}' class='btn btn-warning'>Excluir</a>";
                    }
                    ?>
                    <a href="../cadastro/index.php#perfil" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>