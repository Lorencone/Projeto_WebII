<?php
include_once ('../conexao/conectar.php');
$pais = new Pais();

if(!empty($_GET['id_pais'])){
    $pais->carregarPorId($_GET['id_pais']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>País</h1>
        <br/>
        <form method="post" action="../pais/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_pais" value="<?= $pais->getIdPais(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $pais->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <?php
                    if(!empty($_GET['id_pais'])){
                        echo "<a href='../pais/processamento.php?acao=excluir&id_pais={$pais->getIdPais()}' class='btn btn-warning'>Excluir</a>";
                    }
                    ?>
                    <a href="../cadastro/index.php#pais" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>