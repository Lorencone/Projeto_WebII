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
                <div id="mensagemNome" role="alert"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <a href="../cadastro/index.php#perfil" class="btn btn-danger">Voltar</a>
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
