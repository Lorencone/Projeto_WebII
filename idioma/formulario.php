<?php
include_once ('../conexao/conectar.php');
$idioma = new Idioma();

if(!empty($_GET['id_idioma'])){
    $idioma->carregarPorId($_GET['id_idioma']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Idioma</h1>
        <br/>
        <form method="post" action="../idioma/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_idioma" value="<?= $idioma->getIdIdioma(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $idioma->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <?php
                    if(!empty($_GET['id_idioma'])){
                        echo "<a href='../idioma/processamento.php?acao=excluir&id_idioma={$idioma->getIdIdioma()}' class='btn btn-warning'>Excluir</a>";
                    }
                    ?>
                    <a href="../cadastro/index.php#idioma" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>