<?php
include_once ('../conexao/conectar.php');
$classificacao = new Classificacao();

if(!empty($_GET['id_classificacao'])){
    $classificacao->carregarPorId($_GET['id_classificacao']);
}

include_once("../cabecalho.php");
?>

    <div class="container" style="margin-top: 60px;">

        <h1>Classificação</h1>
        <br/>
        <form method="post" action="../classificacao/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_classificacao" value="<?= $classificacao->getIdclassificacao(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Classificação</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $classificacao->getNome(); ?>">
                </div>
                <div id="mensagemNome" role="alert"></div>
            </div>
            <div class="form-group">
                <label for="idade" class="col-sm-2 control-label">Idade</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="idade" name="idade" value="<?= $classificacao->getIdade(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <a href="index.php" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>

<?php
include_once("../rodape.php");
?>
<script>
    // AJAX para verificação do nome
    $('#nome').change(function () {

        $.ajax({
            url: 'processamento.php?acao=verificar_nome&' + $('#nome').serialize(),
            success: function (dados) {
                $('#mensagemNome').html(dados);
            }
        });

        // Verificação em JQUERY Load
        // $('#mensagemNome').load('processamento.php?acao=verificar_nome&nome=' + $('#nome').val());

    });
</script>
