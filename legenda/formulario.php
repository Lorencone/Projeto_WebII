<?php
include_once ('../conexao/conectar.php');
$legenda = new Legenda();

if(!empty($_GET['id_legenda'])){
    $legenda->carregarPorId($_GET['id_legenda']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Legenda</h1>
        <br/>
        <form method="post" action="../legenda/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_legenda" value="<?= $legenda->getIdLegenda(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $legenda->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <?php
                    if(!empty($_GET['id_legenda'])){
                        echo "<a href='../legenda/processamento.php?acao=excluir&id_legenda={$legenda->getIdLegenda()}' class='btn btn-warning'>Excluir</a>";
                    }
                    ?>
                    <a href="../cadastro/index.php#legenda" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>