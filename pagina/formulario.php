<?php
include_once ('../conexao/conectar.php');

$pagina = new Pagina();

if(!empty($_GET['id_pagina'])){
    $pagina->carregarPorId($_GET['id_pagina']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Pagina</h1>
        <br/>
        <form method="post" action="../pagina/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_pagina" value="<?= $pagina->getIdPagina(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $pagina->getNome(); ?>">
                </div>
                <div id="mensagemNome" role="alert"></div>
            </div>
            <div class="form-group">
                <label for="caminho" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="caminho" class="form-control" id="caminho" name="caminho" value="<?= $pagina->getCaminho(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="publica" class="col-sm-2 control-label">Publica</label>
                <div class="col-sm-10">
                    <label class="radio-inline"><input required type="radio" name="publica" id="publica" value="1" <?= $pagina->getPublica() == "M" ? "checked" : '';?>>Sim</label>
                    <label class="radio-inline"><input required type="radio" name="publica" id="publica" value="0" <?= $pagina->getPublica() == "F" ? "checked" : '';?>>Não</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <a href="../cadastro/index.php#pagina" class="btn btn-danger">Voltar</a>
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
