<?php
include_once ('../conexao/conectar.php');
$genero = new Genero();

if(!empty($_GET['id_genero'])){
    $genero->carregarPorId($_GET['id_genero']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Gênero</h1>
        <br/>
        <form method="post" action="../genero/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_genero" value="<?= $genero->getIdGenero(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $genero->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="imagem" class="col-sm-2 control-label">Imagem</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="imagem" name="imagem" value="<?= $genero->getImagem(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <?php
                    if(!empty($_GET['id_genero'])){
                        echo "<a href='../genero/processamento.php?acao=excluir&id_genero={$genero->getIdGenero()}' class='btn btn-warning'>Excluir</a>";
                    }
                    ?>
                    <a href="../cadastro/index.php#genero" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>