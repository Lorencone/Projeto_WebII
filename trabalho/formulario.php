<?php
include_once ('../conexao/conectar.php');

$trabalho = new Trabalho();

if(!empty($_GET['id_trabalho'])){
    $trabalho->carregarPorId($_GET['id_trabalho']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Área de Trabalho</h1>
        <br/>
        <form method="post" action="../trabalho/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_trabalho" value="<?= $trabalho->getIdTrabalho(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $trabalho->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <?php
                    if(!empty($_GET['id_trabalho'])){
                        echo "<a href='../trabalho/processamento.php?acao=excluir&id_trabalho={$trabalho->getIdtrabalho()}' class='btn btn-warning'>Excluir</a> </td>";
                    }
                    ?>
                    <a href="../cadastro/index.php/trabalho" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>